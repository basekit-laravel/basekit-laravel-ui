@extends('basekit::test-pages.layout')
@section('title', 'Accordion Disabled')
@section('content')
    <div id="test-area">
        <x-basekit-ui::accordion
            :items="[
                ['title' => 'Enabled Section', 'content' => 'Content', 'value' => 'enabled'],
                ['title' => 'Disabled Section', 'content' => 'Content', 'value' => 'disabled', 'disabled' => true],
            ]"
        />
    </div>
@endsection
