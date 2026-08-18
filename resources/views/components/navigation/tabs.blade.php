{{-- Tabs Component --}}
{{--
    Props:
    - items: array (tab items with `label`, `value`, optional `icon`)
    - variant: string ('underline', 'pills', 'boxed')
    - active: mixed (active tab value)

    Slots:
    - default: Custom tab markup/content
--}}

<div {{ $attributes->class('bk-tabs') }} x-data="{ active: '{{ $active }}' }">
    <div class="{{ $classes() }}" role="tablist" id="{{ $tablistId }}">
        @if (!empty($items))
            @foreach ($items as $item)
                <button type="button" @click="active = '{{ $item['value'] }}'"
                    :class="active === '{{ $item['value'] }}' ? 'bk-tabs__tab--active' : 'bk-tabs__tab--inactive'"
                    class="bk-tabs__tab" role="tab" id="tab-{{ $item['value'] }}"
                    aria-controls="tabpanel-{{ $item['value'] }}"
                    :aria-selected="active === '{{ $item['value'] }}' ? 'true' : 'false'"
                    @if (!empty($item['disabled'])) disabled @endif
                    @keydown.right.prevent="const tabs=$el.parentElement.querySelectorAll('[role=&quot;tab&quot;]:not([disabled])');const idx=Array.from(tabs).indexOf($el);const next=tabs[(idx+1)%tabs.length];next.focus();next.click();"
                    @keydown.left.prevent="const tabs=$el.parentElement.querySelectorAll('[role=&quot;tab&quot;]:not([disabled])');const idx=Array.from(tabs).indexOf($el);const prev=tabs[(idx-1+tabs.length)%tabs.length];prev.focus();prev.click();"
                    @keydown.home.prevent="const tabs=$el.parentElement.querySelectorAll('[role=&quot;tab&quot;]:not([disabled])');tabs[0]?.focus();tabs[0]?.click();"
                    @keydown.end.prevent="const tabs=$el.parentElement.querySelectorAll('[role=&quot;tab&quot;]:not([disabled])');tabs[tabs.length-1]?.focus();tabs[tabs.length-1]?.click();">

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
