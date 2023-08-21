<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-xxl-5 col-12">
                <div class="d-sm-flex align-items-center mb-5 mb-xxl-0 text-center text-sm-start">
                    <div class="image image-circle image-small">
                        <img src="{{$accountant->user->image_url}}" alt="image"/>
                    </div>
                    <div class="ms-0 ms-sm-10 mt-5 mt-sm-0">
                        <span class="badge bg-light-{{ $accountant->user->status === 1 ? 'success' : 'danger' }} mb-2">{{ ($accountant->user->status === 1) ? __('messages.common.active') : __('messages.common.de_active') }}</span>
                        <h2><a href="#" class="text-decoration-none">{{$accountant->user->full_name}}</a></h2>
                        <span class="text-gray-600 fs-5">
                            <i class="fa-solid fa-envelope me-1"></i>
                            <a href="mailto: {{$accountant->user->email}}"
                               class="text-gray-600 text-decoration-none fs-5">
                                {{$accountant->user->email}}
                            </a>
                        </span>
                        <span class="d-flex align-items-start me-sm-5 mb-2 mt-2 text-gray-600 fs-5 justify-content-center justify-content-sm-center">
                            @if(!empty($accountant->address->address1) || !empty($accountant->address->address2) || !empty($accountant->address->city) || !empty($accountant->address->zip))
                                <i class="fa-solid fa-location-dot text-gray-600 me-3 mt-1"></i>
                            @endif
                            <span class="text-start"> {{ !empty($accountant->address->address1) ? $accountant->address->address1 : '' }}{{ !empty($accountant->address->address2) ? !empty($accountant->address->address1) ? ',' : '' : '' }}
                                {{ empty($accountant->address->address1) || !empty($accountant->address->address2)  ? !empty($accountant->address->address2) ? $accountant->address->address2 : '' : '' }}
                                {{!empty($accountant->address->city) ? ','.$accountant->address->city : ''}} {{ !empty($accountant->address->zip) ? ','.$accountant->address->zip : '' }}
                            </span>
                        </span>
                    </div>
                </div>
            </div>
            <div class="col-xxl-7 col-12">
                <div class="row justify-content-center">
                    <div class="col-md-4 col-sm-6 col-12 mb-6 mb-md-0">
                        <div class="border rounded-10 p-5 h-100">
                            <h2 class="text-primary mb-3">{{!empty($doctorData->cases) ? $doctorData->cases->count() : 0}}</h2>
                            <h3 class="fs-5 fw-light text-gray-600 mb-0">{{__('messages.patient.total_cases')}}</h3>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6 col-12 mb-6 mb-md-0">
                        <div class="border rounded-10 p-5 h-100">
                            <h2 class="text-primary mb-3">{{!empty($doctorData->patients) ? $doctorData->patients->count() : 0}}</h2>
                            <h3 class="fs-5 fw-light text-gray-600 mb-0">{{__('messages.patients')}}</h3>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6 col-12">
                        <div class="border rounded-10 p-5 h-100">
                            <h2 class="text-primary mb-3">{{!empty($doctorData->appointments) ? $doctorData->appointments->count() : 0}}</h2>
                            <h3 class="fs-5 fw-light text-gray-600 mb-0">{{__('messages.patient.total_appointments')}}</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="mt-7 overflow-hidden">
    <ul class="nav nav-tabs mb-5 pb-1 overflow-auto flex-nowrap text-nowrap" id="myTab" role="tablist">
        <li class="nav-item position-relative me-7 mb-3" role="presentation">
            <a class="nav-link text-active-primary me-6 active" data-bs-toggle="tab" href="#aoverview">{{ __('messages.overview') }}</a>
        </li>
        <li class="nav-item position-relative me-7 mb-3" role="presentation">
            <a class="nav-link text-active-primary me-6" data-bs-toggle="tab"
               href="#apayrolls">{{__('messages.my_payrolls')}}</a>
        </li>
    </ul>


    <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="aoverview" role="tabpanel">
            <div class="card mb-5 mb-xl-10">
                <div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-6 d-flex flex-column mb-md-10 mb-5">
                                <label class="pb-2 fs-5 text-gray-600">{{ __('messages.user.phone')  }}</label>
                                <div class="col-lg-8">
                                    <span class="fs-5 text-gray-800">{{!empty($accountant->user->phone)?$accountant->user->phone:'N/A'}}</span>
                                </div>
                            </div>
                            <div class="col-sm-6 d-flex flex-column mb-md-10 mb-5">
                                <label class="pb-2 fs-5 text-gray-600">{{ __('messages.user.gender')  }}</label>
                                <div class="col-lg-8">
                                    <span class="fs-5 text-gray-800">{{ $accountant->user->gender == 0 ? 'Male' : 'Female' }}</span>
                                </div>
                            </div>
                            <div class="col-sm-6 d-flex flex-column mb-md-10 mb-5">
                                <label class="pb-2 fs-5 text-gray-600">{{ __('messages.user.blood_group')  }}</label>
                                <div class="col-lg-8">
                                    <span class="fs-6 stext-{{!empty($accountant->user->blood_group) ? 'success' : 'danger'}}">{{ !empty($accountant->user->blood_group) ? $accountant->user->blood_group : __('messages.common.n/a') }}</span>
                                </div>
                            </div>
                            <div class="col-sm-6 d-flex flex-column mb-md-10 mb-5">
                                <label class="pb-2 fs-5 text-gray-600">{{ __('messages.user.dob')  }}</label>
                                <div class="col-lg-8">
                                    <span class="fs-5 text-gray-800">{{ !empty($accountant->user->dob) ? \Carbon\Carbon::parse($accountant->user->dob)->translatedFormat('jS M, Y') : __('messages.common.n/a') }}</span>
                                </div>
                            </div>
                            <div class="col-sm-6 d-flex flex-column mb-md-10 mb-5">
                                <label class="pb-2 fs-5 text-gray-600">{{ __('messages.user.designation')  }}</label>
                                <div class="col-lg-8">
                                <span
                                        class="fs-5 text-gray-800">{{ !empty($accountant->user->designation) ? $accountant->user->designation : __('messages.common.n/a') }}</span>
                                </div>
                            </div>
                            <div class="col-sm-6 d-flex flex-column mb-md-10 mb-5">
                                <label class="pb-2 fs-5 text-gray-600">{{ __('messages.user.qualification')  }}</label>
                                <div class="col-lg-8">
                                <span
                                        class="fs-5 text-gray-800">{{ !empty($accountant->user->qualification) ? $accountant->user->qualification : __('messages.common.n/a')}}</span>
                                </div>
                            </div>
                            <div class="col-sm-6 d-flex flex-column mb-md-10 mb-5">
                                <label class="pb-2 fs-5 text-gray-600">{{ __('messages.common.created_at') }}</label>
                                <div class="col-lg-8">
                                <span
                                        class="fs-5 text-gray-800 me-2">{{ !empty($accountant->user->created_at) ? $accountant->user->created_at->diffForHumans() : __('messages.common.n/a') }}</span>
                                </div>
                            </div>
                            <div class="col-sm-6 d-flex flex-column mb-md-10 mb-5">
                                <label class="pb-2 fs-5 text-gray-600">{{ __('messages.common.updated_at') }}</label>
                                <div class="col-lg-8">
                                <span
                                        class="fs-5 text-gray-800 me-2">{{ !empty($accountant->user->updated_at) ? $accountant->user->updated_at->diffForHumans() : __('messages.common.n/a') }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="tab-pane fade" id="apayrolls" role="tabpanel">
{{--            <h2>{{__('messages.my_payrolls')}}</h2>--}}
            <livewire:accountant-payroll-table accountantId="{{$accountant->id}}"/>
            {{--                    <div class="card-toolbar mt-5">--}}
            {{--                        <div class="d-flex align-items-center py-1 mb-5">--}}
            {{--                            @include('layouts.search-component')--}}
            {{--                            <div class="ms-auto">--}}
            {{--                            </div>--}}
            {{--                        </div>--}}
            {{--                    </div>--}}
            {{--                    <div class="table-responsive">--}}
            {{--                        <table id="accountantPayrolls"--}}
            {{--                               class="table table-striped border-bottom-0">--}}
            {{--                            <thead>--}}
            {{--                            <tr class="text-start text-muted fs-7 text-uppercase gs-0">--}}
            {{--                                <th class="w-10 text-center">{{ __('messages.employee_payroll.payroll_id') }}</th>--}}
            {{--                            <th class="w-10">{{ __('messages.employee_payroll.month') }}</th>--}}
            {{--                            <th class="w-10">{{ __('messages.employee_payroll.year') }}</th>--}}
            {{--                            <th class="w-10 text-right">{{ __('messages.employee_payroll.basic_salary') }}</th>--}}
            {{--                            <th class="w-10 text-right">{{ __('messages.employee_payroll.allowance') }}</th>--}}
            {{--                            <th class="w-10 text-right">{{ __('messages.employee_payroll.deductions') }}</th>--}}
            {{--                            <th class="w-10 text-right">{{ __('messages.employee_payroll.net_salary') }}</th>--}}
            {{--                            <th class="w-10 text-center">{{ __('messages.common.status') }}</th>--}}
            {{--                        </tr>--}}
            {{--                        </thead>--}}
            {{--                        <tbody class="text-gray-600 fw-bold">--}}
            {{--                        @foreach($payrolls as $payroll)--}}
            {{--                            <tr>--}}
            {{--                                <td class="text-center"><a--}}
            {{--                                            href="{{url('employee-payrolls', $payroll->id)}}"><span--}}
            {{--                                                class="badge bg-light-info fs-6">{{ $payroll->payroll_id }}</span></a>--}}
            {{--                                </td>--}}
            {{--                                <td>{{ $payroll->month }}</td>--}}
            {{--                                <td>{{ $payroll->year }}</td>--}}
            {{--                                <td class="text-right">--}}
            {{--                                    <b>{{ getCurrencySymbol() }}</b> {{ number_format($payroll->basic_salary, 2) }}--}}
            {{--                                </td>--}}
            {{--                                <td class="text-right">--}}
            {{--                                    <b>{{ getCurrencySymbol() }}</b> {{ number_format($payroll->allowance, 2) }}--}}
            {{--                                </td>--}}
            {{--                                <td class="text-right">--}}
            {{--                                    <b>{{ getCurrencySymbol() }}</b> {{ number_format($payroll->deductions, 2) }}--}}
            {{--                                </td>--}}
            {{--                                <td class="text-right">--}}
            {{--                                    <b>{{ getCurrencySymbol() }}</b> {{ number_format($payroll->net_salary, 2) }}--}}
            {{--                                </td>--}}
            {{--                                <td class="text-center"><span--}}
            {{--                                            class="badge bg-light-{{($payroll->status == 1  ? 'success' : 'danger')}}">{{ ($payroll->status) ? __('messages.employee_payroll.paid') : __('messages.employee_payroll.not_paid') }}</span>--}}
            {{--                                </td>--}}
            {{--                            </tr>--}}
            {{--                        @endforeach--}}
            {{--                        </tbody>--}}
            {{--                        </table>--}}
            {{--                    </div>--}}
        </div>
    </div>
</div>
