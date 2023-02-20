@extends('adminlte::page')

@section('title', 'HelpDesk')

@section('content_header')
    <h1>Registro y marcación de turnos</h1>
    <br>
    @can('admin.turns.create')
        <a class="btn btn-primary btn-sm" href="{{route('admin.turns.create')}}">Marcar turno</a>
    @endcan
    @can('admin.turns.export')
        <a class="btn btn-success btn-sm float-right" href="{{route('admin.turns.export')}}">Exportar a Excel</a>
    @endcan
@stop

@section('content')
    <p>Desde aquí podrás ver quien ha marcado turno, además de poder marcar tu turno de ingreso.</p>

    @if (session('info'))
        <div class="alert alert-success">
            <strong>{{session('info')}}</strong>
        </div>
    @endif

    @livewire('admin.turns-index')
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop