<div class="row">
    <div class="col-md-6">
        <div class="form-group mb-5">
            {{ Form::label('first_name',__('messages.user.first_name').(':'), ['class' => 'form-label']) }}
            <span class="required"></span>
            {{ Form::text('first_name', null, ['class' => 'form-control','required']) }}
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group mb-5">
            {{ Form::label('last_name',__('messages.user.last_name').(':'), ['class' => 'form-label']) }}
            <span class="required"></span>
            {{ Form::text('last_name', null, ['class' => 'form-control','required']) }}
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group mb-5">
            {{ Form::label('email',__('messages.user.email').(':'), ['class' => 'form-label']) }}
            <span class="required"></span>
            {{ Form::email('email', null, ['class' => 'form-control','required']) }}
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group mb-5">
            {{ Form::label('phone',__('messages.user.phone').(':'), ['class' => 'form-label']) }}
            <br>
            {{ Form::tel('phone', null, ['class' => 'form-control w-100 phoneNumber','id' => 'phoneNumber', 'onkeyup' => 'if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,"")']) }}
            {{ Form::hidden('prefix_code',null,['id'=>'prefix_code', 'class' => 'prefix_code']) }}
            <span class="text-success d-none fw-400 fs-small mt-2 valid-msg">✓ &nbsp; {{__('messages.valid')}}</span>
            <span class="text-danger d-none fw-400 fs-small mt-2 error-msg"></span>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group col-sm-6 col-md-6 mb-5">
            <div class="row2" io-image-input="true">
                {{ Form::label('image',__('messages.common.profile').(':'), ['class' => 'form-label']) }}
                <div class="d-block">
                    <?php
                    $style = 'style=';
                    $background = 'background-image:';
                    ?>

                    <div class="image-picker">
                        <div class="image previewImage" id="editAdminPreviewImage"
                        {{$style}}"{{$background}}
                        url({{ isset($user->media[0]) ? $user->image_url : asset('assets/img/avatar.png') }}">
                        <span class="picker-edit rounded-circle text-gray-500 fs-small" title="Change Profile">
                        <label>
                            <i class="fa-solid fa-pen" id="profileImageIcon"></i>
                            <input type="file" id="editAdminProfileImage" name="image"
                                   class="image-upload d-none profileImage"
                                   accept=".png, .jpg, .jpeg, .gif"/>
                            <input type="hidden" name="avatar_remove"/>
                        </label>
                    </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="d-flex justify-content-end">
    {{ Form::submit(__('messages.common.save'), ['class' => 'btn btn-primary me-2']) }}
    <a href="{{ route('admins.index') }}"
       class="btn btn-secondary">{{__('messages.common.cancel')}}</a>
</div>
</div>
