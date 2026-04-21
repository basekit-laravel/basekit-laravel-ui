{{-- Spinner Component --}}
{{--
    Props:
    - size: 'xs', 'sm', 'md', 'lg', 'xl' (default: from config)
    - variant: 'primary', 'secondary', 'success', 'warning', 'danger', 'info', 'ghost' (default: from config)
    - label: string (optional, screen reader text)
    
    Slots:
    - default: Optional label text
--}}

{{-- Spinner Container --}}
<div {{ $attributes->twMerge('bk-spinner') }}>
    {{-- Spinner SVG --}}
    <svg class="{{ $classes() }}" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
        <circle class="bk-spinner__track" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4">
        </circle>
        <path class="bk-spinner__path" fill="currentColor"
            d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
        </path>
    </svg>

    {{-- Label --}}
    @if ($label || $slot->isNotEmpty())
        <span class="bk-spinner__label">
            {{ $slot->isEmpty() ? $label : $slot }}
        </span>
    @else
        <span class="sr-only">Loading...</span>
    @endif
</div>
