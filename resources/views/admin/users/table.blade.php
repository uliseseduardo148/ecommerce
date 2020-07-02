@extends('layouts.app')

@section('content')

<div class="container" style="margin-top: 70px;">
    <h2 style="text-align: center;">Usuarios registrados</h2>
    <button type="button" class="btn btn-success pull-left" onclick="window.location='{{ url("admin/users/create") }}'">Agregar</button>
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>

                @foreach($users as $user)
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        <div class='btn-group'>
                            <a href="{{ url('admin/users/edit/'.$user->id) }}" class="btn btn-primary btn-sm"><i class="fa fa-pencil"></i></a>
                            {!! Form::open(['action' => ['UserController@destroy', $user->id], 'method' => 'POST']) !!}
                            {!! Form::button('<i class="fa fa-trash-o"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-sm', 'onclick' => "return confirm('Desea eliminar el registro?')"]) !!}
                            {!! Form::close() !!}
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{$users->links()}}
    </div>
</div>

@endsection