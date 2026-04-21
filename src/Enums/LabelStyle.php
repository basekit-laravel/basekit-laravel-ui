<?php

declare(strict_types=1);

namespace BasekitLaravel\BasekitLaravelUi\Enums;

enum LabelStyle: string implements DefaultBackedEnum
{
    case Default = 'default';
    case Inset = 'inset';
    case Overlap = 'overlap';

    public static function default(): self
    {
        return self::Default;
    }
}
