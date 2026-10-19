@extends('basekit::test-pages.layout')
@section('title', 'Multi-Select Disabled')
@section('content')
    <div id="test-area">
        <x-basekit-ui::multi-select
            :options="['red' => 'Red', 'green' => 'Green', 'blue' => 'Blue']"
            :value="['red']"
            placeholder="Choose colors"
            disabled
        />
    </div>
@endsection
