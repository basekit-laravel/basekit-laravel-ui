<?php

declare(strict_types=1);

namespace BasekitLaravel\BasekitLaravelUi\View\Components\Navigation;

use BasekitLaravel\BasekitLaravelUi\View\Components\Support\ComponentPropResolver;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

/**
 * Breadcrumb component for Basekit Laravel UI.
 *
 * Renders hierarchical navigation with configurable separators and optional icons.
 */
class Breadcrumb extends Component
{
    /**
     * Separator icon name.
     */
    public string $separator;

    /**
     * Breadcrumb size token.
     */
    public string $size;

    /**
     * Create a new component instance.
     *
     * @param  array<int, array<string, mixed>>  $items
     */
    public function __construct(
        /**
         * Breadcrumb items.
         */
        public array $items = [],
        ?string $separator = null,
        ?string $size = null
    ) {
        $this->separator = $separator ?? config('basekit-laravel-ui.components.breadcrumb.separator', 'chevron-right');
        $this->size = ComponentPropResolver::resolveString(
            'basekit.components.breadcrumb.sizes',
            'basekit.components.breadcrumb.default_size',
            'md',
            $size,
        );
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View
    {
        return view('basekit::components.navigation.breadcrumb');
    }

    /**
     * Get a breadcrumb item icon component name.
     */
    public function itemIcon(?string $icon): ?string
    {
        if ($icon === null || $icon === '') {
            return null;
        }

        return ComponentPropResolver::heroiconComponent($icon);
    }

    /**
     * Get the separator icon component name.
     */
    public function separatorIcon(): string
    {
        return ComponentPropResolver::heroiconComponent($this->separator) ?? '';
    }

    /**
     * Get the breadcrumb classes.
     */
    public function classes(): string
    {
        return "bk-breadcrumb bk-breadcrumb--{$this->size}";
    }
}
