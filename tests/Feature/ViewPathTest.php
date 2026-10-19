<?php

declare(strict_types=1);

use Symfony\Component\Finder\Finder;

describe('Loaded view path', function (): void {
    test('contains no basekit-ui component tags', function (): void {
        $packageRoot = dirname(__DIR__, 2);

        $offenders = [];
        foreach ((new Finder())->in("{$packageRoot}/resources/views")->files()->name('*.blade.php') as $file) {
            if (str_contains($file->getContents(), '<x-basekit-ui::')) {
                $offenders[] = $file->getRelativePathname();
            }
        }

        expect($offenders)->toBeEmpty(
            'Views under resources/views are compiled by every consumer\'s view:cache. '
            .'They must not reference basekit-ui component aliases because disabled '
            .'components are not registered. Move these to resources/dev/: '.implode(', ', $offenders)
        );
    });

    test('dev views still exercise component tags', function (): void {
        $packageRoot = dirname(__DIR__, 2);

        $tagged = 0;
        foreach ((new Finder())->in("{$packageRoot}/resources/dev")->files()->name('*.blade.php') as $file) {
            if (str_contains($file->getContents(), '<x-basekit-ui::')) {
                $tagged++;
            }
        }

        expect($tagged)->toBeGreaterThan(0);
    });
});
