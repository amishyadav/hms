<div class="card mb-5 mb-xl-10 p-9">
{{--    <div class="card-header">--}}
{{--        <div class="card-title m-0">--}}
{{--            <h3 class="fw-bolder m-0">{{ __('messages.ipd_timelines') }}</h3>--}}
{{--        </div>--}}
        <div class="card-title">
            @if(Auth::user()->hasRole('Admin'))
                <a href="#" class="btn btn-primary float-end" data-bs-toggle="modal"
                   data-bs-target="#addOpdTimelineModal">
                    {{ __('messages.ipd_patient_timeline.new_ipd_timeline') }}
                </a>
            @endif
        </div>
    {{--    </div>--}}
    @if(Auth::user()->hasRole('Admin'))
        <div class="timeline-spacer"></div>
    @endif
    <div class="timeline-container">
        @forelse($opdTimelines as $opdTimeline)
            <div class="timeline-item row"
                 date-is="{{ \Carbon\Carbon::parse($opdTimeline->date)->translatedFormat('jS M, Y') }}">
                <div class="col-md-9">
                    <h3>{{ $opdTimeline->title }}</h3>
                    <p>{!! !empty($opdTimeline->description) ? nl2br(e($opdTimeline->description)) : __('messages.common.n/a') !!}</p>
                </div>
                <div class="text-end bottom-sm mb-5 col-md-3">
                    @if($opdTimeline->opd_timeline_document_url != '')
                        <a title="download" class="btn px-2 text-primary fs-3 py-2 text-info"
                           href="{{ url('opd-timelines-download'.'/'.$opdTimeline->id) }}">
                            <i class="fa fa-download action-icon"></i>
                        </a>
                    @endif
                    @if(Auth::user()->hasRole('Admin'))
                            <a title="<?php echo __('messages.common.edit') ?>" data-timeline-id="{{ $opdTimeline->id }}"
                               class="btn px-1 text-primary fs-2 edit-OpdTimeline-btn">
                                <i class="fa-solid fa-pen-to-square"></i>
                            </a>
                            <a href="javascript:void(0)" title="<?php echo __('messages.common.delete') ?>"
                               data-timeline-id="{{ $opdTimeline->id }}"
                               class="delete-OpdTimeline-btn btn px-1 text-danger fs-2">
                                <i class="fa-solid fa-trash"></i>
                            </a>
                    @endif
                </div>
            </div>
        @empty
            <div class="timeline-item timeline-spacer">
                <h3 class="my-0">{{ __('messages.ipd_patient_timeline.no_timeline_found') }}</h3>
            </div>
        @endforelse
    </div>
</div>
{{--<div class="card-toolbar">--}}
{{--    <div class="d-flex align-items-center py-1">--}}
{{--        <h3>{{ __('messages.ipd_timelines') }}</h3>--}}
{{--        <div class="ms-auto">--}}
{{--        </div>--}}
{{--    </div>--}}
{{--    <div class="timeline-container">--}}
{{--        @forelse($opdTimelines as $opdTimeline)--}}
{{--            <div class="timeline-item" date-is="{{ date('jS M, Y', strtotime($opdTimeline->date)) }}">--}}
{{--                <div class="float-end bottom-sm mb-5">--}}
{{--                    @if($opdTimeline->opd_timeline_document_url != '')--}}
{{--                        <a title="download" class="btn px-2 text-primary fs-3 py-2 text-info"--}}
{{--                           href="{{ url('opd-timelines-download'.'/'.$opdTimeline->id) }}">--}}
{{--                            <i class="fa fa-download action-icon"></i>--}}
{{--                        </a>--}}
{{--                    @endif--}}
{{--                    @if(Auth::user()->hasRole('Admin'))--}}
{{--                        <a title="<?php echo __('messages.common.edit') ?>" data-timeline-id="{{ $opdTimeline->id }}"--}}
{{--                           class="btn px-2 text-primary fs-3 py-2 edit-timeline-btn">--}}
{{--                            <i class="fa-solid fa-pen-to-square"></i>--}}
{{--                        </a>--}}
{{--                        <a href="#" title="<?php echo __('messages.common.delete') ?>"--}}
{{--                           data-timeline-id="{{ $opdTimeline->id }}"--}}
{{--                           class="delete-timeline-btn btn px-2 text-danger pe-0 py-2">--}}
{{--                            <i class="fa-solid fa-trash"></i>--}}
{{--                        </a>--}}
{{--                    @endif--}}
{{--                </div>--}}
{{--                <h3>{{ $opdTimeline->title }}</h3>--}}
{{--                <p>{!! !empty($opdTimeline->description) ? nl2br(e($opdTimeline->description)) : __('messages.common.n/a') !!}</p>--}}
{{--            </div>--}}
{{--        @empty--}}
{{--            <div class="timeline-item timeline-spacer">--}}
{{--                <h3 class="my-0">{{ __('messages.ipd_patient_timeline.no_timeline_found') }}</h3>--}}
{{--            </div>--}}
{{--        @endforelse--}}
{{--    </div>--}}
{{--</div>--}}
