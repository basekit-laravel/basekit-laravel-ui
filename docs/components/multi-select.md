# Multi-Select

A custom multi-select dropdown with chip display, validation states, and optional icons.

::: warning Alpine.js Required
This component requires Alpine.js to be loaded in your layout for interactive behavior (opening/closing the dropdown, adding/removing chips). See the [installation guide](/guide/installation#alpine-js-required-for-interactive-components) for setup instructions.
:::

::: tip Live Preview
<a href="../styleguide.html#multiselects" target="_blank">View in the Styleguide →</a>
:::

## Basic Usage

```blade
<x-basekit-ui::multi-select
    name="tags"
    label="Tags"
    :options="[
        'laravel' => 'Laravel',
        'vue' => 'Vue.js',
        'tailwind' => 'Tailwind CSS',
    ]"
/>
```

## Props

| Prop            | Type     | Default            | Description                                                                 |
| --------------- | -------- | ------------------ | --------------------------------------------------------------------------- |
| `options`       | `array`  | `[]`               | Value-label option pairs                                                    |
| `value`         | `array`  | `[]`               | Selected values                                                             |
| `variant`       | `string` | `'secondary'`      | Visual style: `primary`, `secondary`, `success`, `warning`, `info`, `ghost` |
| `size`          | `string` | `'md'`             | Control size: `sm`, `md`, `lg`                                              |
| `label`         | `string` | `null`             | Label text                                                                  |
| `error`         | `string` | `null`             | Error message shown below the field                                         |
| `hint`          | `string` | `null`             | Helper text shown below the field                                           |
| `icon`          | `string` | `null`             | Heroicon name rendered inside the control                                   |
| `placeholder`   | `string` | `'Select options'` | Placeholder text when nothing is selected                                   |
| `corner-hint`   | `string` | `null`             | Top-right label row hint                                                    |
| `label-style`   | `string` | `'default'`        | Label placement: `default`, `inset`, `overlap`                              |
| `control-style` | `string` | `'default'`        | Control style: `default`, `pill`, `underline`                               |

Pass `name="tags"` or `name="tags[]"`; the component normalizes hidden inputs to array submission format automatically.

## Slots

| Slot    | Description         |
| ------- | ------------------- |
| `label` | Custom label markup |
| `error` | Custom error markup |
| `hint`  | Custom helper text  |
| `icon`  | Custom icon markup  |

## Variants

Supported variants: `primary`, `secondary`, `success`, `warning`, `info`, `ghost`.

```blade
@php
$options =[
    'active' => 'Active',
    'inactive' => 'Inactive',
];
@endphp

<x-basekit-ui::multi-select name="primary" variant="primary" :options="$options" />
<x-basekit-ui::multi-select name="secondary" variant="secondary" :options="$options" />
<x-basekit-ui::multi-select name="success" variant="success" :options="$options" />
<x-basekit-ui::multi-select name="warning" variant="warning" :options="$options" />
<x-basekit-ui::multi-select name="info" variant="info" :options="$options" />
<x-basekit-ui::multi-select name="ghost" variant="ghost" :options="$options" />
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

<x-basekit-ui::multi-select name="small" size="sm" :options="$options" :value="['small']" />
<x-basekit-ui::multi-select name="medium" size="md" :options="$options" :value="['medium']" />
<x-basekit-ui::multi-select name="large" size="lg" :options="$options" :value="['large']" />
```

## With Icon

### With Heroicon

Pass any Heroicon name via the `icon` prop:

```blade
<x-basekit-ui::multi-select
    name="locations"
    label="Locations"
    icon="map-pin"
    :options="[
        'bud' => 'Budapest',
        'vie' => 'Vienna',
        'pra' => 'Prague',
    ]"
/>
```

### Using Icon Slot

```blade
@php
$options =[
    'ny' => 'New York',
    'ldn' => 'London',
    'bud' => 'Budapest',
];
@endphp


<x-basekit-ui::multi-select name="custom-icon" label="Custom Icon" :options="$options">
    <x-slot:icon>
        <x-heroicon-o-tag class="w-4 h-4" />
    </x-slot:icon>
</x-basekit-ui::multi-select>
```

## With Selected Values

```blade
<x-basekit-ui::multi-select
    name="frameworks"
    :value="['laravel', 'vue']"
    :options="[
        'laravel' => 'Laravel',
        'vue' => 'Vue.js',
        'alpine' => 'Alpine.js',
        'tailwind' => 'Tailwind CSS',
    ]"
/>
```

## Label Styles

```blade
@php
$options =[
    'active' => 'Active',
    'inactive' => 'Inactive',
];
@endphp

<x-basekit-ui::multi-select name="status" label="Status" label-style="inset" :options="$options" />
<x-basekit-ui::multi-select name="roles" label="Roles" label-style="overlap" :options="$options" />
<x-basekit-ui::multi-select name="interests" control-style="pill" :options="$options" />
<x-basekit-ui::multi-select name="tiers" label="Tiers" control-style="underline" :options="$options" />
```

## Validation State

```blade
@php
$options =[
    'laravel' => 'Laravel',
    'vue' => 'Vue.js',
    'tailwind' => 'Tailwind CSS',
];
@endphp

<x-basekit-ui::multi-select
    name="tags"
    label="Tags"
    error="Please select at least one tag"
    :options="$options"
/>
```

## Disabled State

```blade
@php
$options =[
    'laravel' => 'Laravel',
    'vue' => 'Vue.js',
    'tailwind' => 'Tailwind CSS',
];
@endphp

<x-basekit-ui::multi-select
    name="disabled"
    disabled
    placeholder="This field is disabled"
    :options="$options"
/>
```

## Custom Classes

Override or extend styles with the `class` attribute:

```blade
@php
$options =[
    'feature' => 'Feature',
    'bugfix' => 'Bugfix',
    'chore' => 'Chore',
];
@endphp

<x-basekit-ui::multi-select
    name="custom-tags"
    label="Tags"
    :options="$options"
    class="mt-2"
/>
```

## CSS Variables

Customize multi-select appearance via CSS variables:

```css
:root {
  /* Multi Select - Base */
  --multiselect-color: var(--color-slate-900);
  --multiselect-placeholder-color: var(--color-slate-400);
  --multiselect-border-color: var(--color-slate-300);
  --multiselect-border-radius: var(--radius-md, 0.375rem);
  --multiselect-bg: var(--surface-base);
  --multiselect-font-family: inherit;
  --multiselect-line-height: 1.5;
  --multiselect-transition:
    border-color var(--transition-fast) ease-in-out,
    box-shadow var(--transition-fast) ease-in-out;

  /* Multi Select -  States */
  --multiselect-hover-border-color: var(--color-slate-400);
  --multiselect-focus-border-color: var(--color-primary-500);
  --multiselect-focus-ring-color: var(--color-primary-100);
  --multiselect-focus-ring-width: 2px;

  --multiselect-disabled-bg: var(--color-slate-50);
  --multiselect-disabled-color: var(--color-slate-500);
  --multiselect-disabled-border-color: var(--color-slate-200);

  --multiselect-error-border-color: var(--color-danger-500);
  --multiselect-error-ring-color: var(--color-danger-100);
  --multiselect-error-color: var(--color-danger-700);

  /* Multi Select - Variants */
  --multiselect-primary-border-color: var(--color-primary-500);
  --multiselect-primary-ring-color: var(--color-primary-100);

  --multiselect-secondary-border-color: var(--color-slate-300);
  --multiselect-secondary-ring-color: var(--color-slate-100);

  --multiselect-success-border-color: var(--color-success-500);
  --multiselect-success-ring-color: var(--color-success-100);

  --multiselect-warning-border-color: var(--color-warning-500);
  --multiselect-warning-ring-color: var(--color-warning-100);

  --multiselect-danger-border-color: var(--color-danger-500);
  --multiselect-danger-ring-color: var(--color-danger-100);

  --multiselect-info-border-color: var(--color-info-500);
  --multiselect-info-ring-color: var(--color-info-100);

  --multiselect-ghost-border-color: transparent;
  --multiselect-ghost-ring-color: var(--color-slate-100);
  --multiselect-ghost-bg: transparent;

  /* Multi Select - Sizes */
  --multiselect-py-sm: 0.375rem;
  --multiselect-px-sm: 0.75rem;
  --multiselect-fs-sm: 0.875rem;

  --multiselect-py-md: 0.5rem;
  --multiselect-px-md: 0.875rem;
  --multiselect-fs-md: 0.9375rem;

  --multiselect-py-lg: 0.75rem;
  --multiselect-px-lg: 1rem;
  --multiselect-fs-lg: 1rem;

  /* Multi Select - Chip */
  --multiselect-chip-bg: var(--color-slate-100);
  --multiselect-chip-text: var(--color-slate-700);
  --multiselect-chip-border: var(--color-slate-200);

  /* Multi Select - Menu */
  --multiselect-menu-bg: var(--surface-base);
  --multiselect-menu-border: var(--color-slate-200);
  --multiselect-menu-shadow: var(--shadow-lg);
  --multiselect-option-hover: var(--color-slate-50);
  --multiselect-option-check-bg: var(--surface-base);
  --multiselect-option-check-inset: var(--surface-base);
}
```

## Configuration

Configure defaults in `config/basekit-laravel-ui.php`:

```php
'multi-select' => [
    'enabled' => true,
    'variants' => ['primary', 'secondary', 'success', 'warning', 'info', 'ghost'],
    'sizes' => ['sm', 'md', 'lg'],
    'default_variant' => 'secondary',
    'default_size' => 'md',
],
```
