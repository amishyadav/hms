<div id="AddSMSModal" class="modal fade" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h3>{{ __('messages.sms.new_sms') }}</h3>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            {{ Form::open(['id'=>'addSMSNewForm']) }}
            <div class="modal-body">
                <div class="alert alert-danger d-none hide" id="validationErrorsBox"></div>
                <div class="row">
                    <div class="form-group col-sm-6 mb-5 myclass">
                        {{ Form::label('Phone',__('messages.sms.phone_number').':',['class' => 'form-label']) }}
                        <span class="required"></span>
                        {{ Form::tel('phone', null, ['class' => 'form-control iti phoneNumber', 'required','id' => 'smsPhoneNumber', 'onkeyup' => 'if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,"")']) }}
                        {{ Form::hidden('prefix_code',null,['class'=>'prefix_code']) }}
                        <span class="hide valid-msg">✓ &nbsp; {{__('messages.valid')}}</span>
                        <span class="hide error-msg"></span>
                    </div>
                    <div class="form-group col-sm-6 mb-5 role">
                        {{ Form::label('role', __('messages.sms.role').':',['class' => 'form-label']) }}
                        <span class="required"></span>
                        {{ Form::select('role', $roles, null, ['class' => 'form-select', 'required', 'id'=>'roleSMSId','placeholder' =>  __('messages.sms.select_role'),'data-control'=> 'select2']) }}
                    </div>
                    <div class="form-group col-sm-6 d-flex flex-row-reverse mb-5 py-10">
                        <div class="form-check form-switch fv-row">
                            <input name="number" class="form-check-input w-35px h-20px smsNumber" value="0"
                                   type="checkbox">
                            <label class="form-check-label" for="allowmarketing"></label>
                            {{ Form::label('number',  __('messages.sms.send_sms_by_number_directly'),['class' => 'form-label']) }}
                        </div>
                    </div>
                    <div class="form-group col-sm-12 mb-5 send">
                        {{ Form::label('send_to', __('messages.sms.send_to').':',['class' => 'form-label']) }}
                        <span class="required"></span>
                        <span><strong>{{__('messages.sms.only_user_with_registered_phone_will_display')}}</strong></span>
                        {{ Form::select('send_to[]', [null], null, ['class' => 'form-select', 'required', 'id'=>'userSMSId', 'multiple' => true,'disabled', 'data-control'=> 'select2']) }}
                    </div>
                    <div class="form-group col-sm-12 mb-5">
                        {{ Form::label('message', __('messages.sms.message').':',['class' => 'form-label']) }}
                        <span class="required"></span>
                        {{ Form::textarea('message', null, ['class' => 'form-control', 'id' => 'messageId', 'required', 'rows' => 6, 'maxlength'=>"160"]) }}
                    </div>
                </div>
                <div class="modal-footer p-0">
                    {{ Form::button(__('messages.common.save'), ['type' => 'submit','class' => 'btn btn-primary','id' => 'btnSMSSave','data-loading-text' => "<span class='spinner-border spinner-border-sm'></span> Processing..."]) }}
                    <button type="button" class="btn btn-secondary ms-2"
                            data-bs-dismiss="modal">{{ __('messages.common.cancel') }}</button>
                </div>
            </div>
            {{ Form::close() }}
        </div>
    </div>
</div>
