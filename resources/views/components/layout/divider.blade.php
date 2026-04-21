{{-- Divider Component --}}

{{-- Divider Line --}}
@if ($isHorizontal())
    <div {{ $attributes->twMerge($classes()) }} role="separator">
        {{-- Divider Label --}}
        @if ($label || $slot->isNotEmpty())
            <span class="bk-divider__label">{{ $slot->isEmpty() ? $label : $slot }}</span>
        @endif
    </div>
@else
    <div {{ $attributes->twMerge($classes()) }} role="separator"></div>
@endif
