# Styleguide

A live interactive preview of every Basekit component, all in one place.

Open in a new tab: <a href="../styleguide.html" target="_blank">Styleguide</a>

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

## What's Inside

The Styleguide includes every public Basekit component organized by category:

- **Form** — Button, Copy Button, Input, Select, Multi-Select, Textarea, Checkbox, Radio, Fieldset, Toggle
- **Feedback** — Alert, Empty State, Spinner, Progress, Skeleton, Tooltip, Toast
- **Navigation** — Tabs, Breadcrumb, Dropdown Menu, Link, Pagination
- **Layout** — Container, Divider, Stack, Grid
- **Display** — Card, Badge, Avatar, Table, List, Description List, Stat
- **Dialog** — Accordion, Modal

Each component includes:

- Visual previews of variants, sizes, and states
- Interactive examples (modals, dropdowns, tabs, accordions)
- Blade code examples with copy-to-clipboard
- Responsive preview controls
- Dark mode support

## Theme Synchronization

The Styleguide automatically shares the same theme preference as the documentation site. If you switch to dark mode in the docs, the Styleguide will open in dark mode, and vice versa.

Theme preference is stored in `localStorage` under the key `vitepress-theme-appearance`.

## Regenerating the Snapshot

The Styleguide is a pre-rendered static HTML file. After making changes to component Blade views or CSS, regenerate it:

```bash
composer styleguide
```

This runs `./vendor/bin/testbench basekit:ui:styleguide` using Orchestra Testbench.

To save to a custom path:

```bash
php artisan basekit:ui:styleguide --output=public/styleguide.html
```

## Using the Styleguide in Your App

You can render the Blade view directly in any Laravel application:

```blade
@php
    $sections = [
        'Form'       => 'basekit::styleguide.partials.form',
        'Feedback'   => 'basekit::styleguide.partials.feedback',
        'Layout'     => 'basekit::styleguide.partials.layout',
        'Navigation' => 'basekit::styleguide.partials.navigation',
        'Display'    => 'basekit::styleguide.partials.display',
        'Dialog'     => 'basekit::styleguide.partials.dialog',
    ];
@endphp

<x-styleguide-wrapper :sections="$sections" />
```

Make sure your app's CSS (including Basekit's `theme.css`) is loaded on the page.
