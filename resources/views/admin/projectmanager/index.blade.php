@extends('layouts.admin')

@section('content')

    <h2 align="center">Project Managers</h2>
    <br>

    {!! Form::open(['method'=>'POST', 'action'=>'AdminProjectManagerController@store']) !!}


    <div class="form-group">
        {!! Form::label('user_id', 'Create a Project Manager:') !!}
        {!! Form::select('user_id', ['' => 'Choose Project Manager'] + $users, null, ['class'=>'form-control']) !!}

    </div>


    <div class="form-group">
        {!! Form::submit('Create a Project Manager', ['class'=>'btn-btn-primary']) !!}
    </div>

    {!! Form::close() !!}

    <br>

    <table class="table table-hover">

        @if ($project_managers)

            <thead>
            <tr>
                <th scope="col">PM ID</th>
                <th scope="col">PM Name</th>
            </tr>
            </thead>

            <tbody>

            @foreach($project_managers as $project_manager)

                <tr>
                    <td>{{$project_manager->id}}</td>
                    <td>{{$project_manager->user->name}}</td>

                    {{--}}<td><a href="{{route('admin.departments.edit', $department->id)}}" class="btn btn-success col-sm-12">Update</a>
                        {!! Form::open(['method'=>'DELETE', 'action' => ['AdminDepartmentsController@destroy', $department->id ]]) !!}
                        {!! Form::submit('Delete', ['class'=>'btn btn-danger col-sm-12']) !!}
                        {!! Form::close() !!} </td>--}}
                </tr>
            @endforeach

            </tbody>
    </table>

    @endif


    {{--</div>--}}


@stop