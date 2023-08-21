@extends('layouts.app')
@section('title')
    {{ __('messages.subscribe.subscribers') }}
@endsection
@section('content')
    <div class="container-fluid">
        <div class="d-flex flex-column">
            @include('flash::message')
            <livewire:subscribe-table/>
        </div>
        {{ Form::hidden('superAdminSubscribeDestroy', url('super-admin/subscribers'), ['id' => 'superAdminSubscribeDestroy']) }}
        {{ Form::hidden('subscribeLang',__('messages.delete.subscriber'), ['id' => 'subscribeLang']) }}

    </div>

@endsection
{{--    <script src="{{ mix('assets/js/custom/delete.js') }}"></script>--}}
{{--    <script src="{{mix('assets/js/subscribe/subscribe.js')}}"></script>--}}
