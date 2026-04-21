<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Blade;

beforeEach(function (): void {
    config(['cache.default' => 'array']);
});

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

test('dropdown menu renders before and after slots around items', function (): void {
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

    expect($html)->toContain('Before menu');
    expect($html)->toContain('Profile');
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

test('badge renders icon from icon prop', function (): void {
    $html = Blade::render('<x-basekit-ui::badge variant="success" icon="check">Verified</x-basekit-ui::badge>');

    expect($html)->toContain('Verified');
    expect($html)->toContain('bk-badge__icon');
    expect($html)->toContain('<svg');
});

test('badge renders custom inline svg icon slot', function (): void {
    $html = Blade::render(<<<'BLADE'
        <x-basekit-ui::badge variant="info">
            <x-slot:icon>
                <svg viewBox="0 0 24 24" aria-hidden="true"><circle cx="12" cy="12" r="9"></circle></svg>
            </x-slot:icon>
            Informational
        </x-basekit-ui::badge>
    BLADE);

    expect($html)->toContain('Informational');
    expect($html)->toContain('<svg viewBox="0 0 24 24" aria-hidden="true"><circle cx="12" cy="12" r="9"></circle></svg>');
});

test('avatar applies shape modifier from shape prop', function (): void {
    $html = Blade::render('<x-basekit-ui::avatar shape="square" />');

    expect($html)->toContain('bk-avatar--square');
});

test('avatar applies shape modifier from variant alias', function (): void {
    $html = Blade::render('<x-basekit-ui::avatar variant="soft" />');

    expect($html)->toContain('bk-avatar--soft');
});

test('avatar renders status indicator from status prop', function (): void {
    $html = Blade::render('<x-basekit-ui::avatar status="online" />');

    expect($html)->toContain('bk-avatar__status');
    expect($html)->toContain('bk-avatar__status--online');
});

test('avatar ignores invalid status values', function (): void {
    $html = Blade::render('<x-basekit-ui::avatar status="typing" />');

    expect($html)->not->toContain('bk-avatar__status');
});

test('ordered list defaults to decimal marker', function (): void {
    $html = Blade::render('<x-basekit-ui::list :ordered="true"><li>First</li><li>Second</li></x-basekit-ui::list>');

    expect($html)->toContain('<ol');
    expect($html)->toContain('bk-list--ordered');
    expect($html)->toContain('bk-list--marker-decimal');
    expect($html)->not->toContain('bk-list--marker-disc');
});

test('ordered list allows explicit marker override', function (): void {
    $html = Blade::render('<x-basekit-ui::list :ordered="true" marker="none"><li>First</li><li>Second</li></x-basekit-ui::list>');

    expect($html)->toContain('<ol');
    expect($html)->toContain('bk-list--marker-none');
});

test('list can render items from array prop', function (): void {
    $html = Blade::render('<x-basekit-ui::list :items="[\'Item 1\', \'Item 2\']" />');

    expect($html)->toContain('<ul');
    expect($html)->toContain('<li>Item 1</li>');
    expect($html)->toContain('<li>Item 2</li>');
});

test('list prefers slot content over items array for custom li rendering', function (): void {
    $html = Blade::render('<x-basekit-ui::list :items="[\'Array Item\']"><li class="py-3">Custom Item</li></x-basekit-ui::list>');

    expect($html)->toContain('Custom Item');
    expect($html)->toContain('class="py-3"');
    expect($html)->not->toContain('Array Item');
});

test('description list can render items from associative array', function (): void {
    $html = Blade::render('<x-basekit-ui::description-list :items="[\'Name\' => \'John Doe\', \'Email\' => \'john@example.com\']" />');

    expect($html)->toContain('<dt>Name</dt>');
    expect($html)->toContain('<dd>John Doe</dd>');
    expect($html)->toContain('<dt>Email</dt>');
    expect($html)->toContain('<dd>john@example.com</dd>');
});

test('description list prefers slot over items array for custom markup', function (): void {
    $html = Blade::render('<x-basekit-ui::description-list :items="[\'Name\' => \'John Doe\']"><dt class="font-semibold">Custom Name</dt><dd>Custom Value</dd></x-basekit-ui::description-list>');

    expect($html)->toContain('Custom Name');
    expect($html)->toContain('Custom Value');
    expect($html)->toContain('class="font-semibold"');
    expect($html)->not->toContain('<dt>Name</dt>');
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

test('styleguide wrapper component renders', function (): void {
    /** @var array<string, class-string> $registered */
    $registered = app('blade.compiler')->getClassComponentAliases();

    expect($registered)->toHaveKey('styleguide-wrapper');

    $html = Blade::render('<x-styleguide-wrapper :sections="[]" />');

    expect($html)->toBeString();
    expect($html)->toContain('max-w-7xl');
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
