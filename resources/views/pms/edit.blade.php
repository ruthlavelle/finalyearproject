@extends('layouts.app')


@section('content')
    {{--Form to create a new project in the Admin Page --}}
    <div class="container">
        <div class="card border-0 shadow my-5">
            <div class="card-body p-5">

                <h1 class="font-weight-light"><b>{{$project->name}}</b><br>
                    <i>Project Manager:</i> {{$project->project_manager}}</h1><br>


    <div class="row">

        <div class="col-sm-6">

        {{--Name field which is displayed empty--}}
        <div class="form-group">
            <b>Project Name:</b><br> {{$project->name}}
        </div>

        {{--Description field which is displayed empty--}}
        <div class="form-group">
            <b>Project Description:</b><br> {{$project->description}}
        </div>

        {{--Project Benefits Field--}}
        <div class="form-group">
            <b>Project Benefits:</b><br> {{$project->benefits}}
        </div>

        {{--Strategic Driver Field - can select from Strategic Driver Table--}}
        <div class="form-group">
            <b>Strategic Driver:</b><br> {{$project->driver->name}}
        </div>

        {{--Department ID Field - can select from department_id table--}}
        <div class="form-group">
            <b>Business Department:</b><br> {{$project->department->name}}
        </div>

        </div>

        <div class="col-sm-6">

            {!! Form::model($project, ['method'=>'PATCH', 'action'=>['PMProjectsController@update', $project->id]]) !!}

        <div class="form-group">
            {!! Form::label('RAG_id', 'RAG Status:') !!}
            {!! Form::select('RAG_id', ['' => 'RAG Status'] + $rags, null, ['class'=>'form-control', 'style'=>'height: 30px;']) !!}
        </div>


            <div class="form-group">
                {!! Form::label('cost', 'Project Budget:') !!}
                {!! Form::text('cost', null, ['class'=>'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('spend', 'Spend to Date:') !!}
                {!! Form::text('spend',null, ['class'=>'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('ROI', 'Expected Return on Investment:') !!}
                {!! Form::text('ROI',null, ['class'=>'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('due_date', 'Current Delivery Date:') !!}
                {!! Form::date('due_date', (isset($project) && $project->due_date ? $project->due_date : date('Y-m-d')), ['class'=>'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('status_id', 'Project Status:') !!}
                {!! Form::select('status_id', ['' => 'Status'] + $statuses, null, ['class'=>'form-control', 'style'=>'height: 30px;']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('closure_date', 'Closure Date:') !!}
                {!! Form::date('closure_date', null, ['class'=>'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::submit('Update', ['class'=>'btn btn-primary', 'align'=>'center']) !!}
            </div>

            {!! Form::close() !!}


        </div>

    </div>

    {{--Submit button--}}


    {{--Display form error to the user if there is one. Code is pulled from Views/includes/form_error--}}
    @include('includes.form_error')

            </div>
        </div>
    </div>

    @stop
