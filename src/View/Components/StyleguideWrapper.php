<?php

declare(strict_types=1);

namespace BasekitLaravel\BasekitLaravelUi\View\Components;

use Illuminate\View\Component;

class StyleguideWrapper extends Component
{
    /**
     * Create a new component instance.
     *
     * @param  array<string, mixed>  $sections
     */
    public function __construct(public array $sections = []) {}

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): string
    {
        return view('basekit::components.styleguide-wrapper')->render();
    }
}
