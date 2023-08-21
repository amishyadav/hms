<div class="row">
    <div class="col-md-6 d-flex flex-column mb-md-10 mb-5">
        <label class="pb-2 fs-5 text-gray-600">{{ __('messages.case.patient').(':')  }}</label>
        <span class="fs-5 text-gray-800">{{$appointment->patient->user->full_name}}</span>
    </div>
    <div class="col-md-6 d-flex flex-column mb-md-10 mb-5">
        <label class="pb-2 fs-5 text-gray-600">{{ __('messages.case.doctor').(':')  }}</label>
        <span class="fs-5 text-gray-800">{{$appointment->doctor->user->full_name}}</span>
    </div>
    <div class="col-md-6 d-flex flex-column mb-md-10 mb-5">
        <label class="pb-2 fs-5 text-gray-600">{{ __('messages.appointment.doctor_department').(':')  }}</label>
        <p>
            <span class="fs-5 text-gray-800">{{ $appointment->doctor->department->title }}</span>
        </p>
    </div>
    <div class="col-md-6 d-flex flex-column mb-md-10 mb-5">
        <label class="pb-2 fs-5 text-gray-600">{{ __('messages.common.created_on').(':')  }}</label>
        <span class="fs-5 text-gray-800" data-toggle="tooltip" data-placement="right"
              title="{{ date('jS M, Y', strtotime($appointment->created_at)) }}">{{ $appointment->created_at->diffForHumans() }}</span>
    </div>
    <div class="col-md-6 d-flex flex-column mb-md-10 mb-5">
        <label class="pb-2 fs-5 text-gray-600">{{ __('messages.common.last_updated').(':')  }}</label>
        <span class="fs-5 text-gray-800" data-toggle="tooltip" data-placement="right"
              title="{{ date('jS M, Y', strtotime($appointment->updated_at)) }}">{{ $appointment->updated_at->diffForHumans() }}</span>
    </div>
    <div class="col-md-6 d-flex flex-column mb-md-10 mb-5">
        <label class="pb-2 fs-5 text-gray-600">{{ __('messages.common.status').(':')  }}</label>
        <p>
            <span class="badge fs-6 bg-light-{{!empty($appointment->is_completed === \App\Models\Appointment::STATUS_COMPLETED) ? 'success' : 'danger'}}">{{ ($appointment->is_completed === \App\Models\Appointment::STATUS_COMPLETED) ? __('messages.appointment.completed') : __('messages.appointment.pending') }}</span>
        </p>
    </div>
    <div class="col-md-6 d-flex flex-column mb-md-10 mb-5">
        <label class="pb-2 fs-5 text-gray-600">{{ __('messages.appointment.date').(':')  }}</label>
        <span class="fs-5 text-gray-800">   {{ isset($appointment->opd_date) ? \Carbon\Carbon::parse($appointment->opd_date)->translatedFormat('jS M, Y g:i A') : __('messages.common.n/a') }}</span>
    </div>
    <div class="col-md-6 d-flex flex-column mb-md-10 mb-5">
        <label class="pb-2 fs-5 text-gray-600">{{ __('messages.common.description').(':')  }}</label>
        <span class="fs-5 text-gray-800">{!! !empty($appointment->problem) ? nl2br(e($appointment->problem)) : __('messages.common.n/a')  !!}</span>
    </div>
</div>
