<?php

declare(strict_types=1);

namespace BasekitLaravel\BasekitLaravelUi\Enums;

enum InputVariant: string implements DefaultBackedEnum
{
    case Primary = 'primary';
    case Secondary = 'secondary';
    case Success = 'success';
    case Warning = 'warning';
    case Info = 'info';
    case Ghost = 'ghost';

    public static function default(): self
    {
        return self::Primary;
    }
}
