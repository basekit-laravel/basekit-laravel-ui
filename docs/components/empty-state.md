# Empty State

A component for displaying empty or no-data states with optional icon, title, description, and actions.

::: tip Live Preview
<a href="../styleguide.html#empty" target="_blank">View in the Styleguide →</a>
:::

## Basic Usage

```blade
<x-basekit-ui::empty-state
    title="No results found"
    description="Try adjusting your search criteria"
/>
```

## Props

| Prop          | Type     | Default       | Description                                                                              |
| ------------- | -------- | ------------- | ---------------------------------------------------------------------------------------- |
| `variant`     | `string` | `'secondary'` | Visual style variant (`primary`,`secondary`,`success`,`warning`,`danger`,`info`,`ghost`) |
| `size`        | `string` | `'md'`        | Component size (`sm`,`md`,`lg`)                                                          |
| `title`       | `string` | `null`        | Title text                                                                               |
| `description` | `string` | `null`        | Description text                                                                         |
| `icon`        | `string` | `'inbox'`     | Heroicon name                                                                            |

## Slots

| Slot          | Description                                      |
| ------------- | ------------------------------------------------ |
| `icon`        | Custom icon content (replaces the `icon` prop)   |
| `title`       | Custom title content (replaces the `title` prop) |
| `description` | Custom description (replaces `description` prop) |
| `actions`     | Action buttons or links shown below description  |

## Variants

Supported variants: `primary`, `secondary`, `success`, `warning`, `danger`, `info`, `ghost`.

```blade
<x-basekit-ui::empty-state variant="primary" icon="inbox" title="Primary state" description="Use variants to emphasize intent" />
<x-basekit-ui::empty-state variant="secondary" icon="inbox" title="Secondary state" description="Use variants to emphasize intent" />
<x-basekit-ui::empty-state variant="success" icon="inbox" title="Success state" description="Use variants to emphasize intent" />
<x-basekit-ui::empty-state variant="warning" icon="inbox" title="Warning state" description="Use variants to emphasize intent" />
<x-basekit-ui::empty-state variant="danger" icon="inbox" title="Danger state" description="Use variants to emphasize intent" />
<x-basekit-ui::empty-state variant="info" icon="inbox" title="Info state" description="Use variants to emphasize intent" />
<x-basekit-ui::empty-state variant="ghost" icon="inbox" title="Ghost state" description="Use variants to emphasize intent" />
```

## Sizes

Supported sizes: `sm`,`md`,`lg`.

```blade
<x-basekit-ui::empty-state size="sm" title="Small" description="Small layout" />
<x-basekit-ui::empty-state size="md" title="Medium" description="Default layout" />
<x-basekit-ui::empty-state size="lg" title="Large" description="Large layout" />
```

## With Icons

### With Heroicon

Pass any Heroicon name via the `icon` prop:

```blade
<x-basekit-ui::empty-state
    icon="document-magnifying-glass"
    title="No documents"
    description="Upload or create your first document"
/>
```

### Using Icon Slot

```blade
@php
    $notifications = collect();
@endphp

@if($notifications->isEmpty())
    <x-basekit-ui::empty-state
        title="No notifications"
        description="You're all caught up!"
    >
        <x-slot:icon>
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-10 h-10 text-primary-500">
                <path stroke-linecap="round" stroke-linejoin="round" d="M9.813 15.904 9 18.75l-.813-2.846a4.5 4.5 0 0 0-3.09-3.09L2.25 12l2.846-.813a4.5 4.5 0 0 0 3.09-3.09L9 5.25l.813 2.846a4.5 4.5 0 0 0 3.09 3.09L15.75 12l-2.846.813a4.5 4.5 0 0 0-3.09 3.09ZM18.259 8.715 18 9.75l-.259-1.035a3.375 3.375 0 0 0-2.455-2.456L14.25 6l1.036-.259a3.375 3.375 0 0 0 2.455-2.456L18 2.25l.259 1.035a3.375 3.375 0 0 0 2.456 2.456L21.75 6l-1.035.259a3.375 3.375 0 0 0-2.456 2.456ZM16.894 20.567 16.5 21.75l-.394-1.183a2.25 2.25 0 0 0-1.423-1.423L13.5 18.75l1.183-.394a2.25 2.25 0 0 0 1.423-1.423l.394-1.183.394 1.183a2.25 2.25 0 0 0 1.423 1.423l1.183.394-1.183.394a2.25 2.25 0 0 0-1.423 1.423Z" />
            </svg>
        </x-slot:icon>
    </x-basekit-ui::empty-state>
@endif
```

