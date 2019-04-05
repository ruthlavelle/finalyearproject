@extends('layouts.admin')

@section('content')

    <h1 align="center">RAG Statuses</h1>
    <br>

    {!! Form::model($rag, ['method'=>'PATCH', 'action'=>['AdminRAGsController@update', $rag->id]]) !!}

    {{--Name field which is displayed empty--}}
    <div class="form-group">
        {!! Form::label('name', 'RAG Name:') !!}
        {!! Form::text('name', null, ['class'=>'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::submit('Update', ['class'=>'btn-btn-primary']) !!}
    </div>

    {!! Form::close() !!}


@stop