# Checkbox

A checkbox component with configurable variants, sizes, label content, and validation states.

::: tip Live Preview
<a href="../styleguide.html#checkboxes" target="_blank">View in the Styleguide →</a>
:::

## Basic Usage

```blade
<x-basekit-ui::checkbox
    name="terms"
    value="accepted"
    label="I accept the terms"
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

Standard checkbox attributes such as `name`, `id`, and `disabled` pass through to the underlying `<input>` element.

## Slots

| Slot    | Description         |
| ------- | ------------------- |
| `label` | Custom label markup |
| `error` | Custom error markup |
| `hint`  | Custom helper text  |

## Variants

Supported variants: `primary`, `secondary`, `success`, `warning`, `danger`, `info`, `ghost`.

```blade
<x-basekit-ui::checkbox name="primary" variant="primary" :is-checked="true" label="Primary" />
<x-basekit-ui::checkbox name="secondary" variant="secondary" :is-checked="true" label="Secondary" />
<x-basekit-ui::checkbox name="success" variant="success" :is-checked="true" label="Success" />
<x-basekit-ui::checkbox name="warning" variant="warning" :is-checked="true" label="Warning" />
<x-basekit-ui::checkbox name="danger" variant="danger" :is-checked="true" label="Danger" />
<x-basekit-ui::checkbox name="info" variant="info" :is-checked="true" label="Info" />
<x-basekit-ui::checkbox name="ghost" variant="ghost" :is-checked="true" label="Ghost" />
```

## Sizes

Supported sizes: `sm`, `md`, `lg`.

```blade
<x-basekit-ui::checkbox name="small" size="sm" label="Small" />
<x-basekit-ui::checkbox name="medium" size="md" label="Medium" />
<x-basekit-ui::checkbox name="large" size="lg" label="Large" />
```

## Custom Label Markup

```blade
<x-basekit-ui::checkbox name="terms">
    <x-slot:label>
        I agree to the <a href="/terms" class="text-blue-600">Terms of Service</a>
    </x-slot:label>
</x-basekit-ui::checkbox>
```

## Checked and Error States

```blade
<x-basekit-ui::checkbox
    name="remember"
    :is-checked="true"
    label="Remember me"
/>

<x-basekit-ui::checkbox
    name="newsletter"
    error="Please confirm your choice"
    label="Subscribe to updates"
/>
```

## Custom Classes

Override or extend styles with the `class` attribute:

```blade
<x-basekit-ui::checkbox
    name="custom-terms"
    label="I agree"
    class="mt-2"
/>
```

## Custom Colors

Override the component's default checked colors using the `color` shortcut prop or granular `background` and `border` props.

The `color` prop accepts **Tailwind v4 color names** (e.g., `indigo-500`, `pink-200`, `emerald-700`) or any **raw CSS color value** (hex, rgb, hsl, named colors).

> **Note**: When using Tailwind color names, the component automatically computes a contrasting text color for the checkmark (white on shades ≥500, dark on shades ≤400).

### With Tailwind Colors

```blade
<x-basekit-ui::checkbox
    name="terms"
    :is-checked="true"
    color="indigo-500"
    label="I accept the terms"
/>
```

### With Raw CSS Colors

```blade
<x-basekit-ui::checkbox
    name="terms"
    :is-checked="true"
    background="#4F46E5"
    label="I accept the terms"
/>
```

### Granular Control

```blade
<x-basekit-ui::checkbox
    name="terms"
    :is-checked="true"
    background="indigo-500"
    border="indigo-300"
    label="I accept the terms"
