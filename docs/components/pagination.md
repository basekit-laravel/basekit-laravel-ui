# Pagination

A pagination component for navigating through paginated data.

::: tip Live Preview
<a href="../styleguide.html#pagination" target="_blank">View in the Styleguide →</a>
:::

## Basic Usage

```blade
@php
$currentPage = (int) request('page', 2);
$totalPages = 10;
@endphp

<x-basekit-ui::pagination
    :currentPage="$currentPage"
    :totalPages="$totalPages"
    path="{{ url()->current() }}"
/>
```

## Props

| Prop             | Type     | Default                                  | Description                                             |
| ---------------- | -------- | ---------------------------------------- | ------------------------------------------------------- |
| `currentPage`    | `int`    | `1`                                      | Current page number                                     |
| `totalPages`     | `int`    | `1`                                      | Total number of pages                                   |
| `path`           | `string` | `null`                                   | Base URL path for page links                            |
| `perPage`        | `int`    | `15`                                     | Items per page                                          |
| `total`          | `int`    | `0`                                      | Total number of items                                   |
| `onEachSide`     | `int`    | `2`                                      | Page links shown around current page                    |
| `type`           | `string` | `full`                                   | `full` (numbers) or `simple` (prev/next only)           |
| `previousLabel`  | `string` | `Previous`                               | Previous button label                                   |
| `nextLabel`      | `string` | `Next`                                   | Next button label                                       |
| `showInfo`       | `bool`   | `false`                                  | Show page info text under navigation                    |
| `infoText`       | `string` | `Showing :from to :to of :total results` | Page info template with `:from`, `:to`, `:total` tokens |
| `showPerPage`    | `bool`   | `false`                                  | Show built-in per-page selector                         |
| `perPageLabel`   | `string` | `Per page:`                              | Per-page selector label text                            |
| `perPageName`    | `string` | `per_page`                               | Query parameter key for per-page selection              |
| `perPageOptions` | `int[]`  | `[15, 30, 50]`                           | Available per-page values                               |

## Slots

| Slot       | Description                    |
| ---------- | ------------------------------ |
| `previous` | Custom previous control        |
| `next`     | Custom next control            |
| `info`     | Fully custom page info content |

## Laravel Paginator

```blade
{{-- In your controller --}}
@php
$allUsers = collect(range(1, 150))->map(fn ($id) => (object) [
    'id' => $id,
    'name' => "User {$id}",
]);

$perPage = 15;
$currentPage = (int) request('page', 1);
$pageItems = $allUsers->forPage($currentPage, $perPage)->values();

$users = new \Illuminate\Pagination\LengthAwarePaginator(
    $pageItems,
    $allUsers->count(),
    $perPage,
    $currentPage,
    ['path' => url()->current()]
);
@endphp

{{-- In your view --}}
<x-basekit-ui::pagination
    :currentPage="$users->currentPage()"
    :totalPages="$users->lastPage()"
    path="{{ url()->current() }}"
/>
```

## Simple Pagination

For simple prev/next navigation:

```blade
@php
$currentPage = (int) request('page', 2);
$totalPages = 10;
@endphp

<x-basekit-ui::pagination
    :currentPage="$currentPage"
    :totalPages="$totalPages"
    path="{{ url()->current() }}"
    type="simple"
/>
```

## Custom Previous/Next Labels

```blade
<x-basekit-ui::pagination
    :currentPage="$currentPage"
    :totalPages="$totalPages"
    path="{{ url()->current() }}"
    previousLabel="Back"
    nextLabel="Continue"
/>
```

## With Page Info

```blade
@php
$allUsers = collect(range(1, 72))->map(fn ($id) => (object) [
    'id' => $id,
    'name' => "User {$id}",
]);

$perPage = 12;
$currentPage = (int) request('page', 2);
$pageItems = $allUsers->forPage($currentPage, $perPage)->values();

$users = new \Illuminate\Pagination\LengthAwarePaginator(
    $pageItems,
    $allUsers->count(),
    $perPage,
    $currentPage,
    ['path' => url()->current()]
);
@endphp

<div class="flex items-center justify-between">
    <x-basekit-ui::pagination
        :currentPage="$users->currentPage()"
        :totalPages="$users->lastPage()"
        :perPage="$users->perPage()"
        :total="$users->total()"
        path="{{ url()->current() }}"
        :showInfo="true"
    />
</div>
```

## Custom Page Info Text

Use `infoText` for token-based customization:

```blade
<x-basekit-ui::pagination
    :currentPage="$users->currentPage()"
    :totalPages="$users->lastPage()"
    :perPage="$users->perPage()"
    :total="$users->total()"
    path="{{ url()->current() }}"
    :showInfo="true"
    infoText="Rows :from-:to from :total"
/>
```

Or use the `info` slot for full control:

```blade
<x-basekit-ui::pagination
    :currentPage="$users->currentPage()"
    :totalPages="$users->lastPage()"
    :perPage="$users->perPage()"
    :total="$users->total()"
    path="{{ url()->current() }}"
    :showInfo="true"
>
    <x-slot:info>
        <p class="text-sm text-gray-600">
            Showing {{ $users->firstItem() }} to {{ $users->lastItem() }}
            of {{ $users->total() }} results
        </p>
    </x-slot:info>
</x-basekit-ui::pagination>
```

## Custom Per Page

```blade
@php
$allItems = collect(range(1, 120))->map(fn ($id) => (object) [
    'id' => $id,
    'name' => "Item {$id}",
]);

$perPage = (int) request('per_page', 15);
$currentPage = (int) request('page', 1);
$pageItems = $allItems->forPage($currentPage, $perPage)->values();

$items = new \Illuminate\Pagination\LengthAwarePaginator(
    $pageItems,
    $allItems->count(),
    $perPage,
    $currentPage,
    ['path' => url()->current()]
);
@endphp

<div class="flex items-center justify-between">
    <x-basekit-ui::pagination
        :currentPage="$items->currentPage()"
        :totalPages="$items->lastPage()"
        :perPage="$items->perPage()"
        :total="$items->total()"
        path="{{ url()->current() }}"
        :showInfo="true"
        :showPerPage="true"
        perPageLabel="Per page:"
        perPageName="per_page"
        :perPageOptions="[15, 30, 50]"
    />
</div>
```

## Custom Classes

Override or extend styles with the `class` attribute:

```blade
<x-basekit-ui::pagination
    :currentPage="2"
    :totalPages="10"
    class="mt-4"
/>
```

## CSS Variables

Customize pagination appearance via CSS variables:

```css
:root {
  --pagination-bg: var(--surface-base);
  --pagination-border: var(--color-slate-300);
  --pagination-text: var(--color-slate-700);
  --pagination-hover-bg: var(--color-slate-50);
  --pagination-active-bg: var(--color-primary-600);
  --pagination-active-text: white;
  --pagination-disabled-text: var(--color-slate-400);
}
```

## Configuration

Configure defaults in `config/basekit-laravel-ui.php`:

```php
'pagination' => [
    'enabled' => true,
],
```
