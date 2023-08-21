<div id="addTestimonialModal" class="modal fade" role="dialog" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">{{ __('messages.testimonial.new_testimonial') }}</h3>
            </div>
            {{ Form::open(['id'=>'addNewTestimonialForm','files' => true]) }}
            <div class="modal-body">
                <div class="alert alert-danger d-none hide" id="validationErrorsBox"></div>
                <div class="row">
                    <div class="form-group col-sm-12 mb-5">
                        {{ Form::label('name', __('messages.testimonial.name').(':'), ['class' => 'form-label']) }}
                        <span class="required"></span>
                        {{ Form::text('name', null, ['class' => 'form-control','required','placeholder'=>__('messages.testimonial.name')]) }}
                    </div>
                    <div class="form-group col-sm-12 mb-5">
                        {{ Form::label('position', __('messages.testimonial.position').(':'), ['class' => 'form-label']) }}
                        <span class="required"></span>
                        {{ Form::text('position', null, ['class' => 'form-control','required','placeholder'=>__('messages.testimonial.position')]) }}
                    </div>
                    <div class="form-group col-sm-12 mb-5">
                        {{ Form::label('description', __('messages.testimonial.description').(':'),['class' => 'form-label']) }}
                        <span class="required"></span>
                        {{ Form::textarea('description', null, ['class' => 'form-control description','rows' => 6,'placeholder'=>__('messages.testimonial.description')]) }}
                    </div>
                    <div class="form-group col-sm-12">
                        <label class="form-label" for="file"> <span>{{__('messages.common.profile')}}: </span>
                            <span class="required"></span>
                        </label>
                        <i class="fa fa-question-circle ms-1 fs-7" data-bs-toggle="tooltip"
                           data-placement="top"
                           data-bs-original-title="Best resolution for this profile will be 800x800"></i>
                        <br>
                        <div class="d-block">
                            <?php
                            $style = 'style=';
                            $background = 'background-image:';
                            ?>
                            <div class="image-picker">
                                <div class="image previewImage" id="previewImage"
                                     style="background-image: url({{ asset('landing_front/images/thomas-james.png') }})"></div>
                                <span class="picker-edit rounded-circle" data-bs-toggle="tooltip"
                                      data-placement="top"
                                      data-bs-original-title="Change profile">
                                    <label>
                                    <i class="fa-solid fa-pen" id="profileImageIcon"></i>
                                        {{ Form::file('profile',['class' => 'image-upload d-none','accept' => 'image/*' , 'id'=>'profile']) }}
                                        <input type="hidden" name="avatar_remove">
                                    </label>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="form-text">Allowed file types: png, jpg, jpeg.</div>
                </div>
            </div>
            <div class="modal-footer pt-0">
                {{ Form::button(__('messages.common.save'), ['type' => 'submit','class' => 'btn btn-primary me-2','id' => 'testimonialBtnSave','data-loading-text' => "<span class='spinner-border spinner-border-sm'></span> Processing..."]) }}
                <button type="button" class="btn btn-secondary"
                        data-bs-dismiss="modal">{{ __('messages.common.cancel') }}</button>
            </div>
            {{ Form::close() }}
        </div>
    </div>
</div>
{{--</div>--}}
 
