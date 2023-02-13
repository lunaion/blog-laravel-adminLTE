@extends('adminlte::page')

@section('title', 'HelpDesk')

@section('content_header')
    <h1>Crear país</h1>
@stop

@section('content')
    <p>Desde aquí podrás crear un país.</p>

    <div class="card">
        <div class="card-body">

            {!! Form::open(['route' => 'admin.countries.store']) !!}

                @include('admin.countries.partials.form')

                {!! Form::submit('Crear país', ['class' => 'btn btn-primary btn-sm']) !!}

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