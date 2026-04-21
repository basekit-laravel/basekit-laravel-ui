<?php

declare(strict_types=1);

namespace BasekitLaravel\BasekitLaravelUi\View\Components\Feedback;

use BasekitLaravel\BasekitLaravelUi\View\Components\Support\ComponentPropResolver;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

/**
 * Spinner component for Basekit Laravel UI.
 *
 * A loading spinner component indicating an ongoing process. Supports multiple
 * sizes and variants with optional label for accessibility.
 */
class Spinner extends Component
{
    /**
     * The spinner size.
     *
     * @var string Resolved from config ('xs', 'sm', 'md', 'lg', 'xl')
     */
    public string $size;

    /**
     * The spinner variant.
     *
     * @var string Resolved from config (e.g., 'primary', 'secondary', 'ghost', 'white')
     */
    public string $variant;

    /**
     * Create a new component instance.
     */
    public function __construct(
        ?string $size = null,
        ?string $variant = null,
        /**
         * Optional label text (for screen readers).
         *
         * @var string|null Screen reader accessible label
         */
        public ?string $label = null
    ) {
        $this->size = $this->resolveSize($size);
        $this->variant = $this->resolveVariant($variant);
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View
    {
        return view('basekit::components.feedback.spinner');
    }

    /**
     * Get the spinner classes.
     */
    public function classes(): string
    {
        return "bk-spinner__icon bk-spinner__icon--{$this->size} bk-spinner__icon--{$this->variant}";
    }

    /**
     * Resolve and validate spinner size from config.
     */
    private function resolveSize(?string $size): string
    {
        return ComponentPropResolver::resolveString(
            'basekit.components.spinner.sizes',
            'basekit.components.spinner.default_size',
            'md',
            $size
        );
    }

    /**
     * Resolve and validate spinner variant from config.
     */
    private function resolveVariant(?string $variant): string
    {
        return ComponentPropResolver::resolveString(
            'basekit.components.spinner.variants',
            'basekit.components.spinner.default_variant',
            'primary',
            $variant
        );
    }
}
