@if ($row->status === 1)
    <a href="javascript:void(0)" data-id="{{$row->id}}" class="btn btn-primary btn-sm user-impersonate">
        Impersonate
    </a>
@else
    <span class="text text-center">N/A</span>
@endif
