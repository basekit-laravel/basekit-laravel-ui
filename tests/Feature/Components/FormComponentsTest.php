<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Blade;

beforeEach(function (): void {
    config(['cache.default' => 'array']);
});

describe('Form Components', function () {
    test('button renders with variant and size', function () {
        $html = Blade::render('<x-basekit-ui::button variant="primary" size="lg">Click Me</x-basekit-ui::button>');
        expect($html)->toContain('Click Me');
        expect($html)->toContain('bk-button');
        expect($html)->toContain('bk-button--primary');
        expect($html)->toContain('bk-button--lg');
    });

    test('input renders with type and value', function () {
        $html = Blade::render('<x-basekit-ui::input type="email" value="test@example.com" />');
        expect($html)->toContain('type="email"');
        expect($html)->toContain('value="test@example.com"');
        expect($html)->toContain('bk-input');
    });

    test('textarea renders with value', function () {
        $html = Blade::render('<x-basekit-ui::textarea value="Some text" />');
        expect($html)->toContain('Some text');
        expect($html)->toContain('bk-textarea');
    });

    test('checkbox renders with label and checked', function () {
        $html = Blade::render('<x-basekit-ui::checkbox label="Accept" checked />');
        expect($html)->toContain('Accept');
        expect($html)->toContain('checked');
        expect($html)->toContain('bk-checkbox');
    });

    test('radio renders with label and checked', function () {
        $html = Blade::render('<x-basekit-ui::radio label="Option" checked />');
        expect($html)->toContain('Option');
        expect($html)->toContain('checked');
        expect($html)->toContain('bk-radio');
    });

    test('select renders with options and selected', function () {
        $html = Blade::render('<x-basekit-ui::select :options="[\'A\', \'B\']" selected="B" />');
        expect($html)->toContain('bk-select');
    });

    test('multi-select renders with options and value', function () {
        $html = Blade::render('<x-basekit-ui::multi-select name="tags" :options="[\'laravel\' => \'Laravel\', \'vue\' => \'Vue.js\']" :value="[\'laravel\']" />');
        expect($html)->toContain('bk-multiselect');
        expect($html)->toContain('Laravel');
        expect($html)->toContain('Vue.js');
    });

    test('toggle renders with checked and label', function () {
        $html = Blade::render('<x-basekit-ui::toggle checked label="Enable" />');
        expect($html)->toContain('Enable');
        expect($html)->toContain('checked');
        expect($html)->toContain('bk-toggle');
    });

    // Extra: test button with icon slot
    test('button renders custom icon slot', function () {
        $html = Blade::render(<<<'BLADE'
            <x-basekit-ui::button>
                <x-slot:icon>
                    <svg viewBox="0 0 24 24"><circle cx="12" cy="12" r="9"></circle></svg>
                </x-slot:icon>
                With Icon
            </x-basekit-ui::button>
        BLADE);
        expect($html)->toContain('With Icon');
        expect($html)->toContain('<svg viewBox="0 0 24 24"><circle cx="12" cy="12" r="9"></circle></svg>');
    });
});
