@extends('layouts.app')
@section('title')
    {{ __('messages.landing_cms.section_four') }}
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
                    {{ Form::open(['route' => ['super.admin.section.four.update'],' method' => 'POST', 'files' => true]) }}
                    @method('PUT')
                    @include('landing.section_four.field')
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
@endsection
