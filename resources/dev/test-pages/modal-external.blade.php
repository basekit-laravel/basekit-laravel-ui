@extends('basekit::test-pages.layout')
@section('title', 'Modal External Control')
@section('content')
    <div id="test-area">
        <div x-data="{ showModal: true }">
            <p id="status" x-text="showModal ? 'open' : 'closed'"></p>

            <x-basekit-ui::modal show="showModal" title="Externally Controlled">
                <p>Externally controlled modal content</p>
            </x-basekit-ui::modal>
        </div>
    </div>
@endsection
