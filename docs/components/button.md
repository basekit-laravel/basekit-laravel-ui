# Button

A versatile button component with multiple variants, sizes, and icon support.

::: tip Live Preview
<a href="../styleguide.html#buttons" target="_blank">View in the Styleguide →</a>
:::

## Basic Usage

```blade
<x-basekit-ui::button variant="primary">
    Click Me
</x-basekit-ui::button>
```

## Props

| Prop               | Type     | Default     | Description                                                                              |
| ------------------ | -------- | ----------- | ---------------------------------------------------------------------------------------- |
| `variant`          | `string` | `'primary'` | Button style variant (`primary`,`secondary`,`success`,`warning`,`danger`,`info`,`ghost`) |
| `size`             | `string` | `'md'`      | Button size (`sm`,`md`,`lg`)                                                             |
| `is-full-width`    | `bool`   | `false`     | Make button full width                                                                   |
| `is-loading`       | `bool`   | `false`     | Show loading spinner and disable the button                                              |
| `icon`             | `string` | `null`      | Heroicon name                                                                            |
| `icon-orientation` | `string` | `'left'`    | Icon position: `left` or `right`                                                         |
| `type`             | `string` | `'button'`  | Button type attribute (only applies when `as` is `'button'`)                             |
| `as`               | `string` | `'button'`  | HTML tag to render (`button`, `a`)                                                       |
| `href`             | `string` | `null`      | URL for `<a>` tag. When set, auto-switches `as` to `'a'`                                 |
| `rounded`          | `string` | `'md'`      | Border-radius variant (`none`,`sm`,`md`,`lg`,`xl`,`2xl`,`full`)                          |
| `color`            | `string` | `null`      | Quick color shortcut. Sets background, text, border, and hover states simultaneously. Accepts Tailwind color names (e.g. `indigo-500`) or raw CSS colors (hex, rgb, hsl). |
| `background`       | `string` | `null`      | Custom background color. |
| `text`             | `string` | `null`      | Custom text color. |
| `border`           | `string` | `null`      | Custom border color. |
| `hover-background` | `string` | `null`      | Custom hover background color. |
| `hover-text`       | `string` | `null`      | Custom hover text color. |
| `hover-border`     | `string` | `null`      | Custom hover border color. |

## Slots

| Slot      | Description                     |
| --------- | ------------------------------- |
| `default` | Button content                  |
| `prefix`  | Content before the main content |
| `suffix`  | Content after the main content  |
| `icon`    | Custom icon markup              |

## Variants

Supported variants: `primary`, `secondary`, `success`, `warning`, `danger`, `info`, `ghost`.

```blade
<x-basekit-ui::button variant="primary">Primary</x-basekit-ui::button>
<x-basekit-ui::button variant="secondary">Secondary</x-basekit-ui::button>
<x-basekit-ui::button variant="success">Success</x-basekit-ui::button>
<x-basekit-ui::button variant="warning">Warning</x-basekit-ui::button>
<x-basekit-ui::button variant="danger">Danger</x-basekit-ui::button>
<x-basekit-ui::button variant="info">Info</x-basekit-ui::button>
<x-basekit-ui::button variant="ghost">Ghost</x-basekit-ui::button>
```

## Sizes

Supported sizes: `sm`, `md`, `lg`.

```blade
<x-basekit-ui::button size="sm">Small</x-basekit-ui::button>
<x-basekit-ui::button size="md">Medium</x-basekit-ui::button>
<x-basekit-ui::button size="lg">Large</x-basekit-ui::button>
```

## With Icons

### With Heroicon

Pass any Heroicon name via the `icon` prop:

```blade
<x-basekit-ui::button icon="check" variant="primary">
    Save Changes
</x-basekit-ui::button>
```

### Using Icon Slot

