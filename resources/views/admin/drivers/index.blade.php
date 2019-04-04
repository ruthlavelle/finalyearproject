@extends('layouts.admin')

@section('content')

    <h1>Drivers</h1>

    <div class="col-sm-6">

        {!! Form::open(['method'=>'POST', 'action'=>'AdminDriversController@store']) !!}

        {{--Name field which is displayed empty--}}
        <div class="form-group">
            {!! Form::label('name', 'Strategic Driver Name:') !!}
            {!! Form::text('name', null, ['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::submit('Create Strategic Driver', ['class'=>'btn-btn-primary']) !!}
        </div>

        {!! Form::close() !!}

    </div>

    <div class="col-sm-6">

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
                        {{--}}<td><a href="{{route('admin.projects.edit', $project->id)}}" class="btn btn-success col-sm-12">Update</a>
                            {!! Form::open(['method'=>'DELETE', 'action' => ['AdminProjectsController@destroy', $project->id ]]) !!}
                            {!! Form::submit('Delete', ['class'=>'btn btn-danger col-sm-12']) !!}
                            {!! Form::close() !!} </td>--}}
                    </tr>
                @endforeach
            @endif

            </tbody>
        </table>


    </div>

@stop