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
| `color`      | `string` | `null`      | Quick color shortcut. Sets the ON background color. |
| `background` | `string` | `null`      | Custom ON background color. |
| `wrapper-class` | `string` | `null`    | Additional classes for the outer wrapper div |
| `container-class` | `string` | `null`  | Additional classes for the inner container div |

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

## Custom Colors

Override the component's default ON state background using the `color` shortcut prop or the `background` prop.

The `color` prop accepts **Tailwind v4 color names** (e.g., `indigo-500`, `pink-200`, `emerald-700`) or any **raw CSS color value** (hex, rgb, hsl, named colors).

### With Tailwind Colors

```blade
<x-basekit-ui::toggle
    name="notifications"
    :is-checked="true"
    color="indigo-500"
    label="Enable notifications"
/>
```

### With Raw CSS Colors

```blade
<x-basekit-ui::toggle
    name="notifications"
    :is-checked="true"
    background="#4F46E5"
    label="Enable notifications"
/>
```

### Granular Control

```blade
<x-basekit-ui::toggle
    name="notifications"
    :is-checked="true"
    background="indigo-500"
    label="Enable notifications"
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

## Dark Mode

Dark mode overrides are applied automatically when a parent element has the `.dark` class:

```css
.dark {
  --toggle-bg-off: var(--color-slate-700);
  --toggle-bg-on: var(--color-primary-500);
  --toggle-thumb-bg: var(--color-slate-300);
  --toggle-thumb-border-off: var(--color-slate-600);

  --toggle-focus-ring: rgba(99, 102, 241, 0.25);

  /* Labels & helpers */
  --toggle-label-color: var(--color-slate-300);
  --toggle-hint-color: var(--color-slate-400);
  --toggle-disabled-label-color: var(--color-slate-600);

  --toggle-primary-bg-on: var(--color-primary-500);
  --toggle-primary-focus-ring: rgba(99, 102, 241, 0.25);

  --toggle-secondary-bg-on: var(--color-slate-500);
  --toggle-secondary-focus-ring: rgba(148, 163, 184, 0.2);

  --toggle-success-bg-on: var(--color-success-500);
  --toggle-success-focus-ring: rgba(34, 197, 94, 0.25);

  --toggle-warning-bg-on: var(--color-warning-500);
  --toggle-warning-focus-ring: rgba(245, 158, 11, 0.25);

  --toggle-danger-bg-on: var(--color-danger-500);
  --toggle-danger-focus-ring: rgba(239, 68, 68, 0.25);

  --toggle-info-bg-on: var(--color-info-500);
  --toggle-info-focus-ring: rgba(59, 130, 246, 0.25);

  --toggle-ghost-bg-on: var(--color-slate-700);
  --toggle-ghost-focus-ring: rgba(148, 163, 184, 0.2);

  --toggle-error-focus-ring: rgba(239, 68, 68, 0.25);
}
```

For dark mode token details, see [Theming — Dark Mode](/guide/theming#dark-mode).

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
