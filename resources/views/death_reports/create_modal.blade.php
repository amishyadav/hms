<div id="addDeathReportModal" class="modal fade" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h3>{{ __('messages.death_report.new_death_report') }}</h3>
                <button type="button" aria-label="Close" class="btn btn-sm btn-icon btn-active-color-primary"
                        data-bs-dismiss="modal">
                </button>
            </div>
            {{ Form::open(['id'=>'addDeathReportNewForm']) }}
            <div class="modal-body">
                <div class="alert alert-danger d-none hide" id="drValidationErrorsBox"></div>
                <div class="row">
                    <div class="form-group col-sm-12 mb-5">
                        {{ Form::label('case_id', __('messages.case.case').(':'), ['class' => 'form-label']) }}
                        <span class="required"></span>
                        {{ Form::select('case_id', $cases, null, ['class' => 'form-select','required','id' => 'deathCaseId','placeholder'=>__('messages.case.select_case')]) }}
                    </div>
                    @if(Auth::user()->hasRole('Doctor'))
                        <input type="hidden" name="doctor_id" value="{{ Auth::user()->owner_id }}">
                    @else
                        <div class="form-group col-sm-12 mb-5">
                            {{ Form::label('doctor_name', __('messages.case.doctor').(':'), ['class' => 'form-label']) }}
                            <span class="required"></span>
                            {{ Form::select('doctor_id',$doctors, null, ['class' => 'form-select','required','id' => 'deathDoctorId','placeholder'=>__('messages.web_home.select_doctor')]) }}
                        </div>
                    @endif
                    <div class="form-group col-sm-12 mb-5">
                        {{ Form::label('date', __('messages.death_report.date').(':'), ['class' => 'form-label']) }}
                        <span class="required"></span>
                        {{ Form::text('date', null, ['id'=>'deathDate', 'class' => 'form-control bg-white', 'required','autocomplete' => 'off']) }}
                    </div>
                    <div class="form-group col-sm-12">
                        {{ Form::label('description', __('messages.death_report.description').(':'), ['class' => 'form-label']) }}
                        {{ Form::textarea('description', null, ['class' => 'form-control', 'rows' => 4]) }}
                    </div>
                </div>
            </div>
            <div class="modal-footer pt-0">
                {{ Form::button(__('messages.common.save'), ['type'=>'submit','class' => 'btn btn-primary m-0','id'=>'btnDRSave','data-loading-text'=>"<span class='spinner-border spinner-border-sm'></span> Processing..."]) }}
                <button type="button" aria-label="Close" class="btn btn-secondary my-0 ms-5 me-0"
                        data-bs-dismiss="modal">
                    {{ __('messages.common.cancel') }}</button>
            </div>
            {{ Form::close() }}
        </div>
    </div>
</div>
