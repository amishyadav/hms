<div class="row">
    <div class="col-md-6 d-flex flex-column mb-md-10 mb-5">
        <label class="pb-2 fs-5 text-gray-600">{{ __('messages.case.patient').(':')  }}</label>
        <span class="fs-5 text-gray-800">{{$operationReport->patient->user->full_name}}</span>
    </div>
    <div class="col-md-6 d-flex flex-column mb-md-10 mb-5">
        <label class="pb-2 fs-5 text-gray-600">{{ __('messages.operation_report.case_id').(':')  }}</label>
        <p class="m-0">
            <span class="badge bg-light-info fs-5">{{$operationReport->case_id}}</span></p>
    </div>
    <div class="col-md-6 d-flex flex-column mb-md-10 mb-5">
        <label class="pb-2 fs-5 text-gray-600">{{ __('messages.case.doctor').(':')  }}</label>
        <span class="fs-5 text-gray-800">{{$operationReport->doctor->user->full_name}}</span>
    </div>
    <div class="col-md-6 d-flex flex-column mb-md-10 mb-5">
        <label class="pb-2 fs-5 text-gray-600">{{ __('messages.operation_report.date').(':')  }}</label>
        <span class="fs-5 text-gray-800">{{ \Carbon\Carbon::parse($operationReport->date)->translatedFormat('jS M, Y g:i A') }}</span>
    </div>
    <div class="col-md-6 d-flex flex-column mb-md-10 mb-5">
        <label class="pb-2 fs-5 text-gray-600">{{ __('messages.operation_report.description').(':')  }}</label>
        <span class="fs-5 text-gray-800">{!! (($operationReport->description != "")) ? nl2br(e($operationReport->description)) : __('messages.common.n/a') !!}</span>
    </div>
    <div class="col-md-6 d-flex flex-column mb-md-10 mb-5">
        <label class="pb-2 fs-5 text-gray-600">{{ __('messages.common.created_on').(':')  }}</label>
        <span class="fs-5 text-gray-800" data-toggle="tooltip" data-placement="right"
              title="{{ \Carbon\Carbon::parse($operationReport->created_at)->translatedFormat('jS M, Y') }}">{{ \Carbon\Carbon::parse($operationReport->created_at)->diffForHumans() }}</span>
    </div>
    <div class="col-md-6 d-flex flex-column mb-md-10 mb-5">
        <label class="pb-2 fs-5 text-gray-600">{{ __('messages.common.last_updated').(':')  }}</label>
        <span class="fs-5 text-gray-800" data-toggle="tooltip" data-placement="right"
              title="{{ \Carbon\Carbon::parse($operationReport->updated_at)->translatedFormat('jS M, Y') }}">{{ \Carbon\Carbon::parse($operationReport->updated_at)->diffForHumans() }}</span>
    </div>
</div>
