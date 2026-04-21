<?php

declare(strict_types=1);

namespace BasekitLaravel\BasekitLaravelUi\View\Components\Layout;

use BasekitLaravel\BasekitLaravelUi\View\Components\Support\ComponentPropResolver;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

/**
 * Divider component for Basekit Laravel UI.
 *
 * A visual separator component supporting horizontal/vertical orientation,
 * multiple style variants, and optional label text.
 */
class Divider extends Component
{
    /**
     * Divider orientation.
     *
     * @var string Direction ('horizontal', 'vertical')
     */
    public string $orientation;

    /**
     * Divider style variant.
     *
     * @var string Resolved from config ('solid', 'dashed', 'dotted')
     */
    public string $variant;

    /**
     * Divider tone preset.
     *
     * @var string Semantic color intensity ('light', 'default', 'dark')
     */
    public string $tone;

    /**
     * Create a new component instance.
     */
    public function __construct(
        string $orientation = 'horizontal',
        ?string $variant = null,
        /**
         * Optional divider label.
         *
         * @var string|null Text displayed along the divider
         */
        public ?string $label = null,
        ?string $tone = null,
    ) {
        $this->orientation = $this->resolveOrientation($orientation);
        $this->variant = $this->resolveVariant($variant);
        $this->tone = $this->resolveTone($tone);
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View
    {
        return view('basekit::components.layout.divider');
    }

    /**
     * Get divider classes.
     */
    public function classes(): string
    {
        return "bk-divider bk-divider--{$this->orientation} bk-divider--{$this->variant} bk-divider-tone--{$this->tone}";
    }

    /**
     * Check if orientation is horizontal.
     */
    public function isHorizontal(): bool
    {
        return $this->orientation === 'horizontal';
    }

    /**
     * Resolve and validate orientation value.
     */
    private function resolveOrientation(string $orientation): string
    {
        return ComponentPropResolver::resolveString(
            'basekit.components.divider.orientations',
            'basekit.components.divider.default_orientation',
            'horizontal',
            $orientation
        );
    }

    /**
     * Resolve and validate divider variant from config.
     */
    private function resolveVariant(?string $variant): string
    {
        return ComponentPropResolver::resolveString(
            'basekit.components.divider.variants',
            'basekit.components.divider.default_variant',
            'solid',
            $variant
        );
    }

    /**
     * Resolve and validate divider tone from config.
     */
    private function resolveTone(?string $tone): string
    {
        return ComponentPropResolver::resolveString(
            'basekit.components.divider.tones',
            'basekit.components.divider.default_tone',
            'default',
            $tone
        );
    }
}
