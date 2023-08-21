<div id="editVaccinatedPatientModal" class="modal fade" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h3>{{ __('messages.vaccinated_patient.edit_vaccinate_patient') }}</h3>
                <button type="button" aria-label="Close" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            {{ Form::open(['id'=>'editVaccinatedPatientForm']) }}
            <div class="modal-body">
                <div class="alert alert-danger d-none hide" id="editValidationErrorsBox1"></div>
                {{ Form::hidden('vaccinated_patient_id',null,['id'=>'vPatientId']) }}
                <div class="row">
                    <div class="form-group col-sm-6 mb-5">
                        {{ Form::label('patient_id', __('messages.vaccinated_patient.patient').(':'), ['class' => 'form-label']) }}
                        <span class="required"></span>
                        {{ Form::select('patient_id', $patients, null, ['class' => 'form-select', 'id' => 'editVaccinatedPatientName','placeholder' => 'Select Patient Name', 'required']) }}
                    </div>

                    <div class="form-group col-sm-6 mb-5">
                        {{ Form::label('vaccination_id', __('messages.vaccinated_patient.vaccination').(':'), ['class' => 'form-label']) }}
                        <span class="required"></span>
                        {{ Form::select('vaccination_id', $vaccinations, null, ['class' => 'form-select', 'id' => 'editVaccinationPatientName','placeholder' => 'Select Vaccination', 'required']) }}
                    </div>

                    <div class="form-group col-sm-12 mb-5">
                        {{ Form::label('vaccination_serial_number', __('messages.vaccinated_patient.serial_no').(':'), ['class' => 'form-label']) }}
                        {{ Form::text('vaccination_serial_number', '', ['id'=>'editVPSerialNo','class' => 'form-control']) }}
                    </div>

                    <div class="form-group col-sm-6 mb-5">
                        {{ Form::label('dose_number', __('messages.vaccinated_patient.does_no').(':'), ['class' => 'form-label']) }}
                        <span class="required"></span>
                        {{ Form::number('dose_number', '', ['id'=>'editVPDoseNumber','class' => 'form-control','min'=>'1','max'=>'50','minlength'=>'1','maxlength'=>'2','required']) }}
                    </div>
                    @php $currentLang = app()->getLocale() @endphp
                    <div class="form-group col-sm-6 mb-5">
                        {{ Form::label('dose_given_date', __('messages.vaccinated_patient.dose_given_date').(':'),['class' => $currentLang == 'es' ? 'label-display form-label required' : 'form-label required']) }}
                        {{ Form::text('dose_given_date', '', ['id'=>'editVPDoesGivenDate','class' => (getLoggedInUser()->theme_mode) ? 'form-control bg-light' : 'form-control bg-white','required','autocomplete' => 'off']) }}
                    </div>
                    <div class="form-group col-sm-12 mb-5">
                        {{ Form::label('description', __('messages.document.notes').(':'), ['class' => 'form-label']) }}
                        {{ Form::textarea('description', null, ['class' => 'form-control', 'rows' => 4,'id'=>'editVPDescription']) }}
                    </div>
                </div>
                <div class="modal-footer p-0">
                    {{ Form::button(__('messages.common.save'), ['type' => 'submit','class' => 'btn btn-primary','id' => 'editVPBtnSave','data-loading-text' => "<span class='spinner-border spinner-border-sm'></span> Processing..."]) }}
                    <button type="button" class="btn btn-secondary ms-2"
                            data-bs-dismiss="modal">{{ __('messages.common.cancel') }}</button>
                </div>
            </div>
            {{ Form::close() }}
        </div>
    </div>
</div>
