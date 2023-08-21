@extends('layouts.app')
@section('title')
    {{ __('messages.document_types') }}
@endsection
@section('css')
{{--    <link rel="stylesheet" href="{{ asset('assets/css/sub-header.css') }}">--}}
@endsection
@section('content')
<div class="container-fluid">
    <div class="d-flex flex-column">
        @include('flash::message')
        <livewire:document-type-table/>
        @include('document_types.add_modal')
        @include('document_types.edit_modal')
        @include('partials.modal.templates.templates')
        {{Form::hidden('docTypeCreateUrl',route('document-types.store'),['id'=>'indexDocTypeCreateUrl','class'=>'docTypeCreateUrl'])}}
        {{Form::hidden('docTypeUrl',route('document-types.index'),['id'=>'indexDocTypeUrl','class'=>'docTypeUrl'])}}
        {{ Form::hidden('documentTypeLang', __('messages.delete.document_type'), ['id' => 'documentTypeLang']) }}
    </div>
</div>
@endsection
{{--    <script src="{{ mix('assets/js/custom/delete.js') }}"></script>--}}
{{--let docTypeCreateUrl = "{{route('document-types.store')}}";--}}
{{--let docTypeUrl = "{{route('document-types.index')}}";--}}
{{--    <script src="{{ mix('assets/js/document_type/doc_type.js') }}"></script>--}}
{{--    <script src="{{ mix('assets/js/custom/new-edit-modal-form.js') }}"></script>--}}
{{--    <script src="{{ mix('assets/js/custom/reset_models.js') }}"></script>--}}

