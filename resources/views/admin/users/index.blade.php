@extends('layouts.admin')



@section('content')
    <h1>Users</h1>

    <table class="table table-hover">
        <thead>
        <tr>
            <th scope="col">User ID</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Role</th>
            <th scope="col">Status</th>
            <th scope="col"></th>
        </tr>
        </thead>

        <tbody>
        @if ($users)
                @foreach($users as $user)
                    <tr>
                    <td>{{$user->id}}</td>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->role ? $user->role->name : 'No Role Assigned'}}</td>
                    <td>{{$user->is_active == 0 ? 'Inactive' : 'Active'}}</td>
                    <td><button type="button" class="btn btn-success"><a href="{{route('admin.users.edit', $user->id)}}">Edit</a></button></td>
                    </tr>
                @endforeach
                @endif

        </tbody>
    </table>


@stop