## With Actions

Use the `actions` slot to add buttons or links below the description:

```blade
@php
    $documents = collect();
@endphp

@if($documents->isEmpty())
    <x-basekit-ui::empty-state
        icon="document-plus"
        title="No documents"
        description="Get started by creating a new document"
    >
        <x-slot:actions>
            <x-basekit-ui::button variant="primary" icon="plus">
                Create Document
            </x-basekit-ui::button>
        </x-slot:actions>
    </x-basekit-ui::empty-state>
@else
    {{-- Display documents --}}
@endif
```

## Multiple Actions

```blade
@php
    $projects = collect();
@endphp

@if($projects->isEmpty())
    <x-basekit-ui::empty-state
        icon="folder-open"
        title="No projects yet"
        description="Create your first project to get started"
    >
        <x-slot:actions>
            <x-basekit-ui::button variant="primary" icon="plus">New Project</x-basekit-ui::button>
            <x-basekit-ui::button variant="ghost" icon="arrow-down-tray">Import</x-basekit-ui::button>
        </x-slot:actions>
    </x-basekit-ui::empty-state>
@else
    {{-- Display projects --}}
@endif
```

## Error State Example

```blade
@php
    $error = new \Exception('Something went wrong. Please try again.');
@endphp

@if($error)
    <x-basekit-ui::empty-state
        variant="danger"
        icon="exclamation-circle"
        title="Failed to load data"
        :description="$error->getMessage()"
    >
        <x-slot:actions>
            <x-basekit-ui::button variant="secondary" @click="reload()">Retry</x-basekit-ui::button>
        </x-slot:actions>
    </x-basekit-ui::empty-state>
@endif
```

## Search Results Example

```blade
@php
    $results = collect();
    $query = 'example search';
@endphp

@if($results->isEmpty())
    <x-basekit-ui::empty-state
        icon="magnifying-glass"
        title="No results found"
        description="We couldn't find anything matching '{{ $query }}'"
    >
        <x-slot:actions>
            <x-basekit-ui::button variant="ghost" @click="clearSearch()">Clear Search</x-basekit-ui::button>
        </x-slot:actions>
    </x-basekit-ui::empty-state>
@else
    {{-- Display results --}}
@endif
```

## Table Empty State Example

```blade
@php
    $users = collect();
@endphp

<table class="w-full">
    <thead>...</thead>
    <tbody>
        @forelse($users as $user)
            <tr>...</tr>
        @empty
            <tr>
                <td colspan="3" class="p-12">
                    <x-basekit-ui::empty-state
                        icon="users"
                        title="No users found"
                        description="Add your first team member"
                    >
                        <x-slot:actions>
                            <x-basekit-ui::button variant="primary" icon="plus">Invite User</x-basekit-ui::button>
                        </x-slot:actions>
                    </x-basekit-ui::empty-state>
                </td>
            </tr>
        @endforelse
    </tbody>
</table>
```

## Custom Classes

Override or extend styles with the `class` attribute:

```blade
<x-basekit-ui::empty-state
    title="No data"
    description="Try adding your first item"
    class="mt-4"
/>
```

## CSS Variables

Customize empty state appearance via CSS variables:

