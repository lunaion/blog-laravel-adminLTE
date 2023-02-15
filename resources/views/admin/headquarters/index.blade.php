@extends('adminlte::page')

@section('title', 'HelpDesk')

@section('content_header')
    <h1>Lista de sedes</h1>
    <a class="btn btn-primary btn-sm float-right" href="{{route('admin.headquarters.create')}}">Agregar sede</a>
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
                    @foreach ($headquarters as $headquarter)
                        <tr>
                            <td>{{$headquarter->id}}</td>
                            <td>{{$headquarter->name}}</td>
                            <td>{{$headquarter->address}}</td>
                            <td>{{$headquarter->phone}}</td>
                            <td>{{$headquarter->email}}</td>
                            <td>{{$headquarter->city->name}}</td>
                            <td>{{$headquarter->user->name}}</td>
                            <td width="10px">
                                <a class="btn btn-warning btn-sm" href="{{route('admin.headquarters.edit', $headquarter)}}">Editar</a>
                            </td>
                            <td width="10px">
                                <form action="{{route('admin.headquarters.destroy', $headquarter)}}" method="POST">
                                    @csrf
                                    @method('DELETE')

                                    <button class="btn btn-danger btn-sm" type="submit">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@stop