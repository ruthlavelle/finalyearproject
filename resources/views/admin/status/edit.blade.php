@extends('layouts.app')

@section('content')

    <!-- White Container in Page -->
    <div class="container">
        <div class="card border-0 shadow my-5">
            <div class="card-body p-5">

                <h1 class="font-weight-light">Edit Status: {{$status->name}}</h1><br>

                {{-- Form to update Status --}}
                {!! Form::model($status, ['method'=>'PATCH', 'action'=>['AdminStatusController@update' , $status->id]]) !!}

                {{-- Name field --}}
                <div class="form-group">
                    {!! Form::label('name', 'Status Name:') !!}
                    {!! Form::text('name', null, ['class'=>'form-control']) !!}
                </div>


                <div class="form-group" align="center">
                    {!! Form::submit('Update', ['class'=>'btn btn-primary']) !!}
                </div>

                {!! Form::close() !!}

            </div>
        </div>
    </div>
@stop