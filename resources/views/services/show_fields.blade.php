<div class="row mb-7">
    <div class="col-md-6 d-flex flex-column mb-md-10 mb-5">
        <label class="pb-2 fs-5 text-gray-600">{{ __('messages.package.service').(':')  }}</label>
                                <span class="fs-5 text-gray-800">{{ $service->name}}</span>
                            </div>
    <div class="col-md-6 d-flex flex-column mb-md-10 mb-5">
        <label class="pb-2 fs-5 text-gray-600">{{ __('messages.service.quantity').(':')  }}</label>
        <span class="fs-5 text-gray-800">{{ $service->quantity}}</span>
    </div>
    <div class="col-md-6 d-flex flex-column mb-md-10 mb-5">
        <label class="pb-2 fs-5 text-gray-600">{{ __('messages.service.rate').(':')  }}</label>
        <span class="fs-5 text-gray-800">{{ getCurrencySymbol() }}</b> {{ number_format($service->rate,2)}}</span>
    </div>
    <div class="col-md-6 d-flex flex-column mb-md-10 mb-5">
        <label class="pb-2 fs-5 text-gray-600">{{ __('messages.common.status').(':')  }}</label>
        <p class="m-0"><span
                    class="badge bg-light-{{!empty($service->status == 1) ? 'success' : 'danger'}}">{{  ($service->status == 1) ? __('messages.common.active') : __('messages.common.de_active') }}</span>
        </p>
    </div>
    <div class="col-md-6 d-flex flex-column mb-md-10 mb-5">
        <label class="pb-2 fs-5 text-gray-600">{{ __('messages.common.created_at').(':')  }}</label>
        <span class="fs-5 text-gray-800" data-toggle="tooltip" data-placement="right"
              title="{{ date('jS M, Y', strtotime($service->created_at)) }}">{{ $service->created_at->diffForHumans() }}</span>
    </div>
    <div class="col-md-6 d-flex flex-column mb-md-10 mb-5">
        <label class="pb-2 fs-5 text-gray-600">{{ __('messages.common.last_updated').(':')  }}</label>
        <span class="fs-5 text-gray-800" data-toggle="tooltip" data-placement="right"
              title="{{ date('jS M, Y', strtotime($service->updated_at)) }}">{{ $service->updated_at->diffForHumans() }}</span>
    </div>
                            <div class="col-md-6 d-flex flex-column mb-md-10 mb-5">
                                <label class="pb-2 fs-5 text-gray-600">{{ __('messages.common.description').(':')  }}</label>
                                <span class="fs-5 text-gray-800">{!! !empty($service->description)?nl2br(e($service->description)):__('messages.common.n/a') !!}</span>
                            </div>
</div>
                     
