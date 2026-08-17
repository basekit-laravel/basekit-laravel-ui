@if (($labelStyle === 'inset' || $labelStyle === 'overlap') && $hasLabel)
    <label class="{{ $labelStyle === 'inset' ? 'bk-multiselect__label--inset' : 'bk-multiselect__label--overlap' }}" for="{{ $inputId() }}">
        {{ $labelContent }}
    </label>
@endif
