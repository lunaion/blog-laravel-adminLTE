@extends('adminlte::page')

@section('title', 'Soporte Local')

@section('content_header')
    <h1>Lista de usuarios</h1>
    @can('admin.users.export')
        <a class="btn btn-success btn-sm float-right" href="{{route('admin.users.export')}}">Exportar a Excel</a>
    @endcan
@stop

@section('content')
    <p>Desde aquí podrás ver la lista de usuarios.</p>

    @livewire('admin.users-index')
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop
