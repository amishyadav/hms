<div class="d-flex align-items-center">
    <a href="{{!empty($row->patient) ? route('patients.show',$row->patient->id) : 'javascript:void(0)' }}">
        <div class="image image-circle image-mini me-3">
            <img src="{{ !empty($row->patient) ? $row->patient->patientUser->image_url  : asset('web/img/logo.jpg')  }}
                    " alt="user" class="user-img">
        </div>
    </a>
    <div class="d-flex flex-column">
        <a href="{{!empty($row->patient) ?  route('patients.show',$row->patient->id)  : "javascript:void(0)"}}" class="mb-1 text-decoration-none fs-6">
            {{ !empty($row->patient) ? $row->patient->patientUser->full_name  : __('messages.common.n/a')  }}
        </a>
        <span class="fs-6">
            {{ !empty($row->patient) ? $row->patient->patientUser->email  : __('messages.common.n/a')  }}
        </span>
    </div>
</div>
