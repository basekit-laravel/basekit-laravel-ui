# Textarea

A multi-line text input component with configurable variants, sizes, label placements, and validation states.

::: tip Live Preview
<a href="../styleguide.html#textareas" target="_blank">View in the Styleguide →</a>
:::

## Basic Usage

```blade
<x-basekit-ui::textarea
    name="description"
    label="Description"
    placeholder="Enter description"
/>
```

## Props

| Prop           | Type     | Default       | Description                                                                 |
| -------------- | -------- | ------------- | --------------------------------------------------------------------------- |
| `rows`         | `int`    | `4`           | Number of visible rows                                                      |
| `variant`      | `string` | `'secondary'` | Visual style: `primary`, `secondary`, `success`, `warning`, `info`, `ghost` |
| `size`         | `string` | `'md'`        | Control size: `sm`, `md`, `lg`                                              |
| `label`        | `string` | `null`        | Label text                                                                  |
| `error`        | `string` | `null`        | Error message shown below the field                                         |
| `hint`         | `string` | `null`        | Helper text shown below the field                                           |
| `placeholder`  | `string` | `null`        | Placeholder text                                                            |
| `value`        | `string` | `null`        | Initial textarea value                                                      |
| `corner-hint`  | `string` | `null`        | Top-right label row hint                                                    |
| `label-style`  | `string` | `'default'`   | Label placement: `default`, `inset`, `overlap`                              |
| `is-underline` | `bool`   | `false`       | Use underline-only styling                                                  |
| `border`       | `string` | `null`        | Custom border color. |
| `wrapper-class` | `string` | `null`        | Additional classes for the outer wrapper div |
| `container-class` | `string` | `null`        | Additional classes for the inner container div |

Standard textarea attributes such as `name`, `maxlength`, `disabled`, and `readonly` pass through to the underlying `<textarea>` element.

## Slots

| Slot    | Description         |
| ------- | ------------------- |
| `label` | Custom label markup |
| `error` | Custom error markup |
| `hint`  | Custom helper text  |

## Variants

Supported variants: `primary`, `secondary`, `success`, `warning`, `info`, `ghost`.

```blade
<x-basekit-ui::textarea name="primary" label="Primary" variant="primary" />
<x-basekit-ui::textarea name="secondary" label="Secondary" variant="secondary" />
<x-basekit-ui::textarea name="success" label="Success" variant="success" value="Looks good" />
<x-basekit-ui::textarea name="warning" label="Warning" variant="warning" value="Needs review" />
<x-basekit-ui::textarea name="info" label="Info" variant="info" />
<x-basekit-ui::textarea name="ghost" label="Ghost" variant="ghost" />
```

## Sizes

Supported sizes: `sm`,`md`,`lg`.

```blade
<x-basekit-ui::textarea name="small" size="sm" rows="3" />
<x-basekit-ui::textarea name="medium" size="md" rows="4" />
<x-basekit-ui::textarea name="large" size="lg" rows="5" />
```

## Label Styles

```blade
<x-basekit-ui::textarea name="bio" label="Bio" label-style="inset" />
<x-basekit-ui::textarea name="notes" label="Notes" label-style="overlap" />
<x-basekit-ui::textarea name="message" label="Message" is-underline />
```

## With Corner Hint

```blade
<x-basekit-ui::textarea
    name="summary"
    label="Summary"
    corner-hint="Optional"
/>
```

## Validation State

```blade
<x-basekit-ui::textarea
    name="description"
    label="Description"
    error="Description is required"
/>
```

## Custom Classes

Override or extend styles with the `class` attribute:

```blade
<x-basekit-ui::textarea
    name="custom-description"
    label="Description"
    class="mt-2"
/>
```

## Custom Colors

Override the component's default border and focus ring colors using the `color` shortcut prop or the `border` prop.

The `color` prop accepts **Tailwind v4 color names** (e.g., `indigo-500`, `pink-200`, `emerald-700`) or any **raw CSS color value** (hex, rgb, hsl, named colors). When using `color`, the focus-within ring automatically matches the chosen color.

### With Tailwind Colors

```blade
<x-basekit-ui::textarea
    name="description"
    label="Description"
    color="indigo-500"
/>
```

### With Raw CSS Colors

```blade
<x-basekit-ui::textarea
    name="description"
    label="Description"
    border="#C7D2FE"
/>
```

### Granular Control

