# Theming

Basekit Laravel UI uses Tailwind CSS 4's CSS-based theming system for maximum flexibility and runtime customization.

## CSS Variables Architecture

The theming system uses a three-tier variable architecture:

1. **Global Design Tokens** - Brand colors, spacing, typography
2. **Component Tokens** - Component-specific values
3. **Instance Variables** - Per-component inline overrides

## Global Design Tokens

Override global tokens to customize your entire design system:

```css
/* resources/css/app.css */
:root {
  /* Primary Brand Color */
  --color-primary-600: #7c3aed;
  --color-primary-700: #6d28d9;

  /* Semantic Surfaces */
  --surface-base: #ffffff;

  /* Border Radius */
  --radius-md: 0.5rem;
  --radius-lg: 0.75rem;

  /* Spacing */
  --spacing-md: 1rem;
  --spacing-lg: 1.5rem;

  /* Typography */
  --font-weight-medium: 600;
}
```

## Component-Level Tokens

Customize specific components without affecting others:

```css
:root {
  /* Shared Surface */
  --surface-base: #ffffff;

  /* Button Component */
  --button-bg-primary: #7c3aed;
  --button-text-primary: white;
  --button-radius: 0.5rem;
  --button-padding-x-md: 1.25rem;

  /* Input Component */
  --input-border-color: #e5e7eb;
  --input-focus-ring: #7c3aed;

  /* Card Component */
  --card-bg: white;
  --card-border-color: #e5e7eb;
  --card-padding: 1.5rem;
  --card-radius: 0.75rem;
}
```

## Complete CSS Variable Reference

### Global Design Tokens

These tokens are defined once and referenced by all components. Override any of them to apply changes globally.

#### Primary Color

```css
:root {
  --color-primary-50: #eef2ff;
  --color-primary-100: #e0e7ff;
  --color-primary-200: #c7d2fe;
  --color-primary-300: #a5b4fc;
  --color-primary-400: #818cf8;
  --color-primary-500: #6366f1;
  --color-primary-600: #4f46e5;
  --color-primary-700: #4338ca;
  --color-primary-800: #3730a3;
  --color-primary-900: #312e81;
  --color-primary-950: #1e1b4b;
}
```

#### Slate (neutral / secondary) Color

```css
:root {
  --color-slate-50: #f8fafc;
  --color-slate-100: #f1f5f9;
  --color-slate-200: #e2e8f0;
  --color-slate-300: #cbd5e1;
  --color-slate-400: #94a3b8;
  --color-slate-500: #64748b;
  --color-slate-600: #475569;
  --color-slate-700: #334155;
  --color-slate-800: #1e293b;
  --color-slate-900: #0f172a;
  --color-slate-950: #020617;
}
```

#### Success Color

```css
:root {
  --color-success-50: #f0fdf4;
  --color-success-100: #dcfce7;
  --color-success-200: #bbf7d0;
  --color-success-300: #86efac;
  --color-success-400: #4ade80;
  --color-success-500: #22c55e;
  --color-success-600: #16a34a;
  --color-success-700: #15803d;
  --color-success-800: #166534;
  --color-success-900: #14532d;
  --color-success-950: #052e16;
}
```

#### Warning Color

```css
:root {
  --color-warning-50: #fffbeb;
  --color-warning-100: #fef3c7;
  --color-warning-200: #fde68a;
  --color-warning-300: #fcd34d;
  --color-warning-400: #fbbf24;
  --color-warning-500: #f59e0b;
  --color-warning-600: #d97706;
  --color-warning-700: #b45309;
  --color-warning-800: #92400e;
  --color-warning-900: #78350f;
  --color-warning-950: #451a03;
}
```

#### Danger Color

```css
:root {
  --color-danger-50: #fef2f2;
  --color-danger-100: #fee2e2;
  --color-danger-200: #fecaca;
  --color-danger-300: #fca5a5;
  --color-danger-400: #f87171;
  --color-danger-500: #ef4444;
  --color-danger-600: #dc2626;
  --color-danger-700: #b91c1c;
  --color-danger-800: #991b1b;
  --color-danger-900: #7f1d1d;
  --color-danger-950: #450a0a;
}
```

