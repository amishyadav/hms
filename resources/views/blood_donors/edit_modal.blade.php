<div id="bloodDonorsEditModal" class="modal fade" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h3>{{  __('messages.blood_donor.edit_blood_donor') }}</h3>
                <button type="button" class="btn-close" data-bs-dismiss="modal"
                        aria-label="Close"></button>
            </div>
            {{ Form::open(['id'=>'bloodDonorsEditForm']) }}
            <div class="modal-body">
                <div class="alert alert-danger d-none hide" id="bloodDonorsEditValidationErrorsBox"></div>
                {{ Form::hidden('blood_donor_id',null,['id'=>'bloodDonorId']) }}
                <div class="row">
                    <div class="form-group col-sm-12 mb-5">
                        {{ Form::label('name', __('messages.blood_donor.name').(':'), ['class' => 'form-label required']) }}
                        {{ Form::text('name', '', ['id'=>'editName','class' => 'form-control','required']) }}
                    </div>
                    <div class="form-group col-sm-12 mb-5">
                        {{ Form::label('age', __('messages.blood_donor.age').(':'),['class' => 'form-label required']) }}
                        {{ Form::number('age', '', ['id'=>'editAge','class' => 'form-control','required','min' => '1', 'max' => '100']) }}
                    </div>
                    <div class="form-group col-sm-12 mb-5">
                        {{ Form::label('gender', __('messages.user.gender').(':'),['class' => 'form-label required']) }}
                        <div class="d-flex align-items-center">
                            <div class="form-check me-10 mb-0">
                                <label class="form-label">{{ __('messages.user.male') }}</label>
                                {{ Form::radio('gender', '1', true, ['class' => 'form-check-input', 'id' => 'male']) }}
                            </div>
                            <div class="form-check me-10 mb-0">
                                <label class="form-label">{{ __('messages.user.female') }}</label>
                                {{ Form::radio('gender', '0', false, ['class' => 'form-check-input', 'id' => 'female']) }}
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-sm-12 mb-5">
                        {{ Form::label('blood_group', __('messages.blood_donor.blood_group').(':'),['class' => 'form-label']) }}
                        <span class="required"></span>
                        {{ Form::select('blood_group', $bloodGroup, null, ['class' => 'form-select select2Selector fw-bold', 'required', 'id' => 'editBloodGroup', 'placeholder' => 'Select Blood Group', 'data-control' => 'select2', 'required']) }}
                    </div>
                    <div class="form-group col-sm-12">
                        {{ Form::label('last_donate_date', __('messages.blood_donor.last_donation_date').(':'), ['class' => 'form-label']) }}
                        <span class="required"></span>
                        {{ Form::text('last_donate_date', '', ['id'=>'editLastDonationDate','class' => 'form-control bg-white','required', 'autocomplete' => 'off']) }}
                    </div>
                </div>
            </div>
            <div class="modal-footer pt-0">
                {{ Form::button(__('messages.common.save'), ['type' => 'submit','class' => 'btn btn-primary me-2','id' => 'bloodDonorEditBtnSave','data-loading-text' => "<span class='spinner-border spinner-border-sm'></span> Processing..."]) }}
                <button type="button" class="btn btn-secondary"
                        data-bs-dismiss="modal">{{ __('messages.common.cancel') }}</button>
            </div>
            {{ Form::close() }}
        </div>
    </div>
</div>
