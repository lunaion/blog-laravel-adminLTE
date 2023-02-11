@extends('adminlte::page')

@section('title', 'HelpDesk')

@section('content_header')
    <h1>Crear nuevo rol</h1>
@stop

@section('content')

    <p>Desde aquí podrás crear un nuevo rol.</p>

    <div class="card">
        <div class="card-body">

            {!! Form::open(['route' => 'admin.roles.store']) !!}

                    @include('admin.roles.partials.form')

                {!! Form::submit('Agregar rol', ['class' => 'btn btn-primary']) !!}
            {!! Form::close() !!}

        </div>
    </div>
@stop
