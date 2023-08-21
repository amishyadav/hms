@extends('layouts.app')
@section('title')
    {{ __('messages.front_cms_services') }}
@endsection
@section('content')
    @include('flash::message')
    <div class="container-fluid">
        <div class="d-flex flex-column">
            {{Form::hidden('defaultDocumentImageUrl',asset('web_front/images/services/medicine.png'),['id'=>'indexServiceDefaultDocumentImageUrl'])}}
            {{Form::hidden('fontServicesCreateUrl',route('front.cms.services.store'),['id'=>'indexFrontServicesCreateUrl'])}}
            {{Form::hidden('fontServicesUrl',route('front.cms.services.index'),['id'=>'indexFrontServicesUrl'])}}
            <livewire:front-cms-service-table/>
            {{--            @include('front_settings.front_services.table')--}}
            @include('front_settings.front_services.add_modal')
            @include('front_settings.front_services.edit_modal')
            @include('partials.modal.templates.templates')
        </div>
    </div>
@endsection

{{--    <script src="{{ mix('assets/js/custom/delete.js') }}"></script>--}}


{{--        let fontServicesUrl = "{{ route('front.cms.services.index') }}";--}}
{{--        let fontServicesCreateUrl = "{{ route('front.cms.services.store') }}";--}}
{{--        let defaultDocumentImageUrl = "{{ asset('web_front/images/services/medicine.png') }}";--}}

{{--    <script src="{{ mix('assets/js/front_settings/front_services/front_services.js') }}"></script>--}}

