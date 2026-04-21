# Tooltip

A tooltip component for contextual information shown on hover/focus, powered by Alpine.js.

::: warning Alpine.js Required
This component requires Alpine.js to be loaded in your layout for hover/focus interactions. See the [installation guide](/guide/installation#alpine-js-required-for-interactive-components) for setup instructions.
:::

::: tip Live Preview
<a href="../styleguide.html#tooltips" target="_blank">View in the Styleguide →</a>
:::

## Basic Usage

```blade
<x-basekit-ui::tooltip content="This is a tooltip">
    Hover over me
</x-basekit-ui::tooltip>
```

## Props

| Prop         | Type     | Default | Description                        |
| ------------ | -------- | ------- | ---------------------------------- |
| `content`    | `string` | `''`    | Tooltip text content.              |
| `position`   | `string` | `'top'` | Tooltip position                   |
| `show-delay` | `int`    | `0`     | Delay in ms before showing tooltip |
| `hide-delay` | `int`    | `0`     | Delay in ms before hiding tooltip  |

## Slots

| Slot      | Description                                       |
| --------- | ------------------------------------------------- |
| `default` | Trigger element                                   |
| `content` | Custom tooltip content (overrides `content` prop) |

## Positions

Supported positions: `top`, `bottom`, `left`, `right`.

```blade
<x-basekit-ui::tooltip content="Top tooltip" position="top">
    Top
</x-basekit-ui::tooltip>

<x-basekit-ui::tooltip content="Right tooltip" position="right">
    Right
</x-basekit-ui::tooltip>

<x-basekit-ui::tooltip content="Bottom tooltip" position="bottom">
    Bottom
</x-basekit-ui::tooltip>

<x-basekit-ui::tooltip content="Left tooltip" position="left">
    Left
</x-basekit-ui::tooltip>
```

## With Icons

Use a Heroicon (or any icon markup) as the trigger content:

```blade
<x-basekit-ui::tooltip content="Help information">
    <x-heroicon-o-question-mark-circle class="w-5 h-5 text-gray-400" />
</x-basekit-ui::tooltip>
```

## Custom Content Slot

```blade
<x-basekit-ui::tooltip position="right">
    <x-basekit-ui::button size="sm" variant="ghost">Custom Content</x-basekit-ui::button>

    <x-slot:content>
        <div class="text-left">
            <strong>Pro Tip:</strong><br>
            Use keyboard shortcuts for faster navigation
        </div>
    </x-slot:content>
</x-basekit-ui::tooltip>
```

## On Buttons

```blade
<x-basekit-ui::tooltip content="Click to save your changes">
    <x-basekit-ui::button variant="primary">
        Save
    </x-basekit-ui::button>
</x-basekit-ui::tooltip>
```

## Delay Configuration

Use component props for show/hide delay (milliseconds):

```blade
<x-basekit-ui::tooltip
    content="Delayed tooltip"
    :show-delay="500"
    :hide-delay="150"
>
    Hover with delay
</x-basekit-ui::tooltip>
```

## Custom Classes

Override or extend styles with the `class` attribute:

```blade
<x-basekit-ui::tooltip content="Helpful tip" class="ml-1">
    <span class="underline decoration-dotted">Hover me</span>
</x-basekit-ui::tooltip>
```

## CSS Variables

Customize tooltip appearance via CSS variables:

```css
:root {
  --tooltip-bg: var(--color-slate-900);
  --tooltip-text: white;
  --tooltip-radius: var(--radius-md);
  --tooltip-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
}
```

## Configuration

Configure defaults in `config/basekit-laravel-ui.php`:

```php
'tooltip' => [
    'enabled' => true,
    'positions' => ['top', 'bottom', 'left', 'right'],
    'default_position' => 'top',
],
```
