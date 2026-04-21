<?php

declare(strict_types=1);

namespace BasekitLaravel\BasekitLaravelUi\View\Components\Display;

use BasekitLaravel\BasekitLaravelUi\View\Components\Support\ComponentPropResolver;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

/**
 * Avatar component for Basekit Laravel UI.
 *
 * A flexible avatar component supporting image, initials, or icon fallbacks.
 * Automatically switches to fallback if image fails to load.
 */
class Avatar extends Component
{
    /**
     * The avatar size.
     *
     * @var string Resolved from config ('sm', 'md', 'lg', 'xl')
     */
    public string $size;

    /**
     * The avatar shape.
     *
     * @var string Resolved from config ('round', 'soft', 'square')
     */
    public string $shape;

    /**
     * The avatar status indicator.
     *
     * @var string|null Resolved from config ('online', 'away', 'busy', 'offline')
     */
    public ?string $status;

    /**
     * Create a new component instance.
     */
    public function __construct(
        /**
         * The avatar image alt text.
         *
         * @var string Alt text for accessibility (default: '')
         */
        public string $alt = '',
        ?string $size = null,
        /**
         * The avatar image source URL.
         *
         * @var string|null Image URL (optional)
         */
        public ?string $src = null,
        /**
         * Optional initials fallback text.
         *
         * @var string|null Initials to display if image fails (e.g., 'JD')
         */
        public ?string $initials = null,
        /**
         * Avatar shape modifier.
         *
         * @var string|null Shape style ('round', 'soft', 'square')
         */
        ?string $shape = null,
        /**
         * Optional alias for shape.
         *
         * @var string|null Alias for shape (same accepted values)
         */
        ?string $variant = null,
        /**
         * Optional status indicator.
         *
         * @var string|null Status tone ('online', 'away', 'busy', 'offline')
         */
        ?string $status = null,
    ) {
        $this->size = $this->resolveSize($size);
        $this->shape = $this->resolveShape($shape ?? $variant);
        $this->status = $this->resolveStatus($status);
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View
    {
        return view('basekit::components.display.avatar');
    }

    /**
     * Get the avatar classes.
     */
    public function classes(): string
    {
        return "bk-avatar bk-avatar--{$this->size} bk-avatar--{$this->shape}";
    }

    /**
     * Check if image source is provided.
     */
    public function hasImage(): bool
    {
        return $this->src !== null && $this->src !== '';
    }

    /**
     * Check if initials fallback is provided.
     */
    public function hasInitials(): bool
    {
        return $this->initials !== null && $this->initials !== '';
    }

    /**
     * Check if status indicator should be rendered.
     */
    public function hasStatus(): bool
    {
        return $this->status !== null && $this->status !== '';
    }

    /**
     * Get status indicator classes.
     */
    public function statusClasses(): string
    {
        if ($this->status === null) {
            return 'bk-avatar__status';
        }

        return "bk-avatar__status bk-avatar__status--{$this->status}";
    }

    /**
     * Resolve and validate avatar size from config.
     */
    private function resolveSize(?string $size): string
    {
        return ComponentPropResolver::resolveString(
            'basekit.components.avatar.sizes',
            'basekit.components.avatar.default_size',
            'md',
            $size
        );
    }

    /**
     * Resolve and validate avatar shape from config.
     */
    private function resolveShape(?string $shape): string
    {
        return ComponentPropResolver::resolveString(
            'basekit.components.avatar.shapes',
            'basekit.components.avatar.default_shape',
            'round',
            $shape
        );
    }

    /**
     * Resolve and validate avatar status from config.
     */
    private function resolveStatus(?string $status): ?string
    {
        if ($status === null || $status === '') {
            return null;
        }

        $allowed = config('basekit.components.avatar.statuses', ['online', 'away', 'busy', 'offline']);

        if (! is_array($allowed) || ! in_array($status, $allowed, true)) {
            return null;
        }

        return $status;
    }
}
