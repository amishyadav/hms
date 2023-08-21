<div>
    <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="poverview" role="tabpanel">
            <div class="card mb-5 mb-xl-10">
                <div>
                    <div class="card-body p-9">
                        <div class="row mb-7">
                            <div class="col-md-6 d-flex flex-column mb-md-10 mb-5">
                                <label class="pb-2 fs-5 text-gray-600">{{ __('messages.medicine.category')  }}</label>
                                <span class="fs-5 text-gray-800">{{ $category->name}}</span>
                            </div>
                            <div class="col-md-6 d-flex flex-column mb-md-10 mb-5">
                                <label class="pb-2 fs-5 text-gray-600">{{ __('messages.common.status')  }}</label>
                                <p class="m-0">
                                    <span class="badge fs-6 bg-light-{{!empty($category->is_active == 1) ? 'success' : 'danger'}}">{{ ($category->is_active == 1) ? __('messages.common.active') : __('messages.common.de_active') }}</span>
                                </p>
                            </div>
                            <div class="col-md-6 d-flex flex-column mb-md-10 mb-5">
                                <label class="pb-2 fs-5 text-gray-600">{{ __('messages.common.created_on')  }}</label>
                                <span class="fs-5 text-gray-800" data-toggle="tooltip" data-placement="right" title="{{ \Carbon\Carbon::parse($category->created_at)->translatedFormat('jS M, Y') }}">{{ \Carbon\Carbon::parse($category->created_at)->diffForHumans() }}</span>
                            </div>
                            <div class="col-md-6 d-flex flex-column mb-md-10 mb-5">
                                <label class="pb-2 fs-5 text-gray-600">{{ __('messages.common.last_updated')  }}</label>
                                <span class="fs-5 text-gray-800" data-toggle="tooltip" data-placement="right" title="{{ \Carbon\Carbon::parse($category->updated_at)->translatedFormat('jS M, Y') }}">{{ \Carbon\Carbon::parse($category->updated_at)->diffForHumans() }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container-fluid">
                <div class="d-md-flex align-items-center justify-content-between mb-7">
                    <h3 class="m-0 mt-5">{{ __('messages.medicine.medicines') }}</h3>
                </div>
                <livewire:medicine-category-detail-table categoryDetails="{{$category->id}}"/>
            </div>
{{--            <h1 class="mb-5">{{ __('messages.medicine.medicines') }}</h1>--}}
{{--            --}}
{{--            <div class="card mb-5 mb-xl-10">--}}
{{--                <div class="card-body p-9">--}}
{{--                    <livewire:medicine-category-detail-table categoryDetails="{{$category->id}}"/>  --}}
{{--                    <div class="row">--}}
{{--                        <div class="col-lg-12">--}}
{{--                            <div class="table-responsive viewList">--}}
{{--                                @include('layouts.search-component')--}}
{{--                                <table id="categoryTable" class="table table-striped border-bottom-0">--}}
{{--                                    <thead>--}}
{{--                                    <tr class="text-start text-muted fw-bolder fs-7 text-uppercase gs-0">--}}
{{--                                        <th class="w-10">{{ __('messages.medicine.medicine') }}</th>--}}
{{--                                        <th class="w-15">{{ __('messages.medicine.brand') }}</th>--}}
{{--                                        <th class="w-50">{{ __('messages.medicine.description') }}</th>--}}
{{--                                        <th class="w-10 text-right">{{ __('messages.medicine.selling_price') }}</th>--}}
{{--                                        <th class="w-10 text-right">{{ __('messages.medicine.buying_price') }}</th>--}}
{{--                                    </tr>--}}
{{--                                    </thead>--}}
{{--                                    <tbody class="fw-bold">--}}
{{--                                    @foreach($medicines as $medicine)--}}
{{--                                        <tr>--}}
{{--                                            <td>{{ $medicine->name }}</td>--}}
{{--                                            <td>{{ $medicine->brand->name }}</td>--}}
{{--                                            <td>{!! !empty($medicine->description)?nl2br(e($medicine->description)):'N/A' !!}</td>--}}
{{--                                            <td class="text-right">--}}
{{--                                                <b>{{ getCurrencySymbol() }}</b> {{ number_format ($medicine->selling_price, 2) }}--}}
{{--                                            </td>--}}
{{--                                            <td class="text-right">--}}
{{--                                                <b>{{ getCurrencySymbol() }}</b> {{ number_format ($medicine->buying_price, 2) }}--}}
{{--                                            </td>--}}
{{--                                        </tr>--}}
{{--                                    @endforeach--}}
{{--                                    </tbody>--}}
{{--                                </table>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
        </div>
    </div>
</div>
