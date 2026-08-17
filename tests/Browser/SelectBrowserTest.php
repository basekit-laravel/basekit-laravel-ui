<?php

declare(strict_types=1);

namespace BasekitLaravel\BasekitLaravelUi\Tests\Browser;

use Laravel\Dusk\Browser;

uses(DuskTestCase::class);

test('select opens on click', function () {
    $this->browse(function (Browser $browser) {
        $browser->visit('/dusk/select');

        $browser->assertMissing('.bk-select__menu');

        $browser->click('.bk-select__control')
            ->waitUntilVisible('.bk-select__menu', 2)
            ->assertSee('United States')
            ->assertSee('United Kingdom')
            ->assertSee('Germany');
    });
});

test('select selects an option', function () {
    $this->browse(function (Browser $browser) {
        $browser->visit('/dusk/select')
            ->click('.bk-select__control')
            ->waitUntilVisible('.bk-select__menu', 2);

        $browser->click('.bk-select__option:nth-of-type(2)')
            ->pause(300)
            ->assertSee('United Kingdom');

        $browser->assertMissing('.bk-select__menu');
    });
});

test('select closes on Escape', function () {
    $this->browse(function (Browser $browser) {
        $browser->visit('/dusk/select')
            ->click('.bk-select__control')
            ->waitUntilVisible('.bk-select__menu', 2)
            ->keys('.bk-select__control', '{escape}')
            ->pause(300)
            ->assertMissing('.bk-select__menu');
    });
});

test('select has listbox role', function () {
    $this->browse(function (Browser $browser) {
        $browser->visit('/dusk/select')
            ->click('.bk-select__control')
            ->waitUntilVisible('.bk-select__menu', 2)
            ->assertAttribute('.bk-select__menu', 'role', 'listbox');
    });
});

test('select has aria-expanded on trigger', function () {
    $this->browse(function (Browser $browser) {
        $browser->visit('/dusk/select');

        $browser->assertAttribute('.bk-select__control', 'aria-expanded', 'false');

        $browser->click('.bk-select__control')
            ->waitUntilVisible('.bk-select__menu', 2)
            ->assertAttribute('.bk-select__control', 'aria-expanded', 'true');
    });
});
