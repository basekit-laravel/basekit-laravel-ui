{{-- Card Component --}}

<div {{ $attributes->twMerge($rootClassNames) }}>
    {{-- Header --}}
    @if (isset($header))
        <div class="bk-card__header {{ $headerClass ?? '' }}">
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
        <div class="bk-card__footer {{ $footerClass ?? '' }}">
            {{ $footer }}
        </div>
    @endif
</div>
