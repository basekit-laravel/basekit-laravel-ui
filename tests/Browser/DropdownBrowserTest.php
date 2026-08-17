<?php

declare(strict_types=1);

namespace BasekitLaravel\BasekitLaravelUi\Tests\Browser;

use Laravel\Dusk\Browser;

uses(DuskTestCase::class);

test('dropdown menu opens on click', function () {
    $this->browse(function (Browser $browser) {
        $browser->visit('/dusk/dropdown');

        $browser->assertMissing('.bk-dropdown__menu');

        $browser->click('.bk-dropdown__trigger')
            ->waitUntilVisible('.bk-dropdown__menu', 2)
            ->assertSee('Edit')
            ->assertSee('Duplicate')
            ->assertSee('Delete');
    });
});

test('dropdown menu closes on click outside', function () {
    $this->browse(function (Browser $browser) {
        $browser->visit('/dusk/dropdown')
            ->click('.bk-dropdown__trigger')
            ->waitUntilVisible('.bk-dropdown__menu', 2)
            ->clickAtPoint(10, 10)
            ->pause(300)
            ->assertMissing('.bk-dropdown__menu');
    });
});

test('dropdown menu closes on Escape', function () {
    $this->browse(function (Browser $browser) {
        $browser->visit('/dusk/dropdown')
            ->click('.bk-dropdown__trigger')
            ->waitUntilVisible('.bk-dropdown__menu', 2)
            ->keys('.bk-dropdown__trigger', '{escape}')
            ->pause(300)
            ->assertMissing('.bk-dropdown__menu');
    });
});

test('dropdown menu items are clickable', function () {
    $this->browse(function (Browser $browser) {
        $browser->visit('/dusk/dropdown')
            ->click('.bk-dropdown__trigger')
            ->waitUntilVisible('.bk-dropdown__menu', 2)
            ->assertVisible('.bk-dropdown__item');
    });
});

test('dropdown menu has menu role', function () {
    $this->browse(function (Browser $browser) {
        $browser->visit('/dusk/dropdown')
            ->click('.bk-dropdown__trigger')
            ->waitUntilVisible('.bk-dropdown__menu', 2)
            ->assertAttribute('.bk-dropdown__menu', 'role', 'menu');
    });
});

test('dropdown menu items have menuitem role', function () {
    $this->browse(function (Browser $browser) {
        $browser->visit('/dusk/dropdown')
            ->click('.bk-dropdown__trigger')
            ->waitUntilVisible('.bk-dropdown__menu', 2)
            ->assertAttribute('.bk-dropdown__item:first-of-type', 'role', 'menuitem');
    });
});

test('dropdown hover mode opens on mouseenter', function () {
    $this->browse(function (Browser $browser) {
        $browser->visit('/dusk/dropdown-hover');

        $browser->mouseover('.bk-dropdown')
            ->waitUntilVisible('.bk-dropdown__menu', 2)
            ->assertSee('Option A');
    });
});

test('dropdown hover mode closes on mouseleave', function () {
    $this->browse(function (Browser $browser) {
        $browser->visit('/dusk/dropdown-hover')
            ->mouseover('.bk-dropdown')
            ->waitUntilVisible('.bk-dropdown__menu', 2)
            ->moveMouse(0, 300)
            ->pause(500)
            ->assertMissing('.bk-dropdown__menu');
    });
});

test('dropdown submenu opens on hover', function () {
    $this->browse(function (Browser $browser) {
        $browser->visit('/dusk/dropdown-submenu')
            ->click('.bk-dropdown__trigger')
            ->waitUntilVisible('.bk-dropdown__menu', 2);

        $browser->mouseover('.bk-dropdown__submenu')
            ->waitUntilVisible('.bk-dropdown__submenu-panel', 2)
            ->assertSee('Sub Item 1');
    });
});
