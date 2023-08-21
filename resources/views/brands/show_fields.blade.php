<div>
    <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="poverview" role="tabpanel">
            <div class="card mb-5 mb-xl-10">
                <div>
                    <div class="card-body p-9">
                        <div class="row mb-7">
                            <div class="col-md-6 d-flex flex-column mb-md-10 mb-5">
                                <label class="pb-2 fs-5 text-gray-600">{{ __('messages.medicine.brand')  }}</label>
                                <span class="fs-5 text-gray-800">{{$brand->name}}</span>
                            </div>
                            <div class="col-md-6 d-flex flex-column mb-md-10 mb-5">
                                <label class="pb-2 fs-5 text-gray-600">{{ __('messages.user.email')  }}</label>
                                <p><span class="fs-5 text-gray-800">{{ !empty($brand->email)?$brand->email:'N/A' }}</span></p>
                            </div>
                            <div class="col-md-6 d-flex flex-column mb-md-10 mb-5">
                                <label class="pb-2 fs-5 text-gray-600">{{ __('messages.user.phone')  }}</label>
                                <span class="fs-5 text-gray-800">{{ !empty($brand->phone)?$brand->phone:'N/A' }}</span>
                            </div>
                            <div class="col-md-6 d-flex flex-column mb-md-10 mb-5">
                                <label class="pb-2 fs-5 text-gray-600">{{ __('messages.common.created_on')  }}</label>
                                <span class="fs-5 text-gray-800" data-toggle="tooltip" data-placement="right" title="{{ \Carbon\Carbon::parse($brand->created_at)->translatedFormat('jS M, Y') }}">{{ \Carbon\Carbon::parse($brand->created_at)->diffForHumans() }}</span>
                            </div>
                            <div class="col-md-6 d-flex flex-column mb-md-10 mb-5">
                                <label class="pb-2 fs-5 text-gray-600">{{ __('messages.common.last_updated')  }}</label>
                                <span class="fs-5 text-gray-800" data-toggle="tooltip" data-placement="right" title="{{ \Carbon\Carbon::parse($brand->updated_at)->translatedFormat('jS M, Y') }}">{{ \Carbon\Carbon::parse($brand->updated_at)->diffForHumans() }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container-fluid">
                <div class="d-md-flex align-items-center justify-content-between mb-7">
                    <h3 class="m-0 mt-5">{{ __('messages.medicine.medicines') }}</h3>
                </div>
                <livewire:medicine-brand-detail-table  brandDetails="{{$brand->id}}"/>
            </div>
        </div>
    </div>
</div>
