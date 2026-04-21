# Basekit Laravel UI - Implementation Guide

## 📦 Current Package Structure

The `basekit-laravel-ui` package is a Laravel component library with 33 Blade components, Tailwind 4 CSS theming, and config-driven builds.

```
basekit-laravel-ui/
├── config/
│   └── basekit-laravel-ui.php          # Component config (enable/disable, variants, sizes)
├── src/
│   ├── BasekitServiceProvider.php      # Package registration & component enablement
│   ├── Commands/
│   │   ├── BasekitBuildCommand.php     # CSS generation command
│   │   ├── BasekitMigrateThemeCommand.php
│   │   └── BasekitStyleguideCommand.php
│   ├── Enums/                          # Type-safe enum definitions
│   │   ├── DefaultBackedEnum.php       # Interface for enum defaults
│   │   ├── Orientation.php
│   │   ├── Variant.php
│   │   ├── Size.php
│   │   ├── ControlStyle.php
│   │   ├── IconStyle.php
│   │   ├── InputVariant.php
│   │   └── LabelStyle.php
│   └── View/
│       └── Components/
│           ├── Support/
│           │   ├── ComponentPropResolver.php
│           │   └── IconResolver.php
│           ├── Form/
│           │   ├── Button.php
│           │   ├── Input.php
│           │   ├── Textarea.php
│           │   ├── Checkbox.php
│           │   ├── Radio.php
│           │   ├── Select.php
│           │   ├── MultiSelect.php
│           │   └── Toggle.php
│           ├── Feedback/
│           │   ├── Alert.php
│           │   ├── Toast.php
│           │   ├── Tooltip.php
│           │   ├── Progress.php
│           │   ├── Spinner.php
│           │   ├── Skeleton.php
│           │   └── EmptyState.php
│           ├── Navigation/
│           │   ├── Breadcrumb.php
│           │   ├── Pagination.php
│           │   ├── Tabs.php
│           │   ├── DropdownMenu.php
│           │   └── Link.php
│           ├── Layout/
│           │   ├── Stack.php
│           │   ├── Grid.php
│           │   ├── Container.php
│           │   └── Divider.php
│           └── Display/
│               ├── Table.php
│               ├── List.php
│               ├── DescriptionList.php
│               ├── Stat.php
│               ├── Card.php
│               ├── Badge.php
│               └── Avatar.php
│           └── Dialog/
│               ├── Modal.php
│               └── Accordion.php
├── resources/
│   ├── css/
│   │   └── v1/
│   │       ├── theme.css           # Global tokens, design system
│   │       └── components/         # Component-specific styles (generated)
│   └── views/
│       └── components/             # Blade templates for all 33 components
├── tests/
│   ├── Feature/
│   │   ├── ComponentRenderingTest.php  # Smoke tests for all components
│   │   ├── ComponentPropResolverTest.php
│   │   └── CommandsTest.php
│   ├── Pest.php
│   ├── TestCase.php
│   └── PHPUnit dedicated test setup
├── docs/
│   ├── index.md
│   ├── components.md
│   ├── components/ (33 component docs)
│   ├── guide/
│   │   ├── installation.md
│   │   ├── performance.md
│   │   ├── theming.md
│   │   └── contributing.md
│   ├── public/
│   │   └── styleguide.html         # Generated HTML snapshot
│   └── README.md
├── IMPLEMENTATION.md               # This file
├── STRUCTURE.md
├── CHANGELOG.md
├── README.md
├── composer.json
├── phpunit.xml.dist
├── phpstan.neon
├── pint.json
├── rector.php
├── postcss.config.cjs
├── testbench.yaml
├── package.json
└── LICENSE
```

## 🎯 Core Architecture

### 1. **Component System**

The package includes **33 production-ready components** organized in 6 categories:

