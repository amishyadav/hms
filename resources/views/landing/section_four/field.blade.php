<?php
$style = 'style=';
$background = 'background-image:';
?>
<div class="row">
    <!-- Text Main Field -->
    <div class="form-group col-sm-12 mb-5">
        {{ Form::label('text_main', __('messages.landing_cms.text_main').':', ['class' => 'form-label']) }}
        <span class="required"></span>
        {{ Form::text('text_main', $sectionFour['text_main'], ['class' => 'form-control','maxLength' => '30','placeholder'=> __('messages.landing_cms.text_main')]) }}
    </div>

    <!-- Text Secondary Field -->
    <div class="form-group col-sm-12 mb-5">
        {{ Form::label('text_secondary', __('messages.landing_cms.text_secondary').':', ['class' => 'form-label']) }}
        <span class="required"></span>
        {{ Form::text('text_secondary', $sectionFour['text_secondary'], ['class' => 'form-control', 'required','maxLength' => '160','placeholder'=> __('messages.landing_cms.text_secondary')]) }}
    </div>

    <div class="form-group col-sm-4 mb-5">
        <div class="row2">
            <label class="form-label"
                   for="about_us_image"> <span>{{__('messages.landing_cms.card_one_image')}}: </span>
                <span class="required"></span>
                <i class="fa fa-question-circle ms-1 fs-7" data-bs-toggle="tooltip"
                   data-placement="top"
                   data-bs-original-title="Best resolution for this image will be 50x50"></i>
            </label>
            <div class="d-block">
                <div class="image-picker">
                    <div class="image previewImage" id="exampleInputImage"
                         style="background-image: url({{ isset($sectionFour['img_url_one']) ? asset($sectionFour['img_url_one']) : asset('web_front/images/doctors/doctor.png') }})"></div>
                    <span class="picker-edit rounded-circle text-gray-500 fs-small" data-bs-toggle="tooltip"
                          data-placement="top"
                          data-bs-original-title="Change image">
                                    <label>
                                    <i class="fa-solid fa-pen" id="profileImageIcon"></i>
                                        {{ Form::file('img_url_one',['class' =>'image-upload d-none','accept' => 'image/*']) }}
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
            {{ Form::label('card_text_one', __('messages.landing_cms.card_one_text').':', ['class' => 'form-label']) }}
            <span class="required"></span>
            {{ Form::text('card_text_one', $sectionFour['card_text_one'], ['class' => 'form-control','maxLength' => '20','placeholder'=> __('messages.landing_cms.card_one_text')]) }}
        </div>

        <!-- Card One Text Secondary Field -->
        <div class="form-group col-sm-12 mb-5">
            {{ Form::label('card_text_one_secondary', __('messages.landing_cms.card_one_text_secondary').':', ['class' => 'form-label']) }}
            <span class="required"></span>
            {{ Form::text('card_text_one_secondary', $sectionFour['card_text_one_secondary'], ['class' => 'form-control','maxLength' => '90','placeholder'=> __('messages.landing_cms.card_one_text_secondary')]) }}
        </div>
    </div>

    <div class="form-group col-sm-4 mb-5">
        <div class="row2">
            <label class="form-label"
                   for="about_us_image"> <span>{{__('messages.landing_cms.card_two_image')}}: </span>
                <span class="required"></span>
                <i class="fa fa-question-circle ms-1 fs-7" data-bs-toggle="tooltip"
                   data-placement="top"
                   data-bs-original-title="Best resolution for this image will be 50x50"></i>
            </label>
            <div class="d-block">
                <div class="image-picker">
                    <div class="image previewImage" id="exampleInputImage"
                         style="background-image: url({{ isset($sectionFour['img_url_two']) ? asset($sectionFour['img_url_two']) : asset('web_front/images/doctors/doctor.png') }})"></div>
                    <span class="picker-edit rounded-circle text-gray-500 fs-small" data-bs-toggle="tooltip"
                          data-placement="top"
                          data-bs-original-title="Change image">
                                    <label>
                                    <i class="fa-solid fa-pen" id="profileImageIcon"></i>
                                        {{ Form::file('img_url_two',['class' =>'image-upload d-none','accept' => 'image/*']) }}
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
            {{ Form::label('card_text_two', __('messages.landing_cms.card_two_text').':', ['class' => 'form-label']) }}
            <span class="required"></span>
            {{ Form::text('card_text_two', $sectionFour['card_text_two'], ['class' => 'form-control','maxLength' => '20','placeholder'=> __('messages.landing_cms.card_two_text')]) }}
        </div>

        <!-- Card Two Text Secondary Field -->
        <div class="form-group col-sm-12 mb-5">
            {{ Form::label('card_text_two_secondary', __('messages.landing_cms.card_two_text_secondary').':', ['class' => 'form-label']) }}
            <span class="required"></span>
            {{ Form::text('card_text_two_secondary', $sectionFour['card_text_two_secondary'], ['class' => 'form-control','maxLength' => '90','placeholder'=> __('messages.landing_cms.card_two_text_secondary')]) }}
        </div>
    </div>

    <div class="form-group col-sm-4 mb-5">
        <div class="row2">
            <label class="form-label"
                   for="about_us_image"> <span>{{__('messages.landing_cms.card_three_image')}}: </span><span
                        class="required"></span>
                <i class="fa fa-question-circle ms-1 fs-7" data-bs-toggle="tooltip"
                   data-placement="top"
                   data-bs-original-title="Best resolution for this image will be 50x50"></i>
            </label>
            <div class="d-block">
                <div class="image-picker">
                    <div class="image previewImage" id="exampleInputImage"
                         style="background-image: url({{ isset($sectionFour['img_url_three']) ? asset($sectionFour['img_url_three']) : asset('web_front/images/doctors/doctor.png') }})"></div>
                    <span class="picker-edit rounded-circle text-gray-500 fs-small" data-bs-toggle="tooltip"
                          data-placement="top"
                          data-bs-original-title="Change image">
                                    <label>
                                    <i class="fa-solid fa-pen" id="profileImageIcon"></i>
                                        {{ Form::file('img_url_three',['class' =>'image-upload d-none','accept' => 'image/*']) }}
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
            {{ Form::label('card_text_three', __('messages.landing_cms.card_three_text').':', ['class' => 'form-label']) }}
            <span class="required"></span>
            {{ Form::text('card_text_three', $sectionFour['card_text_three'], ['class' => 'form-control','maxLength' => '20','placeholder'=> __('messages.landing_cms.card_three_text')]) }}
        </div>

        <!-- Card third Text Secondary Field -->
        <div class="form-group col-sm-12 mb-5">
            {{ Form::label('card_text_three_secondary', __('messages.landing_cms.card_three_text_secondary').':', ['class' => 'form-label']) }}
            <span class="required"></span>
            {{ Form::text('card_text_three_secondary', $sectionFour['card_text_three_secondary'], ['class' => 'form-control','maxLength' => '90','placeholder'=>  __('messages.landing_cms.card_three_text_secondary')]) }}
        </div>
    </div>

    <div class="form-group col-sm-4 mb-5">
        <div class="row2">
            <label class="form-label"
                   for="about_us_image"> <span>{{__('messages.landing_cms.card_four_image')}}: </span>
                <span class="required"></span>
                <i class="fa fa-question-circle ms-1 fs-7" data-bs-toggle="tooltip"
                   data-placement="top"
                   data-bs-original-title="Best resolution for this image will be 50x50"></i>
            </label>
            <div class="d-block">
                <div class="image-picker">
                    <div class="image previewImage" id="exampleInputImage"
                         style="background-image: url({{ isset($sectionFour['img_url_four']) ? asset($sectionFour['img_url_four']) : asset('web_front/images/doctors/doctor.png') }})"></div>
                    <span class="picker-edit rounded-circle text-gray-500 fs-small" data-bs-toggle="tooltip"
                          data-placement="top"
                          data-bs-original-title="Change image">
                                    <label>
                                    <i class="fa-solid fa-pen" id="profileImageIcon"></i>
                                        {{ Form::file('img_url_four',['class' =>'image-upload d-none','accept' => 'image/*']) }}
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
            {{ Form::label('card_text_four', __('messages.landing_cms.card_four_text').':', ['class' => 'form-label']) }}
            <span class="required"></span>
            {{ Form::text('card_text_four', $sectionFour['card_text_four'], ['class' => 'form-control','maxLength' => '20','placeholder'=> __('messages.landing_cms.card_four_text')]) }}
        </div>

        <!-- Card third Text Secondary Field -->
        <div class="form-group col-sm-12 mb-5">
            {{ Form::label('card_text_four_secondary', __('messages.landing_cms.card_four_text_secondary').':', ['class' => 'form-label']) }}
            <span class="required"></span>
            {{ Form::text('card_text_four_secondary', $sectionFour['card_text_four_secondary'], ['class' => 'form-control','maxLength' => '90','placeholder'=> __('messages.landing_cms.card_four_text_secondary')]) }}
        </div>
    </div>

    <div class="form-group col-sm-4 mb-5">
        <div class="row2">
            <label class="form-label"
                   for="about_us_image"> <span>{{__('messages.landing_cms.card_five_image')}}: </span>
                <span class="required"></span>
                <i class="fa fa-question-circle ms-1 fs-7" data-bs-toggle="tooltip"
                   data-placement="top"
                   data-bs-original-title="Best resolution for this image will be 50x50"></i>
            </label>
            <div class="d-block">
                <div class="image-picker">
                    <div class="image previewImage" id="exampleInputImage"
                         style="background-image: url({{ isset($sectionFour['img_url_five']) ? asset($sectionFour['img_url_five']) : asset('web_front/images/doctors/doctor.png') }})"></div>
                    <span class="picker-edit rounded-circle text-gray-500 fs-small" data-bs-toggle="tooltip"
                          data-placement="top"
                          data-bs-original-title="Change image">
                                    <label>
                                    <i class="fa-solid fa-pen" id="profileImageIcon"></i>
                                        {{ Form::file('img_url_five',['class' =>'image-upload d-none','accept' => 'image/*']) }}
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
            {{ Form::label('card_text_five', __('messages.landing_cms.card_five_text').':', ['class' => 'form-label']) }}
            <span class="required"></span>
            {{ Form::text('card_text_five', $sectionFour['card_text_five'], ['class' => 'form-control','maxLength' => '20','placeholder'=> __('messages.landing_cms.card_five_text')]) }}
        </div>

        <!-- Card third Text Secondary Field -->
        <div class="form-group col-sm-12 mb-5">
            {{ Form::label('card_text_five_secondary', __('messages.landing_cms.card_five_text_secondary').':', ['class' => 'form-label']) }}
            <span class="required"></span>
            {{ Form::text('card_text_five_secondary', $sectionFour['card_text_five_secondary'], ['class' => 'form-control','maxLength' => '90','placeholder'=> __('messages.landing_cms.card_five_text_secondary')]) }}
        </div>
    </div>

    <div class="form-group col-sm-4 mb-5">
        <div class="row2">
            <label class="form-label"
                   for="about_us_image"> <span>{{__('messages.landing_cms.card_six_image')}}: </span>
                <span class="required"></span>
                <i class="fa fa-question-circle ms-1 fs-7" data-bs-toggle="tooltip"
                   data-placement="top"
                   data-bs-original-title="Best resolution for this image will be 50x50"></i>
            </label>
            <div class="d-block">
                <div class="image-picker">
                    <div class="image previewImage" id="exampleInputImage"
                         style="background-image: url({{ isset($sectionFour['img_url_six']) ? asset($sectionFour['img_url_six']) : asset('web_front/images/doctors/doctor.png') }})"></div>
                    <span class="picker-edit rounded-circle text-gray-500 fs-small" data-bs-toggle="tooltip"
                          data-placement="top"
                          data-bs-original-title="Change image">
                                    <label>
                                    <i class="fa-solid fa-pen" id="profileImageIcon"></i>
                                        {{ Form::file('img_url_six',['class' =>'image-upload d-none','accept' => 'image/*']) }}
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
            {{ Form::label('card_text_six', __('messages.landing_cms.card_six_text').':', ['class' => 'form-label']) }}
            <span class="required"></span>
            {{ Form::text('card_text_six', $sectionFour['card_text_six'], ['class' => 'form-control','maxLength' => '20','placeholder'=> __('messages.landing_cms.card_six_text')]) }}
        </div>

        <!-- Card third Text Secondary Field -->
        <div class="form-group col-sm-12 mb-5">
            {{ Form::label('card_text_six_secondary', __('messages.landing_cms.card_six_text_secondary').':', ['class' => 'form-label']) }}
            <span class="required"></span>
            {{ Form::text('card_text_six_secondary', $sectionFour['card_text_six_secondary'], ['class' => 'form-control','maxLength' => '90','placeholder'=> __('messages.landing_cms.card_six_text_secondary')]) }}
        </div>
    </div>

</div>

<div class="float-end">
    {{ Form::submit(__('messages.common.save'), ['class' => 'btn btn-primary me-2']) }}
    {{ Form::reset(__('messages.common.cancel'), ['class' => 'btn btn-secondary']) }}
</div>