```blade
<x-basekit-ui::textarea
    name="description"
    label="Description"
    border="indigo-500"
/>
```

## CSS Variables

Customize textarea appearance via CSS variables:

```css
:root {
  --textarea-radius: var(--radius-md);
  --textarea-transition:
    border-color var(--transition-normal) ease,
    box-shadow var(--transition-normal) ease;

  /* Sizes */
  --textarea-padding-y-sm: 0.375rem;
  --textarea-padding-x-sm: 0.75rem;
  --textarea-font-size-sm: var(--font-size-sm);

  --textarea-padding-y-md: 0.625rem;
  --textarea-padding-x-md: 0.875rem;
  --textarea-font-size-md: var(--font-size-md);

  --textarea-padding-y-lg: 0.75rem;
  --textarea-padding-x-lg: 1rem;
  --textarea-font-size-lg: var(--font-size-lg);

  /* Colors */
  --textarea-bg: var(--surface-base);
  --textarea-border: var(--color-slate-300);
  --textarea-text: var(--color-slate-900);
  --textarea-placeholder: var(--color-slate-400);

  --textarea-focus-border: var(--color-primary-500);
  --textarea-focus-ring: var(--color-primary-100);

  --textarea-primary-border: var(--color-primary-500);
  --textarea-primary-ring: var(--color-primary-100);

  --textarea-secondary-border: var(--color-slate-300);
  --textarea-secondary-ring: var(--color-slate-100);

  --textarea-error-border: var(--color-danger-500);
  --textarea-error-ring: var(--color-danger-100);

  --textarea-success-border: var(--color-success-500);
  --textarea-success-ring: var(--color-success-100);

  --textarea-warning-border: var(--color-warning-500);
  --textarea-warning-ring: var(--color-warning-100);

  --textarea-danger-border: var(--color-danger-500);
  --textarea-danger-ring: var(--color-danger-100);

  --textarea-info-border: var(--color-info-500);
  --textarea-info-ring: var(--color-info-100);

  --textarea-ghost-border: transparent;
  --textarea-ghost-ring: var(--color-slate-100);
  --textarea-ghost-bg: transparent;
}
```

## Dark Mode

Dark mode overrides are applied automatically when a parent element has the `.dark` class:

```css
.dark {
  --textarea-bg: var(--color-slate-800);
  --textarea-border: var(--color-slate-600);
  --textarea-text: var(--color-slate-100);
  --textarea-placeholder: var(--color-slate-500);

  --textarea-focus-border: var(--color-primary-400);
  --textarea-focus-ring: rgba(99, 102, 241, 0.25);

  --textarea-primary-border: var(--color-primary-500);
  --textarea-primary-ring: rgba(99, 102, 241, 0.25);

  --textarea-secondary-border: var(--color-slate-600);
  --textarea-secondary-ring: rgba(148, 163, 184, 0.2);

  --textarea-error-border: var(--color-danger-500);
  --textarea-error-ring: rgba(239, 68, 68, 0.2);

  --textarea-success-border: var(--color-success-500);
  --textarea-success-ring: rgba(34, 197, 94, 0.2);

  --textarea-warning-border: var(--color-warning-500);
  --textarea-warning-ring: rgba(245, 158, 11, 0.2);

  --textarea-danger-border: var(--color-danger-500);
  --textarea-danger-ring: rgba(239, 68, 68, 0.2);

  --textarea-info-border: var(--color-info-500);
  --textarea-info-ring: rgba(59, 130, 246, 0.2);

  --textarea-ghost-ring: rgba(148, 163, 184, 0.15);

  /* Labels & helpers */
  --textarea-label-color: var(--color-slate-300);
  --textarea-hint-color: var(--color-slate-400);

  /* Disabled state */
  --textarea-disabled-bg: var(--color-slate-900);
  --textarea-disabled-color: var(--color-slate-600);
  --textarea-disabled-border: var(--color-slate-800);
}
```

For dark mode token details, see [Theming — Dark Mode](/guide/theming#dark-mode).

## Configuration

Configure defaults in `config/basekit-laravel-ui.php`:

```php
'textarea' => [
    'enabled' => true,
    'variants' => ['primary', 'secondary', 'success', 'warning', 'info', 'ghost'],
    'sizes' => ['sm', 'md', 'lg'],
    'default_variant' => 'secondary',
    'default_size' => 'md',
],
```
