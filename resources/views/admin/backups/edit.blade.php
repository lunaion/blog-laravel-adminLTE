@extends('adminlte::page')

@section('title', 'Soporte Local')

@section('content_header')
    <h1>Editar backup</h1>
@stop

@section('content')
    <p>Desde aquí podrás editar o actualizar los backups.</p>

    @if (session('info'))
        <div class="alert alert-success">
            <strong>{{session('info')}}</strong>
        </div>
    @endif

    <div class="card">
        <div class="card-body">
            {!! Form::model($backup, ['route' => ['admin.backups.update', $backup], 'method' => 'put']) !!}

            @include('admin.backups.partials.form')

            {!! Form::submit('Actualizar backup', ['class' => 'btn btn-primary btn-sm']) !!}

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
