<?php

declare(strict_types=1);

namespace BasekitLaravel\BasekitLaravelUi\Tests\Browser;

use Laravel\Dusk\Browser;

uses(DuskTestCase::class);

test('password is initially hidden', function () {
    $this->browse(function (Browser $browser) {
        $browser->visit('/dusk/password-toggle');

        // Input should be type password
        $browser->assertAttribute('.bk-input__control', 'type', 'password');
    });
});

test('clicking toggle reveals the password', function () {
    $this->browse(function (Browser $browser) {
        $browser->visit('/dusk/password-toggle');

        // Click toggle button
        $browser->click('.bk-input__password-toggle')
            ->assertAttribute('.bk-input__control', 'type', 'text');
    });
});

test('clicking toggle again hides the password', function () {
    $this->browse(function (Browser $browser) {
        $browser->visit('/dusk/password-toggle');

        // Toggle on
        $browser->click('.bk-input__password-toggle')
            ->assertAttribute('.bk-input__control', 'type', 'text');

        // Toggle off
        $browser->click('.bk-input__password-toggle')
            ->assertAttribute('.bk-input__control', 'type', 'password');
    });
});

test('password input value is preserved across toggles', function () {
    $this->browse(function (Browser $browser) {
        $browser->visit('/dusk/password-toggle');

        // Check initial value
        $browser->assertValue('.bk-input__control', 'secret123');

        // Toggle on
        $browser->click('.bk-input__password-toggle')
            ->assertValue('.bk-input__control', 'secret123');

        // Toggle off
        $browser->click('.bk-input__password-toggle')
            ->assertValue('.bk-input__control', 'secret123');
    });
});

test('password toggle has accessible label', function () {
    $this->browse(function (Browser $browser) {
        $browser->visit('/dusk/password-toggle');

        // Check initial aria-label
        $browser->assertAttribute('.bk-input__password-toggle', 'aria-label', 'Show password');

        // Toggle and check updated label
        $browser->click('.bk-input__password-toggle')
            ->assertAttribute('.bk-input__password-toggle', 'aria-label', 'Hide password');
    });
});
