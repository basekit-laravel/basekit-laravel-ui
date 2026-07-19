# Radio

A radio button component for single-choice selections with configurable variants, sizes, labels, and validation states.

::: tip Live Preview
<a href="../styleguide.html#radios" target="_blank">View in the Styleguide →</a>
:::

## Basic Usage

```blade
<x-basekit-ui::radio
    name="plan"
    value="basic"
    label="Basic"
/>
```

## Props

| Prop         | Type     | Default     | Description                                                                           |
| ------------ | -------- | ----------- | ------------------------------------------------------------------------------------- |
| `value`      | `string` | `null`      | Submitted value                                                                       |
| `is-checked` | `bool`   | `false`     | Initial checked state                                                                 |
| `variant`    | `string` | `'primary'` | Visual style: `primary`, `secondary`, `success`, `warning`, `danger`, `info`, `ghost` |
| `size`       | `string` | `'md'`      | Control size: `sm`, `md`, `lg`                                                        |
| `label`      | `string` | `null`      | Label text                                                                            |
| `error`      | `string` | `null`      | Error message shown below the control                                                 |
| `hint`       | `string` | `null`      | Helper text shown below the control                                                   |
| `color`      | `string` | `null`      | Quick color shortcut. Sets checked background and border simultaneously. |
| `background` | `string` | `null`      | Custom checked background color. |
| `border`     | `string` | `null`      | Custom checked border color. |
| `wrapper-class` | `string` | `null`    | Additional classes for the outer wrapper div |
| `container-class` | `string` | `null`  | Additional classes for the inner container div |

Standard radio attributes such as `name`, `id`, and `disabled` pass through to the underlying `<input>` element.

## Slots

| Slot    | Description         |
| ------- | ------------------- |
| `label` | Custom label markup |
| `error` | Custom error markup |
| `hint`  | Custom helper text  |

## Variants

Supported variants: `primary`, `secondary`, `success`, `warning`, `danger`, `info`, `ghost`.

```blade
<x-basekit-ui::radio name="variant" value="primary" variant="primary" :is-checked="true" label="Primary" />
<x-basekit-ui::radio name="variant" value="secondary" variant="secondary" label="Secondary" />
<x-basekit-ui::radio name="variant" value="success" variant="success" label="Success" />
<x-basekit-ui::radio name="variant" value="warning" variant="warning" label="Warning" />
<x-basekit-ui::radio name="variant" value="danger" variant="danger" label="Danger" />
<x-basekit-ui::radio name="variant" value="info" variant="info" label="Info" />
<x-basekit-ui::radio name="variant" value="ghost" variant="ghost" label="Ghost" />
```

## Sizes

Supported sizes: `sm`,`md`,`lg`.

```blade
<x-basekit-ui::radio name="size" value="sm" size="sm" label="Small" />
<x-basekit-ui::radio name="size" value="md" size="md" label="Medium" />
<x-basekit-ui::radio name="size" value="lg" size="lg" label="Large" />
```

## Custom Label Markup

```blade
<x-basekit-ui::radio name="plan" value="enterprise">
    <x-slot:label>
        <strong>Enterprise</strong> - For large teams
    </x-slot:label>
</x-basekit-ui::radio>
```

## Radio Group

```blade
<div class="space-y-2">
    <x-basekit-ui::radio name="plan" value="free" label="Free - $0/month" />
    <x-basekit-ui::radio name="plan" value="pro" :is-checked="true" label="Pro - $9/month" />
    <x-basekit-ui::radio name="plan" value="enterprise" label="Enterprise - $99/month" />
</div>
```

## Validation State

```blade
<div class="space-y-2">
    <x-basekit-ui::radio name="payment" value="card" error="Please select a payment method" label="Credit Card" />
    <x-basekit-ui::radio name="payment" value="paypal" error="Please select a payment method" label="PayPal" />
</div>
```

## Custom Classes

Override or extend styles with the `class` attribute:

```blade
<x-basekit-ui::radio
    name="custom-plan"
    value="starter"
    label="Starter"
    class="mt-2"
/>
```

## Custom Colors

Override the component's default checked colors using the `color` shortcut prop or granular `background` and `border` props.

The `color` prop accepts **Tailwind v4 color names** (e.g., `indigo-500`, `pink-200`, `emerald-700`) or any **raw CSS color value** (hex, rgb, hsl, named colors).

> **Note**: When using Tailwind color names, the component automatically computes a contrasting text color for the dot (white on shades ≥500, dark on shades ≤400).

### With Tailwind Colors

```blade
<x-basekit-ui::radio
    name="plan"
    value="pro"
    :is-checked="true"
    color="indigo-500"
    label="Pro"
/>
```

### With Raw CSS Colors

```blade
<x-basekit-ui::radio
    name="plan"
    value="pro"
    :is-checked="true"
    background="#4F46E5"
    label="Pro"
/>
```

### Granular Control

```blade
<x-basekit-ui::radio
    name="plan"
    value="pro"
    :is-checked="true"
    background="indigo-500"
    border="indigo-300"
    label="Pro"
/>
```

