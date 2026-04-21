# Stack

A vertical or horizontal stack layout component.

::: tip Live Preview
<a href="../styleguide.html#stacks" target="_blank">View in the Styleguide →</a>
:::

## Basic Usage

```blade
<x-basekit-ui::stack>
    <div>Item 1</div>
    <div>Item 2</div>
    <div>Item 3</div>
</x-basekit-ui::stack>
```

## Props

| Prop        | Type     | Default      | Description                                         |
| ----------- | -------- | ------------ | --------------------------------------------------- |
| `direction` | `string` | `'vertical'` | Stack direction (`vertical`,`horizontal`)           |
| `spacing`   | `string` | `'md'`       | Gap between items (`xs`,`sm`,`md`,`lg`,`xl`)        |
| `align`     | `string` | `'stretch'`  | Alignment (`start`,`center`,`end`,`stretch`)        |
| `justify`   | `string` | `'start'`    | Justify (`start`,`center`,`end`,`between`,`around`) |

## Directions

Supported directions: `vertical`, `horizontal`.

```blade
<x-basekit-ui::stack direction="horizontal">
    <div>Item 1</div>
    <div>Item 2</div>
</x-basekit-ui::stack>
```

## Gap Sizes

Supported sizes: `xs`, `sm`, `md`, `lg`, `xl`.

```blade
<x-basekit-ui::stack spacing="lg">
    <div>Item 1</div>
    <div>Item 2</div>
</x-basekit-ui::stack>
```

## Alignment and Justification

Align: `start`, `center`, `end`, `stretch`.

Justify: `start`, `center`, `end`, `between`, `around`.

```blade
<x-basekit-ui::stack direction="horizontal" align="center" justify="between">
    <span>Left</span>
    <span>Right</span>
</x-basekit-ui::stack>
```

## Practical Example

A user row with name/email on the left and a status badge on the right:

```blade
<x-basekit-ui::stack direction="horizontal" spacing="md" align="center" justify="between"
    class="rounded-lg border border-slate-200 bg-white p-4">
    <x-basekit-ui::stack direction="vertical" spacing="xs">
        <span class="text-sm font-medium text-slate-900">John Doe</span>
        <span class="text-xs text-slate-500">john@example.com</span>
    </x-basekit-ui::stack>
    <x-basekit-ui::badge variant="success">Active</x-basekit-ui::badge>
</x-basekit-ui::stack>
```

## Form Stack Example

```blade
<x-basekit-ui::stack spacing="lg">
    <x-basekit-ui::input name="name" label="Name" />
    <x-basekit-ui::input name="email" label="Email" />
    <x-basekit-ui::textarea name="message" label="Message" />
    <x-basekit-ui::button type="submit">Submit</x-basekit-ui::button>
</x-basekit-ui::stack>
```

## Custom Classes

Override or extend styles with the `class` attribute:

```blade
<x-basekit-ui::stack spacing="md" class="mt-4">
    <div>Item 1</div>
    <div>Item 2</div>
</x-basekit-ui::stack>
```

## CSS Variables

Customize stack gap sizes via CSS variables:

```css
:root {
  --stack-gap-xs: 0.25rem;
  --stack-gap-sm: 0.5rem;
  --stack-gap-md: 1rem;
  --stack-gap-lg: 1.5rem;
  --stack-gap-xl: 2rem;
}
```

## Configuration

```php
'stack' => [
    'enabled' => true,
    'spacing' => ['xs', 'sm', 'md', 'lg', 'xl'],
    'default_spacing' => 'md',
],
```
