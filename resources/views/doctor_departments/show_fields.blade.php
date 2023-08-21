<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-md-6 d-flex flex-column mb-md-10 mb-5">
                {{ Form::label('title', __('messages.appointment.doctor_department').(':'), ['class' => 'pb-2 fs-5 text-gray-600']) }}
                <span class="fs-5 text-gray-800">{{ $doctorDepartment->title }}</span>
            </div>
            <div class="col-md-6 d-flex flex-column mb-md-10 mb-5">
                {{ Form::label('created at', __('messages.common.created_on').(':'), ['class' => 'pb-2 fs-5 text-gray-600']) }}
                <span class="fs-5 text-gray-800" data-toggle="tooltip" data-placement="right"
                      title="{{ date('jS M, Y', strtotime($doctorDepartment->created_at)) }}">{{ $doctorDepartment->created_at->diffForHumans() }}</span>
            </div>
            <div class="col-md-6 d-flex flex-column mb-md-10 mb-5">
                {{ Form::label('updated at', __('messages.common.last_updated').(':'), ['class' => 'pb-2 fs-5 text-gray-600']) }}
                <span class="fs-5 text-gray-800" data-toggle="tooltip" data-placement="right"
                      title="{{ date('jS M, Y', strtotime($doctorDepartment->updated_at)) }}">{{ $doctorDepartment->updated_at->diffForHumans() }}</span>
            </div>
            <div class="col-md-6 d-flex flex-column mb-md-10 mb-5">
                {{ Form::label('description', __('messages.doctor_department.description').(':'), ['class' => 'pb-2 fs-5 text-gray-600']) }}
                <span class="fs-5 text-gray-800">{!! (!empty($doctorDepartment->description)) ? nl2br(e($doctorDepartment->description)) : __('messages.common.n/a') !!}</span>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid">
    <div class="d-md-flex align-items-center justify-content-between mb-7">
        <h3 class="m-0 mt-5">{{ __('messages.doctors') }}</h3>
    </div>
    <livewire:department-doctor-table doctorDepartmentId="{{$doctorDepartment->id}}"/>
</div>
{{--<div class="card mt-5">--}}
{{--    <div class="card-body">--}}
{{--        <div class="card-toolbar">--}}
{{--            <h1>{{ __('messages.') }}</h1>--}}
{{--            <div class="d-flex align-items-center py-1 mb-5">--}}
{{--                --}}{{--                @include('layouts.search-component')--}}
{{--            </div>--}}
{{--            --}}
{{--            --}}{{--            <div class="table-responsive">--}}
{{--            --}}{{--                <table id="doctorsDepartmentList"--}}
{{--            --}}{{--                       class="table table-striped border-bottom-0">--}}
{{--            --}}{{--                    <thead>--}}
{{--            --}}{{--                    <tr class="text-start text-muted fw-bolder fs-7 text-uppercase gs-0">--}}
{{--            --}}{{--                        <th>{{ __('messages.case.doctor') }}</th>--}}
{{--            --}}{{--                        <th>{{ __('messages.doctor.specialist') }}</th>--}}
{{--            --}}{{--                        <th>{{ __('messages.user.phone') }}</th>--}}
{{--            --}}{{--                        <th>{{ __('messages.user.qualification') }}</th>--}}
{{--            --}}{{--                        <th class="text-center">{{ __('messages.common.status') }}</th>--}}
{{--            --}}{{--                    </tr>--}}
{{--            --}}{{--                    </thead>--}}
{{--            --}}{{--                    <tbody class="fw-bold">--}}
{{--            --}}{{--                    @forelse($doctors as $doctor)--}}
{{--            --}}{{--                        <tr>--}}
{{--            --}}{{--                            <td>--}}
{{--            --}}{{--                                <div class="d-flex align-items-center">--}}
{{--            --}}{{--                                    <div class="image image-mini me-3">--}}
{{--            --}}{{--                                        <a href="{{ url('doctors/'.$doctor->id) }}">--}}
{{--            --}}{{--                                            <div>--}}
{{--            --}}{{--                                                <img src="{{ $doctor->user->image_url }}" alt=""--}}
{{--            --}}{{--                                                     class="user-img rounded-circle image">--}}
{{--            --}}{{--                                            </div>--}}
{{--            --}}{{--                                        </a>--}}
{{--            --}}{{--                                    </div>--}}
{{--            --}}{{--                                    <div class="d-flex flex-column">--}}
{{--            --}}{{--                                        <a href="{{ url('doctors/'.$doctor->id) }}"--}}
{{--            --}}{{--                                           class="mb-1 text-decoration-none">{{ $doctor->user->full_name }}</a>--}}
{{--            --}}{{--                                        <span>{{ $doctor->user->email }}</span>--}}
{{--            --}}{{--                                    </div>--}}
{{--            --}}{{--                                </div>--}}
{{--            --}}{{--                            </td>--}}
{{--            --}}{{--                            <td>{{ $doctor->specialist }}</td>--}}
{{--            --}}{{--                            <td>{{ (!empty($doctor->user->phone)) ? $doctor->user->phone : __('messages.common.n/a') }}</td>--}}
{{--            --}}{{--                            <td>{{ $doctor->user->qualification }}</td>--}}
{{--            --}}{{--                            <td class="text-center">--}}
{{--            --}}{{--                                            <span--}}
{{--            --}}{{--                                                    class="badge bg-light-{{($doctor->user->status == 1) ? 'success' : 'danger'}}">{{ ($doctor->user->status) ? __('messages.common.active') : __('messages.common.de_active') }}</span>--}}
{{--            --}}{{--                            </td>--}}
{{--            --}}{{--                        </tr>--}}
{{--            --}}{{--                    @empty--}}
{{--            --}}{{--                        <tr>--}}
{{--            --}}{{--                            <td class="text-center" colspan="6">No data available in table</td>--}}
{{--            --}}{{--                        </tr>--}}
{{--            --}}{{--                    @endforelse--}}
{{--            --}}{{--                    </tbody>--}}
{{--            --}}{{--                </table>--}}
{{--            --}}{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}
 
 
