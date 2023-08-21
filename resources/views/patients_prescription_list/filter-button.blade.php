<div class="ms-0 ms-md-2" wire:ignore>
    <div class="dropdown d-flex align-items-center me-4 me-md-5">
        <button
                class="btn btn btn-icon btn-primary text-white dropdown-toggle hide-arrow ps-2 pe-0"
                type="button" data-bs-auto-close="outside"
                data-bs-toggle="dropdown" aria-expanded="false"
                id="dropdownMenuPrescription">
            <i class='fas fa-filter'></i>
        </button>
        <div class="dropdown-menu py-0" aria-labelledby="dropdownMenuButton1" id="dropdownMenuPrescription">
            <div class="text-start border-bottom py-4 px-7">
                <h3 class="text-gray-900 mb-0">{{ __('messages.common.filter_options') }}</h3>
            </div>
            <div class="p-5">
                <div class="mb-10">
                    <label class="form-label fs-6 fw-bold">{{ __('messages.common.status').':' }}</label>
                    <select class="form-select role-selector" id="patients_prescription_filter_status"
                            data-control="select2" name="status">
                        <option value="2">{{ __('messages.filter.all') }}</option>
                        <option value="1">{{ __('messages.filter.active') }}</option>
                        <option value="0">{{ __('messages.filter.deactive') }}</option>
                    </select>
                </div>
                <div class="d-flex justify-content-end">
                    <button type="reset" id="patientPrescriptionResetFilter"
                            class="btn btn-secondary">{{ __('messages.common.reset') }}</button>
                </div>
            </div>
        </div>
    </div>
</div>
