@extends('adminlte::page')

@section('title', 'Soporte Local')

@section('content_header')
<h1>Listado de reinstalaciones</h1>
@can('admin.reinstallations.export')    
    <a class="btn btn-success btn-sm float-right" href="{{route('admin.reinstallations.export')}}">Exportar a Excel</a>
@endcan
@stop

@section('content')
    <p>Desde aquí podrás ver el lista de reinstalaciones.</p>

    @can('admin.reinstallations.create')
        <a class="btn btn-primary btn-sm" href="{{route('admin.reinstallations.create')}}">Crear reinstalación</a>    
    @endcan

    <br><br>

    @if (session('info'))
        <div class="alert alert-success">
            <strong>{{session('info')}}</strong>
        </div>
    @endif
    
    @livewire('admin.reinstallations-index')
@stop
