@if (($labelStyle === 'inset' || $labelStyle === 'overlap') && $hasLabel)
    <label class="{{ $labelStyle === 'inset' ? 'bk-textarea__label--inset' : 'bk-textarea__label--overlap' }}">
        {{ $labelContent }}
    </label>
@endif
