@extends('layouts.admin')


@section('content')

    <h1>Projects</h1>

    <table>
        <table class="table table-hover">
            <thead>
            <tr>
                <th scope="col">Project ID</th>
                <th scope="col">Project Name</th>
                <th scope="col">Description</th>
                <th scope="col">Created By</th>
            </tr>
            </thead>

            <tbody>

            @if ($projects)

                @foreach($projects as $project)

                    <tr>
                        <td>{{$project->id}}</td>
                        <td>{{$project->name}}</td>
                        <td>{{$project->description}}</td>
                        <td>{{$project->user->name}}</td>
                        {{--}}{<td>{{$user->role ? $user->role->name : 'No Role Assigned'}}</td>
                        <td>{{$user->is_active == 0 ? 'Inactive' : 'Active'}}</td>
                        <td><a href="{{route('admin.users.edit', $project->id)}}" class="btn btn-success">Update Project</a></td>
                        <td> {!! Form::open(['method'=>'DELETE', 'action' => ['AdminProjectController@destroy', $user->id ]]) !!}
                            {!! Form::submit('Delete Project', ['class'=>'btn btn-danger']) !!}
                            {!! Form::close() !!} </td> --}}
                    </tr>
                @endforeach
            @endif

            </tbody>
        </table>

    </table>

@stop