<?php

declare(strict_types=1);

namespace BasekitLaravel\BasekitLaravelUi\View\Components\Theme;

use BasekitLaravel\BasekitLaravelUi\Support\ThemeColor;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

/**
 * Emits the runtime CSS custom properties for the branded theme slots.
 *
 * The component overrides the compiled theme defaults by rendering a
 * `:root` (or custom selector) block of `--color-{slot}-{shade}` variables so a
 * single branding setting drives every component that consumes the theme
 * palette (buttons, badges, block sections, …).
 *
 * Example:
 *     <x-basekit-ui::theme-variables :colors="['primary' => 'indigo', 'success' => 'green']" />
 */
class ColorVariables extends Component
{
    /**
     * The resolved CSS variable map (`--color-{slot}-{shade}` => value).
     *
     * @var array<string, string>
     */
    public array $variables;

    /**
     * Create a new component instance.
     *
     * @param  array<string, string|array<int, string>>  $colors
     *                                                            Semantic slot => palette name (e.g. `'primary'
     *                                                            => 'indigo'`) or an explicit shade => value map.
     * @param  string  $selector  CSS selector that scopes the variables.
     */
    public function __construct(
        public array $colors = [],
        public string $selector = ':root',
    ) {
        $this->variables = self::variablesFor($colors);
    }

    /**
     * Build the CSS variable map for a set of semantic color slots.
     *
     * @param  array<string, string|array<int, string>>  $colors
     * @return array<string, string>
     */
    public static function variablesFor(array $colors): array
    {
        $variables = [];

        foreach ($colors as $slot => $color) {
            $palette = is_array($color) ? $color : ThemeColor::palette($color);

            foreach ($palette as $shade => $value) {
                $variables["--color-{$slot}-{$shade}"] = $value;
            }
        }

        return $variables;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View
    {
        return view('basekit::components.theme.color-variables');
    }
}
