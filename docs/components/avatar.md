# Avatar

An avatar component for displaying user profile images.

::: tip Live Preview
<a href="../styleguide.html#avatars" target="_blank">View in the Styleguide →</a>
:::

## Basic Usage

```blade
<x-basekit-ui::avatar src="/user.jpg" />
```

## Props

| Prop       | Type     | Default   | Description                                            |
| ---------- | -------- | --------- | ------------------------------------------------------ |
| `src`      | `string` | `null`    | Image source URL                                       |
| `alt`      | `string` | `''`      | Alt text for image                                     |
| `size`     | `string` | `'md'`    | Avatar size (`sm`,`md`,`lg`,`xl`)                      |
| `shape`    | `string` | `'round'` | Avatar shape (`round`,`soft`,`square`)                 |
| `variant`  | `string` | `null`    | Alias for `shape` (`round`,`soft`,`square`)            |
| `status`   | `string` | `null`    | Optional status dot (`online`,`away`,`busy`,`offline`) |
| `initials` | `string` | `null`    | Text fallback when image fails                         |

## Slots

| Slot       | Description                                          |
| ---------- | ---------------------------------------------------- |
| `default`  | Custom avatar content when no image is provided      |
| `fallback` | Custom fallback content when the image fails to load |

## Sizes

Supported sizes: `sm`, `md`, `lg`, `xl`.

```blade
<x-basekit-ui::avatar src="/user.jpg" size="sm" />
<x-basekit-ui::avatar src="/user.jpg" size="md" />
<x-basekit-ui::avatar src="/user.jpg" size="lg" />
<x-basekit-ui::avatar src="/user.jpg" size="xl" />
```

## With Initials

```blade
<x-basekit-ui::avatar initials="JD" />
```

## With Fallback Slot

```blade
<x-basekit-ui::avatar src="/user.jpg" alt="Jane Doe">
    <x-slot:fallback>
        JD
    </x-slot:fallback>
</x-basekit-ui::avatar>
```

## Shape Modifiers

Avatar shape can be controlled with the dedicated `shape` prop.
Supported variants: `round`, `soft`, `square`.

```blade
<x-basekit-ui::avatar src="/user.jpg" shape="round" />
<x-basekit-ui::avatar initials="JD" shape="soft" class="bg-indigo-100 text-indigo-700" />
<x-basekit-ui::avatar initials="JD" shape="square" class="bg-amber-100 text-amber-700" />
```

You can also use `variant` as an alias:

```blade
<x-basekit-ui::avatar initials="JD" variant="soft" />
```

## With Status Indicator

```blade
<x-basekit-ui::avatar src="/user.jpg" size="lg" status="online" />
<x-basekit-ui::avatar initials="JD" status="away" />
<x-basekit-ui::avatar initials="JD" status="busy" />
<x-basekit-ui::avatar initials="JD" status="offline" />
```

## Avatar Group Example

```blade
<div class="flex -space-x-2">
    <x-basekit-ui::avatar src="/user1.jpg" class="ring-2 ring-white" />
    <x-basekit-ui::avatar src="/user2.jpg" class="ring-2 ring-white" />
    <x-basekit-ui::avatar src="/user3.jpg" class="ring-2 ring-white" />
    <div class="w-10 h-10 rounded-full bg-gray-300 flex items-center justify-center text-sm font-medium ring-2 ring-white">
        +5
    </div>
</div>
```

## Avatar With User Info Example

```blade
<div class="flex items-center gap-3">
    <x-basekit-ui::avatar src="/user.jpg" />
    <div>
        <p class="font-medium">John Doe</p>
        <p class="text-sm text-gray-600">john@example.com</p>
    </div>
</div>
```

## Custom Classes

Override default classes using Tailwind Merge:

```blade
<x-basekit-ui::avatar
    initials="JD"
    class="ring-2 ring-indigo-200 bg-indigo-50 text-indigo-700"
/>
```

## CSS Variables

Customize avatar appearance via CSS variables:

```css
:root {
  --avatar-bg: var(--color-slate-200);
  --avatar-text: var(--color-slate-600);
  --avatar-ring: 2px solid white;

  --avatar-size-sm: 2rem;
  --avatar-size-md: 2.5rem;
  --avatar-size-lg: 3rem;
  --avatar-size-xl: 3.5rem;

  --avatar-font-sm: var(--font-size-xs);
  --avatar-font-md: var(--font-size-sm);
  --avatar-font-lg: var(--font-size-sm);
  --avatar-font-xl: var(--font-size-md);

  --avatar-status-size: 0.625rem;
  --avatar-status-border: 1px solid white;
  --avatar-status-offset: 0;
  --avatar-status-online: var(--color-success-500);
  --avatar-status-away: var(--color-warning-500);
  --avatar-status-busy: var(--color-danger-500);
  --avatar-status-offline: var(--color-slate-400);
}
```

## Configuration

```php
'avatar' => [
    'enabled' => true,
    'sizes' => ['sm', 'md', 'lg', 'xl'],
    'default_size' => 'md',
    'shapes' => ['round', 'soft', 'square'],
    'default_shape' => 'round',
    'statuses' => ['online', 'away', 'busy', 'offline'],
],
```
