@foreach($row->roles as $role)
    <span class="badge bg-light-info">{{$role->name}}</span>
@endforeach
{{--<span class="badge bg-light-info">{{$row->roles[0]->name}}</span>--}}
