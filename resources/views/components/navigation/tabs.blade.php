{{-- Tabs Component --}}
{{--
    Props:
    - items: array (tab items with `label`, `value`, optional `icon`)
    - variant: string ('underline', 'pills', 'boxed')
    - active: mixed (active tab value)

    Slots:
    - default: Custom tab markup/content
--}}

<div {{ $attributes->twMerge('bk-tabs') }} x-data="{ activeTab: '{{ $active }}' }">
    <div class="{{ $classes() }}" role="tablist">
        @if (!empty($items))
            @foreach ($items as $item)
                <button type="button" @click="activeTab = '{{ $item['value'] }}'"
                    :class="activeTab === '{{ $item['value'] }}' ? 'bk-tabs__tab--active' : 'bk-tabs__tab--inactive'"
                    class="bk-tabs__tab" role="tab" @if (!empty($item['disabled'])) disabled @endif
                    :aria-selected="activeTab === '{{ $item['value'] }}' ? 'true' : 'false'">

                    @if ($hasIcon($item))
                        <span class="bk-tabs__tab-icon" aria-hidden="true">
                            @if ($hasCustomIconSvg($item))
                                {!! $customIconSvg($item) !!}
                            @elseif ($hasCustomIconComponent($item))
                                <x-dynamic-component :component="$customIconComponent($item)" class="w-full h-full" />
                            @elseif (!empty($item['icon']))
                                <x-dynamic-component :component="$iconComponent($item['icon'])" class="w-full h-full" />
                            @endif
                        </span>
                    @endif

                    <span>{{ $item['label'] }}</span>
                </button>
            @endforeach
        @else
            {{ $slot }}
        @endif
    </div>

    @if (!$slot->isEmpty() && !empty($items))
        {{ $slot }}
    @endif
</div>
