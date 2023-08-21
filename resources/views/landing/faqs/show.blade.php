<div id="showFAQModal" class="modal fade" role="dialog" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h3>{{ __('messages.faqs.show') }}</h3>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="alert alert-danger d-none hide" id="editValidationErrorsBox"></div>
                <div class="row">
                    <div class="form-group col-sm-12 mb-5">
                        <label class="form-label">{{__('messages.faqs.question').':'}}</label>
                        <br><span id="showQuestion"></span>
                    </div>
                    <div class="form-group col-sm-12">
                        <label class="form-label">{{__('messages.faqs.answer').':'}}</label>
                        <br><span id="showAnswer"></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
