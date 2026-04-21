{{-- Checkbox Component --}}
{{--
    Props:
    - variant: 'primary', 'secondary', 'success', 'danger', 'warning', 'info', 'ghost' (default: from config)
    - size: 'sm', 'md', 'lg' (default: from config)
    - label: string (optional)
    - error: string (optional, shows error message)
    - hint: string (optional, shows help text)
    - value: string (optional)
    - is-checked: bool (default: false)
    
    Slots:
    - label: Custom label content
    - error: Custom error message
    - hint: Custom hint content
--}}

<div class="bk-checkbox">
    <div class="{{ $containerClasses() }}">
        {{-- Checkbox Input --}}
        <input type="checkbox" id="{{ $inputId() }}"
            {{ $attributes->except(['label', 'error', 'hint', 'id'])->twMerge($classes()) }}
            @if ($value !== null) value="{{ $value }}" @endif
            @if ($isChecked) checked @endif
            @if ($hasError()) aria-invalid="true" aria-describedby="{{ $inputId() }}-error" @endif>

        {{-- Label --}}
        @if ($label)
            <label class="bk-checkbox__label" for="{{ $inputId() }}">
                {{ $label }}
            </label>
        @endif
    </div>

    {{-- Error Message --}}
    @if ($error)
        <p class="bk-checkbox__error-message" id="{{ $inputId() }}-error">
            {{ $error }}
        </p>
    @endif

    {{-- Hint Text --}}
    @if (!$hasError() && $hint)
        <p class="bk-checkbox__hint">
            {{ $hint }}
        </p>
    @endif
</div>
