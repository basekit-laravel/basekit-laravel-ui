# Progress

A progress bar component for showing completion status with optional label and percentage.

::: tip Live Preview
<a href="../styleguide.html#progress" target="_blank">View in the Styleguide →</a>
:::

## Basic Usage

```blade
<x-basekit-ui::progress value="75" />
```

## Props

| Prop               | Type      | Default     | Description                                                                                             |
| ------------------ | --------- | ----------- | ------------------------------------------------------------------------------------------------------- |
| `value`            | `float`   | `0`         | Current progress value                                                                                  |
| `max`              | `float`   | `100`       | Maximum progress value                                                                                  |
| `variant`          | `string`  | `'primary'` | Progress fill color variant (`primary`,`secondary`,`success`,`warning`,`danger`,`info`,`ghost`,`white`) |
| `size`             | `string`  | `'md'`      | Progress bar height (`sm`,`md`,`lg`)                                                                    |
| `isShowPercentage` | `boolean` | `false`     | Display computed percentage value next to label                                                         |
| `dynamicValue`     | `string`  | `null`      | Alpine.js expression for dynamic value (use as `dynamic-value="progress"`)                              |
| `indeterminate`    | `boolean` | `false`     | Show animated indeterminate state for unknown-duration tasks                                            |
| `label`            | `string`  | `null`      | Optional label text                                                                                     |

## Slots

| Slot    | Description                              |
| ------- | ---------------------------------------- |
| `label` | Custom label content (overrides `label`) |

## Variants

Supported variants: `primary`, `secondary`, `success`, `warning`, `danger`, `info`, `ghost`, `white`.

```blade
<x-basekit-ui::progress value="80" variant="primary" label="Primary" :is-show-percentage="true" />
<x-basekit-ui::progress value="70" variant="secondary" label="Secondary" :is-show-percentage="true" />
<x-basekit-ui::progress value="60" variant="success" label="Success" :is-show-percentage="true" />
<x-basekit-ui::progress value="50" variant="warning" label="Warning" :is-show-percentage="true" />
<x-basekit-ui::progress value="40" variant="danger" label="Danger" :is-show-percentage="true" />
<x-basekit-ui::progress value="30" variant="info" label="Info" :is-show-percentage="true" />
<x-basekit-ui::progress value="20" variant="ghost" label="Ghost" :is-show-percentage="true" />
<x-basekit-ui::progress value="10" variant="white" label="White" :is-show-percentage="true" />
```

## Sizes

Supported sizes: `sm`,`md`,`lg`.

```blade
<x-basekit-ui::progress value="50" size="sm" label="Small" :is-show-percentage="true" />
<x-basekit-ui::progress value="50" size="md" label="Medium" :is-show-percentage="true" />
<x-basekit-ui::progress value="50" size="lg" label="Large" :is-show-percentage="true" />
```

## With Label

```blade
<x-basekit-ui::progress
    value="60"
    label="Upload Progress"
/>

<x-basekit-ui::progress value="60" :is-show-percentage="true">
    <x-slot:label>
        Upload Progress
    </x-slot:label>
</x-basekit-ui::progress>
```

## Show Percentage

```blade
<x-basekit-ui::progress
    value="45"
    :is-show-percentage="true"
/>
```

## Dynamic Progress

```blade
<div x-data="{ progress: 0 }" class="space-y-3 max-w-sm">
    <x-basekit-ui::progress
        dynamic-value="progress"
        label="Loading..."
        :is-show-percentage="true"
    />

    <x-basekit-ui::button
        @click="progress = Math.min(progress + 10, 100)"
    >
        Increase Progress
    </x-basekit-ui::button>
</div>
```

## Indeterminate Progress

For unknown duration tasks:

```blade
<x-basekit-ui::progress
    indeterminate
    label="Processing..."
    variant="primary"
/>
```

## File Upload Example

```blade
<div x-data="{
    uploadProgress: 0,
    uploadFile(event) {
        const file = event.target.files[0];
        if (!file) return;

        const formData = new FormData();
        formData.append('file', file);

        const xhr = new XMLHttpRequest();
        xhr.upload.addEventListener('progress', (e) => {
            if (e.lengthComputable) {
                this.uploadProgress = (e.loaded / e.total) * 100;
            }
        });

        xhr.open('POST', '/upload');
        xhr.send(formData);
    }
}" class="space-y-3 max-w-sm">
    <x-basekit-ui::progress
        dynamic-value="uploadProgress"
        label="Uploading file..."
        :is-show-percentage="true"
    />

    <input
        type="file"
        @change="uploadFile($event)"
        class="mt-1"
    >
</div>
```

## Multi-step Process Example

```blade
<div class="space-y-4">
    <x-basekit-ui::progress
        value="100"
        variant="success"
        label="Step 1: Account Details"
    />

    <x-basekit-ui::progress
        value="100"
        variant="success"
        label="Step 2: Verification"
    />

    <x-basekit-ui::progress
        value="60"
        variant="primary"
        label="Step 3: Payment"
    />

    <x-basekit-ui::progress
        value="0"
        label="Step 4: Confirmation"
    />
</div>
```

## Custom Classes

Override or extend styles with the `class` attribute:

```blade
<x-basekit-ui::progress
    value="72"
    variant="success"
    class="mt-2"
/>
```

## CSS Variables

Customize progress appearance via CSS variables:

```css
:root {
  /* Progress - Base */
  --progress-bg: var(--color-slate-200);
  --progress-radius: var(--radius-full);
  --progress-label-color: var(--color-slate-700);
  --progress-indeterminate-duration: 1.2s;

  /* Progress - Sizes */
  --progress-height-sm: 0.375rem;
  --progress-height-md: 0.5rem;
  --progress-height-lg: 0.75rem;

  /* Progress - Variant Colors */
  --progress-bar-primary: var(--color-primary-600);
  --progress-bar-secondary: var(--color-slate-600);
  --progress-bar-success: var(--color-success-600);
  --progress-bar-warning: var(--color-warning-600);
  --progress-bar-danger: var(--color-danger-600);
  --progress-bar-info: var(--color-info-600);
  --progress-bar-ghost: var(--color-slate-400);
  --progress-bar-white: white;
}
```

## Configuration

Configure defaults in `config/basekit-laravel-ui.php`:

```php
'progress' => [
    'enabled' => true,
    'variants' => ['primary', 'secondary', 'success', 'warning', 'danger', 'info', 'ghost', 'white'],
    'sizes' => ['sm', 'md', 'lg'],
    'default_variant' => 'primary',
    'default_size' => 'md',
],
```
