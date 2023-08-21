<div>
    <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="poverview" role="tabpanel">
            <div class="card mb-5 mb-xl-10">
                <div>
                    <div class="card-body  border-top p-9">
                        <div class="row mb-7">
                            <div class="col-md-6 d-flex flex-column mb-md-10 mb-5">
                                <label
                                        class="pb-2 fs-5 text-gray-600">{{ __('messages.insurance.insurance').(':') }}</label>
                                <span class="fs-5 text-gray-800">{{ $insurance->name}}</span>
                            </div>
                            <div class="col-md-6 d-flex flex-column mb-md-10 mb-5">
                                <label
                                        class="pb-2 fs-5 text-gray-600">{{ __('messages.insurance.service_tax').(':')  }}</label>
                                <span class="fs-5 text-gray-800"><b>{{ getCurrencySymbol() }}</b> {{ number_format($insurance->service_tax, 2)  }}</span>
                            </div>
                            <div class="col-md-6 d-flex flex-column mb-md-10 mb-5">
                                <label class="pb-2 fs-5 text-gray-600">{{ __('messages.insurance.discount').(':')  }}</label>
                                <span class="fs-5 text-gray-800">{{ isset($insurance->discount) ? $insurance->discount.'%':'N/A'}}</span>
                            </div>
                            <div class="col-md-6 d-flex flex-column mb-md-10 mb-5">
                                <label class="pb-2 fs-5 text-gray-600">{{ __('messages.insurance.insurance_no').(':')  }}</label>
                                <span class="fs-5 text-gray-800">{{ $insurance->insurance_no}}</span>
                            </div>
                            <div class="col-md-6 d-flex flex-column mb-md-10 mb-5">
                                <label class="pb-2 fs-5 text-gray-600">{{ __('messages.insurance.insurance_code').(':')  }}</label>
                                <span class="fs-5 text-gray-800">{{$insurance->insurance_code }}</span>
                            </div>
                            <div class="col-md-6 d-flex flex-column mb-md-10 mb-5">
                                <label class="pb-2 fs-5 text-gray-600">{{ __('messages.insurance.hospital_rate').(':')  }}</label>
                                <span class="fs-5 text-gray-800">{{ number_format($insurance->hospital_rate, 2) }}</span>
                            </div>
                            <div class="col-md-6 d-flex flex-column mb-md-10 mb-5">
                                <label class="pb-2 fs-5 text-gray-600">{{ __('messages.common.total').(':')  }}</label>
                                <span class="fs-5 text-gray-800"><b>{{ getCurrencySymbol() }}</b> {{ number_format($insurance->total, 2) }}</span>
                            </div>
                            <div class="col-md-6 d-flex flex-column mb-md-10 mb-5">
                                <label class="pb-2 fs-5 text-gray-600">{{ __('messages.common.status').(':')  }}</label>
                                <p class="m-0">
                                    <span
                                            class="badge fs-6 bg-light-{{!empty($insurance->status === 1) ? 'success' : 'danger'}}">{{($insurance->status === 1) ? __('messages.common.active') : __('messages.common.de_active')}}</span>
                                </p>
                            </div>
                            <div class="col-md-6 d-flex flex-column mb-md-10 mb-5">
                                <label
                                        class="pb-2 fs-5 text-gray-600">{{ __('messages.insurance.remark').(':')  }}</label>
                                <span
                                        class="fs-5 text-gray-800">{!! !empty($insurance->remark) ? nl2br(e($insurance->remark)):'N/A'  !!}</span>
                            </div>
                            <div class="col-md-6 d-flex flex-column mb-md-10 mb-5">
                                <label
                                        class="pb-2 fs-5 text-gray-600">{{ __('messages.common.created_at').(':')  }}</label>
                                <span
                                        class="fs-5 text-gray-800">{{ $insurance->created_at->diffForHumans() }}</span>
                            </div>
                            <div class="col-md-6 d-flex flex-column mb-md-10 mb-5">
                                <label
                                        class="pb-2 fs-5 text-gray-600">{{ __('messages.common.last_updated').(':')  }}</label>
                                <span
                                        class="fs-5 text-gray-800">{{ $insurance->updated_at->diffForHumans() }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <h1 class="mb-5">{{ __('messages.insurance.disease_details') }}</h1>
    <div class="row">
        <div class="col-lg-12">
            <div class="table-responsive viewList">
                <table id="InsuranceAccountPayments" class="table table-striped border-bottom-0">
                    <thead>
                    <tr class="fw-bold fs-6 text-muted">
                        <th class="text-center">#</th>
                        <th class="w-75">{{ __('messages.insurance.diseases_name') }}</th>
                        <th class="w-25 text-right">
                            <div class="d-flex justify-content-end me-5">
                                {{ __('messages.insurance.diseases_charge') }}
                            </div>
                        </th>
                    </tr>
                    </thead>
                    <tbody class="fw-bold">
                    @forelse($diseases as $index => $disease)
                        <tr>
                            <td class="text-center w-5 border-0">{{ $loop->iteration }}</td>
                            <td class="border-0">
                                {{ $disease->disease_name }}
                            </td>
                            <td class="table__qty text-right border-0">
                                <div class="d-flex justify-content-end me-5">
                                    {{ getCurrencySymbol() }} {{ number_format($disease->disease_charge, 2) }}
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td class="text-center" colspan="3">{{__('messages.common.no_data_available')}}</td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
