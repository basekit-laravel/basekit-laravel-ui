<?php

namespace BasekitLaravel\BasekitLaravelUi\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

/**
 * Renders the Basekit styleguide Blade views into a self-contained static HTML file.
 *
 * The generated file embeds CSS inline and loads Alpine.js from CDN so it works
 * without a running Laravel app — perfect for committing to docs/public/ and serving
 * via the VitePress docs site.
 */
class BasekitStyleguideCommand extends Command
{
    protected $signature = 'basekit:ui:styleguide
                            {--output= : Output file path (default: <package>/docs/public/styleguide.html)}
                            {--view= : Blade view to render (default: basekit::styleguide.index)}
                            {--title= : HTML <title> (default: Basekit Laravel UI — Styleguide)}';

    protected $description = 'Generate a self-contained HTML snapshot for the docs site (styleguide or custom demo)';

    public function handle(): int
    {
        $view = $this->option('view') ?? 'basekit::styleguide.index';
        $title = $this->option('title') ?? 'Basekit Laravel UI — Styleguide';
        $outputPath = $this->resolveOutputPath();

        $this->info('🎨 Generating snapshot...');
        $this->info("View: {$view}");
        $this->info("Title: {$title}");
        $this->info("Output: {$outputPath}");

        try {
            $body = $this->renderBody($view);
            $css  = $this->loadCss();
            $html = $this->buildHtml($body, $css, $title);

            $outputDir = dirname($outputPath);
            if (! File::isDirectory($outputDir)) {
                File::makeDirectory($outputDir, 0755, true);
            }

            File::put($outputPath, $html);

            $size = $this->formatBytes(File::size($outputPath));
            $this->info("✅ Snapshot saved: {$outputPath}");
            $this->info("📊 Size: {$size}");
        } catch (\Throwable $e) {
            $this->error('Snapshot generation failed: '.$e->getMessage());

            return self::FAILURE;
        }

        return self::SUCCESS;
    }

    // =========================================================================
    // Rendering
    // =========================================================================

    protected function renderBody(string $view): string
    {
        /** @var view-string $view */
        return view($view)->render();
    }

    protected function loadCss(): string
    {
        $packageRoot = dirname(__DIR__, 2);
        $candidates  = [
            "{$packageRoot}/resources/css/dist/v1/theme.css",
            "{$packageRoot}/resources/css/v1/theme.css",
        ];

        $themePath = null;
        foreach ($candidates as $path) {
            if (File::exists($path)) {
                $themePath = $path;
                break;
            }
        }

        if ($themePath === null) {
            $this->warn('⚠️  theme.css not found — styleguide will render without package styles.');

            return '';
        }

        $css = $this->resolveImports($themePath);

        // The snapshot is self-contained: it runs in a plain browser with the
        // Tailwind Play CDN, so raw Tailwind v4 at-rules are not compiled into
        // CSS custom properties. Convert @theme blocks to :root so the custom
        // palette is actually applied (see compileThemeForBrowser()).
        return $this->compileThemeForBrowser($css);
    }

    /**
     * Convert Tailwind v4 theme-registration at-rules into real CSS custom
     * properties so the self-contained styleguide renders colors without a
     * Tailwind compiler.
     *
     * Browsers ignore unknown at-rules, so `@theme default { --color-primary-600: #4f46e5; }`
     * never registers the palette as CSS variables. Rewriting each @theme block
     * as a `:root { ... }` rule makes those variables resolvable by components
     * (e.g. `var(--button-bg-primary)`). The `--theme(...)` function is likewise
     * rewritten to the equivalent `var(...)`.
     */
    protected function compileThemeForBrowser(string $css): string
    {
        $result = '';
        $offset = 0;
        $length = strlen($css);
        $pattern = '/@theme(?:\s+(?:default|inline|reference))*\s*\{/';

        while (preg_match($pattern, $css, $match, PREG_OFFSET_CAPTURE, $offset) === 1) {
            $start = $match[0][1];
            $result .= substr($css, $offset, $start - $offset);

            $open = $start + strlen($match[0][0]) - 1;
            $depth = 0;
            $close = $open;
            while ($close < $length) {
                $char = $css[$close];
                if ($char === '{') {
                    $depth++;
                } elseif ($char === '}') {
                    $depth--;
                    if ($depth === 0) {
                        break;
                    }
                }
                $close++;
            }

            $block = substr($css, $open, $close - $open + 1);
            $result .= ':root '.$block."\n";
            $offset = $close + 1;
        }

        $result .= substr($css, $offset);

        return str_replace('--theme(', 'var(', $result);
    }

