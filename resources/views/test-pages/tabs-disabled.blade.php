@extends('basekit::test-pages.layout')
@section('title', 'Tabs Disabled')
@section('content')
    <div id="test-area">
        <x-basekit-ui::tabs
            :items="[
                ['label' => 'Active', 'value' => 'active'],
                ['label' => 'Disabled', 'value' => 'disabled', 'disabled' => true],
                ['label' => 'Other', 'value' => 'other'],
            ]"
            active="active"
        />
    </div>
@endsection
