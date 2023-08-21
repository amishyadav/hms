<div>
    <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="poverview" role="tabpanel">
            <div class="card mb-5 mb-xl-10">
                <div class="card-body">
                        <div class="row">
                            <div class="col-md-4 d-flex flex-column mb-md-10 mb-5">
                                <label
                                    class="pb-2 fs-5 text-gray-600">{{ __('messages.account.account').(':')  }}</label>
                                <span class="fs-5 text-gray-800">{{$account->name}}</span>
                            </div>
                            <div class="col-md-4 d-flex flex-column mb-md-10 mb-5">
                                <label class="pb-2 fs-5 text-gray-600">{{ __('messages.account.type').(':')  }}</label>
                                <p class="m-0">
                                    <span
                                        class="badge bg-light-{{($account->type == 1) ? 'danger' : 'success'}}">{{ ($account->type == 1) ? 'Debit' : 'Credit' }}</span>
                                </p>
                            </div>
                            <div class="col-md-4 d-flex flex-column mb-md-10 mb-5">
                                <label class="pb-2 fs-5 text-gray-600">{{ __('messages.common.status').(':')  }}</label>
                                <p class="m-0">
                                    <span
                                        class="badge bg-light-{{($account->status == 1) ? 'success' : 'danger'}}">{{ ($account->status == 1) ? 'Active' : 'Deactive' }}</span>
                                </p>
                            </div>
                            <div class="col-lg-12 d-flex flex-column mb-md-10 mb-5">
                                <label class="pb-2 fs-5 text-gray-600">{{ __('messages.account.description')  }}</label>
                                <span
                                    class="fs-5 text-gray-800">{{ ($account->description != '')? nl2br(e($account->description)):'N/A' }}</span>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="d-md-flex align-items-center justify-content-between mb-7">
            <h1 class="fs-5 m-0">{{ __('messages.payment.payments') }}</h1>
        </div>
        <livewire:payment-table-account accountId="{{$account->id}}"/>
    </div>
{{--    <div class="card">--}}
{{--        <div class="card-body">--}}
            
{{--            <div class="row">--}}
{{--                <div class="col-lg-12">--}}
{{--                    <div class="table-responsive viewList">--}}
{{--                        @include('layouts.search-component')--}}
{{--                        <?php--}}
{{--                        $style = 'style=';--}}
{{--                        $maxWidth = 'max-width: 150px';--}}
{{--                        ?>--}}
{{--                        <div class="table-responsive">--}}
{{--                            <table id="accountPayments"--}}
{{--                                   class="table table-striped border-bottom-0 mt-5">--}}
{{--                                <thead>--}}
{{--                                <tr class="text-start text-muted fs-7 text-uppercase gs-0">--}}
{{--                                    <th>{{ __('messages.payment.payment_date') }}</th>--}}
{{--                                    <th>{{ __('messages.payment.description') }}</th>--}}
{{--                                    <th>{{ __('messages.payment.pay_to') }}</th>--}}
{{--                                    <th class="text-center">{{ __('messages.payment.amount') }}</th>--}}
{{--                                </tr>--}}
{{--                                </thead>--}}
{{--                                <tbody class="fw-bold">--}}
{{--                                @foreach($payments as $payment)--}}
{{--                                    <tr>--}}
{{--                                        <td>{{ date('jS M, Y', strtotime($payment->payment_date)) }}</td>--}}
{{--                                        <td class="text-truncate" {{$style}}{{$maxWidth}}>{!! !empty($payment->description)?nl2br(e($payment->description)):'N/A' !!}</td>--}}
{{--                                        <td>{{ $payment->pay_to }}</td>--}}
{{--                                        <td class="text-center">--}}
{{--                                            <b>{{getCurrencySymbol()}}</b> {{ number_format($payment->amount, 2) }}--}}
{{--                                        </td>--}}
{{--                                    </tr>--}}
{{--                                @endforeach--}}
{{--                                </tbody>--}}
{{--                            </table>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
</div>
