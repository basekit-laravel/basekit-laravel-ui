# Fieldset

A semantic group wrapper for related form controls (typically radio or checkbox groups). Renders a native `<fieldset>` with an optional `<legend>` and owns a single reserved message line below the group, so items stay tightly packed without layout shift when a group-level validation message appears.

::: tip Live Preview
<a href="../styleguide.html#fieldsets" target="_blank">View in the Styleguide →</a>
:::

## Basic Usage

```blade
<x-basekit-ui::fieldset label="Billing cycle">
    <x-basekit-ui::radio name="billing" value="monthly" label="Monthly" />
    <x-basekit-ui::radio name="billing" value="yearly" label="Yearly" />
    <x-basekit-ui::radio name="billing" value="lifetime" label="Lifetime" />
</x-basekit-ui::fieldset>
```

## Props

| Prop            | Type     | Default | Description                                         |
| --------------- | -------- | ------- | --------------------------------------------------- |
| `label`         | `string` | `null`  | Group legend text                                   |
| `error`         | `string` | `null`  | Group-level error message shown below the items     |
| `hint`          | `string` | `null`  | Group-level helper text shown below the items       |
| `reserves-messages` | `bool` | `true` | Keep the reserved message slot below the group     |
| `wrapper-class` | `string` | `null`  | Additional classes for the outer `<fieldset>`       |
| `items-class`   | `string` | `null`  | Additional classes for the items container          |

Standard attributes such as `class` pass through to the underlying `<fieldset>` element.

## Slots

| Slot    | Description         |
| ------- | ------------------- |
| `label` | Custom legend markup |
| `error` | Custom error markup  |
| `hint`  | Custom helper text   |
| `default` | The grouped form controls |

## Group Error and Hint

Group-level messages render inside the group's single reserved message line. The error takes precedence over the hint.

```blade
<x-basekit-ui::fieldset label="Topics" error="Please select at least one topic">
    <x-basekit-ui::checkbox name="topics" value="security" label="Security" />
    <x-basekit-ui::checkbox name="topics" value="releases" label="Releases" />
</x-basekit-ui::fieldset>
```

## Standalone vs. Grouped Items

Standalone [checkbox](checkbox.md), [radio](radio.md), and [toggle](toggle.md) controls still reserve
their own message line. When rendered **inside a fieldset**, the group handles validation, so each
item's reservation is disabled automatically — put per-item errors on the group instead.

## CSS Variables

Customize fieldset appearance via CSS variables:

```css
:root {
  /* Labels & helpers */
  --fieldset-label-color: var(--color-slate-700);
  --fieldset-hint-color: var(--color-slate-500);
  --fieldset-error-color: var(--color-danger-700);
}
```

## Dark Mode

```css
.dark {
  --fieldset-label-color: var(--color-slate-300);
  --fieldset-hint-color: var(--color-slate-400);
  --fieldset-error-color: var(--color-danger-400);
}
```

For dark mode token details, see [Theming — Dark Mode](/guide/theming#dark-mode).

## Configuration

Configure defaults in `config/basekit-laravel-ui.php`:

```php
'fieldset' => [
    'enabled' => true,
],
```
