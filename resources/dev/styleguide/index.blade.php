@php
    $sections = [
        'Form' => 'basekit::styleguide.partials.form',
        'Feedback' => 'basekit::styleguide.partials.feedback',
        'Navigation' => 'basekit::styleguide.partials.navigation',
        'Layout' => 'basekit::styleguide.partials.layout',
        'Display' => 'basekit::styleguide.partials.display',
        'Dialog' => 'basekit::styleguide.partials.dialog',
    ];
@endphp

<x-styleguide-wrapper :sections="$sections" />
