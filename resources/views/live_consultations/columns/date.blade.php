@if ($row->consultation_date === null)
    N/A
@else
    <div class="badge bg-light-info">
        <div class="mb-2">{{ \Carbon\Carbon::parse($row->consultation_date)->format('h:i A')}}</div>
        <div> {{ \Carbon\Carbon::parse($row->consultation_date)->isoFormat('Do MMM, YYYY')}}</div>
    </div>
@endif   
