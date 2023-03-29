@extends('adminlte::page')

@section('title', 'Soporte Local')

@section('content_header')
    <h1>Agregar ticket vencido</h1>
@stop

@section('content')
    <p>Desde aquí podrás agregar un nuevo ticket vencido</p>

    <div class="card">
        <div class="card-body">
            {!! Form::open(['route' => 'admin.expiredTickets.store', 'autocomplete' => 'off', 'files' => true]) !!}

            @include('admin.expiredTickets.partials.form')

            {!! Form::submit('Agregar ticket vencido', ['class' => 'btn btn-primary btn-sm']) !!}

            {!! Form::close() !!}
        </div>
    </div>
@stop
