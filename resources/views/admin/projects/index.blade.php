@extends('layouts.app')


@section('content')

    <div class="container">
        <div class="card border-0 shadow my-5">
            <div class="card-body p-5">
                <h1 class="font-weight-light">Full IT Portfolio</h1>

                <!-- Flash Messages -->
                @if(Session::has('project_updated'))
                    <b><p class="bg-success" align="center">{{session('project_updated')}}</p></b>
                 @endif

                @if(Session::has('project_created'))
                    <b><p class="bg-success" align="center">{{session('project_created')}}</p></b>
                 @endif

                 @if(Session::has('project_deleted'))
                    <b><p class="bg-danger" align="center">{{session('project_deleted')}}</p></b>
                @endif

                <!-- Nav tabs -->
                <ul class="nav nav-tabs" role="tablist">
                    <li role="presentation" class="active"><a href="#active" aria-controls="home" role="tab" data-toggle="tab">Active Projects</a></li>
                    <li role="presentation"><a href="#approvals" aria-controls="approvals" role="tab" data-toggle="tab">Projects to be Authorized</a></li>
                    <li role="presentation"><a href="#planned" aria-controls="closed" role="tab" data-toggle="tab">Planned Projects</a></li>
                    <li role="presentation"><a href="#closed" aria-controls="closed" role="tab" data-toggle="tab">Closed Projects</a></li>
                </ul>

                <!-- Tab panes -->
                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane active" id="active">
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
                                        @if ($project->approval_status == 1)
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
                    </div>


                    <div role="tabpanel" class="tab-pane" id="approvals">
                        <table>
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th scope="col">Project ID</th>
                                    <th scope="col">Project Name</th>
                                    <th scope="col">Description</th>
                                    <th scope="col">Strategic Driver</th>
                                    <th scope="col">Business Department</th>
                                    <th scope="col">Requested By</th>
                                    <th scope="col">Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @if ($projects)
                                    @foreach($projects as $project)
                                        @if ($project->approval_status == 0)
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
                                                    {!! Form::open(['method'=>'PATCH', 'action'=>['AdminProjectsController@update', $project->id]]) !!}
                                                    <input type="hidden" name="approval_status" value="1">
                                                    <div class="form-group">
                                                        {!! Form::submit('Approve', ['class'=>'btn btn-success col-sm-8']) !!}
                                                    </div>
                                                    {!! Form::close() !!} </td>
                                                @endif
                                            </tr>
                                            @endforeach
                                        @endif
                                </tbody>
                            </table>
                        </table>
                    </div>
                    <div role="tabpanel" class="tab-pane" id="closed">...</div>
                </div>
            </div>
        </div>
    </div>
@stop

    {{--<table>
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

<script src="js/jquery.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="js/bootstrap.min.js"></script> --}}