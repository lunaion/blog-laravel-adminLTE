@extends('adminlte::page')

@section('title', 'Soporte Local')

@section('content_header')
    <h1>Editar rol</h1>
@stop

@section('content')
    
    <p>Desde aquí podrás editar o actualizar los roles.</p>

    @if (session('info'))
        <div class="alert alert-success">
            {{session('info')}}
        </div>
    @endif

    <div class="card">
        <div class="card-body">
            {!! Form::model($role, ['route' => ['admin.roles.update', $role], 'method' => 'put']) !!}

                @include('admin.roles.partials.form')

                {!! Form::submit('Actualizar rol', ['class' => 'btn btn-primary']) !!}

            {!! Form::close() !!}
        </div>
    </div>
@stop
