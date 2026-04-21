<?php

declare(strict_types=1);

namespace BasekitLaravel\BasekitLaravelUi\View\Components\Support;

use BasekitLaravel\BasekitLaravelUi\Enums\DefaultBackedEnum;
use BasekitLaravel\BasekitLaravelUi\Enums\IconStyle;

/**
 * Shared component property resolver.
 *
 * Centralizes duplicated logic for resolving component props (size, variant, orientation)
 * and icon component names from config and enums.
 */
class ComponentPropResolver
{
    /**
     * Resolve an enum-backed property (Size, Variant, Orientation, etc.) with config validation.
     *
     * @template T of DefaultBackedEnum
     *
     * @param  class-string<T>  $enumClass  Fully-qualified enum class name
     * @param  string  $configKeyAllowed  Config key for allowed values (e.g., 'basekit.components.button.sizes')
     * @param  string  $configKeyDefault  Config key for default value (e.g., 'basekit.components.button.default_size')
     * @param  string|null  $value  User-provided value
     * @return T The resolved enum instance
     *
     * @phpstan-return T
     */
    public static function resolveEnum(
        string $enumClass,
        string $configKeyAllowed,
        string $configKeyDefault,
        ?string $value
    ) {
        // Try parsing the input value
        $resolved = ($value !== null && $value !== '')
            ? $enumClass::tryFrom($value)
            : null;

        // Check if resolved value is in allowed list
        if ($resolved !== null) {
            $allowed = config($configKeyAllowed);
            if ($allowed === null) {
                // If no config, allow all enum values
                $allowed = array_column($enumClass::cases(), 'value');
            }
            if (is_array($allowed) && in_array($resolved->value, $allowed, true)) {
                return $resolved;
            }
        }

        // Fall back to configured default
        $defaultValue = config($configKeyDefault);
        if (is_string($defaultValue) && $defaultValue !== '') {
            $defaultResolved = $enumClass::tryFrom($defaultValue);
            if ($defaultResolved !== null) {
                return $defaultResolved;
            }
        }

        // Final fallback: enum's default() method
        // @phpstan-ignore-next-line Generic covariance — $enumClass is T, result is T
        return $enumClass::default();
    }

    /**
     * Resolve a default-backed enum without component config validation.
     *
     * @template T of DefaultBackedEnum
     *
     * @param  class-string<T>  $enumClass
     * @return T
     *
     * @phpstan-return T
     */
    public static function resolveDefaultEnum(string $enumClass, ?string $value)
    {
        if (is_string($value) && $value !== '') {
            $resolved = $enumClass::tryFrom($value);

            if ($resolved !== null) {
                return $resolved;
            }
        }

        // @phpstan-ignore-next-line Generic covariance — $enumClass is T, result is T
        return $enumClass::default();
    }

    /**
     * Resolve a string-backed property (for components without enum backing).
     *
     * @param  string  $configKeyAllowed  Config key for allowed values
     * @param  string  $configKeyDefault  Config key for default value
     * @param  string  $hardcodedDefault  Hardcoded fallback if config is missing
     * @param  string|null  $value  User-provided value
     * @return string The resolved string value
     */
    public static function resolveString(
        string $configKeyAllowed,
        string $configKeyDefault,
        string $hardcodedDefault,
        ?string $value
    ): string {
        // Check if value is in allowed list
        if ($value !== null && $value !== '') {
            $allowed = config($configKeyAllowed);
            if (is_array($allowed) && in_array($value, $allowed, true)) {
                return $value;
            }
        }

        // Fall back to configured default or hardcoded default
        return config($configKeyDefault, $hardcodedDefault);
    }

    /**
     * Build a Heroicon component name from an icon slug.
     *
     * @param  string|null  $iconName  Icon slug (e.g., 'user', 'check-circle')
     * @param  string|null  $styleOverride  Optional style override ('outline', 'solid', 'mini')
     * @return string|null Heroicon component name (e.g., 'heroicon-o-user') or null if no icon
     */
    public static function heroiconComponent(?string $iconName, ?string $styleOverride = null): ?string
    {
        if ($iconName === null || $iconName === '') {
            return null;
        }

        $style = $styleOverride ?? config('basekit-laravel-ui.icons.style', IconStyle::default()->value);

        $prefix = match ($style) {
            IconStyle::Solid->value => 's',
            IconStyle::Mini->value => 'm',
            default => 'o',
        };

        return "heroicon-{$prefix}-{$iconName}";
    }
}
