{{-- Multi Select Component --}}
{{--
    Props:
    - variant: 'primary', 'secondary', 'success', 'warning', 'info', 'ghost' (default: from config)
    - size: 'sm', 'md', 'lg' (default: from config)
    - label: string (optional)
    - error: string (optional, shows error message)
    - hint: string (optional, shows help text)
    - icon: string (Heroicon name)
    - placeholder: string (optional)
    - options: array (key-value pairs)
    - value: array (selected values)
    - corner-hint: string (optional, right-aligned hint text)
    - label-style: 'default', 'inset', 'overlap' (optional, controls label placement)
    - control-style: 'default', 'pill', 'underline' (optional, controls control shape)

    Slots:
    - label: Custom label content
    - error: Custom error message
    - hint: Custom hint content
    - icon: Custom icon SVG
--}}

@php
    $hasCustomLabel = isset($label) && !is_string($label);
    $hasCustomError = isset($error) && !is_string($error);
    $hasCustomHint = isset($hint) && !is_string($hint);
    $hasCustomIcon = isset($icon) && !is_string($icon);
    $hasAnyError = $hasError() || $hasCustomError;
@endphp

<div class="bk-multiselect" x-data="{
    open: false,
    disabled: @js($isDisabled()),
    options: @js($optionsList()),
    selected: @js($value),
    toggle(value) {
        if (this.disabled) {
            return;
        }
        const index = this.selected.indexOf(value);
        if (index === -1) {
            this.selected.push(value);
        } else {
            this.selected.splice(index, 1);
        }
    },
    isSelected(value) {
        return this.selected.indexOf(value) !== -1;
    },
    selectedOptions() {
        return this.options.filter(option => this.selected.indexOf(option.value) !== -1);
    }
}" @click.away="open = false" @keydown.escape.window="open = false">
    {{-- Label / Corner Hint --}}
    @include('basekit::components.form.partials.multi_select.multi-select-label-row', [
        'shouldShowTopLabel' => $shouldShowTopLabel(),
        'hasLabel' => filled($label) || $hasCustomLabel,
        'labelContent' => $label,
        'hasCornerHint' => $hasCornerHint(),
        'cornerHint' => $cornerHint,
    ])

    {{-- Select Container --}}
    <div class="{{ $containerClasses() }}{{ $hasCustomIcon || $iconComponent() ? ' bk-multiselect__container--with-icon' : '' }}"
        @click="if (!disabled) open = !open">
        {{-- Inline Labels (inset/overlap) --}}
        @include('basekit::components.form.partials.multi_select.multi-select-inline-label', [
            'labelStyle' => $labelStyle->value,
            'hasLabel' => filled($label) || $hasCustomLabel,
            'labelContent' => $label,
        ])

        {{-- Icon --}}
        @if ($hasCustomIcon)
            <span class="bk-multiselect__icon">{{ $icon }}</span>
        @elseif ($iconComponent())
            <x-dynamic-component :component="$iconComponent()" class="bk-multiselect__icon" />
        @endif

        {{-- Control --}}
        <button type="button"
            {{ $attributes->except(['label', 'error', 'hint', 'icon', 'options', 'value', 'placeholder', 'corner-hint', 'label-style', 'control-style', 'name'])->twMerge($classes() . ($hasCustomIcon || $iconComponent() ? ' bk-multiselect__control--with-icon' : '')) }}
            :aria-expanded="open" aria-controls="{{ $listId() }}" aria-haspopup="listbox"
            @if ($hasAnyError) aria-invalid="true" aria-describedby="{{ $attributes->get('id') }}-error" @endif
            @if ($isDisabled()) disabled @endif>
            <div class="bk-multiselect__value">
                <template x-if="selected.length === 0">
                    <span class="bk-multiselect__placeholder">{{ $placeholderText() }}</span>
                </template>
                <template x-for="option in selectedOptions()" :key="option.value">
                    <span class="bk-multiselect__chip">
                        <span class="bk-multiselect__chip-label" x-text="option.label"></span>
                        <button type="button" class="bk-multiselect__chip-remove" @click.stop="toggle(option.value)">
                            x
                        </button>
                    </span>
                </template>
            </div>
            <x-heroicon-o-chevron-down class="bk-multiselect__chevron"
                x-bind:class="{ 'bk-multiselect__chevron--open': open }" />
        </button>

        {{-- Error Indicator --}}
        @include('basekit::components.form.partials.error-indicator', [
            'hasError' => $hasError(),
            'class' => 'bk-multiselect__error-icon',
        ])

        {{-- Hidden Inputs --}}
        @if ($inputNameForArray())
            <template x-for="value in selected" :key="value">
                <input type="hidden" name="{{ $inputNameForArray() }}" :value="value">
            </template>
        @endif

        {{-- Dropdown Menu --}}
        <div id="{{ $listId() }}" class="bk-multiselect__menu" role="listbox" aria-multiselectable="true"
            x-show="open" x-transition @click.stop>
            <template x-for="option in options" :key="option.value">
                <button type="button" class="bk-multiselect__option" role="option"
                    :aria-selected="isSelected(option.value)"
                    x-bind:class="{ 'bk-multiselect__option--selected': isSelected(option.value) }"
                    @click="toggle(option.value)">
                    <span class="bk-multiselect__option-label" x-text="option.label"></span>
                    <span class="bk-multiselect__option-check" aria-hidden="true"></span>
                </button>
            </template>
        </div>
    </div>

    {{-- Error Message --}}
    @if ($hasAnyError)
        <p class="bk-multiselect__error-message"
            @if ($attributes->get('id')) id="{{ $attributes->get('id') }}-error" @endif>
            {{ $error }}
        </p>
    @endif

    {{-- Hint Text --}}
    @if (!$hasAnyError && ($hint || $hasCustomHint))
        <p class="bk-multiselect__hint">
            {{ $hint }}
        </p>
    @endif
</div>
