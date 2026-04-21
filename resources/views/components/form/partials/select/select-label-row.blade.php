@if ($shouldShowTopLabel && ($hasLabel || $hasCornerHint))
    <div class="bk-select__label-row">
        @if ($hasLabel)
            <label class="bk-select__label">
                {{ $labelContent }}
            </label>
        @endif
        @if ($hasCornerHint)
            <span class="bk-select__corner-hint">{{ $cornerHint }}</span>
        @endif
    </div>
@endif
