<?php

declare(strict_types=1);

namespace BasekitLaravel\BasekitLaravelUi\View\Components\Form;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

/**
 * Fieldset component for Basekit Laravel UI.
 *
 * A semantic group wrapper for related form controls (typically radio or
 * checkbox groups). Renders a native `<fieldset>` with an optional legend and
 * owns a single reserved message line below the group, so items can be packed
 * tightly without layout shift when a group-level validation message appears.
 */
class Fieldset extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        /**
         * The group legend text.
         */
        public ?string $label = null,
        /**
         * The group-level error message.
         */
        public ?string $error = null,
        /**
         * The group-level hint text.
         */
        public ?string $hint = null,
        /**
         * Whether to keep the reserved message slot below the group.
         *
         * When true, the message slot always reserves one line of vertical
         * space so group-level validation messages never shift the layout.
         * Set to false for groups that provably never show an error or hint —
         * the slot is then omitted entirely (unless a message is present).
         */
        public bool $reservesMessages = true,
        /**
         * Additional classes for the outer wrapper.
         */
        public ?string $wrapperClass = null,
        /**
         * Additional classes for the items container.
         */
        public ?string $itemsClass = null,
    ) {}

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View
    {
        return view('basekit::components.form.fieldset');
    }

    /**
     * Check if the component has an error.
     */
    public function hasError(): bool
    {
        return $this->error !== null && $this->error !== '';
    }
}
