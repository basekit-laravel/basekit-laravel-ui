@extends('basekit::test-pages.layout')
@section('title', 'Password Toggle')
@section('content')
    <div id="test-area">
        <x-basekit-ui::input
            type="password"
            :is-toggle-password="true"
            placeholder="Enter password"
            value="secret123"
        />
    </div>
@endsection
