<div class="modal fade" id="editProfileModal" role="dialog" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">{{ __('messages.profile.edit_profile') }}</h3>
            </div>
            {{ Form::open(['class'=>'form','id'=>'editProfileForm','files'=>true]) }}
            <div class="modal-body">
                <div class="alert alert-danger d-none" id="editProfileValidationErrorsBox"></div>
                {{ Form::hidden('user_id',null,['id'=>'editUserId']) }}
                {{csrf_field()}}
                <div class="row">
                    <div class="col-md-6 fv-row mb-7">
                        {{ Form::label('first_name', __('messages.profile.first_name').':', ['class' => 'form-label']) }}
                        <span class="required"></span>
                        {{ Form::text('first_name', null, ['id'=>'firstName','class' => 'form-control','required','placeholder'=>__('messages.profile.first_name')]) }}
                    </div>
                    <div class="col-md-6 fv-row mb-7">
                        {{ Form::label('last_name', __('messages.profile.last_name').':', ['class' => 'form-label']) }}
                        <span class="required"></span>
                        {{ Form::text('last_name', null, ['id'=>'lastName','class' => 'form-control','required','placeholder'=>__('messages.profile.last_name')]) }}
                    </div>
                    <div class="col-md-6 fv-row mb-7">
                        {{ Form::label('email', __('messages.profile.email').':', ['class' => 'form-label']) }}
                        <span class="required"></span>
                        {{ Form::email('email', null, ['id'=>'email','class' => 'form-control','required','placeholder'=>__('messages.profile.email')]) }}
                    </div>
                    <div class="col-md-6 fv-row mb-7">
                        {{ Form::label('phone', __('messages.profile.phone').':', ['class' => 'form-label']) }}
                        {{ Form::tel('phone', null, ['id'=>'phone','class' => 'form-control', 'onkeyup' => 'if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,"")','placeholder'=>__('messages.profile.phone')]) }}
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6 fv-row">
                        {{ Form::label('image', __('messages.profile.profile').':', ['class' => 'fs-5 fw-bold mb-2 d-block']) }}
                        <div class="d-block">
                            <?php
                            $style = 'style=';
                            $background = 'background-image:';
                            ?>
                            <div class="image-picker">
                                <div class="image previewImage" id="editPhoto"></div>
                                <span class="picker-edit rounded-circle text-gray-500 fs-small" data-bs-toggle="tooltip"
                                      data-placement="top"
                                      data-bs-original-title="Change profile">
                                    <label>
                                    <i class="fa-solid fa-pen" id="profileImageIcon"></i>
                                        {{ Form::file('image',['class' => 'image-upload d-none','accept' => 'image/*' , 'id'=>'profileImage']) }}
                                        <input type="hidden" name="avatar_remove">
                                    </label>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer pt-0">
                {{ Form::button(__('messages.common.save'), ['type'=>'submit','class' => 'btn btn-primary m-0','id'=>'btnPrEditSave','data-loading-text'=>"<span class='spinner-border spinner-border-sm'></span> Processing..."]) }}
                <button type="button" class="btn btn-secondary my-0 ms-5 me-0"
                        data-bs-dismiss="modal">{{ __('messages.common.cancel') }}
                </button>
            </div>
            {{ Form::close() }}
        </div>
    </div>
</div>

<div id="changeLanguageModal" class="modal fade" role="dialog" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">{{ __('messages.profile.change_language')}}</h3>
                <button type="button" aria-label="Close" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            {{ Form::open(['id'=>'changeLanguageForm']) }}
            <div class="modal-body">
                <div class="alert alert-danger d-none hide" id="editProfileValidationErrorsBox"></div>
                {{csrf_field()}}
                <div class="row">
                    <div class="col-12 fv-row">
                        {{ Form::label('language',__('messages.profile.language').':', ['class' => 'form-label']) }}
                        <span class="required"></span>
                        {{ Form::select('language', \App\Models\User::LANGUAGES, Auth::user()->language, ['id'=>'language','class' => 'form-select','data-control'=>'select2','data-hide-search'=> 'true','data-placeholder'=> 'language','required']) }}
                    </div>
                </div>
            </div>
            <div class="modal-footer pt-0">
                {{ Form::button(__('messages.common.save'), ['type'=>'submit','class' => 'btn btn-primary m-0','id'=>'btnLanguageChange','data-loading-text'=>"<span class='spinner-border spinner-border-sm'></span> Processing..."]) }}
                <button type="button" class="btn btn-secondary my-0 ms-5 me-0"
                        data-bs-dismiss="modal">{{ __('messages.common.cancel') }}</button>
            </div>
            {{ Form::close() }}
        </div>
    </div>
</div>