/>
```

## CSS Variables

Customize checkbox appearance via CSS variables:

```css
:root {
  /* Checkbox - Base */
  --checkbox-color: var(--color-slate-900);
  --checkbox-border-color: var(--color-slate-300);
  --checkbox-border-radius: var(--radius-sm);
  --checkbox-transition:
    background-color var(--transition-normal),
    border-color var(--transition-normal), box-shadow var(--transition-normal);

  /* Checkbox - Sizes */
  --checkbox-size-sm: 1rem;
  --checkbox-size-md: 1.125rem;
  --checkbox-size-lg: 1.25rem;

  /* Checkbox - States */
  --checkbox-hover-border-color: var(--color-slate-400);
  --checkbox-focus-border-color: var(--color-primary-500);
  --checkbox-focus-ring-color: var(--color-primary-100);
  --checkbox-focus-ring-width: 2px;

  --checkbox-disabled-bg: var(--color-slate-100);
  --checkbox-disabled-border-color: var(--color-slate-200);
  --checkbox-disabled-color: var(--color-slate-500);

  --checkbox-error-border-color: var(--color-danger-500);
  --checkbox-error-ring-color: var(--color-danger-100);
  --checkbox-error-color: var(--color-danger-700);

  /* Checkbox - Variants */
  --checkbox-primary-checked-bg: var(--color-primary-600);
  --checkbox-primary-checked-border: var(--color-primary-600);
  --checkbox-primary-focus-ring: var(--color-primary-100);

  --checkbox-secondary-checked-bg: var(--color-slate-600);
  --checkbox-secondary-checked-border: var(--color-slate-600);
  --checkbox-secondary-focus-ring: var(--color-slate-200);

  --checkbox-success-checked-bg: var(--color-success-600);
  --checkbox-success-checked-border: var(--color-success-600);
  --checkbox-success-focus-ring: var(--color-success-100);

  --checkbox-warning-checked-bg: var(--color-warning-600);
  --checkbox-warning-checked-border: var(--color-warning-600);
  --checkbox-warning-focus-ring: var(--color-warning-100);

  --checkbox-danger-checked-bg: var(--color-danger-600);
  --checkbox-danger-checked-border: var(--color-danger-600);
  --checkbox-danger-focus-ring: var(--color-danger-100);

  --checkbox-info-checked-bg: var(--color-info-600);
  --checkbox-info-checked-border: var(--color-info-600);
  --checkbox-info-focus-ring: var(--color-info-100);

  --checkbox-ghost-bg: transparent;
  --checkbox-ghost-border: var(--color-slate-300);
  --checkbox-ghost-checked-bg: var(--color-slate-700);
  --checkbox-ghost-checked-border: var(--color-slate-700);
  --checkbox-ghost-focus-ring: var(--color-slate-200);
}
```

## Dark Mode

Dark mode overrides are applied automatically when a parent element has the `.dark` class:

```css
.dark {
  --checkbox-border-color: var(--color-slate-600);
  --checkbox-hover-border-color: var(--color-slate-500);
  --checkbox-focus-ring-color: rgba(99, 102, 241, 0.25);

  --checkbox-disabled-bg: var(--color-slate-800);
  --checkbox-disabled-border-color: var(--color-slate-700);
  --checkbox-disabled-color: var(--color-slate-500);

  --checkbox-error-border-color: var(--color-danger-500);
  --checkbox-error-ring-color: rgba(239, 68, 68, 0.2);
  --checkbox-error-color: var(--color-danger-400);

  /* Labels & helpers */
  --checkbox-label-color: var(--color-slate-300);
  --checkbox-hint-color: var(--color-slate-400);

  /* Disabled checked state */
  --checkbox-disabled-checked-bg: var(--color-slate-600);
  --checkbox-disabled-checked-border: var(--color-slate-600);

  --checkbox-primary-checked-bg: var(--color-primary-500);
  --checkbox-primary-checked-border: var(--color-primary-500);
  --checkbox-primary-focus-ring: rgba(99, 102, 241, 0.25);

  --checkbox-secondary-checked-bg: var(--color-slate-600);
  --checkbox-secondary-checked-border: var(--color-slate-600);
  --checkbox-secondary-focus-ring: rgba(148, 163, 184, 0.2);

  --checkbox-success-checked-bg: var(--color-success-500);
  --checkbox-success-checked-border: var(--color-success-500);
  --checkbox-success-focus-ring: rgba(34, 197, 94, 0.2);

  --checkbox-warning-checked-bg: var(--color-warning-500);
  --checkbox-warning-checked-border: var(--color-warning-500);
  --checkbox-warning-focus-ring: rgba(245, 158, 11, 0.2);

  --checkbox-danger-checked-bg: var(--color-danger-500);
  --checkbox-danger-checked-border: var(--color-danger-500);
  --checkbox-danger-focus-ring: rgba(239, 68, 68, 0.2);

  --checkbox-info-checked-bg: var(--color-info-500);
  --checkbox-info-checked-border: var(--color-info-500);
  --checkbox-info-focus-ring: rgba(59, 130, 246, 0.2);

  --checkbox-ghost-border: var(--color-slate-600);
  --checkbox-ghost-focus-ring: rgba(148, 163, 184, 0.2);
}
```

For dark mode token details, see [Theming — Dark Mode](/guide/theming#dark-mode).

## Configuration

Configure defaults in `config/basekit-laravel-ui.php`:

```php
'checkbox' => [
    'enabled' => true,
    'variants' => ['primary', 'secondary', 'success', 'warning', 'danger', 'info', 'ghost'],
    'sizes' => ['sm', 'md', 'lg'],
    'default_variant' => 'primary',
    'default_size' => 'md',
],
```
