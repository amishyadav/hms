<div class="modal fade" tabindex="-1" id="createFAQModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">{{__('messages.faqs.add_faqs')}}</h3>
            </div>

            {{ Form::open(['id'=>'addNewFAQForm','files' => true]) }}
            <div class="modal-body">
                <div class="alert alert-danger d-none hide" id="validationErrorsBox"></div>
                <div class="row">
                    <input type="hidden" id="faqsId">
                    <div class="form-group col-sm-12 mb-5">
                        {{ Form::label('question', __('messages.faqs.question').(':'), ['class' => 'form-label']) }}
                        <span class="required"></span>
                        {{ Form::text('question', null, ['class' => 'form-control','required','placeholder'=>__('messages.faqs.question')]) }}
                    </div>
                    <div class="form-group col-sm-12">
                        {{ Form::label('answer', __('messages.faqs.answer').(':'), ['class' => 'form-label']) }}
                        <span class="required"></span>
                        {{ Form::textarea('answer', null, ['class' => 'form-control','required', 'rows' => 6, 'placeholder'=>__('messages.faqs.answer')]) }}
                    </div>
                </div>
            </div>
            <div class="modal-footer pt-0">
                {{ Form::button(__('messages.common.save'), ['type' => 'submit','class' => 'btn btn-primary me-2','id' => 'faqBtnSave','data-loading-text' => "<span class='spinner-border spinner-border-sm'></span> Processing..."]) }}
                <button type="button" class="btn btn-secondary"
                        data-bs-dismiss="modal">{{ __('messages.common.cancel') }}</button>
            </div>
            {{ Form::close() }}

        </div>
    </div>
</div>
