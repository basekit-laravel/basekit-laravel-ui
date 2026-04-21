# Performance

Basekit Laravel UI is designed for optimal performance through component-level CSS inclusion and efficient build output.

## Bundle Size Optimization

The build system analyzes your configuration and includes CSS for enabled components.

### Benchmark Comparison

These numbers are **representative examples** from a reference setup. Actual results vary based on enabled components, variants, PostCSS/minification, and your environment.

| Configuration        | File Size | Components    | Reduction |
| -------------------- | --------- | ------------- | --------- |
| **Full Bundle**      | 200 KB    | 33 components | Baseline  |
| **Medium Config**    | 116 KB    | 8 components  | 42%       |
| **Minimal Config**   | 55 KB     | 3 components  | 73%       |
| **Single Component** | 15 KB     | 1 component   | 93%       |

### How to Verify Locally

1. Set your desired configuration in `config/basekit-laravel-ui.php`.
2. Build CSS:

```bash
php artisan basekit:ui:build
```

3. Check reported size from command output (`📊 Size: ...`) and verify raw bytes:

```bash
wc -c public/vendor/basekit-laravel/v1/basekit-ui.css
ls -lh public/vendor/basekit-laravel/v1/basekit-ui.css
```

4. Repeat for each config profile (full, medium, minimal) and compare reductions using your measured values.

## Build Performance

### Watch Mode Optimization

The build command includes intelligent debouncing:

```bash
php artisan basekit:ui:build --watch
```

If PostCSS is available, the build command will post-process the generated CSS before writing `basekit.css`.

## Component Inclusion in Action

### Enabled Components

```php
'components' => [
    'button' => ['enabled' => true],
    'input' => ['enabled' => true],
    'modal' => ['enabled' => false],
],
```

### Resulting Build

```css
/* button + input component CSS is included */
/* modal component CSS is excluded */
```

## Runtime Performance

### Component Rendering

- **PHP Classes**: Type-safe, minimal overhead
- **Anonymous Components** (`@props`): Zero class instantiation for simple components
- **Blade Compilation**: Cached by Laravel

### CSS Loading

- **Single CSS file**: Reduces HTTP requests
- **Config-aware**: Includes only enabled components
- **CSS variables**: Native browser performance

## Optimization Tips

### 1. Disable Unused Components

```php
'components' => [
    'modal' => ['enabled' => false], // Not using modals
    'dropdown-menu' => ['enabled' => false], // Not using dropdown menus
],
```

### 2. Keep Enabled Set Focused

Enable only components you actually use across your app.

### 3. Use Watch Mode in Development

Avoid manual rebuilds during development:

```bash
php artisan basekit:ui:build --watch
```

### 4. Production Build

Always rebuild before deploying:

```bash
php artisan basekit:ui:build
```

### 5. CDN/Caching

Serve built CSS from CDN with long cache headers:

```nginx
location /vendor/basekit/ {
    expires 1y;
    add_header Cache-Control "public, immutable";
}
```

## Monitoring Build Output

The build command provides detailed output:

```bash
$ php artisan basekit:ui:build

🔨 Building CSS...
✅ Build complete! (11ms)
📦 Output: /public/vendor/basekit-laravel/v1/basekit-ui.css
📊 Size: 116.01 KB

🎯 Components (8):
   • button
   • input
   • textarea
   • checkbox
   • radio
   • select
   • card
   • modal
```

## Advanced: Custom Build Process

For advanced use cases, you can extend the build command:

```php
namespace App\Commands;

use BasekitLaravel\BasekitLaravelUi\Commands\BasekitBuildCommand;

class CustomBuildCommand extends BasekitBuildCommand
{
    protected function buildCss(array $enabledComponents): string
    {
        $css = parent::buildCss($enabledComponents);

        // Add custom post-processing
        // e.g., minification, autoprefixer, etc.

        return $css;
    }
}
```

## Conclusion

With proper configuration, Basekit Laravel UI can reduce your CSS bundle size by up to 73% while maintaining full functionality for your specific use case.

## Next Steps

- [Installation Guide](/guide/installation) — initial setup and CSS import options
- [Theming Guide](/guide/theming) — customise design tokens and component variables
- [Component Reference](/components) — see which components you actually need
