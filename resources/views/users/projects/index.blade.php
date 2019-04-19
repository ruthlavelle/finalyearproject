@extends('layouts.app')

@section('content')

    <!-- Page Content -->
    <div class="container">
        <div class="card border-0 shadow my-5">
            <div class="card-body p-5">
                <h1 class="font-weight-light">My Active Projects</h1>

                <p class="lead" align="justify" >

                <table>
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th scope="col">Name</th>
                            <th scope="col">RAG Status</th>
                            <th scope="col">Spend to Date</th>
                            <th scope="col">Stage</th>
                            <th scope="col">Expected Completion Date</th>
                            <th scope="col">Options</th>

                        </tr>
                        </thead>

                        <tbody>

                        @if ($project)

                            @foreach($project as $project)

                                @if ($project->approval_status == 1)

                                    <tr>
                                        <td>{{$project->name}}</td>
                                        <td>{{$project->RAG_id}}</td>
                                        <td>{{$project->spend}}</td>
                                        <td>{{$project->stage_id}}</td>
                                        <td>{{$project->due_date}}</td>
                                        <td><a href ="{{route('home.project', $project->id)}}" class="btn btn-default col-sm-10">Visit Workspace</a>
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
