<?php

declare(strict_types=1);

namespace BasekitLaravel\BasekitLaravelUi\View\Components\Form;

use BasekitLaravel\BasekitLaravelUi\Enums\Size;
use BasekitLaravel\BasekitLaravelUi\Enums\Variant;
use BasekitLaravel\BasekitLaravelUi\View\Components\Support\ComponentPropResolver;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use Illuminate\Support\Str;

/**
 * Checkbox component for Basekit Laravel UI.
 *
 * A single checkbox input component with support for labels, validation states,
 * and variants. Independent of other checkboxes (can have unique names).
 */
class Checkbox extends Component
{
    /**
     * The resolved input ID for this render.
     */
    private ?string $resolvedInputId = null;

    /**
     * The checkbox size.
     */
    public Size $size;

    /**
     * The checkbox variant.
     */
    public Variant $variant;

    /**
     * Create a new component instance.
     */
    public function __construct(
        /**
         * Whether the checkbox is checked.
         */
        public bool $isChecked = false,
        ?string $variant = null,
        ?string $size = null,
        /**
         * The checkbox label text.
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
         * The checkbox value.
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
        return view('basekit::components.form.checkbox');
    }

    /**
     * Get the checkbox classes.
     */
    public function classes(): string
    {
        $classes = ['bk-checkbox__control', "bk-checkbox__control--{$this->size->value}"];
        $classes[] = $this->hasError()
            ? 'bk-checkbox__control--error'
            : "bk-checkbox__control--{$this->variant->value}";

        return implode(' ', $classes);
    }

    /**
     * Get the checkbox container classes.
     */
    public function containerClasses(): string
    {
        $classes = ['bk-checkbox__container'];
        if ($this->hasError()) {
            $classes[] = 'bk-checkbox__container--error';
        }

        return implode(' ', $classes);
    }

    /**
     * Get or generate the checkbox input ID.
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

        return $this->resolvedInputId = 'bk-checkbox-'.Str::uuid();
    }

    /**
     * Check if component has an error.
     */
    public function hasError(): bool
    {
        return $this->error !== null;
    }

    /**
     * Resolve the checkbox size, falling back to config default if not provided.
     */
    private function resolveSize(?string $size): Size
    {
        return ComponentPropResolver::resolveEnum(
            Size::class,
            'basekit.components.checkbox.sizes',
            'basekit.components.checkbox.default_size',
            $size
        );
    }

    /**
     * Resolve the checkbox variant, falling back to config default if not provided.
     */
    private function resolveVariant(?string $variant): Variant
    {
        return ComponentPropResolver::resolveEnum(
            Variant::class,
            'basekit.components.checkbox.variants',
            'basekit.components.checkbox.default_variant',
            $variant
        );
    }
}
