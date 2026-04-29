<?php

declare(strict_types=1);

use BasekitLaravel\BasekitLaravelUi\Enums\Orientation;
use BasekitLaravel\BasekitLaravelUi\Enums\Variant;
use BasekitLaravel\BasekitLaravelUi\View\Components\Form\Button;
use BasekitLaravel\BasekitLaravelUi\View\Components\Support\ComponentPropResolver;

beforeEach(function (): void {
    config(['cache.default' => 'array']);
});

describe('Component Prop Resolver', function () {
    test('resolve default enum falls back to enum default for invalid values', function (): void {
        $resolved = ComponentPropResolver::resolveDefaultEnum(Orientation::class, 'sideways');

        expect($resolved)->toBe(Orientation::Left);
    });

    test('button falls back to left icon orientation for invalid values', function (): void {
        $button = new Button(iconOrientation: 'sideways');

        expect($button->iconOrientation)->toBe(Orientation::Left);
    });

    test('button uses configured default variant when provided variant is not allowed', function (): void {
        config([
            'basekit.components.button.variants' => ['primary', 'ghost'],
            'basekit.components.button.default_variant' => 'ghost',
        ]);

        $button = new Button(variant: 'danger');

        expect($button->variant)->toBe(Variant::Ghost);
    });
});
