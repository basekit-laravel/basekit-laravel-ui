<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\File;

beforeEach(function (): void {
    File::delete(config_path('basekit-laravel-ui.php'));
});

afterEach(function (): void {
    File::delete(config_path('basekit-laravel-ui.php'));
});

describe('Migrate Theme Command', function () {
    test('migrate theme command supports dry run', function (): void {
        $configPath = config_path('basekit-laravel-ui.php');

        if (! File::isDirectory(dirname($configPath))) {
            File::makeDirectory(dirname($configPath), 0755, true);
        }

        File::put(
            $configPath,
            <<<'PHP'
<?php

return [
    'version' => '1',
];
PHP
        );

        $exitCode = Artisan::call('basekit:ui:migrate-theme', [
            '--from' => 'v1',
            '--to' => 'v2',
            '--dry-run' => true,
        ]);

        expect($exitCode)->toBe(0);

        $configContent = File::get($configPath);
        expect($configContent)->toContain("'version' => '1'");
    });
});
