<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-xxl-5 col-12">
                <div class="d-sm-flex align-items-center mb-5 mb-xxl-0 text-center text-sm-start">
                    <div class="image image-circle image-small">
                        <img src="{{$admin->image_url}}" alt="image"/>
                    </div>
                    <div class="ms-0 ms-sm-10 mt-5 mt-sm-0">
                        <span class="badge bg-light-{{ $admin->status === 1 ? 'success' : 'danger' }} mb-2">{{ ($admin->status === 1) ? __('messages.common.active') : __('messages.common.de_active') }}</span>
                        <h2><a href="#" class="text-decoration-none">{{$admin->full_name}}</a></h2>
                        <span class="text-gray-600 fs-5">
                            <i class="fa-solid fa-envelope me-1"></i>
                            <a href="mailto: {{$admin->email}}"
                               class="text-gray-600 text-decoration-none fs-5">
                                {{$admin->email}}
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
            <a class="nav-link text-active-primary me-6 active" data-bs-toggle="tab" href="#aoverview">{{ __('messages.overview') }}</a>
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
                                    <span class="fs-5 text-gray-800">{{!empty($admin->phone)?$admin->phone:'N/A'}}</span>
                                </div>
                            </div>
                            <div class="col-sm-6 d-flex flex-column mb-md-10 mb-5">
                                <label class="pb-2 fs-5 text-gray-600">{{ __('messages.common.created_at') }}</label>
                                <div class="col-lg-8">
                                <span
                                        class="fs-5 text-gray-800 me-2">{{ !empty($admin->created_at) ? $admin->created_at->diffForHumans() : __('messages.common.n/a') }}</span>
                                </div>
                            </div>
                            <div class="col-sm-6 d-flex flex-column mb-md-10 mb-5">
                                <label class="pb-2 fs-5 text-gray-600">{{ __('messages.common.updated_at') }}</label>
                                <div class="col-lg-8">
                                <span
                                        class="fs-5 text-gray-800 me-2">{{ !empty($admin->updated_at) ? $admin->updated_at->diffForHumans() : __('messages.common.n/a') }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
