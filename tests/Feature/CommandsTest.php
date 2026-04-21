<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\File;

beforeEach(function (): void {
    File::delete(config_path('basekit-laravel-ui.php'));
    File::delete(base_path('storage/basekit-styleguide-test.html'));
});

afterEach(function (): void {
    File::delete(config_path('basekit-laravel-ui.php'));
    File::delete(base_path('storage/basekit-styleguide-test.html'));
});

test('commands are registered', function (): void {
    $commands = Artisan::all();

    expect($commands)->toHaveKey('basekit:ui:build');
    expect($commands)->toHaveKey('basekit:ui:migrate-theme');
    expect($commands)->toHaveKey('basekit:ui:styleguide');
});

test('build command generates css file', function (): void {
    $outputRelativePath = 'vendor/basekit-laravel/testing/basekit-ui.css';
    $outputAbsolutePath = public_path($outputRelativePath);

    config()->set('basekit-laravel-ui.build.output_path', $outputRelativePath);

    File::delete($outputAbsolutePath);

    $exitCode = Artisan::call('basekit:ui:build');

    expect($exitCode)->toBe(0);

    expect(File::exists($outputAbsolutePath))->toBeTrue();

    $css = File::get($outputAbsolutePath);
    expect($css)->toContain(':root');
    expect(trim($css))->not->toBe('');
    expect($css)->toContain('bk-');
});

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

test('styleguide command generates html snapshot', function (): void {
    config(['cache.default' => 'array']);
    $outputPath = base_path('storage/basekit-styleguide-test.html');

    if (! File::isDirectory(dirname($outputPath))) {
        File::makeDirectory(dirname($outputPath), 0755, true);
    }

    File::delete($outputPath);

    $exitCode = Artisan::call('basekit:ui:styleguide', [
        '--output' => $outputPath,
    ]);

    expect($exitCode)->toBe(0);

    expect(File::exists($outputPath))->toBeTrue();

    $html = File::get($outputPath);
    expect($html)->toContain('<!DOCTYPE html>');
    expect($html)->toContain('cdn.jsdelivr.net/npm/alpinejs@3/dist/cdn.min.js');
    expect($html)->toContain('Basekit Laravel UI');
});
