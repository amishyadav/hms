<div>
    <div class="tab-content" id="packagesTabContent">
        <div class="tab-pane fade show active" id="packagesPoverView" role="tabpanel">
            <div class="card mb-5 mb-xl-10">
                <div>
                    <div class="card-body  border-top p-9">
                        <div class="row mb-7">
                            <div class="col-md-6 d-flex flex-column mb-md-10 mb-5">
                                <label
                                        class="pb-2 fs-5 text-gray-600">{{ __('messages.package.package').(':')  }}</label>
                                <span class="fs-5 text-gray-800">{{ $package->name }}</span>
                            </div>
                            <div class="col-md-6 d-flex flex-column mb-md-10 mb-5">
                                <label
                                        class="pb-2 fs-5 text-gray-600">{{ __('messages.package.discount').(':')  }}</label>
                                <span class="fs-5 text-gray-800">{{$package->discount }}%</span>
                            </div>
                            <div class="col-md-6 d-flex flex-column mb-md-10 mb-5">
                                <label class="pb-2 fs-5 text-gray-600">{{ __('messages.common.created_on').(':')  }}</label>
                                <span class="fs-5 text-gray-800" data-toggle="tooltip" data-placement="right"
                                      title="{{ date('jS M, Y', strtotime($package->created_at)) }}">{{ $package->created_at->diffForHumans() }}</span>
                            </div>
                            <div class="col-md-6 d-flex flex-column mb-md-10 mb-5">
                                <label class="pb-2 fs-5 text-gray-600">{{ __('messages.common.last_updated').(':')  }}</label>
                                <span class="fs-5 text-gray-800" data-toggle="tooltip" data-placement="right"
                                      title="{{ date('jS M, Y', strtotime($package->updated_at)) }}">{{ $package->updated_at->diffForHumans() }}</span>
                            </div>
                            <div class="col-md-6 d-flex flex-column mb-md-10 mb-5">
                                <label class="pb-2 fs-5 text-gray-600">{{ __('messages.common.description').(':')  }}</label>
                                <span class="fs-5 text-gray-800">{!! !empty($package->description)? nl2br(e($package->description)):'N/A'  !!}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <h1 class="mb-5">{{ __('messages.services') }}</h1>
    <div class="row">
        <div class="col-lg-12">
            <div class="table-responsive viewList">
                <table id="packagesAccountPayments" class="table table-striped border-bottom-0">
                    <thead>
                    <tr class="fw-bold fs-6 text-muted">
                        <th class="text-center">#</th>
                        <th>{{ __('messages.package.service') }}</th>
                        <th class="text-right">{{ __('messages.package.qty') }}</th>
                        <th class="text-right">
                            <div class="d-flex justify-content-end me-5">
                                {{ __('messages.package.rate') }}
                            </div>
                        </th>
                        <th class="text-right">
                            <div class="d-flex justify-content-end me-5">
                                {{ __('messages.package.amount') }}
                            </div>
                        </th>
                    </tr>
                    </thead>
                    <tbody class="fw-bold">
                    @forelse($package->packageServicesItems as $index => $packageServiceItem)
                        <tr>
                            <td class="text-center w-5 border-0">{{ $index + 1 }}</td>
                            <td class="border-0">
                                {{ $packageServiceItem->service->name }}
                            </td>
                            <td class="table__qty text-right border-0">
                                {{ $packageServiceItem->quantity }}
                            </td>
                            <td class="text-right border-0">
                                <div class="d-flex justify-content-end me-5">
                                    {{ getCurrencySymbol() }} {{ number_format($packageServiceItem->rate) }}
                                </div>
                            </td>
                            <td class="text-right border-0">
                                <div class="d-flex justify-content-end me-5">
                                    {{ getCurrencySymbol() }} {{ number_format($packageServiceItem->amount) }}
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td class="text-center" colspan="5">{{__('messages.common.no_data_available')}}</td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
