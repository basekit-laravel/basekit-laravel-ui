# Basekit Laravel UI - Component Structure

## Overview

The 33 components are organized into 6 logical categories for maintainability, discoverability, and clear responsibility boundaries. All components use the `<x-basekit-ui::` prefix regardless of internal organization.

## Component Categories & Organization

### Form Components (8)

**Purpose**: User input & form controls  
**Path**: `src/View/Components/Form/`  
**Namespace**: `BasekitLaravel\BasekitLaravelUi\View\Components\Form`  
**Template Path**: `resources/views/components/form/`

| Component                                           | Purpose                                                     |
| --------------------------------------------------- | ----------------------------------------------------------- |
| [**Button**](docs/components/button.md)             | Clickable action with variants, sizes, icons, loading state |
| [**Input**](docs/components/input.md)               | Text input with label, error, hint, prefix/suffix           |
| [**Textarea**](docs/components/textarea.md)         | Multi-line text input                                       |
| [**Checkbox**](docs/components/checkbox.md)         | Checkbox input with custom styling                          |
| [**Radio**](docs/components/radio.md)               | Radio button with custom styling                            |
| [**Select**](docs/components/select.md)             | Dropdown select with options                                |
| [**Multi-Select**](docs/components/multi-select.md) | Multiple selection dropdown                                 |
| [**Toggle**](docs/components/toggle.md)             | On/off toggle switch                                        |

All form components support config-driven variants and sizes.

### Feedback Components (7)

**Purpose**: User notifications, loading states, status indicators  
**Path**: `src/View/Components/Feedback/`  
**Namespace**: `BasekitLaravel\BasekitLaravelUi\View\Components\Feedback`  
**Template Path**: `resources/views/components/feedback/`

| Component                                         | Purpose                                                        |
| ------------------------------------------------- | -------------------------------------------------------------- |
| [**Alert**](docs/components/alert.md)             | Dismissible or persistent alert message with variants          |
| [**Toast**](docs/components/toast.md)             | Short-lived notification toast (success, error, warning, info) |
| [**Tooltip**](docs/components/tooltip.md)         | Hover tooltip with positioning                                 |
| [**Progress**](docs/components/progress.md)       | Linear progress bar with value and label                       |
| [**Spinner**](docs/components/spinner.md)         | Loading spinner indicator                                      |
| [**Skeleton**](docs/components/skeleton.md)       | Placeholder skeleton screen component                          |
| [**Empty State**](docs/components/empty-state.md) | Empty state message with optional icon                         |

### Navigation Components (5)

**Purpose**: Site navigation, pagination, tab switching  
**Path**: `src/View/Components/Navigation/`  
**Namespace**: `BasekitLaravel\BasekitLaravelUi\View\Components\Navigation`  
**Template Path**: `resources/views/components/navigation/`

| Component                                             | Purpose                                 |
| ----------------------------------------------------- | --------------------------------------- |
| [**Breadcrumb**](docs/components/breadcrumb.md)       | Navigation breadcrumbs with trails      |
| [**Pagination**](docs/components/pagination.md)       | Page navigation (simple or detailed)    |
| [**Tabs**](docs/components/tabs.md)                   | Tab navigation                          |
| [**Dropdown Menu**](docs/components/dropdown-menu.md) | Context menu with items array           |
| [**Link**](docs/components/link.md)                   | Styled link component with icon support |

### Layout Components (4)

**Purpose**: Page structure and content organization  
**Path**: `src/View/Components/Layout/`  
**Namespace**: `BasekitLaravel\BasekitLaravelUi\View\Components\Layout`  
**Template Path**: `resources/views/components/layout/`

| Component                                     | Purpose                                                    |
| --------------------------------------------- | ---------------------------------------------------------- |
| [**Stack**](docs/components/stack.md)         | Flexible box layout (vertical/horizontal) with gap control |
| [**Grid**](docs/components/grid.md)           | CSS Grid layout with column count and gap                  |
| [**Container**](docs/components/container.md) | Page container with responsive width and centering         |
| [**Divider**](docs/components/divider.md)     | Visual separator (horizontal or vertical)                  |

### Display Components (7)

**Purpose**: Data presentation and information display  
**Path**: `src/View/Components/Display/`  
**Namespace**: `BasekitLaravel\BasekitLaravelUi\View\Components\Display`  
**Template Path**: `resources/views/components/display/`

| Component                                                   | Purpose                                                    |
| ----------------------------------------------------------- | ---------------------------------------------------------- |
| [**Table**](docs/components/table.md)                       | Data table with rows, columns, and optional filtering      |
| [**List**](docs/components/list.md)                         | Ordered/unordered list with custom markers and items array |
| [**Description List**](docs/components/description-list.md) | Term/definition list (dl, dt, dd)                          |
| [**Stat**](docs/components/stat.md)                         | Single statistic display (label, value, trend)             |
| [**Card**](docs/components/card.md)                         | Content card with header, footer, and actions slots        |
| [**Badge**](docs/components/badge.md)                       | Small label/status indicator with icon support             |
| [**Avatar**](docs/components/avatar.md)                     | User avatar with image, initials, or icon fallback         |

### Dialog & Overlay (2)

