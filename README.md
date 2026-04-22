# Basekit Laravel UI

A modular Laravel 12 UI component library with reusable Blade components, Tailwind 4 CSS theming, and component-aware CSS builds for optimal performance.

## Features

- 🎨 **Tailwind 4 CSS-based theming** - Runtime customization via CSS variables
- 🔧 **Highly configurable** - Enable/disable components, customize variants and sizes
- 🌲 **Component-aware CSS build** - Include CSS only for enabled components
- 🎯 **Type-safe components** - PHP classes with IDE autocomplete
- ✨ **Heroicons integration** - Beautiful icons out of the box
- 📦 **Publishable views** - Customize component templates directly

## Installation

### Basic Setup

Install via Composer:

```bash
composer require basekit-laravel/basekit-laravel-ui
```

Include the CSS in your main CSS file:

```css
@import "./vendor/basekit-laravel/v1/basekit-ui.css";
```

### Include Alpine.js

Several Basekit components (Accordion, Dropdown Menu, Input password toggle, Modal, Multi-Select, Tabs, Toast, Tooltip, and Table) require Alpine.js. Add it to your layout:

```blade
<script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
```

Or with Livewire, use `@livewireScripts` which includes Alpine.js automatically:

```blade
@livewireScripts
```

See the [installation guide](/docs/guide/installation.md#alpine-js-required-for-interactive-components) for more details.

### Advanced Setup

Publish the configuration file:

```bash
php artisan vendor:publish --tag=basekit-laravel-ui-config
```

Publish the CSS theme:

```bash
php artisan vendor:publish --tag=basekit-laravel-ui-css-v1
```

Build optimized CSS based on your configuration:

```bash
php artisan basekit:ui:build
```

For development, use watch mode:

```bash
php artisan basekit:ui:build --watch
```

## Quick Start

```blade
<x-basekit-ui::button variant="primary" icon="check">
    Save Changes
</x-basekit-ui::button>

<x-basekit-ui::input
    label="Email"
    placeholder="Enter your email"
    icon="envelope"
/>

<x-basekit-ui::card>
    <x-slot:header>
        <h3>Card Title</h3>
    </x-slot>

    Card content goes here...

    <x-slot:footer>
        <x-basekit-ui::button>Action</x-basekit-ui::button>
    </x-slot>
</x-basekit-ui::card>
```

## Styling Conventions

- Component CSS uses BEM with the `bk-` prefix (blocks, elements, and modifiers).
- Tailwind utilities are for component usage in Blade markup (layout, spacing, overrides).
- When combining classes, Tailwind Merge handles conflicts for the `class` attribute.

## Configuration

Edit `config/basekit-laravel-ui.php` to customize components:

```php
return [
    'components' => [
        'button' => [
            'enabled' => true,
            'variants' => ['primary', 'secondary', 'danger'],
            'sizes' => ['sm', 'md', 'lg'],
            'default_variant' => 'primary',
            'default_size' => 'md',
        ],
        // ... more components
    ],

    'icons' => [
        'style' => 'outline', // outline, solid, mini
    ],

    'build' => [
        'debounce_ms' => 500,
    ],
];
```

After changing configuration, rebuild CSS:

```bash
php artisan basekit:ui:build
```

For development, use watch mode:

```bash
php artisan basekit:ui:build --watch
```

## Customization

### CSS Variables

Override theme variables in your CSS:

```css
:root {
  --color-primary-600: #your-brand-color;
  --button-radius: 0.5rem;
  --card-padding: 2rem;
}
```

### Publishing Views

Publish component views for full customization:

```bash
php artisan vendor:publish --tag=basekit-views
```

Published views are copied to `resources/views/vendor/basekit/` and automatically override package components.

## Available Components

The package includes **33 production-ready components** organized into 6 categories:

### Form Components (8)

- [Button](docs/components/button.md)
- [Input](docs/components/input.md)
- [Textarea](docs/components/textarea.md)
- [Checkbox](docs/components/checkbox.md)
- [Radio](docs/components/radio.md)
- [Select](docs/components/select.md)
- [Multi-Select](docs/components/multi-select.md)
- [Toggle](docs/components/toggle.md)

### Feedback Components (7)

- [Alert](docs/components/alert.md)
- [Toast](docs/components/toast.md)
- [Tooltip](docs/components/tooltip.md)
- [Progress](docs/components/progress.md)
- [Spinner](docs/components/spinner.md)
- [Skeleton](docs/components/skeleton.md)
- [Empty State](docs/components/empty-state.md)

### Navigation Components (5)

- [Breadcrumb](docs/components/breadcrumb.md)
- [Pagination](docs/components/pagination.md)
- [Tabs](docs/components/tabs.md)
- [Dropdown Menu](docs/components/dropdown-menu.md)
- [Link](docs/components/link.md)

### Layout Components (4)

- [Stack](docs/components/stack.md)
- [Grid](docs/components/grid.md)
- [Container](docs/components/container.md)
- [Divider](docs/components/divider.md)

### Display Components (7)

- [Table](docs/components/table.md)
- [List](docs/components/list.md)
- [Description List](docs/components/description-list.md)
- [Stat](docs/components/stat.md)
- [Card](docs/components/card.md)
- [Badge](docs/components/badge.md)
- [Avatar](docs/components/avatar.md)

### Dialog & Overlay (2)

- [Modal](docs/components/modal.md)
- [Accordion](docs/components/accordion.md)

## Documentation

Full documentation available at: [https://basekit-laravel.github.io/basekit-laravel-ui](https://basekit-laravel.github.io/basekit-laravel-ui)

See also:

- [IMPLEMENTATION.md](IMPLEMENTATION.md) — Architecture and development guide
- [STRUCTURE.md](STRUCTURE.md) — Component organization and relationships

## CI Quality Checks

The CI workflow validates production readiness on pushes and pull requests by running:

- Feature tests: `php vendor/bin/pest --no-coverage`
- CSS build: `./vendor/bin/testbench basekit:ui:build`
- Styleguide generation: `./vendor/bin/testbench basekit:ui:styleguide`
- CSS/docs token sync guard: `bash tools/verify-doc-token-sync.sh`

You can run these locally before opening a pull request.

## Performance

Component-based builds can significantly reduce bundle size:

- Full bundle (all components): ~200KB
- Minimal config (3 components): ~55KB
- **Reduction: 73%**

## Migration

See [CHANGELOG.md](CHANGELOG.md) for version changes and migration guides.

## License

The MIT License (MIT). Please see [License File](LICENSE) for more information.
