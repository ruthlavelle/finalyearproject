@extends('layouts.app')

@section('content')

    <!-- White Container in Page -->
    <div class="container">
        <div class="card border-0 shadow my-5">
            <div class="card-body p-5">


                <h1 class="font-weight-light">Create a New User</h1>

                {{--Form to create new users in Admin Page --}}
                {!! Form::open(['method'=>'POST', 'action'=>'AdminUsersController@store']) !!}

                {{--Name field which is displayed empty--}}
                <div class="form-group">
                    {!! Form::label('name', 'Name:') !!}
                    {!! Form::text('name', null, ['class'=>'form-control']) !!}
                </div>

                {{--Email field which is displayed empty--}}
                <div class="form-group">
                    {!! Form::label('email', 'Email Address:') !!}
                    {!! Form::email('email', null, ['class'=>'form-control']) !!}
                </div>

                {{--Role of user - pulls roles from role table in the database--}}
                <div class="form-group">
                    {!! Form::label('role_id', 'Role:') !!}
                    {!! Form::select('role_id', [''=> ''] + $roles, null, ['class'=>'form-control', 'style'=>'height: 30px;']) !!}
                </div>

                {{--Password field --}}
                <div class="form-group">
                    {!! Form::label('password', 'Password:') !!}
                    {!! Form::password('password', ['class'=>'form-control']) !!}
                </div>

                {{--Submit button--}}
                <div class="form-group" align="center">
                    {!! Form::submit('Create User', ['class'=>'btn btn-primary']) !!}
                </div>

    {!! Form::close() !!}

    {{--Display form error to the user if there is one. Code is pulled from Views/includes/form_error--}}
    @include('includes.form_error')

@stop

