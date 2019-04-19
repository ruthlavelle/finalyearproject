@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="card border-0 shadow my-5">
            <div class="card-body p-5">

                <h1 class="font-weight-light">Edit User: {{$user->name}}</h1>

                {{--Display form to update details, will pass in users details--}}
                {!! Form::model($user, ['method'=>'PATCH', 'action'=>['AdminUsersController@update', $user->id]]) !!}

                {{--Name field--}}
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
                    {!! Form::select('role_id', $roles, null, ['class'=>'form-control', 'style'=>'height: 30px;']) !!}
                </div>

                {{--Password field --}}
                <div class="form-group">
                    {!! Form::label('password', 'Password:') !!}
                    {!! Form::password('password', ['class'=>'form-control']) !!}
                </div>

                {{-- Activate or deactive user --}}
                <div class="form-group">
                    {!! Form::label('is_active', 'Status:') !!}
                    {!! Form::select('is_active', array(0 => 'Inactive', 1 => 'Active'), null, ['class'=>'form-control' , 'style'=>'height: 30px;']) !!}
                </div>

                {{--Submit button--}}
                <div class="form-group" align="center">
                    {!! Form::submit('Update', ['class'=>'btn btn-primary']) !!}
                </div>

    {!! Form::close() !!}

    {{--Display form error to the user if there is one. Code is pulled from Views/includes/form_error--}}
    @include('includes.form_error')

            </div>
        </div>
    </div>
@stop

