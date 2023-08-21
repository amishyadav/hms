<div class="row gx-10 mb-5">
    <div class="col-lg-6">

        <div class="mb-5">
            {{ Form::label('first_name', __('messages.user.first_name').':', ['class' => 'form-label']) }}
            <span class="required"></span>
            {{ Form::text('first_name', null, ['class' => 'form-control', 'required', 'tabindex' => '1']) }}
        </div>

        <div class="mb-5">
            {{ Form::label('email',__('messages.user.email').':', ['class' => 'form-label']) }}
            <span class="required"></span>
            {{ Form::email('email', null, ['class' => 'form-control', 'required', 'tabindex' => '3']) }}
        </div>

        <div class="mb-5 myclass">
            {{ Form::label('Phone',__('messages.visitor.phone').':', ['class' => 'form-label']) }}<br>
            {{ Form::tel('phone', null, ['class' => 'form-control iti phoneNumber', 'onkeyup' => 'if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,"")', 'tabindex' => '5']) }}
            {{ Form::hidden('prefix_code',null,['class'=>'prefix_code']) }}
            <span class="text-success valid-msg d-none fw-400 fs-small mt-2">✓ &nbsp; {{__('messages.valid')}}</span>
            <span class="text-danger error-msg d-none fw-400 fs-small mt-2"></span>
        </div>
{{--        {{ Form::hidden('username', Auth::user()->username, ['class' => 'userName']) }}--}}
        @if(!$isEdit)
            <div class="mb-5">
                {{ Form::label('password', __('messages.user.password').':', ['class' => 'form-label']) }}
                <span class="required"></span>
                {{ Form::password('password', ['class' => 'form-control', 'required','min' => '6','max' => '10', 'tabindex' => '8']) }}
            </div>
        @endif

        <div class="mb-5">
            {{ Form::label('dob',__('messages.user.dob').':', ['class' => 'form-label']) }}
            {{ Form::text('dob', null, ['class' => (getLoggedInUser()->theme_mode) ? 'form-control bg-light' : 'form-control bg-white', 'id' => 'userDob', 'autocomplete' => 'off', 'tabindex' => '10']) }}
        </div>

        <!-- Facebook URL Field -->
        <div class="mb-5">
            {{ Form::label('facebook_url', __('messages.facebook_url').':', ['class' => 'form-label']) }}
            {{ Form::text('facebook_url', null, ['class' => 'form-control','id'=>'userFacebookUrl', 'onkeypress' => 'return avoidSpace(event);']) }}
        </div>

        <!-- Instagram URL Field -->
        <div class="mb-5">
            {{ Form::label('instagram_url', __('messages.instagram_url').':', ['class' => 'form-label']) }}
            {{ Form::text('instagram_url', null, ['class' => 'form-control', 'id'=>'userInstagramUrl', 'onkeypress' => 'return avoidSpace(event);']) }}
        </div>

        <div class="col-lg-5">
            <div class="justify-content-center">
                {{ Form::label('image', __('messages.common.profile').':', ['class' => 'form-label']) }}
            </div>
            @php
                if($isEdit){
                    $image = isset($user->media[0]) ? $user->image_url : asset('assets/img/avatar.png');
                }else{
                    $image = asset('assets/img/avatar.png');
                }
            @endphp
            <div class="d-block">
                <div class="image-picker">
                    <div class="image previewImage" id="userPreviewImage"
                         style="background-image: url('{{ $image }}')"></div>
                    <span class="picker-edit rounded-circle text-gray-500 fs-small" data-bs-toggle="tooltip"
                          data-placement="top"
                          data-bs-original-title="{{ __('messages.profile.change_Profile') }}">
                                    <label>
                                    <i class="fa-solid fa-pen" id="profileImageIcon"></i>
                                         {{ Form::file('image',['id'=>'userProfileImage','class' => 'd-none image-upload', 'tabindex' => '12', 'accept' => '.png, .jpg, .jpeg']) }}
                <input type="hidden" name="avatar_remove">
                                    </label>
                                </span>
                </div>
            </div>
            <div class="form-text">{{ __('messages.common.allow_img_text') }}</div>
        </div>

    </div>

    <div class="col-lg-6">

        <div class="mb-5">
            {{ Form::label('last_name',__('messages.user.last_name').':', ['class' => 'form-label']) }}
            <span class="required"></span>
            {{ Form::text('last_name', null, ['class' => 'form-control', 'required', 'tabindex' => '2']) }}
        </div>

        @if(!$isEdit)
            <div class="mb-5">
                {{ Form::label('department_id',__('messages.employee_payroll.role').':', ['class' => 'form-label']) }}
                <span class="required"></span>
                {{ Form::select('department_id', $role, null, ['class' => 'form-select', 'required', 'id' => 'userRole', 'placeholder' => __('messages.sms.select_role'), 'data-control' => 'select2']) }}
            </div>
        @endif

        @if(!$isEdit)
            <div class="mb-5 doctor_department d-none">
                {{ Form::label('department_name', __('messages.doctor_department.doctor_department').':', ['class' => 'form-label']) }}
                <span class="required"></span>
                {{ Form::select('doctor_department_id', $doctorDepartments, null, ['class' => 'form-select', 'id' => 'userDoctorDepartmentId', 'placeholder' => 'Select Department', 'data-control' => 'select2', 'required']) }}
            </div>
        @endif

        @if(!$isEdit)
            <div class="mb-5">
                {{ Form::label('password_confirmation', __('messages.user.password_confirmation').':', ['class' => 'form-label']) }}
                <span class="required"></span>
                {{ Form::password('password_confirmation', ['class' => 'form-control','required','min' => '6','max' => '10', 'tabindex' => '9']) }}
            </div>
        @endif

        <div class="mb-lg-8 mb-5">
            {{ Form::label('gender', __('messages.user.gender').':', ['class' => 'form-label']) }}
            <span class="required"></span>
            <br>
            <div class="d-flex align-items-center">
                <div class="form-check me-10">
                    <label class="form-label" for="maleUser">{{ __('messages.user.male') }}</label>&nbsp;&nbsp;
                    {{ Form::radio('gender', '0', true, ['class' => 'form-check-input', 'tabindex' => '6','id'=>'maleUser']) }}
                    &nbsp;
                </div>
                <div class="form-check me-10">
                    <label class="form-label" for="femaleUser">{{ __('messages.user.female') }}</label>
                    {{ Form::radio('gender', '1', false, ['class' => 'form-check-input', 'tabindex' => '7','id'=>'femaleUser']) }}
                </div>
            </div>
        </div>

    {{--        <div class="mb-10">--}}
    {{--            {{ Form::label('status', __('messages.common.status').':', ['class' => 'form-label']) }}--}}
    {{--            <br>--}}
    {{--            <div class="col-lg-8 d-flex align-items-center">--}}
    {{--                <div class="form-check form-switch">--}}
    {{--                    <input tabindex="11" name="status" class="form-check-input is-active" value="1"--}}
    {{--                           type="checkbox"--}}
    {{--                           id="allowmarketing" @if($isEdit) {{(isset($user) && ($user->status)) ? 'checked' : ''}} @else--}}
    {{--                        {{ 'checked' }} @endif ">--}}
    {{--                    <label class="form-check-label" for="allowmarketing"></label>--}}
    {{--                </div>--}}
    {{--            </div>--}}
    {{--        </div>--}}

    <!-- Twitter URL Field -->
        <div class="mb-5">
            {{ Form::label('twitter_url', __('messages.twitter_url').':', ['class' => 'form-label']) }}
            {{ Form::text('twitter_url', null, ['class' => 'form-control','id'=>'userTwitterUrl', 'onkeypress' => 'return avoidSpace(event);']) }}
        </div>

        <!-- LinkedIn URL Field -->
        <div class="mb-5">
            {{ Form::label('linkedIn_url', __('messages.linkedIn_url').':', ['class' => 'form-label']) }}
            {{ Form::text('linkedIn_url', null, ['class' => 'form-control','id'=>'userLinkedInUrl', 'onkeypress' => 'return avoidSpace(event);']) }}
        </div>

    </div>
</div>
<div class="d-flex justify-content-end">
    {{ Form::submit(__('messages.common.save'), ['class' => 'btn btn-primary me-2','id' => 'btnUserSave']) }}
    <a href="{{ route('users.index') }}"
       class="btn btn-secondary">{{ __('messages.common.cancel') }}</a>
</div>
