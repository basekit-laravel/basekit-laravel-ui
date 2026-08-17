<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\File;

beforeEach(function (): void {
    File::deleteDirectory(public_path('vendor/basekit-laravel'));
});

afterEach(function (): void {
    File::deleteDirectory(public_path('vendor/basekit-laravel'));
});

describe('Publishing', function (): void {
    test('css v1 publish tag copies dist files not the entire css directory', function (): void {
        Artisan::call('vendor:publish', ['--tag' => 'basekit-laravel-ui-css-v1']);

        $publishedDir = public_path('vendor/basekit-laravel/v1');

        expect(File::isDirectory($publishedDir))->toBeTrue('Published directory should exist');

        // The dist files should be directly in the v1 directory
        expect(File::exists($publishedDir.'/theme.css'))->toBeTrue(
            'theme.css should be directly in vendor/basekit-laravel/v1/'
        );
        expect(File::exists($publishedDir.'/theme.min.css'))->toBeTrue(
            'theme.min.css should be directly in vendor/basekit-laravel/v1/'
        );
        expect(File::isDirectory($publishedDir.'/components'))->toBeTrue(
            'components/ directory should be directly in vendor/basekit-laravel/v1/'
        );

        // The publish should NOT create a nested "css" subdirectory
        expect(File::isDirectory($publishedDir.'/css'))->toBeFalse(
            'Should not create a nested css/ directory'
        );
    });

    test('config publish tag copies config file', function (): void {
        Artisan::call('vendor:publish', ['--tag' => 'basekit-laravel-ui-config']);

        expect(File::exists(config_path('basekit-laravel-ui.php')))->toBeTrue();

        $config = require config_path('basekit-laravel-ui.php');
        expect($config)->toHaveKey('components');
        expect($config)->toHaveKey('icons');
        expect($config)->toHaveKey('build');
    });

    test('views publish tag copies view files', function (): void {
        Artisan::call('vendor:publish', ['--tag' => 'basekit-views']);

        $viewsDir = resource_path('views/vendor/basekit-laravel');
        expect(File::isDirectory($viewsDir))->toBeTrue();
        expect(File::isDirectory($viewsDir.'/components'))->toBeTrue();
    });
});
