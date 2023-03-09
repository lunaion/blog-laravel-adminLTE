@extends('adminlte::page')

@section('title', 'Soporte Local')

@section('content_header')
    <h1>Lista de áreas</h1>

    @can('admin.areas.create')
        <a class="btn btn-primary btn-sm float-right" href="{{route('admin.areas.create')}}">Agregar área</a>    
    @endcan

@stop

@section('content')

    <p>Desde aquí podrás ver la lista de áreas.</p>

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
                    @foreach ($areas as $area)
                        <tr>
                            <td>{{$area->id}}</td>
                            <td>{{$area->name}}</td>
                            <td width="10px">
                                @can('admin.areas.edit')
                                    <a class="btn btn-warning btn-sm" href="{{route('admin.areas.edit', $area)}}">Editar</a> 
                                @endcan
                            </td>
                            <td width="10px">
                                @can('admin.areas.destroy')
                                    <form action="{{route('admin.areas.destroy', $area)}}" method="POST">
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
