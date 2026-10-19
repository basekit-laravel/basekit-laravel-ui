@extends('basekit::test-pages.layout')
@section('title', 'Tabs')
@section('content')
    <div id="test-area">
        <x-basekit-ui::tabs
            :items="[
                ['label' => 'Tab 1', 'value' => 'tab1'],
                ['label' => 'Tab 2', 'value' => 'tab2'],
                ['label' => 'Tab 3', 'value' => 'tab3'],
            ]"
            active="tab1"
        />
    </div>
@endsection
