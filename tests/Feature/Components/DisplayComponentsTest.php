<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Blade;

beforeEach(function (): void {
    config(['cache.default' => 'array']);
});

describe('Display Components', function () {
    test('table renders with columns and rows', function () {
        $html = Blade::render('<x-basekit-ui::table :columns="[[\'label\'=>\'Name\',\'key\'=>\'name\'],[\'label\'=>\'Email\',\'key\'=>\'email\']]" :rows="[[\'name\'=>\'John\',\'email\'=>\'john@example.com\']]" />');
        expect($html)->toContain('<table');
        expect($html)->toContain('John');
        expect($html)->toContain('john@example.com');
    });

    test('list renders unordered and ordered', function () {
        $ul = Blade::render('<x-basekit-ui::list :items="[\'A\', \'B\']" />');
        $ol = Blade::render('<x-basekit-ui::list :ordered="true" :items="[\'A\', \'B\']" />');
        expect($ul)->toContain('<ul');
        expect($ul)->toContain('<li>A</li>');
        expect($ol)->toContain('<ol');
        expect($ol)->toContain('<li>B</li>');
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

    test('list prefers slot over items array', function () {
        $html = Blade::render('<x-basekit-ui::list :items="[\'Array Item\']"><li>Custom Item</li></x-basekit-ui::list>');
        expect($html)->toContain('Custom Item');
        expect($html)->not->toContain('Array Item');
    });

    test('stat renders with value and label', function () {
        $html = Blade::render('<x-basekit-ui::stat value="42" label="Stars" />');
        expect($html)->toContain('42');
        expect($html)->toContain('Stars');
    });

    test('description-list renders associative array', function () {
        $html = Blade::render('<x-basekit-ui::description-list :items="[\'Key\' => \'Value\']" />');
        expect($html)->toContain('<dt>Key</dt>');
        expect($html)->toContain('<dd>Value</dd>');
    });

    test('description list prefers slot over items array for custom markup', function (): void {
        $html = Blade::render('<x-basekit-ui::description-list :items="[\'Name\' => \'John Doe\']"><dt class="font-semibold">Custom Name</dt><dd>Custom Value</dd></x-basekit-ui::description-list>');

        expect($html)->toContain('Custom Name');
        expect($html)->toContain('Custom Value');
        expect($html)->toContain('class="font-semibold"');
        expect($html)->not->toContain('<dt>Name</dt>');
    });

    test('avatar renders with variant and status', function () {
        $html = Blade::render('<x-basekit-ui::avatar variant="soft" status="online" />');
        expect($html)->toContain('bk-avatar--soft');
        expect($html)->toContain('bk-avatar__status--online');
    });

    test('avatar ignores invalid status', function () {
        $html = Blade::render('<x-basekit-ui::avatar status="unknown" />');
        expect($html)->not->toContain('bk-avatar__status');
    });

    test('avatar applies shape modifier from shape prop', function (): void {
        $html = Blade::render('<x-basekit-ui::avatar shape="square" />');

        expect($html)->toContain('bk-avatar--square');
    });

    test('avatar applies shape modifier from variant alias', function (): void {
        $html = Blade::render('<x-basekit-ui::avatar variant="soft" />');

        expect($html)->toContain('bk-avatar--soft');
    });

    test('badge renders with icon and slot', function () {
        $html = Blade::render('<x-basekit-ui::badge variant="success" icon="check">Verified</x-basekit-ui::badge>');
        expect($html)->toContain('Verified');
        expect($html)->toContain('bk-badge__icon');
    });

    test('badge renders custom inline svg icon slot', function () {
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

    // Extra: test table with empty rows
    test('table renders gracefully with no rows', function () {
        $html = Blade::render('<x-basekit-ui::table :columns="[[\'label\'=>\'Name\',\'key\'=>\'name\']]" :rows="[]" />');
        expect($html)->toContain('<table');
        // Should not error or throw
    });
});
