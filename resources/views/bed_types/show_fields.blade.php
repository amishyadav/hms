<div class="tab-content" id="myTabContent">
    <div class="d-flex align-items-center py-1">
        <div class="tab-pane fade show active" id="poverview" role="tabpanel">
            <h3 class="m-0">{{ __('messages.bed_type.bed_type_details')}}</h3>
        </div>
        <div class="d-flex align-items-center py-1 ms-auto">
            <a class="btn btn-primary me-2 bed-type-edit-btn" 
               data-id="{{ $bedType->id }}">{{ __('messages.common.edit') }}</a>
            <a href="{{ url()->previous() }}"
               class="btn btn-outline-primary">{{ __('messages.common.back') }}</a>
        </div>
    </div>
    <div class="card">
        <div>
            <div class="card-body">
                <div class="row mb-7">
                    <div class="col-md-6 d-flex flex-column mb-md-10 mb-5">
                        {{ Form::label('title', __('messages.bed.bed_type').(':'), ['class' => 'pb-2 fs-5 text-gray-600']) }}
                        <span class="fs-5 text-gray-800">{{$bedType->title}}</span>
                    </div>
                    <div class="col-md-6 d-flex flex-column mb-md-10 mb-5">
                        {{ Form::label('description', __('messages.bed_type.description').(':'), ['class' => 'pb-2 fs-5 text-gray-600']) }}
                        <span class="fs-5 text-gray-800">{!! !empty($bedType->description)?nl2br(e($bedType->description)):'N/A' !!}</span>
                    </div>
                    <div class="col-md-6 d-flex flex-column mb-md-10 mb-5">
                        {{ Form::label('created on', __('messages.common.created_on').(':'), ['class' => 'pb-2 fs-5 text-gray-600']) }}
                        <span class="fs-5 text-gray-800"
                              title="{{ date('jS M, Y', strtotime($bedType->created_at)) }}">{{ $bedType->created_at->diffForHumans() }}</span>
                    </div>
                    <div class="col-md-6 d-flex flex-column mb-md-10 mb-5>
        {{ Form::label('updated on', __('messages.common.updated_at').(':'), ['class' => 'pb-2 fs-5 text-gray-600']) }}
                            <span class=" fs-5 text-gray-800
                    "
                    title="{{ date('jS M, Y', strtotime($bedType->updated_at)) }}
                    ">{{ $bedType->updated_at->diffForHumans() }}</span>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid">
    <div class="d-md-flex align-items-center justify-content-between mb-7">
        <h3 class="m-0 mt-5">{{ __('messages.bed.beds') }}</h3>
    </div>
    <livewire:bed-table-for-bed-type bedTypeId="{{$bedType->id}}"/>
</div>
</div>
{{--<div class="card mt-5 mb-xl-10">--}}
{{--    <div class="card-body">--}}

{{--        <?php--}}
{{--        $style = 'style=';--}}
{{--        $maxWidth = 'max-width:';--}}
{{--        ?>--}}
{{--        <div class="row">--}}
{{--            <div class="col-lg-12">--}}
{{--                <div class="table-responsive viewList">--}}
{{--                    @include('layouts.search-component')--}}
{{--                    <div class="table-responsive">--}}
{{--                        <table id="bedTypesTable"--}}
{{--                               class="table table-striped border-bottom-0 mt-5">--}}
{{--                            <thead>--}}
{{--                            <tr class="text-start text-muted fs-5 text-uppercase gs-0">--}}
{{--                                <th>{{ __('messages.bed_assign.bed') }}</th>--}}
{{--                                <th>{{ __('messages.bed.description') }}</th>--}}
{{--                                <th>{{ __('messages.bed.charge') }}</th>--}}
{{--                                <th class="text-center">{{ __('messages.bed.available') }}</th>--}}
{{--                            </tr>--}}
{{--                            </thead>--}}
{{--                            <tbody>--}}
{{--                            @foreach($beds as $bed)--}}
{{--                                <tr>--}}
{{--                                    <td><a href="{{ url('beds',$bed->id) }}" class="text-decoration-none">{{ $bed->name }}</a></td>--}}
{{--                                    <td class="text-truncate"--}}
{{--                                    {{$style}} "{{$maxWidth}} 150px"--}}
{{--                                    >{!! !empty($bed->description)?nl2br(e($bed->description)):'N/A' !!}</td>--}}
{{--                                    <td class="text-right">--}}
{{--                                        <b>{{ getCurrencySymbol() }}</b> {{ number_format($bed->charge, 2) }}--}}
{{--                                    </td>--}}
{{--                                    <td class="text-center">--}}
{{--                                        <span class="badge bg-light-{{($bed->is_available) ? 'success':'danger'}}">--}}
{{--                                        {{ ($bed->is_available) ? __('messages.common.yes') : __('messages.common.no') }}</span>--}}
{{--                                    </td>--}}
{{--                                </tr>--}}
{{--                            @endforeach--}}
{{--                            </tbody>--}}
{{--                        </table>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}
