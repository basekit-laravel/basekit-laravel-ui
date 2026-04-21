<?php

declare(strict_types=1);

namespace BasekitLaravel\BasekitLaravelUi\View\Components\Navigation;

use BasekitLaravel\BasekitLaravelUi\View\Components\Support\ComponentPropResolver;
use Illuminate\Contracts\View\View;
use Illuminate\Support\HtmlString;
use Illuminate\View\Component;

/**
 * Tabs component for Basekit Laravel UI.
 *
 * Displays tab navigation with configurable visual variants and active state.
 */
class Tabs extends Component
{
    /**
     * Visual tab list variant.
     */
    public string $variant;

    /**
     * Create a new component instance.
     *
     * @param  array<int, array<string, mixed>>  $items
     */
    public function __construct(
        /**
         * Tab items.
         */
        public array $items = [],
        /**
         * Active tab key.
         */
        public mixed $active = null,
        ?string $variant = null
    ) {
        $this->variant = $this->resolveVariant($variant);
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View
    {
        return view('basekit::components.navigation.tabs');
    }

    /**
     * Get the tabs classes.
     */
    public function classes(): string
    {
        return "bk-tabs__list bk-tabs__list--{$this->variant}";
    }

    /**
     * Get custom icon component name from tab item.
     *
     * @param  array<string, mixed>  $item
     */
    public function customIconComponent(array $item): ?string
    {
        if (! $this->hasCustomIconComponent($item)) {
            return null;
        }

        return $item['iconComponent'];
    }

    /**
     * Get custom inline SVG icon markup from tab item.
     *
     * @param  array<string, mixed>  $item
     */
    public function customIconSvg(array $item): ?HtmlString
    {
        if (! $this->hasCustomIconSvg($item)) {
            return null;
        }

        return new HtmlString($item['iconSvg']);
    }

    /**
     * Determine whether a tab item has a custom icon component.
     *
     * @param  array<string, mixed>  $item
     */
    public function hasCustomIconComponent(array $item): bool
    {
        return isset($item['iconComponent'])
            && is_string($item['iconComponent'])
            && $item['iconComponent'] !== '';
    }

    /**
     * Determine whether a tab item has inline custom SVG markup.
     *
     * @param  array<string, mixed>  $item
     */
    public function hasCustomIconSvg(array $item): bool
    {
        return isset($item['iconSvg'])
            && is_string($item['iconSvg'])
            && trim($item['iconSvg']) !== '';
    }

    /**
     * Determine whether a tab item has any icon source.
     *
     * @param  array<string, mixed>  $item
     */
    public function hasIcon(array $item): bool
    {
        return $this->hasCustomIconSvg($item)
            || $this->hasCustomIconComponent($item)
            || (isset($item['icon']) && is_string($item['icon']) && $item['icon'] !== '');
    }

    /**
     * Get a Heroicon component name.
     */
    public function iconComponent(string $icon): string
    {
        return ComponentPropResolver::heroiconComponent($icon) ?? '';
    }

    /**
     * Resolve tab variant from config.
     */
    private function resolveVariant(?string $variant): string
    {
        return ComponentPropResolver::resolveString(
            'basekit.components.tabs.variants',
            'basekit.components.tabs.default_variant',
            'underline',
            $variant
        );
    }
}
