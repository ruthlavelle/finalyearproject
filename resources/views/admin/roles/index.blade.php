@extends('layouts.admin')

@section('content')

    <h2 align="center">Roles</h2>
    <br>

    {!! Form::open(['method'=>'POST', 'action'=>'AdminRoleController@store']) !!}

    {{--Name field which is displayed empty--}}
    <div class="form-group">
        {!! Form::label('name', 'Role Name:') !!}
        {!! Form::text('name', null, ['class'=>'form-control']) !!}
    </div>


    <div class="form-group">
        {!! Form::submit('Create Role', ['class'=>'btn-btn-primary']) !!}
    </div>

    {!! Form::close() !!}

    <br>

    <table class="table table-hover">

        @if ($roles)

            <thead>
            <tr>

                <th scope="col">Role ID</th>
                <th scope="col">Role Name</th>
            </tr>
            </thead>

            <tbody>

            @foreach($roles as $role)

                <tr>
                    <td>{{$role->id}}</td>
                    <td>{{$role->name}}</td>

                    <td>
                        {!! Form::open(['method'=>'DELETE', 'action' => ['AdminRoleController@destroy', $role->id ]]) !!}
                        {!! Form::submit('Delete', ['class'=>'btn btn-danger col-sm-12']) !!}
                        {!! Form::close() !!} </td>
                </tr>
            @endforeach

            </tbody>
    </table>

    @endif


    {{--</div>--}}


@stop