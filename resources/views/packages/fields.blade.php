<div class="row">
    <div class="col-md-6 col-sm-6">
        <div class="form-group mb-5">
            {{ Form::label('name', __('messages.package.package').(':'),['class' => 'form-label']) }}
            <span class="required"></span>
            {{ Form::text('name', null, ['class' => 'form-control']) }}
        </div>
    </div>
    <div class="col-md-6 col-sm-6">
        <div class="form-group mb-5">
            {{ Form::label('discount', __('messages.package.discount').(':'),['class' => 'form-label']) }}
            <span class="required"></span>
            (%)
            {{ Form::number('discount',  null, ['id'=>'packagesDiscountId','class' => 'form-control package-discount', 'min' => 0, 'max' => 100, 'step' => '.01', 'placeholder' => __('messages.document.in_percentage'), 'required']) }}
        </div>
    </div>
    <div class="col-md-12">
        <div class="form-group mb-5">
            {{ Form::label('description', __('messages.package.description').(':'),['class' => 'form-label']) }}
            {{ Form::textarea('description', null, ['class' => 'form-control']) }}
        </div>
    </div>

    {{-- Package Service Dynamic Table layout start --}}

    <div class="col-sm-12">
        <div class="table-responsive-sm">
            <table class="table table-striped" id="packagesBillTbl">
                <thead class="thead-dark">
                <tr class="fw-bold fs-6 text-muted">
                    <th class="text-center">#</th>
                    <th class="form-label fw-bolder text-gray-700 mb-3">{{ __('messages.package.service') }}<span
                            class="required"></span></th>
                    <th class="form-label fw-bolder text-gray-700 mb-3">{{ __('messages.package.qty') }}<span
                            class="required"></span></th>
                    <th class="form-label fw-bolder text-gray-700 mb-3">{{ __('messages.package.rate') }}<span
                            class="required"></span></th>
                    <th class="text-right form-label fw-bolder text-gray-700 mb-3">{{ __('messages.package.amount') }}</th>
                    <th class="table__add-btn-heading text-center form-label fw-bolder text-gray-700 mb-3">
                        <button type="button" class="btn btn-sm btn-primary w-100"
                                id="packagesAddItem">{{ __('messages.common.add') }}</button>
                    </th>
                </tr>
                </thead>
                <tbody class="package-service-item-container">
                @if(isset($package))
                    @foreach($package->packageServicesItems as $packageServiceItem)
                        <tr>
                            <td class="text-center item-number">{{ $loop->iteration }}</td>
                        <td class="table__item-desc">
                            {{ Form::select('service_id[]', $servicesList, $packageServiceItem->service_id, ['class' => 'form-select select2Selector serviceId','data-control' => 'select2','required', 'placeholder' => __('messages.package.select_service')]) }}
                            {{ Form::hidden('id[]', $packageServiceItem->id) }}
                        </td>
                        <td class="table__qty service-qty">
                            {{ Form::number('quantity[]', $packageServiceItem->quantity, ['class' => 'form-control packages-qty','required']) }}
                        </td>
                        <td class="service-price">
                            {{ Form::text('rate[]', number_format($packageServiceItem->rate), ['class' => 'form-control price-input packages-price','required']) }}
                        </td>
                        <td class="amount text-right item-total">
                            {{ number_format($packageServiceItem->amount) }}
                        </td>
                        <td class="text-center">
                            <a href="#" title="<?php echo __('messages.common.delete') ?>"
                               class="delete-btn delete-service-package-item pointer btn px-2 text-danger fs-3 ps-0">
                                <i class="fa-solid fa-trash"></i>
                            </a>
                        </td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td class="text-center item-number">1</td>
                    <td class="table__item-desc">
                        {{ Form::select('service_id[]', $servicesList, null, ['class' => 'form-select serviceId','required','data-control' => 'select2', 'placeholder' => __('messages.package.select_service')]) }}
                    </td>
                    <td class="table__qty service-qty">
                        {{ Form::number('quantity[]', null, ['class' => 'form-control packages-qty','required']) }}
                    </td>
                    <td class="service-price">
                        {{ Form::text('rate[]', null, ['class' => 'form-control price-input packages-price','required']) }}
                    </td>
                    <td class="amount text-right item-total">
                    </td>
                    <td class="text-center">
                        <a href="#" title="<?php echo __('messages.common.delete') ?>"
                           class="delete-btn delete-service-package-item pointer btn px-2 text-danger fs-3 ps-0">
                            <i class="fa-solid fa-trash"></i>
                        </a>
                    </td>
                </tr>
            @endif
            </tbody>
            </table>
        </div>
        <div class="float-end p-0 mb-3">
            <table>
                <tbody>
                <tr>
                    <td class="font-weight-bold form-label">{{ __('messages.package.total_amount').(':') }}</td>
                    <td class="font-weight-bold text-right"><b>{{ getCurrencySymbol() }}</b>&nbsp;<span id="packagesTotal"
                                                                                                        class="price">{{ isset($package) ? number_format($package->total_amount,2) : 0 }}</span>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>

    {{-- Package Service Dynamic Table layout end --}}

<!-- Total Amount Field -->
    {{ Form::hidden('total_amount', null, ['class' => 'form-control', 'id' => 'packagesTotalAmount']) }}

    <div class="d-flex justify-content-end">
        {{ Form::submit(__('messages.common.save'), ['class' => 'btn btn-primary', 'id'=>'packagesSaveBtn']) }}
        <a href="{{ route('packages.index') }}"
           class="btn btn-secondary ms-2">{{ __('messages.common.cancel') }}</a>
    </div>
</div>
