# Styleguide

A live interactive preview of every Basekit component, all in one place.

Open on a tab: <a href="../styleguide.html" target="_blank">Styleguide</a>

<iframe
  id="styleguide-frame"
  src="../styleguide.html"
  style="width:100%; height:80vh; border:none; border-radius:0.5rem; box-shadow:0 1px 3px 0 rgb(0 0 0/0.1);"
  title="Basekit Laravel UI Styleguide"
></iframe>

<script setup>
import { onBeforeUnmount, onMounted } from 'vue'

onMounted(() => {
  const sendHash = () => {
    const frame = document.getElementById('styleguide-frame')
    if (!frame) return

    const hash = window.location.hash
    if (hash && frame.contentWindow) {
      frame.contentWindow.postMessage(hash, '*')
    }
  }

  const frame = document.getElementById('styleguide-frame')
  if (frame) {
    frame.addEventListener('load', sendHash)
  }

  window.addEventListener('hashchange', sendHash)

  onBeforeUnmount(() => {
    if (frame) {
      frame.removeEventListener('load', sendHash)
    }
    window.removeEventListener('hashchange', sendHash)
  })
})
</script>

## Sections

The styleguide is divided into five sections, each with collapsible sub-sections you can open individually:

- **[Form](#form)** — Button, Input, Textarea, Checkbox, Radio, Select, Multi-Select, Toggle
- **[Feedback](#feedback)** — Alert, Empty State, Spinner, Progress, Skeleton, Tooltip, Toast
- **[Layout](#layout)** — Card, Avatar, Badge, Divider, Stack, Grid, List, Stat, Description List, Table
- **[Navigation](#navigation)** — Tabs, Breadcrumb, Dropdown Menu, Link, Pagination
- **[Overlay](#overlay)** — Accordion, Modal

## Regenerating the Snapshot

The styleguide is a pre-rendered static HTML file committed to the repository. After making changes to component Blade views or CSS, regenerate it directly from the package root — no separate Laravel app required:

```bash
composer styleguide
```

This runs `./vendor/bin/testbench basekit:ui:styleguide` using Orchestra Testbench, which is already a dev dependency.

To save it to a custom path (e.g. your app's `public/` directory):

```bash
php artisan basekit:ui:styleguide --output=public/styleguide.html
```

## Using the Styleguide in Your App

You can render the Blade view directly in any Laravel application — useful during development to preview components with your own theme applied:

```blade
@php
    $sections = [
        'Form'       => 'basekit::styleguide.partials.form',
        'Feedback'   => 'basekit::styleguide.partials.feedback',
        'Layout'     => 'basekit::styleguide.partials.layout',
        'Navigation' => 'basekit::styleguide.partials.navigation',
        'Overlay'    => 'basekit::styleguide.partials.overlay',
    ];
@endphp

<x-styleguide-wrapper :sections="$sections" />
```

Make sure your app's CSS (including Basekit's `theme.css`) is loaded on the page — the component does not load any styles itself.
