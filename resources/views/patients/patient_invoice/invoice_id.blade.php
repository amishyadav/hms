@if(!Auth::user()->hasRole('Case Manager|Doctor|Nurse|Receptionist'))
    <a href="{{ url('employee/invoices',$row->id) }}"><span class="badge bg-light-info">{{$row->invoice_id}}</span></a>
@else
    <span class="badge bg-light-info">{{$row->invoice_id}}</span>
@endif
