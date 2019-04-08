@extends('layouts.admin')


@section('content')

    @if(Session::has('project_updated'))

        <b><p class="bg-success" align="center">{{session('project_updated')}}</p></b>

    @endif

    @if(Session::has('project_created'))

        <b><p class="bg-success" align="center">{{session('project_created')}}</p></b>

    @endif

    @if(Session::has('project_deleted'))

        <b><p class="bg-danger" align="center">{{session('project_deleted')}}</p></b>

    @endif

    <h1>Projects</h1>

    <table>
        <table class="table table-hover">
            <thead>
            <tr>
                <th scope="col">Project ID</th>
                <th scope="col">Project Name</th>
                <th scope="col">Description</th>
                <th scope="col">Strategic Driver</th>
                <th scope="col">Business Department</th>
                <th scope="col">Created By</th>
                <th scope="col">Actions</th>

            </tr>
            </thead>

            <tbody>

            @if ($projects)

                @foreach($projects as $project)

                    <tr>
                        <td>{{$project->id}}</td>
                        <td>{{$project->name}}</td>
                        <td>{{$project->description}}</td>
                        <td>{{$project->driver ? $project->driver->name: "Strategic Driver not assigned"}}</td>
                        <td>{{$project->department ? $project->department->name : "Department not assigned"}}</td>
                        <td>{{$project->user->name}}</td>
                        <td><a href ="{{route('home.project', $project->id)}}" class="btn btn-default col-sm-8">Visit Workspace</a>
                            <a href="{{route('admin.projects.edit', $project->id)}}" class="btn btn-info col-sm-8">Update</a>
                        {!! Form::open(['method'=>'DELETE', 'action' => ['AdminProjectsController@destroy', $project->id ]]) !!}
                        {!! Form::submit('Delete', ['class'=>'btn btn-warning col-sm-8']) !!}


                        @if($project->approval_status == 0)

                            {!! Form::open(['method'=>'PATCH', 'action'=>['AdminProjectsController@update', $project->id]]) !!}

                            <input type="hidden" name="approval_status" value="1">

                            <div class="form-group">
                                {!! Form::submit('Approve', ['class'=>'btn btn-success col-sm-8']) !!}
                            </div>

                            {!! Form::close() !!} </td>

                        @elseif ($project->approval_status == 1)

                            {!! Form::open(['method'=>'PATCH', 'action'=>['AdminProjectsController@update', $project->id]]) !!}

                            <input type="hidden" name="approval_status" value="0">

                            {!! Form::submit('Reject', ['class'=>'btn btn-danger col-sm-8']) !!}

                            {!! Form::close() !!} </td>


                        @endif

                    </tr>
                @endforeach
            @endif

            </tbody>
        </table>

    </table>

@stop