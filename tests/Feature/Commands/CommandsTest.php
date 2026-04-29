<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Artisan;

describe('Commands', function () {
    test('commands are registered', function (): void {
        $commands = Artisan::all();

        expect($commands)->toHaveKey('basekit:ui:build');
        expect($commands)->toHaveKey('basekit:ui:migrate-theme');
        expect($commands)->toHaveKey('basekit:ui:styleguide');
    });
});
