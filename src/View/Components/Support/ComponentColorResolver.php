<?php

declare(strict_types=1);

namespace BasekitLaravel\BasekitLaravelUi\View\Components\Support;

class ComponentColorResolver
{
    /** @var array<string, array<string, string>> */
    private static array $schemas = [
        'button' => [
            'background' => '--button-bg-{variant}',
            'text' => '--button-text-{variant}',
            'border' => '--button-border-{variant}',
            'hover-background' => '--button-hover-bg-{variant}',
            'hover-text' => '--button-hover-text-{variant}',
            'hover-border' => '--button-hover-border-{variant}',
        ],
        'input' => [
            'border' => '--input-{variant}-border-color',
            'hover-border' => '--input-hover-border-color',
        ],
        'textarea' => [
            'border' => '--textarea-{variant}-border',
        ],
        'select' => [
            'border' => '--select-{variant}-border-color',
            'hover-border' => '--select-hover-border-color',
        ],
        'multi-select' => [
            'border' => '--multiselect-{variant}-border-color',
            'hover-border' => '--multiselect-hover-border-color',
        ],
        'checkbox' => [
            'background' => '--checkbox-{variant}-checked-bg',
            'border' => '--checkbox-{variant}-checked-border',
            'focus-ring' => '--checkbox-{variant}-focus-ring',
        ],
        'radio' => [
            'background' => '--radio-{variant}-checked-bg',
            'border' => '--radio-{variant}-checked-border',
            'focus-ring' => '--radio-{variant}-focus-ring',
        ],
        'toggle' => [
            'background' => '--toggle-{variant}-bg-on',
            'focus-ring' => '--toggle-{variant}-focus-ring',
        ],
        'alert' => [
            'background' => '--alert-bg-{variant}',
            'text' => '--alert-text-{variant}',
            'border' => '--alert-border-{variant}',
        ],
        'toast' => [
            'background' => '--toast-bg-{variant}',
            'text' => '--toast-text-{variant}',
            'border' => '--toast-border-{variant}',
        ],
        'spinner' => [
            'text' => '--spinner-color-{variant}',
        ],
        'progress' => [
            'background' => '--progress-bar-{variant}',
        ],
        'badge' => [
            'background' => '--badge-bg-{variant}',
            'text' => '--badge-text-{variant}',
            'border' => '--badge-border-{variant}',
        ],
        'link' => [
            'text' => '--link-{variant}-color',
        ],
        'empty-state' => [
            'text' => '--empty-state-{variant}-icon-color',
            'title-color' => '--empty-state-{variant}-title-color',
            'description-color' => '--empty-state-{variant}-description-color',
        ],
    ];

    /** @var string[] */
    private static array $lightBackgroundComponents = [
        'badge', 'alert',
    ];

    /** @var string[] */
    private static array $cssNamedColors = [
        'transparent', 'currentColor', 'currentcolor', 'currentcolor',
        'black', 'white', 'red', 'blue', 'green', 'yellow', 'orange',
        'purple', 'pink', 'indigo', 'teal', 'cyan', 'gray', 'grey',
        'slate', 'zinc', 'neutral', 'stone', 'amber', 'lime', 'emerald',
        'fuchsia', 'violet', 'rose', 'sky', 'inherit', 'initial', 'unset',
    ];

