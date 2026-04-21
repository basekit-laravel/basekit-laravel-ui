<?php

declare(strict_types=1);

namespace BasekitLaravel\BasekitLaravelUi\Enums;

interface DefaultBackedEnum extends \BackedEnum
{
    public static function default(): self;
}
