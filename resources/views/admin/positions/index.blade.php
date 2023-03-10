@extends('adminlte::page')

@section('title', 'Soporte Local')

@section('content_header')
    <h1>Lista de cargos</h1>
    @can('admin.positions.create')
        <a class="btn btn-primary btn-sm float-right" href="{{route('admin.positions.create')}}">Agregar cargo</a>
    @endcan
@stop

@section('content')

    <p>Desde aquí podrás ver la lista de cargos.</p>

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
                    @foreach ($positions as $position)
                        <tr>
                            <td>{{$position->id}}</td>
                            <td>{{$position->name}}</td>
                            <td width="10px">
                                @can('admin.positions.edit')
                                    <a class="btn btn-warning btn-sm" href="{{route('admin.positions.edit', $position)}}">Editar</a> 
                                @endcan
                            </td>
                            <td width="10px">
                                @can('admin.positions.destroy')
                                    <form action="{{route('admin.positions.destroy', $position)}}" method="POST">
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
