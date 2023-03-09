@extends('adminlte::page')

@section('title', 'Soporte Local')

@section('content_header')
    <h1>Lista de activaciones de validaciones generales</h1>
        @can('admin.generalValidations.create')
            <a class="btn btn-primary btn-sm float-right" href="{{route('admin.generalValidations.create')}}">Agregar una validación general</a>
        @endcan
@stop

@section('content')
    <p>Desde aquí podrás ver la lista de validaciones generales.</p>

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
                    @foreach ($generalValidations as $generalValidation)
                        <tr>
                            <td>{{$generalValidation->id}}</td>
                            <td>{{$generalValidation->name}}</td>
                            <td width="10px">
                                @can('admin.generalValidations.edit')
                                    <a class="btn btn-warning btn-sm" href="{{route('admin.generalValidations.edit', $generalValidation)}}">Editar</a>
                                @endcan
                            </td>
                            <td width="10px">
                                @can('admin.generalValidations.destroy')
                                    <form action="{{route('admin.generalValidations.destroy', $generalValidation)}}" method="POST">
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
