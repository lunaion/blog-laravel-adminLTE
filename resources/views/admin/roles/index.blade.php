@extends('adminlte::page')

@section('title', 'Soporte Local')

@section('content_header')
    @can('admin.roles.create')
        <a class="btn btn-primary btn-sm float-right" href="{{route('admin.roles.create')}}">Agregar rol</a>
    @endif
    <h1>Lista de roles</h1>
@stop

@section('content')
    <p>Desde aquí podrás ver la lista de roles.</p>

    @if (session('info'))
        <div class="alert alert-success">
            {{session('info')}}
        </div>
    @endif

    <div class="card">
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Rol</th>
                        <th colspan="2"></th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($roles as $role)
                        <tr>
                            <td>{{$role->id}}</td>
                            <td>{{$role->name}}</td>
                            <td width="10px">
                                @can('admin.roles.edit')
                                    <a href="{{route('admin.roles.edit', $role)}}" class="btn btn-sm btn-warning">Editar</a>
                                @endif
                            </td>
                            <td width="10px">
                                @can('admin.roles.destroy')
                                    <form action="{{route('admin.roles.destroy', $role)}}" method="POST">
                                        @csrf
                                        @method('DELETE')

                                        <button type="submit" class="btn btn-sm btn-danger">Eliminar</button>
                                    </form>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@stop
