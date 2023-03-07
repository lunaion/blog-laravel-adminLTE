@extends('adminlte::page')

@section('title', 'HelpDesk')

@section('content_header')
    <h1>Editar validación general</h1>
@stop

@section('content')
    <p>Desde aquí podrás editar o actualizar las validaciones generales.</p>

    @if (session('info'))
        <div class="alert alert-success">
            <strong>{{session('info')}}</strong>
        </div>
    @endif

    <div class="card">
        <div class="card-body">
            {!! Form::model($generalValidation, ['route' => ['admin.generalValidations.update', $generalValidation], 'method' => 'put']) !!}

            @include('admin.generalValidations.partials.form')

            {!! Form::submit('Actualizar validación general', ['class' => 'btn btn-primary btn-sm']) !!}

            {!! Form::close() !!}
        </div>
    </div>

@stop

@section('js')
    
    <script src="{{asset('vendor/jQuery-Plugin-stringToSlug-1.3/jquery.stringToSlug.min.js')}}"></script>

    <script>
        $(document).ready( function() {
            $("#name").stringToSlug({
                setEvents: 'keyup keydown blur',
                getPut: '#slug',
                space: '-'
            });
        });
    </script>

@endsection
