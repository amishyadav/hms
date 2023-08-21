<div class="row mb-5">
    <div class="col-md-4">

        <div class="mb-5">
            {{ Form::label('hospital_name', __('messages.hospitals_list.hospital_name').':', ['class' => 'form-label']) }}
            <span class="required"></span>
            {{ Form::text('hospital_name', null, ['class' => 'form-control', 'required', 'tabindex' => '1', 'placeholder' => __('messages.user.enter_hospital_name'), 'pattern'  => '^[a-zA-Z0-9 ]+$',  'title' => 'Hospital Name Not Allowed Special Character']) }}
        </div>
    </div>
    <div class="col-md-4">
        <div class="mb-5">
            {{ Form::label('username', __('messages.user.hospital_slug').':', ['class' => 'form-label']) }}
            <span class="required"></span>
            {{ Form::text('username', null, ['class' => 'form-control ', 'required', 'tabindex' => '1', 'placeholder' => __('messages.user.enter_hospital_slug'), 'pattern'  => '^\S[a-zA-Z0-9]+$',  'title' => 'Hospital Slug must be alphanumeric and having exact 12 characters in length', 'min' => 12, 'maxlength' => 12]) }}
        </div>
    </div>
    <div class="col-md-4">
        <div class="mb-5">
            {{ Form::label('email',__('messages.user.email').':', ['class' => 'form-label']) }}
            <span class="required"></span>
            {{ Form::email('email', null, ['class' => 'form-control', 'required', 'tabindex' => '3', 'placeholder' => __('messages.user.enter_email')]) }}
        </div>
    </div>

    <div class="col-md-4">
        <div class="mb-5  ">
            {{ Form::label('Phone',__('messages.visitor.phone').':', ['class' => 'form-label']) }}
            <span class="required"></span>
            {{ Form::tel('phone', null, ['class' => 'form-control iti phoneNumber', 'id' => 'createUserPhoneNumber', 'onkeyup' => 'if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,"")', 'tabindex' => '5', 'required', 'maxlength' => '11']) }}
            {{ Form::hidden('prefix_code',null,['id'=>'prefix_code', 'class' => 'prefix_code']) }}
            <span class="text-success d-none fw-400 fs-small mt-2 valid-msg">✓ &nbsp; {{__('messages.valid')}}</span>
            <span class="text-danger d-none fw-400 fs-small mt-2 error-msg"></span>
        </div>
    </div>
    <div class="col-md-4">
        <label class="form-label">{{ __('messages.user.password').':' }}</label>
        <span class="required"></span>
        <div class="position-relative">
            <input type="password" class="form-control" name="password"
                   placeholder="{{ __('messages.web_appointment.enter_your_password') }}" min="6" max="10" tabindex="8"
                   required>
        </div>
    </div>
    <div class="col-md-4">
        <label class="form-label">{{ __('messages.user.password_confirmation').':' }}
        </label>
        <span class="required"></span>
        <div class="position-relative">
            <input type="password" name="password_confirmation" class="form-control"
                   placeholder="{{ __('messages.web_appointment.enter_confirm_password') }}" min="6" max="10"
                   tabindex="9" required>
        </div>
    </div>
</div>
<div class="float-end">
    {{ Form::submit(__('messages.common.save'), ['class' => 'btn btn-primary me-2 userBtnSave','id' => 'hospitalBtnSave']) }}
    <a href="{{ route('super.admin.hospitals.index') }}"
       class="btn btn-secondary">{{ __('messages.common.cancel') }}</a>
</div>
