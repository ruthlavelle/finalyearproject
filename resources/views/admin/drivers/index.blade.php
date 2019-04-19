@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="card border-0 shadow my-5">
            <div class="card-body p-5">
                <h1 class="font-weight-light">Strategic Drivers</h1><br>

                <div class="col-md-4">

                    {{-- Form to create a new driver in DB --}}
                    {!! Form::open(['method'=>'POST', 'action'=>'AdminDriversController@store']) !!}

                    <div class="form-group">
                        {!! Form::label('name', 'Strategic Driver Name:') !!}
                        {!! Form::text('name', null, ['class'=>'form-control']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::submit('Create Strategic Driver', ['class'=>'btn btn-primary']) !!}
                    </div>

                    {!! Form::close() !!}
                </div>

                <div class="col-md-8">
                    {{-- Table to display Strategic Drivers from DB --}}
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th class="text-center" scope="col">ID</th>
                                <th scope="col">Name</th>
                                <th class="text-center" scope="col">Actions</th>
                            </tr>
                        </thead>

                        <tbody>
                        @if ($drivers)
                            @foreach($drivers as $driver)
                                <tr>
                                    <td align="center">{{$driver->id}}</td>
                                    <td>{{$driver->name}}</td>
                                    <td><a href="{{route('admin.drivers.edit', $driver->id)}}" class="btn btn-primary col-sm-6">Edit</a>
                                        {!! Form::open(['method'=>'DELETE', 'action' => ['AdminDriversController@destroy', $driver->id ]]) !!}
                                        {!! Form::submit('Delete', ['class'=>'btn btn-danger col-sm-6']) !!}
                                        {!! Form::close() !!} </td>
                                </tr>
                            @endforeach
                        @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@stop
