@extends('basekit::test-pages.layout')
@section('title', 'Modal No Close Button')
@section('content')
    <div id="test-area">
        <div x-data="{ isModalOpen: false }">
            <button id="open-modal" @click="isModalOpen = true">Open Modal</button>

            <x-basekit-ui::modal show="isModalOpen" title="No Close Button" :is-close-button="false">
                <p>No close button in header</p>
            </x-basekit-ui::modal>
        </div>
    </div>
@endsection
