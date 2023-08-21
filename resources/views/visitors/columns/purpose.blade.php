@if ($row->purpose == 1)
    Visit
@elseif ($row->purpose == 2)
    Enquiry
@else
    Seminar
@endif
