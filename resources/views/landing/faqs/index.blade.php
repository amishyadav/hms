@extends('layouts.app')
@section('title')
    {{ __('messages.faqs.faqs') }}
@endsection
@section('page_css')
{{--    <link rel="stylesheet" href="{{ asset('assets/css/sub-header.css') }}">--}}
@endsection
@section('content')
    {{--    @include('flash::message')--}}

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
    {{--                        <a href="#" class="btn btn-primary" data-bs-toggle="modal"--}}
    {{--                           data-bs-target="#addModal">{{ __('messages.faqs.add_faqs') }}</a>--}}
    {{--                    </div>--}}
    {{--            </div>--}}
    {{--            @include('landing.faqs.table')--}}
    {{--            @include('landing.faqs.create-modal')--}}
    {{--            @include('landing.faqs.edit-modal')--}}
    {{--            @include('landing.faqs.show')--}}
    {{--            @include('landing.faqs.templates.templates')--}}
    {{--        </div>--}}
    {{--    </div>--}}




    <div class="container-fluid">
        <div class="d-flex flex-column">
            @include('flash::message')
            <livewire:faqs-table/>
        </div>
        @include('landing.faqs.create-modal')
        @include('landing.faqs.edit-modal')
        @include('landing.faqs.show')
        {{ Form::hidden('superAdminFAQStore', route('faqs.store'), ['id' => 'superAdminFAQStore']) }}
        {{ Form::hidden('superAdminFAQIndex', url('super-admin/faqs'), ['id' => 'superAdminFAQIndex']) }}
        {{ Form::hidden('faqLang', __('messages.delete.faq'), ['id' => 'faqLang']) }}
    </div>

@endsection
{{--    <script src="{{ mix('assets/js/custom/delete.js') }}"></script>--}}
{{--    <script src="{{mix('assets/js/faqs/faqs.js')}}"></script>--}}
