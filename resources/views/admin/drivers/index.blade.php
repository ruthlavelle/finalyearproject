@extends('layouts.admin')

@section('content')

    <h1 align="center">Drivers</h1>
    <br>

        {!! Form::open(['method'=>'POST', 'action'=>'AdminDriversController@store']) !!}

        <div class="form-group">
            {!! Form::label('name', 'Strategic Driver Name:') !!}
            {!! Form::text('name', null, ['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::submit('Create Strategic Driver', ['class'=>'btn-btn-primary']) !!}
        </div>

        {!! Form::close() !!}

    <br><br>

        <table class="table table-hover">
            <thead>
            <tr>
                <th scope="col">Strategic Driver ID</th>
                <th scope="col">Strategic Driver Name</th>
            </tr>
            </thead>

            <tbody>

            @if ($drivers)

                @foreach($drivers as $driver)

                    <tr>
                        <td>{{$driver->id}}</td>
                        <td>{{$driver->name}}</td>
                        <td><a href="{{route('admin.drivers.edit', $driver->id)}}" class="btn btn-success col-sm-12">Edit</a>
                            {!! Form::open(['method'=>'DELETE', 'action' => ['AdminDriversController@destroy', $driver->id ]]) !!}
                            {!! Form::submit('Delete', ['class'=>'btn btn-danger col-sm-12']) !!}
                            {!! Form::close() !!} </td>
                    </tr>
                @endforeach
            @endif

            </tbody>
        </table>

@stop