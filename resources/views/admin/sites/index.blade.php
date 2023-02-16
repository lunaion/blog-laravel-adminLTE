@extends('adminlte::page')

@section('title', 'HelpDesk')

@section('content_header')
    <h1>Lista de sedes</h1>
    @can('admin.sites.export')
        <a class="btn btn-success btn-sm" href="{{route('admin.sites.export')}}">Exportar a Excel</a>
    @endcan
    @can('admin.sites.create')
        <a class="btn btn-primary btn-sm" href="{{route('admin.sites.create')}}">Agregar sede</a>
    @endcan


@stop

@section('content')
    <p>Desde aquí podrás ver la lista de sedes.</p>

    @if (session('info'))
        <div class="alert alert-success">
            <strong>{{session('info')}}</strong>
        </div>
    @endif

    <div class="card">
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Nombre</th>
                        <th>Dirección</th>
                        <th>Teléfono</th>
                        <th>Email</th>
                        <th>Ciudad</th>
                        <th>Contacto</th>
                        <th colspan="2"></th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($sites as $site)
                        <tr>
                            <td>{{$site->id}}</td>
                            <td>{{$site->name}}</td>
                            <td>{{$site->address}}</td>
                            <td>{{$site->phone}}</td>
                            <td>{{$site->email}}</td>
                            <td>{{$site->city->name}}</td>
                            <td>{{$site->user->name}}</td>
                            <td width="10px">
                                @can('admin.sites.edit')
                                    <a class="btn btn-warning btn-sm" href="{{route('admin.sites.edit', $site)}}">Editar</a>
                                @endcan
                            </td>
                            <td width="10px">
                                @can('admin.sites.destroy')
                                    <form action="{{route('admin.sites.destroy', $site)}}" method="POST">
                                        @csrf
                                        @method('DELETE')

                                        <button class="btn btn-danger btn-sm" type="submit">Eliminar</button>
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