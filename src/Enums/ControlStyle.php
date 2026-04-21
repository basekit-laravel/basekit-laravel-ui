<?php

declare(strict_types=1);

namespace BasekitLaravel\BasekitLaravelUi\Enums;

enum ControlStyle: string implements DefaultBackedEnum
{
    case Default = 'default';
    case Pill = 'pill';
    case Underline = 'underline';

    public static function default(): self
    {
        return self::Default;
    }
}
