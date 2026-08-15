<?php

declare(strict_types=1);

use BasekitLaravel\BasekitLaravelUi\View\Components\Support\ComponentColorResolver;

describe('Component Color Resolver', function (): void {
    test('select color shortcut only tints the border, hover border and focus ring', function (): void {
        $style = ComponentColorResolver::resolve('select', 'secondary', 'indigo-500');

        expect($style)
            ->toContain('--select-secondary-border-color: var(--color-indigo-700)')
            ->toContain('--select-hover-border-color: var(--color-indigo-600)')
            ->toContain('--select-secondary-ring-color: var(--color-indigo-100)')
            ->not->toContain('--select-bg')
            ->not->toContain('--select-color');
    });

    test('multi-select color shortcut only tints the border, hover border and focus ring', function (): void {
        $style = ComponentColorResolver::resolve('multi-select', 'secondary', 'emerald-500');

        expect($style)
            ->toContain('--multiselect-secondary-border-color: var(--color-emerald-700)')
            ->toContain('--multiselect-hover-border-color: var(--color-emerald-600)')
            ->toContain('--multiselect-secondary-ring-color: var(--color-emerald-100)');
    });

    test('input color shortcut behavior is unchanged', function (): void {
        $style = ComponentColorResolver::resolve('input', 'secondary', 'pink-500');

        expect($style)
            ->toContain('--input-secondary-border-color: var(--color-pink-700)')
            ->toContain('--input-hover-border-color: var(--color-pink-600)')
            ->toContain('--input-secondary-ring-color: var(--color-pink-100)')
            ->not->toContain('--input-bg');
    });

    test('select explicit background and text props still apply', function (): void {
        $background = ComponentColorResolver::resolve('select', 'secondary', background: 'red-100');

        expect($background)->toContain('--select-bg: var(--color-red-100)');

        $text = ComponentColorResolver::resolve('select', 'secondary', text: 'indigo-800');

        expect($text)->toContain('--select-color: var(--color-indigo-800)');
    });

    test('filled components still expand the color shortcut across background, text and border', function (): void {
        $button = ComponentColorResolver::resolve('button', 'primary', 'indigo-500');

        expect($button)
            ->toContain('--button-bg-primary: var(--color-indigo-500)')
            ->toContain('--button-text-primary: var(--color-indigo-100)')
            ->toContain('--button-border-primary: var(--color-indigo-700)')
            ->toContain('--button-hover-bg-primary: var(--color-indigo-600)')
            ->toContain('--button-focus-ring-primary: var(--color-indigo-100)');

        $checkbox = ComponentColorResolver::resolve('checkbox', 'primary', 'emerald-500');

        expect($checkbox)->toContain('--checkbox-primary-checked-bg: var(--color-emerald-500)');
    });
});
