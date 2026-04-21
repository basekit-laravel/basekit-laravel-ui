---
layout: home

hero:
  name: Basekit Laravel UI
  text: Modern UI Components for Laravel
  tagline: Build beautiful interfaces with reusable Blade components, and Tailwind 4 theming
  actions:
    - theme: brand
      text: Get Started
      link: /guide/installation
    - theme: alt
      text: View Components
      link: /components/button
  image:
    src: /logo.png
    alt: Basekit Laravel UI

features:
  - icon: 🎨
    title: Tailwind 4 Theming
    details: CSS-based theming with runtime customization via CSS variables. No rebuild required for theme changes.

  - icon: 🔧
    title: Highly Configurable
    details: Enable/disable components, customize variants and sizes. Build only what you use.

  - icon: 🌲
    title: Component-Aware CSS Build
    details: Optimized build system includes CSS only for enabled components, reducing bundle size.

  - icon: 🎯
    title: Type-Safe Components
    details: PHP classes with constructor props, IDE autocomplete, and type hints for better DX.

  - icon: 💎
    title: Heroicons Integration
    details: Beautiful icons built-in with support for outline, solid, and mini styles.

  - icon: 📦
    title: Publishable Views
    details: Fully customize components to your needs by publishing component views.

  - icon: ⚡
    title: Smart Class Merging
    details: Tailwind Merge integration for intelligent class conflict resolution.

  - icon: 🚀
    title: Laravel 12 Ready
    details: Built for Laravel 12 with modern best practices and conventions.
---

## What is Basekit Laravel UI?

Reusable Blade UI components for Laravel apps using Tailwind CSS 4.

## Quick Start

### 1. Installation

```bash
composer require basekit-laravel/basekit-laravel-ui
```

### 2. Include CSS

```css
/* resources/css/app.css */
@import "../../vendor/basekit-laravel/basekit-laravel-ui/resources/css/dist/v1/theme.css";
```

### 3. Use Components

```blade
<x-basekit-ui::button variant="primary" icon="check">
    Save Changes
</x-basekit-ui::button>

<x-basekit-ui::input
    label="Email"
    placeholder="you@example.com"
    icon="envelope"
/>

<x-basekit-ui::card>
    <x-slot:header>
        <h3>Welcome</h3>
    </x-slot>

    Your content here...

    <x-slot:footer>
        <x-basekit-ui::button>Action</x-basekit-ui::button>
    </x-slot>
</x-basekit-ui::card>
```

## Performance

Component-based builds can significantly reduce bundle size:

- **Full bundle**: 200KB (all components enabled)
- **Minimal config**: 55KB (3 components enabled)
- **Reduction**: 73%

To enable:

### 1. Publish Configuration

```bash
php artisan vendor:publish --tag=basekit-laravel-ui-config
```

### 2. Disable unused components

In `config/basekit-laravel-ui.php`

### 3. Build CSS:

```bash
php artisan basekit:ui:build
```

### 4. Include built file:

```css
@import "../../public/vendor/basekit-laravel/v1/basekit-ui.css";
```

### 5. Rebuild assets:

```bash
npm run build
```

## Features at a Glance

```php [Configuration]
// config/basekit-laravel-ui.php
return [
    'components' => [
        'button' => [
            'enabled' => true,
            'variants' => ['primary', 'secondary'],
            'sizes' => ['sm', 'md', 'lg'],
        ],
    ],
];
```

```css [Theming]
/* Override CSS variables */
:root {
  --color-primary-600: #your-brand;
  --button-radius: 0.5rem;
  --card-padding: 2rem;
}
```

```bash [Optional Build]
# Optional: build optimized CSS based on config
php artisan basekit:ui:build

# Optional: watch mode for package customization
php artisan basekit:ui:build --watch
```

## Component Catalog

### Form (8)

Build accessible forms with full validation support.

- **[Button](/components/button)** - Versatile button with variants, sizes, and icons
- **[Input](/components/input)** - Text input with error states and icons
- **[Textarea](/components/textarea)** - Multi-line text input with auto-resize
- **[Checkbox](/components/checkbox)** - Checkbox with label support
- **[Radio](/components/radio)** - Radio button for single selections
- **[Select](/components/select)** - Dropdown select for single-option selection
- **[Multi-Select](/components/multi-select)** - Select multiple options with chips
- **[Toggle](/components/toggle)** - Switch toggle powered by Alpine.js

### Feedback (7)

Provide user feedback and loading states.

- **[Alert](/components/alert)** - Alert banners for messages
- **[Toast](/components/toast)** - Notification toast with auto-dismiss
- **[Tooltip](/components/tooltip)** - Hover tooltip with positioning
- **[Progress](/components/progress)** - Progress bar for completion status
- **[Spinner](/components/spinner)** - Loading spinner indicator
- **[Skeleton](/components/skeleton)** - Placeholder loading skeleton
- **[Empty State](/components/empty-state)** - No data or empty results display

### Navigation (5)

Navigate through your application.

- **[Breadcrumb](/components/breadcrumb)** - Page hierarchy navigation
- **[Pagination](/components/pagination)** - Paginated data navigation
- **[Tabs](/components/tabs)** - Tabbed interface with Alpine.js
- **[Dropdown Menu](/components/dropdown-menu)** - Interactive dropdown menu
- **[Link](/components/link)** - Styled link component

### Layout (4)

Structure your page layouts.

- **[Container](/components/container)** - Responsive page container
- **[Divider](/components/divider)** - Horizontal separator
- **[Stack](/components/stack)** - Vertical/horizontal layout
- **[Grid](/components/grid)** - Responsive grid layout

### Display (7)

Present your data.

- **[Card](/components/card)** - Container for grouping content
- **[Badge](/components/badge)** - Labels, counts, and status indicators
- **[Avatar](/components/avatar)** - User profile images
- **[Table](/components/table)** - Styled data table
- **[List](/components/list)** - Styled ordered/unordered lists
- **[Description List](/components/description-list)** - Key-value pairs
- **[Stat](/components/stat)** - Dashboard statistics display

### Overlay (2)

Modal dialogs and overlays.

- **[Modal](/components/modal)** - Modal dialog with Alpine.js
- **[Accordion](/components/accordion)** - Collapsible content panels
