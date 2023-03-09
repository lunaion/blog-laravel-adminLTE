@extends('adminlte::page')

@section('title', 'Soporte Local')

@section('content_header')

    <a class="btn btn-primary btn-sm float-right" href="{{route('admin.reinstallations.create')}}">Crear reinstalación</a>

    <h1>Listado de reinstalaciones</h1>
@stop

@section('content')
    <p>Desde aquí podrás ver el lista de reinstalaciones.</p>

    @if (session('info'))
        <div class="alert alert-success">
            <strong>{{session('info')}}</strong>
        </div>
    @endif
    
    {{-- @livewire('admin.reinstallations-index') --}}
@stop
