# Spinner

A loading spinner component for indicating loading states.

::: tip Live Preview
<a href="../styleguide.html#spinners" target="_blank">View in the Styleguide →</a>
:::

## Basic Usage

```blade
<x-basekit-ui::spinner />
```

## Props

| Prop      | Type     | Default     | Description                                                                                       |
| --------- | -------- | ----------- | ------------------------------------------------------------------------------------------------- |
| `size`    | `string` | `'md'`      | Spinner size (`xs`,`sm`,`md`,`lg`,`xl`)                                                           |
| `variant` | `string` | `'primary'` | Spinner color variant (`primary`,`secondary`,`success`,`warning`,`danger`,`info`,`ghost`,`white`) |
| `label`   | `string` | `null`      | Accessible label text                                                                             |

## Variants

Supported variants: `primary`, `secondary`, `success`, `warning`, `danger`, `info`, `ghost`, `white` (for dark backgrounds).

```blade
<x-basekit-ui::spinner variant="primary" />
<x-basekit-ui::spinner variant="secondary" />
<x-basekit-ui::spinner variant="success" />
<x-basekit-ui::spinner variant="warning" />
<x-basekit-ui::spinner variant="danger" />
<x-basekit-ui::spinner variant="info" />
<x-basekit-ui::spinner variant="ghost" />
<x-basekit-ui::spinner variant="white" />
```

## Sizes

Supported sizes: `xs`, `sm`, `md`, `lg`, `xl`.

```blade
<x-basekit-ui::spinner size="xs" label="Extra Small" />
<x-basekit-ui::spinner size="sm" label="Small" />
<x-basekit-ui::spinner size="md" label="Medium" />
<x-basekit-ui::spinner size="lg" label="Large" />
<x-basekit-ui::spinner size="xl" label="Extra Large" />
```

## With Label

```blade
<x-basekit-ui::spinner label="Loading data..." />

<x-basekit-ui::spinner>
    Syncing changes...
</x-basekit-ui::spinner>
```

## In Buttons

```blade
<x-basekit-ui::button variant="primary" disabled>
    <x-basekit-ui::spinner size="xs" variant="white" />
    <span>Processing...</span>
</x-basekit-ui::button>
```

## With Alpine.js

```blade
<div x-data="{ loading: false }">
    <x-basekit-ui::button
        @click="loading = true; setTimeout(() => loading = false, 2000)"
        variant="primary"
    >
        <template x-if="loading">
            <x-basekit-ui::spinner size="xs" variant="white" />
        </template>
        <span x-text="loading ? 'Loading...' : 'Load Data'"></span>
    </x-basekit-ui::button>
</div>
```

## Full Page Loader Example

```blade
<div class="fixed inset-0 bg-white/80 flex items-center justify-center z-50">
    <div class="text-center">
        <x-basekit-ui::spinner size="xl" variant="primary" />
        <p class="mt-4 text-gray-600">Loading application...</p>
    </div>
</div>
```

## Card Loading State Example

```blade
<x-basekit-ui::card>
    <div x-data="{ loading: true }" x-init="setTimeout(() => loading = false, 2000)">
        <div x-show="loading" class="flex justify-center py-8">
            <x-basekit-ui::spinner size="lg" />
        </div>

        <div x-show="!loading" x-cloak>
            <h3 class="font-semibold">Data Loaded</h3>
            <p class="mt-2">Your content here...</p>
        </div>
    </div>
</x-basekit-ui::card>
```

## Overlay Spinner Example

```blade
<div class="relative" x-data="{ loading: true }" x-init="setTimeout(() => loading = false, 3000)">
    <div class="p-6">
        <!-- Your content -->
    </div>

    <div
        x-show="loading"
        class="absolute inset-0 bg-white/80 flex items-center justify-center"
    >
        <x-basekit-ui::spinner size="lg" />
    </div>
</div>
```

## Custom Classes

Override or extend styles with the `class` attribute:

```blade
<x-basekit-ui::spinner
    size="md"
    variant="info"
    class="mt-1"
/>
```

## CSS Variables

Customize spinner appearance via CSS variables:

```css
:root {
  /* Spinner - Sizes */
  --spinner-size-xs: 1rem;
  --spinner-size-sm: 1.25rem;
  --spinner-size-md: 1.5rem;
  --spinner-size-lg: 2rem;
  --spinner-size-xl: 2.5rem;

  /* Spinner - Variant Colors */
  --spinner-color-primary: var(--color-primary-600);
  --spinner-color-slate: var(--color-slate-600);
  --spinner-color-success: var(--color-success-600);
  --spinner-color-warning: var(--color-warning-600);
  --spinner-color-danger: var(--color-danger-600);
  --spinner-color-info: var(--color-info-600);
  --spinner-color-ghost: var(--color-slate-400);
  --spinner-color-white: white;
}
```

## Configuration

Configure defaults in `config/basekit-laravel-ui.php`:

```php
'spinner' => [
    'enabled' => true,
    'variants' => ['primary', 'secondary', 'success', 'warning', 'danger', 'info', 'ghost', 'white'],
    'sizes' => ['xs', 'sm', 'md', 'lg', 'xl'],
    'default_variant' => 'primary',
    'default_size' => 'md',
],
```
