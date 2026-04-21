<?php

declare(strict_types=1);

namespace BasekitLaravel\BasekitLaravelUi\Enums;

enum IconStyle: string implements DefaultBackedEnum
{
    case Outline = 'outline';
    case Solid = 'solid';
    case Mini = 'mini';

    public static function default(): self
    {
        return self::Outline;
    }
}
