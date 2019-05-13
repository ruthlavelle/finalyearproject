@extends('layouts.app')

@section('content')

    <!-- Page Content -->
    <div class="container">
        <div class="card border-0 shadow my-5">
            <div class="card-body p-5">
                <h1 class="font-weight-light">My Projects</h1>

                <p class="lead" align="justify" >

                <table>
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th scope="col">Name</th>
                            <th class="text-center" scope="col">RAG Status</th>
                            <th class="text-center" scope="col">Spend to Date</th>
                            <th class="text-center" scope="col">Approval Status</th>
                            <th class="text-center" scope="col">Expected Completion Date</th>
                            <th class="text-center" scope="col">Options</th>

                        </tr>
                        </thead>

                        <tbody>

                        @if ($project)

                            @foreach($project as $project)

                                @if ($project->approval_status != 0)

                                    <tr>
                                        <td>{{$project->name}}</td>
                                        <td align="center">@if($project->RAG_id == 1)
                                                <img class="img-fluid-2" src="/images/RedSquare.jpg" alt="">
                                            @elseif($project->RAG_id == 2)
                                                <img class="img-fluid-2" src="/images/AmberSquare.jpg" alt="">
                                            @elseif($project->RAG_id == 3)
                                                <img class="img-fluid-2" src="/images/GreenSquare.jpg" alt="">
                                            @else
                                                Not Specified
                                            @endif
                                        </td>
                                        <td align="center">€{{$project->spend}}</td>
                                        <td align="center">{{$project->status->name or 'Not Specified'}}</td>
                                        <td align="center">
                                            @if ($project->status_id == 1)
                                                {{$project->due_date->format('d-m-Y')}}
                                            @elseif($project->status_id == 4)
                                                Rejected
                                            @else
                                                TBC when active
                                            @endif
                                        </td>
                                        <td align="center">
                                            @if ($project->status_id == 1)
                                                <a href ="{{route('home.project', $project->id)}}" class="btn btn-default col-sm-10">Visit Workspace</a>
                                            @else
                                                No options currently available
                                            @endif
                                        </td>
                                        @endif
                                    </tr>
                                    @endforeach
                                @endif
                        </tbody>
                    </table>
                </table>
                </p>

                <div style="height: 0px"></div>
            </div>
        </div>
    </div>

@endsection
