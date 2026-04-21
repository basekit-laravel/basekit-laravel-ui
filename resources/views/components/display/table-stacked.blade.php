{{-- Table Stacked Component --}}
{{--
    Stacked responsive table for data-driven rendering.
    
    Props:
    - variant: 'default', 'bordered', 'striped', 'hoverable' (default: 'default')
    - size: 'sm', 'md', 'lg' (default: 'md')
    - responsive: bool (enable stacked layout on small screens, default: true)
    - columns: array (required - column definitions)
    - rows: array (required - row data)
    - primaryColumn: string (column key to show on small screens, default: first visible)
    - showColumnLabels: bool (show column names in expanded details, default: true)
    - expandIconLabel: string (accessibility label for expand button, default: 'Show details')
    - empty: string|Htmlable (empty state content, default: 'No results found.')

    Usage:
    <x-table-stacked :columns="$columns" :rows="$rows" />
--}}

<div {{ $attributes->twMerge('bk-table__container') }} x-data="{ expanded: {} }">
    @if ($hasResponsiveWrapper())
        <div class="{{ $responsiveWrapperClasses() }}">
    @endif

    <div class="bk-table__wrapper">
        <table class="{{ $classes() }}">
            <thead class="bk-table__header bk-table__header--stacked">
                <tr>
                    @foreach ($normalizedColumns as $column)
                        <th
                            class="{{ $column['headerClass'] }} {{ !(bool) ($column['baseVisible'] ?? true) ? 'bk-table__cell--detail-only' : '' }}">
                            {{ $columnLabel($column) }}
                        </th>
                    @endforeach
                    @if ($responsive && count($detailColumns) > 0)
                        <th class="bk-table__cell bk-table__header-expand">
                            <span class="sr-only">Actions</span>
                        </th>
                    @endif
                </tr>
            </thead>
            <tbody class="bk-table__body">
                @forelse ($rows as $rowIndex => $row)
                    <tr class="bk-table__stack-row" data-row="{{ $rowIndex }}">
                        @foreach ($normalizedColumns as $column)
                            <td
                                class="{{ $column['cellClass'] }} {{ !(bool) ($column['baseVisible'] ?? true) ? 'bk-table__cell--detail-only' : '' }}">
                                @if ($isHtmlable($cellValue($row, $column['key'])))
                                    {!! $cellValue($row, $column['key'])->toHtml() !!}
                                @else
                                    {{ $cellValue($row, $column['key']) }}
                                @endif
                            </td>
                        @endforeach
                        @if ($responsive && count($detailColumns) > 0)
                            <td class="bk-table__cell bk-table__expand-cell">
                                <button type="button" class="bk-table__stack-expand-btn"
                                    @click="expanded[{{ $rowIndex }}] = !expanded[{{ $rowIndex }}]"
                                    :aria-expanded="(expanded[{{ $rowIndex }}] ?? false).toString()"
                                    :aria-label="expanded[{{ $rowIndex }}] ? 'Hide details' : '{{ $expandIconLabel }}'">
                                    <svg viewBox="0 0 20 20" fill="currentColor" class="bk-table__expand-icon"
                                        aria-hidden="true">
                                        <path fill-rule="evenodd"
                                            d="M5.23 7.21a.75.75 0 0 1 1.06.02L10 11.168l3.71-3.938a.75.75 0 1 1 1.08 1.04l-4.24 4.5a.75.75 0 0 1-1.08 0l-4.24-4.5a.75.75 0 0 1 .02-1.06Z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </button>
                            </td>
                        @endif
                    </tr>
                    @if ($responsive && count($detailColumns) > 0)
                        <tr class="bk-table__stack-detail-row" x-show="expanded[{{ $rowIndex }}]" x-transition>
                            <td colspan="{{ $emptyColspan() }}" class="bk-table__stack-detail-cell">
                                <div class="bk-table__stack-detail-content">
                                    @foreach ($detailColumns as $column)
                                        <div class="bk-table__stack-detail-item">
                                            @if ($showColumnLabels)
                                                <span
                                                    class="bk-table__stack-detail-label">{{ $columnLabel($column) }}:</span>
                                            @endif
                                            <span class="bk-table__stack-detail-value">
                                                @if ($isHtmlable($cellValue($row, $column['key'])))
                                                    {!! $cellValue($row, $column['key'])->toHtml() !!}
                                                @else
                                                    {{ $cellValue($row, $column['key']) }}
                                                @endif
                                            </span>
                                        </div>
                                    @endforeach
                                </div>
                            </td>
                        </tr>
                    @endif
                @empty
                    <tr>
                        <td class="bk-table__empty" colspan="{{ $emptyColspan() }}">
                            @if ($isHtmlable($empty))
                                {!! $empty->toHtml() !!}
                            @else
                                {{ $empty }}
                            @endif
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    @if ($hasResponsiveWrapper())
</div>
@endif
</div>
