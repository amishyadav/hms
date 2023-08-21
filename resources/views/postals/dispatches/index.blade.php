@extends('layouts.app')
@section('title')
    {{ __('messages.postal_dispatch') }}
@endsection
@section('page_css')
{{--    <link rel="stylesheet" href="{{ asset('assets/css/sub-header.css') }}">--}}
@endsection
@section('content')
    <div class="container-fluid">
        @include('flash::message')
        <div class="d-flex flex-column">
{{--            <div class="d-sm-flex justify-content-between mb-5">--}}
{{--                @include('layouts.search-component')--}}
{{--                <div class="card-toolbar ms-auto">--}}
{{--                    <div class="dropdown">--}}
{{--                        <a href="#" class="btn btn-primary dropdown-toggle" id="dropdownMenuButton"--}}
{{--                           data-bs-toggle="dropdown"--}}
{{--                           aria-haspopup="true" aria-expanded="false">{{ __('messages.common.actions') }}--}}
{{--                        </a>--}}
{{--                        <ul class="dropdown-menu action-dropdown" aria-labelledby="dropdownMenuButton">--}}
{{--                            <li>--}}
{{--                                <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#addModal"--}}
{{--                                   class="dropdown-item  px-5">{{ __('messages.postal.new_dispatch') }}</a>--}}
{{--                            </li>--}}
{{--                            <li>--}}
{{--                                <a href="{{ route('dispatches.excel') }}"--}}
{{--                                   class="dropdown-item  px-5">{{ __('messages.common.export_to_excel') }}</a>--}}
{{--                            </li>--}}
{{--                        </ul>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
            <livewire:postal-dispatch-table/>
            {{Form::hidden('add_postal_dispatch_modal','#add_postal_dispatch_modal',['class'=>'add_modal'])}}
            {{Form::hidden('edit_postal_dispatch_modal','#edit_postal_dispatch_modal',['class'=>'edit_modal'])}}

            {{ Form::hidden('postalUrl', route('dispatches.index'), ['class' => 'postalUrl']) }}
            {{ Form::hidden('ispostal', \App\Models\Postal::POSTAL_DISPATCH, ['class' => 'isPostal']) }}
            {{ Form::hidden('name', __('messages.postal.dispatch'), ['class' => 'name']) }}
            {{ Form::hidden('postalCreateUrl', route('dispatches.store'), ['class' => 'postalCreateUrl']) }}
            {{ Form::hidden('defaultDocumentImageUrl', asset('assets/img/default_image.jpg'), ['class' => 'defaultDocumentImageUrl']) }}
            {{ Form::hidden('download', __('messages.expense.download'), ['class' => 'download']) }}
            {{ Form::hidden('documentError', __('messages.expense.document_error'), ['class' => 'documentError']) }}
            {{ Form::hidden('tableName', '#dispatchesTable', ['class' => 'tableName']) }}
            {{ Form::hidden('hiddenId', '#editDispatchId', ['class' => 'hiddenId']) }}
            {{--            @include('postals.dispatches.table')--}}
            @include('postals.dispatches.add_modal')
            @include('postals.dispatches.edit_modal')
            @include('partials.modal.templates.templates')
        </div>
    </div>
@endsection




{{--let postalUrl = "{{route('dispatches.index')}}";--}}
{{--let ispostal = "{{\App\Models\Postal::POSTAL_DISPATCH}}";--}}
{{--let name = "{{__('messages.postal.dispatch')}}";--}}
{{--let postalCreateUrl = "{{route('dispatches.store')}}";--}}
{{--let defaultDocumentImageUrl = "{{ asset('assets/img/default_image.jpg') }}";--}}
{{--let download = "{{__('messages.expense.download')}}";--}}
{{--let documentError = "{{__('messages.expense.document_error')}}";--}}
{{--let tableName = '#dispatchesTable';--}}
{{--let hiddenId = '#editDispatchId';--}}

{{--    <script src="{{mix('assets/js/postals/postal.js')}}"></script>--}}
{{--    <script src="{{ mix('assets/js/custom/new-edit-modal-form.js') }}"></script>--}}
{{--    <script src="{{ mix('assets/js/custom/delete.js') }}"></script>--}}