#### Info Color

```css
:root {
  --color-info-50: #eff6ff;
  --color-info-100: #dbeafe;
  --color-info-200: #bfdbfe;
  --color-info-300: #93c5fd;
  --color-info-400: #60a5fa;
  --color-info-500: #3b82f6;
  --color-info-600: #2563eb;
  --color-info-700: #1d4ed8;
  --color-info-800: #1e40af;
  --color-info-900: #1e3a8a;
  --color-info-950: #172554;
}
```

#### Border Radius

```css
:root {
  --radius-sm: 0.25rem;
  --radius-md: 0.5rem;
  --radius-lg: 0.75rem;
  --radius-xl: 1rem;
  --radius-2xl: 1.5rem;
  --radius-full: 9999px;
}
```

#### Spacing

```css
:root {
  --spacing-xs: 0.5rem;
  --spacing-sm: 0.75rem;
  --spacing-md: 1rem;
  --spacing-lg: 1.5rem;
  --spacing-xl: 2rem;
  --spacing-2xl: 3rem;
}
```

#### Font Sizes

```css
:root {
  --font-size-xs: 0.75rem;
  --font-size-sm: 0.875rem;
  --font-size-md: 1rem;
  --font-size-lg: 1.125rem;
  --font-size-xl: 1.25rem;
  --font-size-2xl: 1.5rem;
}
```

#### Font Weights

```css
:root {
  --font-weight-normal: 400;
  --font-weight-medium: 500;
  --font-weight-semibold: 600;
  --font-weight-bold: 700;
}
```

#### Shadows

```css
:root {
  --shadow-sm: 0 1px 2px 0 rgb(0 0 0 / 0.05);
  --shadow-md: 0 4px 6px -1px rgb(0 0 0 / 0.1), 0 2px 4px -2px rgb(0 0 0 / 0.1);
  --shadow-lg:
    0 10px 15px -3px rgb(0 0 0 / 0.1), 0 4px 6px -4px rgb(0 0 0 / 0.1);
  --shadow-xl:
    0 20px 25px -5px rgb(0 0 0 / 0.1), 0 8px 10px -6px rgb(0 0 0 / 0.1);
}
```

#### Transitions

```css
:root {
  --transition-fast: 150ms;
  --transition-normal: 200ms;
  --transition-slow: 300ms;
}
```

### Component Tokens (Examples)

These variables are component-scoped. They are not global design tokens, but they often reference global tokens such as colors, radius, spacing, and transitions.

#### Button Variables

```css
:root {
  /* Sizing */
  --button-padding-x-sm: 0.75rem;
  --button-padding-y-sm: 0.375rem;
  --button-font-size-sm: 0.875rem;

  --button-padding-x-md: 1rem;
  --button-padding-y-md: 0.5rem;
  --button-font-size-md: 1rem;

  --button-padding-x-lg: 1.25rem;
  --button-padding-y-lg: 0.625rem;
  --button-font-size-lg: 1.125rem;

  /* Variants */
  --button-bg-primary: var(--color-primary-600);
  --button-text-primary: white;
  --button-hover-bg-primary: var(--color-primary-700);
  --button-active-bg-primary: var(--color-primary-800);
  --button-focus-ring-primary: var(--color-primary-500);

  /* Repeat for other variants */

  /* General */
  --button-radius: var(--radius-md);
  --button-font-weight: var(--font-weight-medium);
  --button-transition: var(--transition-normal);
}
```

#### Input Variables

```css
:root {
  --input-border-color: #e5e7eb;
  --input-focus-ring: var(--color-primary-500);
  --input-error-border: var(--color-danger-500);
  --input-error-ring: var(--color-danger-500);

  /* Sizing */
  --input-padding-x-sm: 0.75rem;
  --input-padding-y-sm: 0.375rem;
  --input-font-size-sm: 0.875rem;
  /* ... md, lg */
}
```

#### Card Variables

```css
:root {
  --card-bg: white;
  --card-border-color: #e5e7eb;
  --card-padding: 1.5rem;
  --card-radius: 0.5rem;
  --card-shadow: var(--shadow-md);
}
```

