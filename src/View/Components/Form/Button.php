<?php

declare(strict_types=1);

namespace BasekitLaravel\BasekitLaravelUi\View\Components\Form;

use BasekitLaravel\BasekitLaravelUi\Enums\Orientation;
use BasekitLaravel\BasekitLaravelUi\Enums\Size;
use BasekitLaravel\BasekitLaravelUi\Enums\Variant;
use BasekitLaravel\BasekitLaravelUi\View\Components\Support\ComponentColorResolver;
use BasekitLaravel\BasekitLaravelUi\View\Components\Support\ComponentPropResolver;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

/****
 * Button component for Basekit Laravel UI.
 *
 * A versatile button component supporting various styles, sizes, icons, and states.
 * Can be used for form submissions or general actions. Independent of other buttons.
 */
class Button extends Component
{
    /**
     * Icon orientation relative to button text.
     */
    public Orientation $iconOrientation;

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
         * The HTML tag to render ('button' or 'a').
         */
        public string $as = 'button',
        /**
         * URL for <a> tag. When set, renders as <a> instead of <button>.
         */
        public ?string $href = null,
        /**
         * The button HTML type attribute (only applies when $as is 'button').
         */
        public string $type = 'button',
        string $iconOrientation = Orientation::Left->value,
        /**
         * Whether the button should span full width.
         */
        public bool $isFullWidth = false,
        /**
         * Whether to show loading state.
         */
        public bool $isLoading = false,
        ?string $variant = null,
        ?string $size = null,
        /**
         * Icon name for Heroicons.
         */
        public ?string $icon = null,
        /**
         * The button border-radius variant.
         */
        public ?string $rounded = null,
        /**
         * Quick color shortcut. Sets background + text + auto-darkens for hover.
         */
        public ?string $color = null,
        /**
         * Custom background color.
         */
        public ?string $background = null,
        /**
         * Custom text color.
         */
        public ?string $text = null,
        /**
         * Custom border color.
         */
        public ?string $border = null,
        /**
         * Custom hover background color.
         */
        public ?string $hoverBackground = null,
        /**
         * Custom hover text color.
         */
        public ?string $hoverText = null,
        /**
         * Custom hover border color.
         */
        public ?string $hoverBorder = null,
        /**
         * Additional classes for the prefix slot wrapper.
         */
        public ?string $prefixClass = null,
        /**
         * Additional classes for the suffix slot wrapper.
         */
        public ?string $suffixClass = null,
        /**
         * Additional classes for the content wrapper.
         */
        public ?string $contentClass = null,
    ) {
        if ($this->href !== null) {
            $this->as = 'a';
        }
        $this->iconOrientation = $this->resolveOrientation($iconOrientation);
        $this->variant = $this->resolveVariant($variant);
        $this->size = $this->resolveSize($size);
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View
    {
        return view('basekit::components.form.button');
    }

    /**
     * Get the button classes based on variant, size, and state.
     */
    public function classes(): string
    {
        $classes = [
            'bk-button',
            "bk-button--{$this->variant->value}",
            "bk-button--{$this->size->value}",
        ];

        if ($this->isFullWidth) {
            $classes[] = 'bk-button--full-width';
        }

        if ($this->rounded !== null) {
            $classes[] = "bk-button--rounded-{$this->rounded}";
        }

        return implode(' ', $classes);
    }

    /**
     * Get the inline color style string based on color props.
     */
    public function colorStyle(): ?string
    {
        return ComponentColorResolver::resolve(
            'button',
            $this->variant->value,
            $this->color,
            $this->background,
            $this->text,
            $this->border,
            $this->hoverBackground,
            $this->hoverText,
            $this->hoverBorder,
        );
    }

    /**
     * Check if the icon prop is set.
     */
    public function hasIcon(): bool
    {
        return $this->icon !== null;
    }

    /**
     * Get the Heroicon component name based on icon style configuration.
     */
    public function iconComponent(): ?string
    {
        return ComponentPropResolver::heroiconComponent($this->icon);
    }

    /**
     * Resolve and validate icon orientation.
     */
    private function resolveOrientation(string $orientation): Orientation
    {
        return ComponentPropResolver::resolveDefaultEnum(Orientation::class, $orientation);
    }

    /**
     * Resolve button size from config.
     */
    private function resolveSize(?string $size): Size
    {
        return ComponentPropResolver::resolveEnum(
            Size::class,
            'basekit.components.button.sizes',
            'basekit.components.button.default_size',
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
            'basekit.components.button.variants',
            'basekit.components.button.default_variant',
            $variant
        );
    }
}
