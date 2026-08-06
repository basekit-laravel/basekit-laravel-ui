<?php

declare(strict_types=1);

use BasekitLaravel\BasekitLaravelUi\Support\ThemeColor;
use Illuminate\Support\Facades\Blade;

beforeEach(function (): void {
    config(['cache.default' => 'array']);
});

describe('Meta Components', function () {
    test('seo renders the title with the site name suffix', function (): void {
        $html = Blade::render('<x-basekit-ui::seo title="Pricing" site-name="Acme" />');

        expect($html)->toContain('<title>Pricing · Acme</title>');
        expect($html)->toContain('<meta property="og:site_name" content="Acme">');
    });

    test('seo falls back to the site name when the title is empty', function (): void {
        $html = Blade::render('<x-basekit-ui::seo site-name="Acme" />');

        expect($html)->toContain('<title>Acme</title>');
    });

    test('seo renders description, canonical and og image when provided', function (): void {
        $html = Blade::render(
            '<x-basekit-ui::seo title="Pricing" site-name="Acme" description="Plans" canonical="https://acme.test/pricing" og-image="https://acme.test/og.png" />'
        );

        expect($html)->toContain('<meta name="description" content="Plans">');
        expect($html)->toContain('<link rel="canonical" href="https://acme.test/pricing">');
        expect($html)->toContain('<meta property="og:url" content="https://acme.test/pricing">');
        expect($html)->toContain('<meta property="og:image" content="https://acme.test/og.png">');
        expect($html)->toContain('<meta name="twitter:image" content="https://acme.test/og.png">');
    });

    test('seo omits optional tags when their value is not set', function (): void {
        $html = Blade::render('<x-basekit-ui::seo title="Pricing" site-name="Acme" />');

        expect($html)->not->toContain('rel="canonical"');
        expect($html)->not->toContain('og:image');
        expect($html)->not->toContain('name="robots"');
    });

    test('seo emits noindex robots directive', function (): void {
        $html = Blade::render('<x-basekit-ui::seo title="Pricing" site-name="Acme" :noindex="true" />');

        expect($html)->toContain('<meta name="robots" content="noindex, follow">');
    });
});

describe('Theme Components', function () {
    test('theme-variables emits css variables for palette slots', function (): void {
        $html = Blade::render("<x-basekit-ui::theme-variables :colors=\"['primary' => 'indigo', 'danger' => 'red']\" />");

        expect($html)->toContain('<style>');
        expect($html)->toContain('--color-primary-500:');
        expect($html)->toContain('--color-primary-950:');
        expect($html)->toContain('--color-danger-500:');
    });

    test('theme-variables accepts an explicit shade map', function (): void {
        $html = Blade::render("<x-basekit-ui::theme-variables :colors=\"['accent' => [500 => '#ff0000', 600 => '#cc0000']]\" />");

        expect($html)->toContain('--color-accent-500: #ff0000;');
        expect($html)->toContain('--color-accent-600: #cc0000;');
    });

    test('theme-variables renders nothing for an empty color set', function (): void {
        $html = Blade::render('<x-basekit-ui::theme-variables />');

        expect($html)->not->toContain('<style>');
    });

    test('theme-color palette falls back to indigo for unknown names', function (): void {
        expect(ThemeColor::palette('missing'))->toBe(ThemeColor::palette('indigo'));
    });

    test('theme-color exposes all registered palettes', function (): void {
        expect(ThemeColor::names())->toContain('indigo', 'slate', 'sky', 'emerald');
        expect(count(ThemeColor::names()))->toBe(26);
    });

    test('theme-color palettes contain the full shade range', function (): void {
        $palette = ThemeColor::palette('indigo');

        expect($palette)->toHaveKeys([50, 100, 200, 300, 400, 500, 600, 700, 800, 900, 950]);
    });
});
