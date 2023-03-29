@extends('adminlte::page')

@section('title', 'Soporte Local')

@section('content_header')
    <h1>Editar información de un ticket vencido</h1>
@stop

@section('content')
    <p>Desde aquí podrás editar o actualizar la información de un ticket vencido.</p>

    @if (session('info'))
        <div class="alert alert-success">
            <strong>{{ session('info') }}</strong>
        </div>
    @endif

    <div class="card">
        <div class="card-body">
            {!! Form::model($expiredTicket,['route' => ['admin.expiredTickets.update', $expiredTicket], 'autocomplete' => 'off', 'method' => 'put']) !!}

            @include('admin.expiredTickets.partials.form')

            {!! Form::submit('Actualizar información', ['class' => 'btn btn-primary btn-sm']) !!}

            {!! Form::close() !!}
        </div>
    </div>
@stop
