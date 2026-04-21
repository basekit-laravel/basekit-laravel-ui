# Modal

A modal dialog component powered by Alpine.js transitions.

::: warning Alpine.js Required
This component requires Alpine.js to be loaded in your layout for modal interactions and animations. See the [installation guide](/guide/installation#alpine-js-required-for-interactive-components) for setup instructions.
:::

::: tip Live Preview
<a href="../styleguide.html#modals" target="_blank">View in the Styleguide →</a>
:::

## Basic Usage

```blade
<x-basekit-ui::modal title="Confirm Action" :is-open="true">
    <p>Are you sure you want to proceed?</p>

    <x-slot:footer>
        <x-basekit-ui::button variant="ghost">Cancel</x-basekit-ui::button>
        <x-basekit-ui::button variant="primary">Confirm</x-basekit-ui::button>
    </x-slot>
</x-basekit-ui::modal>
```

## Opening Modal from a Button

To control the modal from outside (e.g., from a button), use the `show` prop to bind to an external Alpine.js variable:

```blade
<div x-data="{ isModalOpen: false }">
    <x-basekit-ui::button @click="isModalOpen = true">
        Open Modal
    </x-basekit-ui::button>

    <x-basekit-ui::modal show="isModalOpen" title="Confirm Action">
        <p>Are you sure you want to proceed?</p>

        <x-slot:footer>
            <x-basekit-ui::button variant="ghost" @click="isModalOpen = false">
                Cancel
            </x-basekit-ui::button>
            <x-basekit-ui::button variant="primary" @click="isModalOpen = false">
                Confirm
            </x-basekit-ui::button>
        </x-slot:footer>
    </x-basekit-ui::modal>
</div>
```

## Props

| Prop                | Type           | Default               | Description                                                       |
| ------------------- | -------------- | --------------------- | ----------------------------------------------------------------- |
| `size`              | `string`       | config default (`md`) | Modal size (`sm`,`md`,`lg`,`xl`,`full`)                           |
| `title`             | `string\|null` | `null`                | Modal title text                                                  |
| `isCloseOnBackdrop` | `bool`         | `true`                | Close on backdrop click                                           |
| `isCloseButton`     | `bool`         | `true`                | Show header close button                                          |
| `isOpen`            | `bool`         | `false`               | Initial open state for internally controlled modal state          |
| `show`              | `string\|null` | `null`                | External Alpine.js variable name to bind to (e.g., `isModalOpen`) |

Use `isOpen` for a self-contained modal, or `show` when controlling visibility from a parent Alpine.js scope.

## Slots

| Slot      | Description         |
| --------- | ------------------- |
| `default` | Modal body content  |
| `footer`  | Footer actions area |

## Sizes

Supported sizes: `sm`, `md`, `lg`, `xl`, `full`.

```blade
<x-basekit-ui::modal :is-open="true" size="sm" title="Small Modal">Content</x-basekit-ui::modal>
```

## Without Close Button

```blade
<x-basekit-ui::modal :is-open="true" title="Action Required" :is-close-button="false">
    <p>You must choose one of the available actions before continuing.</p>

    <x-slot:footer>
        <x-basekit-ui::button variant="ghost" @click="open = false">Cancel</x-basekit-ui::button>
        <x-basekit-ui::button variant="primary" @click="open = false">Continue</x-basekit-ui::button>
    </x-slot:footer>
</x-basekit-ui::modal>
```

## Without Backdrop Close

```blade
<x-basekit-ui::modal :is-open="true" title="Important Form" :is-close-on-backdrop="false">
    <p>This modal can only be closed using explicit actions.</p>

    <x-slot:footer>
        <x-basekit-ui::button variant="primary" @click="open = false">Close</x-basekit-ui::button>
    </x-slot:footer>
</x-basekit-ui::modal>
```

## Custom Classes

Override or extend styles with the `class` attribute:

```blade
<x-basekit-ui::modal :is-open="true" title="Custom Modal" class="w-1/2">
    <p>This is a custom modal component. You can customize its content and appearance as needed.</p>
</x-basekit-ui::modal>
```

## CSS Variables

Customize modal appearance via CSS variables:

```css
:root {
  --modal-z-index: 50;
  --modal-overlay-bg: rgba(0, 0, 0, 0.5);
  --modal-bg: var(--surface-base);
  --modal-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1);
  --modal-radius: var(--radius-lg);
  --modal-header-border: var(--color-slate-200);
  --modal-footer-border: var(--color-slate-200);
  --modal-close-color: var(--color-slate-400);
  --modal-close-hover-bg: var(--color-slate-100);
  --modal-close-hover-color: var(--color-slate-600);
  --modal-size-sm: 24rem;
  --modal-size-md: 32rem;
  --modal-size-lg: 42rem;
  --modal-size-xl: 56rem;
  --modal-size-full: 90vw;
  --modal-height-full: 90vh;
}
```

## Configuration

Configure defaults in `config/basekit-laravel-ui.php`:

```php
'modal' => [
    'enabled' => true,
    'sizes' => ['sm', 'md', 'lg', 'xl', 'full'],
    'default_size' => 'md',
],
```
