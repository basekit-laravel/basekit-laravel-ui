# Stat

A statistic display component for dashboards.

::: tip Live Preview
<a href="../styleguide.html#stats" target="_blank">View in the Styleguide →</a>
:::

## Basic Usage

```blade
<x-basekit-ui::stat
    label="Total Users"
    value="12,345"
/>
```

## Props

| Prop     | Type     | Default     | Description                             |
| -------- | -------- | ----------- | --------------------------------------- |
| `label`  | `mixed`  | `null`      | Stat label                              |
| `value`  | `mixed`  | `null`      | Stat value                              |
| `change` | `mixed`  | `null`      | Change indicator                        |
| `trend`  | `string` | `'neutral'` | Trend direction (`up`,`down`,`neutral`) |
| `icon`   | `string` | `null`      | Heroicon name                           |

## Slots

| Slot     | Description                                |
| -------- | ------------------------------------------ |
| `label`  | Custom label content (overrides `label`)   |
| `value`  | Custom value content (overrides `value`)   |
| `change` | Custom change content (overrides `change`) |
| `icon`   | Custom icon markup (overrides `icon` prop) |

## With Change Indicator

```blade
<x-basekit-ui::stat
    label="Revenue"
    value="$45,231"
    change="+12.5%"
    trend="up"
/>

<x-basekit-ui::stat
    label="Active Users"
    value="1,234"
    change="+0.1%"
    trend="neutral"
/>

<x-basekit-ui::stat
    label="Churn Rate"
    value="2.3%"
    change="-0.8%"
    trend="down"
/>
```

## With Icons

### With Heroicon

Pass any Heroicon name via the `icon` prop:

```blade
<x-basekit-ui::stat
    label="Active Users"
    value="1,234"
    icon="users"
    trend="up"
    change="+5.4%"
/>
```

### Using Icon Slot

```blade
<x-basekit-ui::stat trend="up">
    <x-slot:icon>
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" d="M3 3h2l.4 2m0 0L7 13h10l2-8H5.4ZM7 13l-1 5h12m-9-1a1 1 0 1 0 0 2 1 1 0 0 0 0-2Zm8 0a1 1 0 1 0 0 2 1 1 0 0 0 0-2Z" />
        </svg>
    </x-slot:icon>

    <x-slot:label>
        Total Sales
    </x-slot:label>

    <x-slot:value>
        $123,456
    </x-slot:value>

    <x-slot:change>
        +12.5% from last month
    </x-slot:change>
</x-basekit-ui::stat>
```

## With Custom Slots

```blade
<x-basekit-ui::stat trend="neutral">
    <x-slot:icon>
        <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-slate-100 text-slate-600">
            24h
        </div>
    </x-slot:icon>

    <x-slot:label>
        API Status
    </x-slot:label>

    <x-slot:value>
        Operational
    </x-slot:value>

    <x-slot:change>
        All systems normal
    </x-slot:change>
</x-basekit-ui::stat>
```

## Dashboard Grid Example

```blade
<x-basekit-ui::grid cols="4" gap="lg" :responsive="false">
    <x-basekit-ui::stat
        label="Total Revenue"
        value="$45,231"
        icon="currency-dollar"
        change="+12.5%"
        trend="up"
    />

    <x-basekit-ui::stat
        label="New Customers"
        value="234"
        icon="user-plus"
        change="+18.2%"
        trend="up"
    />

    <x-basekit-ui::stat
        label="Active Projects"
        value="48"
        icon="briefcase"
        change="-2.4%"
        trend="down"
    />

    <x-basekit-ui::stat
        label="Conversion Rate"
        value="3.2%"
        icon="chart-bar"
        change="+0.8%"
        trend="up"
    />
</x-basekit-ui::grid>
```

## Custom Classes

Override or extend styles with the `class` attribute:

```blade
<x-basekit-ui::stat
    label="Active Users"
    value="1,234"
    class="mt-2"
/>
```

## CSS Variables

Customize stat appearance via CSS variables:

```css
:root {
  --stat-bg: var(--surface-base);
  --stat-label-color: var(--color-slate-600);
  --stat-value-color: var(--color-slate-900);
  --stat-icon-size: 2.5rem;
  --stat-icon-bg: var(--color-primary-100);
  --stat-icon-color: var(--color-primary-600);

  --stat-change-up-color: var(--color-success-600);
  --stat-change-down-color: var(--color-danger-600);
  --stat-change-neutral-color: var(--color-slate-600);
}
```

## Configuration

```php
'stat' => [
    'enabled' => true,
],
```
