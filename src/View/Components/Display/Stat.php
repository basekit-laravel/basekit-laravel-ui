<?php

declare(strict_types=1);

namespace BasekitLaravel\BasekitLaravelUi\View\Components\Display;

use BasekitLaravel\BasekitLaravelUi\View\Components\Support\ComponentPropResolver;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

/**
 * Stat component for Basekit Laravel UI.
 *
 * A statistic display component showing a label, value, optional change indicator,
 * and trend icon. Supports up/down/neutral trend indicators.
 */
class Stat extends Component
{
    /**
     * Trend direction.
     *
     * @var string Direction indicator ('up', 'down', 'neutral')
     */
    public string $trend;

    /**
     * Create a new component instance.
     */
    public function __construct(
        string $trend = 'neutral',
        /**
         * The stat label.
         *
         * @var mixed Label text or renderable content
         */
        public mixed $label = null,
        /**
         * The stat value.
         *
         * @var mixed Numeric or text value to display
         */
        public mixed $value = null,
        /**
         * Optional stat change indicator.
         *
         * @var mixed Change amount or percentage text (e.g., '+12.5%')
         */
        public mixed $change = null,
        /**
         * Optional Heroicon name.
         *
         * @var string|null Heroicon name for additional icon
         */
        public ?string $icon = null,
    ) {
        $this->trend = $this->resolveTrend($trend);
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View
    {
        return view('basekit::components.display.stat');
    }

    /**
     * Get classes for stat change indicator.
     */
    public function changeClasses(): string
    {
        return "bk-stat__change bk-stat__change--{$this->trend}";
    }

    /**
     * Check if icon prop is set.
     */
    public function hasIcon(): bool
    {
        return $this->icon !== null && $this->icon !== '';
    }

    /**
     * Resolve icon component string based on icon style configuration.
     */
    public function iconComponent(): ?string
    {
        if (! $this->hasIcon()) {
            return null;
        }

        return ComponentPropResolver::heroiconComponent($this->icon);
    }

    /**
     * Resolve trend icon component name.
     */
    public function trendIconComponent(): ?string
    {
        return match ($this->trend) {
            'up' => ComponentPropResolver::heroiconComponent('arrow-trending-up'),
            'down' => ComponentPropResolver::heroiconComponent('arrow-trending-down'),
            default => null,
        };
    }

    /**
     * Resolve trend value.
     */
    private function resolveTrend(string $trend): string
    {
        $allowed = ['up', 'down', 'neutral'];
        if (in_array($trend, $allowed, true)) {
            return $trend;
        }

        return 'neutral';
    }
}
