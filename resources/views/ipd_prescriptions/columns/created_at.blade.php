@if ($row->created_at === null)
    N/A
@else
    <div class="badge bg-light-info">
        <div>
            {{ \Carbon\Carbon::parse($row->created_at)->isoFormat('Do MMM, YYYY')}}
        </div>
    </div>
@endif
