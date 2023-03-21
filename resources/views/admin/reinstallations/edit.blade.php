@extends('adminlte::page')

@section('title', 'Soporte Local')

@section('content_header')
    <h1>Editar reinstalación</h1>
@stop

@section('content')
    <p>Desde aquí podrás editar o actualizar las reinstalaciones.</p>

    @if (session('info'))
        <div class="alert alert-success">
            <strong>{{ session('info') }}</strong>
        </div>
    @endif

    <div class="card">
        <div class="card-body">
            {!! Form::model($reinstallation, [
                'route' => ['admin.reinstallations.update', $reinstallation],
                'autocomplete' => 'off',
                'files' => true,
                'method' => 'put',
            ]) !!}

            <div class="row">

                <div class="col-md-3">
                    <div class="form-group">
                        {!! Form::label('ticket', 'Ticket número') !!}
                        {!! Form::number('ticket', null, [
                                'class' => 'form-control', 
                                'placeholder' => 'Digite el número del ticket',
                                'readonly'
                        ]) !!}

                        @error('ticket')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="form-group">
                        {!! Form::label('document', 'Documento del usuario') !!}
                        {!! Form::number('document', $reinstallation?->user->document, [
                                'class' => 'form-control',
                                'placeholder' => 'Documento del usuario',
                                'readonly',
                        ]) !!}

                        @error('document')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        {!! Form::label('name', 'Nombre del usuario') !!}
                        {!! Form::text('name', $reinstallation?->user?->name, [
                            'class' => 'form-control',
                            'placeholder' => 'Nombre del usuario',
                            'readonly',
                        ]) !!}

                        @error('name')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        {!! Form::label('email', 'Email') !!}
                        {!! Form::email('email', $reinstallation?->user->email, [
                            'class' => 'form-control',
                            'placeholder' => 'Email del usuario',
                            'readonly',
                        ]) !!}

                        @error('email')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
            </div>

            @include('admin.reinstallations.partials.form')

            {!! Form::submit('Actualizar reinstalación', ['class' => 'btn btn-primary btn-sm']) !!}

            {!! Form::close() !!}
        </div>
    </div>
@stop
