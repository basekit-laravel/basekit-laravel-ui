{{-- Pagination Component --}}
{{--
    Props:
    - currentPage: int (default: 1)
    - totalPages: int (default: 1)
    - perPage: int (default: 15)
    - total: int (default: 0)
    - type: string (default: "full", values: "full"|"simple")
    - previousLabel: string (default: "Previous")
    - nextLabel: string (default: "Next")
    - showInfo: bool (default: false)
    - infoText: string (default: "Showing :from to :to of :total results")
    - showPerPage: bool (default: false)
    - perPageLabel: string (default: "Per page:")
    - perPageName: string (default: "per_page")
    - perPageOptions: int[] (default: [15, 30, 50])
    - path: string|null (base path, optional)
    - onEachSide: int (default: 2)

    Slots:
    - previous: Custom previous control
    - next: Custom next control
    - info: Custom page info content
--}}

<nav {{ $attributes->twMerge('bk-pagination') }} role="navigation" aria-label="Pagination">
    <div class="bk-pagination__container">
        {{-- Previous Button --}}
        <div class="bk-pagination__previous">
            @if (isset($previous))
                {{ $previous }}
            @else
                @if (!$onFirstPage())
                    <a href="{{ $pageUrl($currentPage - 1) }}" class="bk-pagination__link" rel="prev">
                        <x-heroicon-o-chevron-left class="w-5 h-5" />
                        <span>{{ $previousLabel }}</span>
                    </a>
                @else
                    <span class="bk-pagination__link bk-pagination__link--disabled">
                        <x-heroicon-o-chevron-left class="w-5 h-5" />
                        <span>{{ $previousLabel }}</span>
                    </span>
                @endif
            @endif
        </div>

        @if ($type !== 'simple')
            {{-- Page Numbers --}}
            <div class="bk-pagination__pages">
                @if (!in_array(1, $pages()))
                    <a href="{{ $pageUrl(1) }}" class="bk-pagination__number">1</a>
                    @if ($pages()[0] > 2)
                        <span class="bk-pagination__ellipsis">...</span>
                    @endif
                @endif

                @foreach ($pages() as $page)
                    @if ($page === $currentPage)
                        <span class="bk-pagination__number bk-pagination__number--active"
                            aria-current="page">{{ $page }}</span>
                    @else
                        <a href="{{ $pageUrl($page) }}" class="bk-pagination__number">{{ $page }}</a>
                    @endif
                @endforeach

                @if (!in_array($totalPages, $pages()) && $totalPages > 1)
                    @php $pagesArr = $pages(); @endphp
                    @if (end($pagesArr) < $totalPages - 1)
                        <span class="bk-pagination__ellipsis">...</span>
                    @endif
                    <a href="{{ $pageUrl($totalPages) }}" class="bk-pagination__number">{{ $totalPages }}</a>
                @endif
            </div>
        @endif

        {{-- Next Button --}}
        <div class="bk-pagination__next">
            @if (isset($next))
                {{ $next }}
            @else
                @if (!$onLastPage())
                    <a href="{{ $pageUrl($currentPage + 1) }}" class="bk-pagination__link" rel="next">
                        <span>{{ $nextLabel }}</span>
                        <x-heroicon-o-chevron-right class="w-5 h-5" />
                    </a>
                @else
                    <span class="bk-pagination__link bk-pagination__link--disabled">
                        <span>{{ $nextLabel }}</span>
                        <x-heroicon-o-chevron-right class="w-5 h-5" />
                    </span>
                @endif
            @endif
        </div>
    </div>

    @if ($showInfo || isset($info) || $hasPerPageSelector())
        <div class="bk-pagination__meta">
            @if (isset($info))
                <div class="bk-pagination__info">{{ $info }}</div>
            @elseif ($showInfo)
                <p class="bk-pagination__info">{{ $renderedInfoText() }}</p>
            @endif

            @if ($hasPerPageSelector())
                @php
                    $perPageAction = $path ?: url()->current();
                    $existingQuery = request()->query();
                    unset($existingQuery['page'], $existingQuery[$perPageName]);
                @endphp

                <form method="GET" action="{{ $perPageAction }}" class="bk-pagination__per-page">
                    @foreach ($existingQuery as $queryKey => $queryValue)
                        @if (is_scalar($queryValue))
                            <input type="hidden" name="{{ $queryKey }}" value="{{ (string) $queryValue }}">
                        @endif
                    @endforeach

                    <label class="bk-pagination__per-page-label" for="bk-pagination-per-page-{{ $perPageName }}">
                        {{ $perPageLabel }}
                    </label>

                    <select id="bk-pagination-per-page-{{ $perPageName }}" name="{{ $perPageName }}"
                        class="bk-pagination__per-page-select" onchange="this.form.submit()">
                        @foreach ($perPageOptions as $option)
                            <option value="{{ $option }}" @selected($option === $perPage)>{{ $option }}
                            </option>
                        @endforeach
                    </select>
                </form>
            @endif
        </div>
    @endif
</nav>
