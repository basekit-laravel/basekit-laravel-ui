<?php

declare(strict_types=1);

namespace BasekitLaravel\BasekitLaravelUi\View\Components\Dialog;

use BasekitLaravel\BasekitLaravelUi\View\Components\Support\ComponentPropResolver;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

/**
 * Accordion component for Basekit Laravel UI.
 *
 * Renders expandable sections in single or multiple-open mode.
 */
class Accordion extends Component
{
    /**
     * Accordion size (sm, md, lg).
     */
    public string $size;

    /**
     * Accordion variant (default, bordered, flush, separated).
     */
    public string $variant;

    /**
     * Create a new component instance.
     *
     * @param  array<int, array<string, mixed>>  $items
     */
    public function __construct(
        /**
         * Accordion items.
         */
        public array $items = [],
        /**
         * Whether multiple panels can be open.
         */
        public bool $isMultiple = false,
        /**
         * Initial active item value(s).
         */
        public mixed $active = null,
        ?string $variant = null,
        ?string $size = null
    ) {
        $this->variant = $this->resolveVariant($variant);
        $this->size = $this->resolveSize($size);
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View
    {
        return view('basekit::components.dialog.accordion');
    }

    /**
     * Get accordion wrapper classes.
     */
    public function classes(): string
    {
        $classes = ['bk-accordion'];

        // Add variant class
        $classes[] = "bk-accordion--{$this->variant}";

        // Add size class
        if ($this->size !== 'md') {
            $classes[] = "bk-accordion--{$this->size}";
        }

        return implode(' ', $classes);
    }

    /**
     * Get chevron icon component name.
     */
    public function chevronIcon(): string
    {
        return ComponentPropResolver::heroiconComponent('chevron-down') ?? '';
    }

    /**
     * Get a JSON-safe JavaScript expression for an item's value.
     *
     * @param  array<string, mixed>  $item
     */
    public function itemValueExpression(array $item): string
    {
        $encoded = json_encode((string) ($item['value'] ?? ''), JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_AMP | JSON_HEX_QUOT);

        return $encoded !== false ? $encoded : '""';
    }

    /**
     * Build Alpine x-data object for accordion behavior.
     */
    public function xDataAttribute(): string
    {
        $initialActive = $this->initialActiveExpression();

        if ($this->isMultiple) {
            return "{ active: {$initialActive}, toggle(value) { if (this.active.includes(value)) { this.active = this.active.filter(v => v !== value); } else { this.active.push(value); } }, isActive(value) { return this.active.includes(value); } }";
        }

        return "{ active: {$initialActive}, toggle(value) { this.active = this.active === value ? null : value; }, isActive(value) { return this.active === value; } }";
    }

    /**
     * Resolve initial active value(s) to a JavaScript expression.
     */
    private function initialActiveExpression(): string
    {
        if ($this->isMultiple) {
            $active = is_array($this->active) ? array_values($this->active) : [];
            $encoded = json_encode($active, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_AMP | JSON_HEX_QUOT);

            return $encoded !== false ? $encoded : '[]';
        }

        if (! is_scalar($this->active)) {
            return 'null';
        }

        $encoded = json_encode((string) $this->active, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_AMP | JSON_HEX_QUOT);

        return $encoded !== false ? $encoded : 'null';
    }

    /**
     * Resolve size to valid value.
     */
    private function resolveSize(?string $size): string
    {
        return ComponentPropResolver::resolveString(
            'basekit.components.accordion.sizes',
            'basekit.components.accordion.default_size',
            'md',
            $size
        );
    }

    /**
     * Resolve variant to valid value.
     */
    private function resolveVariant(?string $variant): string
    {
        return ComponentPropResolver::resolveString(
            'basekit.components.accordion.variants',
            'basekit.components.accordion.default_variant',
            'default',
            $variant
        );
    }
}
