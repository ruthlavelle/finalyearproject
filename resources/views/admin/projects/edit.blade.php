@extends('layouts.app')


@section('content')
    {{--Form to create a new project in the Admin Page --}}
    <div class="container">
        <div class="card border-0 shadow my-5">
            <div class="card-body p-5">

                <h1 class="font-weight-light">Edit Project: {{$project->name}}</h1><br>

    <div class="row">

        <div class="col-sm-6">

        {!! Form::model($project, ['method'=>'PATCH', 'action'=>['AdminProjectsController@update', $project->id]]) !!}

        {{--Name field which is displayed empty--}}
        <div class="form-group">
            {!! Form::label('name', 'Project Name:') !!}
            {!! Form::text('name', null, ['class'=>'form-control']) !!}
        </div>

        {{--Description field which is displayed empty--}}
        <div class="form-group">
            {!! Form::label('description', 'Project Description:') !!}
            {!! Form::textarea('description', null, ['class'=>'form-control', 'rows'=>3]) !!}
        </div>

        {{--Project Cost Field--}}
        <div class="form-group">
            {!! Form::label('cost', 'Project Cost:') !!}
            {!! Form::text('cost', null, ['class'=>'form-control']) !!}
        </div>

        {{--Project Benefits Field--}}
        <div class="form-group">
            {!! Form::label('benefits', 'Project Benefits:') !!}
            {!! Form::textarea('benefits', null, ['class'=>'form-control', 'rows'=>3]) !!}
        </div>

        {{--Return on Investment Field --}}
        <div class="form-group">
            {!! Form::label('ROI', 'Expected Return on Investment:') !!}
            {!! Form::text('ROI',null, ['class'=>'form-control']) !!}
        </div>

        {{--Strategic Driver Field - can select from Strategic Driver Table--}}
        <div class="form-group">
            {!! Form::label('driver_id', 'Strategic Driver:') !!}
            {!! Form::select('driver_id', ['' => 'Choose a Strategic Driver'] + $drivers, null, ['class'=>'form-control', 'style'=>'height: 30px;']) !!}
        </div>

        {{--Department ID Field - can select from department_id table--}}
        <div class="form-group">
            {!! Form::label('department_id', 'Business Department:') !!}
            {!! Form::select('department_id', ['' => 'Choose a Department'] + $departments, null, ['class'=>'form-control', 'style'=>'height: 30px;']) !!}
        </div>

        </div>

        <div class="col-sm-6">

        <div class="form-group">
            {!! Form::label('RAG_id', 'RAG Status:') !!}
            {!! Form::select('RAG_id', ['' => 'RAG Status'] + $rags, null, ['class'=>'form-control', 'style'=>'height: 30px;']) !!}
        </div>


            <div class="form-group">
                {!! Form::label('PM_id', 'Project Manager:') !!}
                {!! Form::select('PM_id', ['' => 'Choose a PM'] + $pms, null, ['class'=>'form-control', 'style'=>'height: 30px;']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('spend', 'Spend to Date:') !!}
                {!! Form::text('spend',null, ['class'=>'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('due_date', 'Current Delivery Date:') !!}
                {!! Form::date('due_date', null, ['class'=>'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('status_id', 'Project Status:') !!}
                {!! Form::select('status_id', ['' => 'Status'] + $statuses, null, ['class'=>'form-control', 'style'=>'height: 30px;']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('closure_date', 'Closure Date:') !!}
                {!! Form::date('closure_date', null, ['class'=>'form-control']) !!}
            </div>



        </div>

    </div>

    {{--Submit button--}}
    <div class="form-group">
        {!! Form::submit('Update', ['class'=>'btn btn-primary', 'align'=>'center']) !!}
    </div>

    {!! Form::close() !!}

    {{--Display form error to the user if there is one. Code is pulled from Views/includes/form_error--}}
    @include('includes.form_error')

            </div>
        </div>
    </div>

    @stop
