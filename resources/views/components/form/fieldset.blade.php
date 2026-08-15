{{-- Fieldset Component --}}
{{--
    Props:
    - label: string (optional, group legend)
    - error: string (optional, group-level error message)
    - hint: string (optional, group-level hint)
    - wrapper-class: string (optional, additional classes for the outer wrapper)
    - items-class: string (optional, additional classes for the items container)

    Slots:
    - label: Custom legend content
    - default: The grouped form controls
    - error: Custom error message
    - hint: Custom hint content
--}}

<fieldset {{ $attributes->except(['label', 'error', 'hint', 'wrapper-class', 'items-class'])->merge([
    'class' => 'bk-fieldset'.($wrapperClass ? ' '.$wrapperClass : ''),
]) }}>
    @if ($label)
        <legend class="bk-fieldset__legend">
            {{ $label }}
        </legend>
    @endif

    <div class="bk-fieldset__items {{ $itemsClass ?? '' }}">
        {{ $slot }}
    </div>

    {{-- Messages (one reserved line for the whole group, prevents layout shift) --}}
    @if ($error || $hint || $reservesMessages)
        <div class="bk-fieldset__messages">
            @if ($error)
                <p class="bk-fieldset__error-message" role="alert">
                    {{ $error }}
                </p>
            @elseif (!$hasError() && $hint)
                <p class="bk-fieldset__hint">
                    {{ $hint }}
                </p>
            @endif
        </div>
    @endif
</fieldset>
