<div class="row">
    <div class="col-md-6 d-flex flex-column mb-md-10 mb-5">
        <label class="pb-2 fs-5 text-gray-600">{{ __('messages.incomes.name')  }}</label>
        <span class="fs-5 text-gray-800">{{$incomes->name}}</span>
    </div>
    <div class="col-md-6 d-flex flex-column mb-md-10 mb-5">
        <label class="pb-2 fs-5 text-gray-600">{{ __('messages.incomes.income_head')  }}</label>
        <span class="fs-5 text-gray-800">{{$incomeHeads[$incomes->income_head]}}</span>
    </div>
    <div class="col-md-6 d-flex flex-column mb-md-10 mb-5">
        <label class="pb-2 fs-5 text-gray-600">{{ __('messages.incomes.invoice_number')  }}</label>
        <p class="m-0">
            <span class="badge bg-light-info">{{ !empty($incomes->invoice_number)?$incomes->invoice_number:'N/A' }}</span>
        </p>
    </div>
    <div class="col-md-6 d-flex flex-column mb-md-10 mb-5">
        <label class="pb-2 fs-5 text-gray-600">{{ __('messages.incomes.date')  }}</label>
        <span class="fs-5 text-gray-800">{{ date('jS M, Y', strtotime($incomes->date))}}</span>
    </div>
    <div class="col-md-6 d-flex flex-column mb-md-10 mb-5">
        <label class="pb-2 fs-5 text-gray-600">{{ __('messages.incomes.amount')  }}</label>
        <span class="fs-5 text-gray-800"><b>{{ getCurrencySymbol() }}</b> {{ number_format($incomes->amount, 2) }}</span>
    </div>
    <div class="col-md-6 d-flex flex-column mb-md-10 mb-5">
        <label class="pb-2 fs-5 text-gray-600">{{ __('messages.incomes.attachment')  }}</label>
        <span class="fs-5 text-gray-800">
                                @if(!empty($incomes->document_url))
                <a href="{{$incomes->document_url}}" class="text-decoration-none" target="_blank">View</a>
            @else
                N/A
            @endif
                                </span>
    </div>
    <div class="col-md-6 d-flex flex-column mb-md-10 mb-5">
        <label class="pb-2 fs-5 text-gray-600">{{ __('messages.incomes.description')  }}</label>
        <span class="fs-5 text-gray-800"> {!! !empty($incomes->description) ? nl2br(e($incomes->description)) : 'N/A' !!}
                                </span>
    </div>
    <div class="col-md-6 d-flex flex-column mb-md-10 mb-5">
        <label class="pb-2 fs-5 text-gray-600">{{ __('messages.common.created_on')  }}</label>
        <span class="fs-5 text-gray-800" data-toggle="tooltip" data-placement="right"
              title="{{ \Carbon\Carbon::parse($incomes->created_at)->translatedFormat('jS M, Y') }}">{{ \Carbon\Carbon::parse($incomes->created_at)->diffForHumans() }}</span>
    </div>
    <div class="col-md-6 d-flex flex-column mb-md-10 mb-5">
        <label class="pb-2 fs-5 text-gray-600">{{ __('messages.common.last_updated')  }}</label>
        <span class="fs-5 text-gray-800" data-toggle="tooltip" data-placement="right"
              title="{{ \Carbon\Carbon::parse($incomes->updated_at)->translatedFormat('jS M, Y') }}">{{ \Carbon\Carbon::parse($incomes->updated_at)->diffForHumans() }}</span>
    </div>
</div>
