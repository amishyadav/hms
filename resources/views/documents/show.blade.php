@extends('layouts.app')
@section('title')
    {{ __('messages.document.document_detail') }}
@endsection
@section('header_toolbar')
    <div class="container-fluid">
        <div class="d-md-flex align-items-center justify-content-between mb-7">
            <h1 class="mb-0">{{__('messages.document.document_detail')}}</h1>
            <div class="text-end mt-4 mt-md-0">
                <a class="btn btn-primary document-edit-btn me-2"
                   data-id="{{ $documents->id }}">{{ __('messages.common.edit') }}</a>
                <a href="{{ url()->previous() }}"
                   class="btn btn-outline-primary ms-2">{{ __('messages.common.back') }}</a>
            </div>
        </div>
    </div>
@endsection
@section('content')
    <div class="d-flex flex-column flex-lg-row custom-margin-top">
        <div class="flex-lg-row-fluid mb-10 mb-lg-0 me-lg-7 me-xl-10">
            <div class="row">
                <div class="col-12">
                    @include('flash::message')
                </div>
            </div>
            <div class="p-12">
                @include('documents.show_fields')
            </div>
        </div>
    </div>
    @include('documents.edit_modal')
    {{Form::hidden('documentsUrl',route('documents.index'),['id'=>'indexDocumentsUrl','class'=>'documentsUrl'])}}
    {{Form::hidden('documentsUrl',route('documents.index'),['id'=>'showDocumentsUrl','class'=>'documentsUrl'])}}
    {{Form::hidden('defaultDocumentImageUrl',asset('assets/img/default_image.jpg'),['id'=>'showDefaultDocumentImageUrl','class'=>'defaultDocumentImageUrl'])}}
@endsection
{{--let documentsUrl = "{{route('documents.index')}}";--}}
{{--let defaultDocumentImageUrl = "{{ asset('assets/img/default_image.jpg') }}";--}}
{{--    <script src="{{ mix('assets/js/document/document-details-edit.js') }}"></script>--}}
{{--    <script src="{{ mix('assets/js/custom/reset_models.js') }}"></script>--}}
