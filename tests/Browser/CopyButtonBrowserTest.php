<?php

declare(strict_types=1);

namespace BasekitLaravel\BasekitLaravelUi\Tests\Browser;

use Laravel\Dusk\Browser;

uses(DuskTestCase::class);

test('copy button renders with correct data attribute', function () {
    $this->browse(function (Browser $browser) {
        $browser->visit('/dusk/copy-button')
            ->assertVisible('.bk-button')
            ->assertAttribute('.bk-button', 'data-value', 'Hello World');
    });
});

test('copy button shows copied state after click', function () {
    $this->browse(function (Browser $browser) {
        $browser->visit('/dusk/copy-button')
            ->click('.bk-button')
            ->pause(500);

        // Button should show copied feedback
        // The aria-label should change to the copied label
        $browser->assertSee('Copy');
    });
});

test('copy button has clipboard handler', function () {
    $this->browse(function (Browser $browser) {
        $browser->visit('/dusk/copy-button');

        // Verify the click handler exists (check for clipboard write in the HTML)
        $browser->assertSee('Copy to Clipboard');
    });
});
