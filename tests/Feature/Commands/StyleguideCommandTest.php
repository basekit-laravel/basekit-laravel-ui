<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\File;

beforeEach(function (): void {
    File::delete(config_path('basekit-laravel-ui.php'));
    File::delete(base_path('storage/basekit-styleguide-test.html'));
    File::delete(base_path('storage/basekit-styleguide-advanced-demo.html'));
});

afterEach(function (): void {
    File::delete(config_path('basekit-laravel-ui.php'));
    File::delete(base_path('storage/basekit-styleguide-test.html'));
    File::delete(base_path('storage/basekit-styleguide-advanced-demo.html'));
});

describe('Styleguide Command', function () {
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

    test('styleguide command generates advanced-demo snapshot', function (): void {
        config(['cache.default' => 'array']);
        $outputPath = base_path('storage/basekit-styleguide-advanced-demo.html');

        if (! File::isDirectory(dirname($outputPath))) {
            File::makeDirectory(dirname($outputPath), 0755, true);
        }

        File::delete($outputPath);

        $exitCode = Artisan::call('basekit:ui:styleguide', [
            '--output' => $outputPath,
            '--view' => 'basekit::styleguide.advanced-demo',
        ]);

        expect($exitCode)->toBe(0);

        expect(File::exists($outputPath))->toBeTrue();

        $html = File::get($outputPath);
        expect($html)->toContain('<!DOCTYPE html>');
        expect($html)->toContain('cdn.jsdelivr.net/npm/alpinejs@3/dist/cdn.min.js');
        expect($html)->toContain('Basekit Laravel UI');
        expect($html)->toContain('A modular Laravel UI component library');
    });
});
