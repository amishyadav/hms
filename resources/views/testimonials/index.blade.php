@extends('layouts.app')
@section('title')
    {{ __('messages.testimonials') }}
@endsection
{{--    <link rel="stylesheet" href="{{ asset('assets/css/sub-header.css') }}">--}}
@section('content')
    @include('flash::message')
    <div class="container-fluid">
        <div class="d-flex flex-column">
            {{Form::hidden('testimonialUrl',route('testimonials.index'),['id'=>'indexTestimonialUrl'])}}
            {{Form::hidden('testimonialCreateUrl',route('testimonials.store'),['id'=>'indexTestimonialCreateUrl'])}}
            {{Form::hidden('profileError',__('messages.testimonial.profile_error'),['id'=>'indexTestimonialProfileError'])}}
            {{Form::hidden('defaultDocumentImageUrl',asset('assets/img/default_image.jpg'),['id'=>'indexTestimonialDefaultDocumentImageUrl'])}}
            {{ Form::hidden('testimonialLang',__('messages.delete.testimonial'), ['id' => 'testimonialLang']) }}

            <livewire:testimonial-table/>
            @include('testimonials.add_modal')
            @include('testimonials.edit_modal')
            @include('partials.modal.templates.templates')
        </div>
    </div>
@endsection
{{--    <script src="{{ mix('assets/js/custom/delete.js') }}"></script>--}}
{{--        let testimonialUrl = "{{ route('testimonials.index') }}";--}}
{{--        let testimonialCreateUrl = "{{ route('testimonials.store') }}";--}}
{{--        let profileError = "{{__('messages.testimonial.profile_error')}}";--}}
{{--        let defaultDocumentImageUrl = "{{ asset('assets/img/default_image.jpg') }}";--}}
{{--    <script src="{{mix('assets/js/testimonials/testimonial.js')}}"></script>--}}
