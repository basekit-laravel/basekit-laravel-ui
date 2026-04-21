<?php

declare(strict_types=1);

namespace BasekitLaravel\BasekitLaravelUi\View\Components\Display;

use BasekitLaravel\BasekitLaravelUi\Enums\Variant;
use BasekitLaravel\BasekitLaravelUi\View\Components\Support\ComponentPropResolver;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

/**
 * Badge component for Basekit Laravel UI.
 *
 * A small decorative label supporting variants, sizes, icons, and dot indicators.
 * Commonly used for status, counts, or category tags.
 */
class Badge extends Component
{
    /**
     * The badge size.
     *
     * @var string Resolved from config ('sm', 'md', 'lg')
     */
    public string $size;

    /**
     * The badge variant.
     *
     * @var string Resolved from config (e.g., 'primary', 'secondary', 'success', 'warning', 'danger', 'info', 'ghost')
     */
    public string $variant;

    /**
     * Create a new component instance.
     */
    public function __construct(
        /**
         * Whether to display a dot indicator.
         *
         * @var bool Show dot indicator instead of full badge (default: false)
         */
        public bool $isDot = false,
        ?string $variant = null,
        ?string $size = null,
        /**
         * Optional Heroicon name.
         *
         * @var string|null Heroicon name (e.g., 'check')
         */
        public ?string $icon = null
    ) {
        $this->variant = $this->resolveVariant($variant);
        $this->size = $this->resolveSize($size);
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View
    {
        return view('basekit::components.display.badge');
    }

    /**
     * Get the badge classes.
     */
    public function classes(): string
    {
        return "bk-badge bk-badge--{$this->variant} bk-badge--{$this->size}";
    }

    /**
     * Check if icon prop is set.
     */
    public function hasIcon(): bool
    {
        return $this->icon !== null && $this->icon !== '';
    }

    /**
     * Resolve the Heroicon component name based on icon style configuration.
     */
    public function iconComponent(): ?string
    {
        return ComponentPropResolver::heroiconComponent($this->icon);
    }

    /**
     * Resolve and validate badge size from config.
     */
    private function resolveSize(?string $size): string
    {
        return ComponentPropResolver::resolveString(
            'basekit.components.badge.sizes',
            'basekit.components.badge.default_size',
            'md',
            $size
        );
    }

    /**
     * Resolve and validate badge variant from config.
     */
    private function resolveVariant(?string $variant): string
    {
        return ComponentPropResolver::resolveString(
            'basekit.components.badge.variants',
            'basekit.components.badge.default_variant',
            Variant::Secondary->value,
            $variant
        );
    }
}
