@extends('adminlte::page')

@section('title', 'Soporte Local')

@section('content_header')
    <h1>Crear nueva reinstalación</h1>
@stop

@section('content')
    <p>Desde aquí podrás crear una nueva reinstalación</p>

    <div class="card">
        <div class="card-body">
            {!! Form::open(['route' => 'admin.reinstallations.store', 'autocomplete' => 'off', 'files' => true]) !!}

                    @include('admin.reinstallations.partials.form')

                {!! Form::submit('Crear reinstalación', ['class' => 'btn btn-primary btn-sm']) !!}

            {!! Form::close() !!}
        </div>
    </div>
@stop

@section('js')
    
    <script src="{{asset('vendor/jQuery-Plugin-stringToSlug-1.3/jquery.stringToSlug.min.js')}}"></script>

    <script>
        /* $(document).ready( function() {
            $("#name").stringToSlug({
                setEvents: 'keyup keydown blur',
                getPut: '#slug',
                space: '-'
            });
        }); */

    </script>

@endsection