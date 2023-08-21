<div>
    <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="poverview" role="tabpanel">
            <div class="card mb-5 mb-xl-10">
                <div>
                    <div class="card-body  border-top p-9">
                        <div class="row mb-7">
                            <div class="col-md-6 d-flex flex-column mb-md-10 mb-5">
                                {{ Form::label('item_category', __('messages.item_stock.item_category').(':'), ['class' => 'pb-2 fs-5 text-gray-600']) }}
                                <span class="fs-5 text-gray-800">{{ $itemStock->item->itemcategory->name }}</span>
                            </div>
                            <div class="col-md-6 d-flex flex-column mb-md-10 mb-5">
                                {{ Form::label('item', __('messages.item_stock.item').(':'), ['class' => 'pb-2 fs-5 text-gray-600']) }}
                                <span class="fs-5 text-gray-800">{{  $itemStock->item->name}}</span>
                            </div>
                            <div class="col-md-6 d-flex flex-column mb-md-10 mb-5">
                                {{ Form::label('supplier_name', __('messages.item_stock.supplier_name').(':'), ['class' => 'pb-2 fs-5 text-gray-600']) }}
                                <span class="fs-5 text-gray-800">{{ !empty($itemStock->supplier_name) ? $itemStock->supplier_name : __('messages.common.n/a')}}</span>
                            </div>
                            <div class="col-md-6 d-flex flex-column mb-md-10 mb-5">
                                {{ Form::label('store_name', __('messages.item_stock.store_name').(':'), ['class' => 'pb-2 fs-5 text-gray-600']) }}
                                <span class="fs-5 text-gray-800">{{ !empty($itemStock->store_name) ? $itemStock->store_name : __('messages.common.n/a')}}</span>
                            </div>
                            <div class="col-md-6 d-flex flex-column mb-md-10 mb-5">
                                {{ Form::label('quality', __('messages.item_stock.quantity').(':'), ['class' => 'pb-2 fs-5 text-gray-600']) }}
                                <p class="m-0">
                                    <span class="badge badge-light-success fs-6">{{ $itemStock->quantity}}</span></p>
                            </div>
                            <div class="col-md-6 d-flex flex-column mb-md-10 mb-5">
                                {{ Form::label('purchase_price', __('messages.item_stock.purchase_price').(':'), ['class' => 'pb-2 fs-5 text-gray-600']) }}
                                <span class="fs-5 text-gray-800">{{number_format($itemStock->purchase_price, 2)}}</span>
                            </div>
                            <div class="col-md-6 d-flex flex-column mb-md-10 mb-5">
                                {{ Form::label('attachment', __('messages.item_stock.attachment').(':'), ['class' => 'pb-2 fs-5 text-gray-600']) }}
                                <span class="fs-5 text-gray-800">
                                    @if(!empty($itemStock->item_stock_url))
                                        <a href="{{ $itemStock->item_stock_url }}" target="_blank">{{ __('messages.common.view')}}</a>
                                    @else
                                        {{__('messages.common.n/a')}}
                                    @endif
                                </span>
                            </div>
                            <div class="col-md-6 d-flex flex-column mb-md-10 mb-5">
                                {{ Form::label('created_at', __('messages.common.created_on').(':'), ['class' => 'pb-2 fs-5 text-gray-600']) }}
                                <span class="fs-5 text-gray-800" title="{{ date('jS M, Y', strtotime($itemStock->created_at)) }}">{{ $itemStock->created_at->diffForHumans() }}</span>
                            </div>
                            <div class="col-md-6 d-flex flex-column mb-md-10 mb-5">
                                {{ Form::label('updated_at', __('messages.common.updated_at').(':'), ['class' => 'pb-2 fs-5 text-gray-600']) }}
                                <span class="fs-5 text-gray-800" title="{{ date('jS M, Y', strtotime($itemStock->updated_at)) }}">{{ $itemStock->updated_at->diffForHumans() }}</span>
                            </div>
                            <div class="col-md-6 d-flex flex-column mb-md-10 mb-5">
                                {{ Form::label('description', __('messages.item.description').(':'), ['class' => 'pb-2 fs-5 text-gray-600']) }}
                                <span class="fs-5 text-gray-800">{!! !empty($itemStock->description) ? nl2br(e($itemStock->description)) : __('messages.common.n/a')  !!}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
