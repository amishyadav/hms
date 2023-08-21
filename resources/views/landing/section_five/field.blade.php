<?php
$style = 'style=';
$background = 'background-image:';
?>
<div class="row">
    <div class="form-group col-sm-12 mb-5">
        <div class="row2">
            <label class="form-label"
                   for="about_us_image"> <span>{{__('messages.landing_cms.main_image')}}: </span>
                <span class="required"></span>
                <i class="fa fa-question-circle ms-1 fs-7" data-bs-toggle="tooltip"
                   data-placement="top"
                   data-bs-original-title="Best resolution for this image will be 715x535"></i>
            </label>
            <div class="d-block">
                <div class="image-picker">
                    <div class="image previewImage" id="previewImage"
                         style="background-image: url({{ isset($sectionFive['main_img_url']) ? asset($sectionFive['main_img_url']) : asset('web_front/images/doctors/doctor.png') }})"></div>
                    <span class="picker-edit rounded-circle text-gray-500 fs-small" data-bs-toggle="tooltip"
                          data-placement="top"
                          data-bs-original-title="Change image">
                                    <label>
                                    <i class="fa-solid fa-pen" id="profileImageIcon"></i>
                                        {{ Form::file('main_img_url',['class' =>'image-upload d-none','accept' => 'image/*']) }}
                                        <input type="hidden" name="avatar_remove">
                                    </label>
                                </span>
                </div>
            </div>
        </div>
        <div class="form-text">Allowed file types: png, jpg, jpeg, svg.</div>
    </div>

    <div class="form-group col-sm-4 mb-5">
        <div class="row2">
            <label class="form-label"
                   for="about_us_image"> <span>{{__('messages.landing_cms.card_one_image')}}: </span>
                <span class="required"></span>
                <i class="fa fa-question-circle ms-1 fs-7" data-bs-toggle="tooltip"
                   data-placement="top"
                   data-bs-original-title="Best resolution for this image will be 70x70"></i>
            </label>
            <div class="d-block">
                <div class="image-picker">
                    <div class="image previewImage" id="previewImage"
                         style="background-image: url({{ isset($sectionFive['card_img_url_one']) ? asset($sectionFive['card_img_url_one']) : asset('web_front/images/doctors/doctor.png') }})"></div>
                    <span class="picker-edit rounded-circle text-gray-500 fs-small" data-bs-toggle="tooltip"
                          data-placement="top"
                          data-bs-original-title="Change image">
                                    <label>
                                    <i class="fa-solid fa-pen" id="profileImageIcon"></i>
                                        {{ Form::file('card_img_url_one',['class' =>'image-upload d-none','accept' => 'image/*']) }}
                                        <input type="hidden" name="avatar_remove">
                                    </label>
                                </span>
                </div>
            </div>
        </div>
        <div class="form-text">Allowed file types: png, jpg, jpeg, svg.</div>
    </div>

    <div class="col-sm-8">
        <!-- Card One Text Field -->
        <div class="form-group col-sm-12 mb-5">
            {{ Form::label('card_one_number', __('messages.landing_cms.card_one_number').':', ['class' => 'form-label']) }}
            <span class="required"></span>
            {{ Form::number('card_one_number', $sectionFive['card_one_number'], ['class' => 'form-control','maxLength' => '4' ,'onKeyPress'=>'if(this.value.length==4) return false;','placeholder'=>__('messages.landing_cms.card_one_number')]) }}
        </div>

        <!-- Card One Text Secondary Field -->
        <div class="form-group col-sm-12 mb-5">
            {{ Form::label('card_one_text', __('messages.landing_cms.card_one_text').':', ['class' => 'form-label']) }}
            <span class="required"></span>
            {{ Form::text('card_one_text', $sectionFive['card_one_text'], ['class' => 'form-control','maxLength' => '15','placeholder'=>__('messages.landing_cms.card_one_text')]) }}
        </div>
    </div>

    <div class="form-group col-sm-4 mb-5">
        <div class="row2">
            <label class="form-label"
                   for="about_us_image"> <span>{{__('messages.landing_cms.card_two_image')}}: </span>
                <span class="required"></span>
                <i class="fa fa-question-circle ms-1 fs-7" data-bs-toggle="tooltip"
                   data-placement="top"
                   data-bs-original-title="Best resolution for this image will be 70x70"></i>
            </label>
            <div class="d-block">
                <div class="image-picker">
                    <div class="image previewImage" id="exampleInputImage"
                         style="background-image: url({{ isset($sectionFive['card_img_url_two']) ? asset($sectionFive['card_img_url_two']) : asset('web_front/images/doctors/doctor.png') }})"></div>
                    <span class="picker-edit rounded-circle text-gray-500 fs-small" data-bs-toggle="tooltip"
                          data-placement="top"
                          data-bs-original-title="Change image">
                                    <label>
                                    <i class="fa-solid fa-pen" id="profileImageIcon"></i>
                                        {{ Form::file('card_img_url_two',['class' =>'image-upload d-none','accept' => 'image/*']) }}
                                        <input type="hidden" name="avatar_remove">
                                    </label>
                                </span>
                </div>
            </div>
        </div>
        <div class="form-text">Allowed file types: png, jpg, jpeg, svg.</div>
    </div>

    <div class="col-sm-8">
        <!-- Card Two Text Field -->
        <div class="form-group col-sm-12 mb-5">
            {{ Form::label('card_two_number', __('messages.landing_cms.card_two_number').':', ['class' => 'form-label']) }}
            <span class="required"></span>
            {{ Form::number('card_two_number', $sectionFive['card_two_number'], ['class' => 'form-control','maxLength' => '4' ,'onKeyPress'=>'if(this.value.length==4) return false;','placeholder'=>__('messages.landing_cms.card_two_number')]) }}
        </div>

        <!-- Card Two Text Secondary Field -->
        <div class="form-group col-sm-12 mb-5">
            {{ Form::label('card_two_text', __('messages.landing_cms.card_two_text').':', ['class' => 'form-label']) }}
            <span class="required"></span>
            {{ Form::text('card_two_text', $sectionFive['card_two_text'], ['class' => 'form-control','maxLength' => '15','placeholder'=>__('messages.landing_cms.card_two_text')]) }}
        </div>
    </div>

    <div class="form-group col-sm-4 mb-5">
        <div class="row2">
            <label class="form-label"
                   for="about_us_image"> <span>{{__('messages.landing_cms.card_three_image')}}: </span>
                <span class="required"></span>
                <i class="fa fa-question-circle ms-1 fs-7" data-bs-toggle="tooltip"
                   data-placement="top"
                   data-bs-original-title="Best resolution for this image will be 70x70"></i>
            </label>
            <div class="d-block">
                <div class="image-picker">
                    <div class="image previewImage" id="exampleInputImage"
                         style="background-image: url({{ isset($sectionFive['card_img_url_three']) ? asset($sectionFive['card_img_url_three']) : asset('web_front/images/doctors/doctor.png') }})"></div>
                    <span class="picker-edit rounded-circle text-gray-500 fs-small" data-bs-toggle="tooltip"
                          data-placement="top"
                          data-bs-original-title="Change image">
                                    <label>
                                    <i class="fa-solid fa-pen" id="profileImageIcon"></i>
                                        {{ Form::file('card_img_url_three',['class' =>'image-upload d-none','accept' => 'image/*']) }}
                                        <input type="hidden" name="avatar_remove">
                                    </label>
                                </span>
                </div>
            </div>
        </div>
        <div class="form-text">Allowed file types: png, jpg, jpeg, svg.</div>
    </div>

    <div class="col-sm-8">
        <!-- Card third Text Field -->
        <div class="form-group col-sm-12 mb-5">
            {{ Form::label('card_three_number', __('messages.landing_cms.card_three_number').':', ['class' => 'form-label']) }}
            <span class="required"></span>
            {{ Form::number('card_three_number', $sectionFive['card_three_number'], ['class' => 'form-control','maxLength' => '4' ,'onKeyPress'=>'if(this.value.length==4) return false;','placeholder'=>__('messages.landing_cms.card_three_number')]) }}
        </div>

        <!-- Card third Text Secondary Field -->
        <div class="form-group col-sm-12 mb-5">
            {{ Form::label('card_three_text', __('messages.landing_cms.card_three_text').':', ['class' => 'form-label']) }}
            <span class="required"></span>
            {{ Form::text('card_three_text', $sectionFive['card_three_text'], ['class' => 'form-control','maxLength' => '15','placeholder'=>__('messages.landing_cms.card_three_text')]) }}
        </div>
    </div>

    <div class="form-group col-sm-4 mb-5">
        <div class="row2">
            <label class="form-label"
                   for="about_us_image"> <span>{{__('messages.landing_cms.card_four_image')}}: </span>
                <span class="required"></span>
                <i class="fa fa-question-circle ms-1 fs-7" data-bs-toggle="tooltip"
                   data-placement="top"
                   data-bs-original-title="Best resolution for this image will be 70x70"></i>
            </label>
            <div class="d-block">
                <div class="image-picker">
                    <div class="image previewImage" id="exampleInputImage"
                         style="background-image: url({{ isset($sectionFive['card_img_url_four']) ? asset($sectionFive['card_img_url_four']) : asset('web_front/images/doctors/doctor.png') }})"></div>
                    <span class="picker-edit rounded-circle text-gray-500 fs-small" data-bs-toggle="tooltip"
                          data-placement="top"
                          data-bs-original-title="Change image">
                                    <label>
                                    <i class="fa-solid fa-pen" id="profileImageIcon"></i>
                                        {{ Form::file('card_img_url_four',['class' =>'image-upload d-none','accept' => 'image/*']) }}
                                        <input type="hidden" name="avatar_remove">
                                    </label>
                                </span>
                </div>
            </div>
        </div>
        <div class="form-text">Allowed file types: png, jpg, jpeg, svg.</div>
    </div>

    <div class="col-sm-8">
        <!-- Card third Text Field -->
        <div class="form-group col-sm-12 mb-5">
            {{ Form::label('card_four_number', __('messages.landing_cms.card_four_number').':', ['class' => 'form-label']) }}
            <span class="required"></span>
            {{ Form::number('card_four_number', $sectionFive['card_four_number'], ['class' => 'form-control','maxLength' => '4','onKeyPress'=>'if(this.value.length==4) return false;','placeholder'=>__('messages.landing_cms.card_four_number')]) }}
        </div>

        <!-- Card third Text Secondary Field -->
        <div class="form-group col-sm-12 mb-5">
            {{ Form::label('card_four_text', __('messages.landing_cms.card_four_text').':', ['class' => 'form-label']) }}
            <span class="required"></span>
            {{ Form::text('card_four_text', $sectionFive['card_four_text'], ['class' => 'form-control','maxLength' => '15','placeholder'=>__('messages.landing_cms.card_four_text')]) }}
        </div>
    </div>

</div>

<div class="float-end">
    {{ Form::submit(__('messages.common.save'), ['class' => 'btn btn-primary me-2']) }}
    {{ Form::reset(__('messages.common.cancel'), ['class' => 'btn btn-secondary']) }}
</div>

