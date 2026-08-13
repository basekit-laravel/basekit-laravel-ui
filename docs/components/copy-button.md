# Copy Button

A button that copies a value to the clipboard via `navigator.clipboard` and
shows transient "copied" feedback (icon swap and optional label swap).

::: tip Live Preview
<a href="../styleguide.html#copybuttons" target="_blank">View in the Styleguide →</a>
:::

## Basic Usage

```blade
<x-basekit-ui::copy-button value="https://example.com/api/v1" label="Copy link" />
```

With slot content instead of a label:

```blade
<x-basekit-ui::copy-button value="abc-123" copied-label="Copied!">
    Copy token
</x-basekit-ui::copy-button>
```

## Props

| Prop           | Type     | Default      | Description                                                                                      |
| -------------- | -------- | ------------ | ------------------------------------------------------------------------------------------------ |
| `value`        | `string` | *(required)* | The text copied to the clipboard on click                                                       |
| `label`        | `string` | `null`       | Fallback label used when no slot content is provided                                             |
| `copied-label` | `string` | `null`       | Text shown while the "copied" feedback is active (falls back to the label/text when omitted)    |
| `duration`     | `int`    | `2000`       | How long (in ms) the "copied" feedback stays visible                                             |
| `icon`         | `string` | `'clipboard'`| Heroicon name for the idle icon                                                                  |
| `copied-icon`  | `string` | `'check'`    | Heroicon name shown while the feedback is active                                                 |
| `variant`      | `string` | `'secondary'`| Button style variant (`primary`,`secondary`,`success`,`warning`,`danger`,`info`,`ghost`)        |
| `size`         | `string` | `'md'`       | Button size (`sm`,`md`,`lg`)                                                                     |

## Variants

```blade
<x-basekit-ui::copy-button value="secret" label="Copy" variant="primary" />
<x-basekit-ui::copy-button value="secret" label="Copy" variant="secondary" />
<x-basekit-ui::copy-button value="secret" label="Copy" variant="ghost" />
```

## Sizes

```blade
<x-basekit-ui::copy-button value="secret" label="Copy" size="sm" />
<x-basekit-ui::copy-button value="secret" label="Copy" size="md" />
<x-basekit-ui::copy-button value="secret" label="Copy" size="lg" />
```

## Custom Icons

```blade
<x-basekit-ui::copy-button
    value="token-123"
    icon="link"
    copied-icon="check-circle"
    label="Copy token"
    copied-label="Copied!"
/>
```

## How It Works

- The value is rendered into a `data-value` attribute and read at runtime via
  `$el.dataset.value`. It is **never** interpolated into an inline JavaScript
  expression, so arbitrary values (including secrets) are safe to pass.
- Clicking calls `navigator.clipboard.writeText(...)`, sets a transient
  `copied` state, and resets it after `duration` milliseconds.
- Accessibility: an `aria-label` reflects the current state, and an
  `aria-live="polite"` visually-hidden region announces the state change to
  screen readers.
- Requires Alpine.js (provided automatically in Livewire apps via
  `@livewireScripts`).

## Configuration

Configure the default variant and size in `config/basekit-laravel-ui.php`:

```php
'copy-button' => [
    'enabled' => true,
    'variants' => ['primary', 'secondary', 'success', 'warning', 'danger', 'info', 'ghost'],
    'sizes' => ['sm', 'md', 'lg'],
    'default_variant' => 'secondary',
    'default_size' => 'md',
],
```
