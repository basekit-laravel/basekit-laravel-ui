{{-- Link Component --}}
{{--
    Props:
    - variant: string ('primary', 'secondary', 'danger', 'success', 'warning', 'info', 'ghost', 'muted')
    - href: string|null (link URL)
    - isExternal: bool (opens in new tab, default: false)
    - iconName: string|null (Heroicon name)

    Slots:
    - default: Link content
    - icon: Optional custom icon markup
--}}

<a href="{{ $href ?? '#' }}" @if ($colorStyle()) style="{{ $colorStyle() }}" @endif {{ $attributes->twMerge($classes()) }}
    @if ($isExternal) target="_blank"
        rel="noopener noreferrer" @endif>

    {{-- Icon --}}
    @if (isset($icon))
        <span class="bk-link__icon">{{ $icon }}</span>
    @elseif ($iconName)
        <x-dynamic-component :component="$iconComponent()" class="bk-link__icon" />
    @endif

    {{-- Content --}}
    <span>{{ $slot }}</span>

    {{-- External Icon --}}
    @if ($isExternal)
        <x-dynamic-component :component="$externalIconComponent()" class="bk-link__external-icon" />
    @endif
</a>
