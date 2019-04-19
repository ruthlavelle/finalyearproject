@extends('layouts.app')

@section('content')

    <!-- White Container in Page -->
    <div class="container">
        <div class="card border-0 shadow my-5">
            <div class="card-body p-5">

                <h1 class="font-weight-light">Edit RAG Status: {{$rag->name}}</h1><br>

                {{-- Form to update Department --}}
                {!! Form::model($rag, ['method'=>'PATCH', 'action'=>['AdminRAGsController@update' , $rag->id]]) !!}

                {{-- Name field --}}
                <div class="form-group">
                    {!! Form::label('name', 'Strategic Driver Name:') !!}
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