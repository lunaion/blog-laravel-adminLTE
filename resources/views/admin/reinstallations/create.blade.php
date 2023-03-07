@extends('adminlte::page')

@section('title', 'HelpDesk')

@section('content_header')
    <h1>Crear nuevo reinstalación</h1>
@stop

@section('content')
    <p>Desde aquí podrás crear una nuevo reinstalación</p>

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
    <script src="https://cdn.ckeditor.com/ckeditor5/36.0.0/classic/ckeditor.js"></script>

    <script>
        /* $(document).ready( function() {
            $("#name").stringToSlug({
                setEvents: 'keyup keydown blur',
                getPut: '#slug',
                space: '-'
            });
        });

        ClassicEditor
        .create( document.querySelector( '#extract' ) )
        .catch( error => {
            console.error( error );
        } );

        ClassicEditor
        .create( document.querySelector( '#body' ) )
        .catch( error => {
            console.error( error );
        } ); */

    </script>

@endsection