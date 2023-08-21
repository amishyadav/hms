<div class="row">
    <div class="col-md-6 d-flex flex-column mb-md-10 mb-5">
        {{ Form::label('name', __('messages.expense.name').(':'), ['class' => 'pb-2 fs-5 text-gray-600']) }}
        <span class="fs-5 text-gray-800">{{$expenses->name}}</span>
    </div>
    <div class="col-md-6 d-flex flex-column mb-md-10 mb-5">
        {{ Form::label('expense_head', __('messages.expense.expense_head').(':'), ['class' => 'pb-2 fs-5 text-gray-600']) }}
        <span class="fs-5 text-gray-800">{{$expenseHeads[$expenses->expense_head]}}</span>
    </div>
    <div class="col-md-6 d-flex flex-column mb-md-10 mb-5">
        {{ Form::label('invoice_number', __('messages.expense.invoice_number').(':'), ['class' => 'pb-2 fs-5 text-gray-600']) }}
        <p class="m-0">
            <span class="badge bg-light-primary fs-6">{{!empty($expenses->invoice_number)?$expenses->invoice_number:'N/A'}}</span>
        </p>
    </div>
    <div class="col-md-6 d-flex flex-column mb-md-10 mb-5">
        {{ Form::label('date', __('messages.expense.date').(':'), ['class' => 'pb-2 fs-5 text-gray-600']) }}
        <span class="fs-5 text-gray-800">{{date('jS M, Y', strtotime($expenses->date))}}</span>
    </div>
    <div class="col-md-6 d-flex flex-column mb-md-10 mb-5">
        {{ Form::label('amount', __('messages.expense.amount').(':'), ['class' => 'pb-2 fs-5 text-gray-600']) }}
        <span class="fs-5 text-gray-800"><b>{{ getCurrencySymbol() }}</b> {{ number_format($expenses->amount, 2) }}</span>
    </div>
    <div class="col-md-6 d-flex flex-column mb-md-10 mb-5">
        {{ Form::label('attachment', __('messages.expense.attachment').(':'), ['class' => 'pb-2 fs-5 text-gray-600']) }}
        <span class="fs-5 text-gray-800">
                                    @if(!empty($expenses->document_url))
                <a href="{{$expenses->document_url}}" class="text-decoration-none"
                   target="_blank">{{__('messages.common.view')}}</a>
            @else
                {{__('messages.common.n/a')}}
            @endif</span>
    </div>
    <div class="col-md-6 d-flex flex-column mb-md-10 mb-5">
        {{ Form::label('description', __('messages.expense.description').(':'), ['class' => 'pb-2 fs-5 text-gray-600']) }}
        <span class="fs-5 text-gray-800">
        {!! !empty($expenses->description)? nl2br(e($expenses->description)):'N/A' !!}
    </div>
    <div class="col-md-6 d-flex flex-column mb-md-10 mb-5">
        {{ Form::label('created_at', __('messages.common.created_on').(':'), ['class' => 'pb-2 fs-5 text-gray-600']) }}
        <span class="fs-5 text-gray-800"
              title="{{ date('jS M, Y', strtotime($expenses->created_at)) }}">{{ $expenses->created_at->diffForHumans() }}</span>
    </div>
    <div class="col-md-6 d-flex flex-column mb-md-10 mb-5">
        {{ Form::label('updated_at', __('messages.common.updated_at').(':'), ['class' => 'pb-2 fs-5 text-gray-600']) }}
        <span class="fs-5 text-gray-800"
              title="{{ date('jS M, Y', strtotime($expenses->updated_at)) }}">{{ $expenses->updated_at->diffForHumans() }}</span>
    </div>
</div>
