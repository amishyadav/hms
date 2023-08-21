<div id="showUser" class="modal fade" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h3>{{ __('messages.user.user_details') }}</h3>
                <button type="button" aria-label="Close" class="btn btn-close"
                        data-bs-dismiss="modal">
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="form-group col-sm-4 mb-5">
                        <label for="userFirstName"
                               class="form-label">{{ __('messages.user.first_name').(':') }}</label><br>
                        <span id="userFirstName"
                              class="showSpan"></span>
                    </div>
                    <div class="form-group col-sm-4 mb-5">
                        <label for="userLastName"
                               class="form-label">{{ __('messages.user.last_name').(':') }}</label><br>
                        <span id="userLastName"
                              class="showSpan"></span>
                    </div>
                    <div class="form-group col-sm-4 mb-5">
                        <label for="userEmail"
                               class="form-label">{{ __('messages.user.email').(':') }}</label><br>
                        <span id="userEmail"
                              class="showSpan"></span>
                    </div>
                    <div class="form-group col-sm-4 mb-5">
                        <label for="userShowRole"
                               class="form-label">{{ __('messages.sms.role').(':') }}</label><br>
                        <span id="userShowRole"
                              class="showSpan"></span>
                    </div>
                    <div class="form-group col-sm-4 mb-5">
                        <label for="userPhone"
                               class="form-label">{{ __('messages.user.phone').(':') }}</label><br>
                        <span id="userPhone"
                              class="showSpan"></span>
                    </div>
                    <div class="form-group col-sm-4 mb-5">
                        <label for="userGender"
                               class="form-label">{{ __('messages.user.gender').(':') }}</label><br>
                        <span id="userGender"
                              class="showSpan"></span>
                    </div>
                    <div class="form-group col-sm-4 mb-5">
                        <label for="userDob"
                               class="form-label">{{ __('messages.user.dob').(':') }}</label><br>
                        <span id="userDob"
                              class="showSpan"></span>
                    </div>
                    <div class="form-group col-sm-4 mb-5">
                        <label for="userStatus"
                               class="form-label">{{ __('messages.user.status').(':') }}</label><br>
                        <span id="userStatus"
                              class="showSpan"></span>
                    </div>
                    <div class="form-group col-sm-4 mb-5">
                        <label for="UserCreatedOn"
                               class="fw-bold text-muted mb-1">{{ __('messages.common.created_on').(':') }}</label><br>
                        <span id="UserCreatedOn"
                              class="showSpan"></span>
                    </div>
                    <div class="form-group col-sm-4 mb-5">
                        <label for="userUpdatedOn"
                               class="fw-bold text-muted mb-1">{{ __('messages.common.last_updated').(':') }}</label><br>
                        <span id="userUpdatedOn"
                              class="showSpan"></span>
                    </div>
                    <div class="form-group col-sm-4 mb-5">
                        <label for="userProfilePicture"
                               class="form-label">{{ __('messages.profile.profile').(':') }}</label><br>
                        <div class="image position-relative">
                            <img id="userProfilePicture" src="#" alt="image"
                                 class="showSpan object-fit-cover">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
