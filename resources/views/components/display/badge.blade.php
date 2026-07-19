{{-- Badge Component --}}

{{-- Badge Container --}}
<span @if ($colorStyle()) style="{{ $colorStyle() }}" @endif {{ $attributes->twMerge($classes()) }}>
    {{-- Dot Indicator --}}
    @if ($isDot)
        <span class="bk-badge__dot {{ $dotClass ?? '' }}"></span>
    @endif

    {{-- Icon --}}
    @if ((isset($icon) && !is_string($icon)) || $hasIcon())
        <span class="bk-badge__icon {{ $iconClass ?? '' }}">
            @if (isset($icon) && !is_string($icon))
                {{ $icon }}
            @else
                <x-dynamic-component :component="$iconComponent()" />
            @endif
        </span>
    @endif

    {{-- Content --}}
    {{ $slot }}
</span>
