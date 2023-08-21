@extends('layouts.app')
@section('title')
    {{ __('messages.documents') }}
@endsection
@section('css')
{{--    <link rel="stylesheet" href="{{ asset('assets/css/sub-header.css') }}">--}}
@endsection
@section('content')
<div class="container-fluid">
    <div class="d-flex flex-column">
        @include('flash::message')
        <livewire:document-table/>
        {{Form::hidden('documentsCreateUrl',route('documents.store'),['id'=>'indexDocumentsCreateUrl','class'=>'documentsCreateUrl'])}}
        {{Form::hidden('documentsUrl',route('documents.index'),['id'=>'indexDocumentsUrl','class'=>'documentsUrl'])}}
        {{Form::hidden('defaultDocumentImageUrl',asset('assets/img/default_image.jpg'),['id'=>'indexDefaultDocumentImageUrl','class'=>'defaultDocumentImageUrl'])}}
        {{Form::hidden('downloadDocumentUrl',url('document-download'),['id'=>'indexDownloadDocumentUrl','class'=>'downloadDocumentUrl'])}}
        {{Form::hidden('patientUrl',route('patients.index'),['id'=>'indexPatientUrl','class'=>'patientUrl'])}}
        {{ Form::hidden('documentLang', __('messages.delete.document'), ['id' => 'documentLang']) }}
        @include('documents.add_modal')
        @include('documents.edit_modal')
    </div>
</div>
@endsection
{{--    <script src="{{ mix('assets/js/custom/delete.js') }}"></script>--}}
{{--    <script src="{{ mix('assets/js/custom/reset_models.js') }}"></script>--}}
{{--let documentsCreateUrl = "{{route('documents.store')}}";--}}
{{--let documentsUrl = "{{route('documents.index')}}";--}}
{{--let defaultDocumentImageUrl = "{{ asset('assets/img/default_image.jpg') }}";--}}
{{--let downloadDocumentUrl = "{{ url('document-download') }}";--}}
{{--let patientUrl = "{{ route('patients.index') }}";--}}
{{--    <script src="{{ mix('assets/js/document/document.js') }}"></script>--}}
{{--    <script src="{{ mix('assets/js/custom/new-edit-modal-form.js') }}"></script>--}}
