<?php

namespace BasekitLaravel\BasekitLaravelUi\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class BasekitMigrateThemeCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'basekit:ui:migrate-theme 
                            {--from= : Source version to migrate from}
                            {--to= : Target version to migrate to}
                            {--dry-run : Preview changes without applying them}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Migrate theme configuration between major versions';

    /**
     * Execute the console command.
     */
    public function handle(): int
    {
        $from = $this->option('from');
        $to = $this->option('to');

        if (! is_string($from)) {
            $from = '';
        }
        if (! is_string($to)) {
            $to = '';
        }
        $dryRun = $this->option('dry-run');

        if ($from === '' || $to === '') {
            $this->error('❌ Please specify both --from and --to version options');
            $this->info('Example: php artisan basekit:ui:migrate-theme --from=v1 --to=v2');

            return self::FAILURE;
        }

        $this->info("🔄 Migrating Basekit theme from {$from} to {$to}");

        if ($dryRun) {
            $this->warn('🔍 DRY RUN MODE - No changes will be made');
        }

        // Check current version
        $currentVersion = config('basekit-laravel-ui.version', '1');

        if ($currentVersion === $to) {
            $this->info("✅ Already on version {$to}");

            return self::SUCCESS;
        }

        // Perform migration based on version
        $migrated = match ("{$from}-{$to}") {
            'v1-v2' => $this->migrateV1ToV2($dryRun),
            default => $this->unsupportedMigration($from, $to),
        };

        if ($migrated) {
            if (! $dryRun) {
                $this->info('✅ Migration complete!');
                $this->info('');
                $this->info('Next steps:');
                $this->info('1. Review the changes in config/basekit-laravel-ui.php');
                $this->info('2. Run: php artisan basekit:ui:build');
                $this->info('3. Test your components');
            } else {
                $this->info('✅ Dry run complete - no changes were made');
            }

            return self::SUCCESS;
        }

        return self::FAILURE;
    }

    /**
     * Migrate from v1 to v2.
     */
    protected function migrateV1ToV2(bool $dryRun): bool
    {
        $this->info('📋 Migration steps for v1 → v2:');
        $this->line('  • Update configuration schema');
        $this->line('  • Rename CSS variable prefixes');
        $this->line('  • Update component prop names');
        $this->newLine();

        $configPath = config_path('basekit-laravel-ui.php');

        if (! File::exists($configPath)) {
            $this->error('❌ Configuration file not found: '.$configPath);
            $this->info('💡 Run: php artisan vendor:publish --tag=basekit-laravel-ui-config');

            return false;
        }

        // Backup configuration
        if (! $dryRun) {
            $backupPath = $configPath.'.v1.backup';
            File::copy($configPath, $backupPath);
            $this->info("📦 Backup created: {$backupPath}");
        }

        // Example migration logic (customize based on actual breaking changes)
        $config = File::get($configPath);
        $changes = [];

        // Update version
        if (str_contains($config, "'version' => '1'")) {
            $config = str_replace("'version' => '1'", "'version' => '2'", $config);
            $changes[] = 'Updated version to 2';
        }

        // Add any new configuration keys for v2
        // Example: if v2 adds new settings
        // This is where you'd add version-specific migration logic

        if (! $dryRun && $changes !== []) {
            File::put($configPath, $config);
        }

        if ($changes !== []) {
            $this->info('📝 Changes applied:');
            foreach ($changes as $change) {
                $this->line("  • {$change}");
            }
        } else {
            $this->warn('⚠️  No changes needed');
        }

        // CSS Migration
        $cssPath = public_path('vendor/basekit-laravel/v1/basekit-ui.css');
        if (File::exists($cssPath)) {
            $this->warn('💡 Update CSS reference in your app from v1/ to v2/');
            $this->line('   Update: @import "./vendor/basekit-laravel/v1/basekit-ui.css"');
            $this->line('   To:     @import "./vendor/basekit-laravel/v2/basekit-ui.css"');
        }

        return true;
    }

    /**
     * Handle unsupported migration path.
     */
    protected function unsupportedMigration(string $from, string $to): bool
    {
        $this->error("❌ Unsupported migration path: {$from} → {$to}");
        $this->info('');
        $this->info('Supported migrations:');
        $this->line('  • v1 → v2');
        $this->info('');
        $this->info('For major version jumps, migrate incrementally:');
        $this->line('  Example: v1 → v2 → v3');

        return false;
    }
}