## CSS Variables

Customize radio appearance via CSS variables:

```css
:root {
  --radio-transition:
    background-color var(--transition-normal),
    border-color var(--transition-normal), box-shadow var(--transition-normal);

  /* Radio - Base */
  --radio-border: var(--color-slate-300);
  --radio-bg: var(--surface-base);
  --radio-text: var(--color-primary-600);
  --radio-checked-bg: var(--color-primary-600);
  --radio-checked-border: var(--color-primary-600);
  --radio-focus-ring: var(--color-primary-100);

  /* Radio - Sizes */
  --radio-size-sm: 1rem;
  --radio-size-md: 1.125rem;
  --radio-size-lg: 1.25rem;

  /* Radio - Variants */
  --radio-primary-checked-bg: var(--color-primary-600);
  --radio-primary-checked-border: var(--color-primary-600);
  --radio-primary-focus-ring: var(--color-primary-100);

  --radio-secondary-checked-bg: var(--color-slate-600);
  --radio-secondary-checked-border: var(--color-slate-600);
  --radio-secondary-focus-ring: var(--color-slate-200);

  --radio-success-checked-bg: var(--color-success-600);
  --radio-success-checked-border: var(--color-success-600);
  --radio-success-focus-ring: var(--color-success-100);

  --radio-warning-checked-bg: var(--color-warning-600);
  --radio-warning-checked-border: var(--color-warning-600);
  --radio-warning-focus-ring: var(--color-warning-100);

  --radio-danger-checked-bg: var(--color-danger-600);
  --radio-danger-checked-border: var(--color-danger-600);
  --radio-danger-focus-ring: var(--color-danger-100);

  --radio-info-checked-bg: var(--color-info-600);
  --radio-info-checked-border: var(--color-info-600);
  --radio-info-focus-ring: var(--color-info-100);

  --radio-ghost-bg: transparent;
  --radio-ghost-border: var(--color-slate-300);
  --radio-ghost-checked-bg: var(--color-slate-700);
  --radio-ghost-checked-border: var(--color-slate-700);
  --radio-ghost-focus-ring: var(--color-slate-200);

  /* Radio - Error State */
  --radio-error-border: var(--color-danger-500);
  --radio-error-ring: var(--color-danger-100);
  --radio-error-checked-bg: var(--color-danger-600);
  --radio-error-checked-border: var(--color-danger-600);
}
```

## Dark Mode

Dark mode overrides are applied automatically when a parent element has the `.dark` class:

```css
.dark {
  --radio-border: var(--color-slate-600);
  --radio-bg: var(--color-slate-800);
  --radio-focus-ring: rgba(99, 102, 241, 0.25);

  /* Labels & helpers */
  --radio-label-color: var(--color-slate-300);
  --radio-hint-color: var(--color-slate-400);

  /* Disabled state */
  --radio-disabled-bg: var(--color-slate-800);
  --radio-disabled-border: var(--color-slate-700);

  --radio-primary-checked-bg: var(--color-primary-500);
  --radio-primary-checked-border: var(--color-primary-500);
  --radio-primary-focus-ring: rgba(99, 102, 241, 0.25);

  --radio-secondary-checked-bg: var(--color-slate-500);
  --radio-secondary-checked-border: var(--color-slate-500);
  --radio-secondary-focus-ring: rgba(148, 163, 184, 0.2);

  --radio-success-checked-bg: var(--color-success-500);
  --radio-success-checked-border: var(--color-success-500);
  --radio-success-focus-ring: rgba(34, 197, 94, 0.2);

  --radio-warning-checked-bg: var(--color-warning-500);
  --radio-warning-checked-border: var(--color-warning-500);
  --radio-warning-focus-ring: rgba(245, 158, 11, 0.2);

  --radio-danger-checked-bg: var(--color-danger-500);
  --radio-danger-checked-border: var(--color-danger-500);
  --radio-danger-focus-ring: rgba(239, 68, 68, 0.2);

  --radio-info-checked-bg: var(--color-info-500);
  --radio-info-checked-border: var(--color-info-500);
  --radio-info-focus-ring: rgba(59, 130, 246, 0.2);

  --radio-ghost-bg: transparent;
  --radio-ghost-border: var(--color-slate-600);
  --radio-ghost-focus-ring: rgba(148, 163, 184, 0.2);

  --radio-error-border: var(--color-danger-500);
  --radio-error-ring: rgba(239, 68, 68, 0.2);
}
```

For dark mode token details, see [Theming — Dark Mode](/guide/theming#dark-mode).

## Configuration

Configure defaults in `config/basekit-laravel-ui.php`:

```php
'radio' => [
    'enabled' => true,
    'variants' => ['primary', 'secondary', 'success', 'warning', 'danger', 'info', 'ghost'],
    'sizes' => ['sm', 'md', 'lg'],
    'default_variant' => 'primary',
    'default_size' => 'md',
],
```
