<?php

declare(strict_types=1);

namespace BasekitLaravel\BasekitLaravelUi\View\Components\Display;

use BasekitLaravel\BasekitLaravelUi\View\Components\Support\ComponentPropResolver;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

/**
 * Description list component for Basekit Laravel UI.
 *
 * A semantic component for displaying term-definition pairs with support
 * for multiple layout variants and spacing options.
 */
class DescriptionList extends Component
{
    /**
     * The description list gap size.
     *
     * @var string Resolved from config ('sm', 'md', 'lg')
     */
    public string $gap;

    /**
     * The description list variant.
     *
     * @var string Resolved from config ('default', 'horizontal', 'striped')
     */
    public string $variant;

    /**
     * Description list items for auto-rendering.
     *
     * @var array<int, array{term: string, description: string}>
     */
    public array $items;

    /**
     * Create a new component instance.
     *
     * @param  array<int, array{term: string, description: string}>  $items
     */
    public function __construct(
        ?string $variant = null,
        ?string $gap = null,
        array $items = [],
    ) {
        $this->variant = $this->resolveVariant($variant);
        $this->gap = $this->resolveGap($gap);
        $this->items = $this->normalizeItems($items);
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View
    {
        return view('basekit::components.display.description-list');
    }

    /**
     * Get the description list classes.
     */
    public function classes(): string
    {
        return "bk-description-list bk-description-list--{$this->variant} bk-description-list--gap-{$this->gap}";
    }

    /**
     * Determine if normalized items are available for auto-rendering.
     */
    public function hasItems(): bool
    {
        return $this->items !== [];
    }

    /**
     * Resolve and validate description list gap from config.
     */
    private function resolveGap(?string $gap): string
    {
        return ComponentPropResolver::resolveString(
            'basekit.components.description-list.gaps',
            'basekit.components.description-list.default_gap',
            'md',
            $gap
        );
    }

    /**
     * Resolve and validate description list variant from config.
     */
    private function resolveVariant(?string $variant): string
    {
        return ComponentPropResolver::resolveString(
            'basekit.components.description-list.variants',
            'basekit.components.description-list.default_variant',
            'default',
            $variant
        );
    }

    /**
     * Normalize supported items formats into [{term, description}] shape.
     *
     * Supports:
     * - Associative arrays: ['Name' => 'John']
     * - List of objects: [['term' => 'Name', 'description' => 'John']]
     * - List tuples: [['Name', 'John']]
     * - Aliases: label/value
     *
     * @param  array<mixed>  $items
     * @return array<int, array{term: string, description: string}>
     */
    private function normalizeItems(array $items): array
    {
        $normalized = [];

        if (! array_is_list($items)) {
            foreach ($items as $term => $description) {
                if (! is_string($description) && ! is_int($description) && $description !== null) {
                    continue;
                }

                $normalized[] = [
                    'term' => (string) $term,
                    'description' => (string) ($description ?? ''),
                ];
            }

            return $normalized;
        }

        foreach ($items as $item) {
            if (is_array($item)) {
                $term = $item['term'] ?? $item['label'] ?? ($item[0] ?? null);
                $description = $item['description'] ?? $item['value'] ?? ($item[1] ?? null);

                if ((! is_scalar($term) && $term !== null) || (! is_scalar($description) && $description !== null)) {
                    continue;
                }

                if ($term === null) {
                    continue;
                }

                $normalized[] = [
                    'term' => (string) $term,
                    'description' => (string) ($description ?? ''),
                ];
            }
        }

        return $normalized;
    }
}
