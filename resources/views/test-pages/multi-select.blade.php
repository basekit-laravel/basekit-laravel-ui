@extends('basekit::test-pages.layout')
@section('title', 'Multi-Select')
@section('content')
    <div id="test-area">
        <x-basekit-ui::multi-select
            :options="['red' => 'Red', 'green' => 'Green', 'blue' => 'Blue', 'yellow' => 'Yellow']"
            placeholder="Choose colors"
        />
    </div>
@endsection
