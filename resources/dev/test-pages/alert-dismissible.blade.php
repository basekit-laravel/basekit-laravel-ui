@extends('basekit::test-pages.layout')
@section('title', 'Alert Dismissible')
@section('content')
    <div id="test-area">
        <x-basekit-ui::alert
            title="Warning"
            :is-dismissible="true"
        >
            This alert can be dismissed.
        </x-basekit-ui::alert>
    </div>
@endsection
