@extends('basekit::test-pages.layout')
@section('title', 'Dropdown Disabled')
@section('content')
    <div id="test-area">
        <x-basekit-ui::dropdown-menu
            :items="[
                ['label' => 'Enabled Item', 'url' => '#enabled'],
                ['label' => 'Disabled Item', 'url' => '#disabled', 'disabled' => true],
                ['label' => 'Another Enabled', 'url' => '#another'],
            ]"
        />
    </div>
@endsection
