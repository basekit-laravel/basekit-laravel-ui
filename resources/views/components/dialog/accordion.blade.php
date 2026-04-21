{{-- Accordion Component --}}
{{--
    Props:
    - items: array (items with `title`, `content`, `value`)
    - isMultiple: bool (default: false)
    - active: mixed (string|array|null)

    Slots:
    - default: Custom accordion markup
--}}

<div {{ $attributes->twMerge($classes()) }} x-data="{{ $xDataAttribute() }}">

    @if ($slot->isEmpty() && !empty($items))
        @foreach ($items as $item)
            <div class="bk-accordion__item">
                <button type="button" @click="toggle({{ $itemValueExpression($item) }})"
                    :aria-expanded="isActive({{ $itemValueExpression($item) }}).toString()"
                    class="bk-accordion__trigger">
                    <span class="bk-accordion__title">{{ $item['title'] }}</span>
                    <x-dynamic-component :component="$chevronIcon()" class="bk-accordion__icon" ::class="{ 'rotate-180': isActive({{ $itemValueExpression($item) }}) }" />
                </button>

                <div x-show="isActive({{ $itemValueExpression($item) }})" x-collapse class="bk-accordion__content">
                    <div class="bk-accordion__body">
                        {{ $item['content'] }}
                    </div>
                </div>
            </div>
        @endforeach
    @else
        {{ $slot }}
    @endif
</div>
