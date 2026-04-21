<?php

declare(strict_types=1);

namespace BasekitLaravel\BasekitLaravelUi\View\Components\Form;

use BasekitLaravel\BasekitLaravelUi\Enums\Size;
use BasekitLaravel\BasekitLaravelUi\Enums\Variant;
use BasekitLaravel\BasekitLaravelUi\View\Components\Support\ComponentPropResolver;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Str;
use Illuminate\View\Component;

/**
 * Radio component for Basekit Laravel UI.
 *
 * A single radio button option component with support for labels, validation states,
 * and variants. Multiple radio components should share the same name attribute.
 */
class Radio extends Component
{
    /**
     * The resolved input ID for this render.
     */
    private ?string $resolvedInputId = null;

    /**
     * The radio size.
     */
    public Size $size;

    /**
     * The radio variant.
     */
    public Variant $variant;

    /**
     * Create a new component instance.
     */
    public function __construct(
        /**
         * Whether the radio is checked.
         */
        public bool $isChecked = false,
        ?string $variant = null,
        ?string $size = null,
        /**
         * The radio label.
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
         * The radio value.
         */
        public ?string $value = null,
    ) {
        $this->variant = $this->resolveVariant($variant);
        $this->size = $this->resolveSize($size);
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View
    {
        return view('basekit::components.form.radio');
    }

    /**
     * Get the radio classes.
     */
    public function classes(): string
    {
        $classes = ['bk-radio__control', "bk-radio__control--{$this->size->value}"];

        if ($this->error !== null && $this->error !== '') {
            $classes[] = 'bk-radio__control--error';
        } else {
            $classes[] = "bk-radio__control--{$this->variant->value}";
        }

        return implode(' ', $classes);
    }

    /**
     * Get or generate the radio input ID.
     */
    public function inputId(): string
    {
        if ($this->resolvedInputId !== null) {
            return $this->resolvedInputId;
        }

        $id = $this->attributes->get('id');
        if (is_string($id) && $id !== '') {
            return $this->resolvedInputId = $id;
        }

        return $this->resolvedInputId = 'bk-radio-'.Str::uuid();
    }

    /**
     * Check if component has an error.
     */
    public function hasError(): bool
    {
        return $this->error !== null;
    }

    /**
     * Resolve radio variant from config.
     */
    private function resolveVariant(?string $variant): Variant
    {
        return ComponentPropResolver::resolveEnum(
            Variant::class,
            'basekit.components.radio.variants',
            'basekit.components.radio.default_variant',
            $variant
        );
    }

    /**
     * Resolve radio size from config.
     */
    private function resolveSize(?string $size): Size
    {
        return ComponentPropResolver::resolveEnum(
            Size::class,
            'basekit.components.radio.sizes',
            'basekit.components.radio.default_size',
            $size
        );
    }
}
