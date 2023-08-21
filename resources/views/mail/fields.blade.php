<div class="alert alert-danger d-none hide" id="validationErrorsBox"></div>
<div class="row mt-10">
    <div class="col-md-6 mb-5">
        <div class="form-group">
            {{ Form::label('to', __('messages.email.to').':', ['class' => 'form-label']) }}
            <span class="required"></span>
            {{ Form::email('to', null, ['class' => 'form-control','required', 'id' => 'emailId']) }}
        </div>
    </div>
    <div class="col-md-6 mb-5">
        <div class="form-group">
            {{ Form::label('subject', __('messages.email.subject').':', ['class' => 'form-label']) }}
            <span class="required"></span>
            {{ Form::text('subject', null, ['class' => 'form-control','required']) }}
        </div>
    </div>
    <div class="col-md-6 mb-5">
        <div class="form-group">
            {{ Form::label('message', __('messages.email.message').':', ['class' => 'form-label']) }}
            <span class="required"></span>
            {{ Form::textarea('message', null, ['class' => 'form-control','rows' => 6,'required']) }}
        </div>
    </div>
    <div class="form-group col-md-6 mb-5">
        <div class="col-sm-4 col-6">
            {{ Form::label('file', __('messages.email.attachment').(':'), ['class' => 'form-label']) }}
            <div class="image-input image-input-outline">
                <?php
                $style = 'style';
                $background = 'background-image:';
                ?>
                <div class="image-picker">
                    <div class="image previewImage" id="mailPreviewImage"
                        {{$style}}="{{$background}} url({{ asset('assets/img/avatar.png')}}">
                    </div>
                    <span class="picker-edit rounded-circle text-gray-500 fs-small" data-bs-toggle="tooltip"
                          data-placement="top"
                          data-bs-original-title="{{__('messages.document.change_attachment')}}">
                        <label>
                            <i class="fa-solid fa-pen" id="profileImageIcon"></i>
                            <input type="file" id="mailAttachmentImage" name="file"
                                   class="image-upload d-none"/>
                            <input type="hidden" name="avatar_remove"/>
                        </label>
                    </span>
                </div>
            </div>
        </div> 
    </div>
    <div class="d-flex justify-content-end">
        {{ Form::submit(__('messages.sms.send'), ['class' => 'btn btn-primary']) }}
        <a href="{{ route('mail') }}"
           class="btn btn-secondary ms-2">{{ __('messages.common.cancel') }}</a>
    </div>
</div>
