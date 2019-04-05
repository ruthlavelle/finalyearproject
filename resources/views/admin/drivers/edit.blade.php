@extends('layouts.admin')

@section('content')

    <h1 align="center">Drivers</h1>
    <br>

    {!! Form::model($driver, ['method'=>'PATCH', 'action'=>['AdminDriversController@update', $driver->id]]) !!}

    {{--Name field which is displayed empty--}}
    <div class="form-group">
        {!! Form::label('name', 'Strategic Driver Name:') !!}
        {!! Form::text('name', null, ['class'=>'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::submit('Update', ['class'=>'btn-btn-primary']) !!}
    </div>

    {!! Form::close() !!}


@stop