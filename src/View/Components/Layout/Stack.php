<?php

declare(strict_types=1);

namespace BasekitLaravel\BasekitLaravelUi\View\Components\Layout;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

/**
 * Stack component for Basekit Laravel UI.
 *
 * A flexible layout component for stacking child elements in a row or column
 * with customizable spacing, alignment, and justification.
 */
class Stack extends Component
{
    /**
     * Stack direction.
     *
     * @var string Flow direction ('vertical', 'horizontal')
     */
    public string $direction;

    /**
     * Stack spacing value.
     *
     * @var string Resolved from config ('xs', 'sm', 'md', 'lg', 'xl')
     */
    public string $spacing;

    /**
     * Stack alignment value.
     *
     * @var string Cross-axis alignment ('start', 'center', 'end', 'stretch')
     */
    public string $align;

    /**
     * Stack justification value.
     *
     * @var string Main-axis distribution ('start', 'center', 'end', 'between', 'around')
     */
    public string $justify;

    /**
     * Create a new component instance.
     */
    public function __construct(
        string $direction = 'vertical',
        ?string $spacing = null,
        string $align = 'stretch',
        string $justify = 'start',
    ) {
        $this->direction = $this->resolveDirection($direction);
        $this->spacing = $this->resolveSpacing($spacing);
        $this->align = $this->resolveAlign($align);
        $this->justify = $this->resolveJustify($justify);
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View
    {
        return view('basekit::components.layout.stack');
    }

    /**
     * Get stack classes.
     */
    public function classes(): string
    {
        return implode(' ', [
            'bk-stack',
            "bk-stack--{$this->direction}",
            "bk-stack--spacing-{$this->spacing}",
            "bk-stack--align-{$this->align}",
            "bk-stack--justify-{$this->justify}",
        ]);
    }

    /**
     * Resolve align value.
     */
    private function resolveAlign(string $align): string
    {
        $allowed = ['start', 'center', 'end', 'stretch'];
        if (in_array($align, $allowed, true)) {
            return $align;
        }

        return 'stretch';
    }

    /**
     * Resolve direction value.
     */
    private function resolveDirection(string $direction): string
    {
        $allowed = ['vertical', 'horizontal'];
        if (in_array($direction, $allowed, true)) {
            return $direction;
        }

        return 'vertical';
    }

    /**
     * Resolve justify value.
     */
    private function resolveJustify(string $justify): string
    {
        $allowed = ['start', 'center', 'end', 'between', 'around'];
        if (in_array($justify, $allowed, true)) {
            return $justify;
        }

        return 'start';
    }

    /**
     * Resolve spacing value.
     */
    private function resolveSpacing(?string $spacing): string
    {
        $allowed = config('basekit-laravel-ui.components.stack.spacing', ['xs', 'sm', 'md', 'lg', 'xl']);
        if ($spacing !== null && $spacing !== '' && in_array($spacing, $allowed, true)) {
            return $spacing;
        }

        return config('basekit-laravel-ui.components.stack.default_spacing', 'md');
    }
}