## Dark Mode

All components ship with built-in dark mode overrides via a parent `.dark` class — no manual CSS required. **30 of 33 components** have dark overrides; the remaining 3 (Stack, Grid, Media) are purely structural and contain no color tokens.

### Enabling Dark Mode

Add the `.dark` class to a parent element — typically `<html>` or `<body>` — and all Basekit components inside it will automatically switch to dark-appropriate colors:

```blade
<html class="{{ $darkMode ? 'dark' : '' }}">
```

You can also scope dark mode to a specific section:

```blade
<div class="dark">
    <x-basekit-ui::card>
        This card will render in dark mode
    </x-basekit-ui::card>
</div>
```

### How It Works

Each component's CSS file contains a `.dark {}` block that re-declares its design tokens with dark-appropriate values. When the `.dark` class is present on any ancestor, CSS specificity causes the dark overrides to take effect automatically.

All overrides reference **Tailwind CSS color tokens** (e.g., `var(--color-slate-800)`, `var(--color-primary-400)`) via a shared `theme.css` file, so dark mode stays in sync with your Tailwind palette.

### Color Mapping

The built-in overrides follow a consistent light-to-dark mapping:

| Light Value | Dark Replacement | Used For |
|---|---|---|
| `--surface-base` (white) | `slate-800` | Component backgrounds |
| `slate-50` / `slate-100` | `slate-800` / `slate-700` | Backgrounds, hover states |
| `slate-200` / `slate-300` | `slate-700` / `slate-600` | Borders, dividers |
| `slate-400` / `slate-500` | `slate-400` / `slate-500` | Placeholders, icons (unchanged) |
| `slate-600` | `slate-300` / `slate-400` | Muted text |
| `slate-700` / `slate-900` | `slate-200` / `slate-100` | Body text, headings |
| `{variant}-50` | `{variant}-950` | Variant backgrounds (e.g., badge, alert, toast) |
| `{variant}-200` | `{variant}-200` | Variant text (unchanged) |
| `{variant}-500` | `{variant}-500` | Variant borders (unchanged) |
| `{variant}-600` / `{variant}-700` | `{variant}-400` | Variant text on dark |
| White thumb / ring | `slate-300` / `slate-900` | Toggle thumb, focus rings |
| `rgba(0,0,0,0.5)` | `rgba(0,0,0,0.7)` | Overlays (higher opacity) |

### Per-Component Dark Mode Tokens

Every component with color tokens has a complete set of dark overrides. Below is a summary of the **key tokens** per component that change in dark mode. Refer to each component's CSS file for the full list.

#### Form Components

| Component | Key Dark Tokens |
|---|---|
| **Input** | `--input-bg`, `--input-color`, `--input-border-color`, `--input-label-color`, `--input-hint-color`, `--input-addon-bg`, `--input-disabled-bg`, plus all variant borders/rings (35 dark variables total) |
| **Select** | `--select-bg`, `--select-color`, `--select-border-color`, `--select-label-color`, `--select-option-text`, `--select-option-selected-bg`, `--select-menu-bg` (36 dark variables total) |
| **Textarea** | `--textarea-bg`, `--textarea-text`, `--textarea-border`, `--textarea-label-color`, `--textarea-hint-color`, `--textarea-disabled-bg` (26 dark variables total) |
| **MultiSelect** | `--multiselect-bg`, `--multiselect-color`, `--multiselect-chip-bg`, `--multiselect-chip-text`, `--multiselect-option-text`, `--multiselect-menu-bg`, `--multiselect-label-color` (43 dark variables total) |
| **Checkbox** | `--checkbox-border-color`, `--checkbox-label-color`, `--checkbox-hint-color`, `--checkbox-disabled-bg`, plus all variant checked/focus colors (33 dark variables total) |
| **Radio** | `--radio-border`, `--radio-bg`, `--radio-label-color`, `--radio-hint-color`, `--radio-disabled-bg`, plus all variant checked/focus colors (30 dark variables total) |
| **Toggle** | `--toggle-bg-off`, `--toggle-thumb-bg`, `--toggle-thumb-border-off`, `--toggle-label-color`, `--toggle-hint-color`, `--toggle-disabled-label-color` (23 dark variables total) |
| **Button** | `--button-shadow`, `--button-shadow-hover`, `--button-bg-secondary`, `--button-text-secondary`, `--button-border-secondary`, `--button-hover-bg-secondary`, `--button-text-ghost` (33 dark variables total) |

