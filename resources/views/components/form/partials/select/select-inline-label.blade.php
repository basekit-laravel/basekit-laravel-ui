@if (($labelStyle === 'inset' || $labelStyle === 'overlap') && $hasLabel)
    <label class="{{ $labelStyle === 'inset' ? 'bk-select__label--inset' : 'bk-select__label--overlap' }}" for="{{ $inputId() }}">
        {{ $labelContent }}
    </label>
@endif
