<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-xxl-5 col-12">
                <div class="d-sm-flex align-items-center mb-5 mb-xxl-0 text-center text-sm-start">
                    <div class="image image-circle image-small">
                        <img src="{{$doctorData->doctorUser->image_url}}" alt="image"/>
                    </div>
                    <div class="ms-0 ms-sm-10 mt-5 mt-sm-0">
                        <span class="badge bg-light-{{  $doctorData->doctorUser->status === 1 ? 'success' : 'danger' }} mb-2">{{ ($doctorData->doctorUser->status === 1) ? __('messages.common.active') : __('messages.common.de_active') }}</span>
                        <h2><a href="#" class="text-decoration-none">{{ $doctorData->doctorUser->full_name }}</a></h2>
                        <span class="text-gray-600 fs-5">
                            <i class="fa-solid fa-envelope me-1"></i>
                            <a href="mailto:{{ $doctorData->doctorUser->email }}"
                               class="text-gray-600 text-decoration-none fs-5">
                                {{ $doctorData->doctorUser->email }}
                            </a>
                        </span>
                        <span class="d-flex align-items-start me-sm-5 mb-2 mt-2 text-gray-600 fs-5 justify-content-center justify-content-sm-center">
                            @if(!empty($doctorData->address->address1) || !empty($doctorData->address->address2) || !empty($doctorData->address->city) || !empty($doctorData->address->zip))
                                <i class="fa-solid fa-location-dot text-gray-600 me-3 mt-1"></i>
                            @endif
                            <span class="text-start"> {{ !empty($doctorData->address->address1) ? $doctorData->address->address1 : '' }}{{ !empty($doctorData->address->address2) ? !empty($doctorData->address->address1) ? ',' : '' : '' }}
                            {{ empty($doctorData->address->address1) || !empty($doctorData->address->address2)  ? !empty($doctorData->address->address2) ? $doctorData->address->address2 : '' : '' }}
                            {{ !empty($doctorData->address->city) ? ','.$doctorData->address->city : '' }} {{ !empty($doctorData->address->zip) ? ','. $doctorData->address->zip : '' }}
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
            <button class="nav-link active p-0" id="overview-tab" data-bs-toggle="tab" data-bs-target="#poverview"
                    type="button" role="tab" aria-controls="overview" aria-selected="true">
                {{ __('messages.overview') }}
            </button>
        </li>
        <li class="nav-item position-relative me-7 mb-3" role="presentation">
            <button class="nav-link p-0" id="cases-tab" data-bs-toggle="tab" data-bs-target="#dcases"
                    type="button" role="tab" aria-controls="cases" aria-selected="false">
                {{ __('messages.cases') }}
            </button>
        </li>
        <li class="nav-item position-relative me-7 mb-3" role="presentation">
            <button class="nav-link p-0" id="patients-tab" data-bs-toggle="tab" data-bs-target="#dpatients"
                    type="button" role="tab" aria-controls="patients" aria-selected="false">
                {{ __('messages.patients') }}
            </button>
        </li>
        <li class="nav-item position-relative me-7 mb-3" role="presentation">
            <button class="nav-link p-0" id="patients-tab" data-bs-toggle="tab" data-bs-target="#dappointments"
                    type="button" role="tab" aria-controls="patients" aria-selected="false">
                {{ __('messages.appointments') }}
            </button>
        </li>
        <li class="nav-item position-relative me-7 mb-3" role="presentation">
            <button class="nav-link p-0" id="patients-tab" data-bs-toggle="tab" data-bs-target="#dschedules"
                    type="button" role="tab" aria-controls="patients" aria-selected="false">
                {{ __('messages.schedules') }}
            </button>
        </li>
        <li class="nav-item position-relative me-7 mb-3" role="presentation">
            <button class="nav-link p-0" id="patients-tab" data-bs-toggle="tab" data-bs-target="#dpayroll"
                    type="button" role="tab" aria-controls="patients" aria-selected="false">
                {{ __('messages.my_payrolls') }}
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
                                           class="pb-2 fs-5 text-gray-600">{{ __('messages.user.designation').':' }}</label>
                                    <span class="fs-5 text-gray-800">{{$doctorData->doctorUser->designation ?? __('messages.common.n/a')}}</span>
                                </div>
                                <div class="col-sm-6 d-flex flex-column mb-md-10 mb-5">
                                    <label for="name"
                                           class="pb-2 fs-5 text-gray-600">{{ __('messages.user.phone').':' }}</label>
                                    <span class="fs-5 text-gray-800">{{!empty($doctorData->doctorUser->phone)?($doctorData->doctorUser->phone):__('messages.common.n/a')}}</span>
                                </div>
                                <div class="col-sm-6 d-flex flex-column mb-md-10 mb-5">
                                    <label for="name"
                                           class="pb-2 fs-5 text-gray-600">{{ __('messages.appointment.doctor_department').':' }}</label>
                                    <span class="fs-5 text-gray-800">{{getDoctorDepartment($doctorData->doctor_department_id)}}</span>
                                </div>
                                <div class="col-sm-6 d-flex flex-column mb-md-10 mb-5">
                                    <label for="name"
                                           class="pb-2 fs-5 text-gray-600">{{ __('messages.user.qualification') }}</label>
                                    <span class="fs-5 text-gray-800">{{$doctorData->doctorUser->qualification ?? __('messages.common.n/a')}}</span>
                                </div>
                                <div class="col-sm-6 d-flex flex-column mb-md-10 mb-5">
                                    <label for="name"
                                           class="pb-2 fs-5 text-gray-600">{{ __('messages.user.blood_group').':' }}</label>
                                    @if(!empty($doctorData->doctorUser->blood_group))
                                        <span
                                                class="text-{{ !empty($doctorData->doctorUser->blood_group) ? 'success' : 'danger'  }}"> {{ $doctorData->doctorUser->blood_group }} </span>
                                    @else
                                        <span
                                                class="fs-5 text-gray-800">{{ __('messages.common.n/a')}}</span>
                                    @endif
                                </div>
                                <div class="col-sm-6 d-flex flex-column mb-md-10 mb-5">
                                    <label for="name"
                                           class="pb-2 fs-5 text-gray-600">{{ __('messages.user.dob') }}</label>
                                    <span class="fs-5 text-gray-800">{{ !empty($doctorData->doctorUser->dob) ? \Carbon\Carbon::parse($doctorData->doctorUser->dob)->translatedFormat('jS M, Y') : __('messages.common.n/a')}}</span>
                                </div>
                                <div class="col-sm-6 d-flex flex-column mb-md-10 mb-5">
                                    <label for="name"
                                           class="pb-2 fs-5 text-gray-600">{{ __('messages.doctor.specialist').':' }}</label>
                                    <span class="fs-5 text-gray-800">{{$doctorData->specialist}}</span>
                                </div>
                                <div class="col-sm-6 d-flex flex-column mb-md-10 mb-5">
                                    <label for="name"
                                           class="pb-2 fs-5 text-gray-600">{{ __('messages.user.gender').':' }}</label>
                                    <span class="fs-5 text-gray-800">{{ ($doctorData->doctorUser->gender != 1) ? __('messages.user.male') : __('messages.user.female') }}</span>
                                </div>
                                <div class="col-sm-6 d-flex flex-column mb-md-10 mb-5">
                                    <label for="name"
                                           class="pb-2 fs-5 text-gray-600">{{ __('messages.common.created_at').':' }}</label>
                                    <span class="fs-5 text-gray-800">{{ !empty($doctorData->doctorUser->created_at) ? $doctorData->doctorUser->created_at->diffForHumans() : __('messages.common.n/a') }}</span>
                                </div>
                                <div class="col-sm-6 d-flex flex-column mb-md-10 mb-5">
                                    <label for="name"
                                           class="pb-2 fs-5 text-gray-600">{{ __('messages.common.updated_at').':' }}</label>
                                    <span class="fs-5 text-gray-800">{{ !empty($doctorData->doctorUser->updated_at) ? $doctorData->doctorUser->updated_at->diffForHumans() : __('messages.common.n/a') }}</span>
                                </div>
                            </div>  
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="dcases" role="tabpanel">
                    <div class="container-fluid">
                        <livewire:doctor-cases-table docId="{{$doctorData->id}}"/>
                    </div>
                </div>
                <div class="tab-pane fade" id="dpatients" role="tabpanel">
                    <div class="container-fluid">
                        <livewire:doctor-patient-table docId="{{$doctorData->id}}"/>
                    </div>
                </div>
                <div class="tab-pane fade" id="dappointments" role="tabpanel">
                    <div class="container-fluid">
                        <livewire:doctor-appointment-table docId="{{$doctorData->id}}"/>
                    </div>
                </div>
                <div class="tab-pane fade" id="dschedules" role="tabpanel">
                    <div class="container-fluid">
                        <livewire:doctor-schedule-table docId="{{$doctorData->id}}"/>
                    </div>
                </div>
                <div class="tab-pane fade" id="dpayroll" role="tabpanel">
                    <div class="container-fluid">
                        <livewire:doctor-payroll-table docId="{{$doctorData->id}}"/>
                    </div>
                </div>
                {{--                <div class="tab-pane fade" id="dcases" role="tabpanel" aria-labelledby="cases-tab">--}}
                {{--                    <h2>{{ __('messages.cases') }}</h2>--}}
                {{--                        <div class="d-flex align-items-center py-1 mb-5">--}}
                {{--                            @include('layouts.search-component-for-detail', ['id' => 1])--}}
                {{--                            <div class="ms-auto">--}}
                {{--                            </div>--}}
                {{--                        </div>--}}
                {{--                    <div class="table-responsive">--}}
                {{--                        <table id="doctorCases"--}}
                {{--                               class="table table-striped border-bottom-0">--}}
                {{--                            <thead>--}}
                {{--                            <tr class="text-start text-muted fw-bolder fs-7 text-uppercase gs-0">--}}
                {{--                                <th>{{ __('messages.case.case_id') }}</th>--}}
                {{--                            <th>{{ __('messages.case.patient') }}</th>--}}
                {{--                                                                        <th class="w-25">{{ __('messages.case.description') }}</th>--}}
                {{--                            <th>{{ __('messages.case.phone') }}</th>--}}
                {{--                            <th>{{ __('messages.case.case_date') }}</th>--}}
                {{--                            <th>{{ __('messages.case.fee') }}</th>--}}
                {{--                            <th>{{ __('messages.common.status') }}</th>--}}
                {{--                        </tr>--}}
                {{--                        </thead>--}}
                {{--                        <tbody class="fw-bold">--}}
                {{--                        @foreach($doctorData->cases as $case)--}}
                {{--                            <tr>--}}
                {{--                                <td><span--}}
                {{--                                            class="badge bg-light-info">{{ $case->case_id }}</span>--}}
                {{--                                </td>--}}
                {{--                                <td>--}}
                {{--                                    <div class="d-flex align-items-center">--}}
                {{--                                        <div--}}
                {{--                                                class="image image-mini me-3">--}}
                {{--                                            <a href="{{ url('patients',$case->patient_id) }}">--}}
                {{--                                                <div>--}}
                {{--                                                    <img src="{{$case->patient->user->ImageUrl}}" alt=""--}}
                {{--                                                         class="user-img rounded-circle image">--}}
                {{--                                                </div>--}}
                {{--                                            </a>--}}
                {{--                                        </div>--}}
                {{--                                        <div class="d-flex flex-column">--}}
                {{--                                            <a href="{{ url('patients',$case->patient_id) }}"--}}
                {{--                                               class="mb-1 text-decoration-none">{{ $case->patient->user->full_name }}</a>--}}
                {{--                                            <span>{{ $case->patient->user->email }}</span>--}}
                {{--                                        </div>--}}
                {{--                                    </div>--}}
                {{--                                </td>--}}
                {{--                                                                                <td class="text-truncate"--}}
                {{--                                <!--                                                --><?php--}}
                {{--                                                                                $style = 'style=';--}}
                {{--                                                                                $maxWidth = 'max-width:';--}}
                {{--                                //                                                ?>--}}
                {{--                                                                                    {{$style}}"{{$maxWidth}} 150px">{!! (!empty($case->description)) ? nl2br(e($case->description)) : __('messages.common.n/a') !!}</td>--}}
                {{--                                <td>{{ (!empty($case->phone)) ? $case->phone : __('messages.common.n/a') }}</td>--}}
                {{--                                <td>--}}
                {{--                                    <div class="badge bg-light-info">--}}
                {{--                                        <div class="mb-2">{{ \Carbon\Carbon::parse($case->date)->format('g:i A') }}</div>--}}
                {{--                                        <div>{{ \Carbon\Carbon::parse($case->date)->format('jS M, Y') }}</div>--}}
                {{--                                    </div>--}}
                {{--                                </td>--}}
                {{--                                <td class="text-right">--}}
                {{--                                    <b>{{ getCurrencySymbol() }}</b> {{ number_format($case->fee, 2) }}--}}
                {{--                                </td>--}}
                {{--                                <td class="text-center"><span--}}
                {{--                                            class="badge bg-light-{{($case->status == 1) ? 'success' : 'danger'}}">{{ ($case->status) ? __('messages.common.active') : __('messages.common.de_active') }}</span>--}}
                {{--                                </td>--}}
                {{--                            </tr>--}}
                {{--                        @endforeach--}}
                {{--                        </tbody>--}}
                {{--                        </table>--}}
                {{--                    </div>--}}
                {{--                </div>--}}
                {{--                <div class="tab-pane fade" id="dpatients" role="tabpanel" aria-labelledby="patients-tab">--}}
                {{--                    <h2>{{ __('messages.patients') }}</h2>--}}
                {{--                    <div class="card-toolbar mt-5">--}}
                {{--                        <div class="d-flex align-items-center py-1 mb-5">--}}
                {{--                            @include('layouts.search-component-for-detail', ['id' => 2])--}}
                {{--                            <div class="ms-auto">--}}
                {{--                            </div>--}}
                {{--                        </div>--}}
                {{--                    </div>--}}
                {{--                    <div class="table-responsive">--}}
                {{--                        <table id="doctorPatients"--}}
                {{--                               class="table table-striped border-bottom-0">--}}
                {{--                            <thead>--}}
                {{--                            <tr class="text-start text-muted fw-bolder fs-7 text-uppercase gs-0">--}}
                {{--                                <th class="w-10">{{ __('messages.case.patient') }}</th>--}}
                {{--                                <th class="w-10">{{ __('messages.user.phone') }}</th>--}}
                {{--                                <th class="w-5">{{ __('messages.user.blood_group') }}</th>--}}
                {{--                                <th class="w-10 text-center">{{ __('messages.common.status') }}</th>--}}
                {{--                            </tr>--}}
                {{--                            </thead>--}}
                {{--                            <tbody class="fw-bold">--}}
                {{--                            @foreach($doctorData->patients as $patient)--}}
                {{--                                <tr>--}}
                {{--                                    <td>--}}
                {{--                                        <div class="d-flex align-items-center">--}}
                {{--                                            <div--}}
                {{--                                                    class="image image-mini me-3">--}}
                {{--                                                <a href="{{ url('patients',$patient->id) }}">--}}
                {{--                                                    <div>--}}
                {{--                                                        <img src="{{$patient->user->ImageUrl}}" alt=""--}}
                {{--                                                             class="user-img rounded-circle image">--}}
                {{--                                                    </div>--}}
                {{--                                                </a>--}}
                {{--                                            </div>--}}
                {{--                                            <div class="d-flex flex-column">--}}
                {{--                                                <a href="{{ url('patients',$patient->id) }}"--}}
                {{--                                                   class="mb-1 text-decoration-none">{{ $patient->user->full_name }}</a>--}}
                {{--                                                <span>{{ $patient->user->email }}</span>--}}
                {{--                                            </div>--}}
                {{--                                        </div>--}}
                {{--                                    </td>--}}
                {{--                                    <td>{{ (!empty($patient->user->phone)) ? $patient->user->phone : __('messages.common.n/a') }}</td>--}}
                {{--                                    <td>@if(!empty($patient->user->blood_group))--}}
                {{--                                            <span--}}
                {{--                                                    class="badge fs-6 bg-light-{{ !empty($patient->user->blood_group) ? 'success' : 'danger'  }}"> {{ $patient->user->blood_group }} </span>--}}
                {{--                                        @else--}}
                {{--                                            <span--}}
                {{--                                                    class="me-2">{{ __('messages.common.n/a')}}</span>--}}
                {{--                                        @endif</td>--}}
                {{--                                    <td class="text-center"><span--}}
                {{--                                                class="badge bg-light-{{($patient->user->status == 1) ? 'success' : 'danger'}}">{{ (!empty($patient->user->status)) ? __('messages.common.active') : __('messages.common.de_active') }}</span>--}}
                {{--                                    </td>--}}
                {{--                                </tr>--}}
                {{--                            @endforeach--}}
                {{--                            </tbody>--}}
                {{--                        </table>--}}
                {{--                    </div>--}}
                {{--                </div>--}}
                {{--                <div class="tab-pane fade" id="dappointments" role="tabpanel" aria-labelledby="appointments-tab">--}}
                {{--                    <h2>{{ __('messages.appointments') }}</h2>--}}
                {{--                    <div class="card-toolbar mt-5">--}}
                {{--                        <div class="d-flex align-items-center py-1 mb-5">--}}
                {{--                            @include('layouts.search-component-for-detail', ['id' => 3])--}}
                {{--                            <div class="ms-auto">--}}
                {{--                            </div>--}}
                {{--                        </div>--}}
                {{--                    </div>--}}
                {{--                    <div class="table-responsive">--}}
                {{--                        <table id="doctorAppointments"--}}
                {{--                               class="table table-striped border-bottom-0">--}}
                {{--                            <thead>--}}
                {{--                            <tr class="text-start text-muted fw-bolder fs-7 text-uppercase gs-0">--}}
                {{--                                <th class="w-10">{{ __('messages.appointment.patient') }}</th>--}}
                {{--                                <th class="w-10">{{ __('messages.appointment.doctor') }}</th>--}}
                {{--                                <th class="w-10">{{ __('messages.appointment.doctor_department') }}</th>--}}
                {{--                                <th class="w-10">{{ __('messages.appointment.date') }}</th>--}}
                {{--                            </tr>--}}
                {{--                            </thead>--}}
                {{--                            <tbody class="fw-bold">--}}
                {{--                            @foreach($appointments as $appointment)--}}
                {{--                                <tr>--}}
                {{--                                    <td>--}}
                {{--                                        <div class="d-flex align-items-center">--}}
                {{--                                            <div--}}
                {{--                                                    class="image image-mini me-3">--}}
                {{--                                                <a href="{{ url('patients',$appointment->patient_id) }}">--}}
                {{--                                                    <div>--}}
                {{--                                                        <img src="{{$appointment->patient->user->ImageUrl}}"--}}
                {{--                                                             alt=""--}}
                {{--                                                             class="user-img rounded-circle image">--}}
                {{--                                                    </div>--}}
                {{--                                                </a>--}}
                {{--                                            </div>--}}
                {{--                                            <div class="d-flex flex-column">--}}
                {{--                                                <a href="{{ url('patients',$appointment->patient_id) }}"--}}
                {{--                                                   class="mb-1 text-decoration-none">{{ $appointment->patient->user->full_name }}</a>--}}
                {{--                                                <span>{{ $appointment->patient->user->email }}</span>--}}
                {{--                                            </div>--}}
                {{--                                        </div>--}}
                {{--                                    </td>--}}
                {{--                                    <td>--}}
                {{--                                        <div class="d-flex align-items-center">--}}
                {{--                                            <div--}}
                {{--                                                    class="image image-mini me-3">--}}
                {{--                                                <a href="{{ url('doctors',$appointment->doctor_id) }}">--}}
                {{--                                                    <div>--}}
                {{--                                                        <img src="{{$appointment->doctor->user->ImageUrl}}"--}}
                {{--                                                             alt=""--}}
                {{--                                                             class="user-img rounded-circle image">--}}
                {{--                                                    </div>--}}
                {{--                                                </a>--}}
                {{--                                            </div>--}}
                {{--                                            <div class="d-flex flex-column">--}}
                {{--                                                <a href="{{ url('doctors',$appointment->doctor_id) }}"--}}
                {{--                                                   class="mb-1 text-decoration-none">{{ $appointment->doctor->user->full_name }}</a>--}}
                {{--                                                <span>{{ $appointment->doctor->user->email }}</span>--}}
                {{--                                            </div>--}}
                {{--                                        </div>--}}
                {{--                                    </td>--}}
                {{--                                    <td>{{ $appointment->department->title }}</td>--}}
                {{--                                    <td>--}}
                {{--                                        <div class="badge bg-light-info">--}}
                {{--                                            <div class="mb-2">{{ \Carbon\Carbon::parse($appointment->opd_date)->format('g:i A') }}</div>--}}
                {{--                                            <div>{{ \Carbon\Carbon::parse($appointment->opd_date)->format('jS M, Y') }}</div>--}}
                {{--                                        </div>--}}
                {{--                                    </td>--}}
                {{--                                </tr>--}}
                {{--                            @endforeach--}}
                {{--                            </tbody>--}}
                {{--                        </table>--}}
                {{--                    </div>--}}
                {{--                </div>--}}
                {{--                <div class="tab-pane fade" id="dschedules" role="tabpanel" aria-labelledby="cases-tab">--}}
                {{--                    <h2>{{ __('messages.schedules') }}</h2>--}}
                {{--                    <div class="card-toolbar mt-5">--}}
                {{--                        <div class="d-flex align-items-center py-1 mb-5">--}}
                {{--                            @include('layouts.search-component-for-detail', ['id' => 4])--}}
                {{--                            <div class="ms-auto">--}}
                {{--                            </div>--}}
                {{--                        </div>--}}
                {{--                    </div>--}}
                {{--                    <div class="table-responsive">--}}
                {{--                        <table id="doctorSchedules"--}}
                {{--                               class="table table-striped border-bottom-0">--}}
                {{--                            <thead>--}}
                {{--                            <tr class="text-start text-muted fw-bolder fs-7 text-uppercase gs-0">--}}
                {{--                                <th class="w-20">{{ __('messages.schedule.available_on') }}</th>--}}
                {{--                                <th class="w-40">{{ __('messages.schedule.available_from') }}</th>--}}
                {{--                                <th class="w-40">{{ __('messages.schedule.available_to') }}</th>--}}
                {{--                            </tr>--}}
                {{--                            </thead>--}}
                {{--                            <tbody class="fw-bold">--}}
                {{--                            @foreach($doctorData->schedules as $schedule)--}}
                {{--                                <tr>--}}
                {{--                                    <td>{{ $schedule->available_on }}</td>--}}
                {{--                                    <td>{{ $schedule->available_from }}</td>--}}
                {{--                                    <td>{{ $schedule->available_to }}</td>--}}
                {{--                                </tr>--}}
                {{--                            @endforeach--}}
                {{--                            </tbody>--}}
                {{--                        </table>--}}
                {{--                    </div>--}}
                {{--                </div>--}}
                {{--                <div class="tab-pane fade" id="dpayroll" role="tabpanel" aria-labelledby="cases-tab">--}}
                {{--                    <h2>{{ __('messages.my_payroll.my_payrolls') }}</h2>--}}
                {{--                    <div class="card-toolbar mt-5">--}}
                {{--                        <div class="d-flex align-items-center py-1 mb-5">--}}
                {{--                            @include('layouts.search-component-for-detail', ['id' => 5])--}}
                {{--                            <div class="ms-auto">--}}
                {{--                            </div>--}}
                {{--                        </div>--}}
                {{--                    </div>--}}
                {{--                    <div class="table-responsive">--}}
                {{--                        <table id="doctorPayrolls"--}}
                {{--                               class="table table-striped border-bottom-0">--}}
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
                {{--                            @foreach($doctorData->payrolls as $payroll)--}}
                {{--                                <tr>--}}
                {{--                                    <td class="text-center">{{ $payroll->payroll_id }}</td>--}}
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
                {{--                                                class="badge fs-6 bg-light-{{($payroll->status == 1 ) ? 'success' : 'danger'}}">{{ ($payroll->status) ? __('messages.employee_payroll.paid') : __('messages.employee_payroll.not_paid') }}</span>--}}
                {{--                                    </td>--}}
                {{--                                </tr>--}}
                {{--                            @endforeach--}}
                {{--                            </tbody>--}}
                {{--                        </table>--}}
                {{--                    </div>--}}
                {{--                </div>--}}
            </div>
</div>
