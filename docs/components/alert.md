# Alert

Alert banner component for displaying status and feedback messages. Interactive features like dismissible alert require Alpine.js.

::: tip Live Preview
<a href="../styleguide.html#alerts" target="_blank">View in the Styleguide →</a>
:::

## Basic Usage

```blade
<x-basekit-ui::alert variant="info">
    This is an informational message.
</x-basekit-ui::alert>
```

## Props

| Prop             | Type           | Default                 | Description                                                                             |
| ---------------- | -------------- | ----------------------- | --------------------------------------------------------------------------------------- |
| `variant`        | `string`       | config default (`info`) | Alert style variant (`primary`,`secondary`,`success`,`warning`,`danger`,`info`,`ghost`) |
| `is-dismissible` | `boolean`      | `false`                 | Show dismiss button                                                                     |
| `title`          | `string\|null` | `null`                  | Optional alert title                                                                    |
| `icon`           | `string\|null` | `null`                  | Heroicon name override                                                                  |

## Slots

| Slot      | Description                                   |
| --------- | --------------------------------------------- |
| `default` | Alert message body                            |
| `title`   | Custom title content (overrides `title` prop) |
| `icon`    | Custom icon markup (overrides `icon` prop)    |
| `actions` | Action area rendered below the alert message  |

## Variants

Supported variants: `primary`, `secondary`, `success`, `warning`, `danger`, `info`, `ghost`.

```blade
<x-basekit-ui::alert variant="primary" title="Primary">
    This is a primary alert.
</x-basekit-ui::alert>

<x-basekit-ui::alert variant="secondary" title="Secondary">
    This is a secondary alert.
</x-basekit-ui::alert>

<x-basekit-ui::alert variant="success" title="Success">
    Your changes have been saved.
</x-basekit-ui::alert>

<x-basekit-ui::alert variant="warning" title="Warning">
    Please check your input.
</x-basekit-ui::alert>

<x-basekit-ui::alert variant="danger" title="Error">
    Something went wrong.
</x-basekit-ui::alert>

<x-basekit-ui::alert variant="info" title="Info">
    This is an informational message.
</x-basekit-ui::alert>

<x-basekit-ui::alert variant="ghost" title="Ghost">
    This is a ghost alert.
</x-basekit-ui::alert>
```

## With Icons

### With Heroicon

Pass any Heroicon name via the `icon` prop:

```blade
<x-basekit-ui::alert variant="info" icon="information-circle" title="Heads up">
    This alert uses a Heroicon from the icon prop.
</x-basekit-ui::alert>
```

### Using Icon Slot

```blade
<x-basekit-ui::alert variant="success" title="Deployment complete">
    <x-slot:icon>
        <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
            <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z" />
        </svg>
    </x-slot:icon>

    All services are healthy.
</x-basekit-ui::alert>
```

## Dismissible Alert

::: warning Alpine.js Required
The `is-dismissible` feature requires Alpine.js to be loaded in your layout. See the [installation guide](/guide/installation#alpine-js-required-for-interactive-components) for setup instructions.
:::

```blade
<x-basekit-ui::alert variant="info" :is-dismissible="true">
    You can dismiss this alert.
</x-basekit-ui::alert>
```

## Custom Title and Icon Slots

```blade
<x-basekit-ui::alert variant="success">
    <x-slot:title>
        <span class="font-semibold">Deployment complete</span>
    </x-slot:title>

    <x-slot:icon>
        <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
            <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z" />
        </svg>
    </x-slot:icon>

    All services are healthy.
</x-basekit-ui::alert>
```

## With Title and Actions

```blade
<x-basekit-ui::alert variant="warning" title="Please review this">
    There are pending items that need your attention.

    <x-slot:actions>
        <x-basekit-ui::button size="sm" variant="ghost">View details</x-basekit-ui::button>
    </x-slot:actions>
</x-basekit-ui::alert>
```

## Custom Classes

Override or extend styles with the `class` attribute:

```blade
<x-basekit-ui::alert variant="info" class="mt-2">
    Custom spacing applied.
</x-basekit-ui::alert>
```

## CSS Variables

Customize alert appearance via CSS variables:

```css
:root {
  /* Alert - Base */
  --alert-radius: var(--radius-md);

  /* Alert - Variants */
  --alert-bg-primary: var(--color-primary-50);
  --alert-text-primary: var(--color-primary-700);
  --alert-border-primary: var(--color-primary-200);

  --alert-bg-info: var(--color-info-50);
  --alert-text-info: var(--color-info-700);
  --alert-border-info: var(--color-info-200);

  --alert-bg-secondary: var(--color-slate-50);
  --alert-text-secondary: var(--color-slate-700);
  --alert-border-secondary: var(--color-slate-200);

  --alert-bg-success: var(--color-success-50);
  --alert-text-success: var(--color-success-700);
  --alert-border-success: var(--color-success-200);

  --alert-bg-warning: var(--color-warning-50);
  --alert-text-warning: var(--color-warning-800);
  --alert-border-warning: var(--color-warning-200);

  --alert-bg-danger: var(--color-danger-50);
  --alert-text-danger: var(--color-danger-700);
  --alert-border-danger: var(--color-danger-200);

  --alert-bg-ghost: transparent;
  --alert-text-ghost: var(--color-slate-700);
  --alert-border-ghost: transparent;
}
```

## Configuration

Configure defaults in `config/basekit-laravel-ui.php`:

```php
'components' => [
    'alert' => [
        'enabled' => true,
        'variants' => ['primary', 'secondary', 'success', 'warning', 'danger', 'info', 'ghost'],
        'default_variant' => 'info',
    ],
],
```
