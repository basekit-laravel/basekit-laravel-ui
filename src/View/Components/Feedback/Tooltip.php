<?php

declare(strict_types=1);

namespace BasekitLaravel\BasekitLaravelUi\View\Components\Feedback;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

/**
 * Tooltip component for Basekit Laravel UI.
 *
 * A tooltip component that displays on hover or focus. Requires Alpine.js
 * for interactive visibility toggle. Supports configurable positioning relative
 * to the trigger element.
 */
class Tooltip extends Component
{
    /**
     * The tooltip position relative to the trigger.
     *
     * @var string Position ('top', 'bottom', 'left', 'right')
     */
    public string $position;

    /**
     * Delay in milliseconds before showing tooltip.
     */
    public int $showDelay;

    /**
     * Delay in milliseconds before hiding tooltip.
     */
    public int $hideDelay;

    /**
     * Alpine x-data expression used by the tooltip wrapper.
     */
    public string $xDataExpression;

    /**
     * Alpine mouseenter/focusin handler expression.
     */
    public string $showHandlerExpression;

    /**
     * Alpine mouseleave/focusout handler expression.
     */
    public string $hideHandlerExpression;

    /**
     * Create a new component instance.
     */
    public function __construct(
        /**
         * The tooltip content text.
         *
         * @var string Tooltip text content
         */
        public string $content = '',
        ?string $position = null,
        int $showDelay = 0,
        int $hideDelay = 0
    ) {
        $this->position = $position ?? config('basekit-laravel-ui.components.tooltip.default_position', 'top');
        $this->showDelay = max(0, $showDelay);
        $this->hideDelay = max(0, $hideDelay);

        $this->xDataExpression = '{ show: false, showTimeout: null, hideTimeout: null }';
        $this->showHandlerExpression =
            'clearTimeout(hideTimeout); clearTimeout(showTimeout); '
            .($this->showDelay > 0
                ? "showTimeout = setTimeout(() => show = true, {$this->showDelay})"
                : 'show = true');

        $this->hideHandlerExpression =
            'clearTimeout(showTimeout); clearTimeout(hideTimeout); '
            .($this->hideDelay > 0
                ? "hideTimeout = setTimeout(() => show = false, {$this->hideDelay})"
                : 'show = false');
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View
    {
        return view('basekit::components.feedback.tooltip');
    }

    /**
     * Get the tooltip classes.
     */
    public function classes(): string
    {
        return "bk-tooltip__content bk-tooltip__content--{$this->position}";
    }
}
