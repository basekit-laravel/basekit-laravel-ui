{{-- Button Component --}}
{{--
    Props:
    - variant: 'primary', 'secondary', 'success', 'danger', 'warning', 'info', 'ghost' (default: from config)
    - size: 'sm', 'md', 'lg' (default: from config)
    - isFullWidth: boolean (default: false)
    - isLoading: boolean (default: false)
    - icon: string (Heroicon name, e.g., 'check')
    - iconOrientation: 'left', 'right' (default: 'left')
    - type: 'button', 'submit', 'reset' (default: 'button')

    Slots:
    - default: Button content
    - prefix: Content before the main slot
    - suffix: Content after the main slot
    - icon: Custom icon SVG (overrides icon prop)
--}}

<button type="{{ $type }}" {{ $attributes->twMerge($classes()) }}
    @if ($isLoading) disabled @endif>
    {{-- Prefix Slot --}}
    @isset($prefix)
        <span class="bk-button__prefix">{{ $prefix }}</span>
    @endisset

    {{-- Icon on the left (default orientation) --}}
    @if ($iconOrientation->value === \BasekitLaravel\BasekitLaravelUi\Enums\Orientation::Left->value)
        @include('basekit::components.form.partials.button.button-icon')
    @endif

    {{-- Main Content --}}
    <span class="bk-button__content">{{ $slot }}</span>

    {{-- Icon on the right --}}
    @if ($iconOrientation->value === \BasekitLaravel\BasekitLaravelUi\Enums\Orientation::Right->value)
        @include('basekit::components.form.partials.button.button-icon')
    @endif

    {{-- Suffix Slot --}}
    @isset($suffix)
        <span class="bk-button__suffix">{{ $suffix }}</span>
    @endisset
</button>
