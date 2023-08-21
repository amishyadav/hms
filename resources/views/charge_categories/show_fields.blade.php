<div>
    <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="poverview" role="tabpanel">
            <div class="card mb-5 mb-xl-10">
                <div>
                    <div class="card-body  border-top p-9">
                        <div class="row mb-7">
                            <div class="col-md-6 d-flex flex-column mb-md-10 mb-5">
                                {{ Form::label('charge_category', __('messages.charge.charge_category').(':'), ['class' => 'pb-2 fs-5 text-gray-600']) }}
                                <span class="fs-5 text-gray-800">{{$chargeCategory->name}}</span>
                            </div>
                            <div class="col-md-6 d-flex flex-column mb-md-10 mb-5">
                                {{ Form::label('charge_type', __('messages.charge_category.charge_type').(':'), ['class' => 'pb-2 fs-5 text-gray-600']) }}
                                <span class="fs-5 text-gray-800">{{ $chargeTypes[$chargeCategory->charge_type]}}</span>
                            </div>
                            <div class="col-md-6 d-flex flex-column mb-md-10 mb-5">
                                {{ Form::label('created_at', __('messages.common.created_on').(':'), ['class' => 'pb-2 fs-5 text-gray-600']) }}
                                <span class="fs-5 text-gray-800" title="{{ date('jS M, Y', strtotime($chargeCategory->created_at)) }}">{{ $chargeCategory->created_at->diffForHumans() }}</span>
                            </div>
                            <div class="col-md-6 d-flex flex-column mb-md-10 mb-5">
                                {{ Form::label('updated_at', __('messages.common.updated_at').(':'), ['class' => 'pb-2 fs-5 text-gray-600']) }}
                                <span class="fs-5 text-gray-800" title="{{ date('jS M, Y', strtotime($chargeCategory->updated_at)) }}">{{ $chargeCategory->updated_at->diffForHumans() }}</span>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 d-flex flex-column">
                                {{ Form::label('description', __('messages.item.description').(':'), ['class' => 'pb-2 fs-5 text-gray-600']) }}
                                <span class="fs-5 text-gray-800">{!! !empty($chargeCategory->description) ? nl2br(e($chargeCategory->description)) : __('messages.common.n/a')  !!}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