    public static function resolve(
        string $component,
        string $variant,
        ?string $color = null,
        ?string $background = null,
        ?string $text = null,
        ?string $border = null,
        ?string $hoverBackground = null,
        ?string $hoverText = null,
        ?string $hoverBorder = null,
        ?string $focusRing = null,
    ): ?string {
        if ($color !== null && $color !== '' && ($background === null && $text === null && $border === null && $hoverBackground === null && $hoverText === null && $hoverBorder === null && $focusRing === null)) {
            $schema = self::$schemas[$component] ?? [];
            if (isset($schema['background'])) {
                $expansion = in_array($component, self::$lightBackgroundComponents, true)
                    ? self::expandColorLight($color)
                    : self::expandColor($color);
                [$bg, $txt, $hoverBg, $bdr, $focus] = $expansion;
                $background = $bg;
                $text = $txt;
                $hoverBackground = $hoverBg;
                $border = $bdr;
                if (isset($schema['focus-ring'])) {
                    $focusRing = $focus;
                }
            } else {
                $value = self::resolveColorValue($color);
                if (isset($schema['text']) || isset($schema['border'])) {
                    if (isset($schema['text'])) {
                        $text = $value;
                    }
                    if (isset($schema['border'])) {
                        $border = self::expandColor($color)[3];
                    }
                    if (isset($schema['hover-border'])) {
                        $hoverBorder = self::expandColor($color)[2];
                    }
                }
                if (isset($schema['focus-ring'])) {
                    $focusRing = self::resolveColorValue($color);
                }
            }
        }

        $resolved = [];

        if ($background !== null && $background !== '') {
            $resolved['background'] = $background;
        }
        if ($text !== null && $text !== '') {
            $resolved['text'] = $text;
        }
        if ($border !== null && $border !== '') {
            $resolved['border'] = $border;
        }
        if ($hoverBackground !== null && $hoverBackground !== '') {
            $resolved['hover-background'] = $hoverBackground;
        }
        if ($hoverText !== null && $hoverText !== '') {
            $resolved['hover-text'] = $hoverText;
        }
        if ($hoverBorder !== null && $hoverBorder !== '') {
            $resolved['hover-border'] = $hoverBorder;
        }
        if ($focusRing !== null && $focusRing !== '') {
            $resolved['focus-ring'] = $focusRing;
        }

        // Derive title and description colors from $color for empty-state
        if ($color !== null && $color !== '' && $component === 'empty-state') {
            if (preg_match('/^([a-zA-Z]+)-(\d+)$/', $color, $m) === 1) {
                $shade = (int) $m[2];
                $base = strtolower($m[1]);
                $resolved['title-color'] = 'var(--color-'.$base.'-'.min($shade + 300, 950).')';
                $resolved['description-color'] = 'var(--color-'.$base.'-'.min($shade + 100, 950).')';
            } elseif (preg_match('/^#[0-9a-fA-F]{3,8}$/', $color) === 1) {
                $resolved['title-color'] = self::darkenHex($color, 0.6);
                $resolved['description-color'] = self::darkenHex($color, 0.8);
            } else {
                $resolved['title-color'] = $color;
                $resolved['description-color'] = $color;
            }
        }

        if ($resolved === []) {
            return null;
        }

        $schema = self::$schemas[$component] ?? null;
        if ($schema === null) {
            return null;
        }

        $pairs = [];
        foreach ($resolved as $prop => $value) {
            $cssVar = $schema[$prop] ?? null;
            if ($cssVar === null) {
                continue;
            }

            $cssValue = self::resolveColorValue($value);
            $cssVarName = str_replace('{variant}', $variant, $cssVar);

            $pairs[] = "{$cssVarName}: {$cssValue}";
        }

        if ($pairs === []) {
            return null;
        }

        return implode('; ', $pairs);
    }

    public static function resolveColorValue(string $value): string
    {
        $value = trim($value);

        if (preg_match('/^#[0-9a-fA-F]{3,8}$/', $value) === 1) {
            return $value;
        }

        if (preg_match('/^rgba?\s*\(/i', $value) === 1) {
            return $value;
        }

        if (preg_match('/^hsla?\s*\(/i', $value) === 1) {
            return $value;
        }

        if (in_array(strtolower($value), self::$cssNamedColors, true)) {
            return $value;
        }

        if (preg_match('/^[a-zA-Z]+-\d+$/', $value) === 1) {
            return 'var(--color-'.$value.')';
        }

        return $value;
    }

