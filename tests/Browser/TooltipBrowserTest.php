<?php

declare(strict_types=1);

namespace BasekitLaravel\BasekitLaravelUi\Tests\Browser;

use Laravel\Dusk\Browser;

uses(DuskTestCase::class);

test('tooltip appears on hover', function () {
    $this->browse(function (Browser $browser) {
        $browser->visit('/dusk/tooltip');

        // Tooltip content should be hidden initially
        $browser->assertMissing('.bk-tooltip__content');

        // Hover over trigger
        $browser->mouseover('#tooltip-trigger')
            ->waitUntil('document.querySelector(".bk-tooltip__content") && document.querySelector(".bk-tooltip__content").offsetParent !== null', 2)
            ->assertVisible('.bk-tooltip__content')
            ->assertSee('Tooltip text here');
    });
});

test('tooltip disappears on mouse leave', function () {
    $this->browse(function (Browser $browser) {
        $browser->visit('/dusk/tooltip')
            ->mouseover('#tooltip-trigger')
            ->waitUntil('document.querySelector(".bk-tooltip__content") && document.querySelector(".bk-tooltip__content").offsetParent !== null', 2)
            ->moveMouse(0, 300)
            ->waitUntil('!document.querySelector(".bk-tooltip__content") || document.querySelector(".bk-tooltip__content").offsetParent === null', 2)
            ->assertMissing('.bk-tooltip__content');
    });
});

test('tooltip appears on keyboard focus', function () {
    $this->browse(function (Browser $browser) {
        $browser->visit('/dusk/tooltip');

        // Focus the trigger button programmatically (triggers focusin)
        $browser->script('document.getElementById("tooltip-trigger").focus()');

        $browser->waitUntil('document.querySelector(".bk-tooltip__content") && document.querySelector(".bk-tooltip__content").offsetParent !== null', 2)
            ->assertVisible('.bk-tooltip__content')
            ->assertSee('Tooltip text here');
    });
});

test('tooltip disappears on blur', function () {
    $this->browse(function (Browser $browser) {
        $browser->visit('/dusk/tooltip');

        $browser->script('document.getElementById("tooltip-trigger").focus()');

        $browser->waitUntil('document.querySelector(".bk-tooltip__content") && document.querySelector(".bk-tooltip__content").offsetParent !== null', 2);

        $browser->script('document.getElementById("tooltip-trigger").blur()');

        $browser->waitUntil('!document.querySelector(".bk-tooltip__content") || document.querySelector(".bk-tooltip__content").offsetParent === null', 2)
            ->assertMissing('.bk-tooltip__content');
    });
});

test('tooltip has tooltip role', function () {
    $this->browse(function (Browser $browser) {
        $browser->visit('/dusk/tooltip')
            ->mouseover('#tooltip-trigger')
            ->waitUntil('document.querySelector(".bk-tooltip__content") && document.querySelector(".bk-tooltip__content").offsetParent !== null', 2)
            ->assertAttribute('.bk-tooltip__content', 'role', 'tooltip');
    });
});

test('tooltip with delays shows after delay', function () {
    $this->browse(function (Browser $browser) {
        $browser->visit('/dusk/tooltip-delays');

        // Hover over trigger
        $browser->mouseover('#tooltip-trigger');

        // Should not be visible immediately (delay in progress)
        $browser->pause(100)
            ->assertMissing('.bk-tooltip__content');

        // Should be visible after the delay + buffer
        $browser->waitUntil('document.querySelector(".bk-tooltip__content") && document.querySelector(".bk-tooltip__content").offsetParent !== null', 2)
            ->assertVisible('.bk-tooltip__content');
    });
});
