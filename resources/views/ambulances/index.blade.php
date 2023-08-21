@extends('layouts.app')
@section('title')
    {{ __('messages.ambulances') }}
@endsection
@section('css')
{{--    <link rel="stylesheet" href="{{ asset('assets/css/sub-header.css') }}">--}}
@endsection
@section('content')
    <div class="container-fluid">
        <div class="d-flex flex-column">
            @include('flash::message')
{{--            <div class="d-sm-flex justify-content-between mb-5">--}}
{{--                @include('layouts.search-component')--}}
{{--                <div class="card-toolbar ms-auto">--}}
{{--                    <div class="d-flex align-items-center py-1">--}}
{{--                        <div class="d-flex align-items-center py-1">--}}
{{--                            <div class="dropdown d-flex align-items-center me-4 me-md-5">--}}
{{--                                <a href="#"--}}
{{--                                   class="btn btn btn-icon btn-primary text-white dropdown-toggle hide-arrow ps-2 pe-0"--}}
{{--                                   data-bs-auto-close="outside"--}}
{{--                                   id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">--}}
{{--                                    <i class='fas fa-filter'></i>--}}
{{--                                </a>--}}
{{--                                <div class="dropdown-menu py-0" aria-labelledby="dropdownMenuButton1">--}}
{{--                                    <div class="text-start border-bottom px-7 py-4">--}}
{{--                                        <div class="text-gray-900 mb-0">{{ __('messages.common.filter_options') }}</div>--}}
{{--                                    </div>--}}
{{--                                    <div class="separator border-gray-200"></div>--}}
{{--                                    <div class="px-7 py-5">--}}
{{--                                        <div class="mb-10">--}}
{{--                                            <label class="form-label fs-6 fw-bold">{{ __('messages.common.status').':' }}</label>--}}
{{--                                            {{Form::select('status', $statusArr,null, ['id' => 'filter_status', 'data-control' =>'select2', 'class' => 'form-control']) }}--}}
{{--                                        </div>--}}
{{--                                        <div class="d-flex justify-content-end">--}}
{{--                                            <button type="reset"--}}
{{--                                                    class="btn btn-secondary"--}}
{{--                                                    id="resetFilter">{{ __('messages.common.reset') }}--}}
{{--                                            </button>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="dropdown">--}}
{{--                            <a href="#" class="btn btn-primary dropdown-toggle" id="dropdownMenuButton"--}}
{{--                               data-bs-toggle="dropdown"--}}
{{--                               aria-haspopup="true" aria-expanded="false">{{ __('messages.common.actions') }}--}}
{{--                            </a>--}}
{{--                            <ul class="dropdown-menu action-dropdown" aria-labelledby="dropdownMenuButton">--}}
{{--                                <li>--}}
{{--                                    <a href="{{ route('ambulances.create') }}" class="dropdown-item  px-5">--}}
{{--                                        {{ __('messages.ambulance.new_ambulance') }}--}}
{{--                                    </a>--}}
{{--                                </li>--}}
{{--                                <li>--}}
{{--                                    <a href="{{ route('ambulance.excel') }}" class="dropdown-item  px-5">--}}
            {{--                                        {{ __('messages.common.export_to_excel') }}--}}
            {{--                                    </a>--}}
            {{--                                </li>--}}
            {{--                            </ul>--}}
            {{--                        </div>--}}
            {{--                    </div>--}}
            {{--                </div>--}}
            {{--            </div>--}}
            {{Form::hidden('ambulanceUrl',url('ambulances'),['id'=>'indexAmbulanceUrl'])}}
            {{ Form::hidden('ambulanceLang', __('messages.delete.ambulance'), ['id' => 'ambulanceLang']) }}
            <livewire:ambulance-table/>
            {{--            @include('ambulances.table')--}}
            @include('ambulances.templates.templates')
            @include('partials.page.templates.templates')
        </div>
    </div>
@endsection
{{--    <script src="{{ asset('assets/js/moment.min.js') }}"></script>--}}
{{--        let ambulanceUrl = "{{ url('ambulances') }}";--}}
{{--    <script src="{{mix('assets/js/ambulances/ambulances.js')}}"></script>--}}
{{--    <script src="{{ mix('assets/js/custom/delete.js') }}"></script>--}}

