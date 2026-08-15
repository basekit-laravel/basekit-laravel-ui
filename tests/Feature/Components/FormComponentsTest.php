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

    // Validation message slot (prevents layout shift when errors appear) --------------------

    test('input reserves a message slot even without an error or hint', function () {
        $html = Blade::render('<x-basekit-ui::input name="name" />');
        expect($html)
            ->toContain('bk-input__messages')
            ->not->toContain('bk-input__error-message')
            ->not->toContain('bk-input__hint');
    });

    test('input renders the error message inside the reserved slot with an alert role', function () {
        $html = Blade::render('<x-basekit-ui::input name="name" error="The name field is required." />');
        expect($html)
            ->toContain('bk-input__messages')
            ->toContain('bk-input__error-message')
            ->toContain('role="alert"')
            ->toContain('The name field is required.');
    });

    test('input renders the hint inside the reserved slot', function () {
        $html = Blade::render('<x-basekit-ui::input name="name" hint="Visible only to you." />');
        expect($html)
            ->toContain('bk-input__messages')
            ->toContain('bk-input__hint')
            ->toContain('Visible only to you.')
            ->not->toContain('bk-input__error-message');
    });

    test('each form component reserves a message slot without an error', function (string $blade, string $slotClass, string $errorClass) {
        $html = Blade::render($blade);
        expect($html)
            ->toContain($slotClass)
            ->not->toContain($errorClass);
    })->with([
        'input' => ['<x-basekit-ui::input name="field" />', 'bk-input__messages', 'bk-input__error-message'],
        'textarea' => ['<x-basekit-ui::textarea name="field" />', 'bk-textarea__messages', 'bk-textarea__error-message'],
        'select' => ['<x-basekit-ui::select name="field" :options="[\'a\' => \'A\']" />', 'bk-select__messages', 'bk-select__error-message'],
        'multi-select' => ['<x-basekit-ui::multi-select name="field" :options="[\'a\' => \'A\']" />', 'bk-multiselect__messages', 'bk-multiselect__error-message'],
        'checkbox' => ['<x-basekit-ui::checkbox name="field" label="Accept" />', 'bk-checkbox__messages', 'bk-checkbox__error-message'],
        'radio' => ['<x-basekit-ui::radio name="field" label="Option" />', 'bk-radio__messages', 'bk-radio__error-message'],
        'toggle' => ['<x-basekit-ui::toggle name="field" label="Enable" />', 'bk-toggle__messages', 'bk-toggle__error-message'],
    ]);

    test('each form component renders the error message inside its reserved slot with an alert role', function (string $blade, string $slotClass, string $errorClass) {
        $html = Blade::render($blade);
        expect($html)
            ->toContain($slotClass)
            ->toContain($errorClass)
            ->toContain('role="alert"');
    })->with([
        'input' => ['<x-basekit-ui::input name="field" error="Required." />', 'bk-input__messages', 'bk-input__error-message'],
        'textarea' => ['<x-basekit-ui::textarea name="field" error="Required." />', 'bk-textarea__messages', 'bk-textarea__error-message'],
        'select' => ['<x-basekit-ui::select name="field" :options="[\'a\' => \'A\']" error="Required." />', 'bk-select__messages', 'bk-select__error-message'],
        'multi-select' => ['<x-basekit-ui::multi-select name="field" :options="[\'a\' => \'A\']" error="Required." />', 'bk-multiselect__messages', 'bk-multiselect__error-message'],
        'checkbox' => ['<x-basekit-ui::checkbox name="field" label="Accept" error="Required." />', 'bk-checkbox__messages', 'bk-checkbox__error-message'],
        'radio' => ['<x-basekit-ui::radio name="field" label="Option" error="Required." />', 'bk-radio__messages', 'bk-radio__error-message'],
        'toggle' => ['<x-basekit-ui::toggle name="field" label="Enable" error="Required." />', 'bk-toggle__messages', 'bk-toggle__error-message'],
    ]);

    test('each form component omits the reserved slot when reservation is disabled and no message is present', function (string $blade, string $slotClass) {
        $html = Blade::render($blade);
        expect($html)
            ->not->toContain($slotClass)
            ->not->toContain('__error-message')
            ->not->toContain('__hint');
    })->with([
        'input' => ['<x-basekit-ui::input name="field" :reserves-messages="false" />', 'bk-input__messages'],
        'textarea' => ['<x-basekit-ui::textarea name="field" :reserves-messages="false" />', 'bk-textarea__messages'],
        'select' => ['<x-basekit-ui::select name="field" :options="[\'a\' => \'A\']" :reserves-messages="false" />', 'bk-select__messages'],
        'multi-select' => ['<x-basekit-ui::multi-select name="field" :options="[\'a\' => \'A\']" :reserves-messages="false" />', 'bk-multiselect__messages'],
        'checkbox' => ['<x-basekit-ui::checkbox name="field" label="Accept" :reserves-messages="false" />', 'bk-checkbox__messages'],
        'radio' => ['<x-basekit-ui::radio name="field" label="Option" :reserves-messages="false" />', 'bk-radio__messages'],
        'toggle' => ['<x-basekit-ui::toggle name="field" label="Enable" :reserves-messages="false" />', 'bk-toggle__messages'],
    ]);

    test('each form component still renders a message when present even with reservation disabled', function (string $blade, string $slotClass, string $messageClass, string $message) {
        $html = Blade::render($blade);
        expect($html)
            ->toContain($slotClass)
            ->toContain($messageClass)
            ->toContain($message);
    })->with([
        'input error' => ['<x-basekit-ui::input name="field" error="Required." :reserves-messages="false" />', 'bk-input__messages', 'bk-input__error-message', 'Required.'],
        'input hint' => ['<x-basekit-ui::input name="field" hint="Helpful." :reserves-messages="false" />', 'bk-input__messages', 'bk-input__hint', 'Helpful.'],
        'checkbox hint' => ['<x-basekit-ui::checkbox name="field" label="Accept" hint="Helpful." :reserves-messages="false" />', 'bk-checkbox__messages', 'bk-checkbox__hint', 'Helpful.'],
        'toggle error' => ['<x-basekit-ui::toggle name="field" label="Enable" error="Required." :reserves-messages="false" />', 'bk-toggle__messages', 'bk-toggle__error-message', 'Required.'],
        'select hint' => ['<x-basekit-ui::select name="field" :options="[\'a\' => \'A\']" hint="Helpful." :reserves-messages="false" />', 'bk-select__messages', 'bk-select__hint', 'Helpful.'],
        'fieldset hint' => ['<x-basekit-ui::fieldset label="Topics" hint="Helpful." :reserves-messages="false" />', 'bk-fieldset__messages', 'bk-fieldset__hint', 'Helpful.'],
        'fieldset error' => ['<x-basekit-ui::fieldset label="Topics" error="Required." :reserves-messages="false" />', 'bk-fieldset__messages', 'bk-fieldset__error-message', 'Required.'],
    ]);

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

