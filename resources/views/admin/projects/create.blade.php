@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="card border-0 shadow my-5">
            <div class="card-body p-5">
                <h1 class="font-weight-light">New Project Request</h1>

                {{--Form to request a new project in the Admin Page --}}
                {!! Form::open(['method'=>'POST', 'action'=>'AdminProjectsController@store']) !!}

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
                    {!! Form::select('driver_id', ['' => ''] + $drivers, null, ['class'=>'form-control', 'style'=>'height: 30px;']) !!}
                 </div>

                {{--Department ID Field - can select from department_id table--}}
                <div class="form-group">
                    {!! Form::label('department_id', 'Business Department:') !!}
                    {!! Form::select('department_id', ['' => ''] + $departments, null, ['class'=>'form-control', 'style'=>'height: 30px;']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('due_date', 'Expected Delivery Date:') !!}
                    {!! Form::date('due_date', null, ['class'=>'form-control']) !!}
                </div>

                {{--Submit button--}}
                <div class="form-group" align="center">
                    {!! Form::submit('Submit Request', ['class'=>'btn btn-success']) !!}
                </div>

                {!! Form::close() !!}

                {{--Display form error to the user if there is one. Code is pulled from Views/includes/form_error--}}
                @include('includes.form_error')

                <div style="height: 0px"></div>
            </div>
        </div>
    </div>

@stop

