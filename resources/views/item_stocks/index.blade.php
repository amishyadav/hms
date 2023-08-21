@extends('layouts.app')
@section('title')
    {{ __('messages.item_stock.item_stocks') }}
@endsection
@section('css')
{{--    <link rel="stylesheet" href="{{ asset('assets/css/sub-header.css') }}">--}}
@endsection
@section('content')
    <div class="container-fluid">
        @include('flash::message')
        <div class="d-flex flex-column">
            {{Form::hidden('itemStockUrl',url('item-stocks'),['id'=>'indexItemStockUrl'])}}
            {{Form::hidden('itemStockDownload',url('item-stocks-download'),['class'=>'indexItemStockDownload'])}}
            {{ Form::hidden('itemStockLang', __('messages.delete.item_stock'), ['id' => 'itemStockLang']) }}
            <livewire:item-stock-table/>
            @include('partials.page.templates.templates')
        </div>
    </div>
@endsection
{{--        let itemStockUrl = "{{url('item-stocks')}}";--}}
{{--        let itemStockDownload = "{{url('item-stocks-download')}}";--}}
{{--    <script src="{{ mix('assets/js/custom/input_price_format.js') }}"></script>--}}
{{--    <script src="{{ mix('assets/js/item_stocks/item_stocks.js') }}"></script>--}}
{{--    <script src="{{ mix('assets/js/custom/delete.js') }}"></script>--}}
