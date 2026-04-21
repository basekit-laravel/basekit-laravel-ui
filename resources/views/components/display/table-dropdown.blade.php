{{-- Table Dropdown Component --}}
{{--
    Data-driven table with column visibility dropdown menu.
    
    Props:
    - variant: 'default', 'bordered', 'striped', 'hoverable' (default: 'default')
    - size: 'sm', 'md', 'lg' (default: 'md')
    - responsive: bool (enable responsive column toggles, default: true)
    - columns: array (required - column definitions)
    - rows: array (required - row data)
    - menuLabel: string (column menu label, default: 'Columns')
    - empty: string|Htmlable (empty state content, default: 'No results found.')

    Usage:
    <x-table-dropdown :columns="$columns" :rows="$rows" />
--}}

<div {{ $attributes->twMerge('bk-table__container') }} x-data="{ menuOpen: false, visible: @js($visibleDefaults) }">
    @if ($hasResponsiveWrapper())
        <div class="{{ $responsiveWrapperClasses() }}">
    @endif

    @if ($hasMenu)
        <div class="bk-table__controls">
            <div class="bk-table__menu">
                <button type="button" class="bk-table__menu-trigger" @click="menuOpen = !menuOpen"
                    :aria-expanded="menuOpen.toString()">
                    {{ $menuLabel }}
                    <svg viewBox="0 0 20 20" fill="currentColor" class="bk-table__menu-icon" aria-hidden="true">
                        <path fill-rule="evenodd"
                            d="M5.23 7.21a.75.75 0 0 1 1.06.02L10 11.168l3.71-3.938a.75.75 0 1 1 1.08 1.04l-4.24 4.5a.75.75 0 0 1-1.08 0l-4.24-4.5a.75.75 0 0 1 .02-1.06Z"
                            clip-rule="evenodd" />
                    </svg>
                </button>
                <div class="bk-table__menu-panel" x-show="menuOpen" x-transition @click.away="menuOpen = false">
                    @foreach ($toggleableColumns as $column)
                        <label class="bk-table__menu-item">
                            <input type="checkbox" class="bk-table__menu-checkbox"
                                x-model="visible['{{ $column['key'] }}']">
                            <span>{{ $columnLabel($column) }}</span>
                        </label>
                    @endforeach
                </div>
            </div>
        </div>
    @endif

    <div class="bk-table__wrapper">
        <table class="{{ $classes() }}">
            <thead class="bk-table__header">
                <tr>
                    @foreach ($normalizedColumns as $column)
                        <th class="{{ $column['headerClass'] }}"
                            @if ($responsive && !$column['baseVisible']) :class="visible['{{ $column['key'] }}'] ? 'bk-table__cell--shown' : 'bk-table__cell--hidden'" @endif>
                            {{ $columnLabel($column) }}
                        </th>
                    @endforeach
                </tr>
            </thead>
            <tbody class="bk-table__body">
                @forelse ($rows as $row)
                    <tr>
                        @foreach ($normalizedColumns as $column)
                            <td class="{{ $column['cellClass'] }}"
                                @if ($responsive && !$column['baseVisible']) :class="visible['{{ $column['key'] }}'] ? 'bk-table__cell--shown' : 'bk-table__cell--hidden'" @endif>
                                @if ($isHtmlable($cellValue($row, $column['key'])))
                                    {!! $cellValue($row, $column['key'])->toHtml() !!}
                                @else
                                    {{ $cellValue($row, $column['key']) }}
                                @endif
                            </td>
                        @endforeach
                    </tr>
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
