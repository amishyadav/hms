<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-xxl-5 col-12">
                <div class="d-sm-flex align-items-center mb-5 mb-xxl-0 text-center text-sm-start">
                    <div class="image image-circle image-small">
                        <img src="{{ $data->patientUser->image_url }}" alt="image"/>
                    </div>
                    <div class="ms-0 ms-sm-10 mt-5 mt-sm-0">
                        <span class="badge bg-light-{{ $data->patientUser->status === 1 ? 'success' : 'danger' }} mb-2">{{ ($data->patientUser->status === 1) ? __('messages.common.active') : __('messages.common.de_active') }}</span>
                        <h2><a href="#" class="text-decoration-none">{{ $data->patientUser->full_name }}</a></h2>
                        <span class="text-gray-600 fs-5">
                            <i class="fa-solid fa-envelope me-1"></i>
                            <a href="mailto:{{ $data->patientUser->email }}"
                               class="text-gray-600 text-decoration-none fs-5">
                                {{ $data->patientUser->email }}
                            </a>
                        </span>
                        <span class="d-flex align-items-start me-sm-5 mb-2 mt-2 text-gray-600 fs-5 justify-content-center justify-content-sm-center">
                            @if(!empty($data->address->address1) || !empty($data->address->address2) || !empty($data->address->city) || !empty($data->address->zip))
                                <i class="fa-solid fa-location-dot text-gray-600 me-3 mt-1"></i>
                            @endif
                            <span class="text-start"> {{ !empty($data->address->address1) ? $data->address->address1 : '' }}{{ !empty($data->address->address2) ? !empty($data->address->address1) ? ',' : '' : '' }}
                                {{ empty($data->address->address1) || !empty($data->address->address2)  ? !empty($data->address->address2) ? $data->address->address2 : '' : '' }}
                                {{ empty($data->address->address1) && empty($data->address->address2) ? '' : '' }}{{ !empty($data->address->city) ? ','.$data->address->city : '' }}{{ !empty($data->address->zip) ? ','.$data->address->zip : '' }}
                            </span>
                        </span>
                    </div>
                </div>
            </div>
            <div class="col-xxl-7 col-12">
                <div class="row justify-content-center">
                    <div class="col-md-4 col-sm-6 col-12 mb-6 mb-md-0">
                        <div class="border rounded-10 p-5 h-100">
                            <h2 class="text-primary mb-3">{{!empty($data->cases) ? $data->cases->count() : 0}}</h2>
                            <h3 class="fs-5 fw-light text-gray-600 mb-0">{{__('messages.patient.total_cases')}}</h3>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6 col-12 mb-6 mb-md-0">
                        <div class="border rounded-10 p-5 h-100">
                            <h2 class="text-primary mb-3">{{!empty($data->admissions) ? $data->admissions->count() : 0}}</h2>
                            <h3 class="fs-5 fw-light text-gray-600 mb-0">{{__('messages.patient.total_admissions')}}</h3>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6 col-12">
                        <div class="border rounded-10 p-5 h-100">
                            <h2 class="text-primary mb-3">{{!empty($data->appointments) ? $data->appointments->count() : 0}}</h2>
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
            <button class="nav-link active p-0" id="patients-tab" data-bs-toggle="tab" data-bs-target="#poverview"
                    type="button" role="tab" aria-controls="patients" aria-selected="false">
                {{ __('messages.overview') }}
            </button>
        </li>
        <li class="nav-item position-relative me-7 mb-3" role="presentation">
            <button class="nav-link p-0" id="patients-tab" data-bs-toggle="tab" data-bs-target="#pcases"
                    type="button" role="tab" aria-controls="patients" aria-selected="false">
                {{ __('messages.cases') }}
            </button>
        </li>
        <li class="nav-item position-relative me-7 mb-3" role="presentation">
            <button class="nav-link p-0" id="patients-tab" data-bs-toggle="tab" data-bs-target="#padmissions"
                    type="button" role="tab" aria-controls="patients" aria-selected="false">
                {{ __('messages.patient_admissions') }}
            </button>
        </li>
        <li class="nav-item position-relative me-7 mb-3" role="presentation">
            <button class="nav-link p-0" id="patients-tab" data-bs-toggle="tab" data-bs-target="#pappointments"
                    type="button" role="tab" aria-controls="patients" aria-selected="false">
                {{ __('messages.appointments') }}
            </button>
        </li>
        <li class="nav-item position-relative me-7 mb-3" role="presentation">
            <button class="nav-link p-0" id="patients-tab" data-bs-toggle="tab" data-bs-target="#pbills"
                    type="button" role="tab" aria-controls="patients" aria-selected="false">
                {{ __('messages.bills') }}
            </button>
        </li>
        <li class="nav-item position-relative me-7 mb-3" role="presentation">
            <button class="nav-link p-0" id="patients-tab" data-bs-toggle="tab" data-bs-target="#pinvoices"
                    type="button" role="tab" aria-controls="patients" aria-selected="false">
                {{ __('messages.invoices') }}
            </button>
        </li>
        <li class="nav-item position-relative me-7 mb-3" role="presentation">
            <button class="nav-link p-0" id="patients-tab" data-bs-toggle="tab" data-bs-target="#pAdvancedPayments"
                    type="button" role="tab" aria-controls="patients" aria-selected="false">
                {{ __('messages.advanced_payments') }}
            </button>
        </li>
        <li class="nav-item position-relative me-7 mb-3" role="presentation">
            <button class="nav-link p-0" id="patients-tab" data-bs-toggle="tab" data-bs-target="#pDocument"
                    type="button" role="tab" aria-controls="patients" aria-selected="false">
                {{ __('messages.documents') }}
            </button>
        </li>
        <li class="nav-item position-relative me-7 mb-3" role="presentation">
            <button class="nav-link p-0" id="patients-tab" data-bs-toggle="tab" data-bs-target="#pVaccinated"
                    type="button" role="tab" aria-controls="patients" aria-selected="false">
                {{ __('messages.vaccinations') }}
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
                                   class="pb-2 fs-5 text-gray-600">{{ __('messages.user.phone').':' }}</label>
                            <span class="fs-5 text-gray-800">{{ !empty($data->patientUser->phone) ? $data->patientUser->phone :__('messages.common.n/a') }}</span>
                        </div>
                        <div class="col-sm-6 d-flex flex-column mb-md-10 mb-5">
                            <label for="name"
                                   class="pb-2 fs-5 text-gray-600">{{ __('messages.user.gender').':' }}</label>
                            <span class="fs-5 text-gray-800">{{ ($data->patientUser->gender != 1) ? __('messages.user.male') : __('messages.user.female') }}</span>
                        </div>
                        <div class="col-sm-6 d-flex flex-column mb-md-10 mb-5">
                            <label for="name"
                                   class="pb-2 fs-5 text-gray-600">{{ __('messages.user.blood_group').':' }}</label>
                            @if(!empty($data->patientUser->blood_group))
                                <span
                                        class="text-{{ !empty($data->patientUser->blood_group) ? 'success' : 'danger'  }}"> {{ $data->patientUser->blood_group }} </span>
                            @else
                                <span>{{ __('messages.common.n/a')}}</span>
                            @endif
                        </div>
                        <div class="col-sm-6 d-flex flex-column mb-md-10 mb-5">
                            <label for="name"
                                   class="pb-2 fs-5 text-gray-600">{{ __('messages.user.dob') }}</label>
                            <span class="fs-5 text-gray-800">{{ !empty($data->patientUser->dob) ? \Carbon\Carbon::parse($data->patientUser->dob)->translatedFormat('jS M, Y') : __('messages.common.n/a') }}</span>
                        </div>
                        <div class="col-sm-6 d-flex flex-column mb-md-10 mb-5">
                            <label for="name"
                                   class="pb-2 fs-5 text-gray-600">{{ __('messages.common.created_at').':' }}</label>
                            <span class="fs-5 text-gray-800">{{ !empty($data->patientUser->created_at) ? $data->patientUser->created_at->diffForHumans() : __('messages.common.n/a') }}</span>
                        </div>
                        <div class="col-sm-6 d-flex flex-column mb-md-10 mb-5">
                            <label for="name"
                                   class="pb-2 fs-5 text-gray-600">{{ __('messages.common.updated_at').':' }}</label>
                            <span class="fs-5 text-gray-800">{{ !empty($data->patientUser->updated_at) ? $data->patientUser->updated_at->diffForHumans() : __('messages.common.n/a') }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="tab-pane fade" id="pcases" role="tabpanel" aria-labelledby="cases-tab">
            <div class="container-fluid">
                <livewire:patient-case-table patientId="{{ $data->id }}"/>
            </div>
        </div>
        <div class="tab-pane fade" id="padmissions" role="tabpanel" aria-labelledby="patients-tab">
            <div class="container-fluid">
                <livewire:patient-addmission-table patientId="{{ $data->id }}"/>
            </div>
        </div>
        <div class="tab-pane fade" id="pappointments" role="tabpanel" aria-labelledby="appointments-tab">
            <div class="container-fluid">
                <livewire:patient-appointment-table patientId="{{ $data->id }}"/>
            </div>
        </div>
        <div class="tab-pane fade" id="pbills" role="tabpanel" aria-labelledby="cases-tab">
            <div class="container-fluid">
                <livewire:patient-bill-table patientId="{{ $data->id }}"/>
            </div>
        </div>
        <div class="tab-pane fade" id="pinvoices" role="tabpanel" aria-labelledby="cases-tab">
            <div class="container-fluid">
                <livewire:patient-invoice-table patientId="{{ $data->id}}"/>
            </div>
        </div>
        <div class="tab-pane fade" id="pAdvancedPayments" role="tabpanel" aria-labelledby="cases-tab">
            <div class="container-fluid">
                <livewire:patient-advanced-payment-table patient-id="{{ $data->id }}"/>
            </div>
        </div>
        <div class="tab-pane fade" id="pDocument" role="tabpanel" aria-labelledby="cases-tab">
            <div class="container-fluid">
                <livewire:patient-document-table patient-id="{{ $data->id }}"/>
            </div>
        </div>
        <div class="tab-pane fade" id="pVaccinated" role="tabpanel" aria-labelledby="cases-tab">
            <div class="container-fluid">
                <livewire:patient-vaccination-table patient-id="{{ $data->id }}"/>
            </div>
        </div>
    </div>
</div>

{{--                    <div class="card-toolbar mt-5">--}}
{{--                        <div class="d-flex align-items-center mb-5">--}}
{{--                            @include('layouts.search-component-for-detail', ['id' => 1])--}}
{{--                            <div class="ms-auto">--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="table-responsive">--}}
{{--                        <table id="patientCases"--}}
{{--                               class="table table-striped border-bottom-0">--}}
{{--                            <thead>--}}
{{--                            <tr class="text-start text-muted fw-bolder fs-7 text-uppercase gs-0">--}}
{{--                                <th>{{ __('messages.case.case_id') }}</th>--}}
{{--                                <th>{{ __('messages.case.doctor') }}</th>--}}
{{--                                <th>{{ __('messages.case.case_date') }}</th>--}}
{{--                                <th>{{ __('messages.case.fee') }}</th>--}}
{{--                                <th class="text-center">{{ __('messages.common.status') }}</th>--}}
{{--                                @if(!Auth::user()->hasRole('Patient|Doctor|Accountant|Nurse'))--}}
{{--                                    <th class="text-center">{{ __('messages.common.action') }}</th>--}}
{{--                                @endif--}}
{{--                            </tr>--}}
{{--                            </thead>--}}
{{--                            <tbody class="fw-bold">--}}
{{--                            @foreach($data->cases as $case)--}}
{{--                                <tr>--}}
{{--                                    <td>--}}
{{--                                        @if(!Auth::user()->hasRole('Patient|Nurse|Case Manager|Accountant'))--}}
{{--                                            <a href="{{ url('patient-cases', $case->id) }}"><span--}}
{{--                                                        class="badge bg-light-info">{{ $case->case_id }}</span></a>--}}
{{--                                        @else--}}
{{--                                            <span--}}
{{--                                                    class="badge bg-light-info fs-7">{{ $case->case_id }}</span>--}}
{{--                                        @endif--}}
{{--                                    </td>--}}
{{--                                    <td>--}}
{{--                                        <div class="d-flex align-items-center">--}}
{{--                                            @if(Auth::user()->hasRole('Patient|Nurse|Case Manager'))--}}
{{--                                                <div--}}
{{--                                                        class="image image-mini me-3">--}}
{{--                                                    <div>--}}
{{--                                                        <img src="{{ $case->doctor->user->imageUrl }}"--}}
{{--                                                             alt=""--}}
{{--                                                             class="user-img rounded-circle image">--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                                <div class="d-flex flex-column">--}}
{{--                                                            <span--}}
{{--                                                                    class="mb-1">{{ $case->doctor->user->full_name }}</span>--}}
{{--                                                    <span>{{ $case->doctor->user->email }}</span>--}}
{{--                                                </div>--}}
{{--                                            @else--}}
{{--                                                <div--}}
{{--                                                        class="image image-mini me-3">--}}
{{--                                                    <a href="{{ url('doctors',$case->doctor->id) }}">--}}
{{--                                                        <div>--}}
{{--                                                            <img src="{{ $case->doctor->user->imageUrl }}"--}}
{{--                                                                 alt=""--}}
{{--                                                                 class="user-img rounded-circle image">--}}
{{--                                                        </div>--}}
{{--                                                    </a>--}}
{{--                                                </div>--}}
{{--                                                <div class="d-flex flex-column">--}}
{{--                                                    <a href="{{ url('doctors',$case->doctor->id) }}"--}}
{{--                                                       class="mb-1 text-decoration-none">{{ $case->doctor->user->full_name }}</a>--}}
{{--                                                    <span>{{ $case->doctor->user->email }}</span>--}}
{{--                                                </div>--}}
{{--                                            @endif--}}
{{--                                        </div>--}}
{{--                                    </td>--}}
{{--                                    <td class="word-nowrap">--}}
{{--                                        <div class="badge bg-light-info">--}}
{{--                                            <div class="mb-2">{{ \Carbon\Carbon::parse($case->date)->format('g:i A') }}</div>--}}
{{--                                            <div>{{ \Carbon\Carbon::parse($case->date)->format('jS M, Y') }}</div>--}}
{{--                                        </div>--}}
{{--                                    </td>--}}
{{--                                    <td class="text-right word-nowrap">--}}
{{--                                        <b>{{ getCurrencySymbol() }}</b> {{ number_format($case->fee, 2) }}--}}
{{--                                    </td>--}}
{{--                                    <td class="text-center">--}}
{{--                                        @if($case->status)--}}
{{--                                            <span--}}
{{--                                                    class="badge bg-light-success">{{__('messages.common.active')}}</span>--}}
{{--                                        @else--}}
{{--                                            <span--}}
{{--                                                    class="badge bg-light-danger">{{ __('messages.common.de_active') }}</span>--}}
{{--                                        @endif--}}
{{--                                    </td>--}}
{{--                                    @if(!Auth::user()->hasRole('Patient|Doctor|Accountant|Nurse'))--}}
{{--                                        <td class="text-center">@include('layouts.action-component-for-detail', ['id' => $case->id, 'url' => route('patient-cases.edit', $case->id), 'deleteUrl' => url('patient-cases'), 'message' => 'Case'])</td>--}}
{{--                                    @endif--}}
{{--                                </tr>--}}
{{--                            @endforeach--}}
{{--                            </tbody>--}}
{{--                        </table>--}}
{{--                    </div>--}}

{{--                    <h2>{{ __('messages.patient_admissions') }}</h2>--}}
{{--                    <livewire:patient-addmission-table patientId="{{ $data->id }}"/>--}}
{{--                    <div class="card-toolbar mt-5">--}}
{{--                        <div class="d-flex align-items-center mb-5">--}}
{{--                            @include('layouts.search-component-for-detail', ['id' => 2])--}}
{{--                            <div class="ms-auto">--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="table-responsive">--}}
{{--                        <table id="patientAdmissions"--}}
{{--                               class="table table-striped border-bottom-0">--}}
{{--                            <thead>--}}
{{--                            <tr class="text-start text-muted fw-bolder fs-7 text-uppercase gs-0">--}}
{{--                                <th class="w-10">{{ __('messages.bill.admission_id') }}</th>--}}
{{--                                <th class="w-10">{{ __('messages.patient_admission.doctor') }}</th>--}}
{{--                                <th class="w-10">{{ __('messages.patient_admission.admission_date') }}</th>--}}
{{--                                <th class="w-10">{{ __('messages.patient_admission.discharge_date') }}</th>--}}
{{--                                <th class="w-10 text-center">{{ __('messages.common.status') }}</th>--}}
{{--                                @if(!Auth::user()->hasRole('Patient|Doctor|Accountant|Nurse'))--}}
{{--                                    <th class="text-center">{{ __('messages.common.action') }}</th>--}}
{{--                                @endif--}}
{{--                            </tr>--}}
{{--                            </thead>--}}
{{--                            <tbody class="fw-bold">--}}
{{--                            @foreach($data->admissions as $admission)--}}
{{--                                <tr>--}}
{{--                                    <td>--}}
{{--                                        @if(Auth::user()->hasRole('Admin|Doctor|Case Manager'))--}}
{{--                                            <a href="{{ url('patient-admissions',$admission->id) }}"><span--}}
{{--                                                        class="badge bg-light-info">{{ $admission->patient_admission_id }}</span></a>--}}
{{--                                        @else--}}
{{--                                            <span--}}
{{--                                                    class="badge bg-light-info">{{ $admission->patient_admission_id }}</span>--}}
{{--                                        @endif--}}
{{--                                    </td>--}}
{{--                                    <td>--}}
{{--                                        <div class="d-flex align-items-center">--}}
{{--                                            @if(Auth::user()->hasRole('Patient|Nurse|Case Manager'))--}}
{{--                                                <div--}}
{{--                                                        class="image image-mini me-3">--}}
{{--                                                    <div>--}}
{{--                                                        <img src="{{ $admission->doctor->user->imageUrl }}"--}}
{{--                                                             alt=""--}}
{{--                                                             class="user-img rounded-circle image">--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                                <div class="d-flex flex-column">--}}
{{--                                                            <span--}}
{{--                                                                    class="mb-1">{{ $admission->doctor->user->full_name }}</span>--}}
{{--                                                    <span>{{ $admission->doctor->user->email }}</span>--}}
{{--                                                </div>--}}
{{--                                            @else--}}
{{--                                                <div--}}
{{--                                                        class="image image-mini me-3">--}}
{{--                                                    <a href="{{ url('doctors',$admission->doctor->id) }}">--}}
{{--                                                        <div>--}}
{{--                                                            <img--}}
{{--                                                                    src="{{ $admission->doctor->user->imageUrl }}"--}}
{{--                                                                    alt=""--}}
{{--                                                                    class="user-img rounded-circle image">--}}
{{--                                                        </div>--}}
{{--                                                    </a>--}}
{{--                                                </div>--}}
{{--                                                <div class="d-flex flex-column">--}}
{{--                                                    <a href="{{ url('doctors',$admission->doctor->id) }}"--}}
{{--                                                       class="mb-1 text-decoration-none">{{ $admission->doctor->user->full_name }}</a>--}}
{{--                                                    <span>{{ $admission->doctor->user->email }}</span>--}}
{{--                                                </div>--}}
{{--                                            @endif--}}
{{--                                        </div>--}}
{{--                                    </td>--}}
{{--                                    <td>--}}
{{--                                        <div class="badge bg-light-info">--}}
{{--                                            <div class="mb-2">{{ \Carbon\Carbon::parse($admission->admission_date)->format('g:i A') }}</div>--}}
{{--                                            <div>{{ \Carbon\Carbon::parse($admission->admission_date)->format('jS M, Y') }}</div>--}}
{{--                                        </div>--}}
{{--                                    </td>--}}
{{--                                    <td>--}}
{{--                                        @if(!empty($admission->discharge_date))--}}
{{--                                            <div class="badge bg-light-info">--}}
{{--                                                <div class="mb-2">{{ \Carbon\Carbon::parse($admission->discharge_date)->format('g:i A') }}</div>--}}
{{--                                                <div>{{ \Carbon\Carbon::parse($admission->discharge_date)->format('jS M, Y') }}</div>--}}
{{--                                            </div>--}}
{{--                                        @else--}}
{{--                                            N/A--}}
{{--                                        @endif--}}
{{--                                    </td>--}}
{{--                                    <td class="text-center">--}}
{{--                                        @if($admission->status)--}}
{{--                                            <span--}}
{{--                                                    class="badge bg-light-success">{{__('messages.common.active')}} </span>--}}
{{--                                        @else--}}
{{--                                            <span--}}
{{--                                                    class="badge bg-light-danger">{{__('messages.common.de_active') }}</span>@endif--}}
{{--                                    </td>--}}
{{--                                    @if(!Auth::user()->hasRole('Patient|Doctor|Accountant|Nurse'))--}}
{{--                                        <td class="text-center">@include('layouts.action-component-for-detail', ['id' => $admission->id, 'url' => route('patient-admissions.edit', $admission->id), 'deleteUrl' => url('patient-admissions'), 'message' => 'patient Admissions'])</td>--}}
{{--                                    @endif--}}
{{--                                </tr>--}}
{{--                            @endforeach--}}
{{--                            </tbody>--}}
{{--                        </table>--}}
{{--                    </div>--}}


{{--                    <div class="card-toolbar mt-5">--}}
{{--                        <div class="d-flex align-items-center mb-5">--}}
{{--                            @include('layouts.search-component-for-detail', ['id' => 3])--}}
{{--                            <div class="ms-auto">--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="table-responsive">--}}
{{--                        <table id="patientAppointments"--}}
{{--                               class="table table-striped border-bottom-0">--}}
{{--                            <thead>--}}
{{--                            <tr class="text-start text-muted fw-bolder fs-7 text-uppercase gs-0">--}}
{{--                                <th>{{ __('messages.appointment.doctor') }}</th>--}}
{{--                                <th>{{ __('messages.appointment.doctor_department') }}</th>--}}
{{--                                <th>{{ __('messages.appointment.date') }}</th>--}}
{{--                                @if(!Auth::user()->hasRole('Patient|Doctor|Accountant|Case Manager'))--}}
{{--                                    <th class="text-center">{{ __('messages.common.action') }}</th>--}}
{{--                                @endif--}}
{{--                            </tr>--}}
{{--                            </thead>--}}
{{--                            <tbody class="fw-bold">--}}
{{--                            @foreach($data->appointments as $appointment)--}}
{{--                                <tr>--}}
{{--                                    <td>--}}
{{--                                        <div class="d-flex align-items-center">--}}
{{--                                            @if(Auth::user()->hasRole('Admin|Doctor|Lab Technician|Pharmacist|Accountant'))--}}
{{--                                                <div--}}
{{--                                                        class="image image-mini me-3">--}}
{{--                                                    <a href="{{ url('employee/doctor',$appointment->doctor->id) }}">--}}
{{--                                                        <div>--}}
{{--                                                            <img--}}
{{--                                                                    src="{{ $appointment->doctor->user->imageUrl }}"--}}
{{--                                                                    alt=""--}}
{{--                                                                    class="user-img rounded-circle image">--}}
{{--                                                        </div>--}}
{{--                                                    </a>--}}
{{--                                                </div>--}}
{{--                                                <div class="d-flex flex-column">--}}
{{--                                                    <a href="{{ url('employee/doctor',$appointment->doctor->id) }}"--}}
{{--                                                       class="mb-1 text-decoration-none">{{ $appointment->doctor->user->full_name }}</a>--}}
{{--                                                    <span>{{ $appointment->doctor->user->email }}</span>--}}
{{--                                                </div>--}}
{{--                                            @else--}}
{{--                                                <div--}}
{{--                                                        class="image image-mini me-3">--}}
{{--                                                    <div>--}}
{{--                                                        <img--}}
{{--                                                                src="{{ $appointment->doctor->user->imageUrl }}"--}}
{{--                                                                alt=""--}}
{{--                                                                class="user-img rounded-circle image">--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                                <div class="d-flex flex-column">--}}
{{--                                                            <span--}}
{{--                                                                    class="mb-1">{{ $appointment->doctor->user->full_name }}</span>--}}
{{--                                                    <span>{{ $appointment->doctor->user->email }}</span>--}}
{{--                                                </div>--}}
{{--                                            @endif--}}
{{--                                        </div>--}}
{{--                                    </td>--}}
{{--                                    <td>{{ $appointment->doctor->department->title }}</td>--}}
{{--                                    <td>--}}
{{--                                        <div class="badge bg-light-info">--}}
{{--                                            <div class="mb-2">{{ \Carbon\Carbon::parse($appointment->opd_date)->format('g:i A') }}</div>--}}
{{--                                            <div>{{ \Carbon\Carbon::parse($appointment->opd_date)->format('jS M, Y') }}</div>--}}
{{--                                        </div>--}}
{{--                                    </td>--}}
{{--                                    @if(!Auth::user()->hasRole('Patient|Doctor|Accountant|Case Manager'))--}}
{{--                                        <td class="text-center">@include('layouts.action-component-for-detail', ['id' => $appointment->id, 'url' => route('appointments.edit', $appointment->id), 'deleteUrl' => url('appointments'), 'message' => 'Appointment'])</td>--}}
{{--                                    @endif--}}
{{--                                </tr>--}}
{{--                            @endforeach--}}
{{--                            </tbody>--}}
{{--                        </table>--}}
{{--                    </div>--}}


{{--                    <div class="card-toolbar mt-5">--}}
{{--                        <div class="d-flex align-items-center mb-5">--}}
{{--                            @include('layouts.search-component-for-detail', ['id' => 4])--}}
{{--                            <div class="ms-auto">--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="table-responsive">--}}
{{--                        <table id="patientBills"--}}
{{--                               class="table table-striped border-bottom-0">--}}
{{--                            <thead>--}}
{{--                            <tr class="text-start text-muted fw-bolder fs-7 text-uppercase gs-0">--}}
{{--                                <th>{{ __('messages.bill.bill_id') }}</th>--}}
{{--                                <th>{{ __('messages.bill.bill_date') }}</th>--}}
{{--                                <th>{{ __('messages.bill.amount') }}</th>--}}
{{--                                @if(!Auth::user()->hasRole('Patient|Doctor|Case Manager|Nurse|Receptionist'))--}}
{{--                                    <th class="text-center">{{ __('messages.common.action') }}</th>--}}
{{--                                @endif--}}
{{--                            </tr>--}}
{{--                            </thead>--}}
{{--                            <tbody class="fw-bold">--}}
{{--                            @foreach($data->bills as $bill)--}}
{{--                                <tr>--}}
{{--                                    <td>--}}
{{--                                        @if(Auth::user()->hasRole('Admin|Patient'))--}}
{{--                                            <a href="{{ url('employee/bills',$bill->id) }}">--}}
{{--                                                <span class="badge bg-light-primary">{{ $bill->patient_admission_id }}</span></a>--}}
{{--                                        @elseif(Auth::user()->hasRole('Accountant'))--}}
{{--                                            <a href="{{ url('bills',$bill->id) }}">--}}
{{--                                                            <span--}}
{{--                                                                    class="badge bg-light-primary">{{ $bill->patient_admission_id }}</span></a>--}}
{{--                                        @else--}}
{{--                                            <span--}}
{{--                                                    class="badge bg-light-primary">{{ $bill->patient_admission_id }}</span>--}}
{{--                                        @endif--}}
{{--                                    </td>--}}
{{--                                    <td>--}}
{{--                                        <div class="badge bg-light-info">--}}
{{--                                            <div class="mb-2">{{ \Carbon\Carbon::parse($bill->bill_date)->format('g:i A') }}</div>--}}
{{--                                            <div>{{ \Carbon\Carbon::parse($bill->bill_date)->format('jS M, Y') }}</div>--}}
{{--                                        </div>--}}
{{--                                    </td>--}}
{{--                                    <td class="text-start">--}}
{{--                                        <b>{{ getCurrencySymbol() }}</b>{{ number_format($bill->amount, 2) }}--}}
{{--                                    </td>--}}
{{--                                    @if(!Auth::user()->hasRole('Patient|Doctor|Case Manager|Nurse|Receptionist'))--}}
{{--                                        <td class="text-center">@include('layouts.action-component-for-detail', ['id' => $bill->id, 'url' => route('bills.edit', $bill->id), 'deleteUrl' => url('bills'), 'message' => 'Bill'])</td>--}}
{{--                                    @endif--}}
{{--                                </tr>--}}
{{--                            @endforeach--}}
{{--                            </tbody>--}}
{{--                        </table>--}}
{{--                    </div>--}}


{{--                    <div class="card-toolbar mt-5">--}}
{{--                        <div class="d-flex align-items-center mb-5">--}}
{{--                            @include('layouts.search-component-for-detail', ['id' => 5])--}}
{{--                            <div class="ms-auto">--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="table-responsive">--}}
{{--                        <table id="patientInvoices" class="table table-striped border-bottom-0">--}}
{{--                            <thead>--}}
{{--                            <tr class="text-start text-muted fw-bolder fs-7 text-uppercase gs-0">--}}
{{--                                <th>{{ __('Invoice Id') }}</th>--}}
{{--                                <th class="text-center">{{ __('messages.invoice.invoice_date') }}</th>--}}
{{--                                <th class="text-center">{{ __('messages.common.status') }}</th>--}}
{{--                                <th class="text-center">{{ __('messages.invoice.amount') }}</th>--}}
{{--                                @if(!Auth::user()->hasRole('Patient|Doctor|Case Manager|Nurse|Receptionist'))--}}
{{--                                    <th class="w-25 text-center">{{ __('messages.common.action') }}</th>--}}
{{--                                @endif--}}
{{--                            </tr>--}}
{{--                            </thead>--}}
{{--                            <tbody class="fw-bold">--}}
{{--                            @foreach($data->invoices as $invoice)--}}
{{--                                <tr>--}}
{{--                                    <td>--}}
{{--                                        @if(!Auth::user()->hasRole('Case Manager|Doctor|Nurse|Patient|Receptionist'))--}}
{{--                                            <a href="{{url('invoices', $invoice->id)}}"><span--}}
{{--                                                        class="badge bg-light-primary">{{$invoice->invoice_id}}</span></a>--}}
{{--                                        @else--}}
{{--                                            <span class="badge bg-light-primary">{{$invoice->invoice_id}}</span>--}}
{{--                                        @endif--}}

{{--                                    </td>--}}
{{--                                    <td class="text-center">--}}
{{--                                        @if(Auth::user()->hasRole('Admin|Patient'))--}}
{{--                                            <a href="{{ url('employee/invoices',$invoice->id) }}">--}}
{{--                                                <div class="badge bg-light-info">--}}
{{--                                                    <div class="mb-2">{{ \Carbon\Carbon::parse($invoice->invoice_date)->format('g:i A') }}</div>--}}
{{--                                                    <div>{{ \Carbon\Carbon::parse($invoice->invoice_date)->format('jS M, Y') }}</div>--}}
{{--                                                </div>--}}
{{--                                            </a>--}}
{{--                                        @elseif(Auth::user()->hasRole('Accountant'))--}}
{{--                                            <a href="{{ url('invoices',$invoice->id) }}">--}}
{{--                                                <div class="badge bg-light-info">--}}
{{--                                                    <div class="mb-2">{{ \Carbon\Carbon::parse($invoice->invoice_date)->format('g:i A') }}</div>--}}
{{--                                                    <div>{{ \Carbon\Carbon::parse($invoice->invoice_date)->format('jS M, Y') }}</div>--}}
{{--                                                </div>--}}
{{--                                            </a>--}}
{{--                                        @else--}}
{{--                                            <div class="badge bg-light-info">--}}
{{--                                                <div class="mb-2">{{ \Carbon\Carbon::parse($invoice->invoice_date)->format('g:i A') }}</div>--}}
{{--                                                <div>{{ \Carbon\Carbon::parse($invoice->invoice_date)->format('jS M, Y') }}</div>--}}
{{--                                            </div>--}}
{{--                                        @endif--}}
{{--                                    </td>--}}
{{--                                    <td class="text-center">--}}
{{--                                        @if($invoice->status)--}}
{{--                                            <span class="badge bg-light-success">{{__('messages.invoice.paid')}}</span>--}}
{{--                                        @else--}}
{{--                                            <span class="badge bg-light-danger">{{__('messages.invoice.not_paid') }}</span>--}}
{{--                                        @endif</td>--}}
{{--                                    <td class="p-0">--}}
{{--                                        <div class="d-flex justify-content-center">--}}
{{--                                            <b>{{ getCurrencySymbol() }}</b> {{ number_format($invoice->amount - ($invoice->amount * $invoice->discount / 100), 2) }}--}}
{{--                                        </div>--}}
{{--                                    </td>--}}
{{--                                    @if(!Auth::user()->hasRole('Patient|Doctor|Case Manager|Nurse|Receptionist'))--}}
{{--                                        <td class="text-center">@include('layouts.action-component-for-detail', ['id' => $invoice->id, 'url' => route('invoices.edit', $invoice->id), 'deleteUrl' => url('invoices'), 'message' => 'Invoice'])</td>--}}
{{--                                    @endif--}}
{{--                                </tr>--}}
{{--                            @endforeach--}}
{{--                            </tbody>--}}
{{--                        </table>--}}
{{--                    </div>--}}


{{--                    <div class="card-toolbar mt-5">--}}
{{--                        <div class="d-flex align-items-center mb-5">--}}
{{--                            @include('layouts.search-component-for-detail', ['id' => 6])--}}
{{--                            <div class="ms-auto">--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="table-responsive">--}}
{{--                        <table id="patientAdvancedPayments"--}}
{{--                               class="table table-striped border-bottom-0">--}}
{{--                            <thead>--}}
{{--                            <tr class="text-start text-muted fw-bolder fs-7 text-uppercase gs-0">--}}
{{--                                <th>{{ __('messages.advanced_payment.receipt_no') }}</th>--}}
{{--                                <th>{{ __('messages.advanced_payment.date') }}</th>--}}
{{--                                <th class="text-center">{{ __('messages.advanced_payment.amount') }}</th>--}}
{{--                                @if(!Auth::user()->hasRole('Patient|Doctor|Accountant|Case Manager|Nurse|Receptionist'))--}}
{{--                                    <th class="text-center">{{ __('messages.common.action') }}</th>--}}
{{--                                @endif--}}
{{--                            </tr>--}}
{{--                            </thead>--}}
{{--                            <tbody class="fw-bold">--}}
{{--                            @foreach($data->advancedpayments as $advancedPayment)--}}
{{--                                <tr>--}}
{{--                                    <td>--}}
{{--                                        @if(!Auth::user()->hasRole('Patient|Nurse|Case Manager|Accountant|Doctor|Receptionist'))--}}
{{--                                            <a href="{{url('advanced-payments', $advancedPayment->id)}}"><span--}}
{{--                                                        class="badge bg-light-primary">{{ $advancedPayment->receipt_no }}</span></a>--}}
{{--                                        @else--}}
{{--                                            <span--}}
{{--                                                    class="badge bg-light-primary">{{ $advancedPayment->receipt_no }}</span>--}}
{{--                                        @endif--}}
{{--                                    </td>--}}
{{--                                    <td>--}}
{{--                                        <div class="badge bg-light-info">--}}
{{--                                            <div>{{ \Carbon\Carbon::parse($advancedPayment->date)->format('jS M, Y') }}</div>--}}
{{--                                        </div>--}}
{{--                                    </td>--}}
{{--                                    <td class="text-center">--}}
{{--                                        <b>{{ getCurrencySymbol() }}</b>{{ number_format($advancedPayment->amount, 2) }}--}}
{{--                                    </td>--}}
{{--                                    @if(!Auth::user()->hasRole('Patient|Doctor|Accountant|Case Manager|Nurse|Receptionist'))--}}
{{--                                        <td class="text-center">--}}
{{--                                            <a href="javascript:void(0)"--}}
{{--                                               title="{{ __('messages.common.edit') }}"--}}
{{--                                               class="btn px-2 text-primary fs-3 py-2 edit-advancedPayment-btn"--}}
{{--                                               data-id="{{ $advancedPayment->id }}">--}}
{{--                                                <i class="fa-solid fa-pen-to-square"></i>--}}
{{--                                            </a>--}}
{{--                                            @include('partials.modal.delete_action_component_for_modal', ['id' => $advancedPayment->id, 'deleteUrl' => route('advanced-payments.index'), 'message' => 'Advanced Payment'])--}}
{{--                                        </td>--}}
{{--                                    @endif--}}
{{--                                </tr>--}}
{{--                            @endforeach--}}
{{--                            </tbody>--}}
{{--                        </table>--}}
{{--                    </div>--}}


{{--                    <div class="card-toolbar mt-5">--}}
{{--                        <div class="d-flex align-items-center mb-5">--}}
{{--                            @include('layouts.search-component-for-detail', ['id' => 7])--}}
{{--                            <div class="ms-auto">--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="table-responsive">--}}
{{--                        <table id="patientDocuments"--}}
{{--                               class="table table-striped border-bottom-0">--}}
{{--                            <thead>--}}
{{--                            <tr class="text-start text-muted fw-bolder fs-7 text-uppercase gs-0">--}}
{{--                                <th>{{ __('messages.document.document_type') }}</th>--}}
{{--                                <th>{{ __('messages.document.title') }}</th>--}}
{{--                                @if(!Auth::user()->hasRole('Patient|Doctor|Accountant|Case Manager|Nurse|Receptionist'))--}}
{{--                                    <th class="text-center">{{ __('messages.common.action') }}</th>--}}
{{--                                @endif--}}
{{--                            </tr>--}}
{{--                            </thead>--}}
{{--                            <tbody class="fw-bold">--}}
{{--                            @foreach($data->documents as $document)--}}
{{--                                <tr>--}}
{{--                                    <td>{{$document->documentType->name}}</td>--}}
{{--                                    <td>{{$document->title}}</td>--}}
{{--                                    @if(!Auth::user()->hasRole('Patient|Doctor|Accountant|Case Manager|Nurse|Receptionist'))--}}
{{--                                        <td class="text-center">--}}
{{--                                            @if (!empty($document->document_url))--}}
{{--                                                <a class="btn px-2 text-primary fs-3 py-2"--}}
{{--                                                   href="{{url('document-download',$document->id)}}"><i--}}
{{--                                                            class="fa fa-download" aria-hidden="true"></i></a>--}}
{{--                                            @endif--}}
{{--                                            @include('partials.modal.delete_action_component_for_modal', ['id' => $document->id, 'deleteUrl' => route('documents.index'), 'message' => 'Document'])--}}
{{--                                        </td>--}}
{{--                                    @endif--}}
{{--                                </tr>--}}
{{--                            @endforeach--}}
{{--                            </tbody>--}}
{{--                        </table>--}}
{{--                    </div>--}}


{{--                    <div class="card-toolbar mt-5">--}}
{{--                        <div class="d-flex align-items-center mb-5">--}}
{{--                            @include('layouts.search-component-for-detail', ['id' => 8])--}}
{{--                            <div class="ms-auto">--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="table-responsive">--}}
{{--                        <table id="patientVaccinated"--}}
{{--                               class="table table-striped border-bottom-0">--}}
{{--                            <thead>--}}
{{--                            <tr class="text-start text-muted fw-bolder fs-7 text-uppercase gs-0">--}}
{{--                                <th>{{ __('messages.vaccinated_patient.vaccination_name') }}</th>--}}
{{--                                <th>{{ __('messages.vaccinated_patient.serial_no') }}</th>--}}
{{--                                <th>{{ __('messages.vaccinated_patient.does_no') }}</th>--}}
{{--                                <th>{{ __('messages.vaccinated_patient.dose_given_date') }}</th>--}}
{{--                                @if(!Auth::user()->hasRole('Patient|Doctor|Accountant|Case Manager|Nurse|Receptionist'))--}}
{{--                                    <th class="text-center">{{ __('messages.common.action') }}</th>--}}
{{--                                @endif--}}
{{--                            </tr>--}}
{{--                            </thead>--}}
{{--                            <tbody class="fw-bold">--}}
{{--                            @foreach($data->vaccinations as $vaccination)--}}
{{--                                <tr>--}}
{{--                                    <td class="w-5">{{ $vaccination->vaccination->name }}</td>--}}
{{--                                    <td class="w-10">--}}
{{--                                        @if(!empty($vaccination->vaccination_serial_number))--}}
{{--                                            <span class="badge bg-light-info fs-7">{{$vaccination->vaccination_serial_number}}</span>--}}
{{--                                        @else--}}
{{--                                            <span class="badge bg-light-danger fs-7">{{ __('messages.common.n/a')}}</span>--}}
{{--                                        @endif--}}
{{--                                    </td>--}}
{{--                                    <td class="w-10">--}}
{{--                                        @if(!empty($vaccination->dose_number))--}}
{{--                                            <span class="badge bg-light-info fs-7">{{$vaccination->dose_number}}</span>--}}
{{--                                        @else--}}
{{--                                            <span class="badge bg-light-danger fs-7">{{ __('messages.common.n/a')}}</span>--}}
{{--                                        @endif--}}
{{--                                    </td>--}}
{{--                                    <td>--}}
{{--                                        <div class="badge bg-light-info">--}}
{{--                                            <div class="mb-2">{{ \Carbon\Carbon::parse($vaccination->dose_given_date)->format('g:i A') }}</div>--}}
{{--                                            <div>{{ \Carbon\Carbon::parse($vaccination->dose_given_date)->format('jS M, Y') }}</div>--}}
{{--                                        </div>--}}
{{--                                    </td>--}}
{{--                                    @if(!Auth::user()->hasRole('Patient|Doctor|Accountant|Case Manager|Nurse|Receptionist'))--}}
{{--                                        <td class="text-center">--}}
{{--                                            <a href="javascript:void(0)"--}}
{{--                                               title="{{ __('messages.common.edit') }}"--}}
{{--                                               class="btn px-2 text-primary fs-3 py-2 edit-vaccination-btn"--}}
{{--                                               data-id="{{ $vaccination->id }}">--}}
{{--                                                <i class="fa-solid fa-pen-to-square"></i>--}}
{{--                                            </a>--}}
{{--                                            @include('partials.modal.delete_action_component_for_modal', ['id' => $vaccination->id, 'deleteUrl' => route('vaccinated-patients.index'), 'message' => 'Vaccination'])--}}
{{--                                        </td>--}}
{{--                                    @endif--}}
{{--                                </tr>--}}
{{--                            @endforeach--}}
{{--                            </tbody>--}}
{{--                        </table>--}}
{{--                    </div>--}}
{{--</div>--}}
{{--</div>--}}
