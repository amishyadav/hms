@extends('layouts.app')
@section('title')
    {{ __('messages.bed_type.bed_type_details')}}
@endsection
@section('content')
    <div class="container-fluid">
        <div class="d-flex flex-column">
            <div class="row">
                <div class="col-12">
                    @include('flash::message')
                </div>
            </div>
            @include('bed_types.show_fields')
            @include('bed_types.edit_modal')
        </div>
        {{Form::Hidden('bedTypesUrl',url('bed-types'),['id'=>'bedTypesUrl'])}}
        {{Form::Hidden('bedTypeShowUrl',Request::fullUrl(),['id'=>'bedTypeShowUrl'])}}
        {{ Form::hidden('bedTypeIndexUrl', url('bed-types'), ['id' => 'bedTypeIndexUrl']) }}
    </div>
@endsection
{{--    <script src="{{ mix('assets/js/bed_types/beds_view_list.js') }}"></script>--}}
{{--        let bedTypesUrl = "{{ url('bed-types') }}";--}}
{{--    <script src="{{ mix('assets/js/bed_types/bed_types_details_edit.js') }}"></script>--}}
