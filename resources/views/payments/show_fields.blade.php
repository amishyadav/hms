<div>
    <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="poverview" role="tabpanel">
            <div class="card mb-5 mb-xl-10">
                <div class="card-body">
                        <div class="row mb-7">
                            <div class="col-md-6 d-flex flex-column mb-md-10 mb-5">
                                {{ Form::label('account', __('messages.account.account').(':'), ['class' => 'pb-2 fs-5 text-gray-600']) }}
                                <span class="fs-5 text-gray-800">{{$payment->account->name}}</span>
                            </div>
                            <div class="col-md-6 d-flex flex-column mb-md-10 mb-5">
                                {{ Form::label('payment_date', __('messages.payment.payment_date').(':'), ['class' => 'pb-2 fs-5 text-gray-600']) }}
                                <span class="fs-5 text-gray-800">{{ \Carbon\Carbon::parse($payment->payment_date)->translatedFormat('jS M, Y')}}</span>
                            </div>
                            <div class="col-md-6 d-flex flex-column mb-md-10 mb-5">
                                {{ Form::label('pay_to', __('messages.payment.pay_to').(':'), ['class' => 'pb-2 fs-5 text-gray-600']) }}
                                <span class="fs-5 text-gray-800">{{ $payment->pay_to}}</span>
                            </div>
                            <div class="col-md-6 d-flex flex-column mb-md-10 mb-5">
                                {{ Form::label('amount', __('messages.payment.amount').(':'), ['class' => 'pb-2 fs-5 text-gray-600']) }}
                                <span class="fs-5 text-gray-800"><b>{{ getCurrencySymbol() }}</b> {{ number_format($payment->amount,2) }}</span>
                            </div>
                            <div class="col-md-6 d-flex flex-column mb-md-10 mb-5">
                                {{ Form::label('created_at', __('messages.common.created_on').(':'), ['class' => 'pb-2 fs-5 text-gray-600']) }}
                                <span class="fs-5 text-gray-800" title="{{ date('jS M, Y', strtotime($payment->created_at)) }}">{{ $payment->created_at->diffForHumans() }}</span>
                            </div>
                            <div class="col-md-6 d-flex flex-column mb-md-10 mb-5">
                                {{ Form::label('updated_at', __('messages.common.updated_at').(':'), ['class' => 'pb-2 fs-5 text-gray-600']) }}
                                <span class="fs-5 text-gray-800" title="{{ date('jS M, Y', strtotime($payment->updated_at)) }}">{{ $payment->updated_at->diffForHumans() }}</span>
                            </div>
                            <div class="col-lg-12 d-flex flex-column">
                                {{ Form::label('description', __('messages.common.description').(':'), ['class' => 'pb-2 fs-5 text-gray-600']) }}
                                <span class="fs-5 text-gray-800"><b> {!! ($payment->description != '')?nl2br(e($payment->description)):'N/A' !!}</span>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </div>
</div>
