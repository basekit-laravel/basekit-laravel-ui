<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Blade;

describe('Accessibility: Form Label Association', function () {
    test('input label has for attribute matching input id', function () {
        $html = Blade::render('<x-basekit-ui::input name="email" label="Email" type="email" />');
        expect($html)->toContain('for="')
            ->toContain('id="bk-input-');
        $forMatch = [];
        preg_match('/for="([^"]+)"/', $html, $forMatch);
        $idMatch = [];
        preg_match('/id="([^"]+)"/', $html, $idMatch);
        expect($forMatch[1])->not->toBeEmpty();
        expect($forMatch[1])->toBe($idMatch[1]);
    });

    test('textarea label has for attribute matching textarea id', function () {
        $html = Blade::render('<x-basekit-ui::textarea name="bio" label="Biography" />');
        expect($html)->toContain('for="')
            ->toContain('id="bk-textarea-');
        $forMatch = [];
        preg_match('/for="([^"]+)"/', $html, $forMatch);
        $idMatch = [];
        preg_match('/id="([^"]+)"/', $html, $idMatch);
        expect($forMatch[1])->not->toBeEmpty();
        expect($forMatch[1])->toBe($idMatch[1]);
    });

    test('select label has for attribute matching select id', function () {
        $html = Blade::render('<x-basekit-ui::select name="role" label="Role" :options="[\'admin\' => \'Admin\']" />');
        expect($html)->toContain('for="');
        $forMatch = [];
        preg_match('/for="([^"]+)"/', $html, $forMatch);
        expect($forMatch[1])->not->toBeEmpty();
    });

    test('multi-select label has for attribute matching button id', function () {
        $html = Blade::render('<x-basekit-ui::multi-select name="tags" label="Tags" :options="[\'laravel\' => \'Laravel\']" />');
        expect($html)->toContain('for="')
            ->toContain('id="bk-multiselect-');
        $forMatch = [];
        preg_match('/for="([^"]+)"/', $html, $forMatch);
        expect($forMatch[1])->not->toBeEmpty();
        expect($html)->toContain("id=\"{$forMatch[1]}\"");
    });

    test('input uses user-provided id for label association', function () {
        $html = Blade::render('<x-basekit-ui::input name="email" id="my-email" label="Email" />');
        expect($html)->toContain('for="my-email"')
            ->toContain('id="my-email"');
    });
});

describe('Accessibility: Error Describedby', function () {
    test('input error message has id matching aria-describedby', function () {
        $html = Blade::render('<x-basekit-ui::input name="email" label="Email" error="Invalid email." id="email" />');
        expect($html)->toContain('aria-describedby="email-error"')
            ->toContain('id="email-error"');
    });

    test('textarea error message has id matching aria-describedby', function () {
        $html = Blade::render('<x-basekit-ui::textarea name="bio" label="Bio" error="Too long." id="bio" />');
        expect($html)->toContain('aria-describedby="bio-error"')
            ->toContain('id="bio-error"');
    });

    test('input without id does not produce broken aria-describedby', function () {
        $html = Blade::render('<x-basekit-ui::input name="email" error="Invalid." />');
        expect($html)->not->toContain('aria-describedby="-error"');
    });

    test('textarea without id does not produce broken aria-describedby', function () {
        $html = Blade::render('<x-basekit-ui::textarea name="bio" error="Invalid." />');
        expect($html)->not->toContain('aria-describedby="-error"');
    });
});

describe('Accessibility: Hint Describedby', function () {
    test('input hint has id and is referenced by aria-describedby', function () {
        $html = Blade::render('<x-basekit-ui::input name="email" hint="We will never share this." id="email" />');
        expect($html)->toContain('aria-describedby="email-hint"')
            ->toContain('id="email-hint"');
    });

    test('textarea hint has id and is referenced by aria-describedby', function () {
        $html = Blade::render('<x-basekit-ui::textarea name="bio" hint="Max 500 chars." id="bio" />');
        expect($html)->toContain('aria-describedby="bio-hint"')
            ->toContain('id="bio-hint"');
    });
});

