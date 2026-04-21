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
| `type`             | `string` | `'button'`  | Button type attribute                                                                    |

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
