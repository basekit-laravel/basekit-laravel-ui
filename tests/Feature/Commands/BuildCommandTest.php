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

    test('build command keeps the input error border on hover', function (): void {
        $exitCode = Artisan::call('basekit:ui:build');
        expect($exitCode)->toBe(0);

        $css = File::get(public_path('vendor/basekit-laravel/v1/basekit-ui.css'));

        expect($css)->toContain('bk-input__control--error');
        expect($css)->toContain('bk-input__container:hover .bk-input__control:not(:disabled):not([readonly]):not(.bk-input__control--error):not([aria-invalid="true"])');
        expect($css)->toContain('border-color: var(--input-error-border-color)');
    });

    test('build command keeps the select and multi-select error borders on hover', function (): void {
        $exitCode = Artisan::call('basekit:ui:build');
        expect($exitCode)->toBe(0);

        $css = File::get(public_path('vendor/basekit-laravel/v1/basekit-ui.css'));

        expect($css)->toContain('.bk-select__control:hover:not(:disabled):not(.bk-select__control--error):not([aria-invalid="true"])');
        expect($css)->toContain('.bk-multiselect__control:hover:not(:disabled):not(.bk-multiselect__control--error):not([aria-invalid="true"])');
    });

    test('build command includes reserved message slot styles for form components', function (): void {
        $exitCode = Artisan::call('basekit:ui:build');
        expect($exitCode)->toBe(0);

        $css = File::get(public_path('vendor/basekit-laravel/v1/basekit-ui.css'));

        expect($css)->toContain('.bk-input__messages');
        expect($css)->toContain('.bk-select__messages');
        expect($css)->toContain('.bk-multiselect__messages');
        expect($css)->toContain('.bk-checkbox__messages');
        expect($css)->toContain('.bk-radio__messages');
        expect($css)->toContain('.bk-toggle__messages');
        expect($css)->toContain('.bk-textarea__messages');
        expect($css)->toContain('min-height: 1.25rem');
    });
});
