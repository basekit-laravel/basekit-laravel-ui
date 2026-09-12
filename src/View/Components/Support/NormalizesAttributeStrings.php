<?php

declare(strict_types=1);

namespace BasekitLaravel\BasekitLaravelUi\View\Components\Support;

/**
 * Undo Blade's attribute-level escaping for display-only string props.
 *
 * Blade escapes non-bound component attributes (e.g. `hint="{{ __('x') }}"`)
 * on the way in with `htmlspecialchars(ENT_QUOTES)`. Component views then
 * escape the value again with `{{ $hint }}`, so an apostrophe becomes
 * `&amp;#039;` instead of `&#039;`. Decoding the attribute-level escape
 * lets the view's `{{ }}` apply exactly one, consistent escape — for both
 * bound (`:hint="..."`) and non-bound callers.
 *
 * @see https://laravel.com/docs/blade#components
 */
trait NormalizesAttributeStrings
{
    /**
     * Return the decoded display string. The value is still escaped exactly
     * once when output through `{{ }}` in the component view.
     */
    protected function normalizeAttributeString(?string $value): ?string
    {
        if ($value === null) {
            return null;
        }

        return html_entity_decode($value, ENT_QUOTES, 'UTF-8');
    }
}
