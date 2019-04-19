@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="card border-0 shadow my-5">
            <div class="card-body p-5">
                <h1 class="font-weight-light">RAG Statuses</h1><br>

                <div class="col-md-4">

                    {{-- Form to create a new department in DB --}}
                    {!! Form::open(['method'=>'POST', 'action'=>'AdminRAGsController@store']) !!}

                    <div class="form-group">
                        {!! Form::label('name', 'RAG Name:') !!}
                        {!! Form::text('name', null, ['class'=>'form-control']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::submit('Create RAG Status', ['class'=>'btn btn-primary']) !!}
                    </div>

                    {!! Form::close() !!}
                </div>

                <div class="col-md-8">
                    {{-- Table to display Strategic Drivers from DB --}}
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th class="text-center" scope="col">ID</th>
                            <th scope="col">Name</th>
                            <th class="text-center" scope="col">Actions</th>
                        </tr>
                        </thead>

                        <tbody>
                        @if ($rags)
                            @foreach($rags as $rag)
                                <tr>
                                    <td align="center">{{$rag->id}}</td>
                                    <td>{{$rag->name}}</td>
                                    <td><a href="{{route('admin.rags.edit', $rag->id)}}" class="btn btn-primary col-sm-6">Edit</a>
                                        {!! Form::open(['method'=>'DELETE', 'action' => ['AdminRAGsController@destroy', $rag->id ]]) !!}
                                        {!! Form::submit('Delete', ['class'=>'btn btn-danger col-sm-6']) !!}
                                        {!! Form::close() !!} </td>
                                </tr>
                            @endforeach
                        @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@stop
