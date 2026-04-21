<?php

declare(strict_types=1);

namespace BasekitLaravel\BasekitLaravelUi\Tests;

use BasekitLaravel\BasekitLaravelUi\BasekitServiceProvider;
use BladeUI\Heroicons\BladeHeroiconsServiceProvider;
use BladeUI\Icons\BladeIconsServiceProvider;
use Orchestra\Testbench\TestCase as Orchestra;
use TailwindMerge\Laravel\TailwindMergeServiceProvider;

abstract class TestCase extends Orchestra
{
    /**
     * @return array<int, class-string>
     */
    protected function getPackageProviders($app): array
    {
        return [
            BladeIconsServiceProvider::class,
            BladeHeroiconsServiceProvider::class,
            TailwindMergeServiceProvider::class,
            BasekitServiceProvider::class,
        ];
    }
}
