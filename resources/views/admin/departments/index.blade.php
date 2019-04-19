@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="card border-0 shadow my-5">
            <div class="card-body p-5">

                <h1 class="font-weight-light">Business Departments</h1><br>

                <div class="col-md-4">
                {{-- Form to create a new department in DB --}}
                {!! Form::open(['method'=>'POST', 'action'=>'AdminDepartmentsController@store']) !!}

                {{--Name field which is displayed empty--}}
                <div class="form-group">
                    {!! Form::label('name', 'Department Name:') !!}
                    {!! Form::text('name', null, ['class'=>'form-control']) !!}
                </div>

                {{--Department Manager Field - Pulls From Users table --}}
                <div class="form-group">
                    {!! Form::label('user_id', 'Department Manager:') !!}
                    {!! Form::select('user_id', ['' => 'Choose Department Manager'] + $users, null, ['class'=>'form-control', 'style'=>'height: 30px;']) !!}
                </div>

                <div class="form-group">
                    {!! Form::submit('Create Business Department', ['class'=>'btn btn-primary']) !!}
                </div>

                {!! Form::close() !!}

                </div>

                <div class="col-md-8">

                {{-- Table to display Departments from DB --}}
                <table class="table table-bordered">
                    @if ($departments)

                        <thead>
                        <tr>
                            <th class="text-center" scope="col">ID</th>
                            <th scope="col">Name</th>
                            <th scope="col">Manager</th>
                            <th class="text-center" scope="col">Actions</th>
                        </tr>
                        </thead>

                        <tbody>

                        {{-- List out depts from the DB --}}
                        @foreach($departments as $department)

                            <tr>
                                <td align="center">{{$department->id}}</td>
                                <td>{{$department->name}}</td>
                                <td>{{$department->user ? $department->user->name: "No Manager Assigned"}}</td>
                                <td align="center"><a href="{{route('admin.departments.edit', $department->id)}}" class="btn btn-primary col-sm-6">Edit</a>
                                    {!! Form::open(['method'=>'DELETE', 'action' => ['AdminDepartmentsController@destroy', $department->id ]]) !!}
                                    {!! Form::submit('Delete', ['class'=>'btn btn-danger col-sm-6']) !!}
                                    {!! Form::close() !!} </td>
                            </tr>
                        @endforeach

                        </tbody>
                </table>
                @endif
                </div>
            </div>
        </div>
    </div>
@stop