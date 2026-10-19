@extends('basekit::test-pages.layout')
@section('title', 'Dropdown Submenu')
@section('content')
    <div id="test-area">
        <x-basekit-ui::dropdown-menu
            :items="[
                ['label' => 'Top Level', 'url' => '#top'],
                [
                    'label' => 'With Submenu',
                    'children' => [
                        ['label' => 'Sub Item 1', 'url' => '#sub1'],
                        ['label' => 'Sub Item 2', 'url' => '#sub2'],
                    ],
                ],
            ]"
        />
    </div>
@endsection
