<?php

declare(strict_types=1);

namespace BasekitLaravel\BasekitLaravelUi\View\Components\Navigation;

use BasekitLaravel\BasekitLaravelUi\View\Components\Support\ComponentPropResolver;
use Illuminate\Contracts\View\View;
use Illuminate\Support\HtmlString;
use Illuminate\View\Component;

/**
 * Dropdown menu component for Basekit Laravel UI.
 *
 * Provides a configurable menu with click/hover triggers and position variants.
 */
class DropdownMenu extends Component
{
    /**
     * Open trigger mode.
     */
    public string $openOn;

    /**
     * Menu position variant.
     */
    public string $position;

    /**
     * Create a new component instance.
     *
     * @param  array<int, array<string, mixed>>  $items
     */
    public function __construct(
        ?string $position = null,
        string $trigger = 'click',
        /**
         * Dropdown menu items.
         */
        public array $items = []
    ) {
        $this->position = $this->resolvePosition($position);
        $this->openOn = $this->resolveTrigger($trigger);
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View
    {
        return view('basekit::components.navigation.dropdown-menu');
    }

    /**
     * Get the dropdown classes.
     */
    public function classes(): string
    {
        return "bk-dropdown__menu bk-dropdown__menu--{$this->position}";
    }

    /**
     * Get submenu panel classes.
     */
    public function submenuClasses(): string
    {
        return "bk-dropdown__submenu-panel bk-dropdown__submenu-panel--{$this->submenuAlignment()}";
    }

    /**
     * Get submenu toggle icon component name.
     */
    public function submenuToggleIconComponent(): string
    {
        $icon = $this->submenuAlignment() === 'left' ? 'chevron-left' : 'chevron-right';

        return ComponentPropResolver::heroiconComponent($icon) ?? 'heroicon-o-chevron-right';
    }

    /**
     * Get custom icon component name from dropdown item.
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
     * Get custom inline SVG icon markup from dropdown item.
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
     * Determine whether a dropdown item has a custom icon component.
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
     * Determine whether a dropdown item has inline custom SVG markup.
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
     * Determine whether a dropdown item has any icon source.
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
     * Determine whether a dropdown item has child items.
     *
     * @param  array<string, mixed>  $item
     */
    public function hasChildren(array $item): bool
    {
        return isset($item['children'])
            && is_array($item['children'])
            && $item['children'] !== [];
    }

    /**
     * Get normalized child items for a dropdown item.
     *
     * @param  array<string, mixed>  $item
     * @return array<int, array<string, mixed>>
     */
    public function childItems(array $item): array
    {
        if (! $this->hasChildren($item)) {
            return [];
        }

        return array_values(array_filter(
            $item['children'],
            is_array(...)
        ));
    }

    /**
     * Determine whether an item has a custom class string.
     *
     * @param  array<string, mixed>  $item
     */
    public function itemClass(array $item): ?string
    {
        if (! isset($item['class']) || ! is_string($item['class'])) {
            return null;
        }

        $class = trim($item['class']);

        return $class !== '' ? $class : null;
    }

    /**
     * Get a Heroicon component name.
     */
    public function iconComponent(?string $icon): ?string
    {
        if ($icon === null || $icon === '') {
            return null;
        }

        return ComponentPropResolver::heroiconComponent($icon);
    }

    /**
     * Get trigger chevron icon component name.
     */
    public function triggerIconComponent(): string
    {
        return ComponentPropResolver::heroiconComponent('chevron-down') ?? 'heroicon-o-chevron-down';
    }

    /**
     * Resolve dropdown menu position from config.
     */
    private function resolvePosition(?string $position): string
    {
        return ComponentPropResolver::resolveString(
            'basekit.components.dropdown-menu.positions',
            'basekit.components.dropdown-menu.default_position',
            'bottom-left',
            $position
        );
    }

    /**
     * Resolve trigger mode.
     */
    private function resolveTrigger(string $trigger): string
    {
        $allowed = ['click', 'hover'];

        return in_array($trigger, $allowed, true) ? $trigger : 'click';
    }

    /**
     * Resolve submenu alignment from root dropdown position.
     */
    private function submenuAlignment(): string
    {
        return str_ends_with($this->position, 'right') ? 'left' : 'right';
    }
}
