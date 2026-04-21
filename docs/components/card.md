# Card

A versatile card container component for grouping related content.

::: tip Live Preview
<a href="../styleguide.html#cards" target="_blank">View in the Styleguide →</a>
:::

## Basic Usage

```blade
<x-basekit-ui::card>
    <p>Card content goes here</p>
</x-basekit-ui::card>
```

## Props

| Prop       | Type      | Default     | Description                                |
| ---------- | --------- | ----------- | ------------------------------------------ |
| `variant`  | `string`  | `'default'` | Card style variant (`default`, `bordered`) |
| `isPadded` | `boolean` | `true`      | Apply default body padding                 |

## Slots

| Slot      | Description                  |
| --------- | ---------------------------- |
| `default` | Main card body content       |
| `header`  | Optional card header content |
| `actions` | Optional header actions area |
| `footer`  | Optional card footer content |

## With Header and Actions

```blade
<x-basekit-ui::card>
    <x-slot:header>
        Dashboard
    </x-slot:header>

    <x-slot:actions>
        <x-basekit-ui::button size="sm">Refresh</x-basekit-ui::button>
    </x-slot:actions>

    <p>Card content here</p>
</x-basekit-ui::card>
```

## With Footer

```blade
<x-basekit-ui::card>
    <p>Are you sure you want to proceed?</p>

    <x-slot:footer>
        <div class="flex justify-end gap-2">
            <x-basekit-ui::button variant="ghost">Cancel</x-basekit-ui::button>
            <x-basekit-ui::button variant="primary">Confirm</x-basekit-ui::button>
        </div>
    </x-slot:footer>
</x-basekit-ui::card>
```

## Body Padding

```blade
<x-basekit-ui::card :is-padded="false">No body padding</x-basekit-ui::card>
<x-basekit-ui::card :is-padded="true">Default body padding</x-basekit-ui::card>
```

## Variants

Supported variants: `default`, `bordered`.

```blade
<x-basekit-ui::card variant="default">Default card</x-basekit-ui::card>
<x-basekit-ui::card variant="bordered">Bordered card</x-basekit-ui::card>
```

## Rich Content Card Example

```blade
<x-basekit-ui::card class="overflow-hidden hover:shadow-lg transition-shadow duration-300" :is-padded="false">
    <img src="/product.jpg" alt="Product" class="h-48 w-full object-cover">

    <div class="p-6 space-y-4">
        <div class="space-y-2">
            <h3 class="text-lg font-semibold">Product Name</h3>
            <p class="text-gray-600">Product description goes here.</p>
            <p class="text-2xl font-bold">$99.99</p>
        </div>
    </div>

    <x-slot:footer>
        <x-basekit-ui::button variant="primary">Add to Cart</x-basekit-ui::button>
    </x-slot:footer>
</x-basekit-ui::card>
```

## Grid of Cards Example

```blade
@php
    $items = collect([
        (object) ['title' => 'Card 1', 'content' => 'This is the content of card 1.'],
        (object) ['title' => 'Card 2', 'content' => 'This is the content of card 2.'],
        (object) ['title' => 'Card 3', 'content' => 'This is the content of card 3.'],
    ]);
@endphp
<div class="grid grid-cols-3 gap-6">
    @foreach ($items as $item)
        <x-basekit-ui::card>
            <x-slot:header>
                {{ $item->title }}
            </x-slot:header>

            {{ $item->content }}
        </x-basekit-ui::card>
    @endforeach
</div>
```

## Custom Classes

Override or extend styles with the `class` attribute:

```blade
<x-basekit-ui::card class="mt-4 shadow-lg">
    Card with custom spacing and shadow.
</x-basekit-ui::card>
```

## CSS Variables

Customize card appearance via CSS variables:

```css
:root {
  --card-bg: var(--surface-base);
  --card-border: var(--color-slate-200);
  --card-radius: var(--radius-xl);
  --card-shadow: 0 1px 3px 0 rgb(0 0 0 / 0.1), 0 1px 2px -1px rgb(0 0 0 / 0.1);
  --card-header-padding: 1.25rem 1.5rem;
  --card-body-padding: 1.5rem;
  --card-footer-padding: 1rem 1.5rem;
  --card-footer-bg: var(--color-slate-50);
}
```

## Configuration

Configure in `config/basekit-laravel-ui.php`:

```php
'card' => [
    'enabled' => true,
    'variants' => ['default', 'bordered'],
    'default_variant' => 'default',
],
```
