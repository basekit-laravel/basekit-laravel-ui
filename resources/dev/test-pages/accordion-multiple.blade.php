@extends('basekit::test-pages.layout')
@section('title', 'Accordion Multiple')
@section('content')
    <div id="test-area">
        <x-basekit-ui::accordion
            :is-multiple="true"
            :items="[
                ['title' => 'First Section', 'content' => 'Content for first section', 'value' => 'first'],
                ['title' => 'Second Section', 'content' => 'Content for second section', 'value' => 'second'],
                ['title' => 'Third Section', 'content' => 'Content for third section', 'value' => 'third'],
            ]"
        />
    </div>
@endsection
