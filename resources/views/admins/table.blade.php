<div class="table-responsive-sm">
    <table class="table table-striped" id="admins-table">
        <thead>
            <tr>
                <th>First Name</th>
        <th>Last Name</th>
        <th>Email</th>
        <th>Contact No</th>
        <th>Password</th>
        <th>Confirm Password</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($admins as $admin)
            <tr>
                <td>{{ $admin->first_name }}</td>
            <td>{{ $admin->last_name }}</td>
            <td>{{ $admin->email }}</td>
            <td>{{ $admin->contact_no }}</td>
            <td>{{ $admin->password }}</td>
            <td>{{ $admin->confirm_password }}</td>
                <td>
                    {!! Form::open(['route' => ['admins.destroy', $admin->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('admins.show', [$admin->id]) }}" class='btn btn-ghost-success'><i class="fa fa-eye"></i></a>
                        <a href="{{ route('admins.edit', [$admin->id]) }}" class='btn btn-ghost-info'><i class="fa fa-edit"></i></a>
                        {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-ghost-danger', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
