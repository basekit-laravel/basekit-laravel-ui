# Table

A flexible table component with three rendering types: `basic`, `dropdown`, and `stacked`.

::: warning Alpine.js Required
This component uses Alpine.js for interactive features (column visibility menu and stacked row expansion). See the [installation guide](/guide/installation#alpine-js-required-for-interactive-components) for setup instructions.
:::

::: tip Live Preview
<a href="../styleguide.html#table" target="_blank">View in the Styleguide →</a>
:::

## Basic Usage

```blade
<x-basekit-ui::table :columns="$columns" :rows="$rows" />
```

## Props

| Prop                 | Type                | Default               | Description                                                      |
| -------------------- | ------------------- | --------------------- | ---------------------------------------------------------------- |
| `type`               | `string`            | `'dropdown'`          | Table type: `basic`, `dropdown`, or `stacked`                    |
| `variant`            | `string`            | `'default'`           | Table style variant (`default`,`bordered`,`striped`,`hoverable`) |
| `size`               | `string`            | `'md'`                | Table size (`sm`,`md`,`lg`)                                      |
| `responsive`         | `bool`              | `true`                | Enable responsive behavior                                       |
| `columns`            | `array<int, array>` | `null`                | Column definitions (required in data-driven mode)                |
| `rows`               | `array<int, array>` | `null`                | Row data (required in data-driven mode)                          |
| `menu-label`         | `string`            | `'Columns'`           | Label for dropdown column visibility menu (`type="dropdown"`)    |
| `primary-column`     | `string\|null`      | `null`                | Primary column key in stacked mode (`type="stacked"`)            |
| `show-column-labels` | `bool`              | `true`                | Show labels in stacked detail rows (`type="stacked"`)            |
| `expand-icon-label`  | `string`            | `'Show details'`      | Accessibility label for stacked expand button (`type="stacked"`) |
| `empty`              | `string\|Htmlable`  | `'No results found.'` | Empty-state content                                              |

## Slots

| Slot      | Description                                              |
| --------- | -------------------------------------------------------- |
| `header`  | Custom table header rows (slot mode with `type="basic"`) |
| `default` | Custom table body rows (slot mode with `type="basic"`)   |
| `footer`  | Custom table footer rows (slot mode with `type="basic"`) |

## Column Schema

Each column entry supports the following keys:

- `key` (required): data key used to read the row value
- `label`: header label (defaults to `key`)
- `show`: responsive visibility token(s): `base`, `xs`, `sm`, `all`, `md+`, `lg+`, `xl+`, `2xl+`
- `align`: cell alignment (`left`, `center`, `right`)
- `class`: classes applied to both header and data cells
- `headerClass`: extra classes for the header cell
- `cellClass`: extra classes for the data cell

## Types

Supported types: `basic`, `dropdown`, `stacked`.

```blade
@php
    $columns = [
        ['key' => 'name', 'label' => 'Name', 'show' => 'base'],
        ['key' => 'title', 'label' => 'Title', 'show' => 'md+'],
        ['key' => 'status', 'label' => 'Status', 'show' => 'base'],
        ['key' => 'role', 'label' => 'Role', 'show' => 'md+'],
    ];

    $rows = [
        ['name' => 'Lindsay Walton', 'title' => 'Designer', 'status' => 'Active', 'role' => 'Member'],
        ['name' => 'Courtney Henry', 'title' => 'Developer', 'status' => 'Away', 'role' => 'Admin'],
    ];
@endphp

<x-basekit-ui::table type="basic" :columns="$columns" :rows="$rows" />
<x-basekit-ui::table type="dropdown" :columns="$columns" :rows="$rows" />
<x-basekit-ui::table type="stacked" :columns="$columns" :rows="$rows" primary-column="name" />
```

`dropdown` and `stacked` differences are most visible on smaller container widths, and require Alpine.js for interactive behavior.

## Variants

Supported variants: `default`, `bordered`, `striped`, `hoverable`.

```blade
@php
    $columns = [
        ['key' => 'name', 'label' => 'Name'],
        ['key' => 'status', 'label' => 'Status'],
    ];

    $rows = [
        ['name' => 'Lindsay Walton', 'status' => 'Active'],
        ['name' => 'Courtney Henry', 'status' => 'Away'],
    ];
@endphp

<x-basekit-ui::table :columns="$columns" :rows="$rows" variant="default" />
<x-basekit-ui::table :columns="$columns" :rows="$rows" variant="bordered" />
<x-basekit-ui::table :columns="$columns" :rows="$rows" variant="striped" />
<x-basekit-ui::table :columns="$columns" :rows="$rows" variant="hoverable" />
```

## Sizes

Supported sizes: `sm`,`md`,`lg`.

```blade
@php
    $columns = [
        ['key' => 'name', 'label' => 'Name'],
        ['key' => 'status', 'label' => 'Status'],
    ];

    $rows = [
        ['name' => 'Lindsay Walton', 'status' => 'Active'],
        ['name' => 'Courtney Henry', 'status' => 'Away'],
    ];
@endphp

<x-basekit-ui::table :columns="$columns" :rows="$rows" size="sm" />
<x-basekit-ui::table :columns="$columns" :rows="$rows" size="md" />
<x-basekit-ui::table :columns="$columns" :rows="$rows" size="lg" />
```

## Dropdown Type

Use `type="dropdown"` for data-driven tables with a column visibility menu.

```blade
@php
    $columns = [
        ['key' => 'name', 'label' => 'Name', 'show' => 'base'],
        ['key' => 'title', 'label' => 'Title', 'show' => 'md+'],
        ['key' => 'status', 'label' => 'Status', 'show' => 'base'],
        ['key' => 'role', 'label' => 'Role', 'show' => 'md+', 'align' => 'right'],
    ];

    $rows = [
        ['name' => 'Lindsay Walton', 'title' => 'Designer', 'status' => 'Active', 'role' => 'Member'],
        ['name' => 'Courtney Henry', 'title' => 'Developer', 'status' => 'Away', 'role' => 'Admin'],
    ];
@endphp

<x-basekit-ui::table
    type="dropdown"
    :columns="$columns"
    :rows="$rows"
    menu-label="Show/Hide Columns"
/>
```

## Stacked Type

Use `type="stacked"` for responsive, expandable detail rows on smaller screens.

```blade
@php
    $columns = [
        ['key' => 'name', 'label' => 'Name', 'show' => 'base'],
        ['key' => 'title', 'label' => 'Title', 'show' => 'md+'],
        ['key' => 'status', 'label' => 'Status', 'show' => 'base'],
        ['key' => 'role', 'label' => 'Role', 'show' => 'md+'],
    ];

    $rows = [
        ['name' => 'Lindsay Walton', 'title' => 'Designer', 'status' => 'Active', 'role' => 'Member'],
        ['name' => 'Courtney Henry', 'title' => 'Developer', 'status' => 'Away', 'role' => 'Admin'],
    ];
@endphp

<x-basekit-ui::table
    type="stacked"
    :columns="$columns"
    :rows="$rows"
    primary-column="name"
    :show-column-labels="true"
    expand-icon-label="View full details"
/>
```

## Basic Type (Slot Mode)

Use `type="basic"` with slots when you need full control over markup.

```blade
@php
    $users = collect([
        (object) ['name' => 'Lindsay Walton', 'email' => 'lindsay@example.com', 'role' => 'Member'],
        (object) ['name' => 'Courtney Henry', 'email' => 'courtney@example.com', 'role' => 'Admin'],
    ]);
@endphp

<x-basekit-ui::table type="basic" variant="striped" size="lg">
    <x-slot:header>
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Role</th>
        </tr>
    </x-slot:header>

    @foreach ($users as $user)
        <tr>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ $user->role }}</td>
        </tr>
    @endforeach

    <x-slot:footer>
        <tr>
            <td colspan="3">Total: {{ $users->count() }} users</td>
        </tr>
    </x-slot:footer>
</x-basekit-ui::table>
```

## HTML Cell Content

Pass `HtmlString` values for rich cell output:

```blade
@php
    $columns = [
        ['key' => 'name', 'label' => 'Name'],
        ['key' => 'status', 'label' => 'Status'],
    ];

    $rows = [
        [
            'name' => 'Lindsay Walton',
            'status' => new \Illuminate\Support\HtmlString('<span class="bk-badge bk-badge--success bk-badge--sm">Active</span>'),
        ],
    ];
@endphp

<x-basekit-ui::table :columns="$columns" :rows="$rows" />
```

## Custom Classes

Override default classes using Tailwind Merge:

```blade
@php
    $columns = [
        ['key' => 'name', 'label' => 'Name'],
        ['key' => 'status', 'label' => 'Status'],
    ];

    $rows = [
        ['name' => 'Lindsay Walton', 'status' => 'Active'],
        ['name' => 'Courtney Henry', 'status' => 'Away'],
    ];
@endphp

<x-basekit-ui::table :columns="$columns" :rows="$rows" class="mt-4" />
```

## CSS Variables

Customize table appearance via CSS variables:

```css
:root {
  --table-bg: var(--surface-base);
  --table-border: var(--color-slate-200);
  --table-header-bg: var(--color-slate-50);
  --table-header-text: var(--color-slate-700);
  --table-row-hover-bg: var(--color-slate-50);
  --table-stripe-bg: var(--color-slate-50);
  --table-stack-radius: var(--radius-md);
  --table-stack-detail-bg: var(--color-slate-50);
  --table-menu-bg: var(--table-bg);
  --table-menu-border: var(--table-border);
  --table-menu-item-hover-bg: var(--table-row-hover-bg);
  --table-menu-shadow: 0 10px 20px rgb(15 23 42 / 0.08);
}
```

## Configuration

Configure table defaults in `config/basekit-laravel-ui.php`:

```php
'table' => [
    'enabled' => true,
    'variants' => ['default', 'bordered', 'striped', 'hoverable'],
    'sizes' => ['sm', 'md', 'lg'],
    'default_variant' => 'default',
    'default_size' => 'md',
],
```
