# Input

A flexible text input component with configurable variants, sizes, inline labels, addons, masks, and password toggling. Interactive features like password toggling, masked and number inputs require Alpine.js.

::: tip Live Preview
<a href="../styleguide.html#inputs" target="_blank">View in the Styleguide →</a>
:::

## Basic Usage

```blade
<x-basekit-ui::input
    name="email"
    label="Email"
    placeholder="you@example.com"
/>
```

## Props

| Prop                 | Type     | Default       | Description                                                                 |
| -------------------- | -------- | ------------- | --------------------------------------------------------------------------- |
| `type`               | `string` | `'text'`      | Input type such as `text`, `email`, `password`, or `number`                 |
| `variant`            | `string` | `'secondary'` | Visual style: `primary`, `secondary`, `success`, `warning`, `info`, `ghost` |
| `size`               | `string` | `'md'`        | Control size: `sm`, `md`, `lg`                                              |
| `label`              | `string` | `null`        | Label text                                                                  |
| `error`              | `string` | `null`        | Error message shown below the field                                         |
| `hint`               | `string` | `null`        | Helper text shown below the field                                           |
| `icon`               | `string` | `null`        | Heroicon name rendered inside the field                                     |
| `placeholder`        | `string` | `null`        | Placeholder text                                                            |
| `value`              | `string` | `null`        | Initial input value                                                         |
| `mask`               | `string` | `null`        | Digit mask using `#` placeholders                                           |
| `corner-hint`        | `string` | `null`        | Top-right label row hint                                                    |
| `label-style`        | `string` | `'default'`   | Label placement: `default`, `inset`, `overlap`                              |
| `control-style`      | `string` | `'default'`   | Control style: `default`, `pill`, `underline`                               |
| `is-toggle-password` | `bool`   | `false`       | Show password visibility toggle for password inputs                         |

Standard HTML input attributes such as `name`, `min`, `max`, `step`, `disabled`, and `readonly` pass through to the underlying `<input>` element.

## Slots

| Slot     | Description                       |
| -------- | --------------------------------- |
| `prefix` | Content rendered before the input |
| `suffix` | Content rendered after the input  |
| `label`  | Custom label markup               |
| `error`  | Custom error markup               |
| `hint`   | Custom helper text                |
| `icon`   | Custom icon markup                |

## Variants

Supported variants: `primary`, `secondary`, `success`, `warning`, `info`, `ghost`.

```blade
<x-basekit-ui::input name="primary" label="Primary" variant="primary" />
<x-basekit-ui::input name="secondary" label="Secondary" variant="secondary" />
<x-basekit-ui::input name="success" label="Success" variant="success" value="Looks good" />
<x-basekit-ui::input name="warning" label="Warning" variant="warning" value="Needs review" />
<x-basekit-ui::input name="info" label="Info" variant="info" />
<x-basekit-ui::input name="ghost" label="Ghost" variant="ghost" />
```

## Sizes

Supported sizes: `sm`,`md`,`lg`.

```blade
<x-basekit-ui::input name="small" size="sm" placeholder="Small" />
<x-basekit-ui::input name="medium" size="md" placeholder="Medium" />
<x-basekit-ui::input name="large" size="lg" placeholder="Large" />
```

## With Icon

### With Heroicon

Pass any Heroicon name via the `icon` prop:

```blade
<x-basekit-ui::input
    name="search"
    label="Search"
    icon="magnifying-glass"
    placeholder="Search..."
/>
```

### Using Icon Slot

```blade

<x-basekit-ui::input name="download" label="Download">
    <x-slot:icon>
        <x-heroicon-o-arrow-down-tray class="w-4 h-4" />
    </x-slot:icon>
</x-basekit-ui::input>
```

## Addons

```blade
<x-basekit-ui::input name="website" label="Website" placeholder="example.com">
    <x-slot:prefix>https://</x-slot:prefix>
</x-basekit-ui::input>

<x-basekit-ui::input name="price" label="Price" placeholder="0.00">
    <x-slot:prefix>$</x-slot:prefix>
    <x-slot:suffix>USD</x-slot:suffix>
</x-basekit-ui::input>
```

## Password Inputs

