<?php

declare(strict_types=1);

namespace BasekitLaravel\BasekitLaravelUi\Tests\Browser;

use Laravel\Dusk\Browser;

uses(DuskTestCase::class);

test('accordion renders correctly', function () {
    $this->browse(function (Browser $browser) {
        $browser->visit('/dusk/accordion')
            ->assertSee('First Section')
            ->assertSee('Second Section')
            ->assertSee('Third Section')
            ->assertVisible('.bk-accordion');
    });
});

test('accordion opens and closes items', function () {
    $this->browse(function (Browser $browser) {
        $browser->visit('/dusk/accordion');

        // Initially all content should be hidden
        $browser->assertDontSee('Content for first section');

        // Click first item to open it
        $browser->click('.bk-accordion__trigger:first-child')
            ->waitForText('Content for first section', 2)
            ->assertSee('Content for first section');

        // Click first item again to close it
        $browser->click('.bk-accordion__trigger:first-child')
            ->waitUntilMissingText('Content for first section', 2)
            ->assertDontSee('Content for first section');
    });
});

test('accordion opens only one item at a time in single mode', function () {
    $this->browse(function (Browser $browser) {
        $browser->visit('/dusk/accordion');

        // Open first item
        $browser->click('.bk-accordion__item:first-child .bk-accordion__trigger')
            ->waitForText('Content for first section', 2)
            ->assertSee('Content for first section');

        // Open second item - first should close
        $browser->click('.bk-accordion__item:nth-child(2) .bk-accordion__trigger')
            ->waitForText('Content for second section', 2)
            ->assertSee('Content for second section')
            ->assertDontSee('Content for first section');
    });
});

test('accordion multiple mode allows multiple open items', function () {
    $this->browse(function (Browser $browser) {
        $browser->visit('/dusk/accordion-multiple');

        // Open first item
        $browser->click('.bk-accordion__item:first-child .bk-accordion__trigger')
            ->waitForText('Content for first section', 2)
            ->assertSee('Content for first section');

        // Open second item - both should be visible
        $browser->click('.bk-accordion__item:nth-child(2) .bk-accordion__trigger')
            ->waitForText('Content for second section', 2)
            ->assertSee('Content for second section')
            ->assertSee('Content for first section');

        // Close first item - second should remain
        $browser->click('.bk-accordion__item:first-child .bk-accordion__trigger')
            ->waitUntilMissingText('Content for first section', 2)
            ->assertSee('Content for second section');
    });
});

test('accordion aria-expanded state updates', function () {
    $this->browse(function (Browser $browser) {
        $browser->visit('/dusk/accordion');

        // Initially collapsed
        $browser->assertAttribute('.bk-accordion__trigger:first-child', 'aria-expanded', 'false');

        // Open item
        $browser->click('.bk-accordion__trigger:first-child')
            ->waitUntil('document.querySelector(".bk-accordion__trigger:first-child").getAttribute("aria-expanded") === "true"');

        // Close item
        $browser->click('.bk-accordion__trigger:first-child')
            ->waitUntil('document.querySelector(".bk-accordion__trigger:first-child").getAttribute("aria-expanded") === "false"');
    });
});

test('accordion initial open state works', function () {
    $this->browse(function (Browser $browser) {
        $browser->visit('/dusk/accordion-initial-open');

        // Second item should be open by default
        $browser->assertSee('Content for second section')
            ->assertDontSee('Content for first section');
    });
});
