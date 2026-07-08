<?php

declare(strict_types=1);

namespace BasekitLaravel\BasekitLaravelUi\View\Components\Feedback;

use BasekitLaravel\BasekitLaravelUi\Enums\Variant;
use BasekitLaravel\BasekitLaravelUi\View\Components\Support\ComponentColorResolver;
use BasekitLaravel\BasekitLaravelUi\View\Components\Support\ComponentPropResolver;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

/**
 * Alert component for Basekit Laravel UI.
 *
 * Displays contextual feedback messages with variant styling and optional dismissal.
 */
class Alert extends Component
{
    /**
     * Alert variant.
     */
    public Variant $variant;

    /**
     * Create a new component instance.
     */
    public function __construct(
        /**
         * Whether alert can be dismissed.
         */
        public bool $isDismissible = false,
        ?string $variant = null,
        /**
         * Alert title.
         */
        public ?string $title = null,
        /**
         * Optional icon name.
         */
        public ?string $icon = null,
        /**
         * Quick color shortcut. Sets background + text + border.
         */
        public ?string $color = null,
        /**
         * Custom background color.
         */
        public ?string $background = null,
        /**
         * Custom text color.
         */
        public ?string $text = null,
        /**
         * Custom border color.
         */
        public ?string $border = null,
    ) {
        $this->variant = $this->resolveVariant($variant);
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View
    {
        return view('basekit::components.feedback.alert');
    }

    /**
     * Get the alert classes.
     */
    public function classes(): string
    {
        return "bk-alert bk-alert--{$this->variant->value}";
    }

    /**
     * Get Heroicon component name for custom or default icon.
     */
    public function iconComponent(): string
    {
        if ($this->icon !== null && $this->icon !== '') {
            return ComponentPropResolver::heroiconComponent($this->icon) ?? '';
        }

        return $this->defaultIconComponent();
    }

    /**
     * Get default icon for variant.
     */
    public function defaultIconComponent(): string
    {
        $icon = match ($this->variant) {
            Variant::Success => 'check-circle',
            Variant::Warning => 'exclamation-triangle',
            Variant::Danger => 'x-circle',
            default => 'information-circle',
        };

        return ComponentPropResolver::heroiconComponent($icon) ?? '';
    }

    /**
     * Get the inline color style string based on color props.
     */
    public function colorStyle(): ?string
    {
        return ComponentColorResolver::resolve(
            'alert',
            $this->variant->value,
            $this->color,
            $this->background,
            $this->text,
            $this->border,
        );
    }

    /**
     * Resolve variant from config.
     */
    private function resolveVariant(?string $variant): Variant
    {
        return ComponentPropResolver::resolveEnum(
            Variant::class,
            'basekit.components.alert.variants',
            'basekit.components.alert.default_variant',
            $variant
        );
    }
}
