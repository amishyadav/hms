@extends('layouts.app')
@section('title')
    {{ __('messages.account.accounts') }}
@endsection
@section('css')
{{--    <link rel="stylesheet" href="{{ asset('assets/css/sub-header.css') }}">--}}
@endsection
@section('content')
{{--    @include('flash::message')--}}
{{--    <div class="container-fluid">--}}
{{--        <div class="d-flex flex-column">--}}
{{--            <div class="d-sm-flex justify-content-between mb-5">--}}
{{--                @include('layouts.search-component')--}}
{{--                <div class="d-flex justify-content-end">--}}
{{--                    <div class="d-flex align-items-center">--}}
{{--                        <div class="me-0">--}}
{{--                            <div class="dropdown d-flex align-items-center me-2 me-md-5">--}}
{{--                                <a href="#"--}}
{{--                                   class="btn btn btn-icon btn-primary text-white dropdown-toggle hide-arrow ps-2 pe-0"--}}
{{--                                   id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false"--}}
{{--                                   data-bs-auto-close="outside">--}}
{{--                                    <i class='fas fa-filter'></i>--}}
{{--                                </a>--}}
{{--                                <div class="separator border-gray-200"></div>--}}
{{--                                <div class="dropdown-menu py-0" aria-labelledby="dropdownMenuButton1">--}}
{{--                                    <div class="p-5">--}}
{{--                                        <div class="mb-10">--}}
{{--                                            <label class="form-label">{{ __('messages.account.type').':' }}</label>--}}
{{--                                                {{ Form::select('account_type',$typeArr,null,['id'=>'filter_type','data-control' =>'select2', 'class'=>'form-select form-select-solid role-selector']) }}--}}
{{--                                            </div>--}}
{{--                                            <div class="mb-10">--}}
{{--                                                <label class="form-label">{{ __('messages.common.status').':' }}</label>--}}
{{--                                                {{ Form::select('account_status',$statusArr,null, ['id' => 'filter_status', 'data-control' =>'select2', 'class' => 'form-select form-select-solid role-selector']) }}--}}
{{--                                            </div>--}}
{{--                                            <div class="d-flex justify-content-end">--}}
{{--                                                <button type="reset" class="btn btn-secondary"--}}
{{--                                                        id="resetFilter">{{ __('messages.common.reset') }}</button>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <a href="#" class="btn btn-primary" data-bs-toggle="modal"--}}
{{--                               data-bs-target="#AddModal">{{__('messages.account.new_account')}}</a>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            @include('accounts.table')--}}
{{--            @include('accounts.add_modal')--}}
{{--            @include('accounts.edit_modal')--}}
{{--            @include('accounts.templates.templates')--}}
{{--            @include('partials.modal.templates.templates')--}}
{{--        </div>--}}
{{--    </div>--}}


@include('flash::message')
<div class="container-fluid">
    <div class="d-flex flex-column">
        {{Form::Hidden('accountCreateUrl',route('accounts.store'),['id'=>'indexAccountCreateUrl'])}}
        {{Form::Hidden('accountUrl',route('accounts.index'),['class'=>'indexAccountUrl', 'id' => 'indexAccountUrl'])}}
        <livewire:account-table/>
        @include('accounts.add_modal')
        @include('accounts.edit_modal')
        {{--        @include('accounts.templates.templates')--}}
        @include('partials.modal.templates.templates')
        {{ Form::hidden('accountCreateURL', route('accounts.store'), ['id' => 'accountCreateURL']) }}
        {{ Form::hidden('account', __('messages.delete.account'), ['id' => 'account']) }}
        {{ Form::hidden('accountURL', route('accounts.index'), ['id' => 'accountURL']) }}
    </div>
</div>
@endsection
{{--    <script src="{{ mix('assets/js/custom/new-edit-modal-form.js') }}"></script>--}}
{{--    <script src="{{ mix('assets/js/custom/delete.js') }}"></script>--}}
{{--    <script src="{{ mix('assets/js/custom/reset_models.js') }}"></script>--}}
{{--let accountCreateUrl = "{{route('accounts.store')}}";--}}
{{--let accountUrl = "{{route('accounts.index')}}";--}}
{{--    <script src="{{ mix('assets/js/accounts/accounts.js') }}"></script>--}}

