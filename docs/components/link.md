# Link

A styled link component with variant support.

::: tip Live Preview
<a href="../styleguide.html#links" target="_blank">View in the Styleguide →</a>
:::

## Basic Usage

```blade
<x-basekit-ui::link href="/about">About Us</x-basekit-ui::link>
```

## Livewire Navigation

The link component passes additional attributes through to the underlying `<a>` element, so you can use Livewire navigation without a full page reload:

```blade
<x-basekit-ui::link href="/dashboard" wire:navigate>
    Dashboard
</x-basekit-ui::link>
```

You can also use other Livewire link attributes the same way:

```blade
<x-basekit-ui::link href="/projects" wire:navigate.hover>
    Projects
</x-basekit-ui::link>
```

## Props

| Prop         | Type      | Default       | Description                                                                                    |
| ------------ | --------- | ------------- | ---------------------------------------------------------------------------------------------- |
| `href`       | `string`  | `'#'`         | Link URL                                                                                       |
| `variant`    | `string`  | `'secondary'` | Link style variant (`primary`,`secondary`,`success`,`warning`,`danger`,`info`,`ghost`,`muted`) |
| `isExternal` | `boolean` | `false`       | Open in new tab                                                                                |
| `icon`       | `string`  | `null`        | Heroicon name                                                                                  |
| `color`      | `string`  | `null`        | Quick color shortcut. Sets text and hover text simultaneously. |
| `text`       | `string`  | `null`        | Custom text color. |
| `hover-text` | `string`  | `null`        | Custom hover text color. |

## Slots

| Slot       | Description                                  |
| ---------- | -------------------------------------------- |
| `default`  | Link text/content                            |
| `iconSlot` | Custom icon markup (rendered before content) |

## Variants

Supported variants: `primary`, `secondary`, `success`, `warning`, `danger`, `info`, `ghost`, `muted`.

```blade
<x-basekit-ui::link href="/page" variant="primary">Primary Link</x-basekit-ui::link>
<x-basekit-ui::link href="/page" variant="secondary">Secondary Link</x-basekit-ui::link>
<x-basekit-ui::link href="/page" variant="success">Success Link</x-basekit-ui::link>
<x-basekit-ui::link href="/page" variant="warning">Warning Link</x-basekit-ui::link>
<x-basekit-ui::link href="/page" variant="danger">Danger Link</x-basekit-ui::link>
<x-basekit-ui::link href="/page" variant="info">Info Link</x-basekit-ui::link>
<x-basekit-ui::link href="/page" variant="ghost">Ghost Link</x-basekit-ui::link>
<x-basekit-ui::link href="/page" variant="muted">Muted Link</x-basekit-ui::link>
```

## External Links

```blade
<x-basekit-ui::link
    href="https://example.com"
    :is-external="true"
>
    External Site
</x-basekit-ui::link>
```

## With Icons

### With Heroicon

Pass any Heroicon name via the `icon` prop:

```blade
<x-basekit-ui::link href="/download" icon="arrow-down-tray">
    Download
</x-basekit-ui::link>
```

### Using Icon Slot

```blade
<x-basekit-ui::link href="/download">
    <x-slot:iconSlot>
        <x-heroicon-o-arrow-down-tray class="w-4 h-4" />
    </x-slot:iconSlot>
    Download File
</x-basekit-ui::link>
```

## Disabled State

```blade
<x-basekit-ui::link
    href="#"
    class="pointer-events-none opacity-50"
>
    Disabled Link
</x-basekit-ui::link>
```

## Styled as Button

```blade
<x-basekit-ui::link
    href="/signup"
    class="inline-flex items-center px-4 py-2 bg-blue-600 text-white no-underline rounded-lg hover:bg-blue-700"
>
    Get Started
</x-basekit-ui::link>
```

## Navigation Links Example

