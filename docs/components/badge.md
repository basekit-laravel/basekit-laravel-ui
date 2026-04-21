# Badge

A small badge component for labels, counts, and status indicators.

::: tip Live Preview
<a href="../styleguide.html#badges" target="_blank">View in the Styleguide →</a>
:::

## Basic Usage

```blade
<x-basekit-ui::badge>New</x-basekit-ui::badge>
```

## Props

| Prop      | Type      | Default       | Description                                                                             |
| --------- | --------- | ------------- | --------------------------------------------------------------------------------------- |
| `variant` | `string`  | `'secondary'` | Badge color variant (`primary`,`secondary`,`success`,`warning`,`danger`,`info`,`ghost`) |
| `size`    | `string`  | `'md'`        | Badge size (`sm`,`md`,`lg`)                                                             |
| `icon`    | `string`  | `null`        | Heroicon name                                                                           |
| `isDot`   | `boolean` | `false`       | Show dot indicator                                                                      |

## Slots

| Slot      | Description                                |
| --------- | ------------------------------------------ |
| `default` | Badge label/content                        |
| `icon`    | Custom icon markup (overrides `icon` prop) |

## Variants

Supported variants: `primary`, `secondary`, `success`, `warning`, `danger`, `info`, `ghost`.

```blade
<x-basekit-ui::badge variant="primary">Primary</x-basekit-ui::badge>
<x-basekit-ui::badge variant="secondary">Secondary</x-basekit-ui::badge>
<x-basekit-ui::badge variant="success">Success</x-basekit-ui::badge>
<x-basekit-ui::badge variant="warning">Warning</x-basekit-ui::badge>
<x-basekit-ui::badge variant="danger">Danger</x-basekit-ui::badge>
<x-basekit-ui::badge variant="info">Info</x-basekit-ui::badge>
<x-basekit-ui::badge variant="ghost">Ghost</x-basekit-ui::badge>
```

## Sizes

Supported sizes: `sm`, `md`, `lg`.

```blade
<x-basekit-ui::badge size="sm">Small</x-basekit-ui::badge>
<x-basekit-ui::badge size="md">Medium</x-basekit-ui::badge>
<x-basekit-ui::badge size="lg">Large</x-basekit-ui::badge>
```

## Dot Indicator

```blade
<x-basekit-ui::badge :is-dot="true">Status</x-basekit-ui::badge>
```

## With Icons

### With Heroicon

Pass any Heroicon name via the `icon` prop:

```blade
<x-basekit-ui::badge variant="success" icon="check">Verified</x-basekit-ui::badge>
```

### Using Icon Slot

```blade
<x-basekit-ui::badge variant="info">
    <x-slot:icon>
        <x-heroicon-o-information-circle class="w-3 h-3" />
    </x-slot:icon>
    Informational
</x-basekit-ui::badge>

<x-basekit-ui::badge variant="warning">
    <x-slot:icon>
        <svg viewBox="0 0 24 24" class="w-3 h-3" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v4m0 4h.01M10.29 3.86 1.82 18a2 2 0 0 0 1.71 3h16.94a2 2 0 0 0 1.71-3L13.71 3.86a2 2 0 0 0-3.42 0Z" />
        </svg>
    </x-slot:icon>
    Attention
</x-basekit-ui::badge>
```

## Custom Classes

Override default classes using Tailwind Merge:

```blade
<x-basekit-ui::badge variant="primary" class="uppercase tracking-wide">
    Custom Styled Badge
</x-basekit-ui::badge>
```

## CSS Variables

Customize badge appearance via CSS variables:

```css
:root {
  --badge-radius: 9999px;
  --badge-font-weight: var(--font-weight-medium);
  --badge-font-size-sm: var(--font-size-xs);
  --badge-font-size-md: var(--font-size-xs);
  --badge-font-size-lg: var(--font-size-sm);

  --badge-bg-secondary: var(--color-slate-100);
  --badge-text-secondary: var(--color-slate-700);
  --badge-border-secondary: var(--color-slate-200);

  --badge-bg-primary: var(--color-primary-50);
  --badge-text-primary: var(--color-primary-700);
  --badge-border-primary: var(--color-primary-200);

  --badge-bg-info: var(--color-info-50);
  --badge-text-info: var(--color-info-700);
  --badge-border-info: var(--color-info-200);

  --badge-bg-success: var(--color-success-50);
  --badge-text-success: var(--color-success-700);
  --badge-border-success: var(--color-success-200);

  --badge-bg-warning: var(--color-warning-50);
  --badge-text-warning: var(--color-warning-800);
  --badge-border-warning: var(--color-warning-200);

  --badge-bg-danger: var(--color-danger-50);
  --badge-text-danger: var(--color-danger-700);
  --badge-border-danger: var(--color-danger-200);

  --badge-bg-ghost: transparent;
  --badge-text-ghost: var(--color-slate-700);
  --badge-border-ghost: transparent;
}
```

## Configuration

```php
'badge' => [
    'enabled' => true,
    'variants' => ['primary', 'secondary', 'success', 'warning', 'danger', 'info', 'ghost'],
    'sizes' => ['sm', 'md', 'lg'],
    'default_variant' => 'secondary',
    'default_size' => 'md',
],
```