#### Display Components

| Component | Key Dark Tokens |
|---|---|
| **Card** | `--card-bg`, `--card-border`, `--card-footer-bg`, `--card-shadow`, `--card-header-text` (5 dark variables) |
| **Table** | `--table-bg`, `--table-border`, `--table-header-bg`, `--table-header-text`, `--table-body-text`, `--table-row-hover-bg`, `--table-stripe-bg`, `--table-menu-bg`, `--table-empty-text`, `--table-expand-color` (23 dark variables total) |
| **Badge** | `--badge-bg-secondary`, `--badge-text-secondary`, `--badge-border-secondary`, plus all variant bg/text/border pairs (19 dark variables total) |
| **Stat** | `--stat-bg`, `--stat-label-color`, `--stat-value-color`, `--stat-icon-bg`, `--stat-icon-color`, `--stat-change-up-color`, `--stat-change-down-color` (8 dark variables) |
| **Avatar** | `--avatar-bg`, `--avatar-text`, `--avatar-ring`, `--avatar-status-border`, plus status colors (8 dark variables) |
| **DescriptionList** | `--dl-term-color`, `--dl-description-color`, `--dl-border`, `--dl-striped-bg` (4 dark variables) |
| **List** | `--list-divided-border` (1 dark variable) |

#### Feedback Components

| Component | Key Dark Tokens |
|---|---|
| **Alert** | `--alert-bg-primary/info/secondary/success/warning/danger`, `--alert-text-*`, `--alert-border-*` (19 dark variables total) |
| **Toast** | `--toast-shadow`, `--toast-bg-*`, `--toast-text-*`, `--toast-border-*`, `--toast-dismiss-hover-bg` (21 dark variables total) |
| **Tooltip** | `--tooltip-bg`, `--tooltip-text`, `--tooltip-shadow` (3 dark variables) |
| **Progress** | `--progress-bg`, `--progress-label-color`, `--progress-bar-primary/secondary/success/warning/danger/info/ghost/white` (10 dark variables) |
| **Spinner** | `--spinner-color-primary/slate/success/warning/danger/info/ghost` (7 dark variables) |
| **EmptyState** | `--empty-state-icon-color`, `--empty-state-title-color`, `--empty-state-description-color`, plus all variant icon/title/description colors (24 dark variables total) |
| **Skeleton** | `--skeleton-bg` (1 dark variable) |

#### Navigation Components

| Component | Key Dark Tokens |
|---|---|
| **Tabs** | `--tabs-border`, `--tabs-active-border`, `--tabs-text`, `--tabs-active-text`, `--tabs-hover-text`, `--tabs-pills-active-bg`, `--tabs-boxed-bg`, `--tabs-boxed-active-bg` (9 dark variables) |
| **Pagination** | `--pagination-bg`, `--pagination-border`, `--pagination-text`, `--pagination-hover-bg`, `--pagination-active-bg`, `--pagination-active-text`, `--pagination-active-hover-bg`, `--pagination-disabled-text`, `--pagination-info-color`, `--pagination-label-color` (10 dark variables) |
| **DropdownMenu** | `--dropdown-bg`, `--dropdown-trigger-bg`, `--dropdown-trigger-text`, `--dropdown-trigger-hover-bg`, `--dropdown-trigger-hover-border`, `--dropdown-border`, `--dropdown-shadow`, `--dropdown-item-hover-bg`, `--dropdown-item-text`, `--dropdown-item-icon` (12 dark variables) |
| **Link** | `--link-primary-color`, `--link-secondary-color`, `--link-success-color`, `--link-warning-color`, `--link-danger-color`, `--link-info-color`, `--link-ghost-color`, `--link-muted-color` (8 dark variables) |
| **Breadcrumb** | `--breadcrumb-separator-color`, `--breadcrumb-link-color`, `--breadcrumb-current-color` (3 dark variables) |

