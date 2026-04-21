# Description List

A key-value description list component.

::: tip Live Preview
<a href="../styleguide.html#descriptionLists" target="_blank">View in the Styleguide →</a>
:::

## Basic Usage

```blade
<x-basekit-ui::description-list :items="['Name' => 'John Doe', 'Email' => 'john@example.com']" />
```

## Props

| Prop      | Type     | Default     | Description                                                    |
| --------- | -------- | ----------- | -------------------------------------------------------------- |
| `variant` | `string` | `'default'` | Display style (`default`,`horizontal`,`striped`)               |
| `gap`     | `string` | `'md'`      | Spacing between pairs (`sm`,`md`,`lg`)                         |
| `items`   | `array`  | `[]`        | Optional key-value or pair array for auto-rendered `<dt>/<dd>` |

## Items Array

Use `items` for quick key-value rendering:

```blade
<x-basekit-ui::description-list :items="[
    'Name' => 'John Doe',
    'Email' => 'john@example.com',
]" />

<x-basekit-ui::description-list :items="[
    ['term' => 'Plan', 'description' => 'Pro'],
    ['label' => 'Status', 'value' => 'Active'],
]" />
```

For rich content or custom styling per row, use manual `<dt>` / `<dd>` markup in the slot.

## Variants

Supported variants: `default`, `horizontal`, `striped`.

```blade
<x-basekit-ui::description-list
    variant="default"
    :items="['Name' => 'John Doe', 'Email' => 'john@example.com']"
 />

<x-basekit-ui::description-list
    variant="horizontal"
    :items="['Plan' => 'Pro', 'Status' => 'Active']"
 />

<x-basekit-ui::description-list
    variant="striped"
    :items="['Company' => 'Basekit', 'Role' => 'Engineer']"
 />
```

## Sizes

Supported sizes: `sm`,`md`,`lg`.

```blade
<x-basekit-ui::description-list
    gap="sm"
    :items="['CPU' => '4 vCPU', 'Memory' => '8 GB']"
 />

<x-basekit-ui::description-list
    gap="md"
    :items="['CPU' => '4 vCPU', 'Memory' => '8 GB']"
 />

<x-basekit-ui::description-list
    gap="lg"
    :items="['CPU' => '4 vCPU', 'Memory' => '8 GB']"
 />
```

## User Profile Example

```blade
 @php
    $user = (object) [
        'name' => 'John Doe',
        'email' => 'john@example.com',
        'phone' => '123-456-7890',
        'location' => 'New York, USA',
    ];
@endphp

<x-basekit-ui::card>
    <x-slot:header>
        Profile Details
    </x-slot:header>

    <x-basekit-ui::description-list variant="horizontal" gap="md" :items="[
        ['label' => 'Full Name', 'value' => $user->name],
        ['label' => 'Email Address', 'value' => $user->email],
        ['label' => 'Phone Number', 'value' => $user->phone],
        ['label' => 'Location', 'value' => $user->location],
    ]" />
</x-basekit-ui::card>
```

## Custom Classes

Override or extend styles with the `class` attribute:

```blade
<x-basekit-ui::description-list variant="horizontal" class="mt-4">
    <dt>Name</dt>
    <dd>John Doe</dd>
</x-basekit-ui::description-list>
```

## CSS Variables

Customize description list appearance via CSS variables:

```css
:root {
  --dl-term-color: var(--color-slate-700);
  --dl-description-color: var(--color-slate-900);
  --dl-border: var(--color-slate-200);
}
```

## Configuration

```php
'description-list' => [
    'enabled' => true,
    'variants' => ['default', 'horizontal', 'striped'],
    'gaps' => ['sm', 'md', 'lg'],
    'default_variant' => 'default',
    'default_gap' => 'md',
],
```
