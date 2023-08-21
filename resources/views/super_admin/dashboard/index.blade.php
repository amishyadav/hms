@extends('layouts.app')
@section('title')
    {{ __('messages.dashboard.dashboard') }}
@endsection
@section('page_css')
{{--    <link href="{{ mix('assets/css/dashboard.css') }}" rel="stylesheet" type="text/css"/>--}}
@endsection
@section('content')
    {{--    {{Form::hidden('super_admin_dashboard',true,['class'=>'super-admin-dashboard'])}}--}}
    <div class="container-fluid">
        <div class="d-flex flex-column">
            <div class="row">
                <div class="col-12 mb-4">
                    <div class="row">
                        <div class="col-xxl-3 col-xl-4 col-sm-6 widget">
                            <a href="{{route('super.admin.hospitals.index') }}"
                               class="text-decoration-none super-admin-dashboard">
                                <div class="bg-warning shadow-md rounded-10 p-xxl-10 px-5 py-10 d-flex align-items-center justify-content-between my-sm-3 my-2">
                                    <div class="bg-yellow-300 widget-icon rounded-10 me-2 d-flex align-items-center justify-content-center">
                                        <i class="fas fa-hospital fs-1-xl text-white"></i>
                                    </div>
                                    <div class="text-end text-white">

                                        <h2 class="fs-1-xxl fw-bolder text-white">{{formatCurrency($data['users'])}}</h2>
                                        <h3 class="mb-0 fs-5 fw-light text-white">{{ __('messages.dashboard.total_hospitals') }}</h3>

                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-xxl-3 col-xl-4 col-sm-6 widget">
                            <a href="{{ route('subscriptions.transactions.index') }}"
                               class="text-decoration-none">
                                <div class="bg-primary shadow-md rounded-10 p-xxl-10 px-5 py-10 d-flex align-items-center justify-content-between my-sm-3 my-2">
                                    <div class="bg-cyan-300 widget-icon rounded-10 me-2 d-flex align-items-center justify-content-center">
                                        <i class="fas fa-rupee-sign fs-1-xl text-white"></i>
                                    </div>
                                    <div class="text-end text-white">

                                        <h2 class="fs-1-xxl fw-bolder text-white">{{formatCurrency($data['revenue'], 2)}}</h2>
                                        <h3 class="mb-0 fs-5 fw-light text-white">{{ __('messages.dashboard.total_revenue') }}</h3>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-xxl-3 col-xl-4 col-sm-6 widget">
                            <a href="{{ route('super.admin.subscription.plans.index') }}"
                               class="text-decoration-none">
                                <div class="bg-success shadow-md rounded-10 p-xxl-10 px-5 py-10 d-flex align-items-center justify-content-between my-sm-3 my-2">
                                    <div class="bg-green-300 widget-icon rounded-10 me-2 d-flex align-items-center justify-content-center">
                                        <i class="fas fa-toggle-on fs-1-xl text-white"></i>
                                    </div>
                                    <div class="text-end text-white">
                                        <h2 class="fs-1-xxl fw-bolder text-white">{{formatCurrency($data['activeHospitalPlan'])}}</h2>
                                        <h3 class="mb-0 fs-5 fw-light text-white">{{ __('messages.dashboard.total_active_hospital_plan') }}</h3>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-xxl-3 col-xl-4 col-sm-6 widget">
                            <a href="{{ route('super.admin.subscription.plans.index') }}"
                               class="text-decoration-none">
                                <div class="bg-info shadow-md rounded-10 p-xxl-10 px-5 py-10 d-flex align-items-center justify-content-between my-sm-3 my-2">
                                    <div class="bg-blue-300 widget-icon rounded-10 me-2 d-flex align-items-center justify-content-center">
                                        <i class="fas fa-toggle-off fs-1-xl text-white"></i>
                                    </div>
                                    <div class="text-end text-white">
                                        <h2 class="fs-1-xxl fw-bolder text-white">{{ formatCurrency($data['deActiveHospitalPlan'])}}</h2>
                                        <h3 class="mb-0 fs-5 fw-light text-white">{{ __('messages.dashboard.total_expired_hospital_plan') }}</h3>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-lg-12 col-xl-3 col-md-12 col-sm-12">
                    <h1>{{ __('messages.dashboard.income_report') }}</h1>
                </div>
                <div class="col-lg-6 col-xl-3 col-md-6 col-sm-6 ms-auto">
                    <div class="form-group mb-3 d-flex">
                        <a href="javascript:void(0)" class="btn btn-icon btn-primary me-5 ps-3 pe-2"
                           title="Switch Chart">
                                    <span class="m-0 text-center" id="changeChart">
                                        <i class="fas fa-chart-bar fs-1 chart"></i>
                                    </span>
                        </a>
                        <input class="form-control" autocomplete="off"
                               placeholder="{{ __('messages.dashboard.please_select_rang_picker') }}" id="chartFilter"/>
                    </div>
                </div>
            </div>
            <div class="row">
                <div id="hospitalIncomeChart"></div>
            </div>
        </div>
    </div>

@endsection
{{--    <script src="{{ asset('assets/js/plugins/daterangepicker.js') }}"></script>--}}
{{--    <script src="{{ mix('assets/js/super_admin/dashboard/dashboard.js') }}"></script>--}}
