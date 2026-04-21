{{-- Toggle Component --}}
{{--
    Props:
    - variant: 'primary', 'secondary', 'success', 'danger', 'warning', 'info', 'ghost' (default: from config)
    - size: 'sm', 'md', 'lg' (default: from config)
    - label: string (optional)
    - error: string (optional, shows error message)
    - hint: string (optional, shows help text)
    - value: string (optional)
    - is-checked: bool (default: false)
    - disabled: bool attribute (optional)
    
    Slots:
    - label: Custom label content
    - error: Custom error message
    - hint: Custom hint content
    
    Note: Uses native checkbox behavior for toggle functionality
--}}

<div class="bk-toggle">
    <div class="bk-toggle__container">
        {{-- Hidden Input --}}
        <input type="checkbox" id="{{ $inputId() }}"
            {{ $attributes->except(['label', 'error', 'hint', 'id'])->class(['bk-toggle__input', 'sr-only']) }}
            @if ($value !== null) value="{{ $value }}" @endif
            @if ($isChecked) checked @endif @if ($isDisabled()) disabled @endif
            @if ($hasError()) aria-invalid="true" aria-describedby="{{ $inputId() }}-error" @endif>

        {{-- Toggle Switch --}}
        <label class="{{ $classes() }}" for="{{ $inputId() }}">
            <span class="bk-toggle__slider"></span>
        </label>

        {{-- Label --}}
        @if ($label)
            <label class="bk-toggle__label" for="{{ $inputId() }}">
                {{ $label }}
            </label>
        @endif
    </div>

    {{-- Error Message --}}
    @if ($error)
        <p class="bk-toggle__error-message" id="{{ $inputId() }}-error">
            {{ $error }}
        </p>
    @endif

    {{-- Hint Text --}}
    @if (!$hasError() && $hint)
        <p class="bk-toggle__hint">
            {{ $hint }}
        </p>
    @endif
</div>
