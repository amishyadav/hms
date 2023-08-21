<div>
    <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="poverview" role="tabpanel">
            <div class="card mb-5 mb-xl-10">
                <div>
                    <div class="card-body  border-top p-9">
                        <div class="row mb-7">
                            <div class="col-md-6 d-flex flex-column mb-md-10 mb-5">
                                <label class="pb-2 fs-5 text-gray-600">{{ __('messages.ambulance.vehicle_number').(':')  }}</label>
                                <span class="fs-5 text-gray-800">{{ $ambulance->vehicle_number}}</span>
                            </div>
                            <div class="col-md-6 d-flex flex-column mb-md-10 mb-5">
                                <label class="pb-2 fs-5 text-gray-600">{{ __('messages.ambulance.vehicle_model').(':')  }}</label>
                                <span class="fs-5 text-gray-800">{{ $ambulance->vehicle_model}}</span>
                            </div>
                            <div class="col-md-6 d-flex flex-column mb-md-10 mb-5">
                                <label class="pb-2 fs-5 text-gray-600">{{ __('messages.ambulance.vehicle_type').(':')  }}</label>
                                <span class="fs-5 text-gray-800">{{$type[$ambulance->vehicle_type] }}</span>
                            </div>
                            <div class="col-md-6 d-flex flex-column mb-md-10 mb-5">
                                <label class="pb-2 fs-5 text-gray-600">{{ __('messages.ambulance.year_made').(':')  }}</label>
                                <span class="fs-5 text-gray-800">{{$ambulance->year_made}}</span>
                            </div>
                            <div class="col-md-6 d-flex flex-column mb-md-10 mb-5">
                                <label class="pb-2 fs-5 text-gray-600">{{ __('messages.ambulance.driver_name').(':')  }}</label>
                                <span class="fs-5 text-gray-800">{{$ambulance->driver_name}}</span>
                            </div>
                            <div class="col-md-6 d-flex flex-column mb-md-10 mb-5">
                                <label class="pb-2 fs-5 text-gray-600">{{ __('messages.ambulance.driver_license').(':')  }}</label>
                                <span class="fs-5 text-gray-800">{{$ambulance->driver_license}}</span>
                            </div>
                            <div class="col-md-6 d-flex flex-column mb-md-10 mb-5">
                                <label class="pb-2 fs-5 text-gray-600">{{ __('messages.ambulance.driver_contact').(':')  }}</label>
                                <span class="fs-5 text-gray-800">{{$ambulance->driver_contact}}</span>
                            </div>
                            <div class="col-md-6 d-flex flex-column mb-md-10 mb-5">
                                <label class="pb-2 fs-5 text-gray-600">{{ __('messages.ambulance.note').(':')  }}</label>
                                <span class="fs-5 text-gray-800">{!! !empty($ambulance->note)?nl2br(e($ambulance->note)):'N/A' !!}</span>
                            </div>
                            <div class="col-md-6 d-flex flex-column mb-md-10 mb-5">
                                <label class="pb-2 fs-5 text-gray-600">{{ __('messages.ambulance.is_available').(':')  }}</label>
                                <p>
                                    <span class="badge fs-6 bg-light-{{!empty($ambulance->is_available == 1 ) ? 'success' : 'danger'}}">{{($ambulance->is_available == 1 )? 'Available': 'Not available' }}</span>
                                </p>
                            </div>
                            <div class="col-md-6 d-flex flex-column mb-md-10 mb-5">
                                <label class="pb-2 fs-5 text-gray-600">{{ __('messages.common.created_at').(':')  }}</label>
                                <span class="fs-5 text-gray-800" data-toggle="tooltip" data-placement="right"
                                      title="{{ date('jS M, Y', strtotime($ambulance->created_at)) }}">{{ $ambulance->created_at->diffForHumans() }}</span>
                            </div>
                            <div class="col-md-6 d-flex flex-column mb-md-10 mb-5">
                                <label class="pb-2 fs-5 text-gray-600">{{ __('messages.common.last_updated').(':')  }}</label>
                                <span class="fs-5 text-gray-800" data-toggle="tooltip" data-placement="right"
                                      title="{{ date('jS M, Y', strtotime($ambulance->updated_at)) }}">{{ $ambulance->updated_at->diffForHumans() }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
