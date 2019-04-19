@extends('layouts.app')

@section('content')

    <!-- White Container in Page -->
    <div class="container">
        <div class="card border-0 shadow my-5">
            <div class="card-body p-5">

                <h1 class="font-weight-light">Edit Department: {{$department->name}}</h1><br>

                {{-- Form to update Department --}}
                {!! Form::model($department, ['method'=>'PATCH', 'action'=>['AdminDepartmentsController@update' , $department->id]]) !!}

                {{-- Name field --}}
                <div class="form-group">
                    {!! Form::label('name', 'Department Name:') !!}
                    {!! Form::text('name', null, ['class'=>'form-control']) !!}
                </div>

                {{-- Update Department Manager, displays current manager --}}
                <div class="form-group">
                    {!! Form::label('user_id', 'Department Manager:') !!}
                    {!! Form::select('user_id', ['' => ''] + $users, null, ['class'=>'form-control', 'style'=>'height: 30px;']) !!}
                </div>

                <div class="form-group" align="center">
                    {!! Form::submit('Update', ['class'=>'btn btn-primary']) !!}
                </div>

                {!! Form::close() !!}

            </div>
        </div>
    </div>

@stop