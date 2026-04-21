<?php

namespace BasekitLaravel\BasekitLaravelUi\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

/**
 * Builds an optimized CSS bundle from pre-compiled dist component files.
 *
 * Design decisions:
 *   - Reads from resources/css/dist/v1/ (pre-processed by PostCSS).
 *   - Resolves @custom-media / @media (--bk-*) to standard min-width equivalents.
 *   - Includes full component CSS only when that component is enabled in config.
 */
class BasekitBuildCommand extends Command
{
    // -------------------------------------------------------------------------
    // Artisan command metadata
    // -------------------------------------------------------------------------

    protected $signature = 'basekit:ui:build {--watch : Watch for config changes and rebuild automatically}';

    protected $description = 'Build optimized CSS with enabled components';

    // -------------------------------------------------------------------------
    // Watch-mode state
    // -------------------------------------------------------------------------

    /**
     * @var array<string, string|false>
     */
    protected array $fileHashes  = [];

    protected int $debounceMs  = 500;

    protected ?int $lastBuildMs = null;

    // -------------------------------------------------------------------------
    // Breakpoint map: custom-media name -> standard media query
    // -------------------------------------------------------------------------

    protected const BREAKPOINTS = [
        '--bk-sm'  => '(min-width: 640px)',
        '--bk-md'  => '(min-width: 768px)',
        '--bk-lg'  => '(min-width: 1024px)',
        '--bk-xl'  => '(min-width: 1280px)',
        '--bk-2xl' => '(min-width: 1536px)',
    ];

    // -------------------------------------------------------------------------
    // Dist component subdirectory search order (preferred over flat root)
    // -------------------------------------------------------------------------

    protected const SUBDIRS = ['form', 'feedback', 'navigation', 'layout', 'display', 'dialog'];

    // =========================================================================
    // Entry point
    // =========================================================================

    public function handle(): int
    {
        $this->debounceMs = (int) config('basekit-laravel-ui.build.debounce_ms', 500);

        if ($this->option('watch')) {
            $this->info('Watching for changes... (Press Ctrl+C to stop)');
            $this->watch();
        } else {
            $this->build();
        }

        return self::SUCCESS;
    }

    // =========================================================================
    // Build
    // =========================================================================

    protected function build(): void
    {
        $startMs = (int) round(microtime(true) * 1000);
        $this->info('🔨 Building CSS...');

        try {
            $enabled = $this->getEnabledComponents();

            if ($enabled === []) {
                $this->warn('No components enabled. Check your config/basekit-laravel-ui.php file.');

                return;
            }

            $css = $this->assembleCss($enabled);

            $outputPath = public_path(config('basekit-laravel-ui.build.output_path', 'vendor/basekit-laravel/v1/basekit-ui.css'));
            $outputDir  = dirname($outputPath);

            if (! File::isDirectory($outputDir)) {
                File::makeDirectory($outputDir, 0755, true);
            }

            File::put($outputPath, $css);

            $elapsed = (int) round(microtime(true) * 1000) - $startMs;
            $size    = $this->formatBytes(File::size($outputPath));

            $this->info("✅ Build complete! ({$elapsed}ms)");
            $this->info("📦 Output: {$outputPath}");
            $this->info("📊 Size: {$size}");
            $this->newLine();
            $this->info('🎯 Components ('.count($enabled).'):');
            foreach (array_keys($enabled) as $component) {
                $this->line("   • {$component}");
            }
        } catch (\Exception $e) {
            $this->error('Build failed: '.$e->getMessage());
        }
    }

    // =========================================================================
    // CSS assembly
    // =========================================================================

    /**
     * Assemble the final CSS string from global tokens + per-component files.
     *
     * @param  array<string, array<string, mixed>>  $enabled
     */
    protected function assembleCss(array $enabled): string
    {
        $packagePath = dirname(__DIR__, 2);
        $distRoot    = "{$packagePath}/resources/css/dist/v1";
        $sourceRoot  = "{$packagePath}/resources/css/v1";

        $parts = [];

        // 1. Global design tokens from theme.css — strip all @import lines so
        //    no component CSS bleeds in from the source file.
        $themePath = "{$sourceRoot}/theme.css";
        if (File::exists($themePath)) {
            $raw    = File::get($themePath);
            $tokens = preg_replace('/^\s*@import\s+[^\n;]+;?\s*$/m', '', $raw);
            $tokens = (string) $tokens;
            $tokens = trim($tokens);
            if ($tokens !== '') {
                $parts[] = $tokens;
            }
        }

        // 2. Per-component CSS (full file for each enabled component).
        foreach ($enabled as $name => $config) {
            $componentCss = $this->loadComponentCss($name, $distRoot, $sourceRoot);
            if ($componentCss !== '') {
                $parts[] = $componentCss;
            }
        }

        $css = implode("\n\n", $parts);

        // Final safety pass for any tokens from global theme block.
        $css = $this->resolveCustomMedia($css);

        return $css."\n";
    }

    // =========================================================================
    // Component CSS loading
    // =========================================================================

    /**
     * Find and return the CSS for a single component.
     */
    protected function loadComponentCss(string $name, string $distRoot, string $sourceRoot): string
    {
        $file = $this->findComponentFile($name, $distRoot, $sourceRoot);
        if ($file === null) {
            return '';
        }

        $css = File::get($file);

        return $this->resolveCustomMedia($css);
    }

