# Basekit Laravel UI Documentation

This directory contains comprehensive documentation for all Basekit Laravel UI components.

## Documentation Structure

```
docs/
├── index.md              # Homepage with overview and quick start
├── components.md         # Quick reference for all components
├── components/           # Individual component documentation
│   ├── Form (8)         # Button, Input, Textarea, Checkbox, Radio, Select, MultiSelect, Toggle
│   ├── Feedback (7)     # Alert, Toast, Tooltip, Progress, Spinner, Skeleton, EmptyState
│   ├── Navigation (5)   # Breadcrumb, Pagination, Tabs, DropdownMenu, Link
│   ├── Layout (4)       # Container, Divider, Stack, Grid
│   ├── Display (7)      # Card, Badge, Avatar, Table, List, DescriptionList, Stat
│   └── Dialog (2)       # Modal, Accordion
└── guide/               # Setup and usage guides
    ├── installation.md  # Installation instructions
    ├── theming.md       # Theming and customization
    ├── performance.md   # Performance optimization
    └── contributing.md  # Package contributor guide
```

## Component Categories

### Form Components (8)

Build accessible forms with full validation support.

- [Button](components/button.md)
- [Input](components/input.md)
- [Textarea](components/textarea.md)
- [Checkbox](components/checkbox.md)
- [Radio](components/radio.md)
- [Select](components/select.md)
- [Multi-Select](components/multi-select.md)
- [Toggle](components/toggle.md)

### Feedback Components (7)

Provide user feedback and loading states.

- [Alert](components/alert.md)
- [Toast](components/toast.md)
- [Tooltip](components/tooltip.md)
- [Progress](components/progress.md)
- [Spinner](components/spinner.md)
- [Skeleton](components/skeleton.md)
- [Empty State](components/empty-state.md)

### Navigation Components (5)

Navigate through your application.

- [Breadcrumb](components/breadcrumb.md)
- [Pagination](components/pagination.md)
- [Tabs](components/tabs.md)
- [Dropdown Menu](components/dropdown-menu.md)
- [Link](components/link.md)

### Layout Components (4)

Structure your page layouts.

- [Container](components/container.md)
- [Divider](components/divider.md)
- [Stack](components/stack.md)
- [Grid](components/grid.md)

### Display Components (7)

Present data and information clearly.

- [Card](components/card.md)
- [Badge](components/badge.md)
- [Avatar](components/avatar.md)
- [Table](components/table.md)
- [List](components/list.md)
- [Description List](components/description-list.md)
- [Stat](components/stat.md)

### Dialog Components (2)

Modal dialogs and overlays.

- [Modal](components/modal.md)
- [Accordion](components/accordion.md)

## Documentation Format

Each component documentation includes:

- **Basic Usage** - Simple examples to get started
- **Props** - Complete property reference table
- **Variants** - Different style variants
- **Sizes** - Available size options
- **Examples** - Real-world usage examples
- **Configuration** - Config file options

## Contributing

When adding new components, please:

1. Create a new markdown file in `docs/components/`
2. Follow the existing documentation format
3. Include comprehensive examples
4. Update this README
5. Update `docs/components.md` quick reference
6. Update `docs/index.md` component catalog

## Building Documentation

If using VitePress or similar:

```bash
# Install dependencies
npm install

# Dev server
npm run docs:dev

# Build
npm run docs:build
```

## Total Documentation

- **39 markdown files**
- **33 component guides**
- **4 setup guides**
- **2 reference pages**
