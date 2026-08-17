<?php

declare(strict_types=1);

namespace BasekitLaravel\BasekitLaravelUi\Tests\Browser;

use Laravel\Dusk\Browser;

uses(DuskTestCase::class);

test('modal is initially closed', function () {
    $this->browse(function (Browser $browser) {
        $browser->visit('/dusk/modal');

        $browser->assertMissing('.bk-modal__dialog')
            ->assertVisible('#open-modal');
    });
});

test('modal opens when trigger is clicked', function () {
    $this->browse(function (Browser $browser) {
        $browser->visit('/dusk/modal')
            ->click('#open-modal')
            ->waitUntilVisible('.bk-modal__dialog', 2)
            ->assertSee('Modal body content')
            ->assertVisible('.bk-modal__title');
    });
});

test('modal closes when close button is clicked', function () {
    $this->browse(function (Browser $browser) {
        $browser->visit('/dusk/modal')
            ->click('#open-modal')
            ->waitUntilVisible('.bk-modal__dialog', 2)
            ->click('.bk-modal__close')
            ->waitUntilMissing('.bk-modal__dialog', 2)
            ->assertMissing('.bk-modal__dialog');
    });
});

test('modal closes on Escape key', function () {
    $this->browse(function (Browser $browser) {
        $browser->visit('/dusk/modal')
            ->click('#open-modal')
            ->waitUntilVisible('.bk-modal__dialog', 2)
            ->keys('#open-modal', '{escape}')
            ->waitUntilMissing('.bk-modal__dialog', 2)
            ->assertMissing('.bk-modal__dialog');
    });
});

test('modal closes on backdrop click', function () {
    $this->browse(function (Browser $browser) {
        $browser->visit('/dusk/modal')
            ->click('#open-modal')
            ->waitUntilVisible('.bk-modal__dialog', 2);

        $browser->script('document.querySelector(".bk-modal__backdrop").click()');
        $browser->waitUntilMissing('.bk-modal__dialog', 2)
            ->assertMissing('.bk-modal__dialog');
    });
});

test('modal has correct ARIA attributes', function () {
    $this->browse(function (Browser $browser) {
        $browser->visit('/dusk/modal')
            ->click('#open-modal')
            ->waitUntilVisible('.bk-modal__dialog', 2)
            ->assertAttribute('.bk-modal__dialog', 'role', 'dialog')
            ->assertAttribute('.bk-modal__dialog', 'aria-modal', 'true');
    });
});

test('modal no backdrop close keeps modal open on backdrop click', function () {
    $this->browse(function (Browser $browser) {
        $browser->visit('/dusk/modal-no-backdrop-close')
            ->click('#open-modal')
            ->waitUntilVisible('.bk-modal__dialog', 2)
            ->clickAtPoint(10, 10);

        $browser->pause(300)
            ->assertVisible('.bk-modal__dialog');
    });
});

test('modal no close button hides the close button', function () {
    $this->browse(function (Browser $browser) {
        $browser->visit('/dusk/modal-no-close-button')
            ->click('#open-modal')
            ->waitUntilVisible('.bk-modal__dialog', 2)
            ->assertMissing('.bk-modal__close');
    });
});
