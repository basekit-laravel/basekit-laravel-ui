<?php

declare(strict_types=1);

namespace BasekitLaravel\BasekitLaravelUi\Tests\Browser;

use Laravel\Dusk\Browser;

uses(DuskTestCase::class);

test('multi-select opens on click', function () {
    $this->browse(function (Browser $browser) {
        $browser->visit('/dusk/multi-select');

        $browser->assertMissing('.bk-multiselect__menu');

        $browser->click('.bk-multiselect__control')
            ->waitUntilVisible('.bk-multiselect__menu', 2)
            ->assertSee('Red')
            ->assertSee('Green')
            ->assertSee('Blue');
    });
});

test('multi-select selects an option', function () {
    $this->browse(function (Browser $browser) {
        $browser->visit('/dusk/multi-select')
            ->click('.bk-multiselect__control')
            ->waitUntilVisible('.bk-multiselect__menu', 2);

        $browser->click('.bk-multiselect__option')
            ->assertSee('Red');

        $browser->assertVisible('.bk-multiselect__chip');
    });
});

test('multi-select deselects an option', function () {
    $this->browse(function (Browser $browser) {
        $browser->visit('/dusk/multi-select')
            ->click('.bk-multiselect__control')
            ->waitUntilVisible('.bk-multiselect__menu', 2);

        $browser->click('.bk-multiselect__option')
            ->assertVisible('.bk-multiselect__chip');

        $browser->click('.bk-multiselect__option')
            ->pause(300)
            ->assertMissing('.bk-multiselect__chip');
    });
});

test('multi-select allows multiple selections', function () {
    $this->browse(function (Browser $browser) {
        $browser->visit('/dusk/multi-select')
            ->click('.bk-multiselect__control')
            ->waitUntilVisible('.bk-multiselect__menu', 2);

        $browser->click('.bk-multiselect__option');

        $browser->click('.bk-multiselect__option:nth-of-type(2)');

        $browser->assertScript('document.querySelectorAll(".bk-multiselect__chip").length', 2);
    });
});

test('multi-select closes on Escape', function () {
    $this->browse(function (Browser $browser) {
        $browser->visit('/dusk/multi-select')
            ->click('.bk-multiselect__control')
            ->waitUntilVisible('.bk-multiselect__menu', 2)
            ->keys('.bk-multiselect__control', '{escape}')
            ->pause(300)
            ->assertMissing('.bk-multiselect__menu');
    });
});

test('multi-select closes on click outside', function () {
    $this->browse(function (Browser $browser) {
        $browser->visit('/dusk/multi-select')
            ->click('.bk-multiselect__control')
            ->waitUntilVisible('.bk-multiselect__menu', 2)
            ->clickAtPoint(10, 10)
            ->pause(300)
            ->assertMissing('.bk-multiselect__menu');
    });
});

test('multi-select has listbox role', function () {
    $this->browse(function (Browser $browser) {
        $browser->visit('/dusk/multi-select')
            ->click('.bk-multiselect__control')
            ->waitUntilVisible('.bk-multiselect__menu', 2)
            ->assertAttribute('.bk-multiselect__menu', 'role', 'listbox')
            ->assertAttribute('.bk-multiselect__menu', 'aria-multiselectable', 'true');
    });
});

test('multi-select disabled state prevents opening', function () {
    $this->browse(function (Browser $browser) {
        $browser->visit('/dusk/multi-select-disabled');

        $browser->script('document.querySelector(".bk-multiselect__control").click()');
        $browser->pause(300)
            ->assertMissing('.bk-multiselect__menu');
    });
});