#### Dialog Components

| Component | Key Dark Tokens |
|---|---|
| **Modal** | `--modal-overlay-bg`, `--modal-bg`, `--modal-shadow`, `--modal-header-border`, `--modal-footer-border`, `--modal-close-color`, `--modal-close-hover-bg`, `--modal-close-hover-color`, `--modal-title-color` (9 dark variables) |
| **Accordion** | `--accordion-border`, `--accordion-header-bg`, `--accordion-hover-bg`, `--accordion-title-color`, `--accordion-icon-color`, `--accordion-body-color`, `--accordion-flush-hover-color` (7 dark variables) |

#### Layout Components

| Component | Key Dark Tokens |
|---|---|
| **Divider** | `--divider-color`, `--divider-color-light`, `--divider-color-dark`, `--divider-label-bg`, `--divider-label-color` (5 dark variables) |

**Total: 468 dark mode CSS variables across 30 components.**

### Custom Dark Mode Overrides

Override any component's dark mode tokens by re-declaring them under `.dark` in your theme file:

```css
.dark {
  --card-bg: var(--color-slate-900);
  --card-border: var(--color-slate-600);
  --input-bg: #0f172a;
  --input-border-color: #334155;
}
```

You can also scope overrides to a specific component instance:

```blade
<x-basekit-ui::card style="--card-bg: #0f172a; --card-border: #334155;">
    Dark card with custom colors
</x-basekit-ui::card>
```

### Auto Dark Mode with Media Query

If you prefer automatic dark mode based on the user's OS preference instead of class-based toggling, wrap the built-in overrides in a media query:

```css
@media (prefers-color-scheme: dark) {
  :root {
    --card-bg: var(--color-slate-800);
    --card-border: var(--color-slate-700);
    --input-bg: var(--color-slate-800);
    --input-color: var(--color-slate-100);
    --input-border-color: var(--color-slate-600);
  }
}
```

This works because all components use CSS custom properties — the values are resolved at compute time, so overriding `:root` inside a media query achieves the same effect as the `.dark` class approach.

### Components Without Dark Overrides

These components have no dark mode overrides because they contain no color tokens:

- **Stack** — layout spacing only (gap size tokens)
- **Grid** — layout columns only (no CSS custom properties)
- **Media** — only contains `@custom-media` breakpoint definitions

## Per-Component Scoping

Override variables for specific component instances:

```blade
<x-basekit-ui::button
    variant="primary"
    style="--button-bg-primary: #7c3aed; --button-radius: 1rem;"
>
    Custom Styled Button
</x-basekit-ui::button>
```

### Custom Colors via Props

All color-using components expose dedicated props as a higher-level alternative to inline CSS variables:

- **`color`** — Quick shortcut that auto-sets background, text, border, hover, focus, and active states simultaneously.
- **`background`** / **`text`** / **`border`** — Granular control over individual surfaces.
- **`hover-background`** / **`hover-text`** / **`hover-border`** — Hover state overrides.

The `color` prop accepts **Tailwind v4 color names** (e.g., `indigo-500`, `pink-200`) or any **raw CSS value** (hex, `#4F46E5`; rgb, `rgb(79,70,229)`; hsl, `hsl(245,58%,59%)`; named colors).

When you pass a Tailwind color name, the component automatically:
- Darkens the shade by 100 for hover states (e.g., `indigo-500` → `indigo-600`)
- Darkens the shade by 200 for active and border states (e.g., `indigo-500` → `indigo-700`)
- Picks a contrasting text color (white on shades ≥500, dark on shades ≤400)
- Derives a focus ring from the text shade (light on dark backgrounds, translucent on hex values)

**Light-background components** (badge, alert) use a lighter expansion:
- Background: shade-50
- Text: shade-700
- Border: shade-200

This matches their built-in variant appearance (light tint, strong text).

Raw CSS values passthrough literally — no auto-hover or auto-contrast is applied.

