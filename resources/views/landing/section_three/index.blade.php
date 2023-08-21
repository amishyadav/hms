@extends('layouts.app')
@section('title')
    {{ __('messages.landing_cms.section_three') }}
@endsection
@section('page_css')
{{--    <link rel="stylesheet" href="{{ asset('assets/css/sub-header.css') }}">--}}
@endsection
@section('content')
    <div class="container-fluid">
        <div class="d-flex flex-column">
            <div class="row">
                <div class="col-12">
                    @include('flash::message')
                    @include('layouts.errors')
                </div>
            </div>
            <div class="card">
                <div class="card-body p-12">
                    {{ Form::open(['route' => ['super.admin.section.three.update'],' method' => 'POST', 'files' => true]) }}
                    @method('PUT')
                    @include('landing.section_three.field')
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
@endsection
