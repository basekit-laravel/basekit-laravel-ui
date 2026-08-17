@extends('basekit::test-pages.layout')
@section('title', 'Dropdown Hover')
@section('content')
    <div id="test-area">
        <x-basekit-ui::dropdown-menu
            trigger="hover"
            :items="[
                ['label' => 'Option A', 'url' => '#a'],
                ['label' => 'Option B', 'url' => '#b'],
            ]"
        />
    </div>
@endsection