    /**
     * @return array{string, string, string, string, string}
     */
    public static function expandColorLight(string $color): array
    {
        $color = trim($color);

        if (preg_match('/^([a-zA-Z]+)-(\d+)$/', $color, $m) === 1) {
            $baseName = strtolower($m[1]);

            return [
                'var(--color-'.$baseName.'-50)',
                'var(--color-'.$baseName.'-700)',
                'var(--color-'.$baseName.'-100)',
                'var(--color-'.$baseName.'-200)',
                'var(--color-'.$baseName.'-100)',
            ];
        }

        if (preg_match('/^#[0-9a-fA-F]{3,8}$/', $color) === 1) {
            $hex = ltrim($color, '#');
            if (strlen($hex) === 3) {
                $hex = $hex[0].$hex[0].$hex[1].$hex[1].$hex[2].$hex[2];
            }
            $r = hexdec(substr($hex, 0, 2));
            $g = hexdec(substr($hex, 2, 2));
            $b = hexdec(substr($hex, 4, 2));

            return [
                sprintf('rgba(%d, %d, %d, 0.08)', $r, $g, $b),
                '#1e293b',
                sprintf('rgba(%d, %d, %d, 0.12)', $r, $g, $b),
                sprintf('rgba(%d, %d, %d, 0.25)', $r, $g, $b),
                sprintf('rgba(%d, %d, %d, 0.15)', $r, $g, $b),
            ];
        }

        return [$color, $color, $color, $color, $color];
    }

    /**
     * @return array{string, string, string, string, string}
     */
    public static function expandColor(string $color): array
    {
        $color = trim($color);

        if (preg_match('/^([a-zA-Z]+)-(\d+)$/', $color, $m) === 1) {
            $shade = (int) $m[2];
            $baseName = strtolower($m[1]);

            $textShade = self::textShadeForTailwind($shade);
            $hoverShade = min($shade + 100, 950);
            $borderShade = min($shade + 200, 950);

            return [
                'var(--color-'.$baseName.'-'.$shade.')',
                'var(--color-'.$baseName.'-'.$textShade.')',
                'var(--color-'.$baseName.'-'.$hoverShade.')',
                'var(--color-'.$baseName.'-'.$borderShade.')',
                'var(--color-'.$baseName.'-'.$textShade.')',
            ];
        }

        if (preg_match('/^#[0-9a-fA-F]{3,8}$/', $color) === 1) {
            $hover = self::darkenHex($color, 0.85);
            $border = self::darkenHex($color, 0.75);
            $text = self::contrastTextForHex($color);
            $focusRing = self::focusRingForHex($color);

            return [$color, $text, $hover, $border, $focusRing];
        }

        return [$color, $color, $color, $color, $color];
    }

    private static function textShadeForTailwind(int $shade): int
    {
        return match (true) {
            $shade <= 100 => 800,
            $shade <= 200 => 800,
            $shade <= 300 => 800,
            $shade <= 400 => 900,
            default => 100,
        };
    }

    private static function darkenHex(string $hex, float $factor): string
    {
        $hex = ltrim($hex, '#');

        if (strlen($hex) === 3) {
            $hex = $hex[0].$hex[0].$hex[1].$hex[1].$hex[2].$hex[2];
        }

        if (strlen($hex) === 8) {
            $hex = substr($hex, 0, 6);
        }

        $r = (int) hexdec(substr($hex, 0, 2));
        $g = (int) hexdec(substr($hex, 2, 2));
        $b = (int) hexdec(substr($hex, 4, 2));

        $r = (int) round($r * $factor);
        $g = (int) round($g * $factor);
        $b = (int) round($b * $factor);

        return sprintf('#%02x%02x%02x', $r, $g, $b);
    }

    private static function contrastTextForHex(string $hex): string
    {
        $hex = ltrim($hex, '#');

        if (strlen($hex) === 3) {
            $hex = $hex[0].$hex[0].$hex[1].$hex[1].$hex[2].$hex[2];
        }

        $r = (int) hexdec(substr($hex, 0, 2));
        $g = (int) hexdec(substr($hex, 2, 2));
        $b = (int) hexdec(substr($hex, 4, 2));

        $luminance = (0.299 * $r + 0.587 * $g + 0.114 * $b) / 255;

        return $luminance > 0.5 ? '#1e293b' : '#ffffff';
    }

    private static function focusRingForHex(string $hex): string
    {
        $hex = ltrim($hex, '#');

        if (strlen($hex) === 3) {
            $hex = $hex[0].$hex[0].$hex[1].$hex[1].$hex[2].$hex[2];
        }

        if (strlen($hex) === 8) {
            $hex = substr($hex, 0, 6);
        }

        $r = (int) hexdec(substr($hex, 0, 2));
        $g = (int) hexdec(substr($hex, 2, 2));
        $b = (int) hexdec(substr($hex, 4, 2));

        return sprintf('rgba(%d, %d, %d, 0.2)', $r, $g, $b);
    }
}
