@extends('basekit::test-pages.layout')
@section('title', 'Copy Button')
@section('content')
    <div id="test-area">
        <x-basekit-ui::copy-button value="Hello World" label="Copy">
            Copy to Clipboard
        </x-basekit-ui::copy-button>
    </div>
@endsection