```blade
{{-- Quick shortcut --}}
<x-basekit-ui::button color="indigo-500">Indigo Button</x-basekit-ui::button>

{{-- Granular overrides --}}
<x-basekit-ui::alert
    background="#FEE2E2"
    text="#991B1B"
    border="#FECACA"
>
    Custom Red Alert
</x-basekit-ui::alert>

{{-- Hover overrides --}}
<x-basekit-ui::button
    color="emerald-500"
    hover-background="emerald-400"
>
    Lightened Hover
</x-basekit-ui::button>
```

**Supported components**: Button, Input, Textarea, Select, MultiSelect, Checkbox, Radio, Toggle, Alert, Toast, Spinner, Progress, Badge, Link, EmptyState — each exports only the props relevant to its visual model (e.g., Input exposes only `border` and `hover-border`; Spinner exposes only `color` and `text`).

## Example: Complete Custom Theme

```css
/* resources/css/custom-theme.css */

:root {
  /* Brand Colors */
  --color-primary-600: #7c3aed;
  --color-primary-700: #6d28d9;
  --color-primary-800: #5b21b6;

  /* Component Customization */
  --button-radius: 0.75rem;
  --button-font-weight: 600;
  --button-bg-primary: var(--color-primary-600);

  --card-radius: 1rem;
  --card-padding: 2rem;
  --card-shadow: 0 20px 25px -5px rgb(0 0 0 / 0.1);

  --input-radius: 0.5rem;
  --input-border-color: #d1d5db;

  --badge-radius: 9999px;

  /* Typography */
  --font-weight-medium: 600;
  --font-weight-semibold: 700;
}

/* Dark Mode — class-based (add .dark to <html>) */
.dark {
  --card-bg: #0f172a;
  --card-header-text: #f1f5f9;
  --card-border: #1e293b;
  --card-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.4);

  --input-bg: #0f172a;
  --input-color: #f1f5f9;
  --input-border-color: #334155;
  --input-label-color: #cbd5e1;
  --input-hint-color: #64748b;

  --button-bg-secondary: #1e293b;
  --button-text-secondary: #e2e8f0;
  --button-border-secondary: #475569;

  --table-bg: #0f172a;
  --table-border: #1e293b;
  --table-header-text: #e2e8f0;
  --table-body-text: #e2e8f0;
}

/* Dark Mode — media query (automatic) */
@media (prefers-color-scheme: dark) {
  :root {
    --card-bg: #0f172a;
    --card-header-text: #f1f5f9;
    --card-border: #1e293b;

    --input-bg: #0f172a;
    --input-color: #f1f5f9;
    --input-border-color: #334155;
  }
}
```

## Theming Best Practices

1. **Use semantic tokens** — Reference design tokens (`var(--color-primary-600)`) in component tokens instead of hardcoded values
2. **Scope appropriately** — Use `:root` for brand-wide changes, component tokens for specifics
3. **Test dark mode** — Verify all overrides work in both light and dark themes; use the [styleguide](/styleguide) to preview
4. **Document overrides** — Keep track of customized variables in your theme file
5. **Version control** — Commit your theme file with your application code
6. **Start with built-in defaults** — Override only what you need; the 468 built-in dark mode variables handle most cases

## Build CSS with Artisan

Publish config and build the generated CSS from your app settings:

```bash
php artisan basekit:ui:build
```

Then import the built CSS file:

```css
/* resources/css/app.css */
@import "../../public/vendor/basekit-laravel/v1/basekit-ui.css";
```

And put your theme overrides after the import:

```css
:root {
  --color-primary-600: #7c3aed;
  --card-radius: 1rem;
}
```

## Migration Between Versions

When upgrading to a new major version, use the migration command:

```bash
php artisan basekit:ui:migrate-theme --from=v1 --to=v2
```

This will:

- Update CSS variable names if changed
- Add new required variables
- Warn about removed variables
- Create a backup of your current theme

## Next Steps

- [Installation Guide](/guide/installation) — include the CSS and get started
- [Performance Guide](/guide/performance) — reduce bundle size with component-level CSS builds
- [Component Reference](/components) — explore all available components and their CSS variables
