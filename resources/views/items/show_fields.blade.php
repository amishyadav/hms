<div>
    <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="poverview" role="tabpanel">
            <div class="card mb-5 mb-xl-10">
                <div>
                    <div class="card-body  border-top p-9">
                        <div class="row mb-7">
                            <div class="col-md-6 d-flex flex-column mb-md-10 mb-5">
                                {{ Form::label('name', __('messages.item.name').(':'), ['class' => 'pb-2 fs-5 text-gray-600']) }}
                                <span class="fs-5 text-gray-800">{{$item->name}}</span>
                            </div>
                            <div class="col-md-6 d-flex flex-column mb-md-10 mb-5">
                                {{ Form::label('item_category', __('messages.item.item_category').(':'), ['class' => 'pb-2 fs-5 text-gray-600']) }}
                                <span class="fs-5 text-gray-800">{{$item->itemcategory->name}}</span>
                            </div>
                            <div class="col-md-6 d-flex flex-column mb-md-10 mb-5">
                                {{ Form::label('unit', __('messages.item.unit').(':'), ['class' => 'pb-2 fs-5 text-gray-600']) }}
                                <p class="m-0"><span class="badge bg-light-success fs-6">{{$item->unit}}</span></p>
                            </div>
                            <div class="col-md-6 d-flex flex-column mb-md-10 mb-5">
                                {{ Form::label('available_quantity', __('messages.item.available_quantity').(':'), ['class' => 'pb-2 fs-5 text-gray-600']) }}
                                <p class="m-0">
                                    <span class="badge bg-light-info fs-6">{{ $item->available_quantity}}</span></p>
                            </div>
                            <div class="col-md-6 d-flex flex-column mb-md-10 mb-5">
                                {{ Form::label('created_at', __('messages.common.created_on').(':'), ['class' => 'pb-2 fs-5 text-gray-600']) }}
                                <span class="fs-5 text-gray-800"
                                      title="{{ date('jS M, Y', strtotime($item->created_at)) }}">{{ $item->created_at->diffForHumans() }}</span>
                            </div>
                            <div class="col-md-6 d-flex flex-column mb-md-10 mb-5">
                                {{ Form::label('updated_at', __('messages.common.updated_at').(':'), ['class' => 'pb-2 fs-5 text-gray-600']) }}
                                <span class="fs-5 text-gray-800"
                                      title="{{ date('jS M, Y', strtotime($item->updated_at)) }}">{{ $item->updated_at->diffForHumans() }}</span>
                            </div>
                            <div class="col-md-6 d-flex flex-column mb-md-10 mb-5">
                                {{ Form::label('description', __('messages.item.description').(':'), ['class' => 'pb-2 fs-5 text-gray-600']) }}
                                <span class="fs-5 text-gray-800">{!! !empty($item->description) ? nl2br(e($item->description)) : __('messages.common.n/a')  !!}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
