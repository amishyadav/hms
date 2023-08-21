<div id="showUser" class="modal fade" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h2>{{ __('messages.user.user_details') }}</h2>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body scroll-y mx-5 mx-xl-15 my-7">
                <div class="row">
                    <div class="form-group col-sm-4 mb-5">
                        <label for="first_name"
                               class="fw-bold text-muted mb-1">{{ __('messages.user.first_name').(':') }}</label><br>
                        <span id="first_name"
                              class="fw-bolder fs-6 text-gray-800 showSpan"></span>
                    </div>
                    <div class="form-group col-sm-4 mb-5">
                        <label for="last_name"
                               class="fw-bold text-muted mb-1">{{ __('messages.user.last_name').(':') }}</label><br>
                        <span id="last_name"
                              class="fw-bolder fs-6 text-gray-800 showSpan"></span>
                    </div>
                    <div class="form-group col-sm-4 mb-5">
                        <label for="last_name"
                               class="fw-bold text-muted mb-1">{{ __('messages.user.username').(':') }}</label><br>
                        <span id="username" class="fw-bolder fs-6 text-gray-800 showSpan"></span>
                    </div>
                    <div class="form-group col-sm-4 mb-5 text-break">
                        <label for="userEmail" class="fw-bold text-muted mb-1">{{ __('messages.user.email').(':') }}</label><br>
                        <span id="userEmail"
                              class="fw-bolder fs-6 text-gray-800 showSpan"></span>
                    </div>
                    <div class="form-group col-sm-4 mb-5">
                        <label for="role"
                               class="fw-bold text-muted mb-1">{{ __('messages.sms.role').(':') }}</label><br>
                        <span id="role"
                              class="fw-bolder fs-6 text-gray-800 showSpan"></span>
                    </div>
                    <div class="form-group col-sm-4 mb-5">
                        <label for="userPhone"
                               class="fw-bold text-muted mb-1">{{ __('messages.user.phone').(':') }}</label><br>
                        <span id="userPhone"
                              class="fw-bolder fs-6 text-gray-800 showSpan"></span>
                    </div>
                    <div class="form-group col-sm-4 mb-5">
                        <label for="userGender"
                               class="fw-bold text-muted mb-1">{{ __('messages.user.gender').(':') }}</label><br>
                        <span id="userGender"
                              class="fw-bolder fs-6 text-gray-800 showSpan"></span>
                    </div>
                    <div class="form-group col-sm-4 mb-5">
                        <label for="userDob"
                               class="fw-bold text-muted mb-1">{{ __('messages.user.dob').(':') }}</label><br>
                        <span id="userDob"
                              class="fw-bolder fs-6 text-gray-800 showSpan"></span>
                    </div>
                    <div class="form-group col-sm-4 mb-5">
                        <label for="userStatus"
                               class="fw-bold text-muted mb-1">{{ __('messages.user.status').(':') }}</label><br>
                        <span id="userStatus"
                              class="fw-bolder fs-6 text-gray-800 showSpan"></span>
                    </div>
                    <div class="form-group col-sm-4 mb-5">
                        <label for="created_on"
                               class="fw-bold text-muted mb-1">{{ __('messages.common.created_on').(':') }}</label><br>
                        <span id="created_on"
                              class="fw-bolder fs-6 text-gray-800 showSpan"></span>
                    </div>
                    <div class="form-group col-sm-4 mb-5">
                        <label for="updated_on"
                               class="fw-bold text-muted mb-1">{{ __('messages.common.last_updated').(':') }}</label><br>
                        <span id="updated_on"
                              class="fw-bolder fs-6 text-gray-800 showSpan"></span>
                    </div>
                    <div class="form-group col-sm-4 mb-5">
                        <label for="userProfilePicture"
                               class="fw-bold text-muted mb-1">{{ __('messages.profile.profile').(':') }}</label><br>
                        <div class="symbol symbol-100px symbol-fixed position-relative">
                            <img id="userProfilePicture" src="#" alt="image"
                                 class="fw-bolder fs-6 text-gray-800 showSpan object-fit-cover">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
