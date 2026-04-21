<?php

declare(strict_types=1);

namespace BasekitLaravel\BasekitLaravelUi\View\Components\Feedback;

use BasekitLaravel\BasekitLaravelUi\View\Components\Support\ComponentPropResolver;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

/**
 * Progress component for Basekit Laravel UI.
 *
 * A progress bar component showing task completion. Supports custom min/max values,
 * labels, and percentage display with configurable variants and sizes.
 */
class Progress extends Component
{
    /**
     * The maximum progress value.
     *
     * @var float Maximum value for progress calculation
     */
    public float $max;

    /**
     * The progress size.
     *
     * @var string Resolved from config ('sm', 'md', 'lg')
     */
    public string $size;

    /**
     * The current progress value.
     *
     * @var float Current progress value (clamped between 0 and max)
     */
    public float $value;

    /**
     * The progress variant.
     *
     * @var string Resolved from config ('primary', 'secondary', 'success', 'danger', 'warning', 'info', 'ghost', 'white')
     */
    public string $variant;

    /**
     * Whether a dynamic Alpine value expression is provided.
     */
    public bool $hasDynamicValue;

    /**
     * Alpine expression for aria-valuenow when dynamic value is enabled.
     */
    public ?string $dynamicNowExpression;

    /**
     * Alpine expression for inline width style when dynamic value is enabled.
     */
    public ?string $dynamicWidthExpression;

    /**
     * Alpine expression for percentage text when dynamic value is enabled.
     */
    public ?string $dynamicPercentageExpression;

    /**
     * Create a new component instance.
     */
    public function __construct(
        float $value = 0,
        float $max = 100,
        /**
         * Whether to display the percentage.
         *
         * @var bool Show percentage next to label (default: false)
         */
        public bool $isShowPercentage = false,
        /**
         * Alpine.js expression used as the dynamic value source.
         *
         * @var string|null Example: "progress" or "uploadProgress"
         */
        public ?string $dynamicValue = null,
        /**
         * Whether to render an indeterminate progress animation.
         *
         * @var bool Show animated indeterminate state
         */
        public bool $indeterminate = false,
        ?string $variant = null,
        ?string $size = null,
        /**
         * The optional label text.
         *
         * @var string|null Optional label displayed above progress bar
         */
        public ?string $label = null,
    ) {
        $this->variant = $this->resolveVariant($variant);
        $this->size = $this->resolveSize($size);
        $this->max = $max > 0 ? $max : 100;
        $this->value = max(0, min($value, $this->max));

        $this->hasDynamicValue = filled($this->dynamicValue);
        $this->dynamicNowExpression = null;
        $this->dynamicWidthExpression = null;
        $this->dynamicPercentageExpression = null;

        if ($this->hasDynamicValue) {
            $clampedValueExpression = "Math.max(0, Math.min({$this->dynamicValue}, {$this->max}))";
            $this->dynamicNowExpression = $clampedValueExpression;
            $this->dynamicWidthExpression = '`width: ${'.$clampedValueExpression.' / '.$this->max.' * 100}%`';
            $this->dynamicPercentageExpression = '`${Math.round(('.$clampedValueExpression.' / '.$this->max.') * 100)}%`';
        }
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View
    {
        return view('basekit::components.feedback.progress');
    }

    /**
     * Get the progress classes.
     */
    public function classes(): string
    {
        return "bk-progress__track bk-progress__track--{$this->variant} bk-progress__track--{$this->size}";
    }

    /**
     * Get the percentage value.
     */
    public function percentage(): float
    {
        if ($this->max <= 0) {
            return 0;
        }

        return ($this->value / $this->max) * 100;
    }

    /**
     * Resolve and validate progress size from config.
     */
    private function resolveSize(?string $size): string
    {
        return ComponentPropResolver::resolveString(
            'basekit.components.progress.sizes',
            'basekit.components.progress.default_size',
            'md',
            $size
        );
    }

    /**
     * Resolve and validate progress variant from config.
     */
    private function resolveVariant(?string $variant): string
    {
        return ComponentPropResolver::resolveString(
            'basekit.components.progress.variants',
            'basekit.components.progress.default_variant',
            'primary',
            $variant
        );
    }
}
