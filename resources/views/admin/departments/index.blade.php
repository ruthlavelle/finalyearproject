@extends('layouts.admin')

@section('content')

    <h1>Departments</h1>

    <div class="col-sm-6">

        {!! Form::open(['method'=>'POST', 'action'=>'AdminDepartmentsController@store']) !!}

        {{--Name field which is displayed empty--}}
        <div class="form-group">
            {!! Form::label('name', 'Department Name:') !!}
            {!! Form::text('name', null, ['class'=>'form-control']) !!}
        </div>

       <div class="form-group">
            {!! Form::label('user_id', 'Department Manager:') !!}
            {!! Form::select('user_id', ['' => 'Choose Department Manager'] + $users, null, ['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::submit('Create Business Department', ['class'=>'btn-btn-primary']) !!}
        </div>

        {!! Form::close() !!}


    </div>

    <div class="col-sm-6">

        <table class="table table-hover">

            <thead>
            <tr>
                <th scope="col">Department ID</th>
                <th scope="col">Department Name</th>
                <th scope="col">Department Manager</th>
            </tr>
            </thead>

            <tbody>

            @if ($departments)

                @foreach($departments as $department)

                    <tr>
                        <td>{{$department->id}}</td>
                        <td>{{$department->name}}</td>
                        <td>{{$department->user ? $department->user->name: "No Manager Assigned"}}</td>

                        {{--}}<td><a href="{{route('admin.projects.edit', $project->id)}}" class="btn btn-success col-sm-12">Update</a>
                                {!! Form::open(['method'=>'DELETE', 'action' => ['AdminProjectsController@destroy', $project->id ]]) !!}
                                {!! Form::submit('Delete', ['class'=>'btn btn-danger col-sm-12']) !!}
                                {!! Form::close() !!} </td>--}}
                    </tr>
                @endforeach
            @endif
            </tbody>
        </table>


    </div>


@stop