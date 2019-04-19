@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="card border-0 shadow my-5">
            <div class="card-body p-5">

                <h1 class="font-weight-light">Project Statuses</h1><br>

                <div class="col-md-4">
                    {{-- Form to create a new department in DB --}}
                    {!! Form::open(['method'=>'POST', 'action'=>'AdminStatusController@store']) !!}

                    {{--Name field which is displayed empty--}}
                    <div class="form-group">
                        {!! Form::label('name', 'Project Status Name:') !!}
                        {!! Form::text('name', null, ['class'=>'form-control']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::submit('Create Project Status', ['class'=>'btn btn-primary']) !!}
                    </div>

                    {!! Form::close() !!}

                </div>

                <div class="col-md-8">

                    {{-- Table to display Departments from DB --}}
                    <table class="table table-bordered">
                        @if ($status)

                            <thead>
                            <tr>
                                <th class="text-center" scope="col">ID</th>
                                <th scope="col">Name</th>
                                <th class="text-center" scope="col">Actions</th>
                            </tr>
                            </thead>

                            <tbody>

                            {{-- List out depts from the DB --}}
                            @foreach($status as $status)

                                <tr>
                                    <td align="center">{{$status->id}}</td>
                                    <td>{{$status->name}}</td>
                                    <td align="center"><a href="{{route('admin.status.edit', $status->id)}}" class="btn btn-primary col-sm-5">Edit</a>
                                        {!! Form::open(['method'=>'DELETE', 'action' => ['AdminStatusController@destroy', $status->id ]]) !!}
                                        {!! Form::submit('Delete', ['class'=>'btn btn-danger col-sm-5']) !!}
                                        {!! Form::close() !!} </td>
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