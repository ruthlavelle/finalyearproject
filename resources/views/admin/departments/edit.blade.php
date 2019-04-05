@extends('layouts.admin')

@section('content')

    <<h2 align="center">Departments</h2>
    <br>

    {!! Form::model($department, ['method'=>'PATCH', 'action'=>['AdminDepartmentsController@update' , $department->id]]) !!}

    {{--Name field which is displayed empty--}}
    <div class="form-group">
        {!! Form::label('name', 'Department Name:') !!}
        {!! Form::text('name', null, ['class'=>'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('user_id', 'Department Manager:') !!}
        {!! Form::select('user_id', ['' => 'Choose Department Manager'] + $users, null, ['class'=>'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::submit('Update', ['class'=>'btn-btn-primary']) !!}
    </div>

    {!! Form::close() !!}

@stop