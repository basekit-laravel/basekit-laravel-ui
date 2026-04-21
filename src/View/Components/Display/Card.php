<?php

declare(strict_types=1);

namespace BasekitLaravel\BasekitLaravelUi\View\Components\Display;

use BasekitLaravel\BasekitLaravelUi\View\Components\Support\ComponentPropResolver;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

/**
 * Card component for Basekit Laravel UI.
 *
 * A flexible container component for grouping related content. Supports
 * variants and optional body padding with header/body/footer sections.
 */
class Card extends Component
{
    /**
     * Class names for the card body.
     */
    public string $bodyClassNames;

    /**
     * Root class names for the card wrapper.
     */
    public string $rootClassNames;

    /**
     * The card variant.
     *
     * @var string Resolved from config ('default', 'bordered')
     */
    public string $variant;

    /**
     * Create a new component instance.
     */
    public function __construct(
        /**
         * Whether body padding should be applied.
         *
         * @var bool Apply padding to card body (default: true)
         */
        public bool $isPadded = true,
        ?string $variant = null
    ) {
        $this->variant = $this->resolveVariant($variant);
        $this->rootClassNames = $this->buildRootClassNames();
        $this->bodyClassNames = $this->buildBodyClassNames();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View
    {
        return view('basekit::components.display.card');
    }

    /**
     * Get the card classes.
     */
    public function classes(): string
    {
        return $this->rootClassNames;
    }

    /**
     * Get the body classes.
     */
    public function bodyClasses(): string
    {
        return $this->bodyClassNames;
    }

    /**
     * Build root wrapper class names.
     */
    private function buildRootClassNames(): string
    {
        return "bk-card bk-card--{$this->variant}";
    }

    /**
     * Build body class names.
     */
    private function buildBodyClassNames(): string
    {
        $classes = ['bk-card__body'];
        if ($this->isPadded) {
            $classes[] = 'bk-card__body--padded';
        }

        return implode(' ', $classes);
    }

    /**
     * Resolve and validate card variant from config.
     */
    private function resolveVariant(?string $variant): string
    {
        return ComponentPropResolver::resolveString(
            'basekit.components.card.variants',
            'basekit.components.card.default_variant',
            'default',
            $variant
        );
    }
}
