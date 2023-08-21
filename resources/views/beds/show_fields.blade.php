<div>
    <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="poverview" role="tabpanel">
            <div class="d-md-flex align-items-center justify-content-between mb-7">
                <h1 class="mb-0">{{__('messages.bed.bed_details')}}</h1>
                <div class="text-end mt-4 mt-md-0">
                    @if (!Auth::user()->hasRole('Doctor|Receptionist'))
                        <a class="btn btn-primary bed-edit-btn"
                           data-id="{{ $bed->id }}">{{ __('messages.common.edit') }}</a>
                    @endif
                    <a href="{{ url()->previous()}}"
                       class="btn btn-outline-primary ms-2">{{ __('messages.common.back') }}</a>
                </div>
            </div>
            <div class="card mt-5 mb-5 mb-xl-10">
                <div>
                    <div class="card-body  border-top p-9">
                        <div class="row mb-7">
                            <div class="col-md-6 d-flex flex-column mb-md-10 mb-5">
                                <label
                                        class="pb-2 fs-5 text-gray-600">{{ __('messages.bed_assign.bed').(':')  }}</label>
                                <span class="fs-5 text-gray-800">{{$bed->name}}</span>
                            </div>
                            <div class="col-md-6 d-flex flex-column mb-md-10 mb-5">
                                <label class="pb-2 fs-5 text-gray-600">{{ __('messages.bed.bed_type').(':')  }}</label>
                                <span class="fs-5 text-gray-800">{{$bed->bedType->title }}</span>
                            </div>
                            <div class="col-md-6 d-flex flex-column mb-md-10 mb-5">
                                <label class="pb-2 fs-5 text-gray-600">{{ __('messages.bed.bed_id').(':')  }}</label>
                                <span class="fs-5 text-gray-800">{{$bed->bed_id  }}</span>
                            </div>
                            <div class="col-md-6 d-flex flex-column mb-md-10 mb-5">
                                <label class="pb-2 fs-5 text-gray-600">{{ __('messages.bed.charge').(':')  }}</label>
                                <span class="fs-5 text-gray-800">{{ getCurrencySymbol() }} {{ number_format($bed->charge,2) }}</span>
                            </div>
                            <div class="col-md-6 d-flex flex-column mb-md-10 mb-5">
                                <label class="pb-2 fs-5 text-gray-600">{{ __('messages.bed.available').(':')  }}</label>
                                <p class="m-0">
                                    <span class="badge fs-6 bg-light-{{!empty($bed->is_available) ? 'success' : 'danger' }} mt-2">{{ ($bed->is_available) ? 'Yes' : 'No'}}</span>
                                </p>
                            </div>
                            <div class="col-md-6 d-flex flex-column mb-md-10 mb-5">
                                <label class="pb-2 fs-5 text-gray-600">{{ __('messages.common.created_at').(':')  }}</label>
                                <span class="fs-5 text-gray-800" data-toggle="tooltip" data-placement="right"
                                      title="{{ date('jS M, Y', strtotime($bed->created_at)) }}">{{ $bed->created_at->diffForHumans() }}</span>
                            </div>
                            <div class="col-md-6 d-flex flex-column mb-md-10 mb-5">
                                <label class="pb-2 fs-5 text-gray-600">{{ __('messages.common.updated_at').(':')  }}</label>
                                <span class="fs-5 text-gray-800" data-toggle="tooltip" data-placement="right"
                                      title="{{ date('jS M, Y', strtotime($bed->updated_at)) }}">{{ $bed->updated_at->diffForHumans() }}</span>
                            </div>
                            <div class="col-md-12 d-flex flex-column mb-md-10 mb-5">
                                <label class="pb-2 fs-5 text-gray-600">{{ __('messages.bed.description').(':')  }}</label>
                                <span class="fs-5 text-gray-800">{!! !empty($bed->description) ? nl2br(e($bed->description)) : 'N/A'!!}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="d-md-flex align-items-center justify-content-between mb-7">
            <h1 class="m-0 mb-5">{{ __('messages.bed_assign.bed_assigns') }}</h1>
        </div>
        <livewire:assign-bed-table bedId="{{$bed->id}}"/>
    </div>
    
