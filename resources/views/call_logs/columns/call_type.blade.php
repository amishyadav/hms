<div class="d-flex align-items-center">
    @if ($row->call_type == App\Models\CallLog::INCOMING)
        <span class="badge bg-light-info fs-7">incoming</span>
    @else
        <span class="badge bg-light-primary fs-7">outgoing</span>
    @endif
</div>

