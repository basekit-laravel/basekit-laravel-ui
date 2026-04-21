# List

A styled list component.

::: tip Live Preview
<a href="../styleguide.html#lists" target="_blank">View in the Styleguide →</a>
:::

## Basic Usage

```blade
<x-basekit-ui::list :items="['Item 1', 'Item 2', 'Item 3']" />
```

## Props

| Prop      | Type      | Default                                    | Description                                              |
| --------- | --------- | ------------------------------------------ | -------------------------------------------------------- |
| `variant` | `string`  | `'default'`                                | List style (`default`,`divided`,`bordered`)              |
| `ordered` | `boolean` | `false`                                    | Render ordered list (`ol`)                               |
| `marker`  | `string`  | `'disc'` (`'decimal'` when `ordered=true`) | Marker style (`disc`,`circle`,`square`,`decimal`,`none`) |
| `items`   | `array`   | `[]`                                       | Optional array for auto-generated `<li>` items           |

## Ordered List

```blade
<x-basekit-ui::list :ordered="true" :items="['First step', 'Second step', 'Third step']" />
```

Ordered lists use `decimal` markers by default.

## Markers

Supported markers: `disc`, `circle`, `square`, `decimal`, `none`.

```blade
<x-basekit-ui::list marker="disc" :items="['Item 1', 'Item 2']" />
<x-basekit-ui::list marker="circle" :items="['Item 1', 'Item 2']" />
<x-basekit-ui::list marker="square" :items="['Item 1', 'Item 2']" />
<x-basekit-ui::list marker="decimal" :items="['First step', 'Second step']" />
<x-basekit-ui::list marker="none" :items="['Item 1', 'Item 2']" />
```

## Variants

Supported variants: `default`, `divided`, `bordered`.

```blade
<x-basekit-ui::list variant="divided" :items="['Item 1', 'Item 2', 'Item 3']" />

<x-basekit-ui::list variant="bordered" :items="['Item 1', 'Item 2']" />
```

## Custom Item Markup

Use manual `<li>` elements when you need custom per-item styling or rich content:

```blade
<x-basekit-ui::list>
    <li class="py-2 font-medium">Item 1</li>
    <li class="py-2 text-slate-600">Item 2</li>
    <li class="py-2">
        <x-basekit-ui::badge size="sm">New</x-basekit-ui::badge>
    </li>
</x-basekit-ui::list>
```

## User List Example

```blade
 @php
    $users = [
        (object) [
            'name' => 'John Doe',
            'email' => 'john.doe@example.com',
            'avatar' => 'https://via.placeholder.com/40',
        ],
        (object) [
            'name' => 'Jane Smith',
            'email' => 'jane.smith@example.com',
            'avatar' => 'https://via.placeholder.com/40',
        ],
        (object) [
            'name' => 'Alice Johnson',
            'email' => 'alice.johnson@example.com',
            'avatar' => 'https://via.placeholder.com/40',
        ],
    ];
@endphp

<x-basekit-ui::list variant="divided">
    @foreach ($users as $user)
        <li class="py-3 flex items-center gap-3">
            <x-basekit-ui::avatar :src="$user->avatar" />
            <div>
                <p class="font-medium">{{ $user->name }}</p>
                <p class="text-sm text-gray-600">{{ $user->email }}</p>
            </div>
        </li>
    @endforeach
</x-basekit-ui::list>
```

## Custom Classes

Override or extend styles with the `class` attribute:

```blade
<x-basekit-ui::list variant="divided" class="mt-4">
    <li class="py-3">Item 1</li>
    <li class="py-3">Item 2</li>
</x-basekit-ui::list>
```

## CSS Variables

Customize list appearance via CSS variables:

```css
:root {
  --list-item-padding: 0.75rem 1rem;
  --list-divided-border: var(--color-slate-200);
}
```

## Configuration

```php
'list' => [
    'enabled' => true,
    'variants' => ['default', 'divided', 'bordered'],
    'default_variant' => 'default',
],
```
