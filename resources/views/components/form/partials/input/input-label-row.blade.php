@if ($shouldShowTopLabel && ($hasLabel || $hasCornerHint))
    <div class="bk-input__label-row">
        @if ($hasLabel)
            <label class="bk-input__label">
                {{ $labelContent }}
            </label>
        @endif
        @if ($hasCornerHint)
            <span class="bk-input__corner-hint">{{ $cornerHint }}</span>
        @endif
    </div>
@endif
