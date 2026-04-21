<?php

declare(strict_types=1);

namespace BasekitLaravel\BasekitLaravelUi\View\Components\Display;

use BasekitLaravel\BasekitLaravelUi\View\Components\Support\ComponentPropResolver;
use Illuminate\Contracts\Support\Htmlable;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

/**
 * Table component for Basekit Laravel UI.
 *
 * A versatile table component supporting basic, dropdown, and stacked types with responsive behaviors,
 * data-driven rendering, and configurable variants and sizes. Handles column visibility and empty states.
 */
class Table extends Component
{
    /**
     * Whether dropdown column menu should be displayed.
     */
    public bool $hasMenu;

    /**
     * Whether stacked type is currently active.
     */
    public bool $isStackedMode;

    /**
     * Table size token.
     */
    public string $size;

    /**
     * Table rendering type.
     *
     * Allowed values: basic, dropdown, stacked.
     */
    public string $type;

    /**
     * Whether component is in data-driven mode.
     *
     * True when both columns and rows are provided as arrays.
     */
    public bool $useData;

    /**
     * Table visual variant token.
     */
    public string $variant;

    /**
     * Columns rendered only in stacked detail rows.
     *
     * @var array<int, array<string, mixed>>
     */
    public array $detailColumns = [];

    /**
     * Normalized column definitions used by the view.
     *
     * @var array<int, array<string, mixed>>
     */
    public array $normalizedColumns = [];

    /**
     * Toggleable columns in dropdown type.
     *
     * @var array<int, array<string, mixed>>
     */
    public array $toggleableColumns = [];

    /**
     * Default visibility map for toggleable columns.
     *
     * @var array<string, bool>
     */
    public array $visibleDefaults = [];

    /**
     * Resolved primary column key for stacked mode.
     */
    public ?string $primaryColumnKey;

