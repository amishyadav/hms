@php
    $username = App\Models\User::where('tenant_id', $row->tenant_id)->first();
@endphp
@if ($row->status == 1)
    <a href="{{route('front',$username->username)}}" class="show-btn text-blue text-decoration-none"
       target="_blank">{{$username->username}}<span class="ms-2"><i
                    class="fas fa-external-link-alt url-external-link"></i></span></a>
@else
    {{$row->username}}
@endif
