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
 * Toggle component for Basekit Laravel UI.
 *
 * A switch-style toggle component for boolean values. Requires Alpine.js
 * for interactive functionality. Supports labels, validation states, and sizes.
 */
class Toggle extends Component
{
    /**
     * The resolved input ID for this render.
     */
    private ?string $resolvedInputId = null;

    /**
     * The toggle variant.
     */
    public Variant $variant;

    /**
     * The toggle size.
     */
    public Size $size;

    /**
     * Create a new component instance.
     */
    public function __construct(
        ?string $variant = null,
        ?string $size = null,
        /**
         * The toggle label.
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
         * The toggle value.
         */
        public ?string $value = null,
        /**
         * Whether the toggle is checked.
         */
        public bool $isChecked = false
    ) {
        $this->variant = $this->resolveVariant($variant);
        $this->size = $this->resolveSize($size);
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View
    {
        return view('basekit::components.form.toggle');
    }

    /**
     * Get the toggle classes.
     */
    public function classes(): string
    {
        $classes = ['bk-toggle__button', "bk-toggle__button--{$this->size->value}"];

        if ($this->error !== null && $this->error !== '') {
            $classes[] = 'bk-toggle__button--error';
        } else {
            $classes[] = "bk-toggle__button--{$this->variant->value}";
        }

        return implode(' ', $classes);
    }

    /**
     * Check if the toggle is disabled.
     */
    public function isDisabled(): bool
    {
        return $this->attributes->has('disabled');
    }

    /**
     * Resolve input id from attributes.
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

        $name = $this->attributes->get('name');
        if (is_string($name) && $name !== '') {
            return $this->resolvedInputId = $name;
        }

        return $this->resolvedInputId = 'bk-toggle-'.Str::uuid();
    }

    /**
     * Build Alpine state for the toggle wrapper.
     *
     * @return array<string, bool>
     */
    public function alpineState(): array
    {
        return [
            'on' => $this->isChecked,
            'disabled' => $this->isDisabled(),
        ];
    }

    /**
     * Check if component has an error.
     */
    public function hasError(): bool
    {
        return $this->error !== null;
    }

    /**
     * Resolve toggle variant from config.
     */
    private function resolveVariant(?string $variant): Variant
    {
        return ComponentPropResolver::resolveEnum(
            Variant::class,
            'basekit.components.toggle.variants',
            'basekit.components.toggle.default_variant',
            $variant
        );
    }

    /**
     * Resolve toggle size from config.
     */
    private function resolveSize(?string $size): Size
    {
        return ComponentPropResolver::resolveEnum(
            Size::class,
            'basekit.components.toggle.sizes',
            'basekit.components.toggle.default_size',
            $size
        );
    }
}
