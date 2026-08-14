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

    test('input renders an error state for a real error message', function () {
        $html = Blade::render('<x-basekit-ui::input name="email" type="email" error="The email must be a valid email address." />');
        expect($html)
            ->toContain('bk-input__container--error')
            ->toContain('bk-input__control--error')
            ->toContain('aria-invalid="true"')
            ->toContain('bk-input__error-message')
            ->toContain('The email must be a valid email address.');
    });

    test('input does not render an error state for an empty error string', function () {
        $html = Blade::render('<x-basekit-ui::input name="email" type="email" error="" />');
        expect($html)
            ->not->toContain('bk-input__container--error')
            ->not->toContain('bk-input__control--error')
            ->not->toContain('aria-invalid="true"')
            ->not->toContain('bk-input__error-message');
    });

    test('input keeps the error state when marked invalid without a message', function () {
        $html = Blade::render('<x-basekit-ui::input name="password" type="password" invalid />');
        expect($html)
            ->toContain('bk-input__container--error')
            ->toContain('bk-input__control--error')
            ->toContain('aria-invalid="true"');
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

    test('select does not render an error state for an empty error string', function () {
        $html = Blade::render('<x-basekit-ui::select name="role" label="Role" error=""><option value="admin">Admin</option></x-basekit-ui::select>');
        expect($html)
            ->not->toContain('bk-select__container--error')
            ->not->toContain('bk-select__control--error')
            ->not->toContain('bk-select__error-message')
            ->not->toContain('aria-invalid="true"');
    });

    test('select renders an error state for a real error message', function () {
        $html = Blade::render('<x-basekit-ui::select name="role" label="Role" error="The selected role is invalid."><option value="admin">Admin</option></x-basekit-ui::select>');
        expect($html)
            ->toContain('bk-select__container--error')
            ->toContain('bk-select__control--error')
            ->toContain('bk-select__error-message')
            ->toContain('The selected role is invalid.');
    });

    test('checkbox does not render an error state for an empty error string', function () {
        $html = Blade::render('<x-basekit-ui::checkbox label="Accept" error="" />');
        expect($html)->not->toContain('bk-checkbox__container--error');
    });

    test('textarea does not render an error state for an empty error string', function () {
        $html = Blade::render('<x-basekit-ui::textarea name="bio" error="" />');
        expect($html)->not->toContain('bk-textarea__container--error');
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

    test('copy-button renders value via data attribute and clipboard handler', function () {
        $html = Blade::render('<x-basekit-ui::copy-button value="secret-token" label="Copy" copied-label="Copied!" />');
        expect($html)
            ->toContain('bk-button')
            ->toContain('bk-button--secondary')
            ->toContain('data-value="secret-token"')
            ->toContain('navigator.clipboard.writeText($el.dataset.value)')
            ->toContain('Copy')
            ->toContain('Copied!')
            ->toContain('aria-live="polite"');
    });

    test('copy-button renders slot content when provided', function () {
        $html = Blade::render('<x-basekit-ui::copy-button value="abc">Copy token</x-basekit-ui::copy-button>');
        expect($html)->toContain('Copy token');
        expect($html)->toContain('data-value="abc"');
    });

    test('copy-button honours variant and size props', function () {
        $html = Blade::render('<x-basekit-ui::copy-button value="x" label="Copy" variant="ghost" size="sm" />');
        expect($html)
            ->toContain('bk-button--ghost')
            ->toContain('bk-button--sm');
    });

    test('copy-button does not interpolate value into inline javascript', function () {
        $html = Blade::render('<x-basekit-ui::copy-button value="abc&#039;&quot;&gt;&lt;script&gt;alert(1)&lt;/script&gt;" label="Copy" />');
        expect($html)->not->toContain('writeText(\'abc');
    });
});
