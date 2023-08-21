@extends('layouts.app')
@section('title')
    {{ __('messages.bed.bed_details') }}
@endsection
@section('content')
    <div class="container-fluid">
        <div class="d-flex flex-column">
            <div class="row">
                <div class="col-12">
                    @include('flash::message')
                </div>
            </div>
            @include('beds.show_fields')
        </div>
        @include('beds.edit_modal')
        {{ Form::hidden('bedUrl', url('beds'), ['class' => 'bedUrl']) }}
        {{Form::Hidden('bedTypesUrl',url('beds'),['id'=>'bedTypesUrl'])}}
        {{Form::Hidden('bedDetailShowUrl',Request::fullUrl(),['id'=>'bedDetailShowUrl'])}}
    </div>
@endsection
{{--    <script src="{{ mix('assets/js/beds/beds_assigns_view_list.js') }}"></script>--}}
{{--        let bedUrl = "{{url('beds')}}";--}}
{{--    <script src="{{ mix('assets/js/custom/input_price_format.js') }}"></script>--}}
{{--    <script src="{{ mix('assets/js/beds/beds-details-edit.js') }}"></script>--}}
