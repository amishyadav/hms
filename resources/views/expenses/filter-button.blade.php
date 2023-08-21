<div class="ms-0 ms-md-2" wire:ignore>
    <div class="dropdown d-flex align-items-center me-4 me-md-5">
        <button
                class="btn btn btn-icon btn-primary text-white dropdown-toggle hide-arrow ps-2 pe-0"
                type="button" data-bs-auto-close="outside"
                data-bs-toggle="dropdown" aria-expanded="false"
                id="dropdownMenuButton1">
            <i class='fas fa-filter'></i>
        </button>
        <div class="dropdown-menu py-0" aria-labelledby="dropdownMenuButton1">
            <div class="text-start border-bottom py-4 px-7">
                <h3 class="text-gray-900 mb-0">{{ __('messages.common.filter_options') }}</h3>
            </div>
            <div class="p-5">
                <div class="mb-5">
                    <label for="expenseHead" class="form-label">{{ __('messages.common.status').':' }}</label>
{{--                {{ Form::select('income_head', $filterHeads[0], null,['id' => 'expenseHead', 'data-control' =>'select2', 'class' => 'form-select status-filter']) }}--}}
                    <select class="form-select status-filter" id="expenseHead" data-control="select2" name="income_head">
                        <option value="0">{{ __('messages.filter.all') }}</option>
                        <option value="1">{{ __('messages.expense_filter.building_rent') }}</option>
                        <option value="2">{{ __('messages.expense_filter.equipments') }}</option>
                        <option value="3">{{ __('messages.expense_filter.electricity_bill') }}</option>
                        <option value="4">{{ __('messages.expense_filter.telephone_bill') }}</option>
                        <option value="5">{{ __('messages.expense_filter.power_generator_fuel_charge') }}</option>
                        <option value="6">{{ __('messages.expense_filter.tea_expense') }}</option>
                    </select>
            </div>
            <div class="d-flex justify-content-end">
                <button type="reset" class="btn btn-secondary"
                        id="ExpenseResetFilter" >{{ __('messages.common.reset') }}</button>
            </div>
        </div>
    </div>
</div>
</div>
