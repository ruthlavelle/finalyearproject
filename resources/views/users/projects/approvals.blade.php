@extends('layouts.app')

@section('content')

    <!-- Page Content -->
    <div class="container">
        <div class="card border-0 shadow my-5">
            <div class="card-body p-5">
                <h1 class="font-weight-light">My Active</h1>

                <p class="lead" align="justify" >

                <table>
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th scope="col">Project ID</th>
                            <th scope="col">Project Name</th>
                            <th scope="col">Requested By</th>
                            <th scope="col">Days Since Creation</th>
                            <th scope="col">Approval Status</th>

                        </tr>
                        </thead>

                        <tbody>

                        @if ($project)

                            @foreach($project as $project)

                                @if ($project->approval_status == 0)

                                    <tr>
                                        <td>{{$project->id}}</td>
                                        <td>{{$project->name}}</td>
                                        <td>{{$project->user->name}}</td>
                                        <td>{{$project->created_at->diffForHumans()}}
                                        <td>Awaiting Approval</td>

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
