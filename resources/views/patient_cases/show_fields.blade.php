<div class="row">
    <div class="col-md-6 d-flex flex-column mb-md-10 mb-5">
        <label
                class="pb-2 fs-5 text-gray-600">{{ __('messages.operation_report.case_id').(':')  }}</label>
        <span class="fs-5 text-gray-800">{{ $patientCase->case_id}}</span>
    </div>
    <div class="col-md-6 d-flex flex-column mb-md-10 mb-5">
        <label class="pb-2 fs-5 text-gray-600">{{ __('messages.case.patient').(':')  }}</label>
        <span class="fs-5 text-gray-800">{{$patientCase->patient->patientUser->full_name}}</span>
    </div>
    <div class="col-md-6 d-flex flex-column mb-md-10 mb-5">
        <label class="pb-2 fs-5 text-gray-600">{{ __('messages.case.phone').(':')  }}</label>
        <span class="fs-5 text-gray-800">{{ !empty($patientCase->phone)?$patientCase->phone:__('messages.common.n/a')}}</span>
    </div>
    <div class="col-md-6 d-flex flex-column mb-md-10 mb-5">
        <label class="pb-2 fs-5 text-gray-600">{{ __('messages.case.doctor').(':')  }}</label>
        <span class="fs-5 text-gray-800">{{$patientCase->doctor->doctorUser->full_name}}</span>
    </div>
    <div class="col-md-6 d-flex flex-column mb-md-10 mb-5">
        <label class="pb-2 fs-5 text-gray-600">{{ __('messages.case.case_date').(':')  }}</label>
        <span class="fs-5 text-gray-800">{{\Carbon\Carbon::parse($patientCase->date)->translatedFormat('jS M,Y g:i A') }}</span>
    </div>
    <div class="col-md-6 d-flex flex-column mb-md-10 mb-5">
        <label class="pb-2 fs-5 text-gray-600">{{ __('messages.case.fee').(':')  }}</label>
        <span class="fs-5 text-gray-800"><b>{{ getCurrencySymbol() }}</b> {{ number_format($patientCase->fee,2) }}</span>
    </div>
    <div class="col-md-6 d-flex flex-column mb-md-10 mb-5">
        <label class="pb-2 fs-5 text-gray-600">{{ __('messages.common.created_at').(':')  }}</label>
        <span class="fs-5 text-gray-800" data-toggle="tooltip" data-placement="right"
              title="{{ date('jS M, Y', strtotime($patientCase->created_at)) }}">{{ $patientCase->created_at->diffForHumans() }}</span>
    </div>
    <div class="col-md-6 d-flex flex-column mb-md-10 mb-5">
        <label class="pb-2 fs-5 text-gray-600">{{ __('messages.common.last_updated').(':')  }}</label>
        <span class="fs-5 text-gray-800" data-toggle="tooltip" data-placement="right"
              title="{{ date('jS M, Y', strtotime($patientCase->updated_at)) }}">{{ $patientCase->updated_at->diffForHumans() }}</span>
    </div>
    <div class="col-md-6 d-flex flex-column mb-md-10 mb-5">
        <label class="pb-2 fs-5 text-gray-600">{{ __('messages.common.status').(':')  }}</label>
        <p>
            <span class="badge bg-light-{{($patientCase->status == 1) ? 'success' : 'danger'}}">{{ ($patientCase->status == 1) ? __('messages.common.active') : __('messages.common.de_active') }}</span>
        </p>
    </div>
    <div class="col-md-6 d-flex flex-column mb-md-10 mb-5">
        <label class="pb-2 fs-5 text-gray-600">{{ __('messages.common.description').(':')  }}</label>
        <span class="fs-5 text-gray-800">{!! !empty($patientCase->description)?nl2br(e($patientCase->description)):__('messages.common.n/a') !!}</span>
    </div>
</div>
