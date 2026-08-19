---
layout: home

hero:
  name: Basekit Laravel UI
  text: Build Laravel interfaces faster
  tagline: 35 production-ready Blade components powered by Tailwind CSS and Alpine.js. Customizable, type-safe, and built for Laravel.
  actions:
    - theme: brand
      text: Get Started
      link: /guide/installation
    - theme: alt
      text: Explore Components
      link: /styleguide
  image:
    src: /logo.png
    alt: Basekit Laravel UI

features:
  - icon: 🧩
    title: 35 Ready-to-Use Components
    details: Forms, navigation, feedback, overlays, data display and more — ready to use directly from Blade.

  - icon: 🧱
    title: Blade First
    details: Build interfaces using familiar Laravel Blade components without adopting another frontend framework.

  - icon: 🎨
    title: Easy to Theme
    details: Customize colors, spacing, radii and other design tokens at runtime using CSS variables.

  - icon: ⚡
    title: Alpine-Powered Interactions
    details: Modals, dropdowns, tabs, toasts and more without building a JavaScript application.

  - icon: 🎯
    title: Developer Friendly
    details: PHP component classes provide type hints, IDE autocomplete and discoverable component APIs.

  - icon: 📦
    title: Ship Only What You Use
    details: Enable the components you need and build an optimized stylesheet for your application.
---

## 🧩 Everything You Need to Build Laravel Interfaces

Stop rebuilding the same buttons, inputs, modals, dropdowns, tables, and feedback states for every Laravel application.

Basekit gives you **35 reusable Blade components** with consistent styling, variants, sizing, theming, and interactive behavior — while keeping you in the Laravel ecosystem.

Use the components as they are, customize them to match your brand, or publish the underlying views when you need complete control.

**[Explore all 35 components →](/styleguide)**

---

## 🚀 Quick Start

### 1. Install Basekit

Install the package with Composer:

```bash
composer require basekit-laravel/basekit-laravel-ui
```

### 2. Include the CSS

Add Basekit to your application's main CSS file:

```css
@import "./vendor/basekit-laravel/v1/basekit-ui.css";
```

### 3. Include Alpine.js

Interactive components such as modals, dropdowns, tabs, toasts, tooltips, and selects use Alpine.js.

If you're already using Livewire, Alpine.js is available through:

```blade
@livewireScripts
```

Otherwise, include Alpine.js in your layout:

```blade
<script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
```

### 4. Start Building

Use Basekit components directly from your Blade templates:

```blade
<x-basekit-ui::card>
    <x-slot:header>
        <h2 class="text-xl font-semibold">Welcome back</h2>
    </x-slot>

    <x-basekit-ui::stack spacing="lg">
        <x-basekit-ui::input
            name="email"
            type="email"
            label="Email"
            icon="envelope"
        />

        <x-basekit-ui::input
            name="password"
            type="password"
            label="Password"
        />

        <x-basekit-ui::button
            type="submit"
            variant="primary"
            icon="arrow-right"
        >
            Sign in
        </x-basekit-ui::button>
    </x-basekit-ui::stack>
</x-basekit-ui::card>
```

That's it. No component scaffolding required.

**[Read the installation guide →](/guide/installation)**

---

## 🎨 Built for Customization

Basekit comes with sensible defaults, but gives you more control when you need it.

### Theme with CSS Variables

For quick customization, override Basekit's CSS variables in your application:

```css
:root {
  --color-primary-600: #your-brand-color;
  --button-radius: 0.5rem;
  --card-padding: 2rem;
}
```

Theme changes are applied through CSS variables, making it easy to adapt Basekit to your application's visual identity.

### Configure Your Components

Publish the configuration file to control enabled components, variants, sizes, and defaults:

```bash
php artisan vendor:publish --tag=basekit-laravel-ui-config
```

For example:

```php
// config/basekit-laravel-ui.php

return [
    'components' => [
        'button' => [
            'enabled' => true,
            'variants' => ['primary', 'secondary', 'danger'],
            'sizes' => ['sm', 'md', 'lg'],
            'default_variant' => 'primary',
            'default_size' => 'md',
        ],
    ],
];
```

### Customize the Theme Source

Need deeper control over Basekit's styles? Publish the CSS theme:

```bash
php artisan vendor:publish --tag=basekit-laravel-ui-css-v1
```

You can then customize the theme source directly for your application.

