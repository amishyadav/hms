<div class="row">
    <div class="col-md-6 d-flex flex-column mb-md-10 mb-5">
        {{ Form::label('patient', __('messages.case.patient').(':'), ['class' => 'pb-2 fs-5 text-gray-600']) }}
        <span class="fs-5 text-gray-800">{{$bedAssign->patient->user->full_name}}</span>
    </div>
    <div class="col-md-6 d-flex flex-column mb-md-10 mb-5">
        {{ Form::label('bed_assign', __('messages.bed_assign.bed').(':'), ['class' => 'pb-2 fs-5 text-gray-600']) }}
        <span class="fs-5 text-gray-800">{{ $bedAssign->bed->name}}</span>
    </div>
    <div class="col-md-6 d-flex flex-column mb-md-10 mb-5">
        {{ Form::label('case_id', __('messages.bed_assign.case_id').(':'), ['class' => 'pb-2 fs-5 text-gray-600']) }}
        <p class="m-0"><span class="badge bg-light-info fs-6">{{$bedAssign->case_id}}</span>
        </p>
    </div>
    <div class="col-md-6 d-flex flex-column mb-md-10 mb-5">
        {{ Form::label('ipd_patient_id', __('messages.bed_assign.ipd_patient_id').(':'), ['class' => 'pb-2 fs-5 text-gray-600']) }}
        <p class="m-0">
            <span class="badge bg-light-info fs-6">{{ ($bedAssign->ipdPatient != null) ? $bedAssign->ipdPatient->ipd_number : __('messages.common.n/a') }}</span>
        </p>
    </div>
    <div class="col-md-6 d-flex flex-column mb-md-10 mb-5">
        {{ Form::label('assign_date', __('messages.bed_assign.assign_date').(':'), ['class' => 'pb-2 fs-5 text-gray-600']) }}
        <span
                class="fs-5 text-gray-800">{{!empty($bedAssign->assign_date)?date('jS M, Y h:i A', strtotime($bedAssign->assign_date)):'N/A'}}</span>
    </div>
    <div class="col-md-6 d-flex flex-column mb-md-10 mb-5">
        {{ Form::label('discharge_date', __('messages.bed_assign.discharge_date').(':'), ['class' => 'pb-2 fs-5 text-gray-600']) }}
        <span
                class="fs-5 text-gray-800">{{!empty($bedAssign->discharge_date)?date('jS M, Y h:i A', strtotime($bedAssign->discharge_date)):'N/A'}}</span>
    </div>
    <div class="col-md-6 d-flex flex-column mb-md-10 mb-5">
        {{ Form::label('status', __('messages.common.status').(':'), ['class' => 'pb-2 fs-5 text-gray-600']) }}
        <p class="m-0">
                                    <span
                                            class="badge fs-6 bg-light-{{!empty(($bedAssign->status === 1)) ? 'success' : 'danger'}}">{{ ($bedAssign->status === 1) ? 'Active' : 'Deactive' }}</span>
        </p>
    </div>
    <div class="col-md-6 d-flex flex-column mb-md-10 mb-5">
        {{ Form::label('created_at', __('messages.common.created_on').(':'), ['class' => 'pb-2 fs-5 text-gray-600']) }}
        <span class="fs-5 text-gray-800"
              title="{{ date('jS M, Y', strtotime($bedAssign->created_at)) }}">{{ $bedAssign->created_at->diffForHumans() }}</span>
    </div>
    <div class="col-md-6 d-flex flex-column mb-md-10 mb-5">
        {{ Form::label('updated_at', __('messages.common.updated_at').(':'), ['class' => 'pb-2 fs-5 text-gray-600']) }}
        <span class="fs-5 text-gray-800"
              title="{{ date('jS M, Y', strtotime($bedAssign->updated_at)) }}">{{ $bedAssign->updated_at->diffForHumans() }}</span>
    </div>
    <div class="col-md-6 d-flex flex-column mb-md-10 mb-5">
        {{ Form::label('description', __('messages.bed_assign.description').(':'), ['class' => 'pb-2 fs-5 text-gray-600']) }}
        <span class="fs-5 text-gray-800">{!! !empty($bedAssign->description)?nl2br(e($bedAssign->description)):'N/A' !!}</span>
    </div>
</div>
