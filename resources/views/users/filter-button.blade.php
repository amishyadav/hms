{{--<div class="d-sm-flex justify-content-between mb-5">--}}
{{--    <div class="d-flex justify-content-end">--}}
{{--        <div class="dropdown d-flex align-items-center me-3 me-md-3">--}}
{{--            <a href="#"--}}
{{--               class="btn btn btn-icon btn-primary text-white dropdown-toggle hide-arrow ps-2 pe-0"--}}
{{--               id="dropdownMenuButton1" data-bs-toggle="dropdown" data-bs-auto-close="outside"--}}
{{--               aria-expanded="false">--}}
{{--                <i class='fas fa-filter'></i>--}}
{{--            </a>--}}
{{--            <div class="dropdown-menu py-0" aria-labelledby="dropdownMenuButton1">--}}
{{--                <div class="text-start border-bottom py-4 px-7">--}}
{{--                    <div class="text-gray-900 mb-0">{{ __('messages.common.filter_options') }}</div>--}}
{{--                </div>--}}
{{--                <div class="separator border-gray-200"></div>--}}
{{--                <div class="p-5">--}}
{{--                    <div class="mb-5">--}}
{{--                        <label class="form-label">{{ __('messages.common.status').':' }}</label>--}}
{{--                        {{ Form::select('status',['' => 'All'] ,null, ['id' => 'statusArr', 'data-control' =>'select2', 'class' => 'form-select status-selector select2-hidden-accessible data-allow-clear="true"']) }}--}}
{{--                    </div>--}}
{{--                    <div class="mb-5">--}}
{{--                        <label class="form-label">{{ __('messages.employee_payroll.role').':' }}</label>--}}
{{--                        {{ Form::select('department_id',['' => 'Select Role'] ,null, ['id' => 'roleArr', 'data-control' =>'select2', 'class' => 'form-select role-selector',]) }}--}}
{{--                    </div>--}}
{{--                    <div class="d-flex justify-content-end">--}}
{{--                        <button type="reset" class="btn btn-secondary text-white"--}}
{{--                                id="resetFilter">{{ __('messages.common.reset') }}</button>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}
<div class="ms-0 ms-md-2" wire:ignore>
    <div class="dropdown d-flex align-items-center me-4 me-md-5">
        <button
                class="btn btn btn-icon btn-primary text-white dropdown-toggle hide-arrow ps-2 pe-0"
                type="button"  data-bs-auto-close="outside"
                data-bs-toggle="dropdown" aria-expanded="false"
                id="userFilterButton">
            <i class='fas fa-filter'></i>
        </button>
        <div class="dropdown-menu py-0" aria-labelledby="userFilterButton">
            <div class="text-start border-bottom py-4 px-7">
                <h3 class="text-gray-900 mb-0">{{ __('messages.common.filter_options') }}</h3>
            </div>
            <div class="p-5">
                <div class="mb-5">
                    <label for="userStatusArr" class="form-label">{{ __('messages.common.status').':' }}</label>
{{--                    {{ Form::select('status',$filterHeads[0],null, ['id' => 'userStatusArr', 'data-control' =>'select2', 'class' => 'form-select status-selector select2-hidden-accessible data-allow-clear="true"']) }}--}}
                    <select class="form-select status-selector" id="userStatusArr" data-control="select2" name="status">
                        <option value="0">{{ __('messages.filter.all') }}</option>
                        <option value="1">{{ __('messages.filter.active') }}</option>
                        <option value="2">{{ __('messages.filter.deactive') }}</option>
                    </select>
                </div>

                <div class="mb-5">
                    <label for="userRoleArr" class="form-label">{{ __('messages.employee_payroll.role').':' }}</label>   <br>
{{--                    {{ Form::select('department_id', collect($filterHeads[1])->sortBy('key')->toArray(),null, ['id' => 'userRoleArr', 'data-control' =>'select2', 'class' => 'form-select status-selector select2-hidden-accessible data-allow-clear="true"']) }}--}}
                    <select class="form-select status-selector" id="userRoleArr" data-control="select2" name="department_id">
                        <option value="0">{{ __('messages.filter.all') }}</option>
                        <option value="1">{{ __('messages.role.admin') }}</option>
                        <option value="2">{{ __('messages.role.doctor') }}</option>
                        <option value="3">{{ __('messages.role.patient') }}</option>
                        <option value="4">{{ __('messages.role.nurse') }}</option>
                        <option value="5">{{ __('messages.role.receptionist') }}</option>
                        <option value="6">{{ __('messages.role.pharmacist') }}</option>
                        <option value="7">{{ __('messages.role.accountant') }}</option>
                        <option value="8">{{ __('messages.role.case_manager') }}</option>
                        <option value="9">{{ __('messages.role.lab_technician') }}</option>
                    </select>
                </div>

                <div class="d-flex justify-content-end">
                    <button type="reset" class="btn btn-secondary" id="resetUserFilter">
                        {{ __('messages.common.reset') }}
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
