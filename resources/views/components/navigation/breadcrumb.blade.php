{{-- Breadcrumb Component --}}
{{--
    Props:
    - items: array (breadcrumb items with `label`, optional `url`, optional `icon`)
    - separator: string (Heroicon name, default from config)

    Slots:
    - default: Custom breadcrumb markup
--}}

<nav {{ $attributes->twMerge($classes()) }} aria-label="Breadcrumb">
    <ol class="bk-breadcrumb__list">
        @if ($slot->isEmpty() && !empty($items))
            @foreach ($items as $index => $item)
                <li class="bk-breadcrumb__item">
                    @if (isset($item['url']) && $index < count($items) - 1)
                        <a href="{{ $item['url'] }}" class="bk-breadcrumb__link">
                            @if (!empty($item['icon']))
                                <x-dynamic-component :component="$itemIcon($item['icon'])" class="bk-breadcrumb__icon" aria-hidden="true" />
                            @endif
                            {{ $item['label'] }}
                        </a>
                    @else
                        <span class="bk-breadcrumb__current" aria-current="page">
                            @if (!empty($item['icon']))
                                <x-dynamic-component :component="$itemIcon($item['icon'])" class="bk-breadcrumb__icon" aria-hidden="true" />
                            @endif
                            {{ $item['label'] }}
                        </span>
                    @endif

                    @if ($index < count($items) - 1)
                        <x-dynamic-component :component="$separatorIcon()" class="bk-breadcrumb__separator" />
                    @endif
                </li>
            @endforeach
        @else
            {{ $slot }}
        @endif
    </ol>
</nav>
