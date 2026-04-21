<?php

declare(strict_types=1);

namespace BasekitLaravel\BasekitLaravelUi\View\Components\Feedback;

use BasekitLaravel\BasekitLaravelUi\View\Components\Support\ComponentPropResolver;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

/**
 * Toast component for Basekit Laravel UI.
 *
 * A notification toast component with auto-dismissal and customizable icons.
 * Requires Alpine.js for interactive functionality. Supports multiple variants
 * with configurable duration and icon display.
 */
class Toast extends Component
{
    /**
     * The toast variant.
     *
     * @var string Resolved from config (e.g., 'success', 'error', 'warning', 'info')
     */
    public string $variant;

    /**
     * Create a new component instance.
     */
    public function __construct(
        /**
         * Auto-dismiss duration in milliseconds.
         *
         * @var int Duration before auto-dismissal (default: 3000)
         */
        public int $duration = 3000,
        /**
         * Whether to show a dismiss button.
         *
         * @var bool Show manual dismiss button (default: true)
         */
        public bool $isDismissible = true,
        ?string $variant = null,
        /**
         * The toast title.
         *
         * @var string|null Optional title text
         */
        public ?string $title = null,
        /**
         * The toast message.
         *
         * @var string|null Main message content
         */
        public ?string $message = null,
        /**
         * Optional Heroicon name.
         *
         * @var string|null Heroicon name (defaults based on variant if not provided)
         */
        public ?string $icon = null
    ) {
        $this->variant = $this->resolveVariant($variant);
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View
    {
        return view('basekit::components.feedback.toast');
    }

    /**
     * Get the toast classes.
     */
    public function classes(): string
    {
        return "bk-toast bk-toast--{$this->variant}";
    }

    /**
     * Get the Heroicon component name based on icon style configuration.
     */
    public function iconComponent(): string
    {
        $defaultIcon = $this->icon ?? $this->getDefaultIcon();

        return ComponentPropResolver::heroiconComponent($defaultIcon) ?? '';
    }

    /**
     * Get the default icon based on variant.
     */
    protected function getDefaultIcon(): string
    {
        return match ($this->variant) {
            'success' => 'check-circle',
            'error', 'danger' => 'x-circle',
            'warning' => 'exclamation-triangle',
            default => 'information-circle',
        };
    }

    /**
     * Resolve and validate toast variant from config.
     */
    private function resolveVariant(?string $variant): string
    {
        return ComponentPropResolver::resolveString(
            'basekit.components.toast.variants',
            'basekit.components.toast.default_variant',
            'info',
            $variant
        );
    }
}
