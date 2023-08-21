@extends('layouts.app')
@section('title')
    {{ __('messages.postal_receive') }}
@endsection
@section('page_css')
{{--    <link rel="stylesheet" href="{{ asset('assets/css/sub-header.css') }}">--}}
@endsection
@section('content')
    <div class="container-fluid">
        @include('flash::message')
        <div class="d-flex flex-column">
            <livewire:postal-receive-table/>
            {{Form::hidden('add_postal_receives_modal','#add_postal_receives_modal',['class'=>'add_modal'])}}
            {{Form::hidden('edit_postal_receives_modal','#edit_postal_receives_modal',['class'=>'edit_modal'])}}

            {{ Form::hidden('postalUrl', route('receives.index'), ['class' => 'postalUrl']) }}
            {{ Form::hidden('ispostal', \App\Models\Postal::POSTAL_RECEIVE, ['class' => 'isPostal']) }}
            {{ Form::hidden('name', __('messages.postal.receive'), ['class' => 'name']) }}
            {{ Form::hidden('postalCreateUrl', route('receives.store'), ['class' => 'postalCreateUrl']) }}
            {{ Form::hidden('defaultDocumentImageUrl', asset('assets/img/default_image.jpg'), ['class' => 'defaultDocumentImageUrl']) }}
            {{ Form::hidden('download', __('messages.expense.download'), ['class' => 'download']) }}
            {{ Form::hidden('documentError', __('messages.expense.document_error'), ['class' => 'documentError']) }}
            {{ Form::hidden('tableName', '#receivesTable', ['class' => 'tableName'] ) }}
            {{ Form::hidden('hiddenId', '#editReceiveId', ['class' => 'hiddenId']) }}
            @include('postals.receives.add_modal')
            @include('postals.receives.edit_modal')
            @include('partials.modal.templates.templates')
        </div>
    </div>
@endsection


{{--let postalUrl = "{{route('receives.index')}}";--}}
{{--let ispostal = "{{\App\Models\Postal::POSTAL_RECEIVE}}";--}}
{{--let name = "{{__('messages.postal.receive')}}";--}}
{{--let postalCreateUrl = "{{route('receives.store')}}";--}}
{{--let defaultDocumentImageUrl = "{{ asset('assets/img/default_image.jpg') }}";--}}
{{--let download = "{{__('messages.expense.download')}}";--}}
{{--let documentError = "{{__('messages.expense.document_error')}}";--}}
{{--let tableName = '#receivesTable';--}}
{{--let hiddenId = '#editReceiveId';--}}

{{--    <script src="{{mix('assets/js/postals/postal.js')}}"></script>--}}
{{--    <script src="{{ mix('assets/js/custom/new-edit-modal-form.js') }}"></script>--}}
{{--    <script src="{{ mix('assets/js/custom/delete.js') }}"></script>--}}

