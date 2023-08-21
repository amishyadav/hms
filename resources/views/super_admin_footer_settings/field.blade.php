{{--<div class="alert alert-danger display-none" id="customValidationErrorsBox"></div>--}}
<div class="row gx-10 my-5">
    <div class="col-md-12">
        <div class="form-group mb-5">
            {{ Form::label('footer_text', __('messages.footer_setting.footer_text').':', ['class' => 'form-label']) }}
            <span class="required"></span>
            {{ Form::textarea('footer_text', $settings['footer_text'], ['class' => 'form-control', 'required', 'id' => 'footerText','tabindex' => '1','rows'=> '5','maxLength'=> 270, 'placeholder'=>__('messages.footer_setting.footer_text')]) }}
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group mb-5">
            {{ Form::label('email', __('messages.user.email').':', ['class' => 'form-label']) }}
            <span class="required"></span>
            {{ Form::email('email', $settings['email'], ['class' => 'form-control ', 'required', 'placeholder'=> __('messages.user.email')]) }}
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group mb-5">
            {{--            @dd($settings['phone'])--}}
            {{ Form::label('phone',__('messages.sms.phone_number').':',['class' => 'form-label']) }}
            <span class="required"></span>
            {!! Form::tel('phone', $settings['phone'], ['class' => 'form-control iti phoneNumber', 'required','id' => 'editFooterSettingPhoneNumber', 'onkeyup' => 'if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,"")']) !!}
            {!! Form::hidden('prefix_code',null,['id'=>'prefix_code', 'class' => 'prefix_code']) !!}
            <span class="text-success d-none fw-400 fs-small mt-2 valid-msg">✓ &nbsp; {{__('messages.valid')}}</span>
            <span class="text-danger d-none fw-400 fs-small mt-2 error-msg"></span>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group mb-5">
            {{ Form::label('address', __('messages.footer_setting.address').':', ['class' => 'form-label']) }}
            <span class="required"></span>
            {{ Form::text('address', $settings['address'], ['class' => 'form-control','maxLength'=> 60,'placeholder'=> __('messages.footer_setting.address')]) }}
        </div>
    </div>
    <!-- Facebook URL Field -->
    <div class="form-group col-sm-6 mb-5">
        {{ Form::label('facebook_url', __('messages.facebook_url').':', ['class' => 'form-label']) }}
        {{ Form::text('facebook_url', $settings['facebook_url'], ['class' => 'form-control','id'=>'facebookUrl', 'onkeypress' => 'return avoidSpace(event);', 'placeholder'=> __('messages.facebook_url')]) }}
    </div>

    <!-- Twitter URL Field -->
    <div class="form-group col-sm-6 mb-5">
        {{ Form::label('twitter_url', __('messages.twitter_url').':', ['class' => 'form-label']) }}
        {{ Form::text('twitter_url', $settings['twitter_url'], ['class' => 'form-control','id'=>'twitterUrl', 'onkeypress' => 'return avoidSpace(event);', 'placeholder'=>__('messages.twitter_url')]) }}
    </div>

    <!-- Instagram URL Field -->
    <div class="form-group col-sm-6 mb-5">
        {{ Form::label('instagram_url', __('messages.instagram_url').':', ['class' => 'form-label']) }}
        {{ Form::text('instagram_url', $settings['instagram_url'], ['class' => 'form-control', 'id'=>'instagramUrl', 'onkeypress' => 'return avoidSpace(event);', 'placeholder' => __('messages.instagram_url')]) }}
    </div>

    <!-- LinkedIn URL Field -->
    <div class="form-group col-sm-6 mb-5">
        {{ Form::label('linkedin_url', __('messages.linkedIn_url').':', ['class' => 'form-label']) }}
        {{ Form::text('linkedin_url', $settings['linkedin_url'], ['class' => 'form-control','id'=>'linkedInUrl', 'onkeypress' => 'return avoidSpace(event);', 'placeholder' => __('messages.linkedIn_url')]) }}
    </div>
</div>

<div class="float-end">
    {{ Form::submit(__('messages.common.save'), ['class' => 'btn btn-primary me-2','id' => 'btnSave']) }}
    {{ Form::reset(__('messages.common.cancel'), ['class' => 'btn btn-secondary']) }}
</div>