describe('Accessibility: Tooltip', function () {
    test('tooltip content has id and trigger has aria-describedby binding', function () {
        $html = Blade::render('<x-basekit-ui::tooltip content="Helpful tip"><button>Hover me</button></x-basekit-ui::tooltip>');
        expect($html)->toContain('role="tooltip"');
        $tooltipIdMatch = [];
        preg_match('/id="(bk-tooltip-[^"]+)"/', $html, $tooltipIdMatch);
        expect($tooltipIdMatch[1])->not->toBeEmpty();
        expect($html)->toContain(":aria-describedby=\"show ? '{$tooltipIdMatch[1]}' : undefined\"");
    });
});

describe('Accessibility: Tabs', function () {
    test('tabs have role=tab and aria-controls with matching id', function () {
        $html = Blade::render(<<<'BLADE'
            <x-basekit-ui::tabs :items="[
                ['label' => 'First', 'value' => 'first'],
                ['label' => 'Second', 'value' => 'second'],
            ]" active="first" />
        BLADE);
        expect($html)->toContain('role="tablist"')
            ->toContain('role="tab"')
            ->toContain('id="tab-first"')
            ->toContain('aria-controls="tabpanel-first"')
            ->toContain(':aria-selected=');
    });

    test('tabs have keyboard navigation handlers', function () {
        $html = Blade::render(<<<'BLADE'
            <x-basekit-ui::tabs :items="[
                ['label' => 'First', 'value' => 'first'],
                ['label' => 'Second', 'value' => 'second'],
            ]" active="first" />
        BLADE);
        expect($html)->toContain('@keydown.right.prevent')
            ->toContain('@keydown.left.prevent')
            ->toContain('@keydown.home.prevent')
            ->toContain('@keydown.end.prevent');
    });
});

describe('Accessibility: Accordion', function () {
    test('accordion trigger has aria-controls and panel has matching id', function () {
        $html = Blade::render(<<<'BLADE'
            <x-basekit-ui::accordion :items="[
                ['title' => 'Section 1', 'content' => 'Content 1', 'value' => 's1'],
                ['title' => 'Section 2', 'content' => 'Content 2', 'value' => 's2'],
            ]" />
        BLADE);
        expect($html)->toContain('aria-controls="bk-accordion-panel-')
            ->toContain('role="region"')
            ->toContain('aria-labelledby="bk-accordion-trigger-');
    });

    test('accordion chevron icon is hidden from assistive technology', function () {
        $html = Blade::render(<<<'BLADE'
            <x-basekit-ui::accordion :items="[
                ['title' => 'Section 1', 'content' => 'Content 1', 'value' => 's1'],
            ]" />
        BLADE);
        expect($html)->toContain('aria-hidden="true"');
    });
});

describe('Accessibility: Modal', function () {
    test('modal has aria-labelledby referencing the title', function () {
        $html = Blade::render('<x-basekit-ui::modal title="Confirm Action" :is-open="true">Content</x-basekit-ui::modal>');
        expect($html)->toContain('role="dialog"')
            ->toContain('aria-modal="true"')
            ->toContain('aria-labelledby="');
        $labelMatch = [];
        preg_match('/aria-labelledby="([^"]+)"/', $html, $labelMatch);
        $titleIdMatch = [];
        preg_match('/id="([^"]+)"/', $html, $titleIdMatch);
        expect($labelMatch[1])->not->toBeEmpty();
        expect($html)->toContain("id=\"{$labelMatch[1]}\"");
    });

    test('modal without title omits aria-labelledby', function () {
        $html = Blade::render('<x-basekit-ui::modal :is-open="true">Content</x-basekit-ui::modal>');
        expect($html)->toContain('role="dialog"')
            ->not->toContain('aria-labelledby=');
    });
});

