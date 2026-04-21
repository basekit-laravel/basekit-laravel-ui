{{-- Table Basic Component --}}
{{--
    Basic table component supporting slot-based template rendering
    or simple data-driven rendering without column visibility controls.
    
    Props (data-driven mode):
    - variant: 'default', 'bordered', 'striped', 'hoverable' (default: 'default')
    - size: 'sm', 'md', 'lg' (default: 'md')
    - responsive: bool (default: true)
    - columns: array (column definitions)
    - rows: array (row data)
    - empty: string|Htmlable (empty state content, default: 'No results found.')

    Slots (slot-based mode):
    - header: Table header content
    - default: Table body content
    - footer: Table footer content

    Data-driven example:
    <x-table-basic :columns="$columns" :rows="$rows" />
    
    Slot-based example:
    <x-table-basic>
        <x-slot name="header">
            <tr>
                <th>Name</th>
                <th>Email</th>
            </tr>
        </x-slot>
        <tr>
            <td>John</td>
            <td>john@example.com</td>
        </tr>
    </x-table-basic>
--}}

@if ($hasResponsiveWrapper())
    <div {{ $attributes->twMerge($responsiveWrapperClasses()) }}>
        <div class="bk-table__wrapper">
        @else
            <div {{ $attributes->twMerge('bk-table__wrapper') }}>
@endif
<table class="{{ $classes() }}">
    @if ($useData)
        <thead class="bk-table__header">
            <tr>
                @foreach ($normalizedColumns as $column)
                    <th class="{{ $column['headerClass'] }}">
                        {{ $columnLabel($column) }}
                    </th>
                @endforeach
            </tr>
        </thead>
        <tbody class="bk-table__body">
            @forelse ($rows as $row)
                <tr>
                    @foreach ($normalizedColumns as $column)
                        <td class="{{ $column['cellClass'] }}">
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
    @else
        @if (isset($header))
            <thead class="bk-table__header">
                {{ $header }}
            </thead>
        @endif

        <tbody class="bk-table__body">
            {{ $slot }}
        </tbody>

        @if (isset($footer))
            <tfoot class="bk-table__footer">
                {{ $footer }}
            </tfoot>
        @endif
    @endif
</table>
@if ($hasResponsiveWrapper())
    </div>
@endif
</div>
