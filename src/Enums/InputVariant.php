<?php

declare(strict_types=1);

namespace BasekitLaravel\BasekitLaravelUi\Enums;

/**
 * @deprecated Use {@see Variant} instead. Input now uses the shared Variant enum.
 *             This enum is kept for backwards compatibility and will be removed in a future major version.
 */
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
