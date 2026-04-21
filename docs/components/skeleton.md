# Skeleton

A skeleton loader component for placeholder content during loading.

::: tip Live Preview
<a href="../styleguide.html#skeletons" target="_blank">View in the Styleguide →</a>
:::

## Basic Usage

```blade
<x-basekit-ui::skeleton />
```

## Props

| Prop      | Type     | Default  | Description                                  |
| --------- | -------- | -------- | -------------------------------------------- |
| `variant` | `string` | `'text'` | Skeleton type (`text`,`circle`,`rect`)       |
| `rounded` | `string` | `'md'`   | Border radius (`none`,`sm`,`md`,`lg`,`full`) |
| `width`   | `string` | `'100%'` | Skeleton width                               |
| `height`  | `string` | `null`   | Skeleton height                              |

## Variants

Supported variants: `text`, `circle`, `rect`.

```blade
<x-basekit-ui::skeleton variant="text" width="120px" height="20px" />
<x-basekit-ui::skeleton variant="circle" width="48px" height="48px" />
<x-basekit-ui::skeleton variant="rect" width="120px" height="40px" />
```

## Sizes

Supported sizes: `sm`,`md`,`lg`.

```blade
<x-basekit-ui::skeleton width="120px" height="12px" class="mb-2" style="font-size:0.75rem" />
<x-basekit-ui::skeleton width="120px" height="16px" class="mb-2" style="font-size:1rem" />
<x-basekit-ui::skeleton width="120px" height="24px" class="mb-2" style="font-size:1.25rem" />
```

## Rounded Corners

Supported types: `none`, `sm`, `md`, `lg`, `full`.

```blade
<x-basekit-ui::skeleton rounded="none" width="80px" height="16px" />
<x-basekit-ui::skeleton rounded="sm" width="80px" height="24px" />
<x-basekit-ui::skeleton rounded="md" width="80px" height="32px" />
<x-basekit-ui::skeleton rounded="lg" width="80px" height="40px" />
<x-basekit-ui::skeleton rounded="full" width="48px" height="48px" /> <!-- Circle -->
```

## Pulse Animation

The skeleton includes a default pulse animation. Customize with CSS:

```blade
<x-basekit-ui::skeleton class="animate-pulse" />
```

## Card Skeleton Example

```blade
<x-basekit-ui::card>
    <div class="flex items-start gap-4">
        <x-basekit-ui::skeleton
            variant="circle"
            width="64px"
            height="64px"
        />

        <div class="flex-1 space-y-3">
            <x-basekit-ui::skeleton width="40%" height="24px" />
            <x-basekit-ui::skeleton width="100%" />
            <x-basekit-ui::skeleton width="90%" />
            <x-basekit-ui::skeleton width="60%" />
        </div>
    </div>
</x-basekit-ui::card>
```

## List Skeleton Example

```blade
<div class="space-y-4">
    @foreach(range(1, 3) as $i)
        <div class="flex items-center gap-3">
            <x-basekit-ui::skeleton
                variant="circle"
                width="40px"
                height="40px"
            />
            <div class="flex-1 space-y-2">
                <x-basekit-ui::skeleton width="30%" />
                <x-basekit-ui::skeleton width="70%" />
            </div>
        </div>
    @endforeach
</div>
```

## Product Grid Skeleton Example

```blade
<div class="grid grid-cols-3 gap-6">
    @foreach(range(1, 6) as $i)
        <div class="space-y-3">
            <x-basekit-ui::skeleton
                variant="rect"
                height="200px"
                rounded="lg"
            />
            <x-basekit-ui::skeleton width="60%" />
            <x-basekit-ui::skeleton width="40%" />
        </div>
    @endforeach
</div>
```

## Table Skeleton Example

```blade
<table class="w-full border-separate border-spacing-y-2">
    <thead>
        <tr>
            <th class="px-3 py-2"><x-basekit-ui::skeleton width="100px" /></th>
            <th class="px-3 py-2"><x-basekit-ui::skeleton width="150px" /></th>
            <th class="px-3 py-2"><x-basekit-ui::skeleton width="120px" /></th>
        </tr>
    </thead>
    <tbody>
        @foreach(range(1, 5) as $i)
            <tr class="bg-white">
                <td class="px-3 py-2"><x-basekit-ui::skeleton /></td>
                <td class="px-3 py-2"><x-basekit-ui::skeleton /></td>
                <td class="px-3 py-2"><x-basekit-ui::skeleton /></td>
            </tr>
        @endforeach
    </tbody>
</table>
```

## Form Skeleton Example

```blade
<div class="space-y-6">
    <div>
        <x-basekit-ui::skeleton width="120px" height="20px" class="mb-2" />
        <x-basekit-ui::skeleton height="40px" rounded="md" />
    </div>

    <div>
        <x-basekit-ui::skeleton width="100px" height="20px" class="mb-2" />
        <x-basekit-ui::skeleton height="40px" rounded="md" />
    </div>

    <div>
        <x-basekit-ui::skeleton width="80px" height="20px" class="mb-2" />
        <x-basekit-ui::skeleton height="100px" rounded="md" />
    </div>

    <x-basekit-ui::skeleton width="120px" height="40px" rounded="md" />
</div>
```

## Custom Classes

Override or extend styles with the `class` attribute:

```blade
<x-basekit-ui::skeleton
    variant="text"
    class="mt-2"
/>
```

## CSS Variables

Customize skeleton appearance via CSS variables:

```css
:root {
  /* Skeleton - Base */
  --skeleton-bg: var(--color-slate-200);
  --skeleton-radius: var(--radius-md);

  /* Skeleton - Line Heights */
  --skeleton-height-xs: 0.5rem;
  --skeleton-height-sm: 0.75rem;
  --skeleton-height-md: 1rem;
  --skeleton-height-lg: 1.25rem;
  --skeleton-height-xl: 1.5rem;

  /* Skeleton - Circle Sizes */
  --skeleton-circle-xs: 1.5rem;
  --skeleton-circle-sm: 2rem;
  --skeleton-circle-md: 2.5rem;
  --skeleton-circle-lg: 3rem;
  --skeleton-circle-xl: 3.5rem;
}
```

## Configuration

Configure defaults in `config/basekit-laravel-ui.php`:

```php
'skeleton' => [
    'enabled' => true,
    'variants' => ['text', 'circle', 'rect'],
    'rounded' => ['none', 'sm', 'md', 'lg', 'full'],
    'default_variant' => 'text',
    'default_rounded' => 'md',
],
```
