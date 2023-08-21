<?php $checkLabTechnicianRole = (Auth::user()->hasRole('Lab Technician')) ? true : false; ?>
<div class="d-flex align-items-center">
    <a href="{{route('patients.show', $row->patient->id)}}">
        <div class="image image-mini me-3">
            <img src="{{$row->patient->patientUser->image_url}}" alt="user" class="user-img rounded-circle object-contain">
        </div>
    </a>
    @if ($checkLabTechnicianRole)
        <div class="d-flex flex-column">
            <a href="javascript:void(0)" class="mb-1 text-decoration-none fs-6">
                {{$row->patient->patientUser->full_name}}
            </a>
            <span class="fs-6">{{$row->patient->patientUser->email}}</span>
        </div>
    @else
        <div class="d-flex flex-column">
            <a href="{{ route('patients.show',$row->patient->id) }}" class="mb-1 text-decoration-none fs-6">
                {{$row->patient->patientUser->full_name}}
            </a>
            <span class="fs-6">{{$row->patient->patientUser->email}}</span>
        </div>
    @endif
</div>
{{--<div class="d-flex align-items-center">--}}
{{--    <div class="symbol symbol-circle symbol-50px overflow-hidden me-3">--}}
{{--        <a href="{{route('patients.show',$row->id)}}">--}}
{{--            <div>--}}
{{--                <img src="{{$row->patient->user->image_url}}" alt="" --}}
{{--                     class="user-img" >--}}
{{--            </div>--}}
{{--        </a>--}}
{{--    </div>--}}
{{--    @if ($checkLabTechnicianRole)--}}
{{--        <div class="d-flex flex-column">--}}
{{--            <span class="mb-1 text-dark fw-bold">{{$row->patient->user->full_name}}</span>--}}
{{--            <span>{{$row->patient->user->email}}</span>--}}
{{--        </div>--}}
{{--    @else--}}
{{--        <div class="d-flex flex-column">--}}
{{--            <a href="{{ route('patients.show',$row->id) }}" class="mb-1">{{$row->patient->user->full_name}}</a>--}}
{{--            <span>{{$row->patient->user->email}}</span>--}}
{{--        </div>--}}
{{--    @endif--}}
{{--</div>--}}
