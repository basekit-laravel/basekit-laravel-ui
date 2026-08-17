<?php

declare(strict_types=1);

namespace BasekitLaravel\BasekitLaravelUi\Tests\Browser;

use Laravel\Dusk\Browser;
use PHPUnit\Framework\Assert as PHPUnit;

class BasekitBrowser extends Browser
{
    /**
     * Wait for the element matching the given selector to be visible.
     */
    public function waitUntilVisible(string $selector, ?int $seconds = null): static
    {
        return $this->waitUntil(
            sprintf('(() => { const el = document.querySelector(%s); return el && getComputedStyle(el).display !== "none"; })()', json_encode($selector)),
            $seconds
        );
    }

    /**
     * Assert that the element matching the given selector has the given class.
     */
    public function assertHasClass(string $selector, string $className): static
    {
        $classes = $this->attribute($selector, 'class');

        if (! is_string($classes)) {
            PHPUnit::fail("Element [{$selector}] does not have the class [{$className}].");
        }

        PHPUnit::assertTrue(
            in_array($className, explode(' ', $classes), true),
            "Expected element [{$selector}] to have class [{$className}], got [{$classes}]."
        );

        return $this;
    }

    /**
     * Assert that the element matching the given selector does not have the given class.
     */
    public function assertNotHasClass(string $selector, string $className): static
    {
        $classes = $this->attribute($selector, 'class');

        if (is_string($classes)) {
            PHPUnit::assertFalse(
                in_array($className, explode(' ', $classes), true),
                "Expected element [{$selector}] to not have class [{$className}], got [{$classes}]."
            );
        }

        return $this;
    }
}
