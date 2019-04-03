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

                        <td><a href="{{route('admin.projects.edit', $project->id)}}" class="btn btn-success col-sm-12">Update</a>
                        {!! Form::open(['method'=>'DELETE', 'action' => ['AdminProjectsController@destroy', $project->id ]]) !!}
                            {!! Form::submit('Delete', ['class'=>'btn btn-danger col-sm-12']) !!}
                            {!! Form::close() !!} </td>
                    </tr>
                @endforeach
            @endif

            </tbody>
        </table>

    </table>

@stop