    /**
     * Locate the component CSS file, preferring subdirectory dist files.
     */
    protected function findComponentFile(string $name, string $distRoot, string $sourceRoot): ?string
    {
        // 1. Named subdirectory dist files (preferred — no flat-dir duplication)
        foreach (self::SUBDIRS as $sub) {
            $path = "{$distRoot}/components/{$sub}/{$name}.css";
            if (File::exists($path)) {
                return $path;
            }
        }

        // 2. Flat dist components directory
        $flat = "{$distRoot}/components/{$name}.css";
        if (File::exists($flat)) {
            return $flat;
        }

        // 3. Source CSS fallback
        $src = "{$sourceRoot}/components/{$name}.css";
        if (File::exists($src)) {
            return $src;
        }

        return null;
    }

    // =========================================================================
    // Custom media query resolution
    // =========================================================================

    /**
     * Strip @custom-media declarations and replace @media (--bk-*) with
     * standard @media (min-width: ...) equivalents.
     */
    protected function resolveCustomMedia(string $css): string
    {
        $css = (string) preg_replace('/^\s*@custom-media\s+--bk-[^\n]*\n?/m', '', $css);

        foreach (self::BREAKPOINTS as $name => $standard) {
            $quoted = preg_quote($name, '/');
            $css    = (string) preg_replace('/\(\s*'.$quoted.'\s*\)/', $standard, $css);
        }

        return $css;
    }

    // =========================================================================
    // Watch mode
    // =========================================================================

    protected function watch(): void
    {
        $configPath = config_path('basekit-laravel-ui.php');
        $cssPath    = base_path('resources/css/v1');

        $this->build();
        $this->initHashes($configPath, $cssPath);

        /** @phpstan-ignore-next-line */
        while (true) {
            usleep(250_000);

            if ($this->hasChanged($configPath, $cssPath)) {
                $nowMs = (int) round(microtime(true) * 1000);
                if ($this->lastBuildMs !== null && ($nowMs - $this->lastBuildMs) < $this->debounceMs) {
                    continue;
                }

                $this->newLine();
                $this->comment('Changes detected, rebuilding...');
                $this->build();
                $this->lastBuildMs = $nowMs;
                $this->initHashes($configPath, $cssPath);
            }
        }
    }

    protected function initHashes(string $configPath, string $cssPath): void
    {
        $this->fileHashes = [];

        if (File::exists($configPath)) {
            $this->fileHashes[$configPath] = md5_file($configPath);
        }

        if (File::isDirectory($cssPath)) {
            foreach (File::allFiles($cssPath) as $file) {
                $p = $file->getPathname();
                $this->fileHashes[$p] = md5_file($p);
            }
        }
    }

    protected function hasChanged(string $configPath, string $cssPath): bool
    {
        if (File::exists($configPath)) {
            $hash = md5_file($configPath);
            if (! isset($this->fileHashes[$configPath]) || $this->fileHashes[$configPath] !== $hash) {
                return true;
            }
        }

        if (File::isDirectory($cssPath)) {
            foreach (File::allFiles($cssPath) as $file) {
                $p    = $file->getPathname();
                $hash = md5_file($p);
                if (! isset($this->fileHashes[$p]) || $this->fileHashes[$p] !== $hash) {
                    return true;
                }
            }
        }

        return false;
    }

    // =========================================================================
    // Config helpers
    // =========================================================================

    /** @return array<string, array<string, mixed>> */
    protected function getEnabledComponents(): array
    {
        $components = $this->resolveComponentConfig();
        $enabled    = [];

        foreach ($components as $name => $config) {
            if (is_array($config) && (bool) ($config['enabled'] ?? true)) {
                $enabled[$name] = $config;
            } elseif ($config === true) {
                $enabled[$name] = [];
            }
        }

        return $enabled;
    }

    /**
     * Resolve component config using package defaults as baseline.
     *
     * Why this exists:
     * Laravel's mergeConfigFrom() performs a shallow merge, so when an app
     * publishes/overrides config/basekit-laravel-ui.php with partial component entries,
     * nested keys (like variants/sizes/orientations) can disappear entirely.
     *
     * We merge at component-key level so missing app keys fall back to package
     * defaults, and only explicitly removed modifier values are shaken out.
     *
     * @return array<string, mixed>
     */
    protected function resolveComponentConfig(): array
    {
        $packageConfigPath = dirname(__DIR__, 2).'/config/basekit-laravel-ui.php';
        $defaultComponents = [];

        if (File::exists($packageConfigPath)) {
            $packageConfig = require $packageConfigPath;
            if (is_array($packageConfig['components'] ?? null)) {
                $defaultComponents = $packageConfig['components'];
            }
        }

        $configuredComponents = config('basekit-laravel-ui.components', []);
        if (! is_array($configuredComponents)) {
            return $defaultComponents;
        }

        return $this->mergeComponents($defaultComponents, $configuredComponents);
    }

    /**
     * Merge component config with defaults while preserving explicit app values.
     *
     * @param  array<string, mixed>  $defaults
     * @param  array<string, mixed>  $overrides
     * @return array<string, mixed>
     */
    protected function mergeComponents(array $defaults, array $overrides): array
    {
        $merged = $defaults;

        foreach ($overrides as $name => $override) {
            if (! array_key_exists($name, $defaults)) {
                $merged[$name] = $override;

                continue;
            }

            $default = $defaults[$name];

            if (is_array($default) && is_array($override)) {
                $merged[$name] = $default;
                foreach ($override as $key => $value) {
                    $merged[$name][$key] = $value;
                }
            } else {
                $merged[$name] = $override;
            }
        }

        return $merged;
    }

    // =========================================================================
    // Utility
    // =========================================================================

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
