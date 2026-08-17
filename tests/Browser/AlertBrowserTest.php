<?php

declare(strict_types=1);

namespace BasekitLaravel\BasekitLaravelUi\Tests\Browser;

use Laravel\Dusk\Browser;

uses(DuskTestCase::class);

test('dismissible alert renders correctly', function () {
    $this->browse(function (Browser $browser) {
        $browser->visit('/dusk/alert-dismissible')
            ->assertVisible('.bk-alert')
            ->assertSee('Warning')
            ->assertSee('This alert can be dismissed');
    });
});

test('dismissible alert has dismiss button', function () {
    $this->browse(function (Browser $browser) {
        $browser->visit('/dusk/alert-dismissible')
            ->assertVisible('.bk-alert__dismiss');
    });
});

test('dismissible alert closes on dismiss click', function () {
    $this->browse(function (Browser $browser) {
        $browser->visit('/dusk/alert-dismissible')
            ->assertVisible('.bk-alert')
            ->click('.bk-alert__dismiss')
            ->pause(500)
            ->assertMissing('.bk-alert');
    });
});

test('dismissible alert dismiss button has accessible label', function () {
    $this->browse(function (Browser $browser) {
        $browser->visit('/dusk/alert-dismissible')
            ->assertAttribute('.bk-alert__dismiss', 'aria-label', 'Dismiss');
    });
});

test('dismissible alert has status role', function () {
    $this->browse(function (Browser $browser) {
        $browser->visit('/dusk/alert-dismissible')
            ->assertAttribute('.bk-alert', 'role', 'status');
    });
});
