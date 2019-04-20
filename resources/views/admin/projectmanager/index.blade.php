@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="card border-0 shadow my-5">
            <div class="card-body p-5">

                <h1 class="font-weight-light">Project Managers</h1><br>

                <div class="col-md-5">

                {!! Form::open(['method'=>'POST', 'action'=>'AdminProjectManagerController@store']) !!}

                <div class="form-group">
                    {!! Form::label('user_id', 'Create a Project Manager:') !!}
                    {!! Form::select('user_id', ['' => 'Choose Project Manager'] + $users, null, ['class'=>'form-control', 'style'=>'height: 30px;']) !!}
                </div>

                <div class="form-group">
                    {!! Form::submit('Create a Project Manager', ['class'=>'btn btn-primary']) !!}
                </div>

                {!! Form::close() !!}

                </div>


                <div class="col-md-7">

                    <table class="table table-border">
                        @if ($project_managers)
                            <thead>
                            <tr>
                                <th scope="col">PM ID</th>
                                <th scope="col">PM Name</th>
                                <th class="text-center" scope="col">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($project_managers as $project_manager)
                                <tr>
                                    <td>{{$project_manager->id}}</td>
                                    <td>{{$project_manager->user->name}}</td>
                                    <td align="center">
                                        {!! Form::open(['method'=>'DELETE', 'action' => ['AdminProjectManagerController@destroy', $project_manager->id ]]) !!}
                                        {!! Form::submit('Delete', ['class'=>'btn btn-danger col-sm-12']) !!}
                                        {!! Form::close() !!}
                                    </td>
                </tr>
            @endforeach

            </tbody>
    </table>

    @endif


    </div>

            </div>
        </div>
    </div>



@stop