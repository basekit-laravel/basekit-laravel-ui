# Container

A responsive container component for page layouts.

::: tip Live Preview
<a href="../styleguide.html#layout" target="_blank">View in the Styleguide →</a>
:::

## Basic Usage

```blade
<x-basekit-ui::container>
    <h1>Page Content</h1>
    <p>Your content here...</p>
</x-basekit-ui::container>
```

## Props

| Prop         | Type      | Default | Description                                      |
| ------------ | --------- | ------- | ------------------------------------------------ |
| `size`       | `string`  | `'lg'`  | Container max-width (`sm`,`md`,`lg`,`xl`,`full`) |
| `isCentered` | `boolean` | `true`  | Add `mx-auto` centering                          |

## Sizes

Supported sizes: `sm`,`md`,`lg`,`xl`,`full`.

The `size` prop maps to a Tailwind max-width class:

| Size   | CSS class    | Max width     |
| ------ | ------------ | ------------- |
| `sm`   | `max-w-sm`   | 24rem (384px) |
| `md`   | `max-w-md`   | 28rem (448px) |
| `lg`   | `max-w-lg`   | 32rem (512px) |
| `xl`   | `max-w-xl`   | 36rem (576px) |
| `full` | `max-w-none` | No limit      |

```blade
<x-basekit-ui::container size="sm">Small container (384px)</x-basekit-ui::container>
<x-basekit-ui::container size="md">Medium container (448px)</x-basekit-ui::container>
<x-basekit-ui::container size="lg">Large container (512px)</x-basekit-ui::container>
<x-basekit-ui::container size="xl">Wide container (576px)</x-basekit-ui::container>
<x-basekit-ui::container size="full">Full-width container</x-basekit-ui::container>
```

## Not Centered

```blade
<x-basekit-ui::container :is-centered="false">
    <p>Container aligned to the left</p>
</x-basekit-ui::container>
```

## Page Layout Example

```blade
<x-basekit-ui::container>
    <header class="py-6">
        <h1 class="text-3xl font-bold">Page Title</h1>
    </header>

    <main class="py-12">
        {{-- Main content --}}
    </main>

    <footer class="py-6 border-t">
        <p class="text-gray-600">Footer content</p>
    </footer>
</x-basekit-ui::container>
```

## Custom Classes

Override default classes using Tailwind Merge:

```blade
<x-basekit-ui::container class="py-8">
    <p>Custom top and bottom spacing.</p>
</x-basekit-ui::container>
```

## CSS Variables

The container component does not define dedicated CSS variables. Customize layout via utility classes on the component or wrapping elements.

## Configuration

```php
'container' => [
    'enabled' => true,
    'sizes' => ['sm', 'md', 'lg', 'xl', 'full'],
    'default_size' => 'lg',
],
```
