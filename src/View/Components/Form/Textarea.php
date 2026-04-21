<?php

declare(strict_types=1);

namespace BasekitLaravel\BasekitLaravelUi\View\Components\Form;

use BasekitLaravel\BasekitLaravelUi\Enums\LabelStyle;
use BasekitLaravel\BasekitLaravelUi\Enums\Size;
use BasekitLaravel\BasekitLaravelUi\Enums\Variant;
use BasekitLaravel\BasekitLaravelUi\View\Components\Support\ComponentPropResolver;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

/**
 * Textarea component for Basekit Laravel UI.
 *
 * A multi-line text input component with support for labels, validation states,
 * and variants. Can display labels inline/overlapping or above the textarea.
 */
class Textarea extends Component
{
    /**
     * The textarea variant.
     */
    public Variant $variant;

    /**
     * The textarea size.
     */
    public Size $size;

    /**
     * The textarea label style.
     */
    public LabelStyle $labelStyle;

    /**
     * Create a new component instance.
     *
     * @param  string|null  $variant  The textarea variant
     * @param  string|null  $size  The textarea size
     * @param  string|null  $label  The label text
     * @param  string|null  $error  The error message
     * @param  string|null  $hint  The hint text
     * @param  string|null  $placeholder  The placeholder text
     * @param  string|null  $value  The textarea value
     * @param  int  $rows  Number of rows
     * @param  string|LabelStyle  $labelStyle  The label style (default, inset, overlap)
     * @param  bool  $isUnderline  Whether to use underline style
     * @param  string|null  $cornerHint  Optional corner hint text
     */
    public function __construct(
        ?string $variant = null,
        ?string $size = null,
        public ?string $label = null,
        public ?string $error = null,
        public ?string $hint = null,
        public ?string $placeholder = null,
        public ?string $value = null,
        public int $rows = 4,
        string|LabelStyle $labelStyle = 'default',
        public bool $isUnderline = false,
        public ?string $cornerHint = null
    ) {
        $this->labelStyle = $this->resolveLabelStyle($labelStyle);
        $this->variant = $this->resolveVariant($variant);
        $this->size = $this->resolveSize($size);
    }

    /**
     * Get the textarea classes.
     */
    public function classes(): string
    {
        $classes = ['bk-textarea__control', "bk-textarea__control--{$this->size->value}"];

        $classes[] = $this->hasError()
            ? 'bk-textarea__control--error'
            : "bk-textarea__control--{$this->variant->value}";

        if ($this->isInsetLabel()) {
            $classes[] = 'bk-textarea__control--label-inset';
        }

        if ($this->isOverlapLabel()) {
            $classes[] = 'bk-textarea__control--label-overlap';
        }

        if ($this->isUnderline) {
            $classes[] = 'bk-textarea__control--underline';
        }

        return implode(' ', $classes);
    }

    /**
     * Get the textarea container classes.
     */
    public function containerClasses(): string
    {
        $classes = ['bk-textarea__container', "bk-textarea__container--{$this->size->value}"];
        $classes[] = $this->hasError()
            ? 'bk-textarea__container--error'
            : "bk-textarea__container--{$this->variant->value}";

        if ($this->isInsetLabel()) {
            $classes[] = 'bk-textarea__container--label-inset';
        }

        if ($this->isOverlapLabel()) {
            $classes[] = 'bk-textarea__container--label-overlap';
        }

        if ($this->isUnderline) {
            $classes[] = 'bk-textarea__container--underline';
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
     * Get the view / contents that represent the component.
     */
    public function render(): View
    {
        return view('basekit::components.form.textarea');
    }

    /**
     * Check if component has an error.
     */
    public function hasError(): bool
    {
        return $this->error !== null;
    }

    /**
     * Determine if the inline error icon should render.
     */
    public function shouldShowErrorIcon(): bool
    {
        return $this->hasError();
    }

    /**
     * Resolve textarea variant from config.
     */
    private function resolveVariant(?string $variant): Variant
    {
        return ComponentPropResolver::resolveEnum(
            Variant::class,
            'basekit.components.textarea.variants',
            'basekit.components.textarea.default_variant',
            $variant
        );
    }

    /**
     * Resolve textarea size from config.
     */
    private function resolveSize(?string $size): Size
    {
        return ComponentPropResolver::resolveEnum(
            Size::class,
            'basekit.components.textarea.sizes',
            'basekit.components.textarea.default_size',
            $size
        );
    }

    /**
     * Resolve label style to a supported enum value.
     */
    private function resolveLabelStyle(string|LabelStyle $labelStyle): LabelStyle
    {
        if ($labelStyle instanceof LabelStyle) {
            return $labelStyle;
        }

        return LabelStyle::tryFrom(strtolower($labelStyle)) ?? LabelStyle::Default;
    }
}
