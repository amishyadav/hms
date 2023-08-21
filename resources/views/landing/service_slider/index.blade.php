@extends('layouts.app')
@section('title')
    {{ __('messages.service_slider.service_slider_image') }}
@endsection
@section('content')

    {{--    <div class="container-fluid">--}}
    {{--        <div class="d-flex flex-column">--}}
    {{--            <div class="d-sm-flex justify-content-between mb-5">--}}
    {{--                @include('layouts.search-component')--}}
    {{--                    <div class="ms-auto">--}}
    {{--                        <div class="dropdown d-flex align-items-center me-3 me-md-3">--}}
    {{--                            <div class="dropdown-menu py-0" aria-labelledby="dropdownMenuButton1">--}}
    {{--                                <div class="separator border-gray-200"></div>--}}
    {{--                                <div class="p-5">--}}
    {{--                                    <div class="mb-5">--}}
    {{--                                        <div class="d-flex justify-content-end">--}}
    {{--                                        </div>--}}
    {{--                                    </div>--}}
    {{--                                </div>--}}
    {{--                            </div>--}}
    {{--                        </div>--}}
    {{--                        <button class="btn btn-primary" data-bs-toggle="modal"--}}
    {{--                                data-bs-target="#createModal">{{__('messages.service_slider.add_service_slider')}}</button>--}}
    {{--                    </div>--}}
    {{--                </div>--}}
    {{--                @include('landing.service_slider.table')--}}
    {{--                @include('landing.service_slider.create-modal')--}}
    {{--                @include('landing.service_slider.edit-modal')--}}
    {{--                @include('landing.service_slider.templates.templates')--}}
    {{--        </div>--}}


    <div class="container-fluid">
        <div class="d-flex flex-column">
            @include('flash::message')
            <livewire:service-slider-table/>
        </div>
        @include('landing.service_slider.create-modal')
        @include('landing.service_slider.edit-modal')
        {{ Form::hidden('defaultDocumentImageUrl', asset('web_front/images/doctors/doctor.png'), ['id' => 'defaultServiceSliderDocumentImageUrl']) }}
        {{ Form::hidden('superAdminServiceSliderStore', route('service-slider.store'), ['id' => 'superAdminServiceSliderStore']) }}
        {{ Form::hidden('superAdminServiceSliderIndex', url('super-admin/service-slider'), ['id' => 'superAdminServiceSliderIndex']) }}
        {{ Form::hidden('serviceSliderLang',__('messages.delete.service_slider'), ['id' => 'serviceSliderLang']) }}

    </div>
@endsection
{{--let defaultDocumentImageUrl = "{{ asset('web_front/images/doctors/doctor.png') }}"--}}
{{--    <script src="{{ mix('assets/js/custom/delete.js') }}"></script>--}}
{{--    <script src="{{mix('assets/js/service_slider/service-slider.js')}}"></script>--}}
