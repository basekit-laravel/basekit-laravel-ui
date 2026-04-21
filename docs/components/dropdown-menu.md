# Dropdown Menu

An interactive dropdown menu component powered by Alpine.js.

::: warning Alpine.js Required
This component requires Alpine.js to be loaded in your layout for menu interactions. See the [installation guide](/guide/installation#alpine-js-required-for-interactive-components) for setup instructions.
:::

::: tip Live Preview
<a href="../styleguide.html#dropdowns" target="_blank">View in the Styleguide →</a>
:::

## Primary API: Items Array

The `items` prop is the recommended way to build dropdown menus. Pass an array of menu item objects with `label` and `url` keys for quick, declarative menus:

```blade
<x-basekit-ui::dropdown-menu :items="[
    ['label' => 'Profile', 'url' => '/profile'],
    ['label' => 'Settings', 'url' => '/settings'],
    ['separator' => true],
    ['label' => 'Logout', 'url' => '/logout'],
]" />
```

This is the standard pattern for most use cases. Every item can include icons, separators, nested menus, and disabled states—all defined declaratively in the array.

## Props

| Prop       | Type     | Default         | Description                                                                |
| ---------- | -------- | --------------- | -------------------------------------------------------------------------- |
| `items`    | `array`  | `[]`            | Menu items array (primary API)                                             |
| `position` | `string` | `'bottom-left'` | Dropdown position (`bottom-left`, `bottom-right`, `top-left`, `top-right`) |
| `trigger`  | `string` | `'click'`       | Open behavior (`click`, `hover`)                                           |

## Slots

| Slot          | Description                                              |
| ------------- | -------------------------------------------------------- |
| `trigger`     | Custom trigger element (replaces default button)         |
| `before-menu` | Custom markup rendered before `items` or default content |
| `after-menu`  | Custom markup rendered after `items` or default content  |
| `default`     | Custom menu content (advanced; replaces `items` array)   |

## Item Structure (Items Array)

- `label` (required for links): Menu item text
- `url` (optional): Link URL, defaults to `#`
- `icon` (optional): Heroicon name
- `iconComponent` (optional): Custom Blade component name
- `iconSvg` (optional): Inline SVG markup string
- `disabled` (optional): Boolean disabled state
- `children` (optional): Nested dropdown items array
- `separator` (optional): When `true`, renders a divider line

## Positions

Supported positions: `bottom-left`, `bottom-right`, `top-left`, `top-right`.

```blade
<x-basekit-ui::dropdown-menu
    position="bottom-left"
    :items="[['label' => 'Profile', 'url' => '/profile']]"
/>

<x-basekit-ui::dropdown-menu
    position="bottom-right"
    :items="[['label' => 'Profile', 'url' => '/profile']]"
/>

<x-basekit-ui::dropdown-menu
    position="top-left"
    :items="[['label' => 'Profile', 'url' => '/profile']]"
/>

<x-basekit-ui::dropdown-menu
    position="top-right"
    :items="[['label' => 'Profile', 'url' => '/profile']]"
/>
```

## With Icons

### With Heroicon

Use the `icon` key with the `items` array:

```blade
<x-basekit-ui::dropdown-menu
    :items="[
        ['label' => 'Edit', 'url' => '/edit', 'icon' => 'pencil'],
        ['label' => 'Duplicate', 'url' => '/duplicate', 'icon' => 'document-duplicate'],
        ['separator' => true],
        ['label' => 'Delete', 'url' => '/delete', 'icon' => 'trash'],
    ]"
>
</x-basekit-ui::dropdown-menu>
```

### Using Custom Icon

Use `iconComponent` or `iconSvg` in the `items` array when you want something other than a Heroicon name:

```blade
@php
    $helpIcon = <<<'SVG'
<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
    <circle cx="12" cy="12" r="9"></circle>
    <path d="M9.75 9a2.25 2.25 0 1 1 3.885 1.552c-.59.61-1.135 1.02-1.135 1.948"></path>
    <path d="M12 16h.01"></path>
</svg>
SVG;
@endphp

<x-basekit-ui::dropdown-menu
    :items="[
        ['label' => 'Search', 'url' => '/search', 'iconComponent' => 'heroicon-o-magnifying-glass'],
        ['label' => 'Help', 'url' => '/help', 'iconSvg' => $helpIcon],
    ]"
/>
```

## Before And After Menu Content

```blade
<x-basekit-ui::dropdown-menu
    :items="[
        ['label' => 'Dashboard', 'url' => '/dashboard'],
        ['label' => 'Projects', 'url' => '/projects'],
    ]"
>
    <x-slot:before-menu>
        <div class="px-4 py-2 text-xs font-medium uppercase tracking-wide text-slate-500">
            Quick Access
        </div>
    </x-slot:before-menu>

    <x-slot:after-menu>
        <div class="bk-dropdown__separator"></div>
        <a href="/help" class="bk-dropdown__item">Help Center</a>
    </x-slot:after-menu>
</x-basekit-ui::dropdown-menu>
```

## With Dividers

```blade
<x-basekit-ui::dropdown-menu :items="[
    ['label' => 'New Item', 'url' => '/new'],
    ['label' => 'Import', 'url' => '/import'],
    ['separator' => true],
    ['label' => 'Settings', 'url' => '/settings'],
    ['label' => 'Help', 'url' => '/help'],
    ['separator' => true],
    ['label' => 'Logout', 'url' => '/logout'],
]">
    <x-slot:trigger>
        <x-basekit-ui::button>Actions</x-basekit-ui::button>
    </x-slot:trigger>
</x-basekit-ui::dropdown-menu>
```

## Custom Trigger

```blade
<x-basekit-ui::dropdown-menu>
    <x-slot:trigger>
        <div class="cursor-pointer hover:bg-gray-100 p-2 rounded">
            <x-heroicon-o-ellipsis-horizontal class="w-5 h-5" />
        </div>
    </x-slot:trigger>

    {{-- Menu items as default slot content --}}
</x-basekit-ui::dropdown-menu>
```

## Nested Menus

Nested menus can be generated directly from the `items` array by using a `children` key on any item.

Use this when you want a built-in submenu without writing custom dropdown HTML:

```blade
<x-basekit-ui::dropdown-menu
    :items="[
        ['label' => 'New', 'url' => '/new', 'icon' => 'document-plus'],
        ['label' => 'Open', 'url' => '/open', 'icon' => 'folder-open'],
        [
            'label' => 'Recent',
            'icon' => 'clock',
            'children' => [
                ['label' => 'Project Atlas', 'url' => '/recent/1'],
                ['label' => 'Project Nova', 'url' => '/recent/2'],
            ],
        ],
        ['separator' => true],
        ['label' => 'Save', 'url' => '/save', 'icon' => 'arrow-down-tray'],
    ]"
>
    <x-slot:trigger>
        <x-basekit-ui::button>File</x-basekit-ui::button>
    </x-slot:trigger>
</x-basekit-ui::dropdown-menu>
```

If you need richer submenu layouts, form controls, or mixed content blocks, use the default slot instead.

## User Menu Example

```blade
@php
    $user = (object) [
        'name' => 'John Doe',
        'email' => 'john.doe@example.com',
        'avatar' => '/path/to/avatar.jpg',
    ];
@endphp

<x-basekit-ui::dropdown-menu
    position="bottom-right"
    :items="[
        ['label' => 'Profile', 'url' => '/profile'],
        ['label' => 'Settings', 'url' => '/settings'],
    ]"
>
    <x-slot:trigger>
        <button class="flex items-center gap-2">
            <x-basekit-ui::avatar :src="$user->avatar" />
            <span>{{ $user->name }}</span>
            <x-heroicon-s-chevron-down class="w-4 h-4" />
        </button>
    </x-slot:trigger>

    <x-slot:before-menu>
        <div class="px-4 py-2 border-b">
            <p class="font-medium">{{ $user->name }}</p>
            <p class="text-sm text-gray-500">{{ $user->email }}</p>
        </div>
    </x-slot:before-menu>

    <x-slot:after-menu>
        <div class="bk-dropdown__separator"></div>

        <form method="POST" action="/logout">
            @csrf
            <button type="submit" class="bk-dropdown__item w-full text-left text-red-600">
                Logout
            </button>
        </form>
    </x-slot:after-menu>
</x-basekit-ui::dropdown-menu>
```

## Using the Default Slot (Advanced)

For complex scenarios where the `items` array is insufficient (form controls, mixed content, custom layouts), replace the items entirely using the default slot:

```blade
<x-basekit-ui::dropdown-menu>
    <x-slot:trigger>
        <x-basekit-ui::button icon="adjustments-horizontal">
            Filter
        </x-basekit-ui::button>
    </x-slot:trigger>

    <div class="px-4 py-2">
        <x-basekit-ui::checkbox
            name="active-items"
            label="Active Items"
            :is-checked="true"
        />
    </div>

    <div class="px-4 py-2">
        <x-basekit-ui::checkbox
            name="archived-items"
            label="Archived Items"
        />
    </div>
</x-basekit-ui::dropdown-menu>
```

**Note**: Using the default slot bypasses the `items` array entirely. Use this only when the items array cannot express your menu structure.

## Custom Classes

Override or extend styles with the `class` attribute:

```blade
<x-basekit-ui::dropdown-menu
    class="ml-2"
    :items="[
        ['label' => 'Profile', 'url' => '/profile'],
        ['label' => 'Settings', 'url' => '/settings'],
    ]"
>
    <x-slot:trigger>
        <x-basekit-ui::button>Menu</x-basekit-ui::button>
    </x-slot:trigger>
</x-basekit-ui::dropdown-menu>
```

## CSS Variables

Customize dropdown appearance via CSS variables:

```css
:root {
  --dropdown-bg: var(--surface-base);
  --dropdown-submenu-offset: 0.5rem;
  --dropdown-trigger-bg: var(--surface-base);
  --dropdown-trigger-text: var(--color-slate-700);
  --dropdown-trigger-hover-bg: var(--color-slate-50);
  --dropdown-trigger-hover-border: var(--color-slate-300);
  --dropdown-trigger-focus-ring: var(--color-primary-100);
  --dropdown-border: var(--color-slate-200);
  --dropdown-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
  --dropdown-trigger-shadow: 0 1px 2px 0 rgb(0 0 0 / 0.05);
  --dropdown-item-hover-bg: var(--color-slate-50);
  --dropdown-item-text: var(--color-slate-700);
  --dropdown-item-icon: var(--color-slate-500);
  --dropdown-item-radius: var(--radius-sm);
  --dropdown-radius: var(--radius-md);
}
```

## Configuration

Configure defaults in `config/basekit-laravel-ui.php`:

```php
'dropdown-menu' => [
    'enabled' => true,
    'positions' => ['bottom-left', 'bottom-right', 'top-left', 'top-right'],
    'default_position' => 'bottom-left',
],
```
