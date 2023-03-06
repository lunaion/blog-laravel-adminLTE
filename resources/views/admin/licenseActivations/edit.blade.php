@extends('adminlte::page')

@section('title', 'HelpDesk')

@section('content_header')
    <h1>Editar activación de licencia</h1>
@stop

@section('content')
    <p>Desde aquí podrás editar o actualizar las activaciones de licencias.</p>

    @if (session('info'))
        <div class="alert alert-success">
            <strong>{{session('info')}}</strong>
        </div>
    @endif

    <div class="card">
        <div class="card-body">
            {!! Form::model($licenseActivation, ['route' => ['admin.licenseActivations.update', $licenseActivation], 'method' => 'put']) !!}

            @include('admin.licenseActivations.partials.form')

            {!! Form::submit('Actualizar activación de licencia', ['class' => 'btn btn-primary btn-sm']) !!}

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
