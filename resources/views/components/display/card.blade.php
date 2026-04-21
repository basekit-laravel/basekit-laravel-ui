{{-- Card Component --}}

<div {{ $attributes->twMerge($rootClassNames) }}>
    {{-- Header --}}
    @if (isset($header))
        <div class="bk-card__header">
            <div class="bk-card__header-content">
                {{ $header }}
            </div>

            @if (isset($actions))
                <div class="bk-card__header-actions">
                    {{ $actions }}
                </div>
            @endif
        </div>
    @endif

    {{-- Body --}}
    <div class="{{ $bodyClassNames }}">
        {{ $slot }}
    </div>

    {{-- Footer --}}
    @if (isset($footer))
        <div class="bk-card__footer">
            {{ $footer }}
        </div>
    @endif
</div>
