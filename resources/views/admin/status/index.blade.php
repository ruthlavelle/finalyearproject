@extends('layouts.admin')

@section('content')

    <h2 align="center">Project Statuses</h2>
    <br>

    {!! Form::open(['method'=>'POST', 'action'=>'AdminStatusController@store']) !!}

    {{--Name field which is displayed empty--}}
    <div class="form-group">
        {!! Form::label('name', 'Status Name:') !!}
        {!! Form::text('name', null, ['class'=>'form-control']) !!}
    </div>


    <div class="form-group">
        {!! Form::submit('Create Project Status', ['class'=>'btn-btn-primary']) !!}
    </div>

    {!! Form::close() !!}

    <br>

    <table class="table table-hover">

        @if ($status)

            <thead>
            <tr>
                <th scope="col">Status ID</th>
                <th scope="col">Status Name</th>
            </tr>
            </thead>

            <tbody>

            @foreach($status as $status)

                <tr>
                    <td>{{$status->id}}</td>
                    <td>{{$status->name}}</td>

                    {{--}}<td><a href="{{route('admin.departments.edit', $department->id)}}" class="btn btn-success col-sm-12">Update</a>
                        {!! Form::open(['method'=>'DELETE', 'action' => ['AdminDepartmentsController@destroy', $department->id ]]) !!}
                        {!! Form::submit('Delete', ['class'=>'btn btn-danger col-sm-12']) !!}
                        {!! Form::close() !!} </td>--}}
                </tr>
            @endforeach

            </tbody>
    </table>

    @endif


    {{--</div>--}}


@stop