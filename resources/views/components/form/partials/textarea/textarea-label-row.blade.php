@if ($shouldShowTopLabel && ($hasLabel || $hasCornerHint))
    <div class="bk-textarea__label-row">
        @if ($hasLabel)
            <label class="bk-textarea__label">
                {{ $labelContent }}
            </label>
        @endif
        @if ($hasCornerHint)
            <span class="bk-textarea__corner-hint">{{ $cornerHint }}</span>
        @endif
    </div>
@endif
