{{-- Stat Component --}}

{{-- Stat Container --}}
<div {{ $attributes->twMerge('bk-stat') }}>
    {{-- Icon --}}
    @if ((isset($icon) && !is_string($icon)) || $hasIcon())
        <div class="bk-stat__icon">
            @if (isset($icon) && !is_string($icon))
                {{ $icon }}
            @else
                <x-dynamic-component :component="$iconComponent()" />
            @endif
        </div>
    @endif

    {{-- Stat Content --}}
    <div class="bk-stat__content">
        {{-- Label --}}
        @if (isset($label))
            <div class="bk-stat__label">
                {{ $label }}
            </div>
        @endif

        {{-- Value --}}
        @if (isset($value))
            <div class="bk-stat__value">
                {{ $value }}
            </div>
        @endif

        {{-- Change Indicator --}}
        @if (isset($change))
            <div class="{{ $changeClasses() }}">
                @if ($trendIconComponent())
                    <x-dynamic-component :component="$trendIconComponent()" class="bk-stat__change-icon" />
                @endif
                <span>{{ $change }}</span>
            </div>
        @endif
    </div>
</div>
