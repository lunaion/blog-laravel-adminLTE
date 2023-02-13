@extends('adminlte::page')

@section('title', 'HelpDesk')

@section('content_header')
    <h1>Lista de ciudades</h1>
    @can('admin.cities.create')
        <a class="btn btn-primary btn-sm float-right" href="{{route('admin.cities.create')}}">Crear ciudad</a>
    @endcan
@stop

@section('content')

    <p>Desde aquí podrás ver la lista de ciudades.</p>

    @if (session('info'))
        <div class="alert alert-success">
            <strong>{{session('info')}}</strong>
        </div>
    @endif

    @livewire('admin.cities-index')
    
@stop


