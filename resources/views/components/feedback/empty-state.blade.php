{{-- Empty State Component --}}
{{--
    Props:
    - variant: 'primary', 'secondary', 'success', 'warning', 'danger', 'info', 'ghost' (default: from config)
    - size: 'sm', 'md', 'lg' (default: from config)
    - title: string (optional)
    - description: string (optional)
    - icon: string (Heroicon name, default: 'inbox')

    Slots:
    - icon: Custom icon SVG (overrides the icon prop)
    - actions: Action buttons or links
--}}

<div {{ $attributes->twMerge($classes()) }}>
    {{-- Icon --}}
    <div class="bk-empty-state__icon">
        @if (isset($icon) && !is_string($icon))
            {{ $icon }}
        @else
            <x-dynamic-component :component="$iconComponent()" />
        @endif
    </div>

    {{-- Title --}}
    @if ($title)
        <h3 class="bk-empty-state__title">{{ $title }}</h3>
    @endif

    {{-- Description --}}
    @if ($description || $slot->isNotEmpty())
        <p class="bk-empty-state__description">{{ $description ?: $slot }}</p>
    @endif

    {{-- Actions --}}
    @if (isset($actions))
        <div class="bk-empty-state__actions">
            {{ $actions }}
        </div>
    @endif
</div>
