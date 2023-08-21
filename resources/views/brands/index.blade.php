@extends('layouts.app')
@section('title')
    {{ __('messages.medicine.medicine_brands') }}
@endsection
@section('css')
{{--    <link rel="stylesheet" href="{{ asset('assets/css/sub-header.css') }}">--}}
@endsection
@section('content')
    <div class="container-fluid">
        <div class="d-flex flex-column">
            @include('flash::message')
            {{Form::hidden('brandUrl',url('brands'),['id'=>'indexBrandUrl'])}}
            {{ Form::hidden('medicineBrandLang', __('messages.delete.medicine_brand'), ['id' => 'medicineBrandLang']) }}
            <livewire:medicine-brand-table/>
            @include('partials.page.templates.templates')
        </div>
    </div>
@endsection
{{--        let brandUrl = "{{url('brands')}}";--}}
{{--    <script src="{{ mix('assets/js/brands/brands.js') }}"></script>--}}
{{--    <script src="{{ mix('assets/js/custom/delete.js') }}"></script>--}}
