@extends('adminlte::page')

@section('title', 'HelpDesk')

@section('content_header')
    <h1>Registro y marcación de turnos</h1>
@stop

@section('content')
    <p>Selecciona la ciudad y sede, después presiona en el botón marcar turno.</p>

    <div class="card">
        <div class="card-body">

            {!! Form::open(['route' => 'admin.turns.store', 'autocomplete' => 'off']) !!}

                @include('admin.turns.partials.form')

                {!! Form::submit('Marcar turno', ['class' => 'btn btn-primary btn-sm']) !!}

            {!! Form::close() !!}

        </div>
    </div>
@stop
