<div class="modal fade" id="changePasswordModal" tabindex="-1" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="exampleModalLabel">{{ __('messages.change_password.change_password') }}</h3>
                <button type="button" class="btn-close" data-bs-dismiss="modal"
                        aria-label="Close"></button>
            </div>
            {{ Form::open(['class'=>'form','id'=>'changePasswordForm']) }}
            <div class="modal-body">
                <div class="alert alert-danger d-none hide" id="editValidationErrorsBox"></div>
                {{ Form::hidden('user_id',null,['id'=>'pfUserId']) }}
                {{ Form::hidden('is_active',1) }}
                @csrf
                <div class="mb-7">
                    {{ Form::label('current password', __('messages.change_password.current_password').':',['class' => 'form-label']) }}
                    <span class="required"></span>
                    <input class="form-control" id="pfCurrentPassword"
                           type="password"
                           name="password_current" required
                           placeholder="{{__('messages.change_password.current_password')}}">
                    <div class="invalid-feedback">
                        {{ $errors->first('password_current') }}
                    </div>
                </div>
                <div class="mb-7">
                    {{ Form::label('current password', __('messages.change_password.new_password').':',['class' => 'form-label']) }}
                    <span class="required"></span>
                    <input class="form-control" id="pfNewPassword"
                           type="password"
                           name="password" required placeholder="{{__('messages.change_password.new_password')}}">
                    <div class="invalid-feedback">
                        {{ $errors->first('password') }}
                    </div>
                </div>
                <div>
                    {{ Form::label('password_confirmation', __('messages.change_password.confirm_password').':',['class' => 'form-label']) }}
                    <span class="required"></span>
                    <input class="form-control" id="pfNewConfirmPassword"
                           type="password"
                           name="password_confirmation" required
                           placeholder="{{__('messages.change_password.confirm_password')}}">
                    <div class="invalid-feedback">
                        {{ $errors->first('password') }}
                    </div>
                </div>
            </div>
            <div class="modal-footer pt-0">
                {{ Form::button(__('messages.common.save'), ['type'=>'submit','class' => 'btn btn-primary m-0','id'=>'btnPrPasswordEditSave','data-loading-text'=>"<span class='spinner-border spinner-border-sm'></span> Processing..."]) }}
                <button type="button" class="btn btn-secondary my-0 ms-5 me-0"
                        data-bs-dismiss="modal">{{ __('messages.common.cancel') }}
                </button>
            </div>
            {{ Form::close() }}
        </div>
    </div>
</div>
