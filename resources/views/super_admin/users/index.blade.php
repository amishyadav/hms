@extends('layouts.app')
@section('title')
    {{ __('messages.hospitals') }}
@endsection
@section('page_css')
{{--    <link rel="stylesheet" href="{{ asset('assets/css/dataTables.css') }}">--}}
{{--    <link rel="stylesheet" href="{{ asset('assets/css/sub-header.css') }}">--}}
@endsection
@section('content')
    {{--    <div class="container-fluid">--}}
    {{--        <div class="d-flex flex-column">--}}
    {{--            <div class="d-sm-flex justify-content-between mb-5">--}}
    {{--                @include('layouts.search-component')--}}
    {{--                <div class="d-flex justify-content-end">--}}
    {{--                    <div class="dropdown d-flex align-items-center me-3 me-md-3">--}}
    {{--                        <a href="#"--}}
    {{--                           class="btn btn btn-icon btn-primary text-white dropdown-toggle hide-arrow ps-2 pe-0"--}}
    {{--                           id="dropdownMenuButton1" data-bs-toggle="dropdown" data-bs-auto-close="outside"--}}
    {{--                           aria-expanded="false">--}}
    {{--                            <i class='fas fa-filter'></i>--}}
    {{--                        </a>--}}
    {{--                        <div class="dropdown-menu py-0" aria-labelledby="dropdownMenuButton1">--}}
    {{--                            <div class="text-start border-bottom py-4 px-7">--}}
    {{--                                <div class="text-gray-900 mb-0">{{ __('messages.common.filter_options') }}</div>--}}
    {{--                                </div>--}}
    {{--                                <div class="separator border-gray-200"></div>--}}
    {{--                                <div class="p-5">--}}
    {{--                                    <div class="mb-5">--}}
    {{--                                        <label--}}
    {{--                                                class="form-label">{{ __('messages.common.status').':' }}</label>--}}
    {{--                                        {{ Form::select('status',['' => 'All'] + $status,null, ['id' => 'statusArr', 'data-control' =>'select2', 'class' => 'form-select form-select-solid status-selector select2-hidden-accessible data-allow-clear="true"']) }}--}}
    {{--                                    </div>--}}
    {{--                                    <div class="d-flex justify-content-end">--}}
    {{--                                        <button type="reset" class="btn btn-secondary text-white"--}}
    {{--                                                id="resetFilter">{{ __('messages.common.reset') }}</button>--}}
    {{--                                    </div>--}}
    {{--                                </div>--}}
    {{--                            </div>--}}
    {{--                    </div>--}}
    {{--                    <a href="{{ route('hospital.create') }}"--}}
    {{--                       class="btn btn-primary">{{__('messages.hospitals_list.add_new_hospital')}}</a>--}}
    {{--                </div>--}}
    {{--            </div>--}}
    {{--        </div>--}}
    {{--        @include('flash::message')--}}
    {{--            @include('super_admin.users.table')--}}
    {{--            @include('super_admin.users.show_modal')--}}
    {{--            @include('super_admin.users.templates.templates')--}}
    {{--        </div>--}}
    {{ Form::hidden('userUrl', route('super.admin.hospitals.index'), ['id' => 'userIndexUrl']) }}
    {{ Form::hidden('showUrl', url('super-admin/hospital'), ['id' => 'userShowUrl']) }}
    {{ Form::hidden('hospitalUrl', route('hospital.index'), ['id' => 'hospitalIndexUrl']) }}
    {{ Form::hidden('isEdit', true, ['class' => 'isEdit']) }}
    {{ Form::hidden('impersonate', __('messages.impersonate'), ['id' => 'impersonate']) }}
    {{ Form::hidden('impersonate-route', url('super-admin/impersonate'), ['id' => 'impersonateRoute']) }}
    {{ Form::hidden('userLang',__('messages.delete.user'), ['id' => 'userLang']) }}
    <div class="container-fluid">
        <div class="d-flex flex-column">
            @include('flash::message')
            <livewire:super-admin-user-table/>
        </div>
        @include('super_admin.users.show_modal')
    </div>
@endsection
{{--    <script src="{{ mix('assets/js/custom/delete.js') }}"></script>--}}
{{--let userUrl = "{{ route('super.admin.hospitals.index') }}"--}}
{{--let showUrl = "{{ url('super-admin/hospital') }}"--}}
{{--let hospitalUrl = "{{route('hospital.index')}}"--}}
{{--let isEdit = true--}}
{{--let impersonate = "{{ __('messages.impersonate') }}"--}}
{{--    <script src="{{mix('assets/js/super_admin/users/user.js')}}"></script>--}}
