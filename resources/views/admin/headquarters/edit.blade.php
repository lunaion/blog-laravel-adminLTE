@extends('adminlte::page')

@section('title', 'HelpDesk')

@section('content_header')
    <h1>Editar sede</h1>
@stop

@section('content')
    <p>Desde aquí podrás editar o actualizar las sedes.</p>

    @if (session('info'))
        <div class="alert alert-success">
            <strong>{{session('info')}}</strong>
        </div>
    @endif

    <div class="card">
        <div class="card-body">
            {!! Form::model($headquarters,['route' => ['admin.headquarters.update', $headquarters], 'autocomplete' => 'off', 'method' => 'put']) !!}

                    @include('admin.headquarters.partials.form')

                {!! Form::submit('Actualizar sede', ['class' => 'btn btn-primary btn-sm']) !!}

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