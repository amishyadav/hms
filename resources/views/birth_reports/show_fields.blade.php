<div class="row">
    <div class="col-md-6 d-flex flex-column mb-md-10 mb-5">
        <label class="pb-2 fs-5 text-gray-600">{{ __('messages.case.patient').(':')  }}</label>
        <span class="fs-5 text-gray-800">{{$birthReport->patient->user->full_name}}</span>
    </div>
    <div class="col-md-6 d-flex flex-column mb-md-10 mb-5">
        <label class="pb-2 fs-5 text-gray-600">{{ __('messages.death_report.case_id').(':')  }}</label>
        <span class="fs-5 text-gray-800">{{$birthReport->case_id}}</span>
    </div>
    <div class="col-md-6 d-flex flex-column mb-md-10 mb-5">
        <label class="pb-2 fs-5 text-gray-600">{{ __('messages.case.doctor').(':')  }}</label>
        <span class="fs-5 text-gray-800">{{$birthReport->doctor->user->full_name}}</span>
    </div>
    <div class="col-md-6 d-flex flex-column mb-md-10 mb-5">
        <label class="pb-2 fs-5 text-gray-600">{{ __('messages.death_report.date').(':')  }}</label>
        <span class="fs-5 text-gray-800">{{ \Carbon\Carbon::parse($birthReport->date)->translatedFormat('jS M, Y g:i A') }}</span>
    </div>
    <div class="col-md-6 d-flex flex-column mb-md-10 mb-5">
        <label class="pb-2 fs-5 text-gray-600">{{ __('messages.death_report.description').(':')  }}</label>
        <span class="fs-5 text-gray-800">{!! !empty($birthReport->description)?nl2br(e($birthReport->description)):'N/A' !!}</span>
    </div>
    <div class="col-md-6 d-flex flex-column mb-md-10 mb-5">
        <label class="pb-2 fs-5 text-gray-600">{{ __('messages.common.created_on').(':')  }}</label>
        <span class="fs-5 text-gray-800" data-toggle="tooltip" data-placement="right"
              title="{{ \Carbon\Carbon::parse($birthReport->created_at)->translatedFormat('jS M, Y') }}">{{ \Carbon\Carbon::parse($birthReport->created_at)->diffForHumans() }}</span>
    </div>
    <div class="col-md-6 d-flex flex-column mb-md-10 mb-5">
        <label class="pb-2 fs-5 text-gray-600">{{ __('messages.common.last_updated').(':')  }}</label>
        <span class="fs-5 text-gray-800" data-toggle="tooltip" data-placement="right"
              title="{{ \Carbon\Carbon::parse($birthReport->updated_at)->translatedFormat('jS M, Y') }}">{{ \Carbon\Carbon::parse($birthReport->updated_at)->diffForHumans() }}</span>
    </div>
</div>
