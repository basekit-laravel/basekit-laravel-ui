<?php

declare(strict_types=1);

namespace BasekitLaravel\BasekitLaravelUi\View\Components\Feedback;

use BasekitLaravel\BasekitLaravelUi\Enums\Size;
use BasekitLaravel\BasekitLaravelUi\Enums\Variant;
use BasekitLaravel\BasekitLaravelUi\View\Components\Support\ComponentPropResolver;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

/**
 * EmptyState component for Basekit Laravel UI.
 *
 * A component for displaying empty states with icon, title, and description.
 * Commonly used when no data is available or a container is empty. Supports
 * multiple display variants and size options.
 */
class EmptyState extends Component
{
    /**
     * The empty state size.
     *
     * @var string Resolved from config ('sm', 'md', 'lg')
     */
    public string $size;

    /**
     * The empty state variant.
     *
     * @var string Resolved from config (e.g., 'primary', 'secondary', 'success', 'warning', 'danger', 'info', 'ghost')
     */
    public string $variant;

    /**
     * The Heroicon name to display.
     *
     * @var string|null Heroicon name (default: 'inbox')
     */
    public ?string $icon;

    /**
     * Create a new component instance.
     */
    public function __construct(
        ?string $variant = null,
        ?string $size = null,
        /**
         * The empty state title.
         *
         * @var string|null Optional title text
         */
        public ?string $title = null,
        /**
         * The empty state description.
         *
         * @var string|null Optional description text
         */
        public ?string $description = null,
        ?string $icon = null
    ) {
        $this->variant = $this->resolveVariant($variant);
        $this->size = $this->resolveSize($size);
        $this->icon = $icon ?? 'inbox';
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View
    {
        return view('basekit::components.feedback.empty-state');
    }

    /**
     * Get the empty state classes.
     */
    public function classes(): string
    {
        return "bk-empty-state bk-empty-state--{$this->variant} bk-empty-state--{$this->size}";
    }

    /**
     * Get the Heroicon component name based on icon style configuration.
     */
    public function iconComponent(): string
    {
        return ComponentPropResolver::heroiconComponent($this->icon) ?? '';
    }

    /**
     * Resolve and validate empty state size from config.
     */
    private function resolveSize(?string $size): string
    {
        return ComponentPropResolver::resolveString(
            'basekit.components.empty-state.sizes',
            'basekit.components.empty-state.default_size',
            Size::default()->value,
            $size
        );
    }

    /**
     * Resolve and validate empty state variant from config.
     */
    private function resolveVariant(?string $variant): string
    {
        return ComponentPropResolver::resolveString(
            'basekit.components.empty-state.variants',
            'basekit.components.empty-state.default_variant',
            Variant::default()->value,
            $variant
        );
    }
}
