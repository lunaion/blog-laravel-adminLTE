@extends('adminlte::page')

@section('title', 'Soporte Local')

@section('content_header')
<a class="btn btn-primary btn-sm float-right" href="{{route('admin.expiredTickets.create')}}">Agreagr ticket vencido</a>

    

    <h1>Listado de tickets vencidos</h1>
@stop

@section('content')
    <p>Desde aquí podrás ver el lista de tickets vencidos.</p>

    @if (session('info'))
        <div class="alert alert-success">
            <strong>{{session('info')}}</strong>
        </div>
    @endif
    
    @livewire('admin.expired-tickets-index')
    
@stop