@extends('adminlte::page')

@section('title', 'Soporte Local')

@section('content_header')
    <h1>Editar país</h1>
@stop

@section('content')
    <p>Desde aquí podrás editar o actualizar los países.</p>

    @if (session('info'))
        <div class="alert alert-success">
            <strong>{{session('info')}}</strong>
        </div>
    @endif

    <div class="card">
        <div class="card-body">
            {!! Form::model($country, ['route' => ['admin.countries.update', $country], 'method' => 'put']) !!}

                @include('admin.countries.partials.form')

                {!! Form::submit('Actualizar país', ['class' => 'btn btn-primary btn-sm']) !!}

            {!! Form::close() !!}
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
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