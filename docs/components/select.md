# Select

A select component with support for generated options, custom option markup, icons, validation states, and alternate label styles.

::: tip Live Preview
<a href="../styleguide.html#selects" target="_blank">View in the Styleguide →</a>
:::

## Basic Usage

```blade
<x-basekit-ui::select
    name="country"
    label="Country"
    placeholder="Select a country"
    :options="[
        'us' => 'United States',
        'ca' => 'Canada',
        'uk' => 'United Kingdom',
    ]"
/>
```

## Props

| Prop            | Type     | Default       | Description                                                                 |
| --------------- | -------- | ------------- | --------------------------------------------------------------------------- |
| `options`       | `array`  | `[]`          | Value-label option pairs                                                    |
| `value`         | `mixed`  | `null`        | Selected value                                                              |
| `variant`       | `string` | `'secondary'` | Visual style: `primary`, `secondary`, `success`, `warning`, `info`, `ghost` |
| `size`          | `string` | `'md'`        | Control size: `sm`, `md`, `lg`                                              |
| `label`         | `string` | `null`        | Label text                                                                  |
| `error`         | `string` | `null`        | Error message shown below the field                                         |
| `hint`          | `string` | `null`        | Helper text shown below the field                                           |
| `icon`          | `string` | `null`        | Heroicon name rendered inside the field                                     |
| `placeholder`   | `string` | `null`        | Placeholder option text                                                     |
| `corner-hint`   | `string` | `null`        | Top-right label row hint                                                    |
| `is-disabled`   | `bool`   | `false`       | Disable the select                                                          |
| `allow-empty`   | `bool`   | `false`       | Include an explicit empty option (`value=""`) that users can select         |
| `empty-label`   | `string` | `null`        | Label text for the empty option when `allow-empty` is enabled               |
| `label-style`   | `string` | `'default'`   | Label placement: `default`, `inset`, `overlap`                              |
| `control-style` | `string` | `'default'`   | Control style: `default`, `pill`, `underline`                               |

Standard select attributes such as `name`, `multiple`, and `disabled` can also be passed through.

## Slots

| Slot      | Description                               |
| --------- | ----------------------------------------- |
| `default` | Custom `<option>` and `<optgroup>` markup |
| `label`   | Custom label markup                       |
| `error`   | Custom error markup                       |
| `hint`    | Custom helper text                        |
| `icon`    | Custom icon markup                        |

## Variants

Supported variants: `primary`, `secondary`, `success`, `warning`, `info`, `ghost`.

```blade
@php
$options =[
    'active' => 'Active',
    'inactive' => 'Inactive',
];
@endphp

<x-basekit-ui::select name="variant-primary" variant="primary" :options="$options" />
<x-basekit-ui::select name="variant-secondary" variant="secondary" :options="$options" />
<x-basekit-ui::select name="variant-success" variant="success" :options="$options" />
<x-basekit-ui::select name="variant-warning" variant="warning" :options="$options" />
<x-basekit-ui::select name="variant-info" variant="info" :options="$options" />
<x-basekit-ui::select name="variant-ghost" variant="ghost" :options="$options" />
```

## Sizes

Supported sizes: `sm`,`md`,`lg`.

```blade
@php
$options =[
    'small' => 'Small',
    'medium' => 'Medium',
    'large' => 'Large',
];
@endphp

<x-basekit-ui::select name="size-sm" size="sm" :options="$options" value="small" />
<x-basekit-ui::select name="size-md" size="md" :options="$options" value="medium" />
<x-basekit-ui::select name="size-lg" size="lg" :options="$options" value="large" />
```

## With Icon

### With Heroicon

Pass any Heroicon name via the `icon` prop:

```blade
<x-basekit-ui::select
    name="country"
    label="Country"
    icon="globe-alt"
    :options="[
        'hu' => 'Hungary',
        'de' => 'Germany',
        'fr' => 'France',
    ]"
/>
```

### Using Icon Slot

```blade

<x-basekit-ui::select name="custom-icon" label="Custom Icon" :options="[
    'ny' => 'New York',
    'ldn' => 'London',
    'bud' => 'Budapest',
]">
    <x-slot:icon>
        <x-heroicon-o-map-pin class="w-4 h-4" />
    </x-slot:icon>
</x-basekit-ui::select>
```

## Generated Options

```blade
<x-basekit-ui::select
    name="role"
    label="Role"
    :value="old('role')"
    :options="[
        'admin' => 'Admin',
        'editor' => 'Editor',
        'viewer' => 'Viewer',
    ]"
/>
```

## Custom Option Markup

```blade
<x-basekit-ui::select name="category" label="Category">
    <option value="">Select category</option>
    <optgroup label="Fruits">
        <option value="apple">Apple</option>
        <option value="banana">Banana</option>
    </optgroup>
    <optgroup label="Vegetables">
        <option value="carrot">Carrot</option>
        <option value="broccoli">Broccoli</option>
    </optgroup>
</x-basekit-ui::select>
```

