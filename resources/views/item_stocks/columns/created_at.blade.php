<div class="d-flex justify-content-center">
@if($row->created_at !== null )
        <div class="badge bg-light-info">
            {{ \Carbon\Carbon::parse($row->created_at)->isoFormat('Do MMM, Y')}}
        </div>
@else
        {{__('messages.common.n/a')}}
@endif
</div>
