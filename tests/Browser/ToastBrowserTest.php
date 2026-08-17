<?php

declare(strict_types=1);

namespace BasekitLaravel\BasekitLaravelUi\Tests\Browser;

use Laravel\Dusk\Browser;

uses(DuskTestCase::class);

test('toast appears with correct content', function () {
    $this->browse(function (Browser $browser) {
        $browser->visit('/dusk/toast')
            ->assertVisible('.bk-toast')
            ->assertSee('Notification')
            ->assertSee('This is a toast message');
    });
});

test('toast has status role', function () {
    $this->browse(function (Browser $browser) {
        $browser->visit('/dusk/toast')
            ->assertAttribute('.bk-toast', 'role', 'status');
    });
});

test('toast can be dismissed manually', function () {
    $this->browse(function (Browser $browser) {
        $browser->visit('/dusk/toast-no-auto')
            ->assertVisible('.bk-toast')
            ->click('.bk-toast__dismiss')
            ->pause(500)
            ->assertMissing('.bk-toast');
    });
});

test('toast auto-dismisses after duration', function () {
    $this->browse(function (Browser $browser) {
        $browser->visit('/dusk/toast')
            ->assertVisible('.bk-toast');

        // Wait for auto-dismiss (5000ms + buffer)
        $browser->pause(6000)
            ->assertMissing('.bk-toast');
    });
});

test('toast dismiss button has accessible label', function () {
    $this->browse(function (Browser $browser) {
        $browser->visit('/dusk/toast-no-auto')
            ->assertAttribute('.bk-toast__dismiss', 'aria-label', 'Dismiss');
    });
});
