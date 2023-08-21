<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-xxl-5 col-12">
                <div class="d-sm-flex align-items-center mb-5 mb-xxl-0 text-center text-sm-start">
                    <div class="image image-circle image-small">
                        <img src="{{$caseHandler->user->image_url}}" alt="image"/>
                    </div>
                    <div class="ms-0 ms-sm-10 mt-5 mt-sm-0">
                        <span
                                class="badge bg-light-{{ $caseHandler->user->status === 1 ? 'success' : 'danger' }} mb-2">{{ ($caseHandler->user->status === 1) ? __('messages.common.active') : __('messages.common.de_active') }}</span>
                        <h2><a href="javascript:void(0)"
                               class="text-decoration-none">{{$caseHandler->user->full_name}}</a></h2>
                        <span class="text-gray-600 fs-5">
                            <i class="fa-solid fa-envelope me-1"></i>
                            <a href="mailto: {{$caseHandler->user->email}}"
                               class="text-gray-600 text-decoration-none fs-5">
                                {{$caseHandler->user->email}}
                            </a>
                        </span>
                        <span class="d-flex align-items-center me-5 mb-2 mt-2">
                            @if(!empty($caseHandler->address->address1) || !empty($caseHandler->address->address2) || !empty($caseHandler->address->city) || !empty($caseHandler->address->zip))
                                <i class="fa-solid fa-location-dot text-gray-600 me-3 mt-1"></i>
                            @endif
                            <span class="text-start"> {{ !empty($caseHandler->address->address1) ? $caseHandler->address->address1 : '' }}{{ !empty($caseHandler->address->address2) ? !empty($caseHandler->address->address1) ? ',' : '' : '' }}
                                {{ empty($caseHandler->address->address1) || !empty($caseHandler->address->address2)  ? !empty($caseHandler->address->address2) ? $caseHandler->address->address2 : '' : '' }}
                                {{!empty($caseHandler->address->city) ? ','.$caseHandler->address->city : ''}} {{ !empty($caseHandler->address->zip) ? ','.$caseHandler->address->zip : '' }}
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
                {{ __('messages.my_payrolls') }}
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
                                   class="pb-2 fs-5 text-gray-600">{{ __('messages.user.phone').':'  }}</label>
                            <span class="fs-5 text-gray-800">{{!empty($caseHandler->user->phone)?$caseHandler->user->phone:'N/A'}}</span>
                        </div>
                        <div class="col-sm-6 d-flex flex-column mb-md-10 mb-5">
                            <label for="name"
                                   class="pb-2 fs-5 text-gray-600">{{ __('messages.user.gender').':'  }}</label>
                            <span class="fs-5 text-gray-800">{{ $caseHandler->user->gender == 0 ? 'Male' : 'Female' }}</span>
                        </div>
                        <div class="col-sm-6 d-flex flex-column mb-md-10 mb-5">
                            <label for="name"
                                   class="pb-2 fs-5 text-gray-600">{{ __('messages.user.blood_group').':'  }}</label>
                            <span class="text-{{!empty($caseHandler->user->blood_group) ? 'success' : 'danger'}}">{{ !empty($caseHandler->user->blood_group) ? $caseHandler->user->blood_group : __('messages.common.n/a') }}</span>
                        </div>
                        <div class="col-sm-6 d-flex flex-column mb-md-10 mb-5">
                            <label for="name"
                                   class="pb-2 fs-5 text-gray-600">{{ __('messages.user.dob').':' }}</label>
                            <span class="fs-5 text-gray-800">{{ !empty($caseHandler->user->dob) ? \Carbon\Carbon::parse($caseHandler->user->dob)->translatedFormat('jS M, Y') : __('messages.common.n/a') }}</span>
                        </div>
                        <div class="col-sm-6 d-flex flex-column mb-md-10 mb-5">
                            <label for="name"
                                   class="pb-2 fs-5 text-gray-600">{{ __('messages.user.designation').':'  }}</label>
                            <span class="fs-5 text-gray-800">{{ !empty($caseHandler->user->designation) ? $caseHandler->user->designation : __('messages.common.n/a') }}</span>
                        </div>
                        <div class="col-sm-6 d-flex flex-column mb-md-10 mb-5">
                            <label for="name"
                                   class="pb-2 fs-5 text-gray-600">{{ __('messages.user.qualification').':'  }}</label>
                            <span class="fs-5 text-gray-800">{{ !empty($caseHandler->user->qualification) ? $caseHandler->user->qualification : __('messages.common.n/a')}}</span>
                        </div>
                        <div class="col-sm-6 d-flex flex-column mb-md-10 mb-5">
                            <label for="name"
                                   class="pb-2 fs-5 text-gray-600">{{ __('messages.common.created_at').':' }}</label>
                            <span class="fs-5 text-gray-800">{{ !empty($caseHandler->user->created_at) ? $caseHandler->user->created_at->diffForHumans() : __('messages.common.n/a') }}</span>
                        </div>
                        <div class="col-sm-6 d-flex flex-column mb-md-10 mb-5">
                            <label for="name"
                                   class="pb-2 fs-5 text-gray-600">{{ __('messages.common.updated_at').':' }}</label>
                            <span class="fs-5 text-gray-800">{{ !empty($caseHandler->user->updated_at) ? $caseHandler->user->updated_at->diffForHumans() : __('messages.common.n/a') }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="tab-pane fade" id="lpayrolls" role="tabpanel" aria-labelledby="cases-tab">
            <div class="container-fluid">
                <livewire:case-handler-payroll-table caseHandlerId="{{$caseHandler->id}}"/>
            </div>
        </div>
    </div>
</div>