    /**
     * Read a CSS file and resolve its @import statements recursively,
     * replacing them with the actual content of the imported files.
     */
    protected function resolveImports(string $cssPath): string
    {
        $css    = File::get($cssPath);
        $baseDir = dirname($cssPath);

        // Resolve @import "./path/to/file.css";
        return (string) preg_replace_callback(
            '/@import\s+["\'](\.\/[^"\']+)["\']\s*;/m',
            function (array $matches) use ($baseDir): string {
                $importPath = realpath($baseDir.'/'.$matches[1]);
                if ($importPath === false || ! File::exists($importPath)) {
                    return "/* @import {$matches[1]} not found */";
                }

                // Recursively resolve nested imports
                return $this->resolveImports($importPath);
            },
            $css
        );
    }

    protected function buildHtml(string $body, string $css, string $title): string
    {
        $escapedCss = htmlspecialchars_decode(htmlspecialchars($css, ENT_NOQUOTES));

        return <<<HTML
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>{$title}</title>
    <!-- Alpine Collapse plugin must load BEFORE core Alpine: current Alpine CDN builds boot via queueMicrotask, so 'alpine:init' fires before any later-deferred plugin script executes -->
    <script defer src="https://cdn.jsdelivr.net/npm/@alpinejs/collapse@3.x.x/dist/cdn.min.js"></script>
    <!-- Alpine.js for interactive components -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3/dist/cdn.min.js"></script>
    <!-- Tailwind CSS v4 browser runtime for utility classes -->
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
*, *::before, *::after { box-sizing: border-box; }
html { font-size: 16px; }
body {
    margin: 0;
    padding: 2rem;
    background: #f8fafc;
    font-family: ui-sans-serif, system-ui, -apple-system, sans-serif;
    color: #1e293b;
}
{$escapedCss}
    </style>
    <script>
    // Expose the URL hash so Alpine x-data initializers can read it before Alpine boots.
    window.__bkHash = (window.location.hash || '').replace('#', '');
    // Scroll to anchor hash when loaded inside an iframe (VitePress passes the hash
    // in the parent URL, not the iframe src, so we re-apply it on load and on hashchange).
    function scrollToHash() {
        var hash = window.location.hash;
        if (hash) {
            var el = document.querySelector(hash);
            if (el) { el.scrollIntoView({ behavior: 'smooth' }); }
        }
    }
    document.addEventListener('DOMContentLoaded', scrollToHash);
    window.addEventListener('hashchange', scrollToHash);
    // Allow parent to send a hash target via postMessage
    window.addEventListener('message', function(e) {
        if (e.data && typeof e.data === 'string' && e.data.startsWith('#')) {
            var el = document.querySelector(e.data);
            if (el) { el.scrollIntoView({ behavior: 'smooth' }); }
        }
    });
    </script>
</head>
<body>
{$body}
</body>
</html>
HTML;
    }

    // =========================================================================
    // Helpers
    // =========================================================================

    protected function resolveOutputPath(): string
    {
        $outputOption = $this->option('output');
        if (is_string($outputOption) && $outputOption !== '') {
            return $outputOption;
        }

        // Default: docs/public/styleguide.html relative to the package root.
        // This gets committed to the repo and served by VitePress.
        $packageRoot = dirname(__DIR__, 2);

        return "{$packageRoot}/docs/public/styleguide.html";
    }

    protected function formatBytes(int $bytes): string
    {
        if ($bytes >= 1_048_576) {
            return round($bytes / 1_048_576, 2).' MB';
        }
        if ($bytes >= 1_024) {
            return round($bytes / 1_024, 2).' KB';
        }

        return $bytes.' B';
    }
}
