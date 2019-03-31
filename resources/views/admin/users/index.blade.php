@extends('layouts.admin')



@section('content')

    @if(Session::has('user_updated'))

        <b><p class="bg-success" align="center">{{session('user_updated')}}</p></b>

    @endif

    @if(Session::has('user_created'))

        <b><p class="bg-success" align="center">{{session('user_created')}}</p></b>

    @endif

    @if(Session::has('user_deleted'))

        <b><p class="bg-danger" align="center">{{session('user_deleted')}}</p></b>

    @endif

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
                        <td><a href="{{route('admin.users.edit', $user->id)}}" class="btn btn-success">Edit User</a></td>
                        <td> {!! Form::open(['method'=>'DELETE', 'action' => ['AdminUsersController@destroy', $user->id ]]) !!}
                        {!! Form::submit('Delete User', ['class'=>'btn btn-danger']) !!}
                            {!! Form::close() !!} </td>
                    </tr>
                @endforeach
                @endif

        </tbody>
    </table>


@stop