# Theme Variables

Emits the runtime CSS custom properties for branded theme slots.

The compiled theme CSS ships with default palettes (see [Theming](/guide/theming)).
To let a single branding setting drive every component, render this component in
the page head with a map of semantic slot names to palette names. It renders a
`<style>` block of `--color-{slot}-{shade}` variables that override the compiled
defaults.

## Basic Usage

```blade
<x-basekit-ui::theme-variables :colors="[
    'primary' => 'indigo',
    'secondary' => 'sky',
    'success' => 'green',
    'warning' => 'amber',
    'danger' => 'red',
    'info' => 'blue',
]" />
```

Rendered output (abridged):

```html
<style>
    :root {
        --color-primary-50: oklch(0.962 0.018 272.314);
        --color-primary-100: oklch(0.927 0.032 272.788);
        --color-primary-500: oklch(0.585 0.233 277.117);
        /* … */
    }
</style>
```

## Props

| Prop       | Type     | Default   | Description                                     |
| ---------- | -------- | --------- | ----------------------------------------------- |
| `colors`   | `array`  | `[]`      | Slot => palette name or explicit shade map      |
| `selector` | `string` | `':root'` | CSS selector that scopes the variables          |

## Palette Names

The package bundles the following palettes (Tailwind-compatible shades 50–950):

`slate`, `gray`, `zinc`, `neutral`, `stone`, `red`, `orange`, `amber`,
`yellow`, `lime`, `green`, `emerald`, `teal`, `cyan`, `sky`, `blue`, `indigo`,
`violet`, `purple`, `fuchsia`, `pink`, `rose`, `mauve`, `olive`, `mist`,
`taupe`.

Unknown palette names fall back to `indigo`.

## Explicit Shade Maps

Pass an array of shade => value pairs for full control:

```blade
<x-basekit-ui::theme-variables :colors="[
    'accent' => [500 => '#6366f1', 600 => '#4f46e5'],
]" />
```

## Scoping

Change the `selector` to scope variables to a subtree (e.g. a demo surface):

```blade
<x-basekit-ui::theme-variables selector=".demo" :colors="['primary' => 'violet']" />
```

## PHP API

`ColorVariables::variablesFor()` builds the variable map without rendering:

```php
use BasekitLaravel\BasekitLaravelUi\View\Components\Theme\ColorVariables;

$variables = ColorVariables::variablesFor(['primary' => 'indigo']);
// ['--color-primary-50' => '…', '--color-primary-500' => '…', …]
```

`ThemeColor::palette()` resolves a single palette, and `ThemeColor::names()`
lists every registered palette name.

## Configuration

Configure in `config/basekit-laravel-ui.php`:

```php
'theme-variables' => [
    'enabled' => true,
],
```