### Own the Markup

Need complete control over a component?

Publish the component views:

```bash
php artisan vendor:publish --tag=basekit-views
```

Published views are copied to `resources/views/vendor/basekit/` and automatically override the package components.

**[Learn more about theming →](/guide/theming)**

---

## ⚡ Ship Only What You Use

Basekit's component-aware build system can generate CSS based on the components enabled in your configuration.

That means applications using only a subset of Basekit don't need to ship styles for every component.

In the included bundle-size comparison:

| Configuration  | Bundle Size |
| -------------- | ----------: |
| All components |      ~200KB |
| 3 components   |       ~55KB |
| **Reduction**  |    **~73%** |

After configuring the components you need, build your optimized stylesheet:

```bash
php artisan basekit:ui:build
```

While developing, use watch mode to automatically rebuild when your configuration or styles change:

```bash
php artisan basekit:ui:build --watch
```

This gives you the convenience of a complete component library without requiring every application to ship the complete stylesheet.

---

## 🧩 Component Catalog

Basekit includes **35 components** organized around the UI patterns you'll use across Laravel applications.

### 📝 Forms

Build accessible forms with consistent validation, states, sizing, and styling.

- **[Button](/components/button)** — Buttons with variants, sizes, icons, and states
- **[Input](/components/input)** — Text inputs with labels, errors, hints, and icons
- **[Textarea](/components/textarea)** — Multi-line text input with auto-resize
- **[Checkbox](/components/checkbox)** — Checkbox controls with label support
- **[Radio](/components/radio)** — Radio controls for single selections
- **[Select](/components/select)** — Dropdown selection controls
- **[Multi-Select](/components/multi-select)** — Multiple selections with chips
- **[Toggle](/components/toggle)** — Interactive switch controls
- **[Fieldset](/components/fieldset)** — Semantic groups for form controls
- **[Copy Button](/components/copy-button)** — Copy-to-clipboard with transient feedback

### 💬 Feedback

Communicate status, progress, loading states, and application feedback.

- **[Alert](/components/alert)** — Contextual alert messages
- **[Toast](/components/toast)** — Auto-dismissing notifications
- **[Tooltip](/components/tooltip)** — Contextual hover information
- **[Progress](/components/progress)** — Progress and completion indicators
- **[Spinner](/components/spinner)** — Loading indicators
- **[Skeleton](/components/skeleton)** — Placeholder loading states
- **[Empty State](/components/empty-state)** — Empty data and no-results states

### 🧭 Navigation

Help users move through your application and interact with actions.

- **[Breadcrumb](/components/breadcrumb)** — Page hierarchy navigation
- **[Pagination](/components/pagination)** — Paginated data navigation
- **[Tabs](/components/tabs)** — Interactive tabbed interfaces
- **[Dropdown Menu](/components/dropdown-menu)** — Interactive action menus
- **[Link](/components/link)** — Consistently styled links

### 📐 Layout

Create consistent structure, spacing, and responsive layouts.

- **[Container](/components/container)** — Responsive page containers
- **[Divider](/components/divider)** — Content separators
- **[Stack](/components/stack)** — Vertical and horizontal layouts
- **[Grid](/components/grid)** — Responsive grid layouts

### 📊 Display

Present application content and data consistently.

- **[Card](/components/card)** — Group related content and actions
- **[Badge](/components/badge)** — Labels, counts, and status indicators
- **[Avatar](/components/avatar)** — User and profile images
- **[Table](/components/table)** — Structured data tables
- **[List](/components/list)** — Styled ordered and unordered lists
- **[Description List](/components/description-list)** — Structured key-value information
- **[Stat](/components/stat)** — Dashboard statistics and metrics

### 🪟 Overlays & Disclosure

Add interactive content without leaving the current page.

- **[Modal](/components/modal)** — Alpine-powered modal dialogs
- **[Accordion](/components/accordion)** — Collapsible content panels

### 🛠️ Meta & Theme

Utilities for application metadata and runtime theming.

- **[SEO](/components/seo)** — Title, meta, and social head tags
- **[Theme Variables](/components/theme-variables)** — Runtime theme palette CSS variables

---

## ✨ Ready to Build?

Browse every component, variant, size, and state in the interactive style guide.

**[Explore all 35 components →](/styleguide)**

Or jump straight into your application:

**[Get started with Basekit →](/guide/installation)**
