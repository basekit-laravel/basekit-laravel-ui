@extends('basekit::test-pages.layout')
@section('title', 'Tooltip Delays')
@section('content')
    <div id="test-area" style="padding: 100px;">
        <x-basekit-ui::tooltip content="Delayed tooltip" :show-delay="300" :hide-delay="200">
            <button id="tooltip-trigger">Hover me (with delays)</button>
        </x-basekit-ui::tooltip>
    </div>
@endsection
