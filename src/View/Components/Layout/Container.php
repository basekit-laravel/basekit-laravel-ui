<?php

declare(strict_types=1);

namespace BasekitLaravel\BasekitLaravelUi\View\Components\Layout;

use BasekitLaravel\BasekitLaravelUi\View\Components\Support\ComponentPropResolver;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

/**
 * Container component for Basekit Laravel UI.
 *
 * A layout container with configurable max-width sizes and optional centering.
 * Used as the main wrapper for page content with responsive behavior.
 */
class Container extends Component
{
    /**
     * The container size.
     *
     * @var string Resolved from config ('sm', 'md', 'lg', 'xl', 'full')
     */
    public string $size;

    /**
     * Create a new component instance.
     */
    public function __construct(
        /**
         * Whether container should be centered.
         *
         * @var bool Horizontally center the container (default: true)
         */
        public bool $isCentered = true,
        ?string $size = null
    ) {
        $this->size = $this->resolveSize($size);
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View
    {
        return view('basekit::components.layout.container');
    }

    /**
     * Get the container classes.
     */
    public function classes(): string
    {
        $classes = [
            'w-full',
            $this->maxWidthClass(),
        ];

        if ($this->isCentered) {
            $classes[] = 'mx-auto';
        }

        return implode(' ', $classes);
    }

    /**
     * Map configured size to a max-width utility class.
     */
    private function maxWidthClass(): string
    {
        return match ($this->size) {
            'sm' => 'max-w-xl',
            'md' => 'max-w-2xl',
            'lg' => 'max-w-4xl',
            'xl' => 'max-w-7xl',
            'full' => 'max-w-none',
            default => 'max-w-4xl',
        };
    }

    /**
     * Resolve and validate container size from config.
     */
    private function resolveSize(?string $size): string
    {
        return ComponentPropResolver::resolveString(
            'basekit.components.container.sizes',
            'basekit.components.container.default_size',
            'lg',
            $size
        );
    }
}
