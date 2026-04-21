<?php

declare(strict_types=1);

namespace BasekitLaravel\BasekitLaravelUi\View\Components\Form;

use BasekitLaravel\BasekitLaravelUi\Enums\ControlStyle;
use BasekitLaravel\BasekitLaravelUi\Enums\LabelStyle;
use BasekitLaravel\BasekitLaravelUi\Enums\Size;
use BasekitLaravel\BasekitLaravelUi\Enums\Variant;
use BasekitLaravel\BasekitLaravelUi\View\Components\Support\ComponentPropResolver;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Str;
use Illuminate\View\Component;

/**
 * MultiSelect component for Basekit Laravel UI.
 *
 * A custom select dropdown allowing multiple selections with chips display.
 * Requires Alpine.js for interactive functionality. Supports labels, validation,
 * variants, icons, and custom styling options.
 */
class MultiSelect extends Component
{
    /**
     * The multiselect size.
     */
    public Size $size;

    /**
     * The multiselect variant.
     */
    public Variant $variant;

    /**
     * The multiselect label style.
     */
    public LabelStyle $labelStyle;

    /**
     * The multiselect control style.
     */
    public ControlStyle $controlStyle;

    /**
     * The selected option values.
     *
     * @var array<int, string>
     */
    public array $value;

    /**
     * Create a new component instance.
     *
     * @param  array<string, string>  $options
     * @param  array<int, string>|null  $value
     */
    public function __construct(
        /**
         * Label placement style: default, inset, or overlap.
         */
        string|LabelStyle $labelStyle = 'default',
        /**
         * Control style: default, pill, or underline.
         */
        string|ControlStyle $controlStyle = 'default',
        /**
         * The available options as key => label pairs.
         */
        public array $options = [],
        ?string $variant = null,
        ?string $size = null,
        /**
         * The control label.
         */
        public ?string $label = null,
        /**
         * The error message.
         */
        public ?string $error = null,
        /**
         * The hint text.
         */
        public ?string $hint = null,
        /**
         * Icon name for Heroicons.
         */
        public ?string $icon = null,
        /**
         * The placeholder text.
         */
        public ?string $placeholder = null,
        ?array $value = null,
        /**
         * Optional corner hint text.
         */
        public ?string $cornerHint = null
    ) {
        $this->labelStyle = $this->resolveLabelStyle($labelStyle);
        $this->controlStyle = $this->resolveControlStyle($controlStyle);
        $this->variant = $this->resolveVariant($variant);
        $this->size = $this->resolveSize($size);
        $this->value = $value ?? [];
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View
    {
        return view('basekit::components.form.multi-select');
    }

    /**
     * Get the control classes.
     */
    public function classes(): string
    {
        $classes = ['bk-multiselect__control', "bk-multiselect__control--{$this->size->value}"];

        if ($this->hasError()) {
            $classes[] = 'bk-multiselect__control--error';
            $classes[] = 'bk-multiselect__control--has-error-icon';
        } else {
            $classes[] = "bk-multiselect__control--{$this->variant->value}";
        }

        if ($this->icon !== null && $this->icon !== '') {
            $classes[] = 'bk-multiselect__control--with-icon';
        }

        if ($this->isInsetLabel()) {
            $classes[] = 'bk-multiselect__control--label-inset';
        }

        if ($this->isOverlapLabel()) {
            $classes[] = 'bk-multiselect__control--label-overlap';
        }

        if ($this->isPill()) {
            $classes[] = 'bk-multiselect__control--pill';
        }

        if ($this->isUnderline()) {
            $classes[] = 'bk-multiselect__control--underline';
        }

        return implode(' ', $classes);
    }

    /**
     * Get the container classes.
     */
    public function containerClasses(): string
    {
        $classes = ['bk-multiselect__container', "bk-multiselect__container--{$this->size->value}"];
        $classes[] = $this->hasError()
            ? 'bk-multiselect__container--error'
            : "bk-multiselect__container--{$this->variant->value}";

        if ($this->isInsetLabel()) {
            $classes[] = 'bk-multiselect__container--label-inset';
        }

        if ($this->isOverlapLabel()) {
            $classes[] = 'bk-multiselect__container--label-overlap';
        }

        if ($this->isPill()) {
            $classes[] = 'bk-multiselect__container--pill';
        }

        if ($this->isUnderline()) {
            $classes[] = 'bk-multiselect__container--underline';
        }

        return implode(' ', $classes);
    }

    /**
     * Get the base ID for the multiselect.
     */
    public function baseId(): string
    {
        return $this->attributes->get('id') ?? 'bk-multiselect-'.uniqid();
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
     * Get the Heroicon component name.
     */
    public function iconComponent(): ?string
    {
        return ComponentPropResolver::heroiconComponent($this->icon);
    }

    /**
     * Get the input name.
     */
    public function inputName(): ?string
    {
        return $this->attributes->get('name');
    }

    /**
     * Get the input name for array format (adds [] if not present).
     */
    public function inputNameForArray(): ?string
    {
        $name = $this->inputName();
        if ($name === null || $name === '') {
            return null;
        }

        return Str::endsWith($name, '[]') ? $name : $name.'[]';
    }

    /**
     * Check if the multiselect is disabled.
     */
    public function isDisabled(): bool
    {
        return $this->attributes->has('disabled');
    }

    /**
     * Get the list ID for the multiselect menu.
     */
    public function listId(): string
    {
        return $this->baseId().'-list';
    }

    /**
     * Get the options formatted as an array for Alpine.js.
     *
     * @return array<int, array{value: string, label: string}>
     */
    public function optionsList(): array
    {
        $list = [];
        foreach ($this->options as $optionValue => $optionLabel) {
            $list[] = ['value' => $optionValue, 'label' => $optionLabel];
        }

        return $list;
    }

    /**
     * Get the placeholder text.
     */
    public function placeholderText(): string
    {
        return $this->placeholder ?? 'Select options';
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
     * Resolve multiselect variant from config.
     */
    private function resolveVariant(?string $variant): Variant
    {
        return ComponentPropResolver::resolveEnum(
            Variant::class,
            'basekit.components.multi-select.variants',
            'basekit.components.multi-select.default_variant',
            $variant
        );
    }

    /**
     * Resolve multiselect size from config.
     */
    private function resolveSize(?string $size): Size
    {
        return ComponentPropResolver::resolveEnum(
            Size::class,
            'basekit.components.multi-select.sizes',
            'basekit.components.multi-select.default_size',
            $size
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
