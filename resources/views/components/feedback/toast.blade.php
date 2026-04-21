{{-- Toast Component --}}
{{--
    Props:
    - variant: 'primary', 'secondary', 'success', 'warning', 'danger', 'info', 'ghost' (default: from config)
    - title: string (optional)
    - message: string (optional)
    - icon: string (Heroicon name, optional, has default per variant)
    - duration: int (milliseconds before auto-dismiss, default: 3000)
    - is-dismissible: bool (default: true)
    
    Slots:
    - title: Custom title content
    - icon: Custom icon SVG
    - actions: Action buttons
    - default: Message content
    
    Note: Requires Alpine.js for auto-dismiss functionality
--}}

{{-- Toast Container --}}
<div class="{{ $classes() }}" x-data="{ show: true }" x-show="show"
    x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 transform translate-y-2"
    x-transition:enter-end="opacity-100 transform translate-y-0" x-transition:leave="transition ease-in duration-200"
    x-transition:leave-start="opacity-100 transform translate-y-0"
    x-transition:leave-end="opacity-0 transform translate-y-2"
    @if ($duration > 0) x-init="setTimeout(() => show = false, {{ $duration }})" @endif role="alert">

    <div class="bk-toast__content">
        {{-- Icon --}}
        <div class="bk-toast__icon">
            @if (isset($icon) && is_object($icon))
                {{ $icon }}
            @else
                <x-dynamic-component :component="$iconComponent()" />
            @endif
        </div>

        {{-- Message --}}
        <div class="bk-toast__message">
            @if ($title)
                <div class="bk-toast__title">
                    {{ $title }}
                </div>
            @endif

            <div class="bk-toast__description">
                {{ $slot->isEmpty() ? $message : $slot }}
            </div>

            {{-- Actions --}}
            @if (isset($actions))
                <div class="bk-toast__actions">
                    {{ $actions }}
                </div>
            @endif
        </div>

        {{-- Dismiss Button --}}
        @if ($isDismissible)
            <button type="button" @click="show = false" class="bk-toast__dismiss" aria-label="Dismiss">
                <x-heroicon-o-x-mark />
            </button>
        @endif
    </div>
</div>