```blade
<nav class="flex gap-6">
    <x-basekit-ui::link
        href="/home"
        :variant="request()->is('home') ? 'primary' : null"
    >
        Home
    </x-basekit-ui::link>

    <x-basekit-ui::link
        href="/about"
        :variant="request()->is('about') ? 'primary' : null"
    >
        About
    </x-basekit-ui::link>

    <x-basekit-ui::link
        href="/contact"
        :variant="request()->is('contact') ? 'primary' : null"
    >
        Contact
    </x-basekit-ui::link>
</nav>
```

## Footer Links Example

```blade
<footer class="bg-gray-100 p-8">
    <div class="grid grid-cols-4 gap-8">
        <div>
            <h4 class="font-semibold mb-3">Company</h4>
            <div class="space-y-2">
                <x-basekit-ui::link href="/about" variant="muted">About</x-basekit-ui::link>
                <x-basekit-ui::link href="/careers" variant="muted">Careers</x-basekit-ui::link>
                <x-basekit-ui::link href="/press" variant="muted">Press</x-basekit-ui::link>
            </div>
        </div>

        <div>
            <h4 class="font-semibold mb-3">Support</h4>
            <div class="space-y-2">
                <x-basekit-ui::link href="/help" variant="muted">Help Center</x-basekit-ui::link>
                <x-basekit-ui::link href="/contact" variant="muted">Contact</x-basekit-ui::link>
                <x-basekit-ui::link href="/status" variant="muted">Status</x-basekit-ui::link>
            </div>
        </div>
    </div>
</footer>
```

## Custom Classes

Override or extend styles with the `class` attribute:

```blade
<x-basekit-ui::link href="/docs" variant="primary" class="font-semibold">
    Documentation
</x-basekit-ui::link>
```

## Custom Colors

Override the component's default variant colors using the `color` shortcut prop or granular `text` and `hover-text` props.

The `color` prop accepts **Tailwind v4 color names** (e.g., `indigo-500`, `pink-200`, `emerald-700`) or any **raw CSS color value** (hex, rgb, hsl, named colors).

> **Note**: When using Tailwind color names, the component automatically computes a darker hover shade (lightening by 100).

### With Tailwind Colors

```blade
<x-basekit-ui::link href="#" color="indigo-500">Link Text</x-basekit-ui::link>
```

### With Raw CSS Colors

```blade
<x-basekit-ui::link href="#" text="#4F46E5">Link Text</x-basekit-ui::link>
```

### Granular Control

```blade
<x-basekit-ui::link href="#" text="indigo-500" hover-text="indigo-600">Link Text</x-basekit-ui::link>
```

## CSS Variables

Customize link appearance via CSS variables:

```css
:root {
  --link-primary-color: var(--color-primary-600);
  --link-secondary-color: var(--color-slate-700);
  --link-success-color: var(--color-success-600);
  --link-warning-color: var(--color-warning-600);
  --link-danger-color: var(--color-danger-600);
  --link-info-color: var(--color-info-600);
  --link-ghost-color: var(--color-slate-500);
  --link-muted-color: var(--color-slate-600);
}
```

## Dark Mode

Dark mode overrides are applied automatically when a parent element has the `.dark` class:

```css
.dark {
  --link-primary-color: var(--color-primary-400);
  --link-secondary-color: var(--color-slate-200);
  --link-success-color: var(--color-success-400);
  --link-warning-color: var(--color-warning-400);
  --link-danger-color: var(--color-danger-400);
  --link-info-color: var(--color-info-400);
  --link-ghost-color: var(--color-slate-400);
  --link-muted-color: var(--color-slate-400);
}
```

For dark mode token details, see [Theming — Dark Mode](/guide/theming#dark-mode).

## Configuration

Configure defaults in `config/basekit-laravel-ui.php`:

```php
'link' => [
    'enabled' => true,
    'variants' => ['primary', 'secondary', 'success', 'warning', 'danger', 'info', 'ghost', 'muted'],
    'default_variant' => 'secondary',
],
```
