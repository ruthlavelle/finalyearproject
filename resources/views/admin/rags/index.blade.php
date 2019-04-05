@extends('layouts.admin')

@section('content')

    <h1 align="center">RAG Statuses</h1>
    <br>

        {!! Form::open(['method'=>'POST', 'action'=>'AdminRAGsController@store']) !!}

        <div class="form-group">
            {!! Form::label('name', 'RAG Name:') !!}
            {!! Form::text('name', null, ['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::submit('Create RAG Status', ['class'=>'btn-btn-primary']) !!}
        </div>

        {!! Form::close() !!}

    <br><br>

        <table class="table table-hover">

            <thead>
            <tr>
                <th scope="col">RAG Status ID</th>
                <th scope="col">RAG Status Name</th>
            </tr>
            </thead>

            <tbody>

            @if ($rags)

                @foreach($rags as $rag)

                    <tr>
                        <td>{{$rag->id}}</td>
                        <td>{{$rag->name}}</td>
                        <td><a href="{{route('admin.rags.edit', $rag->id)}}" class="btn btn-success col-sm-12">Edit</a>
                                {!! Form::open(['method'=>'DELETE', 'action' => ['AdminRAGsController@destroy', $rag->id ]]) !!}
                                {!! Form::submit('Delete', ['class'=>'btn btn-danger col-sm-12']) !!}
                                {!! Form::close() !!} </td>
                    </tr>
                @endforeach
            @endif

            </tbody>
        </table>

@stop