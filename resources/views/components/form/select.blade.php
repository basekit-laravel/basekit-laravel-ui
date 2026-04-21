{{-- Select Component --}}
{{--
    Props:
    - variant: 'primary', 'secondary', 'success', 'danger', 'warning', 'info', 'ghost' (default: from config)
    - size: 'sm', 'md', 'lg' (default: from config)
    - label: string (optional)
    - error: string (optional, shows error message)
    - hint: string (optional, shows help text)
    - icon: string (Heroicon name, e.g., 'chevron-down')
    - placeholder: string (optional)
    - empty-label: string (optional, text for explicit empty option when allow-empty is true)
    - options: array (key-value pairs)
    - value: mixed (selected value)
    - is-disabled: bool (default: false)
    - corner-hint: string (optional, right-aligned hint text)
    - label-style: 'default', 'inset', 'overlap' (optional, controls label placement)
    - control-style: 'default', 'pill', 'underline' (optional, controls control shape)
    - allow-empty: bool (optional, allows selecting an explicit empty value)
    
    Slots:
    - label: Custom label content
    - error: Custom error message
    - hint: Custom hint content
    - icon: Custom icon SVG
    - default: Custom option elements
--}}

@php
    $hasCustomLabel = isset($label) && !is_string($label);
    $hasCustomError = isset($error) && !is_string($error);
    $hasCustomHint = isset($hint) && !is_string($hint);
    $hasCustomIcon = isset($icon) && !is_string($icon);
    $hasAnyError = $hasError() || $hasCustomError;
    $selectedValue = $value;
    if (($selectedValue === null || $selectedValue === '') && $attributes->has('value')) {
        $selectedValue = $attributes->get('value');
    }
    $isMultiple = $attributes->has('multiple');
    $selectName = $attributes->get('name');
    $useCustomDropdown = $slot->isEmpty() && !$isMultiple;
    $emptyOptionLabel = $emptyLabel ?? ($placeholder ?? 'None');
    $normalizedOptions = collect($options)
        ->map(fn($optionLabel, $optionValue) => ['value' => (string) $optionValue, 'label' => (string) $optionLabel])
        ->values();
    if ($allowEmpty && $useCustomDropdown) {
        $normalizedOptions = $normalizedOptions->prepend(['value' => '', 'label' => (string) $emptyOptionLabel]);
    }
    $initialCustomValue = $selectedValue;
    if (
        $useCustomDropdown &&
        !$allowEmpty &&
        ($initialCustomValue === null || $initialCustomValue === '') &&
        ($placeholder === null || $placeholder === '') &&
        $normalizedOptions->isNotEmpty()
    ) {
        $initialCustomValue = $normalizedOptions->first()['value'];
    }
@endphp

