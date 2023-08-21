<div>
    <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="poverview" role="tabpanel">
            <div class="card mb-5 mb-xl-10">
                <div>
                    <div class="card-body  border-top p-9">
                        <div class="row mb-7">
                            <div class="col-md-6 d-flex flex-column mb-md-10 mb-5">
                                {{ Form::label('send_to', __('messages.sms.send_to').(':'), ['class' => 'pb-2 fs-5 text-gray-600']) }}
                                <span
                                    class="fs-5 text-gray-800">{{ !empty($sms->user && $sms->user->full_name) ? $sms->user->full_name : __('messages.common.n/a') }}</span>
                            </div>
                            <div class="col-md-6 d-flex flex-column mb-md-10 mb-5">
                                {{ Form::label('employee_payroll', __('messages.employee_payroll.role').(':'), ['class' => 'pb-2 fs-5 text-gray-600']) }}
                                <span class="fs-5 text-gray-800">
                                 @if(isset($sms->user))
                                        {{$sms->user->roles->pluck('name')->first()}}
                                    @else
                                        {{ __('messages.common.n/a') }}
                                    @endif
                                </span>
                            </div>
                            <div class="col-md-6 d-flex flex-column mb-md-10 mb-5">
                                {{ Form::label('employee_payroll', __('messages.user.phone').(':'), ['class' => 'pb-2 fs-5 text-gray-600']) }}
                                <span class="fs-5 text-gray-800">{{$sms->phone_number}}</span>
                            </div>
                            <div class="col-md-6 d-flex flex-column mb-md-10 mb-5">
                                {{ Form::label('employee_payroll', __('messages.sms.date').(':'), ['class' => 'pb-2 fs-5 text-gray-600']) }}
                                <span class="fs-5 text-gray-800">{{\Carbon\Carbon::parse($sms->created_at)->format('jS M,Y g:i A')}}</span>
                            </div>
                            <div class="col-md-6 d-flex flex-column mb-md-10 mb-5">
                                {{ Form::label('employee_payroll', __('messages.sms.send_by').(':'), ['class' => 'pb-2 fs-5 text-gray-600']) }}
                                <span class="fs-5 text-gray-800">{{$sms->sendBy->full_name}}</span>
                            </div>
                            <div class="col-md-6 d-flex flex-column mb-md-10 mb-5">
                                {{ Form::label('employee_payroll', __('messages.sms.message').(':'), ['class' => 'pb-2 fs-5 text-gray-600']) }}
                                <span class="fs-5 text-gray-800">
                                    @if($sms->message)
                                        {!! nl2br(e($sms->message)) !!}
                                    @else
                                        {{ __('messages.common.n/a') }}
                                    @endif
                                </span>
                            </div>
                            <div class="col-md-6 d-flex flex-column mb-md-10 mb-5">
                                {{ Form::label('updated_at', __('messages.common.updated_at').(':'), ['class' => 'pb-2 fs-5 text-gray-600']) }}
                                <span class="fs-5 text-gray-800" title="{{ date('jS M, Y', strtotime($sms->updated_at)) }}">{{ $sms->updated_at->diffForHumans() }}</span>
                            </div>
                            <div class="col-md-6 d-flex flex-column mb-md-10 mb-5">
                                {{ Form::label('description', __('messages.item.description').(':'), ['class' => 'pb-2 fs-5 text-gray-600']) }}
                                <span class="fs-5 text-gray-800">{!! !empty($sms->description) ? nl2br(e($sms->description)) : __('messages.common.n/a')  !!}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