- **Form (8)**: Button, Input, Textarea, Checkbox, Radio, Select, Multi-Select, Toggle
- **Feedback (7)**: Alert, Toast, Tooltip, Progress, Spinner, Skeleton, Empty State
- **Navigation (5)**: Breadcrumb, Pagination, Tabs, Dropdown Menu, Link
- **Layout (4)**: Stack, Grid, Container, Divider
- **Display (7)**: Table, List, Description List, Stat, Card, Badge, Avatar
- **Dialog & Overlay (2)**: Modal, Accordion

All components are registered conditionally via service provider based on config.

### 2. **Type-Safe Enums**

Seven backed enums with explicit, interface-enforced `default()` contracts:

```php
// src/Enums/DefaultBackedEnum.php
interface DefaultBackedEnum extends \BackedEnum
{
    public static function default(): self;
}
```

All enums (`Orientation`, `Size`, `Variant`, `ControlStyle`, `IconStyle`, `InputVariant`, `LabelStyle`) implement this interface, ensuring:

- Predictable fallback behavior on invalid prop values
- Strong typing through `ComponentPropResolver`
- Testable enum resolution paths

### 3. **Shared Prop Resolution**

`ComponentPropResolver` is the unified layer for resolving component properties:

```php
// Resolve with config validation (size, variant)
ComponentPropResolver::resolveEnum(
    Size::class,
    'basekit.components.button.sizes',
    'basekit.components.button.default_size',
    $userProvidedSize
);

// Resolve with enum default fallback (orientation)
ComponentPropResolver::resolveDefaultEnum(Orientation::class, $userProvidedValue);
```

This centralizes prop logic and prevents duplicated resolution code across 25+ components.

### 4. **Blade Component Implementations**

**PHP Classes** handle complex components with multiple props and lifecycle:

- Button, Input, Textarea, Checkbox, Radio, Select, Multi-Select, Toggle (Form)
- Alert, Toast, Tooltip, Progress, Spinner, Skeleton, Empty State (Feedback)
- Breadcrumb, Pagination, Tabs, Dropdown Menu, Link (Navigation)
- Container, Stack, Grid, Divider (Layout)
- Badge, Avatar, Table, List, Description List, Stat, Card (Display)
- Modal, Accordion (Dialog)

### 5. **Configuration System**

`config/basekit-laravel-ui.php` controls component behavior and CSS output:

```php
'components' => [
    'button' => [
        'enabled' => true,
        'variants' => ['primary', 'secondary', 'success', 'warning', 'danger', 'info', 'ghost'],
        'sizes' => ['sm', 'md', 'lg'],
        'default_variant' => 'primary',
        'default_size' => 'md',
    ],
    // ... 32 more components
],

'icons.style' => 'outline',  // Heroicons style

'build' => [
    'debounce' => 100,      // ms
    'output_path' => 'public/css/basekit-ui.css',
],
```

Components marked `'enabled' => false` are:

- Not registered in the service provider
- Excluded from the generated CSS bundle (performance optimization)

### 6. **Build System**

**Three commands deliver production CSS:**

#### `php artisan basekit:ui:build`

- Reads enabled components from config
- Generates CSS including only enabled component styles
- Writes to `public/css/basekit-ui.css` (configurable path)
- Typical output: 12-45 KB depending on component enablement

#### `php artisan basekit:ui:build --watch`

- Watches for config changes
- Automatically rebuilds CSS with 100ms debounce
- Useful for development iteration

#### `php artisan basekit:ui:styleguide`

- Renders all components to static HTML snapshot
- Writes to `docs/public/styleguide.html`
- Used for documentation and component previews
- Forces array cache driver to work in lean test environments

### 7. **Icon Integration**

Icons come from **Blade Heroicons** with configurable style:

```php
// config/basekit-laravel-ui.php
'icons.style' => 'outline',  // or 'solid', 'mini'
```

Components accept `icon` prop (string name) and resolve via `IconResolver::resolve()`. All icon props are optional.

### 8. **CSS Variables Theming**

Tailwind 4 `@theme` directive enables runtime customization via CSS variables:

```css
/* resources/css/v1/theme.css */
@theme {
  --color-primary-600: #2563eb;
  --radius-md: 0.375rem;
  --button-padding-x-md: 1rem;
  /* etc. */
}
```

