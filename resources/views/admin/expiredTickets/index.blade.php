@extends('adminlte::page')

@section('title', 'Soporte Local')

@section('content_header')
<h1>Listado de tickets vencidos</h1>
@can('admin.expiredTickets.export')
    <a class="btn btn-success btn-sm float-right" href="{{route('admin.expiredTickets.export')}}">Exportar a Excel</a>
@endcan

@stop

@section('content')
    <p>Desde aquí podrás ver el lista de tickets vencidos.</p>
        @can('admin.expiredTickets.create')
            <a class="btn btn-primary btn-sm" href="{{route('admin.expiredTickets.create')}}">Agregar ticket vencido</a>
        @endcan

        <br><br>

    @if (session('info'))
        <div class="alert alert-success">
            <strong>{{session('info')}}</strong>
        </div>
    @endif
    
    @livewire('admin.expired-tickets-index')
    
@stop