## Label Styles

```blade
@php
$options =[
    'active' => 'Active',
    'inactive' => 'Inactive',
];
@endphp

<x-basekit-ui::select name="department" label="Department" label-style="inset" :options="$options" />
<x-basekit-ui::select name="role" label="Role" label-style="overlap" :options="$options" />
<x-basekit-ui::select name="status" control-style="pill" :options="$options" />
<x-basekit-ui::select name="plan" label="Plan" control-style="underline" :options="$options" />
```

## Allow Empty Option

Use `allow-empty` to add an explicit empty option (`value=""`) at the top of the list. This lets users deselect a previously chosen value.

```blade
@php
$options = [
    'admin'  => 'Admin',
    'editor' => 'Editor',
    'viewer' => 'Viewer',
];
@endphp

<x-basekit-ui::select
    name="role"
    label="Role"
    allow-empty
    :options="$options"
/>
```

### With Custom Empty Label

By default the empty option shows `—` (em dash). Use `empty-label` to replace that text:

```blade
<x-basekit-ui::select
    name="priority"
    label="Priority"
    allow-empty
    empty-label="No priority"
    :options="[
        'low'    => 'Low',
        'medium' => 'Medium',
        'high'   => 'High',
    ]"
/>
```

### Using Placeholder as Empty Label

When `allow-empty` is set and no `empty-label` is given, the `placeholder` text is used as the empty option label:

```blade
<x-basekit-ui::select
    name="status"
    label="Status"
    placeholder="Any status"
    allow-empty
    :options="[
        'active'   => 'Active',
        'inactive' => 'Inactive',
    ]"
/>
```

## Validation State

```blade
<x-basekit-ui::select
    name="type"
    label="Type"
    error="Please select a type"
    :options="['a' => 'Type A', 'b' => 'Type B']"
/>
```

## Custom Classes

Override or extend styles with the `class` attribute:

```blade
<x-basekit-ui::select
    name="custom-type"
    label="Type"
    :options="[
        'feature' => 'Feature',
        'bugfix' => 'Bugfix',
        'chore' => 'Chore',
    ]"
    class="mt-2"
/>
```

## CSS Variables

Customize select appearance via CSS variables:

```css
:root {
  /* Base */
  --select-color: var(--color-slate-900);
  --select-placeholder-color: var(--color-slate-400);
  --select-border-color: var(--color-slate-300);
  --select-border-radius: var(--radius-md, 0.375rem);
  --select-bg: var(--surface-base);
  --select-font-family: inherit;
  --select-line-height: 1.5;
  --select-transition:
    border-color var(--transition-fast) ease-in-out,
    box-shadow var(--transition-fast) ease-in-out;

  /* Interaction States */
  --select-hover-border-color: var(--color-slate-400);
  --select-focus-border-color: var(--color-primary-500);
  --select-focus-ring-color: var(--color-primary-100);
  --select-focus-ring-width: 2px;

  /* Disabled State */
  --select-disabled-bg: var(--color-slate-50);
  --select-disabled-color: var(--color-slate-500);
  --select-disabled-border-color: var(--color-slate-200);

  /* Variants */
  --select-primary-border-color: var(--color-primary-500);
  --select-primary-ring-color: var(--color-primary-100);
  --select-secondary-border-color: var(--color-slate-300);
  --select-secondary-ring-color: var(--color-slate-100);
  --select-error-border-color: var(--color-danger-500);
  --select-error-ring-color: var(--color-danger-100);
  --select-error-color: var(--color-danger-700);
  --select-success-border-color: var(--color-success-500);
  --select-success-ring-color: var(--color-success-100);
  --select-warning-border-color: var(--color-warning-500);
  --select-warning-ring-color: var(--color-warning-100);
  --select-danger-border-color: var(--color-danger-500);
  --select-danger-ring-color: var(--color-danger-100);
  --select-info-border-color: var(--color-info-500);
  --select-info-ring-color: var(--color-info-100);
  --select-ghost-border-color: transparent;
  --select-ghost-ring-color: var(--color-slate-100);
  --select-ghost-bg: transparent;

  /* Sizes */
  --select-py-sm: 0.375rem;
  --select-px-sm: 0.75rem;
  --select-fs-sm: 0.875rem;
  --select-py-md: 0.5rem;
  --select-px-md: 0.875rem;
  --select-fs-md: 0.9375rem;
  --select-py-lg: 0.75rem;
  --select-px-lg: 1rem;
  --select-fs-lg: 1rem;

  /* Dropdown Menu */
  --select-menu-bg: var(--surface-base);
}
```

## Configuration

Configure defaults in `config/basekit-laravel-ui.php`:

```php
'select' => [
    'enabled' => true,
    'variants' => ['primary', 'secondary', 'success', 'warning', 'info', 'ghost'],
    'sizes' => ['sm', 'md', 'lg'],
    'default_variant' => 'secondary',
    'default_size' => 'md',
],
```
