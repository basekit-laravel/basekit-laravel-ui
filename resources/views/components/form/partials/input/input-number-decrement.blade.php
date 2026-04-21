@if ($shouldUseNumberStepper)
    <button type="button" class="bk-input__number-btn bk-input__number-btn--decrement" tabindex="-1"
        @click="value = Math.max(value - {{ $step }}, {{ $min }}); $refs.numberInput.value = value; $refs.numberInput.dispatchEvent(new Event('input', { bubbles: true }))"
        aria-label="Decrease value">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" d="M5 12h14" />
        </svg>
    </button>
@endif
