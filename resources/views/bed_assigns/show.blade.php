@extends('layouts.app')
@section('title')
    {{ __('messages.bed_assign.bed_assign_details')}}
@endsection
@section('header_toolbar')
    <div class="container-fluid">
        <div class="d-md-flex align-items-center justify-content-between mb-7">
            <h1 class="mb-0">{{__('messages.bed_assign.bed_assign_details')}}</h1>
            <div class="text-end mt-4 mt-md-0">
                <a class="btn btn-primary me-2 me-2 me-2"
                   href="{{ url('bed-assigns/'.$bedAssign->id.'/edit') }}">{{ __('messages.common.edit') }}</a>
                <a href="{{route('bed-assigns.index')}}"
                   class="btn btn-outline-primary ms-2">{{ __('messages.common.back') }}</a>
            </div>
        </div>
    </div>
@endsection
@section('content')
    <div class="container-fluid">
        @include('flash::message')
        <div class="d-flex flex-column">
            <div class="card">
                <div class="card-body">
                    @include('bed_assigns.show_fields')
                </div>
            </div>
        </div>
    </div>
@endsection