```blade
<x-basekit-ui::button variant="primary">
    <x-slot:icon>
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-10 h-10 text-primary-500">
            <path stroke-linecap="round" stroke-linejoin="round" d="M9.813 15.904 9 18.75l-.813-2.846a4.5 4.5 0 0 0-3.09-3.09L2.25 12l2.846-.813a4.5 4.5 0 0 0 3.09-3.09L9 5.25l.813 2.846a4.5 4.5 0 0 0 3.09 3.09L15.75 12l-2.846.813a4.5 4.5 0 0 0-3.09 3.09ZM18.259 8.715 18 9.75l-.259-1.035a3.375 3.375 0 0 0-2.455-2.456L14.25 6l1.036-.259a3.375 3.375 0 0 0 2.455-2.456L18 2.25l.259 1.035a3.375 3.375 0 0 0 2.456 2.456L21.75 6l-1.035.259a3.375 3.375 0 0 0-2.456 2.456ZM16.894 20.567 16.5 21.75l-.394-1.183a2.25 2.25 0 0 0-1.423-1.423L13.5 18.75l1.183-.394a2.25 2.25 0 0 0 1.423-1.423l.394-1.183.394 1.183a2.25 2.25 0 0 0 1.423 1.423l1.183.394-1.183.394a2.25 2.25 0 0 0-1.423 1.423Z" />
        </svg>
    </x-slot:icon>
    Custom Icon
</x-basekit-ui::button>
```

## Loading State

```blade
<x-basekit-ui::button :is-loading="true" variant="primary">
    Processing...
</x-basekit-ui::button>
```

## As Link

Render the button as an `<a>` tag by passing an `href`:

```blade
<x-basekit-ui::button href="/dashboard" variant="primary">
    Dashboard
</x-basekit-ui::button>
```

Or use the `as` prop explicitly:

```blade
<x-basekit-ui::button as="a" href="https://example.com" icon="arrow-top-right-on-square">
    External Link
</x-basekit-ui::button>
```

When rendered as a link, the `type` and `disabled` attributes are omitted, and `href` is applied instead. All visual styling (variants, sizes, icons, rounded) works identically.

```blade
{{-- Link button with icon and specific size --}}
<x-basekit-ui::button href="/settings" variant="secondary" size="sm" icon="cog-6-tooth">
    Settings
</x-basekit-ui::button>
```

## Rounded

Override the default border-radius using the `rounded` prop:

```blade
<x-basekit-ui::button rounded="full">Pill Shape</x-basekit-ui::button>
<x-basekit-ui::button rounded="none">Sharp</x-basekit-ui::button>
<x-basekit-ui::button rounded="sm">Small Radius</x-basekit-ui::button>
<x-basekit-ui::button rounded="lg">Large Radius</x-basekit-ui::button>
<x-basekit-ui::button rounded="xl">Extra Large</x-basekit-ui::button>
<x-basekit-ui::button rounded="2xl">2X Large</x-basekit-ui::button>
```

Accepts: `none`, `sm`, `md`, `lg`, `xl`, `2xl`, `full`. Defaults to `md`.

## Full Width

```blade
<x-basekit-ui::button :is-full-width="true" variant="primary">
    Full Width Button
</x-basekit-ui::button>
```

## Prefix and Suffix

```blade
<x-basekit-ui::button variant="primary">
    <x-slot:prefix>
        <span class="badge">3</span>
    </x-slot:prefix>

    Notifications

    <x-slot:suffix>
        <svg class="w-4 h-4">...</svg>
    </x-slot:suffix>
</x-basekit-ui::button>
```

## Advanced Example

```blade
<x-basekit-ui::button
    variant="primary"
    size="lg"
    icon="arrow-right"
    :is-full-width="true"
    class="shadow-xl hover:shadow-2xl transition-shadow"
>
    <x-slot:prefix>
        <span class="text-xs font-semibold">NEW</span>
    </x-slot:prefix>

    Get Started

    <x-slot:suffix>
        <span class="text-xs opacity-75">Free</span>
    </x-slot:suffix>
</x-basekit-ui::button>
```

## Custom Classes

Override default classes using Tailwind Merge:

```blade
<x-basekit-ui::button variant="primary" class="mt-4 shadow-lg">
    Custom Styling
</x-basekit-ui::button>
```

## Custom Colors

Override the component's default variant colors using the `color` shortcut prop or granular `background`, `text`, `border`, `hover-background`, `hover-text`, and `hover-border` props.

The `color` prop accepts **Tailwind v4 color names** (e.g., `indigo-500`, `pink-200`, `emerald-700`) or any **raw CSS color value** (hex, rgb, hsl, named colors).

