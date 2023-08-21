<div class="row gx-10 mb-5">
    <div class="col-md-4">
        <div class="form-group mb-5">
            {{ Form::label('title', __('messages.investigation_report.title').(':'), ['class' => 'form-label']) }}
            <span class="required"></span>
            {{ Form::text('title', null, ['class' => 'form-control ','required']) }}
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group mb-5">
            {{ Form::label('patient_id', __('messages.investigation_report.patient').(':'), ['class' => 'form-label']) }}
            <span class="required"></span>
            {{ Form::select('patient_id',$patients, null, ['class' => 'form-select patient-in-report-id','required','id' => 'patientId','placeholder'=>'Select Patient','data-control' => 'select2']) }}
        </div>
    </div>
    @if(Auth::user()->hasRole('Doctor'))
        <input type="hidden" name="doctor_id" value="{{ Auth::user()->owner_id }}">
    @else
        <div class="col-md-4">
            <div class="form-group mb-5">
                {{ Form::label('doctor_id', __('messages.investigation_report.doctor').(':'), ['class' => 'form-label']) }}
                <span class="required"></span>
                {{ Form::select('doctor_id',$doctors, null, ['class' => 'form-select doctor-in-report-id','required','id' => 'doctorId','placeholder'=> __('messages.web_home.select_doctor'),'data-control' => 'select2']) }}
            </div>
        </div>
    @endif
    <div class="col-md-4">
        <div class="form-group investigation-report-date mb-5">
            {{ Form::label('date', __('messages.investigation_report.date').(':'), ['class' => 'form-label']) }}
            <label class="required"></label>
            {{ Form::text('date', null, ['class' => 'form-control bg-white','id' => 'date','required','autocomplete' => 'off']) }}
        </div>
    </div>
    <div class="form-group col-md-4 mb-5">
        <div class="row2">
            {{ Form::label('attachment', __('messages.investigation_report.attachment').(':'), ['class' => 'form-label']) }}
            <div class="d-block">
                <div class="image-picker">
                    <div class="image previewImage" id="previewImage"
                         style="background-image: url('{{ $investigationReport->attachment_url ?? asset('assets/img/default_image.jpg')}}')"></div>
                    <span class="picker-edit rounded-circle text-gray-500 fs-small" data-bs-toggle="tooltip"
                          data-placement="top"
                          data-bs-original-title="Change attachment">
                                    <label>
                                    <i class="fa-solid fa-pen" id="profileImageIcon"></i>
                                        <input type="file" class="image-upload d-none" name="attachment" id="attachment"
                                               accept=".png, .jpg, .jpeg, .gif, .pdf, .doc"/>
                <input type="hidden" name="avatar_remove"/>
                                    </label>
                                </span>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group mb-5">
            {{ Form::label('status', __('messages.common.status').(':'), ['class' => 'form-label']) }}
            <span class="required"></span>
            {{ Form::select('status', $status, null, ['id' => 'status','class' => 'form-select status-in-report','required','data-control' => 'select2']) }}
        </div>
    </div>
    <div class="col-md-12">
        <div class="form-group mb-5">
            {{ Form::label('description', __('messages.investigation_report.description').(':'), ['class' => 'form-label']) }}
            {{ Form::textarea('description', null, ['class' => 'form-control']) }}
        </div>
    </div>
</div>

<div class="float-end">
    {{ Form::submit(__('messages.common.save'), ['class' => 'btn btn-primary me-2']) }}
    <a href="{{ route('investigation-reports.index') }}"
       class="btn btn-secondary">{{ __('messages.common.cancel') }}</a>
</div>
