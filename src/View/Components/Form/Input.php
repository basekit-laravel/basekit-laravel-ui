<?php

declare(strict_types=1);

namespace BasekitLaravel\BasekitLaravelUi\View\Components\Form;

use BasekitLaravel\BasekitLaravelUi\Enums\ControlStyle;
use BasekitLaravel\BasekitLaravelUi\Enums\InputVariant;
use BasekitLaravel\BasekitLaravelUi\Enums\LabelStyle;
use BasekitLaravel\BasekitLaravelUi\Enums\Size;
use BasekitLaravel\BasekitLaravelUi\View\Components\Support\ComponentPropResolver;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

/**
 * Input component for Basekit Laravel UI.
 *
 * A flexible input component supporting various types, styles, sizes, icons, and states.
 * Can be used for text, password, email, number inputs, etc. Independent of other inputs.
 */
class Input extends Component
{
    /**
     * The input size.
     */
    public Size $size;

    /**
     * The input variant.
     */
    public InputVariant $variant;

    /**
     * The input label style.
     */
    public LabelStyle $labelStyle;

    /**
     * The input control style.
     */
    public ControlStyle $controlStyle;

    /**
     * Whether to show a password visibility toggle.
     */
    public bool $isTogglePassword = false;

    /**
     * Create a new component instance.
     */
    public function __construct(
        /**
         * The input HTML type attribute.
         */
        public string $type = 'text',
        /**
         * Label placement style: default, inset, or overlap.
         */
        string|LabelStyle $labelStyle = 'default',
        /**
         * Control style: default, pill, or underline.
         */
        string|ControlStyle $controlStyle = 'default',
        /**
         * Whether to enable the password visibility toggle for password inputs.
         */
        bool $isTogglePassword = false,
        /**
         * The input variant style.
         */
        ?string $variant = null,
        /**
         * The input size.
         */
        ?string $size = null,
        /**
         * The input label.
         */
        public ?string $label = null,
        /**
         * The error message.
         */
        public ?string $error = null,
        /**
         * The hint text.
         */
        public ?string $hint = null,
        /**
         * Icon name for Heroicons.
         */
        public ?string $icon = null,
        /**
         * The input placeholder.
         */
        public ?string $placeholder = null,
        /**
         * The input value.
         */
        public ?string $value = null,
        /**
         * Optional input mask pattern.
         */
        public ?string $mask = null,
        /**
         * Optional corner hint text.
         */
        public ?string $cornerHint = null
    ) {
        $this->isTogglePassword = $this->type === 'password' && $isTogglePassword;
        $this->labelStyle = $this->resolveLabelStyle($labelStyle);
        $this->controlStyle = $this->resolveControlStyle($controlStyle);
        $this->variant = $this->resolveVariant($variant);
        $this->size = $this->resolveSize($size);
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View
    {
        return view('basekit::components.form.input');
    }

    /**
     * Get the input classes.
     */
    public function classes(): string
    {
        $classes = ['bk-input__control', "bk-input__control--{$this->size->value}"];
        $classes[] = $this->hasError()
            ? 'bk-input__control--error'
            : "bk-input__control--{$this->variant->value}";

        if ($this->icon !== null && $this->icon !== '') {
            $classes[] = 'bk-input__control--with-icon';
        }

        if ($this->isTogglePassword) {
            $classes[] = 'bk-input__control--has-password-toggle';
        }

        if ($this->shouldUseNumberStepper()) {
            $classes[] = 'bk-input__number';
        }

        if ($this->isInsetLabel()) {
            $classes[] = 'bk-input__control--label-inset';
        }

        if ($this->isOverlapLabel()) {
            $classes[] = 'bk-input__control--label-overlap';
        }

        if ($this->isPill()) {
            $classes[] = 'bk-input__control--pill';
        }

        if ($this->isUnderline()) {
            $classes[] = 'bk-input__control--underline';
        }

        return implode(' ', $classes);
    }

    /**
     * Get the input container classes.
     */
    public function containerClasses(): string
    {
        $classes = ['bk-input__container', "bk-input__container--{$this->size->value}"];
        $classes[] = $this->hasError()
            ? 'bk-input__container--error'
            : "bk-input__container--{$this->variant->value}";

        if ($this->isInsetLabel()) {
            $classes[] = 'bk-input__container--label-inset';
        }

        if ($this->isOverlapLabel()) {
            $classes[] = 'bk-input__container--label-overlap';
        }

        if ($this->isPill()) {
            $classes[] = 'bk-input__container--pill';
        }

        if ($this->isUnderline()) {
            $classes[] = 'bk-input__container--underline';
        }

        return implode(' ', $classes);
    }

    /**
     * Determine if a corner hint is present.
     */
    public function hasCornerHint(): bool
    {
        return $this->cornerHint !== null && $this->cornerHint !== '';
    }

    /**
     * Check if component has an error.
     */
    public function hasError(): bool
    {
        return $this->error !== null;
    }

    /**
     * Determine if a mask is configured.
     */
    public function hasMask(): bool
    {
        return $this->mask !== null && $this->mask !== '';
    }

    /**
     * Get the Heroicon component name.
     */
    public function iconComponent(): ?string
    {
        return ComponentPropResolver::heroiconComponent($this->icon);
    }

    /**
     * Resolve the input type when masks are used.
     */
    public function inputType(): string
    {
        return $this->hasMask() ? 'text' : $this->type;
    }

    /**
     * Check if input is a number type.
     */
    public function isNumber(): bool
    {
        return $this->type === 'number';
    }

    /**
     * Determine if the number stepper should render.
     */
    public function shouldUseNumberStepper(): bool
    {
        return $this->isNumber() && ! $this->hasMask();
    }

    /**
     * Determine if the inline error icon should render.
     */
    public function shouldShowErrorIcon(bool $hasSuffix = false): bool
    {
        return $this->hasError() && ! $hasSuffix && ! $this->shouldUseNumberStepper();
    }

    /**
     * Determine if the top label row should render.
     */
    public function shouldShowTopLabel(): bool
    {
        return $this->labelStyle === LabelStyle::Default;
    }

    /**
     * Check if the inset label style is active.
     */
    public function isInsetLabel(): bool
    {
        return $this->labelStyle === LabelStyle::Inset;
    }

    /**
     * Check if the overlap label style is active.
     */
    public function isOverlapLabel(): bool
    {
        return $this->labelStyle === LabelStyle::Overlap;
    }

    /**
     * Check if the pill control style is active.
     */
    public function isPill(): bool
    {
        return $this->controlStyle === ControlStyle::Pill;
    }

    /**
     * Check if the underline control style is active.
     */
    public function isUnderline(): bool
    {
        return $this->controlStyle === ControlStyle::Underline;
    }

    /**
     * Build Alpine x-data attribute for the input wrapper.
     */
    public function xDataAttribute(): ?string
    {
        $parts = [];

        if ($this->isTogglePassword) {
            $parts[] = 'showPassword: false';
        }

        if ($this->shouldUseNumberStepper()) {
            $value = $this->value ?? 0;
            $parts[] = 'value: '.$value;
        }

        if ($this->hasMask()) {
            $maskJson = json_encode($this->mask, JSON_HEX_APOS | JSON_HEX_AMP | JSON_HEX_QUOT);
            $maskJson = htmlspecialchars((string) $maskJson, ENT_QUOTES, 'UTF-8');
            $parts[] = "mask: {$maskJson}";
            $parts[] = 'rawDigits: []';
            $parts[] = 'lastValue: \'\'';
            $parts[] = $this->maskAlpineFunction();
        }

        if ($parts === []) {
            return null;
        }

        return 'x-data="{ '.implode(', ', $parts).' }"';
    }

    /**
     * Alpine helper for masking digits with # placeholders.
     */
    protected function maskAlpineFunction(): string
    {
        return "applyMask(value, event) {\n            const maxDigits = (this.mask.match(/#/g) || []).length;\n            const inputType = event?.inputType || '';\n            const data = event?.data || '';\n\n            if (inputType.startsWith('delete')) {\n                if (this.rawDigits.length > 0) {\n                    this.rawDigits = this.rawDigits.slice(0, -1);\n                }\n            } else if (inputType === 'insertText' || inputType === 'insertCompositionText') {\n                const newDigits = data.match(/\\d/g) || [];\n                if (newDigits.length) {\n                    this.rawDigits = this.rawDigits.concat(newDigits);\n                }\n            } else if (inputType === 'insertFromPaste') {\n                const pastedDigits = data.match(/\\d/g) || [];\n                this.rawDigits = pastedDigits.length ? pastedDigits : (value.match(/\\d/g) || []);\n            } else {
            const currentDigits = value.match(/\\d/g) || [];\n                const isDeleting = value.length < this.lastValue.length;\n\n                if (isDeleting && currentDigits.length === this.rawDigits.length) {\n                    this.rawDigits = this.rawDigits.slice(0, -1);\n                } else {\n                    this.rawDigits = currentDigits;\n                }\n            }\n\n            if (this.rawDigits.length > maxDigits) {\n                this.rawDigits = this.rawDigits.slice(0, maxDigits);\n            }\n\n            const digits = [];\n            let rawIndex = 0;\n\n            for (let i = 0; i < this.mask.length; i += 1) {\n                const token = this.mask[i];\n\n                if (token === '#') {\n                    if (rawIndex >= this.rawDigits.length) {\n                        break;\n                    }\n\n                    digits.push(this.rawDigits[rawIndex]);\n                    rawIndex += 1;\n                    continue;\n                }\n            }\n\n            if (digits.length === 0) {\n                this.lastValue = '';\n                return '';\n            }\n\n            let result = '';\n            let digitIndex = 0;\n            let started = false;\n\n            for (let i = 0; i < this.mask.length; i += 1) {\n                const token = this.mask[i];\n\n                if (token === '#') {\n                    if (digitIndex >= digits.length) {\n                        break;\n                    }\n\n                    result += digits[digitIndex];\n                    digitIndex += 1;\n                    started = true;\n                    continue;\n                }\n\n                if (!started) {\n                    result += token;\n                    continue;\n                }\n\n                if (digitIndex < digits.length) {\n                    result += token;\n                }\n            }\n\n            this.lastValue = result;\n            return result;\n        }";
    }

    /**
     * Resolve the input size, falling back to config default if not provided.
     */
    private function resolveSize(?string $size): Size
    {
        return ComponentPropResolver::resolveEnum(
            Size::class,
            'basekit.components.input.sizes',
            'basekit.components.input.default_size',
            $size
        );
    }

    /**
     * Resolve the input variant, falling back to config default if not provided.
     */
    private function resolveVariant(?string $variant): InputVariant
    {
        return ComponentPropResolver::resolveEnum(
            InputVariant::class,
            'basekit.components.input.variants',
            'basekit.components.input.default_variant',
            $variant
        );
    }

    /**
     * Resolve label style to a supported value.
     */
    private function resolveLabelStyle(string|LabelStyle $labelStyle): LabelStyle
    {
        if ($labelStyle instanceof LabelStyle) {
            return $labelStyle;
        }

        $normalized = strtolower($labelStyle);

        return LabelStyle::tryFrom($normalized) ?? LabelStyle::Default;
    }

    /**
     * Resolve control style to a supported enum value.
     */
    private function resolveControlStyle(string|ControlStyle $controlStyle): ControlStyle
    {
        if ($controlStyle instanceof ControlStyle) {
            return $controlStyle;
        }

        return ControlStyle::tryFrom(strtolower($controlStyle)) ?? ControlStyle::Default;
    }
}
