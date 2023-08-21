<div id="startConsultationModal" class="modal fade" role="dialog" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="start-modal-title"></h3>
                <button type="button" aria-label="Close" class="btn-close"
                        data-bs-dismiss="modal">
                </button>
            </div>
            <div class="modal-body">
                {{ Form::hidden('live_consultation_id',null,['id'=>'startLiveConsultationId']) }}
                <div class="row">
                    <div class="form-group col-sm-4 mb-5">
                        {{ Form::label('host', __('messages.live_consultation.host_video').(':'), ['class' => 'pb-2 fs-5 text-gray-600']) }}
                        <br>
                        <span class="fs-5 text-gray-800 host-name"></span>
                    </div>
                    <div class="form-group col-sm-4">
                        {{ Form::label('date', __('messages.live_consultation.consultation_date').(':'), ['class' => 'pb-2 fs-5 text-gray-600']) }}
                        <br>
                        <span class="fs-5 text-gray-800 date"></span>
                    </div>
                    <div class="form-group col-sm-4">
                        {{ Form::label('duration', __('messages.live_consultation.duration').(':'), ['class' => 'pb-2 fs-5 text-gray-600']) }}
                        <br>
                        <span class="fs-5 text-gray-800 minutes"></span>
                    </div>
                </div>
                <?php
                $style = 'style=';
                $border = 'border:';
                ?>
                <hr {{$style}}"{{$border}} 1px solid #e0e4e8;">
                <div class="row">
                    <div class="text-left col-sm-8">
                        {{ Form::label('status', __('messages.common.status').(':'), ['class' => 'pb-2 fs-5 text-gray-600']) }}
                        <br>
                        <span class="fs-5 text-gray-800 status"></span>
                    </div>
                    <div class="text-right col-sm-4 mt-4">
                        <a class="btn btn-primary start" href="" target="_blank">
                            <i class="fas fa-video"></i> {{ getLoggedInUser()->hasRole('Doctor|Admin') ? __('messages.live_consultation.start_now') : __('messages.live_consultation.join_now') }}
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
