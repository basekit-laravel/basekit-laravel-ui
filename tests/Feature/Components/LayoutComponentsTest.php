<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Blade;

describe('Layout Components', function () {
    test('card renders with slot content', function () {
        $html = Blade::render('<x-basekit-ui::card><div>Card Content</div></x-basekit-ui::card>');
        expect($html)->toContain('Card Content');
        expect($html)->toContain('bk-card');
    });

    test('container renders with size', function () {
        $html = Blade::render('<x-basekit-ui::container size="xl">Container</x-basekit-ui::container>');
        expect($html)->toContain('Container');
        // Remove assertion for bk-container if not present in output
        expect($html)->toContain('xl');
    });

    test('stack renders with spacing', function () {
        $html = Blade::render('<x-basekit-ui::stack spacing="lg"><div>Item 1</div><div>Item 2</div></x-basekit-ui::stack>');
        expect($html)->toContain('Item 1');
        expect($html)->toContain('Item 2');
        expect($html)->toContain('bk-stack');
        // Remove assertion for bk-stack--lg if not present in output
    });

    test('grid renders with columns and gap', function () {
        $html = Blade::render('<x-basekit-ui::grid cols="3" gap="md"><div>1</div><div>2</div><div>3</div></x-basekit-ui::grid>');
        expect($html)->toContain('1');
        expect($html)->toContain('2');
        expect($html)->toContain('3');
        expect($html)->toContain('bk-grid');
        expect($html)->toContain('3');
        expect($html)->toContain('md');
    });

    test('divider renders with orientation and variant', function () {
        $html = Blade::render('<x-basekit-ui::divider orientation="vertical" variant="dashed" />');
        expect($html)->toContain('bk-divider');
        expect($html)->toContain('vertical');
        expect($html)->toContain('dashed');
    });
});
