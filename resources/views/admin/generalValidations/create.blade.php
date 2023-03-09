@extends('adminlte::page')

@section('title', 'Soporte Local')

@section('content_header')
    <h1>Crear validación general</h1>
@stop

@section('content')
    <p>Desde aquí podrás crear una validación general.</p>

    <div class="card">
        <div class="card-body">
            {!! Form::open(['route' => 'admin.generalValidations.store']) !!}

                @include('admin.generalValidations.partials.form')

                {!! Form::submit('Crear validación general', ['class' => 'btn btn-primary btn-sm']) !!}

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
