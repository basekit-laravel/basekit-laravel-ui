# Toast

A notification toast component with auto-dismiss and Alpine.js integration.

::: warning Alpine.js Required
This component requires Alpine.js to be loaded in your layout for toast notifications. See the [installation guide](/guide/installation#alpine-js-required-for-interactive-components) for setup instructions.
:::

::: tip Live Preview
<a href="../styleguide.html#toasts" target="_blank">View in the Styleguide →</a>
:::

## Basic Usage

```blade
<x-basekit-ui::toast variant="success" title="Saved!" message="Your changes have been saved." />
```

## Props

| Prop             | Type     | Default  | Description                                   |
| ---------------- | -------- | -------- | --------------------------------------------- |
| `variant`        | `string` | `'info'` | Toast style variant                           |
| `duration`       | `int`    | `3000`   | Auto-dismiss duration in ms (`0` to disable)  |
| `is-dismissible` | `bool`   | `true`   | Show the manual dismiss (×) button            |
| `title`          | `string` | `null`   | Toast title text                              |
| `message`        | `string` | `null`   | Toast body text (alternative to default slot) |
| `icon`           | `string` | `null`   | Heroicon name (defaults to variant icon)      |

## Slots

| Slot      | Description                                         |
| --------- | --------------------------------------------------- |
| `default` | Toast body content (overrides `message` prop)       |
| `icon`    | Custom icon SVG (overrides `icon` prop and default) |
| `title`   | Custom title content (overrides `title` prop)       |
| `actions` | Action buttons rendered below the message           |

## Variants

Supported variants: `primary`, `secondary`, `success`, `warning`, `danger`, `info`, `ghost`.

```blade
<x-basekit-ui::toast variant="primary" title="Primary update" message="A key announcement for all users." :duration="0" />
<x-basekit-ui::toast variant="secondary" title="Secondary notice" message="Background sync completed successfully." :duration="0" />
<x-basekit-ui::toast variant="info" title="Update available" message="Version 2.0 is ready." :duration="0" />
<x-basekit-ui::toast variant="success" title="Changes saved" message="Your settings have been updated." :duration="0" />
<x-basekit-ui::toast variant="warning" title="Storage almost full" message="You're using 95% of your storage." :duration="0" />
<x-basekit-ui::toast variant="danger" title="Connection failed" message="Unable to reach the server." :duration="0" />
<x-basekit-ui::toast variant="ghost" title="Ghost note" message="This is a lightweight, low-emphasis toast." :duration="0" />
```

## With Icons

### With Heroicon

Pass any Heroicon name via the `icon` prop:

```blade
<x-basekit-ui::toast variant="info" icon="bell" title="New message" message="You have 3 notifications." />
```

### Using Icon Slot

```blade
<x-basekit-ui::toast variant="success" title="Milestone reached" message="You've completed 100 tasks!">
    <x-slot:icon>
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round"
                d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
        </svg>
    </x-slot:icon>
</x-basekit-ui::toast>
```

## With Actions

```blade
<x-basekit-ui::toast variant="warning" title="Connection lost" message="Reconnecting to server..." :duration="0">
    <x-slot:actions>
        <x-basekit-ui::button size="sm" variant="ghost">Retry</x-basekit-ui::button>
    </x-slot:actions>
</x-basekit-ui::toast>
```

## Duration

```blade
{{-- Auto-dismiss after 5 seconds --}}
<x-basekit-ui::toast variant="success" message="Saved!" :duration="5000" />

{{-- Never auto-dismiss --}}
<x-basekit-ui::toast variant="info" message="Please read this carefully." :duration="0" />
```

## Toast Container

For positioning multiple toasts (e.g. flash messages):

```blade
<div class="fixed top-4 right-4 z-50 space-y-2">
    @if(session('success'))
        <x-basekit-ui::toast variant="success" :message="session('success')" />
    @endif

    @if(session('error'))
        <x-basekit-ui::toast variant="danger" :message="session('error')" />
    @endif
</div>
```

## Custom Classes

Override or extend styles with the `class` attribute:

```blade
<x-basekit-ui::toast
    variant="success"
    message="Profile updated"
    class="mt-2"
/>
```

## CSS Variables

Customize toast appearance via CSS variables:

```css
:root {
  /* Toast - Base */
  --toast-radius: var(--radius-md);
  --toast-shadow:
    0 4px 12px -2px rgba(0, 0, 0, 0.08), 0 2px 4px -1px rgba(0, 0, 0, 0.04);

  /* Toast - Variants */
  --toast-bg-primary: var(--color-primary-50);
  --toast-text-primary: var(--color-primary-900);
  --toast-border-primary: var(--color-primary-500);

  --toast-bg-info: var(--color-info-50);
  --toast-text-info: var(--color-info-900);
  --toast-border-info: var(--color-info-500);

  --toast-bg-secondary: var(--color-slate-50);
  --toast-text-secondary: var(--color-slate-900);
  --toast-border-secondary: var(--color-slate-400);

  --toast-bg-success: var(--color-success-50);
  --toast-text-success: var(--color-success-900);
  --toast-border-success: var(--color-success-500);

  --toast-bg-warning: var(--color-warning-50);
  --toast-text-warning: var(--color-warning-900);
  --toast-border-warning: var(--color-warning-500);

  --toast-bg-danger: var(--color-danger-50);
  --toast-text-danger: var(--color-danger-900);
  --toast-border-danger: var(--color-danger-500);

  --toast-bg-ghost: transparent;
  --toast-text-ghost: var(--color-slate-700);
  --toast-border-ghost: transparent;
}
```

## Configuration

Configure defaults in `config/basekit-laravel-ui.php`:

```php
'toast' => [
    'enabled' => true,
    'variants' => ['primary', 'secondary', 'success', 'warning', 'danger', 'info', 'ghost'],
    'default_variant' => 'info',
],
```
