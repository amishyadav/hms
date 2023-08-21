<div class="ms-0 ms-md-2" wire:ignore>
    <div class="dropdown d-flex align-items-center me-4 me-md-5">
        <button
                class="btn btn btn-icon btn-primary text-white dropdown-toggle hide-arrow ps-2 pe-0"
                type="button"  data-bs-auto-close="outside"
                data-bs-toggle="dropdown" aria-expanded="false"
                id="ChargeFilterBtn">
            <i class='fas fa-filter'></i>
        </button>
        <div class="dropdown-menu py-0" aria-labelledby="ChargeFilterBtn">
            <div class="text-start border-bottom py-4 px-7">
                <h3 class="text-gray-900 mb-0">{{ __('messages.common.filter_options') }}</h3>
            </div>
            <div class="p-5">
                <div class="mb-5">
                    <label for="filterChargeType" class="form-label">{{ __('messages.common.status').':' }}</label>
{{--                    {{ Form::select('charge_type', $filterHeads[0],null, ['id' => 'filterChargeType', 'data-control' =>'select2', 'class' => 'form-select status-filter status-selector select2-hidden-accessible data-allow-clear="true"']) }}--}}
                    <select class="form-select status-filter status-selector" id="filterChargeType" data-control="select2" name="charge_type">
                        <option value="0">{{ __('messages.filter.all') }}</option>
                        <option value="1">{{ __('messages.charge_filter.investigation') }}</option>
                        <option value="4">{{ __('messages.charge_filter.procedure') }}</option>
                        <option value="5">{{ __('messages.charge_filter.supplier') }}</option>
                        <option value="2">{{ __('messages.charge_filter.operation_theater') }}</option>
                        <option value="3">{{ __('messages.charge_filter.others') }}</option>
                    </select>
                </div>
                <div class="d-flex justify-content-end">
                    <button type="reset" id="chargesResetFilter" class="btn btn-secondary">{{ __('messages.common.reset') }}</button>
                </div>
            </div>
        </div>
    </div>
</div>