{{--    <div class="card mb-5 mb-xl-10">--}}
{{--        <div class="card-body">--}}
            
{{--            <div class="row">--}}
{{--                <div class="col-lg-12">--}}
{{--                    <div class="table-responsive viewList">--}}
{{--                        @include('layouts.search-component')--}}
{{--                        <div class="table-responsive">--}}
{{--                            <table id="bedsAssigns"--}}
{{--                                   class="table table-striped border-bottom-0 mt-5">--}}
{{--                                <thead>--}}
{{--                                <tr class="text-start text-muted fw-bolder fs-7 text-uppercase gs-0">--}}
{{--                                    <th class="w-15 text-start">{{ __('messages.bed_assign.case_id') }}</th>--}}
{{--                                    <th class="w-15">{{ __('messages.case.patient') }}</th>--}}
{{--                                    <th class="w-15">{{ __('messages.bed_assign.assign_date') }}</th>--}}
{{--                                    <th class="w-15">{{ __('messages.bed_assign.discharge_date') }}</th>--}}
{{--                                    <th class="w-10 text-center">{{ __('messages.common.status') }}</th>--}}
{{--                                </tr>--}}
{{--                                </thead>--}}
{{--                                <tbody class="fw-bold">--}}
{{--                                @foreach($bedAssigns as $bedAssign)--}}
{{--                                    <tr>--}}
{{--                                        <td><span class="badge bg-light-info ">{{ $bedAssign->case_id }}</span></td>--}}
{{--                                        <td>--}}
{{--                                            <div class="d-flex align-items-center">--}}
{{--                                                <div class="image image-circle image-mini me-3 symbol-50px overflow-hidden me-3">--}}
{{--                                                    <a href="{{ url('patients', $bedAssign->patient_id) }}">--}}
{{--                                                        <div>--}}
{{--                                                            <img src="{{ $bedAssign->patient->user->imageUrl }}" alt=""--}}
{{--                                                                 class="text-decoration-none user-img object-fit-cover image">--}}
{{--                                                        </div>--}}
{{--                                                    </a>--}}
{{--                                                </div>--}}
{{--                                                <div class="d-flex flex-column">--}}
{{--                                                    <a href="{{ url('patients', $bedAssign->patient_id) }}"--}}
{{--                                                       class="mb-1 text-decoration-none">{{ $bedAssign->patient->user->full_name }}</a>--}}
{{--                                                    <span>{{ $bedAssign->patient->user->email }}</span>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </td>--}}
{{--                                        <td>--}}
{{--                                            @if(!empty($bedAssign->assign_date))--}}
{{--                                                <div class="badge bg-light-info">--}}
{{--                                                    <div class="mb-2">{{ \Carbon\Carbon::parse($bedAssign->assign_date)->format('g:i A') }}</div>--}}
{{--                                                    <div>{{ \Carbon\Carbon::parse($bedAssign->assign_date)->format('jS M, Y') }}</div>--}}
{{--                                                </div>--}}
{{--                                            @else--}}
{{--                                                N/A--}}
{{--                                            @endif--}}
{{--                                        </td>--}}
{{--                                        <td>{{ !empty($bedAssign->discharge_date)?date('jS M, Y g:i A', strtotime($bedAssign->discharge_date)):'N/A' }}</td>--}}
{{--                                        <td class="text-center"><span--}}
{{--                                                    class="badge bg-light-{{!empty($bedAssign->status) ? 'success' : 'danger'}}">{{ ($bedAssign->status) ? __('messages.bed_assign.assigned') : __('messages.bed_assign.not_assigned') }}</span>--}}
{{--                                        </td>--}}
{{--                                    </tr>--}}
{{--                                @endforeach--}}
{{--                                </tbody>--}}
{{--                            </table>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
        </div>
{{--    </div>--}}
{{--</div>--}}
