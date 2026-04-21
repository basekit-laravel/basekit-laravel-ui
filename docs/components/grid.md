# Grid

A responsive grid layout component.

::: tip Live Preview
<a href="../styleguide.html#grids" target="_blank">View in the Styleguide →</a>
:::

## Basic Usage

```blade
<x-basekit-ui::grid cols="3">
    <div>Item 1</div>
    <div>Item 2</div>
    <div>Item 3</div>
</x-basekit-ui::grid>
```

## Props

| Prop         | Type            | Default | Description                                                                   |
| ------------ | --------------- | ------- | ----------------------------------------------------------------------------- |
| `cols`       | `string \| int` | `'12'`  | Number of columns (e.g. `1`–`12`). Generates a `bk-grid--cols-{n}` CSS class. |
| `gap`        | `string`        | `'md'`  | Gap size (`xs`,`sm`,`md`,`lg`,`xl`)                                           |
| `responsive` | `boolean`       | `true`  | Uses auto-fit responsive columns. Set `false` to enforce exact `cols` count.  |

## Column Configurations

```blade
 <x-basekit-ui::grid cols="2" :responsive="false">
    <div>Item 1</div>
    <div>Item 2</div>
    <div>Item 3</div>
    <div>Item 4</div>
</x-basekit-ui::grid>
<x-basekit-ui::grid cols="3" :responsive="false">
    <div>Item 1</div>
    <div>Item 2</div>
    <div>Item 3</div>
    <div>Item 4</div>
</x-basekit-ui::grid>
<x-basekit-ui::grid cols="4" :responsive="false">
    <div>Item 1</div>
    <div>Item 2</div>
    <div>Item 3</div>
    <div>Item 4</div>
</x-basekit-ui::grid>
```

## Responsive Behavior

```blade
<x-basekit-ui::grid cols="3" :responsive="false">
    <div>Column 1</div>
    <div>Column 2</div>
    <div>Column 3</div>
</x-basekit-ui::grid>
```

When `responsive` is `true`, the grid uses `auto-fit` column sizing based on available width, so you may see fewer columns than `cols`.

## Gap Sizes

Supported sizes: `xs`, `sm`, `md`, `lg`, `xl`.

```blade
<x-basekit-ui::grid cols="3" gap="xs">
    <div class="bg-gray-200 p-4">1</div>
    <div class="bg-gray-200 p-4">Extra Small gap</div>
    <div class="bg-gray-200 p-4">3</div>
</x-basekit-ui::grid>
<x-basekit-ui::grid cols="3" gap="sm">
    <div class="bg-gray-200 p-4">1</div>
    <div class="bg-gray-200 p-4">Small gap</div>
    <div class="bg-gray-200 p-4">3</div>
</x-basekit-ui::grid>
<x-basekit-ui::grid cols="3" gap="md">
    <div class="bg-gray-200 p-4">1</div>
    <div class="bg-gray-200 p-4">Medium gap</div>
    <div class="bg-gray-200 p-4">3</div>
</x-basekit-ui::grid>
<x-basekit-ui::grid cols="3" gap="lg">
    <div class="bg-gray-200 p-4">1</div>
    <div class="bg-gray-200 p-4">Large gap</div>
    <div class="bg-gray-200 p-4">3</div>
</x-basekit-ui::grid>
<x-basekit-ui::grid cols="3" gap="xl">
    <div class="bg-gray-200 p-4">1</div>
    <div class="bg-gray-200 p-4">Extra Large gap</div>
    <div class="bg-gray-200 p-4">3</div>
</x-basekit-ui::grid>
```

## Product Grid Example

```blade
@php
    $products = [
        (object) ['name' => 'Product 1', 'price' => 19.99, 'image' => 'https://via.placeholder.com/150'],
        (object) ['name' => 'Product 2', 'price' => 29.99, 'image' => 'https://via.placeholder.com/150'],
        (object) ['name' => 'Product 3', 'price' => 39.99, 'image' => 'https://via.placeholder.com/150'],
        (object) ['name' => 'Product 4', 'price' => 49.99, 'image' => 'https://via.placeholder.com/150'],
    ];
@endphp
<x-basekit-ui::grid cols="4" gap="lg" :responsive="false">
    @foreach($products as $product)
        <x-basekit-ui::card>
            <img src="{{ $product->image }}" alt="{{ $product->name }}">
            <h3>{{ $product->name }}</h3>
            <p>${{ $product->price }}</p>
        </x-basekit-ui::card>
    @endforeach
</x-basekit-ui::grid>
```

## Custom Classes

Override or extend styles with the `class` attribute:

```blade
<x-basekit-ui::grid cols="3" gap="md" class="mt-4">
    <div>Item 1</div>
    <div>Item 2</div>
    <div>Item 3</div>
</x-basekit-ui::grid>
```

## CSS Variables

The grid component does not define dedicated `--grid-*` variables. Gap mappings are:

- `gap="xs"` => fixed `0.25rem`
- `gap="sm" | "md" | "lg" | "xl"` => global spacing tokens below

Override these to affect grid gap sizes package-wide:

```css
:root {
  --spacing-xs: 0.5rem; /* gap="sm" */
  --spacing-md: 1rem; /* gap="md" */
  --spacing-lg: 1.5rem; /* gap="lg" */
  --spacing-xl: 2rem; /* gap="xl" */
}
```

For per-instance overrides, continue using the `gap` prop and utility classes.

## Configuration

```php
'grid' => [
    'enabled' => true,
    'default_cols' => '12',
    'gaps' => ['xs', 'sm', 'md', 'lg', 'xl'],
    'default_gap' => 'md',
],
```
