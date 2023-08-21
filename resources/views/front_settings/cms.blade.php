
@extends('front_settings.index')
@section('title')
    {{ __('messages.front_settings') }}
@endsection
@section('section')
    <div class="d-md-flex align-items-center justify-content-between mb-7">
        <h1 class="mb-0"> {{ __('messages.front_setting.front_setting_details') }} </h1>
    </div>
    <div class="card">
        <div class="card-body">
            {{ Form::open(['route' => ['front.settings.update'], 'method' => 'post', 'files' => true, 'id' => 'addCMSForm']) }}
            {{ Form::hidden('sectionName', $sectionName) }}
            <div class="alert alert-danger d-none hide" id="validationErrorsBox"></div>
            <div class="row">
                <!-- Home Image Field -->
                <div class="form-group col-sm-6 mb-5">
                    <div class="row2">
                        <label class="form-label"
                        for="about_us_image"> <span>{{__('messages.front_setting.home_page_image')}}: </span>
                            <span class="required"></span>
                            <i class="fa fa-question-circle ms-1 fs-7" data-bs-toggle="tooltip"
                               data-placement="top"
                               data-bs-original-title="Best resolution for this profile will be 735x850"></i>
                        </label>
                        <div class="image-input image-input-outline">
                            <?php
                            $style = 'style';
                            $background = 'background-image:';
                            ?>
                            <div class="mb-3" io-image-input="true">
                                <div class="d-block">
                                    <div class="image-picker">
                                        <div class="image previewImage" id="previewImage" {{$style}} = "{{$background}}
                                            url('{{ ($frontSettings['home_page_image']) ? $frontSettings['home_page_image'] : asset                                                           ('web_front/images/doctors/doctor.png') }}')">
                                        </div>
                                        <span class="picker-edit rounded-circle text-gray-500 fs-small" data-bs-toggle="tooltip"
                                              data-placement="top"
                                              data-bs-original-title="Change image">
                                            <label>
                                                <i class="fa-solid fa-pen" id="profileImageIcon"></i> 
                                                <input type="file" id="homePageImage" name="home_page_image" 
                                                       class="image-upload d-none" accept=".png, .jpg, .jpeg"/> 
                                            </label> 
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            <!-- Certified Doctor Image Field -->
            <div class="form-group col-sm-6 mb-5">
                <div class="row2">
                    <label class="form-label"
                           for="about_us_image"> <span>{{__('messages.front_setting.home_page_certified_doctor_image')}}: </span>
                        <span class="required"></span>
                        <i class="fa fa-question-circle ms-1 fs-7" data-bs-toggle="tooltip"
                           data-placement="top"
                           data-bs-original-title="Best resolution for this profile will be 636x708"></i>
                    </label>
                    <div class="image-input image-input-outline">
                        <?php
                        $style = 'style';
                        $background = 'background-image:';
                        ?>
                        <div class="mb-3" io-image-input="true">
                            <div class="d-block">
                                <div class="image-picker">
                                    <div class="image previewImage" id="previewImage" {{$style}} = "{{$background}}
                                        url('{{ ($frontSettings['home_page_certified_doctor_image']) ?                                                                                            $frontSettings['home_page_certified_doctor_image'] : asset                                                                                        ('web_front/images/healthcare-doctor/doctor-1.png') }}')">
                                    </div>
                                    <span class="picker-edit rounded-circle text-gray-500 fs-small" data-bs-toggle="tooltip"
                                          data-placement="top"
                                          data-bs-original-title="Change image">
                                            <label>
                                                <i class="fa-solid fa-pen" id="profileImageIcon"></i> 
                                                <input type="file" id="homeDoctorImage" name="home_page_certified_doctor_image"
                                                       class="image-upload d-none" accept=".png, .jpg, .jpeg"/> 
                                            </label> 
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mt-3 mb-5">
                <!-- Home Experience Field -->
                <div class="form-group col-sm-12 mb-5">
                    {{ Form::label('home_page_experience', __('messages.front_setting.home_page_experience').':', ['class' => 'form-label']) }}
                    <span class="required"></span>
                    {{ Form::text('home_page_experience', $frontSettings['home_page_experience'], ['class' => 'form-control', 'required','id'=> 'homePageExperience']) }}
                </div>

                <!-- Home Title Field -->
                <div class="form-group col-sm-12 mb-5">
                    {{ Form::label('home_page_title', __('messages.front_setting.home_page_title').':', ['class' => 'form-label required']) }}
                    {{ Form::text('home_page_title', $frontSettings['home_page_title'], ['class' => 'form-control', 'required', 'id' => 'homeTitleId']) }}
                </div>

                <!-- Home description Field -->
                <div class="form-group col-sm-12 mb-5">
                    {{ Form::label('home_page_description', __('messages.front_setting.home_page_description').':', ['class' => 'form-label']) }}
                    <span class="required"></span>
                    {{ Form::textarea('home_page_description', $frontSettings['home_page_description'], ['class' => 'form-control', 'required', 'rows' => 5, 'id' => 'homeShortDescription']) }}
                </div>

                <!-- Home Box Title Field -->
                <div class="form-group col-sm-12 mb-5">
                    {{ Form::label('home_page_box_title', __('messages.front_setting.home_page_box_title').':', ['class' => 'form-label']) }}
                    <span class="required"></span>
                    {{ Form::text('home_page_box_title', $frontSettings['home_page_box_title'], ['class' => 'form-control', 'required',
'id'=>'homePageBoxTitle']) }}
                </div>

                <!-- Home Box description Field -->
                <div class="form-group col-sm-12 mb-5">
                    {{ Form::label('home_page_box_description', __('messages.front_setting.home_page_box_description').':', ['class' => 'form-label']) }}
                    <span class="required"></span>
                    {{ Form::textarea('home_page_box_description', $frontSettings['home_page_box_description'], ['class' => 'form-control', 'required', 'rows' => 5 , 'id'=>'homePageBoxDes']) }}
                </div>
            </div>
            <div class="row mt-3 mb-5">
                <!-- Certified Doctor Text Field -->
                <div class="form-group col-sm-12 mb-5">
                    {{ Form::label('home_page_certified_doctor_text', __('messages.front_setting.home_page_certified_doctor_text').':', ['class' => 'form-label']) }}
                    <span class="required"></span>
                    {{ Form::text('home_page_certified_doctor_text', $frontSettings['home_page_certified_doctor_text'], ['class' => 'form-control', 'required', 'id' => 'homeDoctorTextId']) }}
                </div>

                <!-- Certified Doctor Title Field -->
                <div class="form-group col-sm-12 mb-5">
                    {{ Form::label('home_page_certified_doctor_title', __('messages.front_setting.home_page_certified_doctor_title').':', ['class' => 'form-label']) }}
                    <span class="required"></span>
                    {{ Form::text('home_page_certified_doctor_title', $frontSettings['home_page_certified_doctor_title'], ['class' => 'form-control', 'required', 'id' => 'homeDoctorTitleId']) }}
                </div>

                <!-- Certified Doctor Description Field -->
                <div class="form-group col-sm-12 mb-5">
                    {{ Form::label('home_page_certified_doctor_description', __('messages.front_setting.home_page_certified_doctor_description').':', ['class' => 'form-label']) }}
                    <span class="required"></span>
                    {{ Form::textarea('home_page_certified_doctor_description', $frontSettings['home_page_certified_doctor_description'], ['class' => 'form-control', 'required', 'rows' => 5, 'id' => 'homeDoctorDescription']) }}
                </div>

                <!-- Certified Box Title Field -->
                <div class="form-group col-sm-12 mb-5">
                    {{ Form::label('home_page_certified_box_title', __('messages.front_setting.home_page_certified_box_title').':', ['class' => 'form-label']) }}
                    <span class="required"></span>
                    {{ Form::text('home_page_certified_box_title', $frontSettings['home_page_certified_box_title'], ['class' => 'form-control', 'required','id'=>'homePageCerBoxTl']) }}
                </div>

                <!-- Certified Box description Field -->
                <div class="form-group col-sm-12 mb-5">
                    {{ Form::label('home_page_certified_box_description', __('messages.front_setting.home_page_certified_box_description').':', ['class' => 'form-label']) }}
                    <span class="required"></span>
                    {{ Form::textarea('home_page_certified_box_description', $frontSettings['home_page_certified_box_description'], ['class' => 'form-control', 'required', 'rows' => 5,'id'=>'homePageCerBoxDes']) }}
                </div>
            </div>

            {{-- Step --}}
            <div class="row mt-3 mb-5">
                <!-- Step 1 Title Field -->
                <div class="form-group col-sm-12 mb-5">
                    {{ Form::label('home_page_step_1_title', __('messages.front_setting.home_page_step_1_title').':', ['class' => 'form-label']) }}
                    <span class="required"></span>
                    {{ Form::text('home_page_step_1_title', $frontSettings['home_page_step_1_title'], ['class' => 'form-control', 'required',
'id'=>'homePageStep1Tl']) }}
                </div>

                <!-- Step 1 description Field -->
                <div class="form-group col-sm-12 mb-5">
                    {{ Form::label('home_page_step_1_description', __('messages.front_setting.home_page_step_1_description').':', ['class' => 'form-label']) }}
                    <span class="required"></span>
                    {{ Form::textarea('home_page_step_1_description', $frontSettings['home_page_step_1_description'], ['class' => 'form-control', 'required', 'rows' => 5,'onkeypress' => 'return avoidSpace(event);' , 'id'=>'homePageStep1Des']) }}
                </div>

                <!-- Step 2 Title Field -->
                <div class="form-group col-sm-12 mb-5">
                    {{ Form::label('home_page_step_2_title', __('messages.front_setting.home_page_step_2_title').':', ['class' => 'form-label']) }}
                    <span class="required"></span>                     
                    {{ Form::text('home_page_step_2_title', $frontSettings['home_page_step_2_title'], ['class' => 'form-control', 'required',
'id'=>'homePageStep2Tl']) }}
                </div>

                <!-- Step 2 description Field -->
                <div class="form-group col-sm-12 mb-5">
                    {{ Form::label('home_page_step_2_description', __('messages.front_setting.home_page_step_2_description').':', ['class' => 'form-label']) }}
                    <span class="required"></span>
                    {{ Form::textarea('home_page_step_2_description', $frontSettings['home_page_step_2_description'], ['class' => 'form-control', 'required', 'rows' => 5,'onkeypress' => 'return avoidSpace(event);', 'id'=>'homePageStep2Des']) }}
                </div>

                <!-- Step 3 Title Field -->
                <div class="form-group col-sm-12 mb-5">
                    {{ Form::label('home_page_step_3_title', __('messages.front_setting.home_page_step_3_title').':', ['class' => 'form-label']) }}
                    <span class="required"></span>
                    {{ Form::text('home_page_step_3_title', $frontSettings['home_page_step_3_title'], ['class' => 'form-control', 'required',
'id'=>'homePageStep3Tl']) }}
                </div>

                <!-- Step 3 description Field -->
                <div class="form-group col-sm-12 mb-5">
                    {{ Form::label('home_page_step_3_description', __('messages.front_setting.home_page_step_3_description').':', ['class' => 'form-label']) }}
                    <span class="required"></span>
                    {{ Form::textarea('home_page_step_3_description', $frontSettings['home_page_step_3_description'], ['class' => 'form-control', 'required', 'rows' => 5,'onkeypress' => 'return avoidSpace(event);','id'=>'homePageStep3Des']) }}
                </div>

                <!-- Step 4 Title Field -->
                <div class="form-group col-sm-12 mb-5">
                    {{ Form::label('home_page_step_4_title', __('messages.front_setting.home_page_step_4_title').':', ['class' => 'form-label']) }}
                    <span class="required"></span>    
                   {{ Form::text('home_page_step_4_title', $frontSettings['home_page_step_4_title'], ['class' => 'form-control', 'required'
,'id'=>'homePageStep4Tl']) }}
                </div>

                <!-- Step 4 description Field -->
                <div class="form-group col-sm-12 mb-5">
                    {{ Form::label('home_page_step_4_description', __('messages.front_setting.home_page_step_4_description').':', ['class' => 'form-label']) }}
                    <span class="required"></span>
                    {{ Form::textarea('home_page_step_4_description', $frontSettings['home_page_step_4_description'], ['class' => 'form-control', 'required', 'rows' => 5,'onkeypress' => 'return avoidSpace(event);','id'=>'homePageStep4Des']) }}
                </div>
            </div>
            <div class="clearfix"></div>
            <div class="row">
            {{Form::hidden('termConditionData',$frontSettings['terms_conditions'],['class'=>'TermConditionData'])}}
            {{Form::hidden('privacyPolicyData',$frontSettings['privacy_policy'],['class'=>'PrivacyPolicyData'])}}
                <!-- Submit Field -->
                <div class="modal-footer p-0">
                    {{ Form::submit(__('messages.common.save'), ['class' => 'btn btn-primary me-0']) }}
                    {{ Form::reset(__('messages.common.cancel'), ['class' => 'btn btn-secondary ms-2']) }}
                </div>
            </div>
        {{ Form::close() }}
    </div>
    </div>
@endsection
{{--        let termConditionData = `{{$frontSettings['terms_conditions']}}`;--}}
{{--        let privacyPolicyData = `{{$frontSettings['privacy_policy']}}`;--}}
{{--    <script src="{{mix('assets/js/front_settings/cms/create-edit.js')}}"></script>--}}
