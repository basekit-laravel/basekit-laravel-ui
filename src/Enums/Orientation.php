<?php

declare(strict_types=1);

namespace BasekitLaravel\BasekitLaravelUi\Enums;

enum Orientation: string implements DefaultBackedEnum
{
    case Left = 'left';
    case Right = 'right';

    public static function default(): self
    {
        return self::Left;
    }
}
