@extends('basekit::test-pages.layout')
@section('title', 'Tabs With Panels')
@section('content')
    <div id="test-area">
        <x-basekit-ui::tabs
            :items="[
                ['label' => 'First', 'value' => 'first'],
                ['label' => 'Second', 'value' => 'second'],
            ]"
            active="first"
        >
            <div x-show="active === 'first'" id="panel-first">
                <p>First panel content</p>
            </div>
            <div x-show="active === 'second'" id="panel-second">
                <p>Second panel content</p>
            </div>
        </x-basekit-ui::tabs>
    </div>
@endsection
