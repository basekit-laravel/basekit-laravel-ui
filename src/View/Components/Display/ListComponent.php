<?php

declare(strict_types=1);

namespace BasekitLaravel\BasekitLaravelUi\View\Components\Display;

use BasekitLaravel\BasekitLaravelUi\View\Components\Support\ComponentPropResolver;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

/**
 * List component for Basekit Laravel UI.
 *
 * A flexible list component supporting ordered/unordered lists with
 * multiple style variants and marker style options.
 */
class ListComponent extends Component
{
    /**
     * List marker style.
     *
     * @var string Marker type ('disc', 'circle', 'square', 'decimal', 'none')
     */
    public string $marker;

    /**
     * List style variant.
     *
     * @var string Resolved from config ('default', 'divided', 'bordered')
     */
    public string $variant;

    /**
     * Create a new component instance.
     *
     * @param  array<int, scalar>  $items
     */
    public function __construct(
        /**
         * Whether ordered list should be rendered.
         *
         * @var bool Use ordered (numberedlist) instead of unordered (default: false)
         */
        public bool $ordered = false,
        ?string $marker = null,
        ?string $variant = null,
        /**
         * List items for automatic <li> rendering.
         */
        public array $items = [],
    ) {
        $this->variant = $this->resolveVariant($variant);
        $this->marker = $this->resolveMarker($marker);
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View
    {
        return view('basekit::components.display.list');
    }

    /**
     * Get list classes.
     */
    public function classes(): string
    {
        return implode(' ', [
            'bk-list',
            $this->ordered ? 'bk-list--ordered' : 'bk-list--unordered',
            "bk-list--{$this->variant}",
            "bk-list--marker-{$this->marker}",
        ]);
    }

    /**
     * Resolve and validate marker type.
     */
    private function resolveMarker(?string $marker): string
    {
        $allowed = ['disc', 'circle', 'square', 'decimal', 'none'];
        if ($marker !== null && $marker !== '' && in_array($marker, $allowed, true)) {
            return $marker;
        }

        return $this->ordered ? 'decimal' : 'disc';
    }

    /**
     * Resolve and validate list variant from config.
     */
    private function resolveVariant(?string $variant): string
    {
        return ComponentPropResolver::resolveString(
            'basekit.components.list.variants',
            'basekit.components.list.default_variant',
            'default',
            $variant
        );
    }
}
