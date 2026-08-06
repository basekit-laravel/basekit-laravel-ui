# SEO

Renders the document title and SEO / social sharing head tags for a page.

The component emits the `<title>`, meta description, canonical URL, `noindex`
robots directive and Open Graph / Twitter card tags. Optional properties are
only emitted when a value is provided.

## Basic Usage

```blade
<x-basekit-ui::seo
    title="Pricing"
    site-name="Acme"
    description="Simple, transparent pricing for teams of every size."
    canonical="{{ request()->url() }}"
    og-type="website"
    og-image="{{ asset('images/og.png') }}"
/>
```

## Props

| Prop          | Type     | Default    | Description                             |
| ------------- | -------- | ---------- | --------------------------------------- |
| `title`       | `string` | `''`       | Page title (suffixed with `site-name`)  |
| `site-name`   | `string` | `''`       | Site name used in the title and og tags |
| `description` | `string` | `null`     | Meta description                        |
| `canonical`   | `string` | `null`     | Canonical URL                           |
| `og-type`     | `string` | `'website'`| Open Graph type (`website`, `article`, …) |
| `og-image`    | `string` | `null`     | Open Graph / Twitter share image        |
| `noindex`     | `boolean`| `false`    | Emit `robots: noindex, follow`          |

## Title Suffix

The final document title is `{title} · {siteName}`. When `title` is empty the
site name is used on its own:

```blade
<x-basekit-ui::seo title="Pricing" site-name="Acme" />
{{-- <title>Pricing · Acme</title> --}}
```

## No-Index Pages

Pass `:noindex="true"` for pages that should not be indexed:

```blade
<x-basekit-ui::seo title="Login" site-name="Acme" :noindex="true" />
```

## Configuration

Configure in `config/basekit-laravel-ui.php`:

```php
'seo' => [
    'enabled' => true,
],
```
