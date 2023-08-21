<div class="row">
    <div class="col-xxl-8">
        <div class="row">
            <div class="col-lg-5 col-md-6">
                <div class="d-flex align-items-center mb-md-10 mb-5">
                    <div class="image image-circle image-small">
                        <img alt="Logo" src="{{ asset(getLogoUrl()) }}" height="100px" width="100px">
                    </div>
                    <h3 class="ps-7">Invoice #{{ $invoice->invoice_id }}</h3>
                </div>
            </div>
            <div class="col-lg-5 col-md-3 col-6">
                <div class="d-flex flex-column mb-md-10 mb-5 mt-3 mt-md-0">
                    <label for="name"
                           class="pb-2 fs-5 text-gray-600">{{ __('messages.invoice.invoice_date').':' }}</label>
                    <span class="fs-5 text-gray-800">{{ \Carbon\Carbon::parse($invoice->invoice_date)->translatedFormat('jS M, Y') }}</span>
                </div>
            </div>
            <div class="col-md-2 col-6 text-end">
                <a target="_blank" href="{{ url('employee/invoices/'.$invoice->id.'/pdf') }}"
                   class="btn btn-sm btn-success">{{ __('messages.invoice.print_invoice') }}</a>
            </div>
            <div class="col-lg-5 col-md-6">
                <div class="d-flex flex-column mb-md-10 mb-5">
                    <label for="name" class="pb-2 fs-5 text-gray-600">{{__('messages.issued_item.issued_for')}}:</label>
                    <span class="fs-5 text-gray-800 mb-3">{{ $invoice->patient->patientUser->full_name }}</span>
                    <p class="text-gray-700 fs-5 mb-0">
                        @if(isset($invoice->patient->address) && !empty($invoice->patient->address))
                            {{ ucfirst($invoice->patient->address->address1) .' '. ucfirst($invoice->patient->address->address2) .',' . ucfirst($invoice->patient->address->city) .' '. $invoice->patient->address->zip }}
                        @else
                            {{ __('messages.common.n/a') }}
                        @endif
                    </p>
                </div>
            </div>
            <div class="col-md-2 col-md-6">
                <div class="d-flex flex-column mb-md-10 mb-5">
                    <label for="name" class="pb-2 fs-5 text-gray-600">{{__('messages.issued_item.issued_by')}}:</label>
                    <span class="fs-5 text-gray-800 mb-3">{{ getAppName() }}</span>
                    <p class="text-gray-700 fs-5 mb-0">
                        {{ ($hospitalAddress=="") ? __('messages.common.n/a') : $hospitalAddress }}</p>
                </div>
            </div>
            <div class="col-lg-5 col-md-6">
                <div class="d-flex flex-column mb-md-10 mb-5">
                    <label for="name" class="pb-2 fs-5 text-gray-600">{{ __('messages.common.created_on').':' }}</label>
                    <span class="fs-5 text-gray-800 mb-3"
                          title="{{ date('jS M, Y', strtotime($invoice->created_at)) }}">{{ $invoice->created_at->diffForHumans() }}</span>
                </div>
            </div>
            <div class="col-md-2 col-md-6">
                <div class="d-flex flex-column mb-md-10 mb-5">
                    <label for="name"
                           class="pb-2 fs-5 text-gray-600">{{ __('messages.common.last_updated').':' }}</label>
                    <span class="fs-5 text-gray-800 mb-3"
                          title="{{ date('jS M, Y', strtotime($invoice->updated_at)) }}">{{ $invoice->updated_at->diffForHumans() }}</span>
                </div>
            </div>
            <div class="col-12">
                <div class="table-responsive">
                    <table class="table table-striped box-shadow-none mt-4">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">{{ __('messages.account.account') }}</th>
                            <th scope="col">{{ __('messages.invoice.description') }}</th>
                            <th scope="col">{{ __('messages.invoice.qty') }}</th>
                            <th scope="col">{{ __('messages.invoice.price') }}</th>
                            <th scope="col">{{ __('messages.invoice.amount') }}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($invoice->invoiceItems as $index => $invoiceItem)
                            <tr class="py-4">
                                <td class="py-4">{{ $index + 1 }}</td>
                                <td class="py-4">{{ $invoiceItem->account->name }}</td>
                                <td class="py-4">{!! ($invoiceItem->description != '')?nl2br(e($invoiceItem->description)):'N/A' !!}</td>
                                <td class="py-4">{{ $invoiceItem->quantity }}</td>
                                <td class="py-4">
                                    <b>{{ getCurrencySymbol() }}</b> {{ number_format($invoiceItem->price) }}</td>
                                <td class="py-4">
                                    <b>{{ getCurrencySymbol() }}</b> {{ number_format($invoiceItem->total) }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-lg-5 ms-lg-auto mt-4">
                <div class="border-top">
                    <table class="table table-borderless bg-white box-shadow-none mb-0 mt-5">
                        <tbody class="bg-white">
                        <tr>
                            <td class="bg-white ps-0">{{ __('messages.invoice.sub_total').(':') }}</td>
                            <td class="bg-white text-gray-900 text-end pe-0">{{ getCurrencySymbol() }} {{ number_format($invoice->amount,2) }}</td>
                        </tr>
                        <tr>
                            <td class="bg-white ps-0">{{ __('messages.invoice.discount').(':') }}</td>
                            <td class="bg-white text-gray-900 text-end pe-0">{{ getCurrencySymbol() }} {{ number_format(($invoice->amount * $invoice->discount / 100),2) }}</td>
                        </tr>
                        <tr>
                            <td class="bg-white ps-0">{{ __('messages.invoice.total').(':') }}</td>
                            <td class="bg-white text-gray-900 text-end pe-0">{{ getCurrencySymbol() }} {{ number_format($invoice->amount - ($invoice->amount * $invoice->discount / 100),2)}}</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xxl-4">
        <div class="bg-gray-100 rounded-15 p-md-7 p-5 h-100 mt-xxl-0 mt-5 col-xxl-9 ms-xxl-auto">
            @if($invoice->status == \App\Models\Invoice::PENDING)
                <span class="badge bg-light-warning mb-6">Pending Payment</span>
            @elseif($invoice->status == \App\Models\Invoice::PAID)
                <span class="badge bg-light-success mb-6">Paid</span>
            @endif
            <h3 class="mb-5">PATIENT OVERVIEW</h3>
            <div class="row">
                <div class="col-xxl-12 col-lg-4 col-sm-6 d-flex flex-column mb-xxl-7 mb-lg-0 mb-4">
                    <label for="name"
                           class="pb-2 fs-5 text-gray-600">{{ __('messages.death_report.patient_name').':' }}</label>
                    <a href="{{ route('patients.show', ['patient' => $invoice->patient->id]) }}"
                       class="link-primary fs-5 text-decoration-none">{{ $invoice->patient->patientUser->full_name }}</a></div>
            </div>
            <div class="col-xxl-12 col-lg-4 col-sm-6 d-flex flex-column mb-xxl-7 mb-lg-0 mb-4">
                <label for="name" class="pb-2 fs-5 text-gray-600">{{ __('messages.bill.patient_email').':' }}</label>
                <span class="fs-5 text-gray-900">{{ $invoice->patient->patientUser->email }}</span>
            </div>
            <div class="col-xxl-12 col-lg-4 col-sm-6 d-flex flex-column mb-xxl-7">
                <label for="name" class="pb-2 fs-5 text-gray-600">{{ __('messages.bill.patient_gender').':' }}</label>
                <span class="fs-5 text-gray-900">{{ $invoice->patient->patientUser->gender == 1 ? __('messages.user.female'): __('messages.user.male') }}</span>
            </div>
        </div>
    </div>
</div>

