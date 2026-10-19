@extends('basekit::test-pages.layout')
@section('title', 'Tooltip')
@section('content')
    <div id="test-area" style="padding: 100px;">
        <x-basekit-ui::tooltip content="Tooltip text here">
            <button id="tooltip-trigger">Hover me</button>
        </x-basekit-ui::tooltip>
    </div>
@endsection