**Purpose**: Modals, drawers, and expansible containers  
**Path**: `src/View/Components/Dialog/`  
**Namespace**: `BasekitLaravel\BasekitLaravelUi\View\Components\Dialog`  
**Template Path**: `resources/views/components/dialog/`

| Component                                     | Purpose                                            |
| --------------------------------------------- | -------------------------------------------------- |
| [**Modal**](docs/components/modal.md)         | Dialog modal with header, footer, and action slots |
| [**Accordion**](docs/components/accordion.md) | Expandable sections with single/multi-open modes   |

## Directory Structure

```
basekit-laravel-ui/
├── src/
│   └── View/
│       └── Components/
│           ├── Form/              # 8 form input components
│           ├── Feedback/          # 7 notification & state components
│           ├── Navigation/        # 5 navigation & routing components
│           ├── Layout/            # 4 page structure components
│           ├── Display/           # 7 data display components
│           ├── Dialog/            # 2 dialog & overlay components
│           └── Support/           # Shared utilities
│               ├── ComponentPropResolver.php
│               └── IconResolver.php
├── resources/
│   ├── views/
│   │   └── components/
│   │       ├── form/              # form/ templates
│   │       ├── feedback/          # feedback/ templates
│   │       ├── navigation/        # navigation/ templates
│   │       ├── layout/            # layout/ templates
│   │       ├── display/           # display/ templates
│   │       └── dialog/            # dialog/ templates
│   └── css/
│       └── v1/
│           └── components/        # Generated component CSS
└── config/
    └── basekit-laravel-ui.php     # Component configuration & enablement
```

## Configuration

All 33 components are configured in `config/basekit-laravel-ui.php`:

```php
'components' => [
    // Form (8 entries)
    'button' => [
        'enabled' => true,
        'variants' => ['primary', 'secondary', 'success', 'warning', 'danger', 'info', 'ghost'],
        'sizes' => ['sm', 'md', 'lg'],
        'default_variant' => 'primary',
        'default_size' => 'md',
    ],
    // ... more form components

    // Feedback (7 entries)
    'alert' => [
        'enabled' => true,
        'variants' => ['primary', 'secondary', 'success', 'warning', 'danger', 'info', 'ghost'],
        'default_variant' => 'info',
    ],
    // ... more feedback components

    // Navigation (5 entries)
    'breadcrumb' => [
        'enabled' => true,
        'separator' => 'chevron-right',
        'sizes' => ['sm', 'md', 'lg'],
        'default_size' => 'md',
    ],
    // ... more navigation components

    // Layout (4 entries)
    'stack' => [
        'enabled' => true,
        'spacing' => ['xs', 'sm', 'md', 'lg', 'xl'],
        'default_spacing' => 'md',
    ],
    // ... more layout components

    // Display (7 entries)
    'table' => [
        'enabled' => true,
        'variants' => ['default', 'bordered', 'striped', 'hoverable'],
        'sizes' => ['sm', 'md', 'lg'],
        'default_variant' => 'default',
        'default_size' => 'md',
    ],
    // ... more display components

    // Dialog (2 entries)
    'modal' => [
        'enabled' => true,
        'sizes' => ['sm', 'md', 'lg', 'xl', 'full'],
        'default_size' => 'md',
    ],
    // ... more dialog components
],
```

Components with `'enabled' => false` are:

- Excluded from registration
- Excluded from generated CSS

## Component Access

All components are accessed via the `basekit-ui` prefix, regardless of internal organization:

```blade
{{-- Form --}}
<x-basekit-ui::button>Click</x-basekit-ui::button>
<x-basekit-ui::input name="email" label="Email" />

{{-- Feedback --}}
<x-basekit-ui::alert variant="success">Saved</x-basekit-ui::alert>
<x-basekit-ui::toast variant="info">Note</x-basekit-ui::toast>
<x-basekit-ui::progress :value="50" />

{{-- Navigation --}}
<x-basekit-ui::breadcrumb :items="$breadcrumbs" />
<x-basekit-ui::pagination :items="$items" :total="100" />
<x-basekit-ui::tabs :items="$tabs" />
<x-basekit-ui::dropdown-menu label="Menu" :items="$actions" />
<x-basekit-ui::link href="/">Home</x-basekit-ui::link>

{{-- Layout --}}
<x-basekit-ui::stack direction="vertical" gap="md">
    <div>Item 1</div>
    <div>Item 2</div>
</x-basekit-ui::stack>
<x-basekit-ui::grid :cols="3">
    <div>Cell 1</div>
    {{-- ... --}}
</x-basekit-ui::grid>
<x-basekit-ui::container>Page content</x-basekit-ui::container>
<x-basekit-ui::divider />

{{-- Display --}}
<x-basekit-ui::table :items="$data" :columns="['name', 'email']" />
<x-basekit-ui::list :items="['A', 'B', 'C']" />
<x-basekit-ui::stat label="Revenue" value="$12,345" />
<x-basekit-ui::card>
    <x-slot:header>Title</x-slot>
    Content
</x-basekit-ui::card>
<x-basekit-ui::badge variant="primary">New</x-basekit-ui::badge>
<x-basekit-ui::avatar src="..." />

{{-- Dialog --}}
<x-basekit-ui::modal title="Confirm" :is-open="true">
    Are you sure?
</x-basekit-ui::modal>
<x-basekit-ui::accordion :items="[...]" />
```
