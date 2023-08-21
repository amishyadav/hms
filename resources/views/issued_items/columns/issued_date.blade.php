<div class="badge bg-light-info">
    {{ \Carbon\Carbon::parse($row->issued_date)->isoFormat('Do MMM, Y')}}
</div>
