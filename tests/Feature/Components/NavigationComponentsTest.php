<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Blade;

beforeEach(function (): void {
    config(['cache.default' => 'array']);
});

describe('Navigation Components', function () {
    test('breadcrumb renders with items', function () {
        $html = Blade::render('<x-basekit-ui::breadcrumb :items="[[\'label\'=>\'Home\',\'url\'=>\'/\'],[\'label\'=>\'Docs\',\'url\'=>\'/docs\']]" />');
        expect($html)->toContain('Home');
        expect($html)->toContain('Docs');
        expect($html)->toContain('bk-breadcrumb');
    });

    test('pagination renders with current and total pages', function () {
        $html = Blade::render('<x-basekit-ui::pagination :current-page="2" :total-pages="5" path="/items" />');
        expect($html)->toContain('rel="prev"');
        expect($html)->toContain('rel="next"');
        expect($html)->toContain('bk-pagination');
    });

    test('pagination simple type renders prev/next without page numbers', function (): void {
        $html = Blade::render('<x-basekit-ui::pagination :current-page="2" :total-pages="5" type="simple" path="/items" />');

        expect($html)->toContain('rel="prev"');
        expect($html)->toContain('rel="next"');
        expect($html)->not->toContain('bk-pagination__pages');
    });

    test('pagination can render computed info text', function (): void {
        $html = Blade::render(
            '<x-basekit-ui::pagination :current-page="2" :total-pages="5" :per-page="15" :total="68" :show-info="true" info-text="Showing :from to :to of :total results" path="/items" />',
        );

        expect($html)->toContain('Showing 16 to 30 of 68 results');
    });

    test('pagination info slot overrides default info text and renders per-page selector', function (): void {
        $html = Blade::render(
            '<x-basekit-ui::pagination :current-page="1" :total-pages="5" :per-page="15" :total="68" :show-info="true" :show-per-page="true" :per-page-options="[10, 15, 30]" path="/items"><x-slot:info><span>Custom info</span></x-slot:info></x-basekit-ui::pagination>',
        );

        expect($html)->toContain('Custom info');
        expect($html)->not->toContain('Showing 1 to 15 of 68 results');
        expect($html)->toContain('name="per_page"');
        expect($html)->toContain('<option value="15" selected');
    });

    test('pagination previous and next labels are overridable', function (): void {
        $html = Blade::render(
            '<x-basekit-ui::pagination :current-page="2" :total-pages="5" previous-label="Back" next-label="Continue" path="/items" />',
        );

        expect($html)->toContain('Back');
        expect($html)->toContain('Continue');
        expect($html)->not->toContain('<span>Previous</span>');
        expect($html)->not->toContain('<span>Next</span>');
    });

    test('tabs renders with items and selected', function () {
        $html = Blade::render('<x-basekit-ui::tabs :items="[[\'label\'=>\'Tab1\',\'value\'=>\'tab1\'],[\'label\'=>\'Tab2\',\'value\'=>\'tab2\']]" selected="tab2" />');
        expect($html)->toContain('Tab1');
        expect($html)->toContain('Tab2');
        expect($html)->toContain('bk-tabs');
    });

    test('dropdown-menu renders with items and slots', function () {
        $html = Blade::render(<<<'BLADE'
            <x-basekit-ui::dropdown-menu :items="[['label' => 'Profile', 'url' => '/profile']]">
                <x-slot:before-menu>
                    <div>Before menu</div>
                </x-slot:before-menu>
                <x-slot:after-menu>
                    <div>After menu</div>
                </x-slot:after-menu>
            </x-basekit-ui::dropdown-menu>
        BLADE);
        expect($html)->toContain('Profile');
        expect($html)->toContain('Before menu');
        expect($html)->toContain('After menu');
    });

    test('dropdown menu renders inline svg item icons', function (): void {
        $html = Blade::render(<<<'BLADE'
        @php
            $items = [[
                'label' => 'Help',
                'url' => '/help',
                'iconSvg' => '<svg viewBox="0 0 24 24"><circle cx="12" cy="12" r="9"></circle></svg>',
            ]];
        @endphp

        <x-basekit-ui::dropdown-menu :items="$items" />
    BLADE);

        expect($html)->toContain('<svg viewBox="0 0 24 24"><circle cx="12" cy="12" r="9"></circle></svg>');
        expect($html)->toContain('Help');
    });

    test('dropdown menu renders nested child items from items array', function (): void {
        $html = Blade::render(<<<'BLADE'
        @php
            $items = [
                ['label' => 'New', 'url' => '/new'],
                [
                    'label' => 'Recent',
                    'icon' => 'clock',
                    'children' => [
                        ['label' => 'Project Atlas', 'url' => '/recent/1'],
                        ['label' => 'Project Nova', 'url' => '/recent/2'],
                    ],
                ],
            ];
        @endphp

        <x-basekit-ui::dropdown-menu :items="$items" />
    BLADE);

        expect($html)->toContain('Recent');
        expect($html)->toContain('Project Atlas');
        expect($html)->toContain('Project Nova');
        expect($html)->toContain('bk-dropdown__submenu-panel');
    });

    test('badge renders icon from icon prop', function (): void {
        $html = Blade::render('<x-basekit-ui::badge variant="success" icon="check">Verified</x-basekit-ui::badge>');

        expect($html)->toContain('Verified');
        expect($html)->toContain('bk-badge__icon');
        expect($html)->toContain('<svg');
    });

    test('link renders with href and slot', function () {
        $html = Blade::render('<x-basekit-ui::link href="/docs">Docs Link</x-basekit-ui::link>');
        expect($html)->toContain('Docs Link');
        expect($html)->toContain('href="/docs"');
        expect($html)->toContain('bk-link');
    });
});
