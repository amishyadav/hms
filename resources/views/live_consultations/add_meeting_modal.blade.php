<div id="add_live_meeting_modal" class="modal fade" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h3>{{ __('messages.live_consultation.new_live_meeting') }}</h3>
                <button type="button" aria-label="Close" class="btn-close"
                        data-bs-dismiss="modal">
                </button>
            </div>
            {{ Form::open(['id'=>'addLiveMeetingForm']) }}
            <div class="modal-body">
                <div class="alert alert-danger d-none hide" id="meetingErrorsBox"></div>
                <div class="row">
                    <div class="form-group col-sm-12 mb-5">
                        {{ Form::label('consultation_title', __('messages.live_consultation.consultation_title').(':'), ['class' => 'form-label']) }}
                        <span class="required"></span>
                        {{ Form::text('consultation_title', '', ['class' => 'form-control consultation-title','required']) }}
                    </div>
                    <div class="form-group col-sm-6 mb-5">
                        {{ Form::label('consultation_date', __('messages.live_consultation.consultation_date').(':'), ['class' => 'form-label']) }}
                        <span class="required"></span>
                        {{ Form::text('consultation_date', '', ['class' => 'form-control consultation-date bg-white','required', 'autocomplete' => 'off']) }}
                    </div>
                    <div class="form-group col-sm-6 mb-5">
                        {{ Form::label('consultation_duration_minutes', __('messages.live_consultation.consultation_duration_minutes').(':'), ['class' => 'form-label']) }}
                        <span class="required"></span>
                        {{ Form::number('consultation_duration_minutes', '', ['class' => 'form-control consultation-duration-minutes','required', 'min' => '0', 'max' => '720']) }}
                    </div>
                    <div class="form-group col-sm-12 mb-5">
                        {{ Form::label('staff_list', __('messages.live_consultation.staff_list').':', ['class' => 'form-label']) }}
                        <span class="required"></span>
                        {{ Form::select('staff_list[]', $users, getLoggedInUserId(), ['class' => 'form-select', 'required', 'id'=>'meetingUserId', 'multiple' => true, 'data-control'=>'select2']) }}
                    </div>
                    <div class="form-group col-sm-6 mb-5">
                        {{ Form::label('host_video',__('messages.live_consultation.host_video').':', ['class' => 'form-label']) }}
                        <span class="required"></span>
                        <br>
                        <div class="d-flex align-items-center">
                            <div class="form-check me-10 mb-0">
                                <label class="form-label">{{ __('messages.live_consultation.enable') }}</label>&nbsp;&nbsp;
                                {{ Form::radio('host_video', \App\Models\LiveConsultation::HOST_ENABLE, false, ['class' => 'form-check-input']) }} &nbsp;
                            </div>
                            <div class="form-check me-10 mb-0">
                                <label class="form-label">{{ __('messages.live_consultation.disabled') }}</label>
                                {{ Form::radio('host_video', \App\Models\LiveConsultation::HOST_DISABLED, true, ['class' => 'form-check-input']) }}
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-sm-6 mb-5">
                        {{ Form::label('participant_video',__('messages.live_consultation.client_video').':', ['class' => 'form-label']) }}
                        <span class="required"></span>
                        <br>
                        <div class="d-flex align-items-center">
                            <div class="form-check me-10 mb-0">
                                <label class="form-label">{{ __('messages.live_consultation.enable') }}</label>&nbsp;&nbsp;
                                {{ Form::radio('participant_video', \App\Models\LiveConsultation::CLIENT_ENABLE, false, ['class' => 'form-check-input']) }} &nbsp;
                            </div>
                            <div class="form-check me-10 mb-0">
                                <label class="form-label">{{ __('messages.live_consultation.disabled') }}</label>
                                {{ Form::radio('participant_video', \App\Models\LiveConsultation::CLIENT_DISABLED, true, ['class' => 'form-check-input']) }}
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-sm-12 mb-5">
                        {{ Form::label('description', __('messages.testimonial.description').(':'), ['class' => 'form-label ']) }}
                        {{ Form::textarea('description', '', ['class' => 'form-control description', 'rows' => 3]) }}
                    </div>
                </div>
                <div class="modal-footer p-0">
                    {{ Form::button(__('messages.common.save'), ['type' => 'submit','class' => 'btn btn-primary','id' => 'meetingSave','data-loading-text' => "<span class='spinner-border spinner-border-sm'></span> Processing..."]) }}
                    <button type="button" class="btn btn-secondary ms-2"
                            data-bs-dismiss="modal">{{ __('messages.common.cancel') }}</button>
                </div>
            </div>
            {{ Form::close() }}
        </div>
    </div>
</div>
