<?php

declare(strict_types=1);

namespace BasekitLaravel\BasekitLaravelUi\View\Components\Navigation;

use BasekitLaravel\BasekitLaravelUi\Enums\Variant;
use BasekitLaravel\BasekitLaravelUi\View\Components\Support\ComponentPropResolver;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

/**
 * Link component for Basekit Laravel UI.
 *
 * Renders stylized links with configurable variants, icons, and external-link behavior.
 */
class Link extends Component
{
    /**
     * Link variant.
     */
    public string $variant;

    /**
     * Create a new component instance.
     */
    public function __construct(
        /**
         * Whether link should open in new tab.
         */
        public bool $isExternal = false,
        ?string $variant = null,
        /**
         * Link href.
         */
        public ?string $href = null,
        /**
         * Heroicon name.
         */
        public ?string $icon = null
    ) {
        $this->variant = $this->resolveVariant($variant);
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View
    {
        return view('basekit::components.navigation.link');
    }

    /**
     * Get the link classes.
     */
    public function classes(): string
    {
        return "bk-link bk-link--{$this->variant}";
    }

    /**
     * Get external-link icon component name.
     */
    public function externalIconComponent(): string
    {
        return ComponentPropResolver::heroiconComponent('arrow-top-right-on-square') ?? '';
    }

    /**
     * Get the Heroicon component name.
     */
    public function iconComponent(): ?string
    {
        if ($this->icon === null || $this->icon === '') {
            return null;
        }

        return ComponentPropResolver::heroiconComponent($this->icon);
    }

    /**
     * Resolve link variant from config.
     */
    private function resolveVariant(?string $variant): string
    {
        return ComponentPropResolver::resolveString(
            'basekit.components.link.variants',
            'basekit.components.link.default_variant',
            Variant::default()->value,
            $variant
        );
    }
}
