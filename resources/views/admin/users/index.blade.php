@extends('layouts.app')

@section('content')

    <!-- White Container in Page -->
    <div class="container">
        <div class="card border-0 shadow my-5">
            <div class="card-body p-5">

                <!-- Message that confirms to user that the record has been updated or deleted -->
                @if(Session::has('user_updated'))
                    <b><p class="bg-success" align="center">{{session('user_updated')}}</p></b>
                @endif

                @if(Session::has('user_created'))
                        <b><p class="bg-success" align="center">{{session('user_created')}}</p></b>
                @endif


                <h1 class="font-weight-light">All Users</h1><br>

                <!--Table to show results-->
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th class="text-center" scope="col">User ID</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Role</th>
                        <th scope="col">Status</th>
                        <th class="text-center" scope="col">Edit User</th>
                    </tr>
                    </thead>

                    <tbody>
                    <!--Table body which displays user details-->
                    @if ($users)
                        @foreach($users as $user)
                            <tr>
                                <td align="center">{{$user->id}}</td>
                                <td>{{$user->name}}</td>
                                <td>{{$user->email}}</td>
                                <td>{{$user->role ? $user->role->name : 'No Role Assigned'}}</td>
                                <td>{{$user->is_active == 0 ? 'Inactive' : 'Active'}}</td>
                                <td align="center"><a href="{{route('admin.users.edit', $user->id)}}" class="btn btn-primary">Edit User</a></td>
                            </tr>
                        @endforeach
                    @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@stop