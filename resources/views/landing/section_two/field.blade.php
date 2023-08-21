<div class="row">
    <!-- Text Main Field -->
    <div class="form-group col-sm-12 mb-5">
        {{ Form::label('text_main', __('messages.landing_cms.text_main').':', ['class' => 'form-label']) }}
        <span class="required"></span>
        {{ Form::text('text_main', $sectionTwo['text_main'], ['class' => 'form-control','maxLength' => '30','placeholder'=> __('messages.landing_cms.text_main')]) }}
    </div>

    <!-- Text Secondary Field -->
    <div class="form-group col-sm-12 mb-5">
        {{ Form::label('text_secondary', __('messages.landing_cms.text_secondary').':', ['class' => 'form-label']) }}
        <span class="required"></span>
        {{ Form::text('text_secondary', $sectionTwo['text_secondary'], ['class' => 'form-control', 'required','maxLength' => '160','placeholder'=> __('messages.landing_cms.text_secondary')]) }}
    </div>

    <div class="form-group col-sm-4 mb-5">
        <div class="row2">
            <label class="form-label"
                   for="about_us_image"> <span>{{__('messages.landing_cms.card_one_image')}}: </span>
                <span class="required"></span>
                <i class="fa fa-question-circle ms-1 fs-7" data-bs-toggle="tooltip"
                   data-placement="top"
                   data-bs-original-title="Best resolution for this image will be 100x100"></i>
            </label>
            <div class="d-block">
                <?php
                $style = 'style=';
                $background = 'background-image:';
                ?>
                <div class="image-picker">
                    <div class="image previewImage" id="exampleInputImage"
                         style="background-image: url({{ isset($sectionTwo['card_one_image']) ? asset($sectionTwo['card_one_image']) : asset('web_front/images/doctors/doctor.png') }})"></div>
                    <span class="picker-edit rounded-circle text-gray-500 fs-small" data-bs-toggle="tooltip"
                          data-placement="top"
                          data-bs-original-title="Change image">
                                    <label>
                                    <i class="fa-solid fa-pen" id="profileImageIcon"></i>
                                        {{ Form::file('card_one_image',['class' => 'image-upload d-none','accept' => 'image/*']) }}
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
            {{ Form::label('card_one_text', __('messages.landing_cms.card_one_text').':', ['class' => 'form-label']) }}
            <span class="required"></span>
            {{ Form::text('card_one_text', $sectionTwo['card_one_text'], ['class' => 'form-control','maxLength' => '20','placeholder'=>__('messages.landing_cms.card_one_text')]) }}
        </div>

        <!-- Card One Text Secondary Field -->
        <div class="form-group col-sm-12 mb-5">
            {{ Form::label('card_one_text_secondary', __('messages.landing_cms.card_one_text_secondary').':', ['class' => 'form-label']) }}
            <span class="required"></span>
            {{ Form::text('card_one_text_secondary', $sectionTwo['card_one_text_secondary'], ['class' => 'form-control','maxLength' => '90','placeholder'=> __('messages.landing_cms.card_one_text_secondary')]) }}
        </div>
    </div>

    <div class="form-group col-sm-4 mb-5">
        <div class="row2">
            <label class="form-label"
                   for="about_us_image"> <span>{{__('messages.landing_cms.card_two_image')}}: </span>
                <span class="required"></span>
                <i class="fa fa-question-circle ms-1 fs-7" data-bs-toggle="tooltip"
                   data-placement="top"
                   data-bs-original-title="Best resolution for this image will be 100x100"></i>
            </label>
            <div class="d-block">
                <div class="image-picker">
                    <div class="image previewImage" id="exampleInputImage"
                         style="background-image: url({{ isset($sectionTwo['card_two_image']) ? asset($sectionTwo['card_two_image']) : asset('web_front/images/doctors/doctor.png') }})"></div>
                    <span class="picker-edit rounded-circle text-gray-500 fs-small" data-bs-toggle="tooltip"
                          data-placement="top"
                          data-bs-original-title="Change image">
                                    <label>
                                    <i class="fa-solid fa-pen" id="profileImageIcon"></i>
                                        {{ Form::file('card_two_image',['class' => 'image-upload d-none','accept' => 'image/*']) }}
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
            {{ Form::label('card_two_text', __('messages.landing_cms.card_two_text').':', ['class' => 'form-label']) }}
            <span class="required"></span>
            {{ Form::text('card_two_text', $sectionTwo['card_two_text'], ['class' => 'form-control','maxLength' => '20','placeholder'=> __('messages.landing_cms.card_two_text')]) }}
        </div>

        <!-- Card Two Text Secondary Field -->
        <div class="form-group col-sm-12 mb-5">
            {{ Form::label('card_two_text_secondary', __('messages.landing_cms.card_two_text_secondary').':', ['class' => 'form-label']) }}
            <span class="required"></span>
            {{ Form::text('card_two_text_secondary', $sectionTwo['card_two_text_secondary'], ['class' => 'form-control','maxLength' => '90','placeholder'=> __('messages.landing_cms.card_two_text_secondary')]) }}
        </div>
    </div>

    <div class="form-group col-sm-4 mb-5">
        <div class="row2">
            <label class="form-label"
                   for="about_us_image"> <span>{{__('messages.landing_cms.card_third_image')}}: </span>
                <span class="required"></span>
                <i class="fa fa-question-circle ms-1 fs-7" data-bs-toggle="tooltip"
                   data-placement="top"
                   data-bs-original-title="Best resolution for this image will be 100x100"></i>
            </label>
            <div class="d-block">
                <div class="image-picker">
                    <div class="image previewImage" id="exampleInputImage"
                         style="background-image: url({{ isset($sectionTwo['card_third_image']) ? asset($sectionTwo['card_third_image']) : asset('web_front/images/doctors/doctor.png') }})"></div>
                    <span class="picker-edit rounded-circle text-gray-500 fs-small" data-bs-toggle="tooltip"
                          data-placement="top"
                          data-bs-original-title="Change image">
                                    <label>
                                    <i class="fa-solid fa-pen" id="profileImageIcon"></i>
                                        {{ Form::file('card_third_image',['class' => 'image-upload d-none','accept' => 'image/*']) }}
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
            {{ Form::label('card_third_text', __('messages.landing_cms.card_third_text').':', ['class' => 'form-label']) }}
            <span class="required"></span>
            {{ Form::text('card_third_text', $sectionTwo['card_third_text'], ['class' => 'form-control','maxLength' => '20','placeholder'=> __('messages.landing_cms.card_third_text')]) }}
        </div>

        <!-- Card third Text Secondary Field -->
        <div class="form-group col-sm-12 mb-7">
            {{ Form::label('card_third_text_secondary', __('messages.landing_cms.card_third_text_secondary').':', ['class' => 'form-label']) }}
            <span class="required"></span>
            {{ Form::text('card_third_text_secondary', $sectionTwo['card_third_text_secondary'], ['class' => 'form-control','maxLength' => '90','placeholder'=> __('messages.landing_cms.card_third_text_secondary')]) }}
        </div>
    </div>
</div>

<div class="float-end">
    {{ Form::submit(__('messages.common.save'), ['class' => 'btn btn-primary me-2']) }}
    {{ Form::reset(__('messages.common.cancel'), ['class' => 'btn btn-secondary']) }}
</div>

