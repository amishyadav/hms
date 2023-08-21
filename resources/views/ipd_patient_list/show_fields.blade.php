<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-xxl-5 col-12">
                <div class="d-sm-flex align-items-center mb-5 mb-xxl-0 text-center text-sm-start">
                    <div class="image image-circle image-small">
                        <img src="{{ $ipdPatientDepartment->patient->patientUser->image_url }}" alt="image"/>
                    </div>
                    <div class="ms-0 ms-sm-10 mt-5 mt-sm-0">
                        <span class="badge bg-light-warning mb-2">{{ !empty($ipdPatientDepartment->ipd_number) ? "#".$ipdPatientDepartment->ipd_number : __('messages.common.n/a') }}</span>
                        <h2><a href="#"
                               class="text-decoration-none">{{ $ipdPatientDepartment->patient->patientUser->full_name }}</a>
                        </h2>
                        <span class="text-gray-600 fs-5">
                            <i class="fa-solid fa-envelope me-1"></i>
                            <a href="mailto:{{ $ipdPatientDepartment->patient->patientUser->email }}"
                               class="text-gray-600 text-decoration-none fs-5">
                                {{ $ipdPatientDepartment->patient->patientUser->email }}
                            </a>
                        </span>
                        <span class="d-flex align-items-start me-sm-5 mb-2 mt-2 text-gray-600 fs-5 justify-content-center justify-content-sm-center">
                            @if(!empty($ipdPatientDepartment->patient->address->address1) || !empty($ipdPatientDepartment->patient->address->address2) || !empty($ipdPatientDepartment->patient->address->city) || !empty($ipdPatientDepartment->patient->address->zip))
                                <i class="fa-solid fa-location-dot text-gray-600 me-3 mt-1"></i>
                            @endif
                            <span class="text-start"> {{ !empty($ipdPatientDepartment->patient->address->address1) ? $ipdPatientDepartment->patient->address->address1 : '' }}{{ !empty($ipdPatientDepartment->patient->address->address2) ? !empty($ipdPatientDepartment->patient->address->address1) ? ',' : '' : '' }}
                                {{ empty($ipdPatientDepartment->patient->address->address1) || !empty($ipdPatientDepartment->patient->address->address2)  ? !empty($ipdPatientDepartment->patient->address->address2) ? $ipdPatientDepartment->patient->address->address2 : '' : '' }}
                                {{!empty($ipdPatientDepartment->address->city) ? ','.$ipdPatientDepartment->address->city : ''}} {{ !empty($ipdPatientDepartment->address->zip) ? ','.$ipdPatientDepartment->address->zip : '' }}
                            </span>
                        </span>
                    </div>
                </div>
            </div>
            <div class="col-xxl-7 col-12">
                <div class="row justify-content-center">
                    <div class="col-md-4 col-sm-6 col-12 mb-6 mb-md-0">
                        <div class="border rounded-10 p-5 h-100">
                            <h2 class="text-primary mb-3">{{ !empty($ipdPatientDepartment->patient->cases) ? $ipdPatientDepartment->patient->cases->count() : 0 }}</h2>
                            <h3 class="fs-5 fw-light text-gray-600 mb-0">{{__('messages.patient.total_cases')}}</h3>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6 col-12 mb-6 mb-md-0">
                        <div class="border rounded-10 p-5 h-100">
                            <h2 class="text-primary mb-3">{{ !empty($ipdPatientDepartment->patient->admissions) ? $ipdPatientDepartment->patient->admissions->count() : 0 }}</h2>
                            <h3 class="fs-5 fw-light text-gray-600 mb-0">{{__('messages.patient.total_admissions')}}</h3>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6 col-12">
                        <div class="border rounded-10 p-5 h-100">
                            <h2 class="text-primary mb-3">{{ !empty($ipdPatientDepartment->patient->appointments) ? $ipdPatientDepartment->patient->appointments->count() : 0 }}</h2>
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
            <button class="nav-link active p-0" id="overview-tab" data-bs-toggle="tab" data-bs-target="#poverview"
                    type="button" role="tab" aria-controls="overview" aria-selected="true">
                {{ __('messages.overview') }}
            </button>
        </li>
        <li class="nav-item position-relative me-7 mb-3" role="presentation">
            <button class="nav-link p-0" id="cases-tab" data-bs-toggle="tab" data-bs-target="#ipdDiagnosis"
                    type="button" role="tab" aria-controls="cases" aria-selected="false">
                {{ __('messages.ipd_diagnosis') }}
            </button>
        </li>
        <li class="nav-item position-relative me-7 mb-3" role="presentation">
            <button class="nav-link p-0" id="patients-tab" data-bs-toggle="tab"
                    data-bs-target="#ipdConsultantInstruction"
                    type="button" role="tab" aria-controls="patients" aria-selected="false">
            {{ __('messages.ipd_consultant_register') }}
        </li>
        <li class="nav-item position-relative me-7 mb-3" role="presentation">
            <button class="nav-link p-0" id="patients-tab" data-bs-toggle="tab" data-bs-target="#ipdCharges"
                    type="button" role="tab" aria-controls="patients" aria-selected="false">
                {{ __('messages.ipd_charges') }}
            </button>
        </li>
        <li class="nav-item position-relative me-7 mb-3" role="presentation">
            <button class="nav-link p-0" id="patients-tab" data-bs-toggle="tab" data-bs-target="#ipdPrescriptions"
                    type="button" role="tab" aria-controls="patients" aria-selected="false">
                {{ __('messages.ipd_prescription') }}
            </button>
        </li>
        <li class="nav-item position-relative me-7 mb-3" role="presentation">
            <button class="nav-link p-0" id="patients-tab" data-bs-toggle="tab" data-bs-target="#ipdTimelines"
                    type="button" role="tab" aria-controls="patients" aria-selected="false">
                {{ __('messages.ipd_timelines') }}
            </button>
        </li>
        <li class="nav-item position-relative me-7 mb-3" role="presentation">
            <button class="nav-link p-0" id="patients-tab" data-bs-toggle="tab" data-bs-target="#ipdPayment"
                    type="button" role="tab" aria-controls="patients" aria-selected="false">
                {{ __('messages.account.payments') }}
            </button>
        </li>
        <li class="nav-item position-relative me-7 mb-3" role="presentation">
            <button class="nav-link p-0" id="patients-tab" data-bs-toggle="tab" data-bs-target="#ipdBill"
                    type="button" role="tab" aria-controls="patients" aria-selected="false">
                {{ __('messages.bills') }}
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
                                   class="pb-2 fs-5 text-gray-600">{{ __('messages.case.case_id').':'  }}</label>
                            <p>
                                <span class="badge bg-light-info">{{ !empty($ipdPatientDepartment->case_id) ? $ipdPatientDepartment->patientCase->case_id : __('messages.common.n/a') }}</span>
                            </p>
                        </div>
                        <div class="col-sm-6 d-flex flex-column mb-md-10 mb-5">
                            <label for="name"
                                   class="pb-2 fs-5 text-gray-600"> {{ __('messages.ipd_patient.height').':'  }}</label>
                            <span class="fs-5 text-gray-800">{{ !empty($ipdPatientDepartment->height) ? $ipdPatientDepartment->height : __('messages.common.n/a') }}</span>
                        </div>
                        <div class="col-sm-6 d-flex flex-column mb-md-10 mb-5">
                            <label for="name"
                                   class="pb-2 fs-5 text-gray-600">{{ __('messages.ipd_patient.weight').':' }}</label>
                            <span class="fs-5 text-gray-800">{{ !empty($ipdPatientDepartment->weight) ? $ipdPatientDepartment->weight : __('messages.common.n/a') }}</span>
                        </div>
                        <div class="col-sm-6 d-flex flex-column mb-md-10 mb-5">
                            <label for="name"
                                   class="pb-2 fs-5 text-gray-600">{{ __('messages.ipd_patient.bp').':' }}</label>
                            <span class="fs-5 text-gray-800">{{ !empty($ipdPatientDepartment->bp) ? $ipdPatientDepartment->bp : __('messages.common.n/a') }}</span>
                        </div>
                        <div class="col-sm-6 d-flex flex-column mb-md-10 mb-5">
                            <label for="name"
                                   class="pb-2 fs-5 text-gray-600">{{ __('messages.ipd_patient.admission_date').':' }}</label>
                            <span class="fs-5 text-gray-800"
                                  title="{{ \Carbon\Carbon::parse($ipdPatientDepartment->admission_date)->diffForHumans() }}">{{ date('jS M, Y h:i A', strtotime($ipdPatientDepartment->admission_date)) }}</span>
                        </div>
                        <div class="col-sm-6 d-flex flex-column mb-md-10 mb-5">
                            <label for="name"
                                   class="pb-2 fs-5 text-gray-600">{{ __('messages.ipd_patient.doctor_id').':' }}</label>
                            <span class="fs-5 text-gray-800">{{ $ipdPatientDepartment->doctor->doctorUser->full_name }}</span>
                        </div>
                        <div class="col-sm-6 d-flex flex-column mb-md-10 mb-5">
                            <label for="name"
                                   class="pb-2 fs-5 text-gray-600">{{ __('messages.ipd_patient.bed_type_id').':' }}</label>
                            <span class="fs-5 text-gray-800">{{ $ipdPatientDepartment->bedType->title }}</span>
                        </div>
                        <div class="col-sm-6 d-flex flex-column mb-md-10 mb-5">
                            <label for="name"
                                   class="pb-2 fs-5 text-gray-600">{{ __('messages.ipd_patient.bed_id').':' }}</label>
                            <span class="fs-5 text-gray-800">{{ $ipdPatientDepartment->bed->name }}</span>
                        </div>
                        <div class="col-sm-6 d-flex flex-column mb-md-10 mb-5">
                            <label for="name"
                                   class="pb-2 fs-5 text-gray-600">{{ __('messages.ipd_patient.is_old_patient').':' }}</label>
                            <span class="fs-5 text-gray-800">{{ ($ipdPatientDepartment->is_old_patient) ? __('messages.common.yes') : __('messages.common.no') }}</span>
                        </div>
                        <div class="col-sm-6 d-flex flex-column mb-md-10 mb-5">
                            <label for="name"
                                   class="pb-2 fs-5 text-gray-600">{{ __('messages.common.created_at').':' }}</label>
                            <span class="fs-5 text-gray-800">{{ !empty($ipdPatientDepartment->created_at) ? $ipdPatientDepartment->created_at->diffForHumans() : __('messages.common.n/a') }}</span>
                        </div>
                        <div class="col-sm-6 d-flex flex-column mb-md-10 mb-5">
                            <label for="name"
                                   class="pb-2 fs-5 text-gray-600">{{ __('messages.common.updated_at').':' }}</label>
                            <span class="fs-5 text-gray-800">{{ !empty($ipdPatientDepartment->updated_at) ? $ipdPatientDepartment->updated_at->diffForHumans() : __('messages.common.n/a') }}</span>
                        </div>
                        <div class="col-sm-6 d-flex flex-column mb-md-10 mb-5">
                            <label for="name"
                                   class="pb-2 fs-5 text-gray-600">{{ __('messages.ipd_patient.symptoms').':' }}</label>
                            <span class="fs-5 text-gray-800">{!!   !empty($ipdPatientDepartment->symptoms)?nl2br(e($ipdPatientDepartment->symptoms)) : __('messages.common.n/a') !!}</span>
                        </div>
                        <div class="col-sm-6 d-flex flex-column mb-md-10 mb-5">
                            <label for="name"
                                   class="pb-2 fs-5 text-gray-600">{{ __('messages.ipd_patient.notes').':' }}</label>
                            <span class="fs-5 text-gray-800">{!! !empty($ipdPatientDepartment->notes)?nl2br(e($ipdPatientDepartment->notes)) : __('messages.common.n/a')  !!}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="tab-pane fade" id="ipdDiagnosis" role="tabpanel" aria-labelledby="cases-tab">
            {{--                    <div class="card-toolbar mt-5">--}}
            {{--                        <div class="d-flex align-items-center py-1">--}}
            {{--                            @include('layouts.search-component')--}}
            {{--                        </div>--}}
            {{--                    </div>--}}
            <livewire:ipd-patient-diagnosis-table ipdPatientDepartment="{{ $ipdPatientDepartment->id }}"/>
            {{--                    @include('ipd_patient_list.ipd_listing_tables.ipd_diagnosis_table')--}}
        </div>
        <div class="tab-pane fade" id="ipdConsultantInstruction" role="tabpanel" aria-labelledby="cases-tab">
            {{--                    <div class="card-toolbar mt-5">--}}
            {{--                        <div class="d-flex align-items-center py-1">--}}
            {{--                            @include('layouts.search-component')--}}
            {{--                        </div>--}}
            {{--                    </div>--}}
            <livewire:ipd-consultant-register-patient-table ipdPatientDepartment="{{ $ipdPatientDepartment->id }}"/>
            {{--                    @include('ipd_patient_list.ipd_listing_tables.ipd_consultant_table')--}}
        </div>
        <div class="tab-pane fade" id="ipdCharges" role="tabpanel" aria-labelledby="cases-tab">
            {{--                    <div class="card-toolbar mt-5">--}}
            {{--                        <div class="d-flex align-items-center py-1">--}}
            {{--                            @include('layouts.search-component')--}}
            {{--                        </div>--}}
            {{--                    </div>--}}
            <livewire:ipd-charge-patient ipdPatientDepartment="{{ $ipdPatientDepartment->id }}"/>
            {{--                    @include('ipd_patient_list.ipd_listing_tables.ipd_charges_table')--}}
        </div>
        <div class="tab-pane fade" id="ipdPrescriptions" role="tabpanel" aria-labelledby="cases-tab">
            {{--                    <div class="card-toolbar mt-5">--}}
            {{--                        <div class="d-flex align-items-center py-1">--}}
            {{--                            @include('layouts.search-component')--}}
            {{--                        </div>--}}
            {{--                    </div>--}}
            <livewire:ipd-prescription-table ipdPrescriptionId="{{ $ipdPatientDepartment->id }}"/>
            {{--                    @include('ipd_patient_list.ipd_listing_tables.ipd_prescriptions_table')--}}
        </div>
        <div class="tab-pane fade" id="ipdTimelines" role="tabpanel" aria-labelledby="cases-tab">
            <div id="ipdTimelines"></div>
        </div>
        <div class="tab-pane fade" id="ipdPayment" role="tabpanel" aria-labelledby="cases-tab">
            @if($ipdPatientDepartment->bill && $bill['patient_net_payable_amount'] > 0)
                <div class="card-title">
                    <button id="ipdPaymentBtn" class="btn btn-primary filter-container__btn float-end">
                        {{ __('messages.ipd_payments.make_payment') }}
                    </button>
                    <input type="hidden" name="net_payable_amount" id="billAmout"
                           value="{{ $bill['patient_net_payable_amount'] }}"/>
                    <input type="hidden" name="ipd_number" id="ipdNumber"
                           value="{{$ipdPatientDepartment->ipd_number }}"/>
                </div>
            @endif

            <livewire:ipd-payment-table ipdPatientDepartmentId="{{ $ipdPatientDepartment->id }}"/>
        </div>
        <div class="tab-pane fade" id="ipdBill" role="tabpanel" aria-labelledby="cases-tab">
            <div class="card">
                <div class="card-body">
                    @include('ipd_patient_list.ipd_listing_tables.ipd_bills_table')
                </div>
            </div>
        </div>
    </div>

</div>
