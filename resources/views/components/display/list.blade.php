{{-- List Component --}}

@php
    $tag = $ordered ? 'ol' : 'ul';
@endphp

<{{ $tag }} {{ $attributes->twMerge($classes()) }}>
    @if ($slot->isNotEmpty())
        {{ $slot }}
    @else
        @foreach ($items as $item)
            <li>{{ $item }}</li>
        @endforeach
    @endif
    </{{ $tag }}>
