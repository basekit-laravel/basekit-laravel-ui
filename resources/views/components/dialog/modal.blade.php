{{-- Modal Component --}}
{{--
    Props:
    - size: 'sm', 'md', 'lg', 'xl', 'full' (default from config)
    - title: string|null
    - isCloseOnBackdrop: bool (default: true)
    - isCloseButton: bool (default: true)
    - isOpen: bool (default: false)
    - show: string|null (external Alpine.js variable name to bind to, e.g., 'isModalOpen')

    Slots:
    - default: Modal body content
    - footer: Optional footer actions
--}}

@if ($isExternallyControlled())
    <div x-show="{{ $stateVariable() }}" @keydown.escape.window="{{ $closeExpression() }}" x-cloak
        @if ($isCloseOnBackdrop) @click="{{ $closeExpression() }}" @endif
        {{ $attributes->twMerge('bk-modal') }}>
    @else
        <div x-data="{ open: {{ $isOpen ? 'true' : 'false' }} }" @keydown.escape.window="{{ $closeExpression() }}" x-show="{{ $stateVariable() }}"
            @if ($isCloseOnBackdrop) @click="{{ $closeExpression() }}" @endif x-cloak
            {{ $attributes->twMerge('bk-modal') }}>
@endif

<div x-show="{{ $stateVariable() }}" x-transition:enter="transition ease-out duration-300"
    x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
    x-transition:leave="transition ease-in duration-200" x-transition:leave-start="opacity-100"
    x-transition:leave-end="opacity-0" class="bk-modal__backdrop">
</div>

<div class="bk-modal__container">
    <div x-show="{{ $stateVariable() }}" x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
        x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
        x-transition:leave="transition ease-in duration-200"
        x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
        x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" class="{{ $classes() }}"
        role="dialog" aria-modal="true" @click.stop>

        @if ($title || $isCloseButton)
            <div class="bk-modal__header">
                @if ($title)
                    <h3 class="bk-modal__title">{{ $title }}</h3>
                @endif

                @if ($isCloseButton)
                    <button type="button" @click="{{ $closeExpression() }}" class="bk-modal__close"
                        aria-label="Close">
                        <x-heroicon-o-x-mark class="w-6 h-6" />
                    </button>
                @endif
            </div>
        @endif

        <div class="bk-modal__body">
            {{ $slot }}
        </div>

        @if (isset($footer))
            <div class="bk-modal__footer">
                {{ $footer }}
            </div>
        @endif
    </div>
</div>

</div>
