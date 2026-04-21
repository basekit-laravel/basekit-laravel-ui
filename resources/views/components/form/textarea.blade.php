{{-- Textarea Component --}}
{{--
    Props:
    - variant: 'primary', 'secondary', 'success', 'danger', 'warning', 'info', 'ghost' (default: from config)
    - size: 'sm', 'md', 'lg' (default: from config)
    - label: string (optional)
    - error: string (optional, shows error message)
    - hint: string (optional, shows help text)
    - placeholder: string (optional)
    - value: string (optional)
    - rows: int (default: 4)
    - corner-hint: string (optional, right-aligned hint text)
    - label-style: 'default', 'inset', 'overlap' (optional, controls label placement)
    - is-underline: bool (optional, gray background with bottom border only)
    
    Slots:
    - label: Custom label content
    - error: Custom error message
    - hint: Custom hint content
--}}

@php
    $hasCustomLabel = isset($label) && !is_string($label);
    $hasCustomError = isset($error) && !is_string($error);
    $hasCustomHint = isset($hint) && !is_string($hint);
    $hasAnyError = $hasError() || $hasCustomError;
@endphp

<div class="bk-textarea">
    {{-- Label / Corner Hint --}}
    @include('basekit::components.form.partials.textarea.textarea-label-row', [
        'shouldShowTopLabel' => $shouldShowTopLabel(),
        'hasLabel' => filled($label) || $hasCustomLabel,
        'labelContent' => $label,
        'hasCornerHint' => $hasCornerHint(),
        'cornerHint' => $cornerHint,
    ])

    {{-- Textarea Container --}}
    <div class="{{ $containerClasses() }}">
        {{-- Inline Labels (inset/overlap) --}}
        @include('basekit::components.form.partials.textarea.textarea-inline-label', [
            'labelStyle' => $labelStyle->value,
            'hasLabel' => filled($label) || $hasCustomLabel,
            'labelContent' => $label,
        ])

        {{-- Textarea Field --}}
        <textarea {{ $attributes->except(['label', 'error', 'hint', 'label-style'])->twMerge($classes()) }}
            rows="{{ $rows }}" @if ($placeholder) placeholder="{{ $placeholder }}" @endif
            @if ($hasAnyError) aria-invalid="true" aria-describedby="{{ $attributes->get('id') }}-error" @endif>{{ $value }}</textarea>

        {{-- Error Indicator --}}
        @include('basekit::components.form.partials.error-indicator', [
            'hasError' => $shouldShowErrorIcon(),
            'class' => 'bk-textarea__error-icon',
        ])
    </div>

    {{-- Error Message --}}
    @if ($hasAnyError)
        <p class="bk-textarea__error-message"
            @if ($attributes->get('id')) id="{{ $attributes->get('id') }}-error" @endif>
            {{ $error }}
        </p>
    @endif

    {{-- Hint Text --}}
    @if (!$hasAnyError && ($hint || $hasCustomHint))
        <p class="bk-textarea__hint">
            {{ $hint }}
        </p>
    @endif
</div>
