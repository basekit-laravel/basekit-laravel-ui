<?php

declare(strict_types=1);

namespace BasekitLaravel\BasekitLaravelUi\View\Components\Form;

use BasekitLaravel\BasekitLaravelUi\Enums\ControlStyle;
use BasekitLaravel\BasekitLaravelUi\Enums\LabelStyle;
use BasekitLaravel\BasekitLaravelUi\Enums\Size;
use BasekitLaravel\BasekitLaravelUi\Enums\Variant;
use BasekitLaravel\BasekitLaravelUi\View\Components\Support\ComponentPropResolver;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

/**
 * Select component for Basekit Laravel UI.
 *
 * A flexible select component supporting labels, validation states, variants,
 * icons, and multiple visual styles.
 */
class Select extends Component
{
    /**
     * The select size.
     */
    public Size $size;

    /**
     * The select variant.
     */
    public Variant $variant;

    /**
     * The select label style.
     */
    public LabelStyle $labelStyle;

    /**
     * The select control style.
     */
    public ControlStyle $controlStyle;

    /**
     * Create a new component instance.
     *
     * @param  array<string, string>  $options
     */
    public function __construct(
        /**
         * Whether the select is disabled.
         */
        public bool $isDisabled = false,
        /**
         * Label placement style: default, inset, or overlap.
         */
        string|LabelStyle $labelStyle = 'default',
        /**
         * Control style: default, pill, or underline.
         */
        string|ControlStyle $controlStyle = 'default',
        /**
         * The select options as value-label pairs.
         */
        public array $options = [],
        /**
         * The select value.
         */
        public mixed $value = null,
        ?string $variant = null,
        ?string $size = null,
        /**
         * The select label text.
         */
        public ?string $label = null,
        /**
         * The select error message.
         */
        public ?string $error = null,
        /**
         * The select hint text.
         */
        public ?string $hint = null,
        /**
         * The select icon name (Heroicons).
         */
        public ?string $icon = null,
        /**
         * The select placeholder text.
         */
        public ?string $placeholder = null,
        /**
         * Custom label text for the explicit empty option when allowEmpty is enabled.
         */
        public ?string $emptyLabel = null,
        /**
         * An optional hint to display in the top-right corner of the select.
         */
        public ?string $cornerHint = null,
        /**
         * Whether an explicit empty option is available for selection.
         */
        public bool $allowEmpty = false
    ) {
        $this->labelStyle = $this->resolveLabelStyle($labelStyle);
        $this->controlStyle = $this->resolveControlStyle($controlStyle);
        $this->variant = $this->resolveVariant($variant);
        $this->size = $this->resolveSize($size);
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View
    {
        return view('basekit::components.form.select');
    }

    /**
     * Get the select classes.
     */
    public function classes(): string
    {
        $classes = ['bk-select__control', "bk-select__control--{$this->size->value}"];
        $classes[] = $this->hasError()
            ? 'bk-select__control--error bk-select__control--has-error-icon'
            : "bk-select__control--{$this->variant->value}";

        if ($this->icon !== null && $this->icon !== '') {
            $classes[] = 'bk-select__control--with-icon';
        }

        if ($this->isInsetLabel()) {
            $classes[] = 'bk-select__control--label-inset';
        }

        if ($this->isOverlapLabel()) {
            $classes[] = 'bk-select__control--label-overlap';
        }

        if ($this->isPill()) {
            $classes[] = 'bk-select__control--pill';
        }

        if ($this->isUnderline()) {
            $classes[] = 'bk-select__control--underline';
        }

        return implode(' ', $classes);
    }

    /**
     * Get the select container classes.
     */
    public function containerClasses(): string
    {
        $classes = ['bk-select__container', "bk-select__container--{$this->size->value}"];
        $classes[] = $this->hasError()
            ? 'bk-select__container--error'
            : "bk-select__container--{$this->variant->value}";

        if ($this->isInsetLabel()) {
            $classes[] = 'bk-select__container--label-inset';
        }

        if ($this->isOverlapLabel()) {
            $classes[] = 'bk-select__container--label-overlap';
        }

        if ($this->isPill()) {
            $classes[] = 'bk-select__container--pill';
        }

        if ($this->isUnderline()) {
            $classes[] = 'bk-select__container--underline';
        }

        return implode(' ', $classes);
    }

    /**
     * Get the Heroicon component name.
     */
    public function iconComponent(): ?string
    {
        return ComponentPropResolver::heroiconComponent($this->icon);
    }

    /**
     * Determine if a corner hint is present.
     */
    public function hasCornerHint(): bool
    {
        return $this->cornerHint !== null && $this->cornerHint !== '';
    }

    /**
     * Check if component has an error.
     */
    public function hasError(): bool
    {
        return $this->error !== null;
    }

    /**
     * Check if the select is disabled.
     */
    public function isDisabledAttribute(): bool
    {
        return $this->isDisabled;
    }

    /**
     * Determine if the top label row should render.
     */
    public function shouldShowTopLabel(): bool
    {
        return $this->labelStyle === LabelStyle::Default;
    }

    /**
     * Check if the inset label style is active.
     */
    public function isInsetLabel(): bool
    {
        return $this->labelStyle === LabelStyle::Inset;
    }

    /**
     * Check if the overlap label style is active.
     */
    public function isOverlapLabel(): bool
    {
        return $this->labelStyle === LabelStyle::Overlap;
    }

    /**
     * Check if the pill control style is active.
     */
    public function isPill(): bool
    {
        return $this->controlStyle === ControlStyle::Pill;
    }

    /**
     * Check if the underline control style is active.
     */
    public function isUnderline(): bool
    {
        return $this->controlStyle === ControlStyle::Underline;
    }

    /**
     * Resolve select size from config.
     */
    private function resolveSize(?string $size): Size
    {
        return ComponentPropResolver::resolveEnum(
            Size::class,
            'basekit.components.select.sizes',
            'basekit.components.select.default_size',
            $size
        );
    }

    /**
     * Resolve select variant from config.
     */
    private function resolveVariant(?string $variant): Variant
    {
        return ComponentPropResolver::resolveEnum(
            Variant::class,
            'basekit.components.select.variants',
            'basekit.components.select.default_variant',
            $variant
        );
    }

    /**
     * Resolve label style to a supported enum value.
     */
    private function resolveLabelStyle(string|LabelStyle $labelStyle): LabelStyle
    {
        if ($labelStyle instanceof LabelStyle) {
            return $labelStyle;
        }

        return LabelStyle::tryFrom(strtolower($labelStyle)) ?? LabelStyle::Default;
    }

    /**
     * Resolve control style to a supported enum value.
     */
    private function resolveControlStyle(string|ControlStyle $controlStyle): ControlStyle
    {
        if ($controlStyle instanceof ControlStyle) {
            return $controlStyle;
        }

        return ControlStyle::tryFrom(strtolower($controlStyle)) ?? ControlStyle::Default;
    }
}
