@extends('layouts.app')

@section('content')

    <!-- White Container in Page -->
    <div class="container">
        <div class="card border-0 shadow my-5">
            <div class="card-body p-5">


                    <div class="row">
                        <div class="col">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Users</h4>
                                    <h6 class="card-subtitle mb-2 text-muted">.............................................................................................................................................................................................................................................................</h6>
                                    <p class="card-text">Use the links below to manage users within the application</p>
                                    <a href="{{route('admin.users.create')}}" class="card-link">Create New User</a>
                                    <a href="{{route('admin.users.index')}}" class="card-link">View Users</a>
                                </div>
                            </div>
                        </div>
                    </div>

                <div class="row">
                    <div class="col">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Departments</h4>
                                <h6 class="card-subtitle mb-2 text-muted">.............................................................................................................................................................................................................................................................</h6>
                                <p class="card-text">Use the links below to manage business departments within the application</p>
                                <a href="{{route('admin.departments.index')}}" class="card-link">View Departments</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Strategic Drivers</h4>
                                <h6 class="card-subtitle mb-2 text-muted">.............................................................................................................................................................................................................................................................</h6>
                                <p class="card-text">Use the links below to manage project strategic drivers within the application</p>
                                <a href="{{route('admin.drivers.index')}}" class="card-link">View Strategic Drivers</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">RAG Statuses</h4>
                                <h6 class="card-subtitle mb-2 text-muted">.............................................................................................................................................................................................................................................................</h6>
                                <p class="card-text">Use the links below to manage project RAG statuses drivers within the application</p>
                                <a href="{{route('admin.rags.index')}}" class="card-link">View RAG Statuses</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Project Statuses</h4>
                                <h6 class="card-subtitle mb-2 text-muted">.............................................................................................................................................................................................................................................................</h6>
                                <p class="card-text">Use the link below to manage project statuses within the application</p>
                                <a href="{{route('admin.status.index')}}" class="card-link">View Project Statuses</a>
                            </div>
                        </div>
                    </div>
                </div>





            </div>
        </div>
    </div>



@stop