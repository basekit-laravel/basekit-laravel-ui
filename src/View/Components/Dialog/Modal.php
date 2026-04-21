<?php

declare(strict_types=1);

namespace BasekitLaravel\BasekitLaravelUi\View\Components\Dialog;

use BasekitLaravel\BasekitLaravelUi\View\Components\Support\ComponentPropResolver;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

/**
 * Modal component for Basekit Laravel UI.
 *
 * Displays layered dialog content with configurable size and close behavior.
 */
class Modal extends Component
{
    /**
     * Modal size variant.
     */
    public string $size;

    /**
     * Create a new component instance.
     */
    public function __construct(
        /**
         * Whether clicking backdrop closes the modal.
         */
        public bool $isCloseOnBackdrop = true,
        /**
         * Whether close button is shown.
         */
        public bool $isCloseButton = true,
        /**
         * Initial open state.
         */
        public bool $isOpen = false,
        ?string $size = null,
        /**
         * Modal title.
         */
        public ?string $title = null,
        /**
         * External Alpine.js variable to bind to (e.g., 'isModalOpen').
         */
        public ?string $show = null
    ) {
        $this->size = $this->resolveSize($size);
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View
    {
        return view('basekit::components.dialog.modal');
    }

    /**
     * Get the modal classes.
     */
    public function classes(): string
    {
        return "bk-modal__dialog bk-modal__dialog--{$this->size}";
    }

    /**
     * Get close expression for Alpine click handlers.
     */
    public function closeExpression(): string
    {
        return "{$this->stateVariable()} = false";
    }

    /**
     * Determine whether modal visibility is controlled externally.
     */
    public function isExternallyControlled(): bool
    {
        return $this->show !== null && $this->show !== '';
    }

    /**
     * Get the Alpine state variable expression.
     */
    public function stateVariable(): string
    {
        return $this->isExternallyControlled() ? (string) $this->show : 'open';
    }

    /**
     * Resolve modal size from config.
     */
    private function resolveSize(?string $size): string
    {
        return ComponentPropResolver::resolveString(
            'basekit.components.modal.sizes',
            'basekit.components.modal.default_size',
            'md',
            $size
        );
    }
}