::: warning Alpine.js Required
The `is-toggle-password` feature requires Alpine.js to be loaded in your layout. See the [installation guide](/guide/installation#alpine-js-required-for-interactive-components) for setup instructions.
:::

```blade
<x-basekit-ui::input
    name="password"
    type="password"
    label="Password"
    control-style="pill"
    :is-toggle-password="true"
/>
```

## Number Inputs

::: warning Alpine.js Required
The number input requires Alpine.js to be loaded in your layout. See the [installation guide](/guide/installation#alpine-js-required-for-interactive-components) for setup instructions.
:::

```blade
<x-basekit-ui::input
    name="quantity"
    type="number"
    label="Quantity"
    value="1"
    min="0"
    max="10"
/>
```

## Masked Inputs

::: warning Alpine.js Required
The masked input requires Alpine.js to be loaded in your layout. See the [installation guide](/guide/installation#alpine-js-required-for-interactive-components) for setup instructions.
:::

```blade
<x-basekit-ui::input
    name="phone"
    label="Phone"
    mask="(###) ###-####"
    placeholder="(555) 123-4567"
/>
```

## Label Styles

```blade
<x-basekit-ui::input name="company" label="Company" label-style="inset" />
<x-basekit-ui::input name="username" label="Username" label-style="overlap" />
<x-basekit-ui::input name="search-pill" placeholder="Search..." control-style="pill" />
<x-basekit-ui::input name="website" label="Website" control-style="underline" />
```

## Validation State

```blade
<x-basekit-ui::input
    name="email"
    label="Email"
    error="This field is required"
/>
```

## Custom Classes

Override or extend styles with the `class` attribute:

```blade
<x-basekit-ui::input
    name="custom-email"
    label="Email"
    class="mt-2"
/>
```

## CSS Variables

Customize input appearance via CSS variables:

```css
:root {
  /* Input - Base */
  --input-color: var(--color-slate-900);
  --input-placeholder-color: var(--color-slate-400);
  --input-border-color: var(--color-slate-300);
  --input-border-radius: var(--radius-md, 0.375rem);
  --input-font-family: inherit;
  --input-line-height: 1.5;
  --input-transition:
    border-color var(--transition-fast) ease-in-out,
    box-shadow var(--transition-fast) ease-in-out;

  /* Input - Interaction States */
  --input-hover-border-color: var(--color-slate-400);
  --input-focus-border-color: var(--color-primary-500);
  --input-focus-ring-color: var(--color-primary-100);
  --input-focus-ring-width: 2px;
  --input-focus-shadow: 0 0 0 var(--input-focus-ring-width)
    var(--input-focus-ring-color);

  /* Input - Disabled State */
  --input-disabled-bg: var(--color-slate-50);
  --input-disabled-color: var(--color-slate-500);
  --input-disabled-border-color: var(--color-slate-200);

  /* Input - Variants */
  --input-primary-border-color: var(--color-primary-500);
  --input-primary-ring-color: var(--color-primary-100);

  --input-secondary-border-color: var(--color-slate-300);
  --input-secondary-ring-color: var(--color-slate-100);

  --input-error-border-color: var(--color-danger-500);
  --input-error-ring-color: var(--color-danger-100);
  --input-error-color: var(--color-danger-700);

  --input-success-border-color: var(--color-success-500);
  --input-success-ring-color: var(--color-success-100);

  --input-warning-border-color: var(--color-warning-500);
  --input-warning-ring-color: var(--color-warning-100);

  --input-info-border-color: var(--color-info-500);
  --input-info-ring-color: var(--color-info-100);

  --input-ghost-border-color: transparent;
  --input-ghost-ring-color: var(--color-slate-100);
  --input-ghost-bg: transparent;

  /* Input - Sizes */
  --input-py-sm: 0.375rem;
  --input-px-sm: 0.75rem;
  --input-fs-sm: 0.875rem;

  --input-py-md: 0.5rem;
  --input-px-md: 0.875rem;
  --input-fs-md: 0.9375rem;

  --input-py-lg: 0.75rem;
  --input-px-lg: 1rem;
  --input-fs-lg: 1rem;
  /* Default input background used by labels and inputs when not overridden */
  --input-bg: var(--surface-base);
}
```

## Configuration

Configure defaults in `config/basekit-laravel-ui.php`:

```php
'input' => [
    'enabled' => true,
    'variants' => ['primary', 'secondary', 'success', 'warning', 'info', 'ghost'],
    'sizes' => ['sm', 'md', 'lg'],
    'default_variant' => 'secondary',
    'default_size' => 'md',
],
```
