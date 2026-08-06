<?php

declare(strict_types=1);

namespace BasekitLaravel\BasekitLaravelUi\View\Components\Meta;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

/**
 * SEO and social sharing head tags for a page.
 *
 * Renders the document title, meta description, canonical URL, robots
 * instructions and Open Graph / Twitter card tags. The component is safe to
 * omit optional properties — tags are only emitted when their value is set.
 *
 * Example:
 *     <x-basekit-ui::seo title="Pricing" site-name="Acme" description="…"
 *         canonical="https://acme.test/pricing" :noindex="true" />
 */
class Seo extends Component
{
    /**
     * The final document title (page title suffixed with the site name).
     */
    public string $pageTitle;

    /**
     * Create a new component instance.
     */
    public function __construct(
        public string $title = '',
        public string $siteName = '',
        public ?string $description = null,
        public ?string $canonical = null,
        public string $ogType = 'website',
        public ?string $ogImage = null,
        public bool $noindex = false,
    ) {
        $this->pageTitle = trim($title) !== '' ? trim($title).' · '.$siteName : $siteName;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View
    {
        return view('basekit::components.meta.seo');
    }
}
