@extends('front_settings.index')
@section('title')
    {{ __('messages.front_settings') }}
@endsection
@section('section')
    <div class="d-md-flex align-items-center justify-content-between mb-7">
        <h1 class="mb-0"> {{ __('messages.front_setting.about_us_details') }} </h1>
    </div>
    <div class="card">
        <div class="card-body">
            {{ Form::open(['route' => ['front.settings.update'], 'method' => 'post', 'files' => true, 'id' => 'createFrontSetting']) }}
            {{ Form::hidden('sectionName', $sectionName) }}
            <div class="alert alert-danger d-none hide" id="validationErrorsBox"></div>
            <div class="row">
                <!-- About Us title Field -->
                <div class="form-group col-sm-12 mb-5">
                    {{ Form::label('about_us_title', __('messages.front_setting.about_us_title').':', ['class' => 'form-label']) }}
                    <span class="required"></span>
                    {{ Form::text('about_us_title', $frontSettings['about_us_title'], ['class' => 'form-control', 'required',
'id'=>'aboutUsTitle']) }}
                </div>
                <!-- About Us description Field -->
                <div class="form-group col-sm-12 mb-5">
                    {{ Form::label('about_us_description', __('messages.front_setting.about_us_description').':', ['class' => 'form-label']) }}
                    <span class="required"></span>
                    {{ Form::textarea('about_us_description', $frontSettings['about_us_description'], ['class' => 'form-control', 'required', 'rows' => 5,'id'=>'aboutUsDes']) }}
                </div>
                <!-- About Us mission Field -->
                <div class="form-group col-sm-12 mb-5">
                    {{ Form::label('about_us_mission', __('messages.front_setting.about_us_mission').':', ['class' => 'form-label']) }}
                    <span class="required"></span>
                    {{ Form::textarea('about_us_mission', $frontSettings['about_us_mission'], ['class' => 'form-control', 'required', 'rows' => 5
,'id'=>'aboutUsMission']) }}
                </div>
                <!-- About US Image Field -->
                <div class="form-group col-sm-6 mb-5">
                    {{ Form::label('about_us_image', __('messages.front_setting.about_us_image').':', ['class' => 'form-label']) }}
                    <span class="required"></span>
                    <div class="image-input image-input-outline">
                        <?php
                        $style = 'style';
                        $background = 'background-image:';
                        ?>
                        <div class="image-picker">
                            <div class="image previewImage" id="previewImage" {{$style}}="{{$background}} 
                                        url('{{ ($frontSettings['about_us_image']) ? $frontSettings['about_us_image'] :
                                        asset('assets/img/default_image.jpg') }}')">
                            </div>
                            <span class="picker-edit rounded-circle text-gray-500 fs-small" data-bs-toggle="tooltip"
                                  data-placement="top"
                                  data-bs-original-title="Change image"> 
                                <label> 
                                    <i class="fa-solid fa-pen" id="profileImageIcon"></i> 
                                    <input type="file" id="aboutUsImage" name="about_us_image" 
                                           class="image-upload d-none" accept="image/*"/>
                                </label> 
                            </span>
                        </div>
                    </div>
                </div>
            <div class="clearfix"></div>
            <div class="row">
                <!-- Submit Field -->
                <div class="modal-footer p-0">
                    {{ Form::submit(__('messages.common.save'), ['class' => 'btn btn-primary']) }}
                    {{ Form::reset(__('messages.common.cancel'), ['class' => 'btn btn-secondary ms-2']) }}
                </div>
            </div>
            {{ Form::close() }}
        </div>
    </div>
@endsection
{{--    <script src="{{mix('assets/js/front_settings/cms/create-edit.js')}}"></script>--}}
