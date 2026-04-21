@if ($shouldShowTopLabel && ($hasLabel || $hasCornerHint))
    <div class="bk-multiselect__label-row">
        @if ($hasLabel)
            <label class="bk-multiselect__label">
                {{ $labelContent }}
            </label>
        @endif
        @if ($hasCornerHint)
            <span class="bk-multiselect__corner-hint">{{ $cornerHint }}</span>
        @endif
    </div>
@endif
