{{-- Description List Component --}}

<dl {{ $attributes->class($classes()) }}>
    @if ($slot->isNotEmpty())
        {{ $slot }}
    @elseif ($hasItems())
        @foreach ($items as $item)
            <dt>{{ $item['term'] }}</dt>
            <dd>{{ $item['description'] }}</dd>
        @endforeach
    @endif
</dl>
