<?php

declare(strict_types=1);

namespace BasekitLaravel\BasekitLaravelUi\View\Components;

use Illuminate\View\Component;
use Illuminate\Contracts\View\View;

class StyleguideWrapper extends Component
{
    /**
     * Create a new component instance.
     *
     * @param  array<string, mixed>  $sections
     * @return void
     */
    public function __construct(public array $sections = []) {}

    /**
     * Get the view / contents that represent the component.
     *
     * @return View|string
     */
    public function render()
    {
        return view('basekit::styleguide.index');
    }
}