describe('Fieldset', function () {
    test('renders a semantic fieldset with a legend', function () {
        $html = Blade::render('<x-basekit-ui::fieldset label="Billing cycle" />');
        expect($html)
            ->toContain('<fieldset')
            ->toContain('<legend')
            ->toContain('Billing cycle')
            ->toContain('bk-fieldset');
    });

    test('renders without a legend when no label is given', function () {
        $html = Blade::render('<x-basekit-ui::fieldset />');
        expect($html)
            ->toContain('bk-fieldset')
            ->not->toContain('<legend');
    });

    test('reserves a single message line without an error or hint', function () {
        $html = Blade::render('<x-basekit-ui::fieldset label="Topics" />');
        expect($html)
            ->toContain('bk-fieldset__messages')
            ->not->toContain('bk-fieldset__error-message')
            ->not->toContain('bk-fieldset__hint');
    });

    test('renders the group error inside the reserved slot with an alert role', function () {
        $html = Blade::render('<x-basekit-ui::fieldset label="Topics" error="Please select at least one topic." />');
        expect($html)
            ->toContain('bk-fieldset__messages')
            ->toContain('bk-fieldset__error-message')
            ->toContain('role="alert"')
            ->toContain('Please select at least one topic.')
            ->not->toContain('bk-fieldset__hint');
    });

    test('renders the hint inside the reserved slot', function () {
        $html = Blade::render('<x-basekit-ui::fieldset label="Topics" hint="Choose at least one." />');
        expect($html)
            ->toContain('bk-fieldset__messages')
            ->toContain('bk-fieldset__hint')
            ->toContain('Choose at least one.')
            ->not->toContain('bk-fieldset__error-message');
    });

    test('renders grouped controls inside the items container', function () {
        $html = Blade::render(<<<'BLADE'
            <x-basekit-ui::fieldset label="Billing cycle">
                <x-basekit-ui::radio name="billing" value="monthly" label="Monthly" />
                <x-basekit-ui::radio name="billing" value="yearly" label="Yearly" />
            </x-basekit-ui::fieldset>
        BLADE);
        expect($html)
            ->toContain('bk-fieldset__items')
            ->toContain('Monthly')
            ->toContain('Yearly')
            ->toContain('bk-radio');
    });

    test('merges wrapper-class and attribute classes onto the fieldset', function () {
        $html = Blade::render('<x-basekit-ui::fieldset label="Topics" wrapper-class="mt-4" class="sm:col-span-2" />');
        expect($html)
            ->toContain('class="bk-fieldset mt-4 sm:col-span-2"')
            ->toContain('bk-fieldset__items');
    });
});