```css
:root {
  /* Empty State - Base */
  --empty-state-icon-color: var(--color-slate-400);
  --empty-state-title-color: var(--color-slate-900);
  --empty-state-description-color: var(--color-slate-600);

  --empty-state-padding-y: var(--empty-state-md-padding-y);
  --empty-state-padding-x: var(--empty-state-md-padding-x);
  --empty-state-icon-gap: var(--empty-state-md-icon-gap);
  --empty-state-title-gap: var(--empty-state-md-title-gap);
  --empty-state-actions-gap: var(--empty-state-md-actions-gap);
  --empty-state-icon-size: var(--empty-state-md-icon-size);
  --empty-state-title-size: var(--empty-state-md-title-size);
  --empty-state-description-size: var(--empty-state-md-description-size);

  /* Empty State - Sizes */
  --empty-state-sm-padding-y: 2rem;
  --empty-state-sm-padding-x: 1rem;
  --empty-state-sm-icon-size: 2.5rem;
  --empty-state-sm-title-size: var(--font-size-md);
  --empty-state-sm-description-size: var(--font-size-sm);
  --empty-state-sm-icon-gap: 0.75rem;
  --empty-state-sm-title-gap: 0.375rem;
  --empty-state-sm-actions-gap: 1rem;

  --empty-state-md-padding-y: 3rem;
  --empty-state-md-padding-x: 1.5rem;
  --empty-state-md-icon-size: 3rem;
  --empty-state-md-title-size: var(--font-size-lg);
  --empty-state-md-description-size: var(--font-size-md);
  --empty-state-md-icon-gap: 1rem;
  --empty-state-md-title-gap: 0.5rem;
  --empty-state-md-actions-gap: 1.5rem;

  --empty-state-lg-padding-y: 4rem;
  --empty-state-lg-padding-x: 2rem;
  --empty-state-lg-icon-size: 4rem;
  --empty-state-lg-title-size: var(--font-size-xl);
  --empty-state-lg-description-size: var(--font-size-lg);
  --empty-state-lg-icon-gap: 1.25rem;
  --empty-state-lg-title-gap: 0.75rem;
  --empty-state-lg-actions-gap: 2rem;

  /* Empty State - Variants */
  --empty-state-primary-icon-color: var(--color-primary-600);
  --empty-state-primary-title-color: var(--color-primary-900);
  --empty-state-primary-description-color: var(--color-primary-700);

  --empty-state-secondary-icon-color: var(--color-slate-600);
  --empty-state-secondary-title-color: var(--color-slate-900);
  --empty-state-secondary-description-color: var(--color-slate-600);

  --empty-state-success-icon-color: var(--color-success-600);
  --empty-state-success-title-color: var(--color-success-900);
  --empty-state-success-description-color: var(--color-success-700);

  --empty-state-warning-icon-color: var(--color-warning-600);
  --empty-state-warning-title-color: var(--color-warning-900);
  --empty-state-warning-description-color: var(--color-warning-700);

  --empty-state-danger-icon-color: var(--color-danger-600);
  --empty-state-danger-title-color: var(--color-danger-900);
  --empty-state-danger-description-color: var(--color-danger-700);

  --empty-state-info-icon-color: var(--color-info-600);
  --empty-state-info-title-color: var(--color-info-900);
  --empty-state-info-description-color: var(--color-info-700);

  --empty-state-ghost-icon-color: var(--color-slate-400);
  --empty-state-ghost-title-color: var(--color-slate-500);
  --empty-state-ghost-description-color: var(--color-slate-400);
}
```

## Configuration

Configure defaults in `config/basekit-laravel-ui.php`:

```php
'empty-state' => [
    'enabled' => true,
    'variants' => ['primary', 'secondary', 'success', 'warning', 'danger', 'info', 'ghost'],
    'default_variant' => 'secondary',
    'sizes' => ['sm', 'md', 'lg'],
    'default_size' => 'md',
],
```
