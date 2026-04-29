<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Blade;

beforeEach(function (): void {
    config(['cache.default' => 'array']);
});

describe('Component Rendering', function () {

    /** @var list<string> $componentAliases */
    $componentAliases = [
        'basekit-ui::button',
        'basekit-ui::input',
        'basekit-ui::textarea',
        'basekit-ui::checkbox',
        'basekit-ui::radio',
        'basekit-ui::select',
        'basekit-ui::multi-select',
        'basekit-ui::toggle',
        'basekit-ui::toast',
        'basekit-ui::tooltip',
        'basekit-ui::progress',
        'basekit-ui::spinner',
        'basekit-ui::skeleton',
        'basekit-ui::empty-state',
        'basekit-ui::breadcrumb',
        'basekit-ui::pagination',
        'basekit-ui::tabs',
        'basekit-ui::dropdown-menu',
        'basekit-ui::link',
        'basekit-ui::card',
        'basekit-ui::container',
        'basekit-ui::badge',
        'basekit-ui::avatar',
        'basekit-ui::description-list',
        'basekit-ui::divider',
        'basekit-ui::grid',
        'basekit-ui::list',
        'basekit-ui::stack',
        'basekit-ui::stat',
        'basekit-ui::table',
        'basekit-ui::alert',
        'basekit-ui::modal',
        'basekit-ui::accordion',
    ];

    test('component alias is registered', function (string $alias): void {
        /** @var array<string, class-string> $registered */
        $registered = app('blade.compiler')->getClassComponentAliases();

        expect($registered)->toHaveKey($alias);
    })->with($componentAliases);

    test('component renders without exception', function (string $alias): void {
        $template = $alias === 'basekit-ui::table'
            ? "<x-{$alias} :columns=\"[]\" :rows=\"[]\" />"
            : "<x-{$alias} />";

        $html = Blade::render($template);

        expect($html)->toBeString();
        expect(trim($html))->not->toBe('');
    })->with($componentAliases);

    test('styleguide wrapper component renders', function (): void {
        /** @var array<string, class-string> $registered */
        $registered = app('blade.compiler')->getClassComponentAliases();

        expect($registered)->toHaveKey('styleguide-wrapper');

        $html = Blade::render('<x-styleguide-wrapper :sections="[]" />');

        expect($html)->toBeString();
        expect($html)->toContain('max-w-7xl');
    });
});
