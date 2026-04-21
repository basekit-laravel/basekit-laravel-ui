{{-- Alert Component --}}
{{--
    Props:
    - variant: 'primary', 'secondary', 'success', 'warning', 'danger', 'info', 'ghost' (default: from config)
    - title: string|null
    - icon: string|null (Heroicon name)
    - isDismissible: bool (default: false)

    Slots:
    - default: Alert content
    - title: Optional title content
    - actions: Optional actions slot
    - icon: Optional custom icon markup
--}}

<div {{ $attributes->twMerge($classes()) }} role="alert" x-data="{ show: true }" x-show="show" x-transition>
    <div class="bk-alert__icon">
        @if (isset($icon) && !is_string($icon))
            {{ $icon }}
        @else
            <x-dynamic-component :component="$iconComponent()" />
        @endif
    </div>

    <div class="bk-alert__content">
        @if ($title)
            <div class="bk-alert__title">{{ $title }}</div>
        @endif

        <div class="bk-alert__message">{{ $slot }}</div>

        @if (isset($actions))
            <div class="bk-alert__actions">{{ $actions }}</div>
        @endif
    </div>

    @if ($isDismissible)
        <button type="button" class="bk-alert__dismiss" aria-label="Dismiss" @click="show = false">
            <x-heroicon-o-x-mark class="w-5 h-5" />
        </button>
    @endif
</div>
