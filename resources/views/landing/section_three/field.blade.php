<div class="row">
    <div class="form-group col-sm-4 mb-5">
        <div class="row2">
            <?php
            $style = 'style=';
            $background = 'background-image:';
            ?>
            <label class="form-label"
                   for="about_us_image"> <span>{{__('messages.landing_cms.card_one_image')}}: </span>
                <span class="required"></span>
                <i class="fa fa-question-circle ms-1 fs-7" data-bs-toggle="tooltip"
                   data-placement="top"
                   data-bs-original-title="Best resolution for this image will be 1400x1089"></i>
            </label>
                <div class="d-block">
                    <div class="image-picker">
                        <div class="image previewImage" id="exampleInputImage"
                             style="background-image: url({{ isset($sectionThree['img_url']) ? asset($sectionThree['img_url']) : asset('web_front/images/doctors/doctor.png') }})"></div>
                    <span class="picker-edit rounded-circle text-gray-500 fs-small" data-bs-toggle="tooltip"
                          data-placement="top"
                          data-bs-original-title="Change image">
                                    <label>
                                    <i class="fa-solid fa-pen" id="profileImageIcon"></i>
                                        {{ Form::file('img_url',['class' => 'image-upload d-none','accept' => 'image/*']) }}
                                        <input type="hidden" name="avatar_remove">
                                    </label>
                                </span>
                    </div>
                </div>
        </div>
        <div class="form-text">Allowed file types: png, jpg, jpeg.</div>
    </div>

    <div class="col-sm-8">
        <!-- Text Main Field -->
        <div class="form-group col-sm-12 mb-5">
            {{ Form::label('text_main', __('messages.landing_cms.text_main').':', ['class' => 'form-label']) }}
            <span class="required"></span>
            {{ Form::text('text_main', $sectionThree['text_main'], ['class' => 'form-control','maxLength' => '30','placeholder'=> __('messages.landing_cms.text_main')]) }}
        </div>

        <!-- Text Secondary Field -->
        <div class="form-group col-sm-12 mb-5">
            {{ Form::label('text_secondary', __('messages.landing_cms.text_secondary').':', ['class' => 'form-label']) }}
            <span class="required"></span>
            {{ Form::text('text_secondary', $sectionThree['text_secondary'], ['class' => 'form-control', 'required','maxLength' => '160','placeholder'=>  __('messages.landing_cms.text_secondary')]) }}
        </div>
    </div>

    <div class="form-group col-sm-6 mb-5">
        {{ Form::label('text_one', __('messages.landing_cms.text_one').':', ['class' => 'form-label']) }}
        <span class="required"></span>
        {{ Form::text('text_one', $sectionThree['text_one'], ['class' => 'form-control','maxLength' => '50','placeholder'=> __('messages.landing_cms.text_one')]) }}
    </div>

    <div class="form-group col-sm-6 mb-5">
        {{ Form::label('text_two', __('messages.landing_cms.text_two').':', ['class' => 'form-label']) }}
        <span class="required"></span>
        {{ Form::text('text_two', $sectionThree['text_two'], ['class' => 'form-control','maxLength' => '50','placeholder'=> __('messages.landing_cms.text_two')]) }}
    </div>

    <div class="form-group col-sm-6 mb-5">
        {{ Form::label('text_three', __('messages.landing_cms.text_three').':', ['class' => 'form-label']) }}
        {{ Form::text('text_three', $sectionThree['text_three'], ['class' => 'form-control','maxLength' => '50','placeholder'=>  __('messages.landing_cms.text_three')]) }}
    </div>

    <div class="form-group col-sm-6 mb-5">
        {{ Form::label('text_four', __('messages.landing_cms.text_four').':', ['class' => 'form-label']) }}
        {{ Form::text('text_four', $sectionThree['text_four'], ['class' => 'form-control','maxLength' => '50','placeholder'=> __('messages.landing_cms.text_four')]) }}
    </div>

    <div class="form-group col-sm-6 mb-5">
        {{ Form::label('text_five', __('messages.landing_cms.text_five').':', ['class' => 'form-label']) }}
        {{ Form::text('text_five', $sectionThree['text_five'], ['class' => 'form-control','maxLength' => '50','placeholder'=> __('messages.landing_cms.text_five')]) }}
    </div>

</div>

<div class="float-end">
    {{ Form::submit(__('messages.common.save'), ['class' => 'btn btn-primary me-2']) }}
    {{ Form::reset(__('messages.common.cancel'), ['class' => 'btn btn-secondary']) }}
</div>
