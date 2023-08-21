<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-xxl-5 col-12">
                <div class="d-sm-flex align-items-center mb-5 mb-xxl-0 text-center text-sm-start">
                    <div class="image image-circle image-small">
                        <img src="{{$labTechnician->user->image_url}}" alt="image"/>
                    </div>
                    <div class="ms-0 ms-sm-10 mt-5 mt-sm-0">
                        <span class="badge bg-light-{{ $labTechnician->user->status === 1 ? 'success' : 'danger' }}">{{ ($labTechnician->user->status === 1) ? __('messages.common.active') : __('messages.common.de_active') }}</span>
                        <h2><a href="#" class="text-decoration-none">{{$labTechnician->user->full_name}}</a></h2>
                        <span class="text-gray-600 fs-5">
                            <i class="fa-solid fa-envelope me-1"></i>
                            <a href="mailto:{{$labTechnician->user->email}}"
                               class="text-gray-600 text-decoration-none fs-5">
                                {{$labTechnician->user->email}}
                            </a>
                        </span>
                        <span class="d-flex align-items-start me-sm-5 mb-2 mt-2 text-gray-600 fs-5 justify-content-center justify-content-sm-center">
                            @if(!empty($labTechnician->address->address1) || !empty($labTechnician->address->address2) || !empty($labTechnician->address->city) || !empty($labTechnician->address->zip))
                                <i class="fa-solid fa-location-dot text-gray-600 me-3 mt-1"></i>
                            @endif
                             <span class="text-start"> {{ !empty($labTechnician->address->address1) ? $labTechnician->address->address1 : '' }}{{ !empty($labTechnician->address->address2) ? !empty($labTechnician->address->address1) ? ',' : '' : '' }}
                                 {{ empty($labTechnician->address->address1) || !empty($labTechnician->address->address2)  ? !empty($labTechnician->address->address2) ? $labTechnician->address->address2 : '' : '' }}
                                 {{ empty($labTechnician->address->address1) && empty($labTechnician->address->address2) ? __('messages.common.n/a') : '' }} {{!empty($labTechnician->address->city) ? ','.$labTechnician->address->city : ''}} {{ !empty($labTechnician->address->zip) ? ','.$labTechnician->address->zip : '' }}
                             </span>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="mt-7 overflow-hidden">
    <ul class="nav nav-tabs mb-5 pb-1 overflow-auto flex-nowrap text-nowrap" id="myTab" role="tablist">
        <li class="nav-item position-relative me-7 mb-3" role="presentation">
            <button class="nav-link active p-0" id="overview-tab" data-bs-toggle="tab" data-bs-target="#loverview"
                    type="button" role="tab" aria-controls="overview" aria-selected="true">
                {{ __('messages.overview') }}
            </button>
        </li>
        <li class="nav-item position-relative me-7 mb-3" role="presentation">
            <button class="nav-link p-0" id="cases-tab" data-bs-toggle="tab" data-bs-target="#lpayrolls"
                    type="button" role="tab" aria-controls="cases" aria-selected="false">
                {{__('messages.my_payrolls')}}
            </button>
        </li>
    </ul>


    <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="loverview" role="tabpanel" aria-labelledby="overview-tab">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-6 d-flex flex-column mb-md-10 mb-5">
                            <label for="name"
                                   class="pb-2 fs-5 text-gray-600">{{ __('messages.user.phone')  }}</label>
                            <span class="fs-5 text-gray-800">{{!empty($labTechnician->user->phone)?$labTechnician->user->phone:'N/A'}}</span>
                        </div>
                        <div class="col-sm-6 d-flex flex-column mb-md-10 mb-5">
                            <label for="name"
                                   class="pb-2 fs-5 text-gray-600">{{ __('messages.user.gender')  }}</label>
                            <span class="fs-5 text-gray-800">{{ $labTechnician->user->gender == 0 ? 'Male' : 'Female' }}</span>
                        </div>
                        <div class="col-sm-6 d-flex flex-column mb-md-10 mb-5">
                            <label for="name"
                                   class="pb-2 fs-5 text-gray-600">{{ __('messages.user.blood_group')  }}</label>
                            <p>
                                <span class="fs-6 badge bg-light-{{!empty($labTechnician->user->blood_group) ? 'success' : 'danger'}}">{{ !empty($labTechnician->user->blood_group) ? $labTechnician->user->blood_group : __('messages.common.n/a') }}</span>
                            </p>
                        </div>
                        <div class="col-sm-6 d-flex flex-column mb-md-10 mb-5">
                            <label for="name"
                                   class="pb-2 fs-5 text-gray-600">{{ __('messages.user.dob')  }}</label>
                            <span class="fs-5 text-gray-800">{{ !empty($labTechnician->user->dob) ? \Carbon\Carbon::parse($labTechnician->user->dob)->translatedFormat('jS M, Y') : __('messages.common.n/a') }}</span>
                        </div>
                        <div class="col-sm-6 d-flex flex-column mb-md-10 mb-5">
                            <label for="name"
                                   class="pb-2 fs-5 text-gray-600">{{ __('messages.user.designation')  }}</label>
                            <span
                                    class="fs-5 text-gray-800">{{ !empty($labTechnician->user->designation) ? $labTechnician->user->designation : __('messages.common.n/a') }}</span>
                        </div>
                        <div class="col-sm-6 d-flex flex-column mb-md-10 mb-5">
                            <label for="name"
                                   class="pb-2 fs-5 text-gray-600">{{ __('messages.user.qualification')  }}</label>
                            <span class="fs-5 text-gray-800">{{ !empty($labTechnician->user->qualification) ? $labTechnician->user->qualification : __('messages.common.n/a')}}</span>
                        </div>
                        <div class="col-sm-6 d-flex flex-column mb-md-10 mb-5">
                            <label for="name"
                                   class="pb-2 fs-5 text-gray-600">{{ __('messages.common.created_at').':' }}</label>
                            <span class="fs-5 text-gray-800">{{ !empty($labTechnician->user->created_at) ? $labTechnician->user->created_at->diffForHumans() : __('messages.common.n/a') }}</span>
                        </div>
                        <div class="col-sm-6 d-flex flex-column mb-md-10 mb-5">
                            <label for="name"
                                   class="pb-2 fs-5 text-gray-600">{{ __('messages.common.updated_at').':' }}</label>
                            <span class="fs-5 text-gray-800">{{ !empty($labTechnician->user->updated_at) ? $labTechnician->user->updated_at->diffForHumans() : __('messages.common.n/a') }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="tab-pane fade" id="lpayrolls" role="tabpanel" aria-labelledby="cases-tab">
            <div class="container-fluid">
                <livewire:lab-technician-payroll-table labTechnicianId="{{$labTechnician->id}}"/>
            </div>
{{--            <h2>{{ __('messages.my_payroll.my_payrolls') }}</h2>--}}
            {{--                    <div class="card-toolbar mt-5">--}}
            {{--                        <div class="d-flex align-items-center py-1 mb-5">--}}
            {{--                            @include('layouts.search-component')--}}
            {{--                            <div class="ms-auto">--}}
            {{--                            </div>--}}
            {{--                        </div>--}}
            {{--                    </div>--}}
{{--            <div class="table-responsive">--}}
{{--                <livewire:lab-technician-payroll-table labTechnicianId="{{$labTechnician->id}}"/>--}}
                {{--                        <table id="labTechnicianPayrolls" class="table table-striped border-bottom-0">--}}
                {{--                            <thead>--}}
                {{--                            <tr class="text-start text-muted fw-bolder fs-7 text-uppercase gs-0">--}}
                {{--                                <th class="w-10 text-center">{{ __('messages.employee_payroll.payroll_id') }}</th>--}}
                {{--                                <th class="w-10">{{ __('messages.employee_payroll.month') }}</th>--}}
                {{--                                <th class="w-10">{{ __('messages.employee_payroll.year') }}</th>--}}
                {{--                                <th class="w-10 text-right">{{ __('messages.employee_payroll.basic_salary') }}</th>--}}
                {{--                                <th class="w-10 text-right">{{ __('messages.employee_payroll.allowance') }}</th>--}}
                {{--                                <th class="w-10 text-right">{{ __('messages.employee_payroll.deductions') }}</th>--}}
                {{--                                <th class="w-10 text-right">{{ __('messages.employee_payroll.net_salary') }}</th>--}}
                {{--                                <th class="w-10 text-center">{{ __('messages.common.status') }}</th>--}}
                {{--                            </tr>--}}
                {{--                            </thead>--}}
                {{--                            <tbody class="fw-bold">--}}
                {{--                            @foreach($payrolls as $payroll)--}}
                {{--                                <tr>--}}
                {{--                                    <td class="text-center"><a href="{{url('employee-payrolls', $payroll->id)}}"><span--}}
                {{--                                                    class="badge bg-light-primary fs-6">{{ $payroll->payroll_id }}</span></a>--}}
                {{--                                    </td>--}}
                {{--                                    <td>{{ $payroll->month }}</td>--}}
                {{--                                    <td>{{ $payroll->year }}</td>--}}
                {{--                                    <td class="text-right">--}}
                {{--                                        <b>{{ getCurrencySymbol() }}</b> {{ number_format($payroll->basic_salary, 2) }}--}}
                {{--                                    </td>--}}
                {{--                                    <td class="text-right">--}}
                {{--                                        <b>{{ getCurrencySymbol() }}</b> {{ number_format($payroll->allowance, 2) }}--}}
                {{--                                    </td>--}}
                {{--                                    <td class="text-right">--}}
                {{--                                        <b>{{ getCurrencySymbol() }}</b> {{ number_format($payroll->deductions, 2) }}--}}
                {{--                                    </td>--}}
                {{--                                    <td class="text-right">--}}
                {{--                                        <b>{{ getCurrencySymbol() }}</b> {{ number_format($payroll->net_salary, 2) }}--}}
                {{--                                    </td>--}}
                {{--                                    <td class="text-center"><span--}}
                {{--                                                class="badge fs-6 bg-light-{{($payroll->status == 1) ? 'success' : 'danger'}}">{{ ($payroll->status) ? __('messages.employee_payroll.paid') : __('messages.employee_payroll.not_paid') }}</span>--}}
                {{--                                    </td>--}}
                {{--                                </tr>--}}
                {{--                            @endforeach--}}
                {{--                            </tbody>--}}
                {{--                        </table>--}}
{{--            </div>--}}
        </div>
    </div>
</div>
