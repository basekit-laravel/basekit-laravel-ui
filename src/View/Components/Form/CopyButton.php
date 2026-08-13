<?php

declare(strict_types=1);

namespace BasekitLaravel\BasekitLaravelUi\View\Components\Form;

use BasekitLaravel\BasekitLaravelUi\Enums\Size;
use BasekitLaravel\BasekitLaravelUi\Enums\Variant;
use BasekitLaravel\BasekitLaravelUi\View\Components\Support\ComponentPropResolver;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

/**
 * Copy button component for Basekit Laravel UI.
 *
 * A button that copies a value to the clipboard via navigator.clipboard and
 * shows transient "copied" feedback. The value is passed through a data-*
 * attribute and read at runtime ($el.dataset.value), so arbitrary values are
 * never interpolated into an inline JavaScript expression.
 */
class CopyButton extends Component
{
    /**
     * The button size.
     */
    public Size $size;

    /**
     * The button variant.
     */
    public Variant $variant;

    /**
     * Create a new component instance.
     */
    public function __construct(
        /**
         * The text to copy to the clipboard.
         */
        public string $value,
        /**
         * Fallback button label used when no slot content is provided.
         */
        public ?string $label = null,
        /**
         * Text shown while the "copied" feedback is active.
         */
        public ?string $copiedLabel = null,
        /**
         * How long (in ms) the "copied" feedback stays visible.
         */
        public int $duration = 2000,
        /**
         * Heroicon name used as the default (idle) icon.
         */
        public string $icon = 'clipboard',
        /**
         * Heroicon name used while the "copied" feedback is active.
         */
        public string $copiedIcon = 'check',
        ?string $variant = null,
        ?string $size = null,
    ) {
        $this->variant = $this->resolveVariant($variant);
        $this->size = $this->resolveSize($size);
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View
    {
        return view('basekit::components.form.copy-button');
    }

    /**
     * Get the button classes based on variant and size.
     */
    public function classes(): string
    {
        return "bk-button bk-button--{$this->variant->value} bk-button--{$this->size->value}";
    }

    /**
     * Get the Heroicon component name for the idle icon.
     */
    public function iconComponent(): ?string
    {
        return ComponentPropResolver::heroiconComponent($this->icon);
    }

    /**
     * Get the Heroicon component name for the copied icon.
     */
    public function copiedIconComponent(): ?string
    {
        return ComponentPropResolver::heroiconComponent($this->copiedIcon);
    }

    /**
     * Resolve button size from config.
     */
    private function resolveSize(?string $size): Size
    {
        return ComponentPropResolver::resolveEnum(
            Size::class,
            'basekit.components.copy-button.sizes',
            'basekit.components.copy-button.default_size',
            $size
        );
    }

    /**
     * Resolve button variant from config.
     */
    private function resolveVariant(?string $variant): Variant
    {
        return ComponentPropResolver::resolveEnum(
            Variant::class,
            'basekit.components.copy-button.variants',
            'basekit.components.copy-button.default_variant',
            $variant
        );
    }
}
