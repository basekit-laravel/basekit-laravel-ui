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

Implement dark mode using CSS media queries or class-based toggling:

### Media Query Approach

```css
:root {
  --card-bg: white;
  --card-text: #1f2937;
}

@media (prefers-color-scheme: dark) {
  :root {
    --card-bg: #1f2937;
    --card-text: white;
  }
}
```

### Class-Based Approach

```css
:root {
  --card-bg: white;
  --card-text: #1f2937;
}

.dark {
  --card-bg: #1f2937;
  --card-text: white;
}
```

```blade
<html class="{{ $darkMode ? 'dark' : '' }}">
```

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

/* Dark Mode */
@media (prefers-color-scheme: dark) {
  :root {
    --card-bg: #1f2937;
    --card-text: #f3f4f6;
    --card-border-color: #374151;

    --input-bg: #1f2937;
    --input-text: #f3f4f6;
    --input-border-color: #374151;
  }
}
```

## Theming Best Practices

1. **Use semantic tokens** - Reference design tokens in component tokens
2. **Scope appropriately** - Use global for brand, component-level for specifics
3. **Test dark mode** - Ensure all overrides work in both themes
4. **Document overrides** - Keep track of customized variables
5. **Version control** - Commit your theme file

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
