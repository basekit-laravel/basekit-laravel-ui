<?php

declare(strict_types=1);

namespace BasekitLaravel\BasekitLaravelUi\View\Components\Feedback;

use BasekitLaravel\BasekitLaravelUi\View\Components\Support\ComponentPropResolver;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

/**
 * Skeleton component for Basekit Laravel UI.
 *
 * A skeleton/placeholder component for displaying loading states. Supports
 * multiple variants (text, circle, default) with customizable dimensions for
 * creating realistic content placeholders.
 */
class Skeleton extends Component
{
    /**
     * Number of skeleton lines (for text variant).
     *
     * @var int Number of text line placeholders to render
     */
    public int $lines;

    /**
     * The skeleton size.
     *
     * @var string Resolved from config ('xs', 'sm', 'md', 'lg', 'xl')
     */
    public string $size;

    /**
     * The skeleton border radius preset.
     *
     * @var string Resolved from config ('none', 'sm', 'md', 'lg', 'full')
     */
    public string $rounded;

    /**
     * The skeleton variant.
     *
     * @var string Resolved from config ('default', 'text', 'circle')
     */
    public string $variant;

    /**
     * Create a new component instance.
     */
    public function __construct(
        int $lines = 1,
        ?string $variant = null,
        ?string $size = null,
        ?string $rounded = null,
        /**
         * Optional CSS width value.
         *
         * @var string|null Custom width (e.g., '200px', '50%')
         */
        public ?string $width = null,
        /**
         * Optional CSS height value.
         *
         * @var string|null Custom height (e.g., '100px', '3rem')
         */
        public ?string $height = null
    ) {
        $this->variant = $this->resolveVariant($variant);
        $this->size = $this->resolveSize($size);
        $this->rounded = $this->resolveRounded($rounded);
        $this->lines = max(1, $lines);
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View
    {
        return view('basekit::components.feedback.skeleton');
    }

    /**
     * Get the skeleton classes.
     */
    public function classes(): string
    {
        return "bk-skeleton bk-skeleton--{$this->variant} bk-skeleton--{$this->size} bk-skeleton--rounded-{$this->rounded}";
    }

    /**
     * Check if variant is text (multi-line).
     */
    public function isTextVariant(): bool
    {
        return $this->variant === 'text';
    }

    /**
     * Check if multiple lines should be rendered.
     */
    public function isMultiline(): bool
    {
        return $this->isTextVariant() && $this->lines > 1;
    }

    /**
     * Get inline style for a multiline text skeleton line.
     */
    public function lineStyle(int $index): ?string
    {
        $styles = [];

        if ($this->height !== null && $this->height !== '') {
            $styles[] = "height: {$this->height};";
        }

        if ($this->width !== null && $this->width !== '') {
            $styles[] = "width: {$this->width};";
        } elseif ($index === $this->lines - 1) {
            $styles[] = 'width: 75%;';
        }

        return $this->buildInlineStyle($styles);
    }

    /**
     * Get inline style for a single-line skeleton.
     */
    public function singleStyle(): ?string
    {
        $styles = [];

        if ($this->width !== null && $this->width !== '') {
            $styles[] = "width: {$this->width};";
        }

        if ($this->height !== null && $this->height !== '') {
            $styles[] = "height: {$this->height};";
        }

        return $this->buildInlineStyle($styles);
    }

    /**
     * Build inline style string from individual declarations.
     *
     * @param  array<int, string>  $styles
     */
    private function buildInlineStyle(array $styles): ?string
    {
        if ($styles === []) {
            return null;
        }

        return implode(' ', $styles);
    }

    /**
     * Resolve and validate skeleton size from config.
     */
    private function resolveSize(?string $size): string
    {
        return ComponentPropResolver::resolveString(
            'basekit.components.skeleton.sizes',
            'basekit.components.skeleton.default_size',
            'md',
            $size
        );
    }

    /**
     * Resolve and validate skeleton variant from config.
     */
    private function resolveVariant(?string $variant): string
    {
        return ComponentPropResolver::resolveString(
            'basekit.components.skeleton.variants',
            'basekit.components.skeleton.default_variant',
            'default',
            $variant
        );
    }

    /**
     * Resolve and validate skeleton rounded value from config.
     */
    private function resolveRounded(?string $rounded): string
    {
        return ComponentPropResolver::resolveString(
            'basekit.components.skeleton.rounded',
            'basekit.components.skeleton.default_rounded',
            'md',
            $rounded
        );
    }
}