<div class="bk-select" x-data="{
    open: false,
    disabled: @js($isDisabledAttribute()),
    _blurTimer: null,
    options: @js($normalizedOptions),
    selectedValue: @js($initialCustomValue === null ? null : (string) $initialCustomValue),
    placeholderText: @js($placeholder),
    selectedLabel() {
        const selected = this.options.find(option => option.value === String(this.selectedValue ?? ''));
        if (selected) {
            return selected.label;
        }
        if ((!this.placeholderText || this.placeholderText === '') && this.options.length > 0) {
            return this.options[0].label;
        }
        return this.placeholderText || '';
    }
}" @click.away="open = false" @keydown.escape.window="open = false">
    {{-- Label / Corner Hint --}}
    @include('basekit::components.form.partials.select.select-label-row', [
        'shouldShowTopLabel' => $shouldShowTopLabel(),
        'hasLabel' => filled($label) || $hasCustomLabel,
        'labelContent' => $label,
        'hasCornerHint' => $hasCornerHint(),
        'cornerHint' => $cornerHint,
    ])

    {{-- Select Container --}}
    <div class="{{ $containerClasses() }}" :class="{ 'bk-select__container--open': open }">
        {{-- Inline Labels (inset/overlap) --}}
        @include('basekit::components.form.partials.select.select-inline-label', [
            'labelStyle' => $labelStyle->value,
            'hasLabel' => filled($label) || $hasCustomLabel,
            'labelContent' => $label,
        ])

        {{-- Icon --}}
        @if ($hasCustomIcon)
            <span class="bk-select__icon">{{ $icon }}</span>
        @elseif ($iconComponent())
            <x-dynamic-component :component="$iconComponent()" class="bk-select__icon" />
        @endif

        @if ($useCustomDropdown)
            {{-- Custom Dropdown Field (matches multi-select menu styling) --}}
            <button type="button"
                {{ $attributes->except(['label', 'error', 'hint', 'icon', 'options', 'value', 'placeholder', 'empty-label', 'corner-hint', 'label-style', 'control-style', 'is-disabled', 'name', 'allow-empty'])->twMerge($classes() . ($iconComponent() || $hasCustomIcon ? ' bk-select__control--with-icon' : '')) }}
                @if ($hasAnyError) aria-invalid="true" aria-describedby="{{ $attributes->get('id') }}-error" @endif
                @if ($isDisabledAttribute()) disabled @endif :aria-expanded="open" aria-haspopup="listbox"
                @click="if (!disabled) open = !open" @blur="_blurTimer = setTimeout(() => { open = false }, 150)">
                <span class="bk-select__display"
                    :class="{ 'bk-select__display--placeholder': selectedValue === null || selectedValue === '' }"
                    x-text="selectedLabel()"></span>
            </button>

            @if ($selectName)
                <input type="hidden" name="{{ $selectName }}" :value="selectedValue ?? ''">
            @endif

            <div class="bk-select__menu" role="listbox" x-show="open" x-transition @click.stop>
                <template x-for="option in options" :key="option.value">
                    <button type="button" class="bk-select__option" role="option"
                        :aria-selected="String(selectedValue ?? '') === option.value"
                        x-bind:class="{ 'bk-select__option--selected': String(selectedValue ?? '') === option.value }"
                        @click="selectedValue = option.value; open = false;">
                        <span class="bk-select__option-label" x-text="option.label"></span>
                    </button>
                </template>
            </div>
        @else
            {{-- Native Select Field (fallback for slotted/multiple usage) --}}
            <select
                {{ $attributes->except(['label', 'error', 'hint', 'icon', 'options', 'value', 'placeholder', 'empty-label', 'corner-hint', 'label-style', 'control-style', 'is-disabled', 'allow-empty'])->twMerge($classes() . ($iconComponent() || $hasCustomIcon ? ' bk-select__control--with-icon' : '')) }}
                @if ($hasAnyError) aria-invalid="true" aria-describedby="{{ $attributes->get('id') }}-error" @endif
                @if ($isDisabledAttribute()) disabled @endif @mousedown="clearTimeout(_blurTimer); open = !open"
                @blur="_blurTimer = setTimeout(() => { open = false }, 150)"
                @change="clearTimeout(_blurTimer); open = false">

                {{-- Placeholder Option --}}
                @if ($allowEmpty)
                    <option value="" @selected($selectedValue === null || $selectedValue === '')>{{ $emptyOptionLabel }}</option>
                @elseif ($placeholder)
                    <option value="" disabled @selected($selectedValue === null || $selectedValue === '')>{{ $placeholder }}</option>
                @endif

                {{-- Options (generated or slotted) --}}
                @if ($slot->isEmpty())
                    @foreach ($options as $optionValue => $optionLabel)
                        <option value="{{ $optionValue }}" @selected($isMultiple ? is_array($selectedValue) && in_array((string) $optionValue, array_map('strval', $selectedValue), true) : (string) $selectedValue === (string) $optionValue)>
                            {{ $optionLabel }}
                        </option>
                    @endforeach
                @else
                    {{ $slot }}
                @endif
            </select>
        @endif

        {{-- Error Indicator --}}
        @include('basekit::components.form.partials.error-indicator', [
            'hasError' => $hasError(),
            'class' => 'bk-select__error-icon',
        ])

        {{-- Chevron Icon --}}
        <x-heroicon-o-chevron-down class="bk-select__chevron" x-bind:class="{ 'bk-select__chevron--open': open }" />
    </div>

    {{-- Error Message --}}
    @if ($hasAnyError)
        <p class="bk-select__error-message"
            @if ($attributes->get('id')) id="{{ $attributes->get('id') }}-error" @endif>
            {{ $error }}
        </p>
    @endif

    {{-- Hint Text --}}
    @if (!$hasAnyError && ($hint || $hasCustomHint))
        <p class="bk-select__hint">
            {{ $hint }}
        </p>
    @endif
</div>
