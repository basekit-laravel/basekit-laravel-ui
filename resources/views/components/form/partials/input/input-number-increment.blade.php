@if ($shouldUseNumberStepper)
    <button type="button" class="bk-input__number-btn bk-input__number-btn--increment" tabindex="-1"
        @click="value = Math.min(value + {{ $step }}, {{ $max }}); $refs.numberInput.value = value; $refs.numberInput.dispatchEvent(new Event('input', { bubbles: true }))"
        aria-label="Increase value">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
        </svg>
    </button>
@endif
