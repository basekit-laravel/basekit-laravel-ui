@extends('basekit::test-pages.layout')
@section('title', 'Modal No Backdrop Close')
@section('content')
    <div id="test-area">
        <div x-data="{ isModalOpen: false }">
            <button id="open-modal" @click="isModalOpen = true">Open Modal</button>

            <x-basekit-ui::modal show="isModalOpen" title="No Backdrop Close" :is-close-on-backdrop="false">
                <p>Clicking backdrop should NOT close this modal</p>
            </x-basekit-ui::modal>
        </div>
    </div>
@endsection
