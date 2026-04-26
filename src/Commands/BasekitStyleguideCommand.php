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
        $view = $this->option('view') ?: 'basekit::styleguide.index';
        $title = $this->option('title') ?: 'Basekit Laravel UI — Styleguide';
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
            $this->error('Snapshot generation failed: ' . $e->getMessage());
            return self::FAILURE;
        }

        return self::SUCCESS;
    }

    // =========================================================================
    // Rendering
    // =========================================================================

    protected function renderBody(string $view): string
    {
        return view($view)->render();
    }

    protected function loadCss(): string
    {
        $packageRoot = dirname(__DIR__, 2);
        $candidates  = [
            "{$packageRoot}/resources/css/dist/v1/theme.css",
            "{$packageRoot}/resources/css/v1/theme.css",
        ];

        foreach ($candidates as $path) {
            if (File::exists($path)) {
                return File::get($path);
            }
        }

        $this->warn('⚠️  theme.css not found — styleguide will render without package styles.');

        return '';
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
            return round($bytes / 1_048_576, 2) . ' MB';
        }
        if ($bytes >= 1_024) {
            return round($bytes / 1_024, 2) . ' KB';
        }

        return $bytes . ' B';
    }
}
