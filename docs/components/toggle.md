# Toggle

A switch-style boolean control with configurable variants, sizes, labels, and validation states.

::: tip Live Preview
<a href="../styleguide.html#toggles" target="_blank">View in the Styleguide →</a>
:::

## Basic Usage

```blade
<x-basekit-ui::toggle name="notifications" label="Enable notifications" />
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

Standard checkbox attributes such as `name`, `id`, and `disabled` pass through to the underlying hidden checkbox input.

## Slots

| Slot    | Description         |
| ------- | ------------------- |
| `label` | Custom label markup |
| `error` | Custom error markup |
| `hint`  | Custom helper text  |

## Variants

Supported variants: `primary`, `secondary`, `success`, `warning`, `danger`, `info`, `ghost`.

```blade
<x-basekit-ui::toggle name="primary" variant="primary" label="Primary" />
<x-basekit-ui::toggle name="secondary" variant="secondary" label="Secondary" />
<x-basekit-ui::toggle name="success" variant="success" label="Success" />
<x-basekit-ui::toggle name="warning" variant="warning" label="Warning" />
<x-basekit-ui::toggle name="danger" variant="danger" label="Danger" />
<x-basekit-ui::toggle name="info" variant="info" label="Info" />
<x-basekit-ui::toggle name="ghost" variant="ghost" label="Ghost" />
```

## Sizes

Supported sizes: `sm`,`md`,`lg`.

```blade
<x-basekit-ui::toggle name="small" size="sm" label="Small" />
<x-basekit-ui::toggle name="medium" size="md" label="Medium" />
<x-basekit-ui::toggle name="large" size="lg" label="Large" />
```

## Custom Label Markup

```blade
<x-basekit-ui::toggle name="marketing">
    <x-slot:label>
        Receive <strong>marketing</strong> emails
    </x-slot:label>
</x-basekit-ui::toggle>
```

## Checked and Error States

```blade
@php $user = (object) ['settings_enabled' => true]; @endphp
<x-basekit-ui::toggle
    name="settings"
    :is-checked="old('settings', $user->settings_enabled)"
    label="Enable settings"
/>

<x-basekit-ui::toggle
    name="terms"
    error="You must accept the terms"
    label="I accept the terms and conditions"
/>
```

## Custom Classes

Override or extend styles with the `class` attribute:

```blade
<x-basekit-ui::toggle
    name="custom-notifications"
    label="Enable notifications"
    class="mt-2"
/>
```

## CSS Variables

Customize toggle appearance via CSS variables:

```css
:root {
  /* Sizes */
  --toggle-width-sm: 2.25rem;
  --toggle-height-sm: 1.25rem;
  --toggle-width-md: 2.75rem;
  --toggle-height-md: 1.5rem;
  --toggle-width-lg: 3.25rem;
  --toggle-height-lg: 1.75rem;

  --toggle-thumb-size-sm: 1rem;
  --toggle-thumb-size-md: 1.25rem;
  --toggle-thumb-size-lg: 1.5rem;

  /* Colors */
  --toggle-bg-off: var(--color-slate-200);
  --toggle-bg-on: var(--color-primary-600);
  --toggle-thumb-bg: var(--surface-base);
  --toggle-thumb-border-off: var(--color-slate-300);

  /* Variants */
  --toggle-primary-bg-on: var(--color-primary-600);
  --toggle-primary-focus-ring: var(--color-primary-100);

  --toggle-secondary-bg-on: var(--color-slate-600);
  --toggle-secondary-focus-ring: var(--color-slate-200);

  --toggle-success-bg-on: var(--color-success-600);
  --toggle-success-focus-ring: var(--color-success-100);

  --toggle-warning-bg-on: var(--color-warning-600);
  --toggle-warning-focus-ring: var(--color-warning-100);

  --toggle-danger-bg-on: var(--color-danger-600);
  --toggle-danger-focus-ring: var(--color-danger-100);

  --toggle-info-bg-on: var(--color-info-600);
  --toggle-info-focus-ring: var(--color-info-100);

  --toggle-ghost-bg-on: var(--color-slate-700);
  --toggle-ghost-focus-ring: var(--color-slate-200);

  /* Error */
  --toggle-error-bg-on: var(--color-danger-600);
  --toggle-error-focus-ring: var(--color-danger-100);

  /* Interaction */
  --toggle-transition: var(--transition-normal) cubic-bezier(0.4, 0, 0.2, 1);
  --toggle-focus-ring: var(--color-primary-100);
}
```

## Configuration

Configure defaults in `config/basekit-laravel-ui.php`:

```php
'toggle' => [
    'enabled' => true,
    'variants' => ['primary', 'secondary', 'success', 'warning', 'danger', 'info', 'ghost'],
    'sizes' => ['sm', 'md', 'lg'],
    'default_variant' => 'primary',
    'default_size' => 'md',
],
```
