<div id="showModal" class="modal fade" role="dialog" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">{{ __('messages.testimonial.show_testimonial') }}</h3>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="alert alert-danger d-none hide" id="editValidationErrorsBox"></div>
                <div class="row">
                    <div class="form-group col-sm-12 mb-5">
                        <label class="form-label">{{__('messages.testimonial.name').':'}}</label>
                        <span class="show-name"></span>
                    </div>
                    <div class="form-group col-sm-12 mb-5">
                        <label class="form-label">{{__('messages.testimonial.position').':'}}</label>
                        <span class="show-position"></span>
                    </div>
                    <div class="form-group col-sm-12 mb-5">
                        <label class="form-label">{{__('messages.testimonial.description').':'}}</label>
                        <span class="show-description"></span>
                    </div>
                    <div class="form-group col-sm-12">
                        <label class="form-label" for="file"> <span>{{__('messages.common.profile')}}: </span>
                        </label>
                        <div class="d-block">
                            <?php
                            $style = 'style=';
                            $background = 'background-image:';
                            ?>
                            <div class="image-picker">
                                <div class="image previewImage image-upload" id="showPreviewImage"
                                     style="background-image: url({{ asset('assets/img/default_image.jpg') }})"></div>
                            </div>
                        </div>
                        <br>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


