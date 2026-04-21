# Accordion

An accordion/collapsible component powered by Alpine.js.

::: warning Alpine.js Required
This component requires Alpine.js to be loaded in your layout for interactive behavior. See the [installation guide](/guide/installation#alpine-js-required-for-interactive-components) for setup instructions.
:::

::: tip Live Preview
<a href="../styleguide.html#accordion" target="_blank">View in the Styleguide →</a>
:::

## Basic Usage

```blade
<x-basekit-ui::accordion :items="[
    [
        'value' => 'item-1',
        'title' => 'What is Laravel?',
        'content' => 'Laravel is a web application framework with expressive, elegant syntax.',
    ],
    [
        'value' => 'item-2',
        'title' => 'What is Tailwind CSS?',
        'content' => 'Tailwind CSS is a utility-first CSS framework.',
    ],
]" />
```

## Props

| Prop         | Type      | Default     | Description                                                |
| ------------ | --------- | ----------- | ---------------------------------------------------------- |
| `items`      | `array`   | `[]`        | Array of accordion items                                   |
| `isMultiple` | `boolean` | `false`     | Allow multiple open items                                  |
| `active`     | `mixed`   | `null`      | Initial active value(s)                                    |
| `variant`    | `string`  | `'default'` | Accordion style (`default`,`bordered`,`flush`,`separated`) |
| `size`       | `string`  | `'md'`      | Accordion size (`sm`,`md`,`lg`)                            |

## Slots

| Slot      | Description                                        |
| --------- | -------------------------------------------------- |
| `default` | Custom accordion markup (overrides `items` output) |

## Item Structure

Each item should include:

- `value` (required): unique key for toggling/open state
- `title` (required): item heading
- `content` (required): item content

## Single Open Item

```blade
<x-basekit-ui::accordion
    :items="[
        [
            'value' => 'item-1',
            'title' => 'What is Laravel?',
            'content' => 'Laravel is a web application framework with expressive, elegant syntax.',
        ],
        [
            'value' => 'item-2',
            'title' => 'What is Tailwind CSS?',
            'content' => 'Tailwind CSS is a utility-first CSS framework.',
        ],
    ]"
    :is-multiple="false"
    active="item-1"
/>
```

## Multiple Open Items

```blade
<x-basekit-ui::accordion
    :items="[
        [
            'value' => 'item-1',
            'title' => 'Shipping',
            'content' => 'Orders ship within 2 business days.',
        ],
        [
            'value' => 'item-2',
            'title' => 'Returns',
            'content' => 'Returns are accepted within 30 days.',
        ],
        [
            'value' => 'item-3',
            'title' => 'Support',
            'content' => 'Support is available via email and live chat.',
        ],
    ]"
    :is-multiple="true"
    :active="['item-1', 'item-3']"
/>
```

## Variants

Supported variants: `default`, `bordered`, `flush`, `separated`.

```blade
<x-basekit-ui::accordion variant="bordered" :items="[
    [
        'value' => 'item-1',
        'title' => 'Bordered accordion',
        'content' => 'This example uses the bordered variant.',
    ],
    [
        'value' => 'item-2',
        'title' => 'Second item',
        'content' => 'Each item keeps the same bordered treatment.',
    ],
]" />

<x-basekit-ui::accordion variant="flush" :items="[
    [
        'value' => 'item-1',
        'title' => 'Flush accordion',
        'content' => 'This example uses the flush variant.',
    ],
    [
        'value' => 'item-2',
        'title' => 'Second item',
        'content' => 'Each item is flush with the next, and the borders are removed.',
    ],
]" />

<x-basekit-ui::accordion variant="separated" :items="[
    [
        'value' => 'item-1',
        'title' => 'Separated accordion',
        'content' => 'This example uses the separated variant.',
    ],
    [
        'value' => 'item-2',
        'title' => 'Second item',
        'content' => 'Each item is separated by a border, but the borders are not shared between items.',
    ],
]" />
```

## Sizes

Supported sizes: `sm`, `md`, `lg`.

```blade
<x-basekit-ui::accordion
    size="sm"
    :items="[
        [
            'value' => 'item-1',
            'title' => 'Compact spacing',
            'content' => 'This example uses the small accordion size.',
        ],
        [
            'value' => 'item-2',
            'title' => 'Second item',
            'content' => 'Use md or lg for roomier layouts.',
        ],
    ]"
 />
```

## With Custom Slot Content

If the `default` slot is provided, it overrides `items` rendering.

```blade
<x-basekit-ui::accordion>
    <div class="bk-accordion__item" x-data="{ open: false }">
        <button class="bk-accordion__trigger" x-on:click="open = !open" type="button">Custom trigger</button>
        <div class="bk-accordion__content" x-show="open">
            <div class="bk-accordion__body">Custom content</div>
        </div>
    </div>
</x-basekit-ui::accordion>
```

## Custom Classes

Override or extend styles with the `class` attribute:

```blade
<x-basekit-ui::accordion
    :items="[
        [
            'value' => 'item-1',
            'title' => 'Custom spacing',
            'content' => 'This accordion has extra top margin from the class attribute.',
        ],
    ]"
    class="mt-4"
/>
```

## CSS Variables

Customize accordion appearance via CSS variables:

```css
:root {
  --accordion-border: var(--color-slate-200);
  --accordion-header-bg: var(--color-slate-50);
  --accordion-hover-bg: var(--color-slate-100);
  --accordion-title-color: var(--color-slate-900);
  --accordion-icon-color: var(--color-slate-500);
  --accordion-flush-hover-color: var(--color-primary-600);
  --accordion-body-color: var(--color-slate-700);
}
```

## Configuration

Configure defaults in `config/basekit-laravel-ui.php`:

```php
'accordion' => [
    'enabled' => true,
    'variants' => ['default', 'bordered', 'flush', 'separated'],
    'sizes' => ['sm', 'md', 'lg'],
    'default_variant' => 'default',
    'default_size' => 'md',
],
```