describe('Accessibility: Toast and Alert Roles', function () {
    test('info toast uses role=status', function () {
        $html = Blade::render('<x-basekit-ui::toast message="Saved!" />');
        expect($html)->toContain('role="status"')
            ->toContain('aria-atomic="true"')
            ->not->toContain('role="alert"');
    });

    test('danger toast uses role=alert', function () {
        $html = Blade::render('<x-basekit-ui::toast variant="danger" message="Error!" />');
        expect($html)->toContain('role="alert"');
    });

    test('info alert uses role=status', function () {
        $html = Blade::render('<x-basekit-ui::alert>Informational message</x-basekit-ui::alert>');
        expect($html)->toContain('role="status"')
            ->not->toContain('role="alert"');
    });

    test('danger alert uses role=alert', function () {
        $html = Blade::render('<x-basekit-ui::alert variant="danger">Error occurred</x-basekit-ui::alert>');
        expect($html)->toContain('role="alert"');
    });
});

describe('Accessibility: Progress', function () {
    test('progress has aria-valuetext', function () {
        $html = Blade::render('<x-basekit-ui::progress :value="50" />');
        expect($html)->toContain('role="progressbar"')
            ->toContain('aria-valuenow="50"')
            ->toContain('aria-valuetext="');
    });

    test('indeterminate progress has aria-busy and aria-valuetext', function () {
        $html = Blade::render('<x-basekit-ui::progress :indeterminate="true" />');
        expect($html)->toContain('aria-busy="true"')
            ->toContain('aria-valuetext="Loading"');
    });

    test('progress label is associated via aria-labelledby', function () {
        $html = Blade::render('<x-basekit-ui::progress :value="50" label="Upload progress" />');
        $labelIdMatch = [];
        preg_match('/aria-labelledby="(bk-progress-label-[^"]+)"/', $html, $labelIdMatch);
        expect($labelIdMatch[1])->not->toBeEmpty();
        expect($html)->toContain("id=\"{$labelIdMatch[1]}\"");
    });
});

describe('Accessibility: Skeleton', function () {
    test('skeleton has aria-hidden', function () {
        $html = Blade::render('<x-basekit-ui::skeleton />');
        expect($html)->toContain('aria-hidden="true"');
    });
});

describe('Accessibility: Spinner', function () {
    test('spinner has role=status and sr-only label', function () {
        $html = Blade::render('<x-basekit-ui::spinner />');
        expect($html)->toContain('role="status"')
            ->toContain('class="sr-only"');
    });

    test('spinner SVG is hidden from assistive technology', function () {
        $html = Blade::render('<x-basekit-ui::spinner />');
        expect($html)->toContain('aria-hidden="true"');
    });
});

describe('Accessibility: Dropdown', function () {
    test('dropdown trigger has aria-haspopup and aria-expanded', function () {
        $html = Blade::render(<<<'BLADE'
            <x-basekit-ui::dropdown-menu :items="[
                ['label' => 'Edit', 'url' => '/edit'],
                ['label' => 'Delete', 'url' => '/delete'],
            ]" />
        BLADE);
        expect($html)->toContain('aria-haspopup="true"')
            ->toContain(':aria-expanded="open"');
    });
});

describe('Accessibility: Password Toggle', function () {
    test('password toggle button is focusable', function () {
        $html = Blade::render('<x-basekit-ui::input type="password" name="pw" :is-toggle-password="true" />');
        expect($html)->toContain('tabindex="0"')
            ->not->toContain('tabindex="-1"');
    });

    test('password toggle has dynamic aria-label', function () {
        $html = Blade::render('<x-basekit-ui::input type="password" name="pw" :is-toggle-password="true" />');
        expect($html)->toContain(':aria-label="showPassword ?');
    });
});

describe('Accessibility: MultiSelect Chip Remove', function () {
    test('chip remove button has dynamic aria-label', function () {
        $html = Blade::render('<x-basekit-ui::multi-select name="tags" :options="[\'laravel\' => \'Laravel\']" :value="[\'laravel\']" />');
        expect($html)->toContain(":aria-label=\"'Remove ' + option.label\"");
    });
});
