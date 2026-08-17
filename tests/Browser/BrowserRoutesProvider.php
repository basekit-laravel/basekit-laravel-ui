<?php

declare(strict_types=1);

namespace BasekitLaravel\BasekitLaravelUi\Tests\Browser;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

/**
 * Registers routes for browser (Dusk) testing.
 *
 * This provider is loaded via testbench.yaml so that routes are
 * available in both the test process and the HTTP server process.
 */
class BrowserRoutesProvider extends ServiceProvider
{
    public function boot(): void
    {
        $this->registerRoutes();
    }

    private function registerRoutes(): void
    {
        Route::get('/dusk/accordion', fn () => view('basekit::test-pages.accordion'));
        Route::get('/dusk/accordion-multiple', fn () => view('basekit::test-pages.accordion-multiple'));
        Route::get('/dusk/accordion-disabled', fn () => view('basekit::test-pages.accordion-disabled'));
        Route::get('/dusk/accordion-initial-open', fn () => view('basekit::test-pages.accordion-initial-open'));

        Route::get('/dusk/modal', fn () => view('basekit::test-pages.modal'));
        Route::get('/dusk/modal-external', fn () => view('basekit::test-pages.modal-external'));
        Route::get('/dusk/modal-no-backdrop-close', fn () => view('basekit::test-pages.modal-no-backdrop-close'));
        Route::get('/dusk/modal-no-close-button', fn () => view('basekit::test-pages.modal-no-close-button'));

        Route::get('/dusk/tabs', fn () => view('basekit::test-pages.tabs'));
        Route::get('/dusk/tabs-disabled', fn () => view('basekit::test-pages.tabs-disabled'));
        Route::get('/dusk/tabs-panels', fn () => view('basekit::test-pages.tabs-panels'));

        Route::get('/dusk/dropdown', fn () => view('basekit::test-pages.dropdown'));
        Route::get('/dusk/dropdown-hover', fn () => view('basekit::test-pages.dropdown-hover'));
        Route::get('/dusk/dropdown-disabled', fn () => view('basekit::test-pages.dropdown-disabled'));
        Route::get('/dusk/dropdown-submenu', fn () => view('basekit::test-pages.dropdown-submenu'));

        Route::get('/dusk/password-toggle', fn () => view('basekit::test-pages.password-toggle'));

        Route::get('/dusk/multi-select', fn () => view('basekit::test-pages.multi-select'));
        Route::get('/dusk/multi-select-disabled', fn () => view('basekit::test-pages.multi-select-disabled'));

        Route::get('/dusk/select', fn () => view('basekit::test-pages.select'));

        Route::get('/dusk/toast', fn () => view('basekit::test-pages.toast'));
        Route::get('/dusk/toast-no-auto', fn () => view('basekit::test-pages.toast-no-auto'));

        Route::get('/dusk/tooltip', fn () => view('basekit::test-pages.tooltip'));
        Route::get('/dusk/tooltip-delays', fn () => view('basekit::test-pages.tooltip-delays'));

        Route::get('/dusk/table-stacked', fn () => view('basekit::test-pages.table-stacked'));

        Route::get('/dusk/copy-button', fn () => view('basekit::test-pages.copy-button'));

        Route::get('/dusk/alert-dismissible', fn () => view('basekit::test-pages.alert-dismissible'));
    }
}
