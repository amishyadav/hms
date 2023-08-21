<div id="editRadiologyCatModal" class="modal fade" role="dialog" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h3>{{ __('messages.radiology_category.edit_radiology_category') }}</h3>
                <button type="button" aria-label="Close" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            {{ Form::open(['id'=>'editRadiologyCatForm','method' => 'patch']) }}
            <div class="modal-body">
                <div class="alert alert-danger d-none hide" id="editRdValidationErrorsBox"></div>
                {{ Form::hidden('radiologyCategoryId',null,['id'=>'radiologyCategoryId']) }}
                <div class="row">
                    <div class="form-group col-sm-12 mb-5">
                        {{ Form::label('name', __('messages.radiology_category.name').':', ['class' => 'form-label']) }}
                        <span class="required"></span>
                        {{ Form::text('name', '', ['id'=>'editRadiologyCatName','class' => 'form-control ','required']) }}
                    </div>
                </div>
                <div class="modal-footer p-0">
                    {{ Form::button(__('messages.common.save'), ['type'=>'submit','class' => 'btn btn-primary','id'=>'btnEditRdSave','data-loading-text'=>"<span class='spinner-border spinner-border-sm'></span> Processing..."]) }}
                    <button type="button" aria-label="Close" class="btn btn-secondary ms-2"
                            data-bs-dismiss="modal">{{ __('messages.common.cancel') }}</button>
                </div>
            </div>
            {{ Form::close() }}
        </div>
    </div>
</div>
