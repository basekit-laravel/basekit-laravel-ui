@extends('basekit::test-pages.layout')
@section('title', 'Table Stacked')
@section('content')
    <div id="test-area">
        @php
            $columns = [
                ['key' => 'name', 'label' => 'Name'],
                ['key' => 'email', 'label' => 'Email'],
                ['key' => 'role', 'label' => 'Role', 'show' => 'lg'],
            ];
            $rows = [
                ['name' => 'Alice', 'email' => 'alice@example.com', 'role' => 'Admin'],
                ['name' => 'Bob', 'email' => 'bob@example.com', 'role' => 'User'],
            ];
        @endphp
        <x-basekit-ui::table type="stacked" :columns="$columns" :rows="$rows" :responsive="true" />
    </div>
@endsection
