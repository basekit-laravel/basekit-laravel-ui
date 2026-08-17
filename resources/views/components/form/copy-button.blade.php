{{-- Copy Button Component --}}
{{--
    Props:
    - value: string (required) — text copied to the clipboard on click
    - label: string|null — fallback label when no slot content is provided
    - copiedLabel: string|null — text shown while the "copied" feedback is active
    - duration: int (default: 2000) — feedback duration in milliseconds
    - icon: string (default: 'clipboard') — Heroicon name for the idle icon
    - copiedIcon: string (default: 'check') — Heroicon name for the copied icon
    - variant: 'primary', 'secondary', 'success', 'warning', 'danger', 'info', 'ghost' (default: from config)
    - size: 'sm', 'md', 'lg' (default: from config)

    Slots:
    - default: Button content (falls back to the label prop when empty)

    The value is read at runtime from a data-* attribute ($el.dataset.value),
    so it is never interpolated into an inline JavaScript expression.
--}}

<button {{ $attributes->twMerge($classes(), 'bk-copy-button') }}
    type="button"
    data-value="{{ $value }}"
    data-duration="{{ $duration }}"
    x-data="{ copied: false }"
    x-on:click="navigator.clipboard.writeText($el.dataset.value); copied = true; setTimeout(() => copied = false, Number($el.dataset.duration ?? 2000))"
    x-bind:aria-label="copied ? @js($copiedLabel ?? $label ?? '') : @js($label ?? '')">

    <span class="bk-button__icon">
        <x-dynamic-component :component="$iconComponent()" x-show="!copied" x-cloak />
        <x-dynamic-component :component="$copiedIconComponent()" x-show="copied" x-cloak />
    </span>

    <span class="bk-button__content">
        <span x-show="!copied">{{ $slot->isEmpty() ? $label : $slot }}</span>
        <span x-show="copied" x-cloak>{{ $copiedLabel ?? ($slot->isEmpty() ? $label : $slot) }}</span>
    </span>

    <span class="sr-only" aria-live="polite" x-text="copied ? @js($copiedLabel ?? $label ?? '') : ''"></span>
</button>
