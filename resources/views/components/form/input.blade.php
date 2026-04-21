{{-- Input Component --}}
{{--
    Props:
    - variant: 'primary', 'secondary', 'success', 'danger', 'warning', 'info', 'ghost' (default: from config)
    - size: 'sm', 'md', 'lg' (default: from config)
    - label: string (optional)
    - error: string (optional, shows error message)
    - hint: string (optional, shows help text)
    - icon: string (Heroicon name)
    - type: 'text', 'email', 'password', etc. (default: 'text')
    - placeholder: string (optional)
    - value: string (optional)
    - is-toggle-password: bool (optional, shows eye icon for password visibility)
    - mask: string (optional, uses # as digit placeholder; example: (###) ###-####)
    - corner-hint: string (optional, right-aligned hint text)
    - label-style: 'default', 'inset', 'overlap' (optional, controls label placement)
    - control-style: 'default', 'pill', 'underline' (optional, controls control shape)
    
    Slots:
    - prefix: Content before the input
    - suffix: Content after the input
    - label: Custom label content
    - error: Custom error message
    - hint: Custom hint content
    - icon: Custom icon SVG
--}}

@php
    $hasCustomLabel = isset($label) && !is_string($label);
    $hasCustomError = isset($error) && !is_string($error);
    $hasCustomHint = isset($hint) && !is_string($hint);
    $hasCustomIcon = isset($icon) && !is_string($icon);
    $hasAnyError = $hasError() || $hasCustomError;
@endphp

<div class="bk-input" {!! $xDataAttribute() ?? '' !!}>
    {{-- Label / Corner Hint --}}
    @include('basekit::components.form.partials.input.input-label-row', [
        'shouldShowTopLabel' => $shouldShowTopLabel(),
        'hasLabel' => filled($label) || $hasCustomLabel,
        'labelContent' => $label,
        'hasCornerHint' => $hasCornerHint(),
        'cornerHint' => $cornerHint,
    ])

    {{-- Input Container --}}
    <div class="{{ $containerClasses() }}">
        {{-- Prefix Slot --}}
        @if (isset($prefix))
            <span class="bk-input__prefix">{{ $prefix }}</span>
        @endif

        {{-- Inset / Overlap Label --}}
        @include('basekit::components.form.partials.input.input-inline-label', [
            'labelStyle' => $labelStyle->value,
            'hasLabel' => filled($label) || $hasCustomLabel,
            'labelContent' => $label,
        ])

        {{-- Number Decrement Button --}}
        @include('basekit::components.form.partials.input.input-number-decrement', [
            'shouldUseNumberStepper' => $shouldUseNumberStepper(),
            'step' => $attributes->get('step', 1),
            'min' => $attributes->get('min', '-Infinity'),
        ])

        {{-- Icon --}}
        @if ($hasCustomIcon)
            <span class="bk-input__icon">{{ $icon }}</span>
        @elseif ($iconComponent())
            <span class="bk-input__icon">
                <x-dynamic-component :component="$iconComponent()" />
            </span>
        @endif

        {{-- Input Field --}}
        <input
            @if ($isTogglePassword) :type="showPassword ? 'text' : 'password'" @else type="{{ $inputType() }}" @endif
            {{ $attributes->except(['label', 'error', 'hint', 'icon', 'is-toggle-password', 'mask', 'label-style', 'control-style'])->twMerge($classes() . ($shouldShowErrorIcon(isset($suffix)) ? ' bk-input__control--has-error-icon' : '')) }}
            @if ($placeholder) placeholder="{{ $placeholder }}" @endif
            @if ($value !== null) value="{{ $value }}" @endif
            @if ($hasAnyError) aria-invalid="true" aria-describedby="{{ $attributes->get('id') }}-error" @endif
            @if ($shouldUseNumberStepper()) x-ref="numberInput" x-model.number="value" @endif
            @if ($hasMask()) x-on:input="$el.value = applyMask($el.value, $event)" @endif>

        {{-- Error Indicator --}}
        @include('basekit::components.form.partials.error-indicator', [
            'hasError' => $shouldShowErrorIcon(isset($suffix)),
            'class' => 'bk-input__error-icon' . ($isTogglePassword ? ' bk-input__error-icon--with-toggle' : ''),
        ])

        {{-- Number Increment Button --}}
        @include('basekit::components.form.partials.input.input-number-increment', [
            'shouldUseNumberStepper' => $shouldUseNumberStepper(),
            'step' => $attributes->get('step', 1),
            'max' => $attributes->get('max', 'Infinity'),
        ])

        {{-- Password Toggle --}}
        @include('basekit::components.form.partials.input.input-password-toggle', [
            'isTogglePassword' => $isTogglePassword,
        ])

        {{-- Suffix Slot --}}
        @if (isset($suffix))
            <span class="bk-input__suffix">{{ $suffix }}</span>
        @endif
    </div>

    {{-- Error Message --}}
    @if ($hasAnyError)
        <p class="bk-input__error-message"
            @if ($attributes->get('id')) id="{{ $attributes->get('id') }}-error" @endif>
            {{ $error }}
        </p>
    @endif

    {{-- Hint Text --}}
    @if (!$hasAnyError && ($hint || $hasCustomHint))
        <p class="bk-input__hint">
            {{ $hint }}
        </p>
    @endif
</div>
