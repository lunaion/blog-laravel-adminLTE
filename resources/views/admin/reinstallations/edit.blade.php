@extends('adminlte::page')

@section('title', 'Soporte Local')

@section('content_header')
    <h1>Editar reinstalación</h1>
@stop

@section('content')
    <p>Desde aquí podrás editar o actualizar las reinstalaciones.</p>

    @if (session('info'))
        <div class="alert alert-success">
            <strong>{{session('info')}}</strong>
        </div>
    @endif

    <div class="card">
        <div class="card-body">
            {!! Form::model($reinstallation,['route' => ['admin.reinstallations.update', $reinstallation], 'autocomplete' => 'off', 'files' => true, 'method' => 'put']) !!}

                    @include('admin.reinstallations.partials.form')

                {!! Form::submit('Actualizar reinstalación', ['class' => 'btn btn-primary btn-sm']) !!}

            {!! Form::close() !!}
        </div>
    </div>
@stop