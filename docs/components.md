# Component Quick Reference

A comprehensive quick reference for all Basekit Laravel UI components.

## Form Components

| Component                                | Tag                            | Purpose                                  |
| ---------------------------------------- | ------------------------------ | ---------------------------------------- |
| [Button](/components/button)             | `<x-basekit-ui::button>`       | Clickable button with variants and icons |
| [Input](/components/input)               | `<x-basekit-ui::input>`        | Text input field                         |
| [Textarea](/components/textarea)         | `<x-basekit-ui::textarea>`     | Multi-line text input                    |
| [Checkbox](/components/checkbox)         | `<x-basekit-ui::checkbox>`     | Checkbox with label                      |
| [Radio](/components/radio)               | `<x-basekit-ui::radio>`        | Radio button                             |
| [Select](/components/select)             | `<x-basekit-ui::select>`       | Dropdown select (single value)           |
| [Multi-Select](/components/multi-select) | `<x-basekit-ui::multi-select>` | Dropdown select (multiple values)        |
| [Toggle](/components/toggle)             | `<x-basekit-ui::toggle>`       | Switch toggle (Alpine.js)                |

## Feedback Components

| Component                              | Tag                           | Purpose              |
| -------------------------------------- | ----------------------------- | -------------------- |
| [Alert](/components/alert)             | `<x-basekit-ui::alert>`       | Alert banner         |
| [Toast](/components/toast)             | `<x-basekit-ui::toast>`       | Notification message |
| [Tooltip](/components/tooltip)         | `<x-basekit-ui::tooltip>`     | Hover tooltip        |
| [Progress](/components/progress)       | `<x-basekit-ui::progress>`    | Progress bar         |
| [Spinner](/components/spinner)         | `<x-basekit-ui::spinner>`     | Loading spinner      |
| [Skeleton](/components/skeleton)       | `<x-basekit-ui::skeleton>`    | Loading placeholder  |
| [Empty State](/components/empty-state) | `<x-basekit-ui::empty-state>` | No data display      |

## Navigation Components

| Component                                  | Tag                             | Purpose                      |
| ------------------------------------------ | ------------------------------- | ---------------------------- |
| [Breadcrumb](/components/breadcrumb)       | `<x-basekit-ui::breadcrumb>`    | Navigation breadcrumbs       |
| [Pagination](/components/pagination)       | `<x-basekit-ui::pagination>`    | Page navigation              |
| [Tabs](/components/tabs)                   | `<x-basekit-ui::tabs>`          | Tabbed interface (Alpine.js) |
| [Dropdown Menu](/components/dropdown-menu) | `<x-basekit-ui::dropdown-menu>` | Dropdown menu (Alpine.js)    |
| [Link](/components/link)                   | `<x-basekit-ui::link>`          | Styled link                  |

## Layout Components

| Component                          | Tag                         | Purpose              |
| ---------------------------------- | --------------------------- | -------------------- |
| [Container](/components/container) | `<x-basekit-ui::container>` | Page container       |
| [Divider](/components/divider)     | `<x-basekit-ui::divider>`   | Horizontal separator |
| [Stack](/components/stack)         | `<x-basekit-ui::stack>`     | Flexbox layout       |
| [Grid](/components/grid)           | `<x-basekit-ui::grid>`      | Grid layout          |

## Display Components

| Component                                        | Tag                                | Purpose               |
| ------------------------------------------------ | ---------------------------------- | --------------------- |
| [Card](/components/card)                         | `<x-basekit-ui::card>`             | Content container     |
| [Badge](/components/badge)                       | `<x-basekit-ui::badge>`            | Small label/indicator |
| [Avatar](/components/avatar)                     | `<x-basekit-ui::avatar>`           | User profile image    |
| [Table](/components/table)                       | `<x-basekit-ui::table>`            | Data table            |
| [List](/components/list)                         | `<x-basekit-ui::list>`             | Styled list           |
| [Description List](/components/description-list) | `<x-basekit-ui::description-list>` | Key-value pairs       |
| [Stat](/components/stat)                         | `<x-basekit-ui::stat>`             | Statistics display    |

## Dialog & Overlay Components

| Component                          | Tag                         | Purpose                        |
| ---------------------------------- | --------------------------- | ------------------------------ |
| [Modal](/components/modal)         | `<x-basekit-ui::modal>`     | Modal dialog (Alpine.js)       |
| [Accordion](/components/accordion) | `<x-basekit-ui::accordion>` | Collapsible panels (Alpine.js) |

## Common Props

### Variants

Most components support variants for different styles:

```blade
variant="primary|secondary|success|warning|danger|info|ghost"
```

### Sizes

Many components support size variants:

```blade
size="xs|sm|md|lg|xl"
```

### Icons

Components with icon support use Heroicons:

```blade
icon="check|users|cog|..."
```

## Alpine.js Components

The following components require Alpine.js:

- Input — Password visibility toggle, Masked and Number Inputs
- Toggle
- Toast
- Tooltip
- Table
- Tabs
- Dropdown Menu
- Modal
- Accordion

## Configuration

Enable/disable and configure components in `config/basekit-laravel-ui.php`:

```php
'components' => [
    'button' => [
        'enabled' => true,
        'variants' => ['primary', 'secondary', 'danger', 'ghost'],
        'sizes' => ['sm', 'md', 'lg'],
        'default_variant' => 'primary',
        'default_size' => 'md',
    ],
    // ...
],
```

## Publishing

```bash
# Publish configuration
php artisan vendor:publish --tag=basekit-laravel-ui-config

# Optional: publish prebuilt CSS to public/
php artisan vendor:publish --tag=basekit-laravel-ui-css-v1

# Publish component views (for customization)
php artisan vendor:publish --tag=basekit-views
```

## Build Commands

```bash
# Optional: build optimized CSS from config
php artisan basekit:ui:build

# Optional: build with watch mode
php artisan basekit:ui:build --watch

# Migrate theme from v1 to v2 (future)
php artisan basekit:ui:migrate-theme
```

## Complete Example

```blade
<x-basekit-ui::container>
    <x-basekit-ui::card>
        <x-slot:header>
            <h2 class="text-xl font-bold">Create Account</h2>
        </x-slot>

        <form method="POST" action="/register">
            @csrf

            <x-basekit-ui::stack spacing="lg">
                <x-basekit-ui::input
                    name="name"
                    label="Name"
                    icon="user"
                    :error="$errors->first('name')"
                />

                <x-basekit-ui::input
                    name="email"
                    type="email"
                    label="Email"
                    icon="envelope"
                    :error="$errors->first('email')"
                />

                <x-basekit-ui::input
                    name="password"
                    type="password"
                    label="Password"
                    hint="Must be at least 8 characters"
                    icon="lock-closed"
                    :error="$errors->first('password')"
                />

                <x-basekit-ui::checkbox
                    name="terms"
                    label="I agree to the terms and conditions"
                />
            </x-basekit-ui::stack>

            <x-slot:footer>
                <div class="flex justify-between items-center">
                    <x-basekit-ui::link href="/login">
                        Already have an account?
                    </x-basekit-ui::link>

                    <x-basekit-ui::button
                        type="submit"
                        variant="primary"
                        icon="arrow-right"
                    >
                        Create Account
                    </x-basekit-ui::button>
                </div>
            </x-slot>
        </form>
    </x-basekit-ui::card>
</x-basekit-ui::container>
```
