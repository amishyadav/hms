<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-xxl-5 col-12">
                <div class="d-sm-flex align-items-center mb-5 mb-xxl-0 text-center text-sm-start">
                    <div class="image image-circle image-small">
                        <img src="{{$users['hospital']->image_url}}" alt="image"/>
                    </div>
                    <div class="ms-0 ms-sm-10 mt-5 mt-sm-0">
                        <span class="badge bg-light-{{  $users['hospital']->status === 1 ? 'success' : 'danger' }} mb-2">{{ ($users['hospital']->status === 1) ? __('messages.common.active') : __('messages.common.de_active') }}</span>
                        <h2><a href="#" class="text-decoration-none">{{ $users['hospital']->full_name }}</a></h2>
                        <span class="text-gray-600 fs-5">
                            <i class="fa-solid fa-envelope me-1"></i>
                            <a href="mailto:{{ $users['hospital']->email }}"
                               class="text-gray-600 text-decoration-none fs-5">
                                {{ $users['hospital']->email }}
                            </a>
                        </span>
                    </div>
                </div>
            </div>
            <div class="col-xxl-7 col-12">
                <div class="row justify-content-center">
                    <div class="col-md-4 col-sm-6 col-12 mb-6 mb-md-0">
                        <div class="border rounded-10 p-5 h-100">
                            <h2 class="text-primary mb-3">{{!empty($users['hospital']->cases) ? $users['hospital']->cases->count() : 0}}</h2>
                            <h3 class="fs-5 fw-light text-gray-600 mb-0">{{__('messages.patient.total_cases')}}</h3>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6 col-12 mb-6 mb-md-0">
                        <div class="border rounded-10 p-5 h-100">
                            <h2 class="text-primary mb-3">{{!empty($users['hospital']->patients) ? $users['hospital']->patients->count() : 0}}</h2>
                            <h3 class="fs-5 fw-light text-gray-600 mb-0">{{__('messages.patients')}}</h3>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6 col-12">
                        <div class="border rounded-10 p-5 h-100">
                            <h2 class="text-primary mb-3">{{!empty($users['hospital']->appointments) ? $users['hospital']->appointments->count() : 0}}</h2>
                            <h3 class="fs-5 fw-light text-gray-600 mb-0">{{__('messages.patient.total_appointments')}}</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="mt-7">
    <ul class="nav nav-tabs mb-5 pb-1 overflow-auto flex-nowrap text-nowrap" id="myTab" role="tablist">
        <li class="nav-item position-relative me-7 mb-3" role="presentation">
            <button class="nav-link active p-0" id="overview-tab" data-bs-toggle="tab" data-bs-target="#poverview"
                    type="button" role="tab" aria-controls="overview" aria-selected="true">
                {{ __('messages.overview') }}
            </button>
        </li>
        <li class="nav-item position-relative me-7 mb-3" role="presentation">
            <button class="nav-link p-0" id="cases-tab" data-bs-toggle="tab" data-bs-target="#husers"
                    type="button" role="tab" aria-controls="cases" aria-selected="false">
                {{ __('messages.users') }}
            </button>
        </li>
        <li class="nav-item position-relative me-7 mb-3" role="presentation">
            <button class="nav-link p-0" id="patients-tab" data-bs-toggle="tab" data-bs-target="#hBillings"
                    type="button" role="tab" aria-controls="patients" aria-selected="false">
                {{ __('messages.billings') }}
            </button>
        </li>
        <li class="nav-item position-relative me-7 mb-3" role="presentation">
            <button class="nav-link p-0" id="patients-tab" data-bs-toggle="tab" data-bs-target="#hTransaction"
                    type="button" role="tab" aria-controls="patients" aria-selected="false">
                {{ __('messages.subscription_plans.transactions') }}
            </button>
        </li>
    </ul>

    <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="poverview" role="tabpanel" aria-labelledby="overview-tab">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-6 d-flex flex-column mb-md-10 mb-5">
                            <label for="name"
                                   class="pb-2 fs-5 text-gray-600">{{ __('messages.hospitals_list.hospital_name').':' }}</label>
                            <span class="fs-5 text-gray-800">{{ $users['hospital']->hospital->hospital_name }}</span>
                        </div>
                        <div class="col-sm-6 d-flex flex-column mb-md-10 mb-5">
                            <label for="name"
                                   class="pb-2 fs-5 text-gray-600">{{ __('messages.user.hospital_slug').':' }}</label>
                            <a href="{{route('front', $users['hospital']->username)}}"
                               class="show-btn text-decoration-none"
                               target="_blank">{{$users['hospital']->username}}
                                <span class="fs-5 text-gray-800 text-primary"><i
                                            class="fas fa-external-link-alt url-external-link"></i></span>
                            </a>
                        </div>
                        <div class="col-sm-6 d-flex flex-column mb-md-10 mb-5">
                            <label for="name"
                                   class="pb-2 fs-5 text-gray-600">{{ __('messages.user.email').':' }}</label>
                            <span class="fs-5 text-gray-800">{{!empty($users['hospital']->email)?($users['hospital']->email):__('messages.common.n/a')}}</span>
                        </div>
                        <div class="col-sm-6 d-flex flex-column mb-md-10 mb-5">
                            <label for="name"
                                   class="pb-2 fs-5 text-gray-600">{{ __('messages.employee_payroll.role').':' }}</label>
                            <span class="fs-5 text-gray-800">{{!empty($users['hospital']->roles[0]->name)?($users['hospital']->roles[0]->name):__('messages.common.n/a')}}</span>
                        </div>
                        <div class="col-sm-6 d-flex flex-column mb-md-10 mb-5">
                            <label for="name"
                                   class="pb-2 fs-5 text-gray-600">{{ __('messages.user.phone').':' }}</label>
                            <span class="fs-5 text-gray-800">{{!empty($users['hospital']->phone)?($users['hospital']->phone):__('messages.common.n/a')}}</span>
                        </div>
                        <div class="col-sm-6 d-flex flex-column mb-md-10 mb-5">
                            <label for="name"
                                   class="pb-2 fs-5 text-gray-600">{{ __('messages.common.created_at').':' }}</label>
                            <span class="fs-5 text-gray-800">{{ !empty($users['hospital']->created_at) ? $users['hospital']->created_at->diffForHumans() : __('messages.common.n/a') }}</span>
                        </div>
                        <div class="col-sm-6 d-flex flex-column mb-md-10 mb-5">
                            <label for="name"
                                   class="pb-2 fs-5 text-gray-600">{{ __('messages.common.updated_at').':' }}</label>
                            <span class="fs-5 text-gray-800">{{ !empty($users['hospital']->updated_at) ? $users['hospital']->updated_at->diffForHumans() : __('messages.common.n/a') }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{--                <div class="tab-pane fade" id="husers" role="tabpanel" aria-labelledby="cases-tab">--}}
        {{--                    <h2>{{ __('messages.users') }}</h2>--}}
        {{--                    <div class="d-sm-flex justify-content-between align-items-center mb-5">--}}
        {{--                        @include('layouts.search-component')--}}
        {{--                            <div class="ms-auto">--}}
        {{--                                <div class="dropdown d-flex align-items-center me-3 me-md-3">--}}
        {{--                                    <a href="#"--}}
        {{--                                       class="btn btn btn-icon btn-primary text-white dropdown-toggle hide-arrow ps-2 pe-0"--}}
        {{--                                       id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false"--}}
        {{--                                       data-bs-auto-close="outside">--}}
        {{--                                        <i class='fas fa-filter'></i>--}}
        {{--                                    </a>--}}
        {{--                                    <div class="dropdown-menu py-0" aria-labelledby="dropdownMenuButton1">--}}
        {{--                                        <div class="text-start border-bottom py-4 px-7">--}}
        {{--                                            <div class="text-gray-900 mb-0">{{ __('messages.common.filter_options') }}</div>--}}
        {{--                                        </div>--}}
        {{--                                        <div class="separator border-gray-200"></div>--}}
        {{--                                        <div class="p-5">--}}
        {{--                                            <div class="mb-5">--}}
        {{--                                                <label class="form-label">{{ __('messages.common.status').':' }}</label>--}}
        {{--                                                {{ Form::select('status', ['' => 'All'] +$users['statusArr'],null, ['id' => 'statusArr', 'data-control' =>'select2', 'class' => 'form-select status-selector select2-hidden-accessible data-allow-clear="true"']) }}--}}
        {{--                                            </div>--}}
        {{--                                            <div class="mb-5">--}}
        {{--                                                <label class="form-label">{{ __('messages.employee_payroll.role').':' }}</label>--}}
        {{--                                                {{ Form::select('department_id', ['' => 'Select Role']+$users['roles'],null, ['id' => 'roleArr', 'data-control' =>'select2', 'class' => 'form-select role-selector',]) }}--}}
        {{--                                            </div>--}}
        {{--                                            <div class="d-flex justify-content-end">--}}
        {{--                                                <button type="reset" class="btn btn-secondary"--}}
        {{--                                                        id="resetFilter">{{ __('messages.common.reset') }}</button>--}}
        {{--                                            </div>--}}
        {{--                                            <input type="hidden" name="hospitalId" id="hospitalId"--}}
        {{--                                                   value="{{$users['hospital']->id}}"/>--}}
        {{--                                        </div>--}}
        {{--                                    </div>--}}
        {{--                                </div>--}}
        {{--                            </div>--}}
        {{--                    </div>--}}
        {{--                    <div class="table-responsive">--}}
        {{--                        <table id="hospitalUser"--}}
        {{--                               class="table table-striped border-bottom-0">--}}
        {{--                            <thead>--}}
        {{--                            <tr class="text-start text-muted fw-bolder fs-7 text-uppercase gs-0">--}}
        {{--                                <th>{{__('messages.users')}}</th>--}}
        {{--                                <th>{{__('messages.employee_payroll.role')}}</th>--}}
        {{--                                <th>{{ __('messages.user.email') }}</th>--}}
        {{--                                <th>{{ __('messages.user.phone') }}</th>--}}
        {{--                                <th>{{ __('messages.common.status') }}</th>--}}
        {{--                                <th>{{ __('messages.common.created_at') }}</th>--}}
        {{--                                <th>{{__('messages.impersonate')}}</th>--}}
        {{--                            </tr>--}}
        {{--                            </thead>--}}
        {{--                            <tbody class="fw-bold">--}}
        {{--                            </tbody>--}}
        {{--                        </table>--}}
        {{--                    </div>--}}
        {{--                </div>--}}
        <div class="tab-pane fade" id="husers" role="tabpanel">
            <livewire:hospital-user-table hospitalId="{{ $users['hospital']->id }}"
                                          hospitalTenantId="{{ $users['hospital']->tenant_id }}"/>
        </div>
        <div class="tab-pane fade" id="hBillings" role="tabpanel">
            <livewire:hospital-bills-table hospitalId="{{ $users['hospital']->id }}"/>
        </div>
        <div class="tab-pane fade" id="hTransaction" role="tabpanel">
            <livewire:hospital-transactions-table hospitalId="{{ $users['hospital']->id }}"/>
        </div>
        {{--                <div class="tab-pane fade" id="hBillings" role="tabpanel" aria-labelledby="patients-tab">--}}
        {{--                    <h2>{{ __('messages.billings') }}</h2>--}}
        {{--                    <div class="d-sm-flex justify-content-between align-items-center mb-5">--}}

        {{--                        <div class="position-relative d-flex width-320">--}}
        {{--                    <span--}}
        {{--                            class="position-absolute d-flex align-items-center top-0 bottom-0 left-0 text-gray-600 ms-3">--}}
        {{--                       <i class="fa-solid fa-magnifying-glass"></i>--}}
        {{--                    </span>--}}
        {{--                            <input type="text" data-datatable-filter="search" id="search-table-billing"--}}
        {{--                                   name="search"--}}
        {{--                                   class="form-control ps-8" placeholder="Search"/>--}}
        {{--                        </div>--}}
        {{--                        <div class="ms-auto">--}}
        {{--                            <div class="dropdown d-flex align-items-center me-3 me-md-3">--}}
        {{--                                <a href="#"--}}
        {{--                                   class="btn btn btn-icon btn-primary text-white dropdown-toggle hide-arrow ps-2 pe-0 mt-2"--}}
        {{--                                   id="dropdownMenuButton1" data-bs-toggle="dropdown" data-bs-auto-close="outside"--}}
        {{--                                   aria-expanded="false">--}}
        {{--                                    <i class='fas fa-filter'></i>--}}
        {{--                                </a>--}}
        {{--                                <div class="dropdown-menu py-0" aria-labelledby="dropdownMenuButton1">--}}
        {{--                                    <div class="text-start border-bottom py-4 px-7">--}}
        {{--                                        <div class="text-gray-900 mb-0">{{ __('messages.common.filter_options') }}</div>--}}
        {{--                                        </div>--}}
        {{--                                        <div class="separator border-gray-200"></div>--}}
        {{--                                        <div class="p-5">--}}
        {{--                                            <div class="mb-5">--}}
        {{--                                                <label class="form-label">{{ __('messages.common.status').':' }}</label>--}}
        {{--                                                {{ Form::select('status', ['' => 'All'] +$users['statusArr'],null, ['id' => 'billingStatusArr', 'data-control' =>'select2', 'class' => 'form-select status-selector select2-hidden-accessible data-allow-clear="true"']) }}--}}
        {{--                                            </div>--}}
        {{--                                            <div class="mb-5">--}}
        {{--                                                <label class="form-label">{{ __('messages.subscription_plans.payment_type').':' }}</label>--}}
        {{--                                                {{ Form::select('status', ['' => 'All'] +$users['paymentType'],null, ['id' => 'billingPaymentType', 'data-control' =>'select2', 'class' => 'form-selects status-selector select2-hidden-accessible data-allow-clear="true"']) }}--}}
        {{--                                            </div>--}}
        {{--                                            <div class="d-flex justify-content-end">--}}
        {{--                                                <button type="reset" class="btn btn-secondary text-white"--}}
        {{--                                                        id="resetFilter">{{ __('messages.common.reset') }}</button>--}}
        {{--                                            </div>--}}
        {{--                                            <input type="hidden" name="hospitalId" id="hospitalId"--}}
        {{--                                                   value="{{$users['hospital']->id}}"/>--}}
        {{--                                        </div>--}}
        {{--                                    </div>--}}
        {{--                                </div>--}}
        {{--                                <input type="hidden" name="hospitalId" id="hospitalBillingId"--}}
        {{--                                       value="{{$users['hospital']->id}}"/>--}}
        {{--                        </div>--}}
        {{--                    </div>--}}
        {{--                    <div class="table-responsive">--}}
        {{--                        <table id="hospitalBilling"--}}
        {{--                               class="table table-striped border-bottom-0">--}}
        {{--                            <thead>--}}
        {{--                            <tr class="text-start text-muted fw-bolder fs-7 text-uppercase gs-0">--}}
        {{--                                <th>{{__('messages.subscription_plans.plan_name')}}</th>--}}
        {{--                                <th>{{__('messages.subscription_plans.transaction')}}</th>--}}
        {{--                                <th>{{__('messages.subscription_plans.amount')}}</th>--}}
        {{--                                <th>{{__('messages.subscription_plans.frequency')}}</th>--}}
        {{--                                <th>{{__('messages.subscription_plans.start_date')}}</th>--}}
        {{--                                <th>{{__('messages.subscription_plans.end_date')}}</th>--}}
        {{--                                <th>{{__('messages.subscription_plans.trail_end_date')}}</th>--}}
        {{--                                <th>{{ __('messages.common.status') }}</th>--}}
        {{--                            </tr>--}}
        {{--                            </thead>--}}
        {{--                            <tbody class="fw-bold">--}}
        {{--                            </tbody>--}}
        {{--                        </table>--}}
        {{--                    </div>--}}
        {{--                </div>--}}
        {{--                <div class="tab-pane fade" id="hTransaction" role="tabpanel" aria-labelledby="appointments-tab">--}}
        {{--                    <h2>{{ __('messages.subscription_plans.transactions') }}</h2>--}}
        {{--                    <div class="d-sm-flex justify-content-between align-items-center mb-5">--}}
        {{--                        <div class="position-relative d-flex width-320">--}}
        {{--                    <span--}}
        {{--                            class="position-absolute d-flex align-items-center top-0 bottom-0 left-0 text-gray-600 ms-3">--}}
        {{--                       <i class="fa-solid fa-magnifying-glass"></i>--}}
        {{--                    </span>--}}
        {{--                            <input type="text" data-datatable-filter="search" id="search-table-transction"--}}
        {{--                                   name="search"--}}
        {{--                                   class="form-control ps-8" placeholder="Search"/>--}}
        {{--                        </div>--}}
        {{--                        <div class="ms-auto">--}}
        {{--                            <div class="dropdown d-flex align-items-center me-3 me-md-3">--}}
        {{--                                <a href="#"--}}
        {{--                                   class="btn btn btn-icon btn-primary text-white dropdown-toggle hide-arrow ps-2 pe-0 mt-2"--}}
        {{--                                   id="dropdownMenuButton1" data-bs-toggle="dropdown" data-bs-auto-close="outside"--}}
        {{--                                   aria-expanded="false">--}}
        {{--                                    <i class='fas fa-filter'></i>--}}
        {{--                                </a>--}}
        {{--                                <div class="dropdown-menu py-0" aria-labelledby="dropdownMenuButton1">--}}
        {{--                                    <div class="text-start border-bottom py-4 px-7">--}}
        {{--                                        <div class="text-gray-900 mb-0">{{ __('messages.common.filter_options') }}</div>--}}
        {{--                                        </div>--}}
        {{--                                        <div class="separator border-gray-200"></div>--}}
        {{--                                        <div class="p-5">--}}
        {{--                                            <div class="mb-5">--}}
        {{--                                                <label class="form-label">{{ __('messages.subscription_plans.payment_type').':' }}</label>--}}
        {{--                                                {{ Form::select('status', ['' => 'All'] +$users['paymentType'],null, ['id' => 'paymentType', 'data-control' =>'select2', 'class' => 'form-select status-selector select2-hidden-accessible data-allow-clear="true"']) }}--}}
        {{--                                            </div>--}}
        {{--                                            <div class="d-flex justify-content-end">--}}
        {{--                                                <button type="reset" class="btn btn-secondary text-white"--}}
        {{--                                                        id="resetFilter">{{ __('messages.common.reset') }}</button>--}}
        {{--                                            </div>--}}
        {{--                                            <input type="hidden" name="hospitalId" id="hospitalId"--}}
        {{--                                                   value="{{$users['hospital']->id}}"/>--}}
        {{--                                        </div>--}}
        {{--                                    </div>--}}
        {{--                                </div>--}}
        {{--                                <input type="hidden" name="hospitalId" id="hospitalTransctionId"--}}
        {{--                                       value="{{$users['hospital']->id}}"/>--}}
        {{--                        </div>--}}
        {{--                    </div>--}}
        {{--                    <div class="table-responsive">--}}
        {{--                        <table id="hospitalTransaction"--}}
        {{--                               class="table table-striped border-bottom-0">--}}
        {{--                            <thead>--}}
        {{--                            <tr class="text-start text-muted fw-bolder fs-7 text-uppercase gs-0">--}}
        {{--                                <th>{{__('messages.subscription_plans.payment')}}</th>--}}
        {{--                                <th>{{__('messages.subscription_plans.amount')}}</th>--}}
        {{--                                <th>{{__('messages.subscription_plans.transaction_date')}}</th>--}}
        {{--                                <th>{{ __('messages.common.status') }}</th>--}}
        {{--                            </tr>--}}
        {{--                            </thead>--}}
        {{--                            <tbody class="fw-bold">--}}
        {{--                            </tbody>--}}
        {{--                        </table>--}}
        {{--                    </div>--}}
        {{--                </div>--}}
    </div>

</div>
