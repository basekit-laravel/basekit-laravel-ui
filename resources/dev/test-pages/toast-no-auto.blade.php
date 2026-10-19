@extends('basekit::test-pages.layout')
@section('title', 'Toast No Auto')
@section('content')
    <div id="test-area">
        <x-basekit-ui::toast
            title="Persistent Toast"
            message="This toast does not auto-dismiss"
            :duration="0"
        />
    </div>
@endsection
