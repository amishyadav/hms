<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-xxl-5 col-12">
                <div class="d-sm-flex align-items-center mb-5 mb-xxl-0 text-center text-sm-start">
                    <div class="image image-circle image-small">
                        <img src="{{$userData->image_url}}" alt="image"/>
                    </div>
                    <div class="ms-0 ms-sm-10 mt-5 mt-sm-0">
                        <span class="badge bg-light-{{ $userData->status === 1 ? 'success' : 'danger' }} fw-bolder ms-2 fs-8 py-1 px-3">{{ ($userData->status === 1) ? __('messages.common.active') : __('messages.common.de_active') }}</span>
                        <h2><a href="#" class="text-decoration-none">{{$userData->full_name}}</a></h2>
                        <span class="text-gray-600 fs-5">
                            <i class="fa-solid fa-envelope me-1"></i>
                            <a href="mailto:{{$userData->email}}"
                               class="text-gray-600 text-decoration-none fs-5">
                                 {{$userData->email}}
                            </a>
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
            <button class="nav-link active p-0" id="overview-tab" data-bs-toggle="tab" data-bs-target="#poverview"
                    type="button" role="tab" aria-controls="overview" aria-selected="true">
                {{ __('messages.overview') }}
            </button>
        </li>
    </ul>

    <div class="card">
        <div class="card-body">
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="poverview" role="tabpanel" aria-labelledby="overview-tab">
                    <div class="row">
                        <div class="col-sm-6 d-flex flex-column mb-md-10 mb-5">
                            <label for="name"
                                   class="pb-2 fs-5 text-gray-600">{{ __('messages.user.first_name')  }}</label>
                            <span class="fs-5 text-gray-800">{{$userData->first_name}}</span>
                        </div>
                        <div class="col-sm-6 d-flex flex-column mb-md-10 mb-5">
                            <label for="name"
                                   class="pb-2 fs-5 text-gray-600">{{ __('messages.user.last_name')  }}</label>
                            <span class="fs-5 text-gray-800">{{$userData->last_name}}</span>
                        </div>
                        <div class="col-sm-6 d-flex flex-column mb-md-10 mb-5">
                            <label for="name"
                                   class="pb-2 fs-5 text-gray-600">{{ __('messages.sms.role')  }}</label>
                            <span class="fs-5 text-gray-800">{{ $userData->roles->first()->name}}</span>
                        </div>
                        <div class="col-sm-6 d-flex flex-column mb-md-10 mb-5">
                            <label for="name"
                                   class="pb-2 fs-5 text-gray-600">{{ __('messages.visitor.phone')  }}</label>
                            <span class="fs-5 text-gray-800">{{ ($userData->phone=='')?  __('messages.common.n/a') : $userData->phone}}</span>
                        </div>
                        <div class="col-sm-6 d-flex flex-column mb-md-10 mb-5">
                            <label for="name"
                                   class="pb-2 fs-5 text-gray-600">{{ __('messages.user.gender')  }}</label>
                            <span class="fs-5 text-gray-800">{{ ($userData->gender == '0')? __('messages.user.male') : __('messages.user.female')}}</span>
                        </div>
                        <div class="col-sm-6 d-flex flex-column mb-md-10 mb-5">
                            <label for="name"
                                   class="pb-2 fs-5 text-gray-600">{{ __('messages.user.dob') }}</label>
                            <span class="fs-5 text-gray-800">{{ ($userData->dob == '')? __('messages.common.n/a') : \Carbon\Carbon::parse($userData->dob)->translatedFormat('jS M, Y') }}</span>
                        </div>
                        <div class="col-sm-6 d-flex flex-column mb-md-10 mb-5">
                            <label class="pb-2 fs-5 text-gray-600">{{ __('messages.common.status') }}</label>
                            <span class="fs-5 text-gray-800">
                                    @if($userData->status=='1')
                                    <p>
                                            <span class="badge bg-light-success"> {{__('messages.common.active')}} </span>
                                        </p>
                                @else
                                    <p>
                                            <span class="badge bg-light-danger">{{ __('messages.common.de_active') }}</span>
                                        </p>
                                @endif  
                                </span>
                        </div>
                        <div class="col-sm-6 d-flex flex-column mb-md-10 mb-5">
                            <label for="name"
                                   class="pb-2 fs-5 text-gray-600">{{ __('messages.common.created_at').':' }}</label>
                            <span class="fs-5 text-gray-800">{{ $userData->created_at->diffForHumans() }}</span>
                        </div>
                        <div class="col-sm-6 d-flex flex-column mb-md-10 mb-5">
                            <label for="name"
                                   class="pb-2 fs-5 text-gray-600">{{ __('messages.common.updated_at').':' }}</label>
                            <span class="fs-5 text-gray-800">{{ $userData->updated_at->diffForHumans() }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
