@extends('basekit::test-pages.layout')
@section('title', 'Select')
@section('content')
    <div id="test-area">
        <x-basekit-ui::select
            :options="['us' => 'United States', 'uk' => 'United Kingdom', 'de' => 'Germany']"
            placeholder="Choose country"
        />
    </div>
@endsection
