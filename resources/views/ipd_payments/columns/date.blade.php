@if ($row->date === null)
    N/A
@else
    <div class="badge bg-light-info">
        <div>{{ \Carbon\Carbon::parse($row->date)->isoFormat('Do MMM, YYYY')}}

        </div>
    </div>
@endif
