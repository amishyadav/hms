@extends('layouts.app')
@section('title')
    {{ __('messages.issued_item.issued_items') }}
@endsection
@section('css')
{{--    <link rel="stylesheet" href="{{ asset('assets/css/sub-header.css') }}">--}}
@endsection
@section('content')
    <div class="container-fluid">
        @include('flash::message')
        <div class="d-flex flex-column">
            {{Form::hidden('issuedItemUrl',url('issued-items'),['id'=>'indexIssuedItemUrl'])}}
            {{Form::hidden('returnIssuedItemUrl',url('return-issued-item'),['id'=>'indexReturnIssuedItemUrl'])}}
            {{ Form::hidden('issuedItemLang', __('messages.delete.issued_item'), ['id' => 'issuedItemLang']) }}
            <livewire:issued-item-stock-table/>
            @include('issued_items.templates.templates')
        </div>
    </div>
@endsection
{{--        let issuedItemUrl = "{{url('issued-items')}}";--}}
{{--        let returnIssuedItemUrl = "{{url('return-issued-item')}}";--}}
{{--    <script src="{{ mix('assets/js/issued_items/issued_items.js') }}"></script>--}}
{{--    <script src="{{ mix('assets/js/custom/delete.js') }}"></script>--}}
