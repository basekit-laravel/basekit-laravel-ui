@extends('basekit::test-pages.layout')
@section('title', 'Toast')
@section('content')
    <div id="test-area">
        <x-basekit-ui::toast
            title="Notification"
            message="This is a toast message"
            :duration="5000"
        />
    </div>
@endsection
