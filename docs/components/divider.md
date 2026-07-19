# Divider

A horizontal divider/separator component.

::: tip Live Preview
<a href="../styleguide.html#dividers" target="_blank">View in the Styleguide →</a>
:::

## Basic Usage

```blade
<x-basekit-ui::divider />
```

## Props

| Prop          | Type     | Default        | Description                                     |
| ------------- | -------- | -------------- | ----------------------------------------------- |
| `orientation` | `string` | `'horizontal'` | Divider direction (`horizontal`,`vertical`)     |
| `variant`     | `string` | `'solid'`      | Divider style (`solid`,`dashed`,`dotted`)       |
| `tone`        | `string` | `'default'`    | Divider color preset (`light`,`default`,`dark`) |
| `label`       | `string` | `null`         | Optional horizontal divider label               |

## Simple Divider

```blade
<div>
    <p>Section 1</p>
    <x-basekit-ui::divider />
    <p>Section 2</p>
</div>
```

## With Label

```blade
<x-basekit-ui::divider label="OR" />

<x-basekit-ui::divider>
    <span class="px-2 bg-white text-gray-500">Continue</span>
</x-basekit-ui::divider>
```

## Variants

Supported variants: `solid`, `dashed`, `dotted`.

```blade
<x-basekit-ui::divider variant="solid" />
<x-basekit-ui::divider variant="dashed" />
<x-basekit-ui::divider variant="dotted" />
```

## Tones

Supported tones: `light`, `default`, `dark` (`dark` is the highest contrast).

```blade
<x-basekit-ui::divider tone="light" class="my-3" />
<x-basekit-ui::divider tone="default" class="my-3" />
<x-basekit-ui::divider tone="dark" class="my-3" />
```

## Vertical Divider

```blade
<x-basekit-ui::divider orientation="vertical" class="h-6" />
```

## In Forms Example

```blade
<form>
    <x-basekit-ui::input name="email" label="Email" />
    <x-basekit-ui::input name="password" label="Password" />

    <x-basekit-ui::divider label="OR" />

    <x-basekit-ui::button variant="ghost" class="w-full mt-2">
        Sign in with Google
    </x-basekit-ui::button>
</form>
```

## Custom Classes

Override or extend styles with the `class` attribute:

```blade
<x-basekit-ui::divider class="my-6" />
```

## Custom Label Background

The label background defaults to `--surface-base` so it masks the divider line behind it. When the divider sits inside a container with a different background (e.g. a card), override `--divider-label-bg` to match:

```blade
<div class="bg-gray-50 rounded-lg p-4">
    <x-basekit-ui::divider label="OR" style="--divider-label-bg: var(--color-gray-50);" />
</div>
```

You can also set it globally:

```css
:root {
  --divider-label-bg: var(--surface-base);
}
```

## CSS Variables

Customize divider appearance via CSS variables:

```css
:root {
  --divider-color: var(--color-slate-200);
  --divider-color-light: var(--color-slate-100);
  --divider-color-default: var(--color-slate-200);
  --divider-color-dark: var(--color-slate-400);
  --divider-label-bg: var(--surface-base);
  --divider-label-color: var(--color-slate-500);
}
```

## Dark Mode

Dark mode overrides are applied automatically when a parent element has the `.dark` class:

```css
.dark {
  --divider-color: var(--color-slate-700);
  --divider-color-light: var(--color-slate-800);
  --divider-color-dark: var(--color-slate-500);
  --divider-label-bg: var(--surface-base);
  --divider-label-color: var(--color-slate-400);
}
```

For dark mode token details, see [Theming — Dark Mode](/guide/theming#dark-mode).

## Configuration

```php
'divider' => [
    'enabled' => true,
    'orientations' => ['horizontal', 'vertical'],
    'default_orientation' => 'horizontal',
    'variants' => ['solid', 'dashed', 'dotted'],
    'default_variant' => 'solid',
    'tones' => ['light', 'default', 'dark'],
    'default_tone' => 'default',
],
```
