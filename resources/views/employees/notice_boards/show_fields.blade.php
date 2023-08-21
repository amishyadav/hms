<div class="row">
    <div class="col-md-6 d-flex flex-column mb-md-10 mb-5">
        {{ Form::label('title', __('messages.notice_board.title').':', ['class' => 'pb-2 fs-5 text-gray-600']) }}
        <span class="fs-5 text-gray-800">{{ $noticeBoard->title }}</span>
    </div>
    <div class="col-md-6 d-flex flex-column mb-md-10 mb-5">
        {{ Form::label('created_at', __('messages.common.created_on').':', ['class' => 'pb-2 fs-5 text-gray-600']) }}
        <span data-toggle="tooltip" data-placement="right"
              title="{{ date('jS M, Y', strtotime($noticeBoard->created_at)) }}"
              class="fs-5 text-gray-800">{{ $noticeBoard->created_at->diffForHumans() }}</span>
    </div>
    <div class="col-md-6 d-flex flex-column mb-md-10 mb-5">
        {{ Form::label('updated_at', __('messages.common.last_updated').':', ['class' => 'pb-2 fs-5 text-gray-600']) }}
        <span data-toggle="tooltip" data-placement="right"
              title="{{ date('jS M, Y', strtotime($noticeBoard->updated_at)) }}"
              class="fs-5 text-gray-800">{{ $noticeBoard->updated_at->diffForHumans() }}</span>
    </div>
    <div class="col-md-6 d-flex flex-column mb-md-10 mb-5">
        {{ Form::label('description', __('messages.notice_board.description').':', ['class' => 'pb-2 fs-5 text-gray-600']) }}
        <span
                class="fs-5 text-gray-800">{!! !empty($noticeBoard->description)? nl2br(e($noticeBoard->description)):'N/A' !!}</span>
    </div>
</div>