Applications can override:

```css
:root {
  --color-primary-600: #7c3aed; /* Custom purple */
}
```

### 9. **Test Infrastructure**

**Pest test framework** with Orchestra Testbench for isolated Laravel environment:

- `ComponentRenderingTest.php` — Smoke tests for all 33 components (~65 individual tests)
- `ComponentPropResolverTest.php` — Regression tests for enum fallback behavior
- `CommandsTest.php` — Tests for build, migrate-theme, styleguide commands
- Test isolation via beforeEach/afterEach cleanup (no cross-test pollution)

All 93 tests passing. Tests use Blade::render() to exercise full component pipeline.

## 📊 Performance Characteristics

| Metric               | Value                     |
| -------------------- | ------------------------- |
| Components           | 33 shipped                |
| Enums                | 7 type-safe               |
| Tests                | 93 passing                |
| Config Options       | Per-component control     |
| CSS Output (Full)    | ~200 KB (all components)  |
| CSS Output (Typical) | ~162 KB (20 components)   |
| CSS Output (Minimal) | ~116 KB (8-10 components) |

Build time: <10ms (single pass), watches rebuild on save.

## 🔄 Development Workflow

1. **Setup**

   ```bash
   composer install
   php artisan vendor:publish --tag=basekit-laravel-ui-config
   php artisan vendor:publish --tag=basekit-laravel-ui-css-v1
   php artisan basekit:ui:build
   ```

2. **Add/Modify Components**
   - Edit PHP class in `src/View/Components/`
   - Edit Blade template in `resources/views/components/`
   - Update tests in `tests/Feature/`

3. **Test Locally**

   ```bash
   php vendor/bin/pest              # Run all tests
   php vendor/bin/pest tests/Feature/ComponentRenderingTest.php  # Test specific file
   php vendor/bin/phpstan src/      # Static analysis
   php vendor/bin/pint              # Code style
   ```

4. **Rebuild CSS**

   ```bash
   php artisan basekit:ui:build --watch  # Development
   php artisan basekit:ui:build          # Production
   ```

5. **Generate Styleguide**

   ```bash
   php artisan basekit:ui:styleguide     # Generate HTML snapshot
   ```

6. **Update Documentation**
   - Edit `docs/components/*.md`
   - Verify against actual config and component behavior

## 🏗️ Adding a New Component

1. **Create PHP Class** (`src/View/Components/Category/ComponentName.php`)

   ```php
   namespace BasekitLaravel\BasekitLaravelUi\View\Components\Category;
   use Illuminate\View\Component;

   class ComponentName extends Component
   {
       public function __construct(public string $prop = '') {}
       public function render() { return view('basekit::components.category.component-name'); }
   }
   ```

2. **Create Blade Template** (`resources/views/components/category/component-name.blade.php`)

   ```blade
   <div {{ $attributes->class('component-classes') }}>
       {{ $slot }}
   </div>
   ```

3. **Register in Config** (`config/basekit-laravel-ui.php`)

   ```php
   'component-name' => [
       'enabled' => true,
       'variants' => ['default'],
       'sizes' => ['md'],
       'default_variant' => 'default',
       'default_size' => 'md',
   ],
   ```

4. **Add Tests** (`tests/Feature/ComponentRenderingTest.php`)
   - Add to parametrized test with other components
   - Add specialized tests if component has complex behavior

5. **Update Documentation** (`docs/components/component-name.md`)
   - API reference
   - Usage examples
   - Customization guide

6. **Rebuild**
   ```bash
   php artisan basekit:ui:build
   ```

## 📝 Publishing Artifacts

Three publishable artifacts for end users:

```bash
# Config file
php artisan vendor:publish --tag=basekit-laravel-ui-config

# CSS theme
php artisan vendor:publish --tag=basekit-laravel-ui-css-v1

# Component views (for deep customization)
php artisan vendor:publish --tag=basekit-laravel-ui-views
```

See the [docs/](docs/) for comprehensive guides.
