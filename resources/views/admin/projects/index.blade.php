@extends('layouts.app')


@section('content')

    <div class="container">
        <div class="card border-0 shadow my-5">
            <div class="card-body p-5">
                <h1 class="font-weight-light">Full IT Portfolio</h1>

                <!-- Nav tabs -->
                <ul class="nav nav-tabs">
                    <li class="active"><a data-toggle="tab" href="#active">Active Projects</a></li>
                    <li><a data-toggle="tab" href="#approvals">Projects to be Authorized</a></li>
                    <li><a data-toggle="tab" href="#planned">Planned Projects</a></li>
                    <li><a data-toggle="tab" href="#rejected">Rejected Projects</a></li>
                    <li><a data-toggle="tab" href="#closed">Closed Projects</a></li>
                    <li><a data-toggle="tab" href="#all">All Projects</a></li>
                </ul>

                <!-- Tab panes -->
                <div class="tab-content">

                    <div id="active" class="tab-pane active" >
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th class="text-center" scope="col">ID</th>
                                <th class="text-center" scope="col">Name</th>
                                <th class="text-center" scope="col">RAG Status</th>
                                <th class="text-center" scope="col">Project Manager</th>
                                <th class="text-center" scope="col">Due Date</th>
                                <th class="text-center" scope="col">Spend to Date</th>

                                <th class="text-center" scope="col">Actions</th>
                            </tr>
                            </thead>

                            <tbody>
                            @if($projects)
                                @foreach($projects as $project)
                                    <tr>
                                        @if($project->approval_status == 1 && $project->status_id == 1)
                                            <td align="center">{{$project->id}}</td>
                                            <td align="center">{{$project->name}}</td>
                                            <td align="center">@if($project->RAG_id == 1)
                                                    <img class="img-fluid-2" src="/images/RedSquare.jpg" alt="">
                                                @elseif($project->RAG_id == 2)
                                                    <img class="img-fluid-2" src="/images/AmberSquare.jpg" alt="">
                                                @elseif($project->RAG_id == 3)
                                                    <img class="img-fluid-2" src="/images/GreenSquare.jpg" alt="">
                                                @else
                                                    Not Specified
                                                @endif
                                            <td align="center">{{$project->pms->name or "No PM Assigned"}} </td>
                                            <td align="center">{{$project->due_date->format('d-m-Y') }}</td>
                                            <td align="center">€{{$project->spend or "0"}}</td>

                                            <td align="center">
                                                <a href ="{{route('home.project', $project->id)}}" class="btn btn-primary col-sm-5">View</a>
                                                <a href="{{route('admin.projects.edit', $project->id)}}" class="btn btn-info col-sm-5">Update</a>
                                        @endif
                                    </tr>
                                @endforeach
                            @endif
                            </tbody>
                        </table>

                    </div>


                    <div id="approvals" class="tab-pane approvals" >
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th scope="col">Name</th>
                                <th scope="col">Description</th>
                                <th scope="col">Cost</th>
                                <th scope="col">Benefits</th>
                                <th scope="col">Driver</th>
                                <th scope="col">ROI</th>
                                <th scope="col">Dept</th>
                                <th scope="col">Expected Delivery</th>
                                <th scope="col">Actions</th>
                            </tr>
                            </thead>

                            <tbody>
                            @if($projects)
                                @foreach($projects as $project)
                                    <tr>
                                        @if($project->approval_status == 0)
                                            <td>{{$project->name}}</td>
                                            <td>{{$project->description}}</td>
                                            <td>€{{$project->cost}}</td>
                                            <td>{{$project->benefits}}</td>
                                            <td>{{$project->driver ? $project->driver->name: "Strategic Driver not assigned"}}</td>
                                            <td>{{$project->ROI}}</td>
                                            <td>{{$project->department ? $project->department->name : "Department not assigned"}}</td>
                                            <td>{{$project->due_date->format('m-Y')}}</td>
                                            <td>
                                                {!! Form::open(['method'=>'PATCH', 'action'=>['AdminProjectsController@update', $project->id]]) !!}
                                                <input type="hidden" name="approval_status" value="1">
                                                <input type="hidden" name="status_id" value="2">
                                                {!! Form::submit('Approve', ['class'=>'btn btn-success col-sm-11']) !!}
                                                {!! Form::close() !!}
                                                {!! Form::open(['method'=>'PATCH', 'action'=>['AdminProjectsController@update', $project->id]]) !!}
                                                <input type="hidden" name="approval_status" value="2">
                                                <input type="hidden" name="status_id" value="4">
                                                {!! Form::submit('Reject', ['class'=>'btn btn-danger col-sm-11']) !!}
                                                {!! Form::close() !!}
                                                </td>
                                        @endif
                                    </tr>
                                @endforeach
                            @endif
                            </tbody>
                        </table>

                    </div>

                    <div id="planned" class="tab-pane planned" >
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th scope="col">Name</th>
                                <th scope="col">Description</th>
                                <th scope="col">Requestor</th>
                                <th scope="col">Dept</th>
                                <th scope="col">Expected Delivery</th>
                                <th scope="col">Actions</th>
                            </tr>
                            </thead>

                            <tbody>
                            @if($projects)
                                @foreach($projects as $project)
                                    <tr>
                                        @if($project->approval_status == 1 && $project->status_id == 2)
                                            <td>{{$project->name}}</td>
                                            <td>{{$project->description}}</td>
                                            <td>{{$project->user->name}}</td>
                                            <td>{{$project->department ? $project->department->name : "Department not assigned"}}</td>
                                            <td>{{$project->due_date->format('m-Y')  }}</td>
                                            <td>
                                                <a href="{{route('admin.projects.edit', $project->id)}}" class="btn btn-info col-sm-12">Update</a>
                                                {!! Form::open(['method'=>'PATCH', 'action'=>['AdminProjectsController@update', $project->id]]) !!}
                                                <input type="hidden" name="status_id" value="1">
                                                {!! Form::submit('Activate', ['class'=>'btn btn-success col-sm-12']) !!}
                                                {!! Form::close() !!}
                                            </td>
                                        @endif
                                    </tr>
                                @endforeach
                            @endif
                            </tbody>
                        </table>

                    </div>

                    <div id="rejected" class="tab-pane rejected" >
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th scope="col">Name</th>
                                <th scope="col">Description</th>
                                <th scope="col">Cost</th>
                                <th scope="col">Benefits</th>
                                <th scope="col">Driver</th>
                                <th scope="col">ROI</th>
                                <th scope="col">Dept</th>
                                <th scope="col">Expected Delivery</th>
                            </tr>
                            </thead>

                            <tbody>
                            @if($projects)
                                @foreach($projects as $project)
                                    <tr>
                                        @if($project->status_id == 4)
                                            <td>{{$project->name}}</td>
                                            <td>{{$project->description}}</td>
                                            <td>€{{$project->cost}}</td>
                                            <td>{{$project->benefits}}</td>
                                            <td>{{$project->driver ? $project->driver->name: "Strategic Driver not assigned"}}</td>
                                            <td>{{$project->ROI}}</td>
                                            <td>{{$project->department ? $project->department->name : "Department not assigned"}}</td>
                                            <td>{{$project->due_date->format('m-Y') }} </td>
                                        @endif
                                    </tr>
                                @endforeach
                            @endif
                            </tbody>
                        </table>

                    </div>

                    <div id="closed" class="tab-pane closed" >
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th scope="col">Name</th>
                                <th scope="col">Total Cost</th>
                                <th scope="col">Department</th>
                                <th scope="col">Date Closed</th>
                                <th scope="col">View Workspace</th>
                            </tr>
                            </thead>

                            <tbody>
                            @if($projects)
                                @foreach($projects as $project)
                                    <tr>
                                        @if($project->status_id == 3)
                                            <td>{{$project->name}}</td>
                                            <td>{{$project->spend}}</td>
                                            <td>{{$project->department ? $project->department->name : "Department not assigned"}}</td>
                                            <td>{{$project->closure_date->format('d-m-Y') }}</td>
                                            <td>
                                                <a href ="{{route('home.project', $project->id)}}" class="btn btn-primary col-sm-11">View</a>
                                            </td>
                                        @endif
                                    </tr>
                                @endforeach
                            @endif
                            </tbody>
                        </table>

                    </div>

                    <div id="all" class="tab-pane all">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th class="text-center" scope="col">ID</th>
                                <th class="text-center" scope="col">Name</th>
                                <th class="text-center" scope="col">Approval Status</th>
                                <th class="text-center" scope="col">Project Status</th>
                                <th class="text-center" scope="col">Actions</th>
                            </tr>
                            </thead>

                            <tbody>
                            @if($projects)
                                @foreach($projects as $project)
                                    <tr>
                                        <td align="center">{{$project->id}}</td>
                                        <td align="center">{{$project->name}}</td>
                                        <td align="center">
                                            @if($project->approval_status == 0)
                                                Awaiting Approval
                                            @elseif($project->approval_status == 1)
                                                Approved
                                            @elseif($project->approval_status == 2)
                                                Rejected
                                            @else
                                                Not Specified
                                            @endif
                                        </td>
                                        <td align="center">
                                            @if($project->status_id == 1)
                                                Active
                                            @elseif($project->status_id == 2)
                                                Planned
                                            @elseif($project->status_id == 3)
                                                Closed
                                            @elseif($project->status_id == 4)
                                                Rejected
                                            @else
                                                Not Specified
                                            @endif
                                        </td>
                                        <td align="center">
                                            <a href ="{{route('home.project', $project->id)}}" class="btn btn-primary col-sm-5">View</a>
                                            <a href="{{route('admin.projects.edit', $project->id)}}" class="btn btn-info col-sm-5">Edit</a>
                                    </tr>
                                @endforeach
                            @endif
                            </tbody>
                        </table>

                    </div>


                </div>
            </div>
        </div>
    </div>

    @stop
