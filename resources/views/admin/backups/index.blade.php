@extends('adminlte::page')

@section('title', 'Soporte Local')

@section('content_header')
    <h1>Lista de backups</h1>
    @can('admin.backups.create')
        <a class="btn btn-primary btn-sm float-right" href="{{route('admin.backups.create')}}">Agregar lista de backup</a>
    @endcan
@stop

@section('content')
    <p>Desde aquí podrás ver la lista de backups.</p>

    <div class="card">
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Nombre</th>
                        <th colspan="2"></th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($backups as $backup)
                        <tr>
                            <td>{{$backup->id}}</td>
                            <td>{{$backup->name}}</td>
                            <td width="10px">
                                @can('admin.backups.edit')
                                    <a class="btn btn-warning btn-sm" href="{{route('admin.backups.edit', $backup)}}">Editar</a>
                                @endcan
                            </td>
                            <td width="10px">
                                @can('admin.backups.destroy')
                                    <form action="{{route('admin.backups.destroy', $backup)}}" method="POST">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                                    </form>     
                                @endcan
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@stop
