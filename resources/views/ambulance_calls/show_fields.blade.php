<div>
    <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="poverview" role="tabpanel">
            <div class="card mb-5 mb-xl-10">
                <div>
                    <div class="card-body  border-top p-9">
                        <div class="row mb-7">
                            <div class="col-md-6 d-flex flex-column mb-md-10 mb-5">
                                <label class="pb-2 fs-5 text-gray-600">{{ __('messages.ambulance_call.patient').(':')  }}</label>
                                <span class="fs-5 text-gray-800">{{ $ambulanceCall->patient->user->full_name}}</span>
                            </div>
                            <div class="col-md-6 d-flex flex-column mb-md-10 mb-5">
                                <label class="pb-2 fs-5 text-gray-600">{{ __('messages.ambulance_call.vehicle_model').(':')  }}</label>
                                <span class="fs-5 text-gray-800">{{$ambulanceCall->ambulance->vehicle_model}}</span>
                            </div>
                            <div class="col-md-6 d-flex flex-column mb-md-10 mb-5">
                                <label class="pb-2 fs-5 text-gray-600">{{ __('messages.ambulance_call.date').(':')  }}</label>
                                <span class="fs-5 text-gray-800">{{ \Carbon\Carbon::parse($ambulanceCall->date)->translatedFormat('jS M, Y') }}</span>
                            </div>
                            <div class="col-md-6 d-flex flex-column mb-md-10 mb-5">
                                <label class="pb-2 fs-5 text-gray-600">{{ __('messages.ambulance_call.driver_name').(':')  }}</label>
                                <span class="fs-5 text-gray-800">{{ $ambulanceCall->driver_name }}</span>
                            </div>
                            <div class="col-md-6 d-flex flex-column mb-md-10 mb-5">
                                <label class="pb-2 fs-5 text-gray-600">{{ __('messages.ambulance_call.amount').(':')  }}</label>
                                <p><span class="fs-5 text-gray-800"><b>{{ getCurrencySymbol() }}</b> {{ number_format($ambulanceCall->amount,2) }}</span>
                                </p>
                            </div>
                            <div class="col-md-6 d-flex flex-column mb-md-10 mb-5">
                                <label class="pb-2 fs-5 text-gray-600">{{ __('messages.common.created_at').(':')  }}</label>
                                <span class="fs-5 text-gray-800" data-toggle="tooltip" data-placement="right" title="{{ date('jS M, Y', strtotime($ambulanceCall->created_at)) }}">{{ $ambulanceCall->created_at->diffForHumans() }}</span>
                            </div>
                            <div class="col-md-6 d-flex flex-column mb-md-10 mb-5">
                                <label class="pb-2 fs-5 text-gray-600">{{ __('messages.common.last_updated').(':')  }}</label>
                                <span class="fs-5 text-gray-800" data-toggle="tooltip" data-placement="right" title="{{ date('jS M, Y', strtotime($ambulanceCall->updated_at)) }}">{{ $ambulanceCall->updated_at->diffForHumans() }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
