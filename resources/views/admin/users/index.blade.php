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
        </tr>
        </thead>
        <tbody>

        @if ($users)
            <tr>
                @foreach($users as $user)
                    <td>{{$user->id}}</td>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->role->name}}</td>
                    <td>{{$user->is_active == 1 ? 'Active' : 'Inactive'}}</td>
                @endforeach
                @endif
            </tr>
        </tbody>
    </table>


@stop