<?php

declare(strict_types=1);

use Rector\Config\RectorConfig;
use Rector\Set\ValueObject\LevelSetList;

return RectorConfig::configure()
    ->withPaths([
        __DIR__.'/src',
    ])
    ->withSkip([
        __DIR__.'/vendor',
        __DIR__.'/node_modules',
    ])
    ->withSets([
        LevelSetList::UP_TO_PHP_81,
    ]);
