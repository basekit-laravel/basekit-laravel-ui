@extends('basekit::test-pages.layout')
@section('title', 'Dropdown')
@section('content')
    <div id="test-area">
        <x-basekit-ui::dropdown-menu
            :items="[
                ['label' => 'Edit', 'url' => '#edit'],
                ['label' => 'Duplicate', 'url' => '#duplicate'],
                ['label' => 'Delete', 'url' => '#delete'],
            ]"
        />
    </div>
@endsection
