@extends('adminlte::page')

@section('title', 'Soporte Local')

@section('content_header')
    <h1>Crear ciudad</h1>
@stop

@section('content')
    <p>Desde aquí podrás crear un a nueva ciudad.</p>

    <div class="card">
        <div class="card-body">

            {!! Form::open(['route' => 'admin.cities.store', 'autocomplete' => 'off']) !!}

                @include('admin.cities.partials.form')

                {!! Form::submit('Crear ciudad', ['class' => 'btn btn-primary btn-sm']) !!}

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
