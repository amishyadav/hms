@if (getLoggedInUser()->hasRole(['Admin', 'Doctor']))
    <a href="#" class="btn btn-primary" data-bs-toggle="modal"
       data-bs-target="#add_live_meeting_modal">
        {{ __('messages.live_consultation.new_live_meeting') }}
    </a>
@endif
