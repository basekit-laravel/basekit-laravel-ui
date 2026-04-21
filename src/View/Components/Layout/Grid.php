<?php

declare(strict_types=1);

namespace BasekitLaravel\BasekitLaravelUi\View\Components\Layout;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

/**
 * Grid component for Basekit Laravel UI.
 *
 * A flexible multi-column layout component with configurable columns, gaps,
 * and optional responsive behavior for automatic column wrapping.
 */
class Grid extends Component
{
    /**
     * Number of columns.
     *
     * @var string Number of grid columns (e.g., '12', '6')
     */
    public string $cols;

    /**
     * Grid gap size.
     *
     * @var string Resolved from config ('xs', 'sm', 'md', 'lg', 'xl')
     */
    public string $gap;

    /**
     * Create a new component instance.
     */
    public function __construct(
        string|int|null $cols = null,
        ?string $gap = null,
        /**
         * Whether responsive grid behavior is enabled.
         *
         * @var bool Enable responsive column stacking (default: true)
         */
        public bool $responsive = true,
    ) {
        $this->cols = $this->resolveCols($cols);
        $this->gap = $this->resolveGap($gap);
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View
    {
        return view('basekit::components.layout.grid');
    }

    /**
     * Get the grid classes.
     */
    public function classes(): string
    {
        $classes = [
            'bk-grid',
            "bk-grid--cols-{$this->cols}",
            "bk-grid--gap-{$this->gap}",
        ];

        if ($this->responsive) {
            $classes[] = 'bk-grid--responsive';
        }

        return implode(' ', $classes);
    }

    /**
     * Resolve columns value.
     */
    private function resolveCols(string|int|null $cols): string
    {
        if ($cols !== null && $cols !== '') {
            return (string) $cols;
        }

        return (string) config('basekit-laravel-ui.components.grid.default_cols', '12');
    }

    /**
     * Resolve and validate grid gap from config.
     */
    private function resolveGap(?string $gap): string
    {
        $allowed = config('basekit-laravel-ui.components.grid.gaps', ['xs', 'sm', 'md', 'lg', 'xl']);
        if ($gap !== null && $gap !== '' && in_array($gap, $allowed, true)) {
            return $gap;
        }

        return config('basekit-laravel-ui.components.grid.default_gap', 'md');
    }
}
