@extends('layouts.app')
@section('title')
    {{ __('messages.item.items') }}
@endsection
@section('css')
{{--    <link rel="stylesheet" href="{{ asset('assets/css/sub-header.css') }}">--}}
@endsection
@section('content')
    <div class="container-fluid">
        @include('flash::message')
        <div class="d-flex flex-column">
            {{Form::hidden('itemUrl',url('items'),['id'=>'indexItemUrl'])}}
            {{ Form::hidden('itemLang', __('messages.delete.item'), ['id' => 'itemLang']) }}
            <livewire:item-table/>
            @include('partials.page.templates.templates')
        </div>
    </div>
@endsection
{{--        let itemUrl = "{{url('items')}}";--}}
{{--    <script src="{{ mix('assets/js/items/items.js') }}"></script>--}}
{{--    <script src="{{ mix('assets/js/custom/delete.js') }}"></script>--}}
