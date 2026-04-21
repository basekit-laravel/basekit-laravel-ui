# Breadcrumb

A breadcrumb navigation component for showing page hierarchy.

::: tip Live Preview
<a href="../styleguide.html#breadcrumbs" target="_blank">View in the Styleguide →</a>
:::

## Basic Usage

```blade
<x-basekit-ui::breadcrumb :items="[
    ['label' => 'Home', 'url' => '/'],
    ['label' => 'Products', 'url' => '/products'],
    ['label' => 'T-Shirt'],
]" />
```

## Props

| Prop        | Type     | Default | Description                      |
| ----------- | -------- | ------- | -------------------------------- |
| `items`     | `array`  | `[]`    | Array of breadcrumb items        |
| `separator` | `string` | `null`  | Custom separator icon name       |
| `size`      | `string` | `'md'`  | Breadcrumb size (`sm`,`md`,`lg`) |

## Item Structure

Each item in the `items` array should have:

- `label` (required): Display text
- `url` (optional): Link URL (omit for current page)
- `icon` (optional): Heroicon name

## Sizes

Supported sizes: `sm`, `md`, `lg`.

```blade
@php
    $breadcrumbs = [
        ['label' => 'Home', 'url' => '/'],
        ['label' => 'Products', 'url' => '/products'],
        ['label' => 'T-Shirt'],
    ];
@endphp

<x-basekit-ui::breadcrumb size="sm" :items="$breadcrumbs" />
<x-basekit-ui::breadcrumb size="md" :items="$breadcrumbs" />
<x-basekit-ui::breadcrumb size="lg" :items="$breadcrumbs" />
```

## With Heroicon

Pass a Heroicon name using the `icon` key on each breadcrumb item:

```blade
<x-basekit-ui::breadcrumb :items="[
    ['label' => 'Home', 'url' => '/', 'icon' => 'home'],
    ['label' => 'Settings', 'url' => '/settings', 'icon' => 'cog'],
    ['label' => 'Profile', 'icon' => 'user'],
]" />
```

## Custom Separator

```blade
<x-basekit-ui::breadcrumb
    separator="arrow-right"
    :items="[
        ['label' => 'Home', 'url' => '/'],
        ['label' => 'Products', 'url' => '/products'],
        ['label' => 'T-Shirt'],
    ]"
/>
```

## Responsive Breadcrumbs Example

```blade
@php
    $previousUrl = url()->previous();
    $breadcrumbs = [
        ['label' => 'Home', 'url' => '/'],
        ['label' => 'Settings', 'url' => '/settings'],
        ['label' => 'Profile'],
    ];
@endphp

<nav class="flex items-center gap-2 text-sm">
    {{-- Mobile: Show only current page with back --}}
    <div class="md:hidden">
        <a href="{{ $previousUrl }}" class="flex items-center gap-2 text-gray-600">
            <x-heroicon-o-arrow-left class="w-4 h-4" />
            Back
        </a>
    </div>

    {{-- Desktop: Full breadcrumbs --}}
    <div class="hidden md:block">
        <x-basekit-ui::breadcrumb :items="$breadcrumbs" />
    </div>
</nav>
```

## Schema.org Structured Data Example

```blade
@php
    $breadcrumbs = [
        ['label' => 'Home', 'url' => '/', 'icon' => 'home'],
        ['label' => 'Components', 'url' => '/components', 'icon' => 'cube'],
        ['label' => 'Form Elements', 'icon' => 'pencil-square'],
    ];

    $breadcrumbSchema = [
        '@context' => 'https://schema.org',
        '@type' => 'BreadcrumbList',
        'itemListElement' => collect($breadcrumbs)
            ->values()
            ->map(static function (array $item, int $index): array {
                $listItem = [
                    '@type' => 'ListItem',
                    'position' => $index + 1,
                    'name' => $item['label'],
                ];

                if (isset($item['url'])) {
                    $listItem['item'] = url($item['url']);
                }

                return $listItem;
            })
            ->all(),
    ];
@endphp

<x-basekit-ui::breadcrumb :items="$breadcrumbs" />

<script type="application/ld+json">
    @json($breadcrumbSchema, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT)
</script>
```

## Custom Breadcrumb with Dropdown

::: warning Alpine.js Required
The `dropdown-menu` component requires Alpine.js to be loaded in your layout. See the [installation guide](/guide/installation#alpine-js-required-for-interactive-components) for setup instructions.
:::

```blade
<nav class="flex items-center gap-2 text-sm">
    <a href="/" class="text-gray-600 hover:text-gray-900">Home</a>
    <span class="text-gray-400">/</span>

    <x-basekit-ui::dropdown-menu>
        <x-slot:trigger>
            <button type="button"
                class="text-gray-600 hover:text-gray-900 inline-flex items-center gap-1">
                ... <x-heroicon-s-chevron-down class="w-4 h-4" />
            </button>
        </x-slot:trigger>

        <a href="#" class="bk-dropdown__item">Category 1</a>
        <a href="#" class="bk-dropdown__item">Category 2</a>
    </x-basekit-ui::dropdown-menu>

    <span class="text-gray-400">/</span>
    <span class="text-gray-900 font-medium">Current Page</span>
</nav>
```

## Custom Classes

Override or extend styles with the `class` attribute:

```blade
<x-basekit-ui::breadcrumb
    :items=" [
        ['label' => 'Home', 'url' => '/'],
        ['label' => 'Products', 'url' => '/products'],
        ['label' => 'T-Shirt'],
    ]"
    class="mt-2"
/>
```

## CSS Variables

Customize breadcrumb appearance via CSS variables:

```css
:root {
  --breadcrumb-separator-color: var(--color-slate-400);
  --breadcrumb-link-color: var(--color-primary-600);
  --breadcrumb-current-color: var(--color-slate-700);
}
```

## Configuration

Configure defaults in `config/basekit-laravel-ui.php`:

```php
'breadcrumb' => [
    'enabled' => true,
    'separator' => 'chevron-right',
    'sizes' => ['sm', 'md', 'lg'],
    'default_size' => 'md',
],
```
