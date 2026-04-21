{{-- Tooltip Component --}}
{{--
    Props:
    - position: 'top', 'bottom', 'left', 'right' (default: from config)
    - content: string (tooltip text)
    - show-delay: int (milliseconds before show, default: 0)
    - hide-delay: int (milliseconds before hide, default: 0)
    
    Slots:
    - default: Trigger element
    - content: Custom tooltip content
    
    Note: Requires Alpine.js for show/hide functionality
--}}

{{-- Tooltip Wrapper --}}
<div class="bk-tooltip" x-data="{{ $xDataExpression }}" @mouseenter="{{ $showHandlerExpression }}"
    @mouseleave="{{ $hideHandlerExpression }}" @focusin="{{ $showHandlerExpression }}"
    @focusout="{{ $hideHandlerExpression }}">

    {{-- Trigger Element --}}
    <div class="bk-tooltip__trigger">
        {{ $slot }}
    </div>

    {{-- Tooltip Content --}}
    <div class="{{ $classes() }}" x-show="show" x-transition:enter="transition ease-out duration-200"
        x-transition:enter-start="opacity-0 transform scale-95" x-transition:enter-end="opacity-100 transform scale-100"
        x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100 transform scale-100"
        x-transition:leave-end="opacity-0 transform scale-95" role="tooltip">
        {{ $content }}
    </div>
</div>
