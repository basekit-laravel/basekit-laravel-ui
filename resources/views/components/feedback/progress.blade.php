{{-- Progress Component --}}
{{--
    Props:
    - variant: 'primary', 'secondary', 'success', 'danger', 'warning', 'info', 'ghost', 'white' (default: from config)
    - size: 'sm', 'md', 'lg' (default: from config)
    - value: float (current value, default: 0)
    - dynamic-value: string|null Alpine expression for dynamic value (e.g. "progress")
    - max: float (maximum value, default: 100)
    - label: string (optional)
    - is-show-percentage: bool (default: false)
    - indeterminate: bool (default: false)
    
    Slots:
    - label: Custom label content (overrides label prop)
--}}

{{-- Progress Container --}}
<div {{ $attributes->twMerge('bk-progress') }}>
    {{-- Label --}}
    @if ($label || $isShowPercentage)
        <div class="bk-progress__label-container">
            @if ($label)
                <span class="bk-progress__label">
                    {{ $label }}
                </span>
            @endif

            @if ($isShowPercentage && !$indeterminate)
                @if ($hasDynamicValue)
                    <span class="bk-progress__percentage" x-text="{{ $dynamicPercentageExpression }}"></span>
                @else
                    <span class="bk-progress__percentage">{{ number_format($percentage(), 0) }}%</span>
                @endif
            @endif
        </div>
    @endif

    {{-- Progress Bar --}}
    <div class="{{ $classes() }}" role="progressbar" aria-valuemin="0" aria-valuemax="{{ $max }}"
        @if ($indeterminate) aria-busy="true"
        @elseif ($hasDynamicValue)
            x-bind:aria-valuenow="{{ $dynamicNowExpression }}"
        @else
            aria-valuenow="{{ $value }}" @endif>
        <div @class([
            'bk-progress__fill',
            'bk-progress__fill--indeterminate' => $indeterminate,
        ])
            @if ($indeterminate) aria-hidden="true"
            @elseif ($hasDynamicValue)
                x-bind:style="{{ $dynamicWidthExpression }}"
            @else
                style="width: {{ $percentage() }}%" @endif>
        </div>
    </div>
</div>
