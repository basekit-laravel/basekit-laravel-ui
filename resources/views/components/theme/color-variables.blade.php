{{-- Runtime theme variables --}}

@if ($variables !== [])
    <style>
        {{ $selector }} {
            @foreach ($variables as $variable => $value)
                {{ $variable }}: {{ $value }};
            @endforeach
        }
    </style>
@endif
