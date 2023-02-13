@extends('adminlte::page')

@section('title', 'HelpDesk')

@section('content_header')
    @can('admin.countries.create')
        <a class="btn btn-primary btn-sm float-right" href="{{route('admin.countries.create')}}">Agregar país</a>
    @endcan

    <h1>Lista de países</h1>
@stop

@section('content')
    <p>Desde aquí podrás ver la lista de países.</p>

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
                    @foreach ($countries as $country)
                        <tr>
                            <td>{{$country->id}}</td>
                            <td>{{$country->name}}</td>
                            <td width="10px">
                                @can('admin.countries.edit')
                                    <a class="btn btn-warning btn-sm" href="{{route('admin.countries.edit', $country)}}">Editar</a>
                                @endcan
                            </td>
                            <td width="10px">
                                @can('admin.countries.destroy')
                                    <form action="{{route('admin.countries.destroy', $country)}}" method="POST">
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