    /**
     * @param  array<int, array<string, mixed>>|null  $columns
     * @param  array<int, array<string, mixed>>|null  $rows
     */
    public function __construct(
        string $type = 'dropdown',
        /**
         * Whether responsive behaviors are enabled.
         */
        public bool $responsive = true,
        /**
         * Whether stacked detail rows include column labels.
         */
        public bool $showColumnLabels = true,
        /**
         * Label text for the dropdown column menu trigger.
         */
        public string $menuLabel = 'Columns',
        /**
         * Accessibility label for stacked expand button.
         */
        public string $expandIconLabel = 'Show details',
        /**
         * Empty-state content shown when there are no rows.
         */
        public string|Htmlable $empty = 'No results found.',
        ?string $variant = null,
        ?string $size = null,
        /**
         * Input column definitions for data-driven mode.
         */
        public ?array $columns = null,
        /**
         * Input row data for data-driven mode.
         */
        public ?array $rows = null,
        /**
         * Requested primary column key for stacked mode.
         */
        public ?string $primaryColumn = null,
    ) {
        $this->type = $this->resolveType($type);
        $this->variant = $this->resolveVariant($variant);
        $this->size = $this->resolveSize($size);
        $this->primaryColumnKey = $this->primaryColumn;

        $this->useData = is_array($this->columns) && is_array($this->rows);
        $this->isStackedMode = $this->type === 'stacked';

        if ($this->useData) {
            $this->prepareDataColumns();
        }

        $this->hasMenu = $this->useData
            && $this->responsive
            && $this->type === 'dropdown'
            && count($this->toggleableColumns) > 0;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View
    {
        /** @var view-string $view */
        $view = "basekit::components.display.table-{$this->type}";

        return view($view);
    }

    /**
     * Get cell value for a given row and column key.
     */
    public function cellValue(mixed $row, string $key): mixed
    {
        return data_get($row, $key);
    }

    /**
     * Get CSS classes for the table element based on variant, size, and type.
     */
    public function classes(): string
    {
        return implode(' ', array_filter([
            'bk-table',
            "bk-table--{$this->variant}",
            "bk-table--{$this->size}",
            $this->isStackedMode && $this->useData ? 'bk-table--stacked' : null,
        ]));
    }

    /**
     * Get column label for a given column definition, falling back to key if label is not set.
     *
     * @param  array<string,mixed>  $column
     */
    public function columnLabel(array $column): string
    {
        return (string) ($column['label'] ?? $column['key'] ?? '');
    }

    /**
     * Get CSS classes for a table cell based on column visibility and responsive settings.
     *
     * @param  array<string,mixed>  $column
     */
    public function columnVisibilityBinding(array $column): ?string
    {
        if (! $this->responsive || (bool) ($column['baseVisible'] ?? true)) {
            return null;
        }

        return "visible['{$column['key']}'] ? 'bk-table__cell--shown' : 'bk-table__cell--hidden'";
    }

    /**
     * Check if there are any toggleable columns for dropdown menu.
     */
    public function hasResponsiveWrapper(): bool
    {
        return $this->responsive;
    }

    /**
     * Check if a value is an instance of Htmlable.
     */
    public function isHtmlable(mixed $value): bool
    {
        return $value instanceof Htmlable;
    }

    /**
     * Get colspan value for the empty state row when using stacked type with detail columns.
     */
    public function emptyColspan(): int
    {
        $base = count($this->normalizedColumns);
        if ($this->isStackedMode && count($this->detailColumns) > 0) {
            return $base + 1;
        }

        return $base;
    }

    /**
     * Get CSS classes for the responsive wrapper element based on type and data usage.
     */
    public function responsiveWrapperClasses(): string
    {
        $classes = ['bk-table__responsive'];

        if ($this->type === 'dropdown' && $this->useData) {
            $classes[] = 'bk-table__responsive--query';
        }

        if ($this->type === 'stacked' && $this->useData) {
            $classes[] = 'bk-table__responsive--stacked';
        }

        return implode(' ', $classes);
    }

    /**
     * Resolve type value.
     */
    private function resolveType(string $type): string
    {
        $allowed = ['basic', 'dropdown', 'stacked'];

        if (in_array($type, $allowed, true)) {
            return $type;
        }

        return 'dropdown';
    }

    /**
     * Resolve variant value.
     */
    private function resolveVariant(?string $variant): string
    {
        return ComponentPropResolver::resolveString(
            'basekit.components.table.variants',
            'basekit.components.table.default_variant',
            'default',
            $variant,
        );
    }

    /**
     * Resolve size value.
     */
    private function resolveSize(?string $size): string
    {
        return ComponentPropResolver::resolveString(
            'basekit.components.table.sizes',
            'basekit.components.table.default_size',
            'md',
            $size,
        );
    }

    /**
     * Prepare and normalize column definitions for data-driven tables, including responsive visibility classes.
     */
    private function prepareDataColumns(): void
    {
        $breakpointClasses = [
            'sm' => 'bk-table__cell--sm',
            'md' => 'bk-table__cell--md',
            'lg' => 'bk-table__cell--lg',
            'xl' => 'bk-table__cell--xl',
            '2xl' => 'bk-table__cell--2xl',
        ];

        foreach ($this->columns ?? [] as $column) {
            /**
             * @var array{
             *     key: string|null,
             *     label: string|null,
             *     show: bool|string|null,
             *     align: string|null,
             *     class: string,
             *     headerClass: string,
             *     cellClass: string
             * } $column
             */
            $column = array_merge(
                [
                    'key' => null,
                    'label' => null,
                    'show' => null,
                    'align' => null,
                    'class' => '',
                    'headerClass' => '',
                    'cellClass' => '',
                ],
                $column,
            );

            if ($column['key'] === null || $column['key'] === '') {
                continue;
            }

            $tokens = $this->normalizeShowTokens($column['show']);
            $baseVisible = $tokens === [];
            $showClasses = [];

            foreach ($tokens as $token) {
                $normalized = strtolower($token);

                if (in_array($normalized, ['base', 'xs', 'sm', 'all'], true)) {
                    $baseVisible = true;

                    continue;
                }

                $normalized = rtrim($normalized, '+');

                if (isset($breakpointClasses[$normalized])) {
                    $showClasses[] = $breakpointClasses[$normalized];
                }
            }

            $showClasses = array_values(array_unique($showClasses));
            $alignClass = match ($column['align']) {
                'right' => 'bk-table__cell--align-right',
                'center' => 'bk-table__cell--align-center',
                default => '',
            };

            $visibilityClasses = [];
            if ($this->responsive) {
                if ($this->type === 'dropdown' && ! $baseVisible) {
                    $visibilityClasses[] = 'bk-table__cell--hidden';
                }

                $visibilityClasses = array_merge($visibilityClasses, $showClasses);
            }

            $baseParts = ['bk-table__cell'];

            if ($alignClass !== '') {
                $baseParts[] = $alignClass;
            }

            $visibilityClass = implode(' ', $visibilityClasses);

            if ($visibilityClass !== '') {
                $baseParts[] = $visibilityClass;
            }

            if ($column['class'] !== '') {
                $baseParts[] = $column['class'];
            }

            $baseClass = trim(implode(' ', $baseParts));

            $column['headerClass'] = trim(implode(' ', array_filter([$baseClass, $column['headerClass']], fn (string $v): bool => $v !== '')));
            $column['cellClass'] = trim(implode(' ', array_filter([$baseClass, $column['cellClass']], fn (string $v): bool => $v !== '')));
            $column['baseVisible'] = $baseVisible;

            $this->normalizedColumns[] = $column;

            if ($this->responsive && ! $baseVisible && $this->type === 'dropdown') {
                $this->toggleableColumns[] = $column;
                $this->visibleDefaults[$column['key']] = false;
            }
        }

        if ($this->isStackedMode) {
            if ($this->primaryColumnKey === null || $this->primaryColumnKey === '') {
                foreach ($this->normalizedColumns as $column) {
                    if ((bool) ($column['baseVisible'] ?? false)) {
                        $this->primaryColumnKey = $column['key'];
                        break;
                    }
                }
            }

            foreach ($this->normalizedColumns as $column) {
                if (! (bool) ($column['baseVisible'] ?? false)) {
                    $this->detailColumns[] = $column;
                }
            }
        }
    }

    /**
     * Normalize the 'show' property into an array of trimmed tokens for responsive visibility handling.
     *
     * @return array<int,string>
     */
    private function normalizeShowTokens(mixed $show): array
    {
        if ($show === null) {
            return [];
        }

        if (is_string($show)) {
            $show = array_map(trim(...), explode('|', $show));
        }

        if (! is_array($show)) {
            return [];
        }

        return array_values(array_filter(
            array_map(static fn ($token): string => trim((string) $token), $show),
            static fn (string $token): bool => $token !== '',
        ));
    }
}
