@if ($row->instruction_date === null)
    {{ __('messages.common.n/a') }}
@else
    <div class="badge bg-light-info">
        <div>{{\Carbon\Carbon::parse($row->instruction_date)->isoFormat('Do MMM,YYYY')}}</div>
    </div>
@endif
