<?php

declare(strict_types=1);

namespace BasekitLaravel\BasekitLaravelUi\Tests\Browser;

use Laravel\Dusk\Browser;

uses(DuskTestCase::class);

test('table stacked renders correctly', function () {
    $this->browse(function (Browser $browser) {
        $browser->visit('/dusk/table-stacked')
            ->assertVisible('.bk-table__container')
            ->assertSee('Alice')
            ->assertSee('Bob')
            ->assertSee('alice@example.com');
    });
});

test('table stacked expand button toggles row details', function () {
    $this->browse(function (Browser $browser) {
        $browser->visit('/dusk/table-stacked');

        $browser->assertMissing('.bk-table__stack-detail-row');

        $browser->click('.bk-table__stack-expand-btn')
            ->waitUntilVisible('.bk-table__stack-detail-row', 2)
            ->assertSee('Admin');

        $browser->click('.bk-table__stack-expand-btn')
            ->pause(300)
            ->assertMissing('.bk-table__stack-detail-row');
    });
});

test('table stacked expand button has aria-expanded', function () {
    $this->browse(function (Browser $browser) {
        $browser->visit('/dusk/table-stacked');

        $browser->assertAttribute('.bk-table__stack-expand-btn', 'aria-expanded', 'false');

        $browser->click('.bk-table__stack-expand-btn')
            ->waitUntil('document.querySelector(".bk-table__stack-expand-btn").getAttribute("aria-expanded") === "true"', 2);

        $browser->click('.bk-table__stack-expand-btn')
            ->waitUntil('document.querySelector(".bk-table__stack-expand-btn").getAttribute("aria-expanded") === "false"', 2);
    });
});
