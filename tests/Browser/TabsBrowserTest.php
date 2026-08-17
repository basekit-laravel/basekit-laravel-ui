<?php

declare(strict_types=1);

namespace BasekitLaravel\BasekitLaravelUi\Tests\Browser;

use Laravel\Dusk\Browser;

uses(DuskTestCase::class);

test('tabs renders with correct initial active tab', function () {
    $this->browse(function (Browser $browser) {
        $browser->visit('/dusk/tabs');

        // First tab should be active
        $browser->assertAttribute('.bk-tabs__tab:first-child', 'aria-selected', 'true')
            ->assertHasClass('.bk-tabs__tab:first-child', 'bk-tabs__tab--active');

        // Other tabs should be inactive
        $browser->assertAttribute('.bk-tabs__tab:nth-child(2)', 'aria-selected', 'false')
            ->assertHasClass('.bk-tabs__tab:nth-child(2)', 'bk-tabs__tab--inactive');
    });
});

test('tabs switches active tab on click', function () {
    $this->browse(function (Browser $browser) {
        $browser->visit('/dusk/tabs');

        // Click second tab
        $browser->click('.bk-tabs__tab:nth-child(2)')
            ->assertAttribute('.bk-tabs__tab:nth-child(2)', 'aria-selected', 'true')
            ->assertHasClass('.bk-tabs__tab:nth-child(2)', 'bk-tabs__tab--active')
            ->assertAttribute('.bk-tabs__tab:first-child', 'aria-selected', 'false')
            ->assertHasClass('.bk-tabs__tab:first-child', 'bk-tabs__tab--inactive');

        // Click third tab
        $browser->click('.bk-tabs__tab:nth-child(3)')
            ->assertAttribute('.bk-tabs__tab:nth-child(3)', 'aria-selected', 'true')
            ->assertAttribute('.bk-tabs__tab:nth-child(2)', 'aria-selected', 'false');
    });
});

test('tabs with panels shows correct panel content', function () {
    $this->browse(function (Browser $browser) {
        $browser->visit('/dusk/tabs-panels');

        // First panel should be visible
        $browser->assertVisible('#panel-first')
            ->assertSeeIn('#panel-first', 'First panel content');

        // Second tab click shows second panel
        $browser->click('.bk-tabs__tab:nth-child(2)')
            ->assertVisible('#panel-second')
            ->assertSeeIn('#panel-second', 'Second panel content');
    });
});

test('disabled tabs cannot be activated', function () {
    $this->browse(function (Browser $browser) {
        $browser->visit('/dusk/tabs-disabled');

        // First tab is active
        $browser->assertAttribute('.bk-tabs__tab:first-child', 'aria-selected', 'true');

        // Click disabled tab - should not change active state
        $browser->click('.bk-tabs__tab:nth-child(2)')
            ->assertAttribute('.bk-tabs__tab:first-child', 'aria-selected', 'true')
            ->assertAttribute('.bk-tabs__tab:nth-child(2)', 'aria-selected', 'false');

        // Click third tab - should change active state
        $browser->click('.bk-tabs__tab:nth-child(3)')
            ->assertAttribute('.bk-tabs__tab:nth-child(3)', 'aria-selected', 'true')
            ->assertAttribute('.bk-tabs__tab:first-child', 'aria-selected', 'false');
    });
});

test('disabled tabs have disabled attribute', function () {
    $this->browse(function (Browser $browser) {
        $browser->visit('/dusk/tabs-disabled');

        $browser->assertAttribute('.bk-tabs__tab:nth-child(2)', 'disabled', 'true');
    });
});
