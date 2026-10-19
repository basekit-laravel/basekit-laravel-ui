@extends('basekit::test-pages.layout')
@section('title', 'Modal')
@section('content')
    <div id="test-area">
        <div x-data="{ isModalOpen: false }">
            <button id="open-modal" @click="isModalOpen = true">Open Modal</button>

            <x-basekit-ui::modal show="isModalOpen" title="Test Modal">
                <p id="modal-body">Modal body content</p>

                <x-slot:footer>
                    <button id="modal-footer-btn">Footer Action</button>
                </x-slot:footer>
            </x-basekit-ui::modal>
        </div>
    </div>
@endsection
