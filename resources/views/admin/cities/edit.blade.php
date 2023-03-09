@extends('adminlte::page')

@section('title', 'Soporte Local')

@section('content_header')
    <h1>Editar ciudad</h1>
@stop

@section('content')
    <p>Desde aquí podrás editar o actualizar las ciudades.</p>

    @if (session('info'))
        <div class="alert alert-success">
            <strong>{{session('info')}}</strong>
        </div>
    @endif

    <div class="card">
        <div class="card-body">
            {!! Form::model($city,['route' => ['admin.cities.update', $city], 'autocomplete' => 'off', 'method' => 'put']) !!}

                    @include('admin.cities.partials.form')

                {!! Form::submit('Actualizar post', ['class' => 'btn btn-primary btn-sm']) !!}

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