@extends('layouts.app')
@section('title')
    {{ __('messages.landing_cms.section_one') }}
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
                    {{ Form::open(['route' => ['super.admin.section.one.update'], 'id' => 'sectionOneForm','method' => 'put', 'files' => true]) }}
                    @include('landing.section_one.field')
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
@endsection
