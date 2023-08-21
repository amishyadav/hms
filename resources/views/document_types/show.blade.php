@extends('layouts.app')
@section('title')
    {{ __('messages.document.document_type_details') }}
@endsection
@section('header_toolbar')
    <div class="container-fluid">
        <div class="d-md-flex align-items-center justify-content-between mb-7">
            <h1 class="mb-0">{{__('messages.document.document_type_details')}}</h1>
            <div class="text-end mt-4 mt-md-0">
                <a class="btn btn-primary editDocsTypeBtn me-2"
                   data-id="{{ $documentType->id }}">{{ __('messages.common.edit') }}</a>
                <a href="{{ route('document-types.index')}}"
                   class="btn btn-outline-primary ms-2">{{ __('messages.common.back') }}</a>
            </div>
        </div>
    </div>
@endsection
@section('content')
    <div class="container-fluid">
        <div class="d-flex flex-column">
            <div class="row">
                <div class="col-12">
                    @include('flash::message')
                </div>
            </div>
            @include('document_types.show_fields')
            @include('document_types.edit_modal')
            {{Form::hidden('docTypeUrl',route('document-types.index'),['id'=>'indexDocTypeUrl','class'=>'docTypeUrl'])}}
            {{Form::hidden('docTypeUrl',route('document-types.index'),['id'=>'showDocTypeUrl','class'=>'docTypeUrl'])}}
        </div>
    </div>
@endsection
{{--    <script src="{{ mix('assets/js/document_type/user_documents.js') }}"></script>--}}
{{--        let docTypeUrl = "{{route('document-types.index')}}";--}}
{{--    <script src="{{ mix('assets/js/document_type/doc_type-details-edit.js') }}"></script>--}}
{{--    <script src="{{ mix('assets/js/custom/reset_models.js') }}"></script>--}}
