<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Blade;

beforeEach(function (): void {
    config(['cache.default' => 'array']);
});

describe('Dialog Components', function () {
    test('modal renders with slot content', function () {
        $html = Blade::render('<x-basekit-ui::modal open><div>Modal Content</div></x-basekit-ui::modal>');
        expect($html)->toContain('Modal Content');
        expect($html)->toContain('bk-modal');
    });

    test('modal renders with title and footer slots', function () {
        $html = Blade::render(<<<'BLADE'
            <x-basekit-ui::modal open>
                <x-slot:title>Dialog Title</x-slot:title>
                <div>Dialog Body</div>
                <x-slot:footer>Dialog Footer</x-slot:footer>
            </x-basekit-ui::modal>
        BLADE);
        expect($html)->toContain('Dialog Title');
        expect($html)->toContain('Dialog Body');
        expect($html)->toContain('Dialog Footer');
    });

    test('accordion renders with multiple items (slot-based)', function () {
        $html = Blade::render(<<<'BLADE'
            <x-basekit-ui::accordion>
                <div title="Section 1">Content 1</div>
                <div title="Section 2">Content 2</div>
            </x-basekit-ui::accordion>
        BLADE);
        expect($html)->toContain('Section 1');
        expect($html)->toContain('Content 1');
        expect($html)->toContain('Section 2');
        expect($html)->toContain('Content 2');
        expect($html)->toContain('bk-accordion');
    });
});
