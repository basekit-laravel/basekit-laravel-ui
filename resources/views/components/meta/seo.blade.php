{{-- SEO and social sharing head tags --}}

<title>{{ $pageTitle }}</title>

<meta name="description" content="{{ $description }}">

@if ($canonical)
    <link rel="canonical" href="{{ $canonical }}">
@endif

@if ($noindex)
    <meta name="robots" content="noindex, follow">
@endif

<meta property="og:type" content="{{ $ogType }}">
<meta property="og:site_name" content="{{ $siteName }}">
<meta property="og:title" content="{{ $pageTitle }}">
@if ($description)
    <meta property="og:description" content="{{ $description }}">
@endif
@if ($canonical)
    <meta property="og:url" content="{{ $canonical }}">
@endif
@if ($ogImage)
    <meta property="og:image" content="{{ $ogImage }}">
@endif

<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:title" content="{{ $pageTitle }}">
@if ($description)
    <meta name="twitter:description" content="{{ $description }}">
@endif
@if ($ogImage)
    <meta name="twitter:image" content="{{ $ogImage }}">
@endif
