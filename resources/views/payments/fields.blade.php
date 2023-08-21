<div class="row gx-10 mb-5">
    <div class="col-sm-6 mb-5">
        {{ Form::label('account_id', __('messages.payment.account').(':'),['class' => 'form-label required']) }}
        {{ Form::select('account_id', $accounts, null, ['class' => 'form-select','required','id' => 'accountId','placeholder'=>__('messages.document.select_account'),'data-control' => 'select2']) }}
    </div>
    <div class="col-sm-6 mb-5">
        {{ Form::label('payment_date', __('messages.payment.payment_date').(':'),['class' => 'form-label required']) }}
        {{ Form::text('payment_date', null, ['id'=>'paymentDate', 'class' => 'form-control bg-white', 'required','autocomplete' => 'off']) }}
    </div>
    <div class="col-sm-6 mb-5">
        {{ Form::label('pay_to', __('messages.payment.pay_to').(':'),['class' => 'form-label required']) }}
        {{ Form::text('pay_to', null, ['class' => 'form-control', 'required']) }}
    </div>
    <div class="col-sm-6 mb-5">
        {{ Form::label('amount', __('messages.payment.amount').(':'),['class' => 'form-label required']) }}
        {{ Form::text('amount', null, ['class' => 'form-control price-input price', 'required', 'onkeyup' => 'if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,"")']) }}
    </div>
    <div class="col-sm-6 mb-5">
        {{ Form::label('description', __('messages.payment.description').(':'),['class' => 'form-label']) }}
        {{ Form::textarea('description', null, ['class' => 'form-control', 'rows' => 4]) }}
    </div>
</div>
<div class="d-flex justify-content-end">
    {!! Form::submit(__('messages.common.save'), ['class' => 'btn btn-primary me-3','id' => 'btnSave']) !!}
    <a href="{!! route('payments.index') !!}"
       class="btn btn-secondary
">{!! __('messages.common.cancel') !!}</a>
</div>
