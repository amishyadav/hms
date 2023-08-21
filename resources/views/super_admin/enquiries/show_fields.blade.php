<div class="row">
    <div class="col-md-6 d-flex flex-column mb-md-10 mb-5">
        {{ Form::label('name', __('messages.enquiry.name').(':'), ['class' => 'pb-2 fs-5 text-gray-600']) }}
        <span class="fs-5 text-gray-800">{{ $enquiry->full_name}}</span>
    </div>
    <div class="col-md-6 d-flex flex-column mb-md-10 mb-5">
        {{ Form::label('email', __('messages.enquiry.email').(':'), ['class' => 'pb-2 fs-5 text-gray-600']) }}
        <span class="fs-5 text-gray-800">{{$enquiry->email}}</span>
    </div>
    <div class="col-md-6 d-flex flex-column mb-md-10 mb-5">
        {{ Form::label('contact', __('messages.enquiry.contact').(':'), ['class' => 'pb-2 fs-5 text-gray-600']) }}
        <span class="fs-5 text-gray-800">{{$enquiry->phone}}</span>
    </div>
    <div class="col-md-6 d-flex flex-column mb-md-10 mb-5">
        {{ Form::label('status', __('messages.common.status').(':'), ['class' => 'pb-2 fs-5 text-gray-600']) }}
        <p class="m-0">
            <span class="badge fs-6 bg-light-{{!empty($enquiry->status) ? 'success' : 'danger'}}">{{($enquiry->status) ? __('messages.enquiry.read') : __('messages.enquiry.unread')}}</span>
        </p>
    </div>
    <div class="col-md-6 d-flex flex-column mb-md-10 mb-5">
        {{ Form::label('created_at', __('messages.common.created_on').(':'), ['class' => 'pb-2 fs-5 text-gray-600']) }}
        <span class="fs-5 text-gray-800"
              title="{{ date('jS M, Y', strtotime($enquiry->created_at)) }}">{{ $enquiry->created_at->diffForHumans() }}</span>
    </div>
    <div class="col-md-6 d-flex flex-column mb-md-10 mb-5">
        {{ Form::label('updated_at', __('messages.common.updated_at').(':'), ['class' => 'pb-2 fs-5 text-gray-600']) }}
        <span class="fs-5 text-gray-800"
              title="{{ date('jS M, Y', strtotime($enquiry->updated_at)) }}">{{ $enquiry->updated_at->diffForHumans() }}</span>
    </div>
    <div class="col-md-6 d-flex flex-column mb-md-10 mb-5">
        {{ Form::label('message', __('messages.enquiry.message').(':'), ['class' => 'pb-2 fs-5 text-gray-600']) }}
        <span class="fs-5 text-gray-800">{!! nl2br(e($enquiry->message)) !!}</span>
    </div>
</div>