> **Note**: When using Tailwind color names, the component automatically computes hover states (darkening the shade by 100), selects a contrasting text color (white on shades ≥500, dark on shades ≤400), and derives matching **active background** and **focus-visible ring** colors. The same applies to hex values — hover gets darkened by 85%, active by 65%, and the focus ring uses a translucent 20% opacity variant.

### With Tailwind Colors

```blade
<x-basekit-ui::button color="indigo-500">
    Click Me
</x-basekit-ui::button>
```

### With Raw CSS Colors

```blade
<x-basekit-ui::button background="#4F46E5" text="#ffffff">
    Click Me
</x-basekit-ui::button>
```

### Granular Control

```blade
<x-basekit-ui::button
    background="indigo-500"
    text="white"
    border="indigo-300"
    hover-background="indigo-600"
>
    Click Me
</x-basekit-ui::button>
```

## CSS Variables

Customize button appearance via CSS variables:

```css
:root {
  /* Button - Base */
  --button-radius: var(--radius-md);
  --button-font-weight: var(--font-weight-medium);
  --button-transition: all var(--transition-normal) cubic-bezier(0.4, 0, 0.2, 1);
  --button-shadow: 0 1px 2px 0 rgb(0 0 0 / 0.05);
  --button-shadow-hover:
    0 4px 6px -1px rgb(0 0 0 / 0.1), 0 2px 4px -2px rgb(0 0 0 / 0.1);
  --button-shadow-focus: 0 0 0 4px;

  /* Button - Sizes */
  --button-padding-x-sm: 0.875rem;
  --button-padding-y-sm: 0.375rem;
  --button-font-size-sm: var(--font-size-sm);

  --button-padding-x-md: 1.125rem;
  --button-padding-y-md: 0.625rem;
  --button-font-size-md: var(--font-size-sm);

  --button-padding-x-lg: 1.5rem;
  --button-padding-y-lg: 0.75rem;
  --button-font-size-lg: var(--font-size-md);

  /* Button - Variants */
  --button-bg-primary: var(--color-primary-600);
  --button-text-primary: white;
  --button-hover-bg-primary: var(--color-primary-500);
  --button-active-bg-primary: var(--color-primary-700);
  --button-focus-ring-primary: var(--color-primary-100);

  --button-bg-secondary: white;
  --button-text-secondary: var(--color-slate-700);
  --button-border-secondary: var(--color-slate-300);
  --button-hover-bg-secondary: var(--color-slate-50);
  --button-active-bg-secondary: var(--color-slate-100);
  --button-focus-ring-secondary: var(--color-slate-100);

  --button-bg-success: var(--color-success-600);
  --button-text-success: white;
  --button-hover-bg-success: var(--color-success-500);
  --button-active-bg-success: var(--color-success-700);
  --button-focus-ring-success: var(--color-success-100);

  --button-bg-danger: var(--color-danger-600);
  --button-text-danger: white;
  --button-hover-bg-danger: var(--color-danger-500);
  --button-active-bg-danger: var(--color-danger-700);
  --button-focus-ring-danger: var(--color-danger-100);

  --button-bg-warning: var(--color-warning-600);
  --button-text-warning: white;
  --button-hover-bg-warning: var(--color-warning-500);
  --button-active-bg-warning: var(--color-warning-700);
  --button-focus-ring-warning: var(--color-warning-100);

  --button-bg-info: var(--color-info-600);
  --button-text-info: white;
  --button-hover-bg-info: var(--color-info-500);
  --button-active-bg-info: var(--color-info-700);
  --button-focus-ring-info: var(--color-info-100);

  --button-bg-ghost: transparent;
  --button-text-ghost: var(--color-slate-600);
  --button-hover-bg-ghost: var(--color-slate-100);
  --button-active-bg-ghost: var(--color-slate-200);
  --button-focus-ring-ghost: var(--color-slate-100);
}
```

## Configuration

Configure button defaults in `config/basekit-laravel-ui.php`:

```php
'button' => [
    'enabled' => true,
    'variants' => ['primary', 'secondary', 'success', 'warning', 'danger', 'info', 'ghost'],
    'sizes' => ['sm', 'md', 'lg'],
    'default_variant' => 'primary',
    'default_size' => 'md',
],
```
