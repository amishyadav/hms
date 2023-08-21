@extends('layouts.app')
@section('title')
    {{ __('messages.testimonials') }}
@endsection
@section('page_css')
{{--    <link rel="stylesheet" href="{{ asset('assets/css/sub-header.css') }}">--}}
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
{{--                        <a href="#" class="btn btn-primary" data-bs-toggle="modal"--}}
{{--                           data-bs-target="#addModal">{{ __('messages.testimonial.new_testimonial') }}</a>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                @include('landing.testimonial.table')--}}
{{--                @include('landing.testimonial.create-modal')--}}
{{--                @include('landing.testimonial.edit-modal')--}}
{{--                @include('landing.testimonial.show')--}}
{{--                @include('landing.testimonial.templates.template')--}}
{{--        </div>--}}
{{--    </div>--}}

    <div class="container-fluid">
        @include('flash::message')
        <div class="d-flex flex-column">
            <livewire:admin-testimonial-table/>
            @include('landing.testimonial.create-modal')
            @include('landing.testimonial.edit-modal')
            @include('landing.testimonial.show')
            {{--        @include('landing.testimonial.templates.template')--}}
            {{ Form::hidden('profileError', __('messages.testimonial.profile_error'), ['id' => 'testimonialProfileError']) }}
            {{ Form::hidden('defaultDocumentImageUrl', asset('landing_front/images/thomas-james.png'), ['id' => 'testimonialDefaulImageURL']) }}
            {{ Form::hidden('superAdminTestimonialStore', route('admin-testimonial.store'), ['id' => 'superAdminTestimonialStore']) }}
            {{ Form::hidden('superAdminTestimonialIndex', url('super-admin/admin-testimonial'), ['id' => 'superAdminTestimonialIndex']) }}
            {{ Form::hidden('adminTestimonialLang',__('messages.delete.testimonial'), ['id' => 'adminTestimonialLang']) }}
        </div>
    </div>

@endsection
{{--    <script src="{{ mix('assets/js/custom/delete.js') }}"></script>--}}
{{--let profileError = "{{__('messages.testimonial.profile_error')}}"--}}
{{--let defaultDocumentImageUrl = "{{ asset('landing_front/images/thomas-james.png') }}"--}}
{{--    <script src="{{mix('assets/js/super_admin_testimonial/testimonial.js')}}"></script>--}}

