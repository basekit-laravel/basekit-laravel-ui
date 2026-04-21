<?php

declare(strict_types=1);

namespace BasekitLaravel\BasekitLaravelUi\Enums;

enum Size: string implements DefaultBackedEnum
{
    case Sm = 'sm';
    case Md = 'md';
    case Lg = 'lg';

    public static function default(): self
    {
        return self::Md;
    }
}
