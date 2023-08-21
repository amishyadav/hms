<div class="row">
    <div class="col-12">
        <div class="row">
            <div class="col-lg-5 col-md-6">
                <div class="d-flex align-items-center mb-md-10 mb-5">
                    <div class="image image-circle image-small">
                        <img alt="Logo" src="{{ asset(getLogoUrl()) }}" height="100px" width="100px">
                    </div>
                    <h3 class="ps-7">Bill #{{ $bill->bill_id }}</h3>
                </div>
            </div>
            <div class="col-lg-5 col-md-3 col-6">
                <div class="d-flex flex-column mb-md-10 mb-5 mt-3 mt-md-0">
                    <label for="name" class="pb-2 fs-5 text-gray-600">{{ __('messages.bill.bill_date') }}:</label>
                    <span class="fs-5 text-gray-800">{{ Carbon\Carbon::parse($bill->bill_date)->format('jS M, Y g:i A') }}</span>
                </div>
            </div>
            <div class="col-md-2 col-6 text-end">
                <a target="_blank" href="{{ url('employee/bills/'.$bill->id.'/pdf') }}"
                   class="btn btn-sm btn-success">{{ __('messages.invoice.print_invoice') }}</a>
            </div>
            <div class="col-md-3 col-sm-6 d-flex flex-column mb-md-10 mb-5">
                <div class="pb-2 fs-5 text-gray-600">{{ __('messages.case.patient').':' }}</div>
                <div class="fs-5 text-gray-800">{{ $bill->patient->user->full_name }}</div>
            </div>
            <div class="col-md-3  col-sm-6 d-flex flex-column mb-md-10 mb-5">
                <div class="pb-2 fs-5 text-gray-600">{{ __('messages.bill.admission_id').':' }}</div>
                <div class="fs-5 text-gray-800">{{ $bill->patientAdmission->patient_admission_id }}</div>
            </div>
            <div class="col-md-3  col-sm-6 d-flex flex-column mb-md-10 mb-5">
                <div class="pb-2 fs-5 text-gray-600">{{ __('messages.bill.patient_email').':' }}</div>
                <div
                        class="fs-5 text-gray-800">{{ !empty($bill->patient->user->email) ? $bill->patient->user->email : __('messages.common.n/a') }}</div>
            </div>
            <div class="col-md-3 col-sm-6 d-flex flex-column mb-md-10 mb-5">
                <div class="pb-2 fs-5 text-gray-600">{{ __('messages.bill.patient_cell_no').':' }}</div>
                <div
                        class="fs-5 text-gray-800">{{ !empty($bill->patient->user->phone) ? $bill->patient->user->phone : __('messages.common.n/a') }}</div>
            </div>
            <div class="col-md-3 col-sm-6 d-flex flex-column mb-md-10 mb-5">
                <div class="pb-2 fs-5 text-gray-600">{{ __('messages.bill.patient_gender').':' }}</div>
                <div
                        class="fs-5 text-gray-800">{{ (!$bill->patient->user->gender) ? __('messages.user.male') : __('messages.user.female') }}</div>
            </div>
            <div class="col-md-3  col-sm-6 d-flex flex-column mb-md-10 mb-5">
                <div class="pb-2 fs-5 text-gray-600">{{ __('messages.bill.patient_dob').':' }}</div>
                <div
                        class="fs-5 text-gray-800">{{ (!empty($bill->patient->user->dob)) ? \Carbon\Carbon::parse($bill->patient->user->dob)->translatedFormat('jS M, Y') : __('messages.common.n/a') }}</div>
            </div>
            <div class="col-md-3 col-sm-6 d-flex flex-column mb-md-10 mb-5">
                <div class="pb-2 fs-5 text-gray-600">{{ __('messages.case.doctor').':' }}</div>
                <div
                        class="fs-5 text-gray-800">{{ $bill->patientAdmission->doctor->user->full_name }}</div>
            </div>
            <div class="col-md-3 col-sm-6 d-flex flex-column mb-md-10 mb-5">
                <div class="pb-2 fs-5 text-gray-600">{{ __('messages.bill.admission_date').':' }}</div>
                <div
                        class="fs-5 text-gray-800">{{ \Carbon\Carbon::parse($bill->patientAdmission->admission_date)->translatedFormat('jS M, Y g:i A') }}</div>
            </div>
            <div class="col-md-3  col-sm-6 d-flex flex-column mb-md-10 mb-5">
                <div class="pb-2 fs-5 text-gray-600">{{ __('messages.bill.discharge_date').':' }}</div>
                <div
                        class="fs-5 text-gray-800">{{ !empty($bill->patientAdmission->discharge_date) ? date('jS M, Y g:i A', strtotime($bill->patientAdmission->discharge_date)) : __('messages.common.n/a') }}</div>
            </div>
            <div class="col-md-3 col-sm-6 d-flex flex-column mb-md-10 mb-5">
                <div class="pb-2 fs-5 text-gray-600">{{ __('messages.bill.package_name').':' }}</div>
                <div
                        class="fs-5 text-gray-800">{{ !empty($bill->patientAdmission->package->name) ? $bill->patientAdmission->package->name : __('messages.common.n/a') }}</div>
            </div>
            <div class="col-md-3 col-sm-6 d-flex flex-column mb-md-10 mb-5">
                <div class="pb-2 fs-5 text-gray-600">{{ __('messages.bill.insurance_name').':' }}</div>
                <div
                        class="fs-5 text-gray-800">{{ !empty($bill->patientAdmission->insurance->name) ? $bill->patientAdmission->insurance->name: __('messages.common.n/a') }}</div>
            </div>
            <div class="col-md-3 col-sm-6 d-flex flex-column mb-md-10 mb-5">
                <div class="pb-2 fs-5 text-gray-600">{{ __('messages.bill.total_days').':' }}</div>
                <div class="fs-5 text-gray-800">{{ $bill->totalDays }}</div>
            </div>
            <div class="col-md-3 col-sm-6 d-flex flex-column mb-md-10 mb-5">
                <div class="pb-2 fs-5 text-gray-600">{{ __('messages.bill.policy_no').':' }}</div>
                <div
                        class="fs-5 text-gray-800">{{ !empty($bill->patientAdmission->policy_no) ? $bill->patientAdmission->policy_no : __('messages.common.n/a') }}</div>
            </div>
            <div class="col-md-3 col-sm-6 d-flex flex-column mb-md-10 mb-5">
                <div class="pb-2 fs-5 text-gray-600">{{ __('messages.common.created_on').':' }}</div>
                <div class="fs-5 text-gray-800">
                        <span data-toggle="tooltip" data-placement="right"
                              title="{{ date('jS M, Y', strtotime($bill->created_at)) }}">{{ $bill->created_at->diffForHumans() }}</span>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 d-flex flex-column mb-md-10 mb-5">
                <div class="pb-2 fs-5 text-gray-600">{{ __('messages.common.last_updated').':' }}</div>
                <div class="fs-5 text-gray-800">
                        <span data-toggle="tooltip" data-placement="right"
                              title="{{ date('jS M, Y', strtotime($bill->updated_at)) }}">{{ $bill->updated_at->diffForHumans() }}</span>
                </div>
            </div>
            <div class="col-12">
                <div class="table-responsive">
                    <table class="table table-striped box-shadow-none mt-4">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">{{ __('messages.bill.item_name') }}</th>
                            <th scope="col">{{ __('messages.bill.qty') }}</th>
                            <th scope="col">{{ __('messages.bill.price') }}</th>
                            <th scope="col">{{ __('messages.bill.amount') }}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($bill->billItems as $index => $billItem)
                            <tr class="py-4">
                                <td class="py-4">{{ $index + 1 }}</td>
                                <td class="py-4">{{ $billItem->item_name }}</td>
                                <td class="py-4">{{ $billItem->qty }}</td>
                                <td class="py-4"><b>{{ getCurrencySymbol() }}</b> {{ number_format($billItem->price) }}
                                </td>
                                <td class="py-4">
                                    <b>{{ getCurrencySymbol() }}</b> {{ number_format($billItem->amount) }}</td>
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
                            <td class="bg-white ps-0">{{ __('messages.bill.total_amount').(':') }}</td>
                            <td class="bg-white text-gray-900 pe-0">{{ getCurrencySymbol()}}  {{ number_format($bill->amount,2) }}</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
