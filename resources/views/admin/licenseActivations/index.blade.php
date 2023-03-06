@extends('adminlte::page')

@section('title', 'HelpDesk')

@section('content_header')
    <h1>Lista de activaciones de licencias</h1>
    @can('admin.licenseActivations.create')
        <a class="btn btn-primary btn-sm float-right" href="{{route('admin.licenseActivations.create')}}">Agregar una activación de licencia</a>
    @endcan
@stop

@section('content')
    <p>Desde aquí podrás ver la lista de activaciones de licencias.</p>

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
                    @foreach ($licenseActivations as $licenseActivation)
                        <tr>
                            <td>{{$licenseActivation->id}}</td>
                            <td>{{$licenseActivation->name}}</td>
                            <td width="10px">
                                @can('admin.licenseActivations.edit')
                                    <a class="btn btn-warning btn-sm" href="{{route('admin.licenseActivations.edit', $licenseActivation)}}">Editar</a>
                                @endcan
                            </td>
                            <td width="10px">
                                @can('admin.licenseActivations.destroy')
                                    <form action="{{route('admin.licenseActivations.destroy', $licenseActivation)}}" method="POST">
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
