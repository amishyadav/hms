@extends('settings.edit')
@section('title')
    {{ __('messages.general') }}
@endsection
@section('section')
    <div class="card border-0">
        <div class="card-body">
            {{ Form::open(['route' => ['settings.update'], 'method' => 'post', 'files' => true, 'id' => 'createSetting']) }}
            <div class="alert alert-danger d-none hide" id="generalValidationErrorsBox"></div>
            <div class="row">
                <!-- App Name Field -->
                <div class="form-group col-sm-6 mb-5">
                    {{ Form::label('app_name', __('messages.setting.app_name').':', ['class' => 'form-label']) }}
                    <span class="required"></span>
                    {{ Form::text('app_name', $settings['app_name'], ['class' => 'form-control', 'required']) }}
                </div>
                <!-- Company Name Field -->
                <div class="form-group col-sm-6 mb-5">
                    {{ Form::label('company_name', __('messages.setting.company_name').':', ['class' => 'form-label']) }}
                    <span class="required"></span>
                    {{ Form::text('company_name', $settings['company_name'], ['class' => 'form-control', 'required']) }}
                </div>
            </div>
            <div class="row">
                <!-- Hospital Email Field -->
                <div class="form-group col-sm-6 mb-5">
                    {{ Form::label('hospital_email', __('messages.setting.hospital_email').':', ['class' => 'form-label']) }}
                    <span class="required"></span>
                    {{ Form::email('hospital_email', $settings['hospital_email'], ['class' => 'form-control', 'required']) }}
                </div>
                <!-- Hospital Phone Field -->
                <div class="form-group col-sm-6 mb-5 hospitalPhone">
                    {{ Form::label('hospital_phone', __('messages.setting.hospital_phone').':', ['class' => 'form-label']) }}
                    <span class="required"></span>
                    <br>
                    {{ Form::tel('hospital_phone', $settings['hospital_phone'], ['class' => 'form-control phoneNumber','id' => 'phoneNumber', 'onkeyup' => 'if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,"")','required']) }}
                    {!! Form::hidden('prefix_code',null,['class'=>'prefix_code']) !!}
                    <span class="text-success valid-msg d-none fw-400 fs-small mt-2">✓ &nbsp; {{__('messages.valid')}}</span>
                    <span class="text-danger error-msg d-none fw-400 fs-small mt-2"></span>
                </div>
                <!-- Hospital From Day Field -->
                <div class="form-group col-sm-6 mb-5">
                    {{ Form::label('hospital_from_day', __('messages.setting.hospital_from_day').':', ['class' => 'form-label']) }}
                    <span class="required"></span>
                    {{ Form::text('hospital_from_day', $settings['hospital_from_day'], ['class' => 'form-control', 'required', 'onkeypress' => 'return avoidSpace(event);'])}}
                </div>
                <!-- Hospital From Time Field -->
                <div class="form-group col-sm-6 mb-5">
                    {{ Form::label('hospital_from_time', __('messages.setting.hospital_from_time').':', ['class' => 'form-label']) }}
                    <span class="required"></span>
                    {{ Form::text('hospital_from_time', $settings['hospital_from_time'], ['class' => 'form-control', 'required', 'onkeypress' => 'return avoidSpace(event);']) }}
                </div>
                <!-- Address Field -->
                <div class="form-group col-sm-6 mb-5">
                    {{ Form::label('hospital_address', __('messages.setting.address').':', ['class' => 'form-label']) }}
                    <span class="required"></span>
                    {{ Form::text('hospital_address', $settings['hospital_address'], ['class' => 'form-control', 'required', 'onkeypress' => 'return avoidSpace(event);']) }}
                </div>
                <!-- Currency Field -->
                <div class="form-group col-sm-6 mb-5">
                    {{ Form::label('current_currency', __('messages.setting.currency').':', ['class' => 'form-label']) }}
                    <span class="required"></span>
                    <select id="currencyType" data-show-content="true" class="form-select"
                            name="current_currency">
                        @foreach($currencies as $key => $currency)
                            <option value="{{$key}}" {{getCurrentCurrency() == $key ? 'selected' : ''}}>
                                {{$currency['symbol']}}&nbsp;&nbsp;&nbsp; {{$currency['name']}}
                            </option>
                        @endforeach
                    </select>
                </div>

                <!-- About us Field -->
                <div class="form-group col-sm-12 mb-5">
                    {{ Form::label('about_us', __('messages.about_us').':', ['class' => 'form-label']) }}
                    <span class="required"></span>
                    {{ Form::textarea('about_us', $settings['about_us'], ['class' => 'form-control', 'required', 'rows' => 5, 'onkeypress' => 'return avoidSpace(event);']) }}
                </div>
            </div>
            <div class="row">
                <!-- App Logo Field -->
                <div class="form-group col-sm-6 mb-5">
                    <div class="d-block">
                        {{ Form::label('app_logo', __('messages.setting.app_logo').(':'), ['class' => 'form-label']) }}
                        <span class="required"></span>
                        <span data-bs-toggle="tooltip"
                              data-placement="top"
                              data-bs-original-title="{{  __('messages.setting.image_validation') }}">
                            <i class="fas fa-question-circle ml-1 mt-1 general-question-mark" ></i>
                        </span>
                    </div>
                    <div class="image-input image-input-outline">
                        <?php
                        $style = 'style';
                        $background = 'background-image:';
                        ?>
                        <div class="image-picker">
                            <div class="image previewImage" id="logoPreviewImage"
                                {{$style}}="{{$background}} url({{ ($settings['app_logo']) ? 
                                                $settings['app_logo'] : asset('hms-saas-logo.png') }})">
                            </div>
                            <span class="picker-edit rounded-circle text-gray-500 fs-small" data-bs-toggle="tooltip"
                                  data-placement="top"
                                  data-bs-original-title="{{ __('messages.setting.change_logo') }}">
                                <label>
                                    <i class="fa-solid fa-pen" id="profileImageIcon"></i>
                                    <input type="file" id="appLogo" name="app_logo" class="image-upload d-none"/>
                                    <input type="hidden" name="avatar_remove"/>
                                </label>
                            </span>
                        </div>
                    </div>
                </div>

            <!-- Favicon Field -->
            <div class="form-group col-sm-6 mb-5">
                <div class="d-block">
                    {{ Form::label('favicon', __('messages.setting.favicon').(':'), ['class' => 'form-label']) }}
                    <span class="required"></span>
                    <i class="fas fa-question-circle ml-1 mt-1 general-question-mark" data-bs-toggle="tooltip"
                       data-placement="top"
                       data-bs-original-title="{{  __('messages.setting.favicon_validation') }}"></i>
                </div>
                <div class="image-input image-input-outline">
                    <?php
                    $style = 'style';
                    $background = 'background-image:';
                    ?>
                    <div class="image-picker">
                        <div class="image previewImage" id="previewImage"
                            {{$style}}="{{$background}} url({{ ($settings['favicon']) ? 
                                        $settings['favicon'] : asset('web/img/hms-saas-favicon.ico') }})">
                        </div>
                        <span class="picker-edit rounded-circle text-gray-500 fs-small" data-bs-toggle="tooltip"
                              data-placement="top"
                              data-bs-original-title="{{__('messages.setting.change_favicon')}}">
                            <label>
                                <i class="fa-solid fa-pen" id="profileImageIcon"></i>
                                <input type="file" id="favicon" name="favicon" class="image-upload d-none"/>
                                <input type="hidden" name="avatar_remove"/>
                            </label>
                        </span>
                    </div>
                </div>
            </div>
            <hr>
            <div class="row mt-3 mb-5">
                <div class="col-md-12 mb-3">
                    <h5>{{ __('messages.setting.social_details') }}</h5>
                </div>

                <!-- Facebook URL Field -->
                <div class="form-group col-sm-6 mb-5">
                    {{ Form::label('facebook_url', __('messages.facebook_url').':', ['class' => 'form-label']) }}
                    {{ Form::text('facebook_url', $settings['facebook_url'], ['class' => 'form-control','id'=>'generalFacebookUrl', 'onkeypress' => 'return avoidSpace(event);']) }}
                </div>

                <!-- Twitter URL Field -->
                <div class="form-group col-sm-6 mb-5">
                    {{ Form::label('twitter_url', __('messages.twitter_url').':', ['class' => 'form-label']) }}
                    {{ Form::text('twitter_url', $settings['twitter_url'], ['class' => 'form-control','id'=>'generalTwitterUrl', 'onkeypress' => 'return avoidSpace(event);']) }}
                </div>

                <!-- Instagram URL Field -->
                <div class="form-group col-sm-6 mb-5">
                    {{ Form::label('instagram_url', __('messages.instagram_url').':', ['class' => 'form-label']) }}
                    {{ Form::text('instagram_url', $settings['instagram_url'], ['class' => 'form-control', 'id'=>'generalInstagramUrl', 'onkeypress' => 'return avoidSpace(event);']) }}
                </div>

                <!-- LinkedIn URL Field -->
                <div class="form-group col-sm-6 mb-5">
                    {{ Form::label('linkedIn_url', __('messages.linkedIn_url').':', ['class' => 'form-label']) }}
                    {{ Form::text('linkedIn_url', $settings['linkedIn_url'], ['class' => 'form-control','id'=>'generalLinkedInUrl', 'onkeypress' => 'return avoidSpace(event);']) }}
                </div>

            </div>
    <div class="form-group col-lg-12 col-md-12 d-flex justify-content-start mb-3">
        <div class="form-check form-switch fv-row mb-3">
            <input tabindex="11" name="enable_google_recaptcha" class="form-check-input w-35px h-20px is-active"
                   value="1"
                   {{ (isset($settings['enable_google_recaptcha']) && $settings['enable_google_recaptcha']) ? 'checked' : '' }} type="checkbox"
                   id="allowmarketing">
            <label class="form-check-label" for="allowmarketing"></label>
        </div>
        <span class="form-label">{{ __('messages.setting.enable_google_reCAPTCHA') }}</span>
    </div>
    <div class="clearfix"></div>
    <div class="row">
        <!-- Submit Field -->
        <div class="d-flex justify-content-end">
            {{ Form::submit(__('messages.common.save'), ['class' => 'btn btn-primary']) }}
            {{ Form::reset(__('messages.common.cancel'), ['class' => 'btn btn-secondary ms-2']) }}
        </div>
    </div>
    {{ Form::close() }}
    </div>
@endsection
