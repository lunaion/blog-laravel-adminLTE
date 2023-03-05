@extends('adminlte::page')

@section('title', 'HelpDesk')

@section('content_header')
    <h1>Registro y marcación de turnos</h1>
    <br>
    @can('admin.turns.create')
        <a class="btn btn-primary btn-sm" href="{{route('admin.turns.create')}}">Marcar turno</a>
    @endcan
    @can('admin.turns.export')
        <a class="btn btn-success btn-sm" href="{{route('admin.turns.export')}}">Exportar a Excel</a>
    @endcan
@stop

@section('content')
    <p>Desde aquí podrás ver quien ha marcado entrada y salida en los turnos, además de poder gestionar tus turnos.</p>

    @if (session('info'))
        <div class="alert alert-success">
            <strong>{{session('info')}}</strong>
        </div>
    @endif
    @if (session('warning'))
        <div class="alert alert-warning">
            <strong>{{session('warning')}}</strong>
        </div>
    @endif

    @livewire('admin.turns-index')
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop