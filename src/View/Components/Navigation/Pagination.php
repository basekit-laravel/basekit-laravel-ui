<?php

declare(strict_types=1);

namespace BasekitLaravel\BasekitLaravelUi\View\Components\Navigation;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

/**
 * Pagination component for Basekit Laravel UI.
 *
 * Renders page navigation links with previous/next controls and configurable window size.
 */
class Pagination extends Component
{
    /**
     * Current page number.
     */
    public int $currentPage;

    /**
     * Number of pages displayed on each side.
     */
    public int $onEachSide;

    /**
     * Total number of pages.
     */
    public int $totalPages;

    /**
     * Pagination rendering type.
     */
    public string $type;

    /**
     * Per-page selector options.
     *
     * @var array<int, int>
     */
    public array $perPageOptions;

    /**
     * Create a new component instance.
     *
     * @param  array<int, int|string>  $perPageOptions
     */
    public function __construct(
        int $currentPage = 1,
        int $totalPages = 1,
        /**
         * Items per page.
         */
        public int $perPage = 15,
        /**
         * Total number of items.
         */
        public int $total = 0,
        int $onEachSide = 2,
        /**
         * Pagination type ("full" or "simple").
         */
        string $type = 'full',
        /**
         * Previous button label text.
         */
        public string $previousLabel = 'Previous',
        /**
         * Next button label text.
         */
        public string $nextLabel = 'Next',
        /**
         * Whether to render the page info text.
         */
        public bool $showInfo = false,
        /**
         * Page info template text.
         */
        public string $infoText = 'Showing :from to :to of :total results',
        /**
         * Whether to render the built-in per-page selector.
         */
        public bool $showPerPage = false,
        /**
         * Per-page selector label.
         */
        public string $perPageLabel = 'Per page:',
        /**
         * Query string key for per-page selector.
         */
        public string $perPageName = 'per_page',
        array $perPageOptions = [15, 30, 50],
        /**
         * Base URL path for pagination links.
         */
        public ?string $path = null,
    ) {
        $this->totalPages = max(1, $totalPages);
        $this->currentPage = max(1, min($currentPage, $this->totalPages));
        $this->onEachSide = max(0, $onEachSide);
        $this->type = in_array($type, ['full', 'simple'], true) ? $type : 'full';
        $this->perPageOptions = $this->normalizePerPageOptions($perPageOptions);
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View
    {
        return view('basekit::components.navigation.pagination');
    }

    /**
     * Get the pages to display.
     *
     * @return array<int, int>
     */
    public function pages(): array
    {
        $pages = [];
        $start = max(1, $this->currentPage - $this->onEachSide);
        $end = min($this->totalPages, $this->currentPage + $this->onEachSide);

        for ($i = $start; $i <= $end; $i++) {
            $pages[] = $i;
        }

        return $pages;
    }

    /**
     * Check if on first page.
     */
    public function onFirstPage(): bool
    {
        return $this->currentPage === 1;
    }

    /**
     * Check if on last page.
     */
    public function onLastPage(): bool
    {
        return $this->currentPage === $this->totalPages;
    }

    /**
     * Build page URL.
     */
    public function pageUrl(int $page): string
    {
        $basePath = $this->path ?? '';
        $separator = str_contains($basePath, '?') ? '&' : '?';

        return "{$basePath}{$separator}page={$page}";
    }

    /**
     * First visible item number for the current page.
     */
    public function firstItem(): int
    {
        if ($this->total <= 0) {
            return 0;
        }

        return (($this->currentPage - 1) * max(1, $this->perPage)) + 1;
    }

    /**
     * Last visible item number for the current page.
     */
    public function lastItem(): int
    {
        if ($this->total <= 0) {
            return 0;
        }

        return min($this->total, $this->currentPage * max(1, $this->perPage));
    }

    /**
     * Build rendered page info text from template tokens.
     */
    public function renderedInfoText(): string
    {
        return strtr($this->infoText, [
            ':from' => (string) $this->firstItem(),
            ':to' => (string) $this->lastItem(),
            ':total' => (string) $this->total,
        ]);
    }

    /**
     * Check if per-page selector should be rendered.
     */
    public function hasPerPageSelector(): bool
    {
        return $this->showPerPage && count($this->perPageOptions) > 0;
    }

    /**
     * @param  array<int, int|string>  $options
     * @return array<int, int>
     */
    protected function normalizePerPageOptions(array $options): array
    {
        $normalized = array_values(array_unique(array_filter(
            array_map(static fn (int|string $value): int => (int) $value, $options),
            static fn (int $value): bool => $value > 0,
        )));

        sort($normalized);

        return $normalized;
    }
}
