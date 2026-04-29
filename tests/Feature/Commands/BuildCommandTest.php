<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\File;

beforeEach(function (): void {
    File::delete(public_path('vendor/basekit-laravel/v1/basekit-ui.css'));
});

afterEach(function (): void {
    File::delete(public_path('vendor/basekit-laravel/v1/basekit-ui.css'));
});

describe('Build Command', function () {
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

    test('build command excludes disabled components from CSS', function (): void {
        config(['basekit-laravel-ui.components.button.enabled' => false]);
        config(['basekit-laravel-ui.components.input.enabled' => true]);

        $exitCode = Artisan::call('basekit:ui:build');
        expect($exitCode)->toBe(0);

        $css = File::get(public_path('vendor/basekit-laravel/v1/basekit-ui.css'));
        expect($css)->not->toContain('.bk-button');
        expect($css)->toContain('.bk-input');
    });

    test('build command includes correct variants and sizes', function (): void {
        config([
            'basekit-laravel-ui.components.button.enabled' => true,
            'basekit-laravel-ui.components.button.variants' => ['primary'],
            'basekit-laravel-ui.components.button.sizes' => ['sm'],
        ]);

        $exitCode = Artisan::call('basekit:ui:build');
        expect($exitCode)->toBe(0);

        $css = File::get(public_path('vendor/basekit-laravel/v1/basekit-ui.css'));
        expect($css)->toContain('.bk-button');
        // Optionally, check for a class or selector unique to the primary/sm variant
        expect($css)->toContain('.bk-button--primary');
        expect($css)->toContain('.bk-button--sm');
    });
});
