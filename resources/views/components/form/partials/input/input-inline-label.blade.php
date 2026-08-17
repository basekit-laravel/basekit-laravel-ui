@if (($labelStyle === 'inset' || $labelStyle === 'overlap') && $hasLabel)
    <label class="{{ $labelStyle === 'inset' ? 'bk-input__label--inset' : 'bk-input__label--overlap' }}" for="{{ $inputId() }}">
        {{ $labelContent }}
    </label>
@endif
