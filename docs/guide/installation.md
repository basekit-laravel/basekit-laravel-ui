# Installation

## Requirements

- PHP 8.3 or higher
- Laravel 12.0 or 13.0

## Install via Composer

```bash
composer require basekit-laravel/basekit-laravel-ui
```

The package will be auto-discovered by Laravel.

## Publish Configuration

Publish the configuration file to customize component settings:

```bash
php artisan vendor:publish --tag=basekit-laravel-ui-config
```

This will create `config/basekit-laravel-ui.php` where you can:

- Enable/disable components
- Configure variants and sizes
- Set default values
- Customize icon styles

## Include CSS in Your App (Recommended)

Import the prebuilt CSS directly from the Composer package:

```css
/* resources/css/app.css */
@import "../../vendor/basekit-laravel/basekit-laravel-ui/resources/css/dist/v1/theme.css";
```

This works out of the box after `composer install` / `composer update` and does not require publishing CSS or running `basekit:ui:build`.

## Change Theme Color in 30 Seconds

Override Basekit color tokens in your app stylesheet:

```css
/* resources/css/app.css */
:root {
  --color-primary-500: #8b5cf6;
  --color-primary-600: #7c3aed;
  --color-primary-700: #6d28d9;
}
```

After saving, rebuild your app assets (for example Vite) so the updated CSS is served.

## Optional: Publish or Build CSS

Skip this section if you're using the recommended `@import` approach. These options are for when you want CSS files under `public/` or a config-driven optimized build.

### Option A — Publish prebuilt CSS

Copies the ready-to-use CSS into your `public/` directory:

```bash
php artisan vendor:publish --tag=basekit-laravel-ui-css-v1
```

Then include it in your layout:

```blade
<link href="{{ asset('vendor/basekit-laravel/v1/basekit-ui.css') }}" rel="stylesheet">
```

### Option B — Build CSS from config

Generates a bundle in `public/vendor/basekit-laravel/v1/basekit-ui.css` based on enabled components in `config/basekit-laravel-ui.php`.

#### 1. Publish configuration

```bash
php artisan vendor:publish --tag=basekit-laravel-ui-config
```

#### 2. Build

```bash
php artisan basekit:ui:build
```

For watch mode during development:

```bash
php artisan basekit:ui:build --watch
```

#### 3. Include the built file

```css
/* resources/css/app.css */
@import "../../public/vendor/basekit-laravel/v1/basekit-ui.css";
```

## Alpine.js (Required for Interactive Components)

Several Basekit components depend on Alpine.js for interactivity: Accordion, Dropdown Menu, Input (password toggle, number input, masked inputs), Modal, Multi-Select, Tabs, Toast, Tooltip, and Table.

### Install Alpine.js

Include Alpine.js in your layout file:

```blade
<!-- resources/views/layouts/app.blade.php -->
<script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
```

Or via NPM (if using build tools like Vite):

```bash
npm install alpinejs
```

Then in your JavaScript:

```javascript
// resources/js/app.js
import Alpine from "alpinejs";

Alpine.start();
```

### Using with Livewire

If you're using Livewire, add `@livewireScripts` to your layout to include Alpine.js and Livewire's Alpine integration:

```blade
<!-- resources/views/layouts/app.blade.php -->
<body>
    <!-- Your content -->

    @livewireScripts
</body>
```

This provides Alpine.js alongside Livewire's component lifecycle integration.

### Which Components Need Alpine.js?

- **Accordion** — Collapsible sections
- **Dropdown Menu** — Interactive menu toggle
- **Input** — Password visibility toggle, Masked and Number Inputs
- **Modal** — Modal dialogs with transitions
- **Multi-Select** — Chip selection and dropdown
- **Tabs** — Tab switching
- **Toast** — Notification toasts
- **Tooltip** — Hover and focus tooltips
- **Table** — Column visibility menu and row expansion

## Verify Installation

Test that components are working:

```blade
<x-basekit-ui::button variant="primary">
    It works!
</x-basekit-ui::button>
```

## Next Steps

- [Component quick reference](/components)
- [Theming guide](/guide/theming)
- [Performance guide](/guide/performance)
- [Explore components](/components/button)
- [Contributing to Basekit](/guide/contributing)
