<div class="row">
    <div class="col-md-6 d-flex flex-column mb-md-10 mb-5">
        <label class="pb-2 fs-5 text-gray-600">{{ __('messages.radiology_test.test_name')  }}</label>
        <span class="fs-5 text-gray-800">{{ $radiologyTest->test_name}}</span>
    </div>
    <div class="col-md-6 d-flex flex-column mb-md-10 mb-5">
        <label class="pb-2 fs-5 text-gray-600">{{ __('messages.radiology_test.short_name')  }}</label>
        <span class="fs-5 text-gray-800">{{ $radiologyTest->short_name}}</span>
    </div>
    <div class="col-md-6 d-flex flex-column mb-md-10 mb-5">
        <label class="pb-2 fs-5 text-gray-600">{{ __('messages.radiology_test.test_type')  }}</label>
        <span class="fs-5 text-gray-800">{{ $radiologyTest->test_type}}</span>
    </div>
    <div class="col-md-6 d-flex flex-column mb-md-10 mb-5">
        <label class="pb-2 fs-5 text-gray-600">{{ __('messages.radiology_test.category_name')  }}</label>
        <span class="fs-5 text-gray-800">{{$radiologyTest->radiologycategory->name}}</span>
    </div>
    <div class="col-md-6 d-flex flex-column mb-md-10 mb-5">
        <label class="pb-2 fs-5 text-gray-600">{{ __('messages.radiology_test.subcategory')  }}</label>
        <span class="fs-5 text-gray-800">{{ (!empty($radiologyTest->subcategory)) ? $radiologyTest->subcategory : __('messages.common.n/a') }}</span>
    </div>
    <div class="col-md-6 d-flex flex-column mb-md-10 mb-5">
        <label class="pb-2 fs-5 text-gray-600">{{ __('messages.radiology_test.report_days')  }}</label>
        <span class="fs-5 text-gray-800">{{ (!empty($radiologyTest->report_days)) ? $radiologyTest->report_days : __('messages.common.n/a') }}</span>
    </div>
    <div class="col-md-6 d-flex flex-column mb-md-10 mb-5">
        <label class="pb-2 fs-5 text-gray-600">{{ __('messages.radiology_test.charge_category')  }}</label>
        <span class="fs-5 text-gray-800">{{$radiologyTest->chargecategory->name}}</span>
    </div>
    <div class="col-md-6 d-flex flex-column mb-md-10 mb-5">
        <label class="pb-2 fs-5 text-gray-600">{{ __('messages.radiology_test.standard_charge')  }}</label>
        <span class="fs-5 text-gray-800"><b>{{ getCurrencySymbol() }}</b> {{ number_format($radiologyTest->standard_charge) }}</span>
    </div>
    <div class="col-md-6 d-flex flex-column mb-md-10 mb-5">
        <label class="pb-2 fs-5 text-gray-600">{{ __('messages.common.created_on')  }}</label>
        <span class="fs-5 text-gray-800" data-toggle="tooltip" data-placement="right"
              title="{{ \Carbon\Carbon::parse($radiologyTest->created_at)->translatedFormat('jS M, Y') }}">{{ \Carbon\Carbon::parse($radiologyTest->created_at)->diffForHumans() }}</span>
    </div>
    <div class="col-md-6 d-flex flex-column mb-md-10 mb-5">
        <label class="pb-2 fs-5 text-gray-600">{{ __('messages.common.last_updated')  }}</label>
        <span class="fs-5 text-gray-800" data-toggle="tooltip" data-placement="right"
              title="{{ \Carbon\Carbon::parse($radiologyTest->updated_at)->translatedFormat('jS M, Y') }}">{{ \Carbon\Carbon::parse($radiologyTest->updated_at)->diffForHumans() }}</span>
    </div>
</div>
