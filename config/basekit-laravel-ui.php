<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Blade Component Alias Prefix
    |--------------------------------------------------------------------------
    |
    | This namespace is used for package components such as:
    | <x-basekit-ui::button />
    |
    */

    'component_prefix' => 'basekit-ui',

    /*
    |--------------------------------------------------------------------------
    | Component Configuration
    |--------------------------------------------------------------------------
    |
    | Configure which components are enabled and their default variants.
    | Disabled components will not be registered and their CSS will not be
    | included in the built bundle, reducing file size.
    |
    */

    'components' => [
        'button' => [
            'enabled' => true,
            'variants' => ['primary', 'secondary', 'success', 'warning', 'danger', 'info', 'ghost'],
            'sizes' => ['sm', 'md', 'lg'],
            'default_variant' => 'primary',
            'default_size' => 'md',
        ],

        'input' => [
            'enabled' => true,
            'variants' => ['primary', 'secondary', 'success', 'warning', 'info', 'ghost'],
            'sizes' => ['sm', 'md', 'lg'],
            'default_variant' => 'secondary',
            'default_size' => 'md',
        ],

        'textarea' => [
            'enabled' => true,
            'variants' => ['primary', 'secondary', 'success', 'warning', 'info', 'ghost'],
            'sizes' => ['sm', 'md', 'lg'],
            'default_variant' => 'secondary',
            'default_size' => 'md',
        ],

        'checkbox' => [
            'enabled' => true,
            'variants' => ['primary', 'secondary', 'success', 'warning', 'danger', 'info', 'ghost'],
            'sizes' => ['sm', 'md', 'lg'],
            'default_variant' => 'primary',
            'default_size' => 'md',
        ],

        'radio' => [
            'enabled' => true,
            'variants' => ['primary', 'secondary', 'success', 'warning', 'danger', 'info', 'ghost'],
            'sizes' => ['sm', 'md', 'lg'],
            'default_variant' => 'primary',
            'default_size' => 'md',
        ],

        'select' => [
            'enabled' => true,
            'variants' => ['primary', 'secondary', 'success', 'warning', 'info', 'ghost'],
            'sizes' => ['sm', 'md', 'lg'],
            'default_variant' => 'secondary',
            'default_size' => 'md',
        ],

        'multi-select' => [
            'enabled' => true,
            'variants' => ['primary', 'secondary', 'success', 'warning', 'info', 'ghost'],
            'sizes' => ['sm', 'md', 'lg'],
            'default_variant' => 'secondary',
            'default_size' => 'md',
        ],

        'toggle' => [
            'enabled' => true,
            'variants' => ['primary', 'secondary', 'success', 'warning', 'danger', 'info', 'ghost'],
            'sizes' => ['sm', 'md', 'lg'],
            'default_variant' => 'primary',
            'default_size' => 'md',
        ],

        // Feedback Components
        'alert' => [
            'enabled' => true,
            'variants' => ['primary', 'secondary', 'success', 'warning', 'danger', 'info', 'ghost'],
            'default_variant' => 'info',
        ],

        'toast' => [
            'enabled' => true,
            'variants' => ['primary', 'secondary', 'success', 'warning', 'danger', 'info', 'ghost'],
            'default_variant' => 'info',
        ],

        'tooltip' => [
            'enabled' => true,
            'positions' => ['top', 'bottom', 'left', 'right'],
            'default_position' => 'top',
        ],

        'progress' => [
            'enabled' => true,
            'variants' => ['primary', 'secondary', 'success', 'warning', 'danger', 'info', 'ghost', 'white'],
            'sizes' => ['sm', 'md', 'lg'],
            'default_variant' => 'primary',
            'default_size' => 'md',
        ],

        'spinner' => [
            'enabled' => true,
            'variants' => ['primary', 'secondary', 'success', 'warning', 'danger', 'info', 'ghost', 'white'],
            'sizes' => ['xs', 'sm', 'md', 'lg', 'xl'],
            'default_variant' => 'primary',
            'default_size' => 'md',
        ],

        'skeleton' => [
            'enabled' => true,
            'variants' => ['default', 'circle', 'text'],
            'default_variant' => 'default',
            'sizes' => ['xs', 'sm', 'md', 'lg', 'xl'],
            'default_size' => 'md',
            'rounded' => ['none', 'sm', 'md', 'lg', 'full'],
            'default_rounded' => 'md',
        ],

        'empty-state' => [
            'enabled' => true,
            'variants' => ['primary', 'secondary', 'success', 'warning', 'danger', 'info', 'ghost'],
            'sizes' => ['sm', 'md', 'lg'],
            'default_variant' => 'secondary',
            'default_size' => 'md',
        ],

        // Navigation Components
        'breadcrumb' => [
            'enabled' => true,
            'separator' => 'chevron-right',
            'sizes' => ['sm', 'md', 'lg'],
            'default_size' => 'md',
        ],

        'pagination' => [
            'enabled' => true,
        ],

        'tabs' => [
            'enabled' => true,
            'variants' => ['underline', 'pills', 'boxed'],
            'default_variant' => 'underline',
        ],

        'dropdown-menu' => [
            'enabled' => true,
            'positions' => ['bottom-left', 'bottom-right', 'top-left', 'top-right'],
            'default_position' => 'bottom-left',
        ],

        'link' => [
            'enabled' => true,
            'variants' => ['primary', 'secondary', 'success', 'warning', 'danger', 'info', 'ghost', 'muted'],
            'default_variant' => 'secondary',
        ],

        // Layout Components
        'stack' => [
            'enabled' => true,
            'spacing' => ['xs', 'sm', 'md', 'lg', 'xl'],
            'default_spacing' => 'md',
        ],

        'grid' => [
            'enabled' => true,
            'default_cols' => '12',
            'gaps' => ['xs', 'sm', 'md', 'lg', 'xl'],
            'default_gap' => 'md',
        ],

        'container' => [
            'enabled' => true,
            'sizes' => ['sm', 'md', 'lg', 'xl', 'full'],
            'default_size' => 'lg',
        ],

        'divider' => [
            'enabled' => true,
            'orientations' => ['horizontal', 'vertical'],
            'default_orientation' => 'horizontal',
            'variants' => ['solid', 'dashed', 'dotted'],
            'default_variant' => 'solid',
            'tones' => ['light', 'default', 'dark'],
            'default_tone' => 'default',
        ],

        // Display Components
        'table' => [
            'enabled' => true,
            'variants' => ['default', 'bordered', 'striped', 'hoverable'],
            'sizes' => ['sm', 'md', 'lg'],
            'default_variant' => 'default',
            'default_size' => 'md',
        ],

        'list' => [
            'enabled' => true,
            'variants' => ['default', 'unordered', 'ordered', 'divided', 'bordered', 'marker-disc', 'marker-circle', 'marker-square', 'marker-decimal', 'marker-none'],
            'default_variant' => 'default',
        ],

        'description-list' => [
            'enabled' => true,
            'variants' => ['default', 'horizontal', 'striped'],
            'gaps' => ['sm', 'md', 'lg'],
            'default_variant' => 'default',
            'default_gap' => 'md',
        ],

        'stat' => [
            'enabled' => true,
        ],

        'card' => [
            'enabled' => true,
            'variants' => ['default', 'bordered'],
            'default_variant' => 'default',
        ],

        'badge' => [
            'enabled' => true,
            'variants' => ['primary', 'secondary', 'success', 'warning', 'danger', 'info', 'ghost'],
            'sizes' => ['sm', 'md', 'lg'],
            'default_variant' => 'secondary',
            'default_size' => 'md',
        ],

        'avatar' => [
            'enabled' => true,
            'sizes' => ['sm', 'md', 'lg', 'xl'],
            'default_size' => 'md',
            'shapes' => ['round', 'soft', 'square'],
            'default_shape' => 'round',
            'statuses' => ['online', 'away', 'busy', 'offline'],
        ],

        // Dialog Components
        'modal' => [
            'enabled' => true,
            'sizes' => ['sm', 'md', 'lg', 'xl', 'full'],
            'default_size' => 'md',
        ],

        'accordion' => [
            'enabled' => true,
            'variants' => ['default', 'bordered', 'flush', 'separated'],
            'sizes' => ['sm', 'md', 'lg'],
            'default_variant' => 'default',
            'default_size' => 'md',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Icon Configuration
    |--------------------------------------------------------------------------
    |
    | Configure icon rendering. The package uses Blade Heroicons by default.
    | Available styles: 'outline', 'solid', 'mini'
    |
    */

    'icons' => [
        'style' => 'outline',
    ],

    /*
    |--------------------------------------------------------------------------
    | Build Configuration
    |--------------------------------------------------------------------------
    |
    | Configuration for the CSS build process.
    |
    */

    'build' => [
        // Debounce time in milliseconds for watch mode
        'debounce_ms' => 500,

        // Output path for built CSS (relative to public path)
        'output_path' => 'vendor/basekit-laravel/v1/basekit-ui.css',
    ],

    /*
    |--------------------------------------------------------------------------
    | Theme Version
    |--------------------------------------------------------------------------
    |
    | Current theme schema version. Used for migration tracking.
    |
    */

    'version' => '1',
];
