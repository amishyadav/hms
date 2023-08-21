<div id="editVaccinatedModal" class="modal fade" role="dialog" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h2>{{ __('messages.vaccination.edit_vaccination') }}</h2>
                <button type="button" aria-label="Close" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            {{ Form::open(['id'=>'editVaccinatedForm']) }}
            <div class="modal-body">
                <div class="alert alert-danger d-none hide" id="editValidationErrorsBox1"></div>
                {{ Form::hidden('vaccination_id',null,['id'=>'vaccinationId']) }}
                <div class="row">
                    <div class="form-group col-sm-12 mb-5">
                        {{ Form::label('name', __('messages.vaccination.name').(':'), ['class' => 'form-label']) }}
                        <span class="required"></span>
                        {{ Form::text('name', null, ['id'=>'editVaccinatedName','class' => 'form-control','required']) }}
                    </div>
                    <div class="form-group col-sm-12 mb-5">
                        {{ Form::label('manufactured_by', __('messages.vaccination.manufactured_by').(':'),['class' => 'form-label']) }}
                        <span class="required"></span>
                        {{ Form::text('manufactured_by', null, ['id'=>'editManufacturedBy','class' => 'form-control','required']) }}
                    </div>
                    <div class="form-group col-sm-12 mb-5">
                        {{ Form::label('brand', __('messages.vaccination.brand').(':'),['class' => 'form-label']) }}
                        <span class="required"></span>
                        {{ Form::text('brand', '', ['id'=>'editVaccinatedBrand','class' => 'form-control','required']) }}
                    </div>

                </div>
                <div class="modal-footer p-0">
                    {{ Form::button(__('messages.common.save'), ['type' => 'submit','class' => 'btn btn-primary','id' => 'btnEditVSave','data-loading-text' => "<span class='spinner-border spinner-border-sm'></span> Processing..."]) }}
                    <button type="button" class="btn btn-secondary ms-2"
                            data-bs-dismiss="modal">{{ __('messages.common.cancel') }}</button>
                </div>
            </div>
            {{ Form::close() }}
        </div>
    </div>
</div>
