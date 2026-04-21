# Tabs

A tabbed interface component powered by Alpine.js.

::: warning Alpine.js Required
This component requires Alpine.js to be loaded in your layout for interactive tab switching. See the [installation guide](/guide/installation#alpine-js-required-for-interactive-components) for setup instructions.
:::

::: tip Live Preview
<a href="../styleguide.html#tabs" target="_blank">View in the Styleguide →</a>
:::

## Basic Usage

```blade
<x-basekit-ui::tabs :items="[
    ['label' => 'Profile', 'value' => 'profile'],
    ['label' => 'Settings', 'value' => 'settings'],
    ['label' => 'Notifications', 'value' => 'notifications'],
]" active="profile" />
```

## Props

| Prop      | Type     | Default       | Description                |
| --------- | -------- | ------------- | -------------------------- |
| `items`   | `array`  | `[]`          | Array of tab definitions   |
| `active`  | `mixed`  | `null`        | Initially active tab value |
| `variant` | `string` | `'underline'` | Tab style variant          |

## Slots

| Slot      | Description                               |
| --------- | ----------------------------------------- |
| `default` | Custom tab button markup/content fallback |

## Item Structure

Each item should have:

- `value` (required): Unique tab identifier
- `label` (required): Tab display text
- `icon` (optional): Heroicon name
- `iconComponent` (optional): Custom Blade component name (e.g. `custom-icons.search`)
- `iconSvg` (optional): Inline SVG markup string

## Active Tab

```blade
<x-basekit-ui::tabs
    :items="$items = [
        [
            'value' => 'home',
            'label' => 'Home',
            'icon' => 'home',
        ],
        [
            'value' => 'profile',
            'label' => 'Profile',
            'icon' => 'user',
        ],
        [
            'value' => 'settings',
            'label' => 'Settings',
            'icon' => 'cog',
        ],
    ];"
    active="settings"
/>
```

## Variants

Supported variants: `underline`, `pills`, `boxed`.

```blade
@php
    $items = [
        [
            'value' => 'home',
            'label' => 'Home',
            'icon' => 'home',
        ],
        [
            'value' => 'profile',
            'label' => 'Profile',
            'icon' => 'user',
        ],
        [
            'value' => 'settings',
            'label' => 'Settings',
            'icon' => 'cog',
        ],
    ];
@endphp

<x-basekit-ui::tabs variant="pills" :items="$items" />
<x-basekit-ui::tabs variant="underline" :items="$items" />
<x-basekit-ui::tabs variant="boxed" :items="$items" />
```

## With Icons

### With Heroicon

Pass a Heroicon name using the `icon` key in each tab item:

```blade
<x-basekit-ui::tabs :items="[
    ['value' => 'account', 'label' => 'Account', 'icon' => 'user'],
    ['value' => 'security', 'label' => 'Security', 'icon' => 'key'],
    ['value' => 'alerts', 'label' => 'Alerts', 'icon' => 'bell'],
]" active="account" />
```

### Using Custom Icon Sources

Use item-based tabs and pass either `iconComponent` or `iconSvg` per tab item:

```blade
@php
    $homeIconSvg = <<<'SVG'
<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
    <path d="M3 11.5 12 4l9 7.5"></path>
    <path d="M5 10.5V20h14v-9.5"></path>
</svg>
SVG;

    $items = [
        [
            'value' => 'home',
            'label' => 'Home',
            'iconSvg' => $homeIconSvg,
        ],
        [
            'value' => 'search',
            'label' => 'Search',
            'iconComponent' => 'heroicon-o-magnifying-glass',
        ],
    ];
@endphp

<x-basekit-ui::tabs
    variant="pills"
    active="home"
    :items="$items"
/>
```

## With Tab Panels

```blade
<x-basekit-ui::tabs
    :items="[
        ['value' => 'profile', 'label' => 'Profile'],
        ['value' => 'settings', 'label' => 'Settings'],
        ['value' => 'billing', 'label' => 'Billing'],
    ]"
    active="profile"
>
    <div class="mt-4">
        <div x-show="activeTab === 'profile'" x-cloak>
            Profile content here...
        </div>

        <div x-show="activeTab === 'settings'" x-cloak>
            Settings content here...
        </div>

        <div x-show="activeTab === 'billing'" x-cloak>
            Billing content here...
        </div>
    </div>
</x-basekit-ui::tabs>
```

## Custom Markup Fallback

When `items` is empty, custom tab button markup can be rendered via the default slot:

```blade
<x-basekit-ui::tabs>
    <button type="button" class="bk-tabs__tab bk-tabs__tab--active">Overview</button>
    <button type="button" class="bk-tabs__tab bk-tabs__tab--inactive">Reports</button>
    <button type="button" class="bk-tabs__tab bk-tabs__tab--inactive">Billing</button>
</x-basekit-ui::tabs>
```

## Custom Classes

Override or extend styles with the `class` attribute:

```blade
<x-basekit-ui::tabs :items="$items" class="mt-4" />
```

## CSS Variables

Customize tabs appearance via CSS variables:

```css
:root {
  --tabs-border: var(--color-slate-200);
  --tabs-active-border: var(--color-primary-600);
  --tabs-text: var(--color-slate-600);
  --tabs-active-text: var(--color-primary-600);
  --tabs-hover-text: var(--color-slate-900);
  --tabs-pills-radius: var(--radius-lg);
  --tabs-pills-active-bg: var(--color-primary-100);
  --tabs-boxed-bg: var(--color-slate-100);
  --tabs-boxed-radius: var(--radius-lg);
  --tabs-boxed-tab-radius: var(--radius-md);
  --tabs-boxed-active-bg: var(--surface-base);
  --tabs-boxed-active-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.05);
}
```

## Configuration

Configure defaults in `config/basekit-laravel-ui.php`:

```php
'tabs' => [
    'enabled' => true,
    'variants' => ['underline', 'pills', 'boxed'],
    'default_variant' => 'underline',
],
```
