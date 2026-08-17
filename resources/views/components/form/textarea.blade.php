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
    - control-style: 'default', 'pill', 'underline' (optional, controls control appearance)
    - wrapper-class: string (optional, additional classes for the outer wrapper div)
    - container-class: string (optional, additional classes for the inner container div)
    
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

<div class="bk-textarea {{ $wrapperClass ?? '' }}" @if ($colorStyle()) style="{{ $colorStyle() }}" @endif>
    {{-- Label / Corner Hint --}}
    @include('basekit::components.form.partials.textarea.textarea-label-row', [
        'shouldShowTopLabel' => $shouldShowTopLabel(),
        'hasLabel' => filled($label) || $hasCustomLabel,
        'labelContent' => $label,
        'hasCornerHint' => $hasCornerHint(),
        'cornerHint' => $cornerHint,
    ])

    {{-- Textarea Container --}}
    <div class="{{ $containerClasses() }}{{ $containerClass ? ' ' . $containerClass : '' }}">
        {{-- Inline Labels (inset/overlap) --}}
        @include('basekit::components.form.partials.textarea.textarea-inline-label', [
            'labelStyle' => $labelStyle->value,
            'hasLabel' => filled($label) || $hasCustomLabel,
            'labelContent' => $label,
        ])

        {{-- Textarea Field --}}
        <textarea id="{{ $inputId() }}" {{ $attributes->except(['label', 'error', 'hint', 'label-style', 'id'])->twMerge($classes()) }}
            rows="{{ $rows }}" @if ($placeholder) placeholder="{{ $placeholder }}" @endif
            @if ($hasAnyError) aria-invalid="true" aria-describedby="{{ $inputId() }}-error" @endif
            @if (!$hasAnyError && ($hint || $hasCustomHint)) aria-describedby="{{ $inputId() }}-hint" @endif>{{ $value }}</textarea>

        {{-- Error Indicator --}}
        @include('basekit::components.form.partials.error-indicator', [
            'hasError' => $shouldShowErrorIcon(),
            'class' => 'bk-textarea__error-icon',
        ])
    </div>

    {{-- Messages (reserved slot prevents layout shift when validation messages appear) --}}
    @if ($hasAnyError || $hint || $hasCustomHint || $reservesMessages)
        <div class="bk-textarea__messages">
            @if ($hasAnyError)
                <p class="bk-textarea__error-message" role="alert" id="{{ $inputId() }}-error">
                    {{ $error }}
                </p>
            @elseif (!$hasAnyError && ($hint || $hasCustomHint))
                <p class="bk-textarea__hint" id="{{ $inputId() }}-hint">
                    {{ $hint }}
                </p>
            @endif
        </div>
    @endif
</div>
