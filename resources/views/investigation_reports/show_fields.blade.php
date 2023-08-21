<div class="row">
    <div class="col-md-6 d-flex flex-column mb-md-10 mb-5">
        <label class="pb-2 fs-5 text-gray-600">{{ __('messages.investigation_report.patient').(':')  }}</label>
        <span class="fs-5 text-gray-800">{{ $investigationReport->patient->user->full_name}}</span>
    </div>
    <div class="col-md-6 d-flex flex-column mb-md-10 mb-5">
        <label class="pb-2 fs-5 text-gray-600">{{ __('messages.investigation_report.doctor').(':')  }}</label>
        <span class="fs-5 text-gray-800">{{$investigationReport->doctor->user->full_name}}</span>
    </div>
    <div class="col-md-6 d-flex flex-column mb-md-10 mb-5">
        <label class="pb-2 fs-5 text-gray-600">{{ __('messages.investigation_report.date').(':')  }}</label>
        <span class="fs-5 text-gray-800">{{ \Carbon\Carbon::parse($investigationReport->date)->translatedFormat('jS M, Y g:i A') }}</span>
    </div>
    <div class="col-md-6 d-flex flex-column mb-md-10 mb-5">
        <label class="pb-2 fs-5 text-gray-600">{{ __('messages.investigation_report.title').(':') }}</label>
        <span class="fs-5 text-gray-800">{{ $investigationReport->title }}</span>
    </div>
    <div class="col-md-6 d-flex flex-column mb-md-10 mb-5">
        <label class="pb-2 fs-5 text-gray-600">{{ __('messages.investigation_report.description').(':') }}</label>
        <span class="fs-5 text-gray-800">{!! (!empty($investigationReport->description)) ? nl2br(e($investigationReport->description)) : __('messages.common.n/a')  !!}</span>
    </div>
    <div class="col-md-6 d-flex flex-column mb-md-10 mb-5">
        <label class="pb-2 fs-5 text-gray-600">{{ __('messages.document.attachment').(':')  }}</label>
        <span class="fs-5 text-gray-800">
                                    @if(!empty($investigationReport->attachment_url))
                <a href="{{$investigationReport->attachment_url}}" class="text-decoration-none" target="_blank">View</a>
            @else
                N/A
            @endif
                                </span>
    </div>
    <div class="col-md-6 d-flex flex-column mb-md-10 mb-5">
        <label class="pb-2 fs-5 text-gray-600">{{ __('messages.common.status').(':')  }}</label>
        <p class="m-0">
            <span class="badge fs-6 bg-light-{{($investigationReport->status == 1) ? 'success' : 'danger'}}">{{ ($investigationReport->status == 1) ? 'Solved' : 'Not Solved' }}</span>
        </p>
    </div>
    <div class="col-md-6 d-flex flex-column mb-md-10 mb-5">
        <label class="pb-2 fs-5 text-gray-600">{{ __('messages.common.created_on').(':')  }}</label>
        <span class="fs-5 text-gray-800" data-toggle="tooltip" data-placement="right"
              title="{{ date('jS M, Y', strtotime($investigationReport->created_at)) }}">{{ $investigationReport->created_at->diffForHumans() }}</span>
    </div>
    <div class="col-md-6 d-flex flex-column mb-md-10 mb-5">
        <label class="pb-2 fs-5 text-gray-600">{{ __('messages.common.last_updated').(':')  }}</label>
        <span class="fs-5 text-gray-800" data-toggle="tooltip" data-placement="right"
              title="{{ date('jS M, Y', strtotime($investigationReport->updated_at)) }}">{{ $investigationReport->updated_at->diffForHumans() }}</span>
    </div>
</div>
