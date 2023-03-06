@extends('adminlte::page')

@section('title', 'HelpDesk')

@section('content_header')
    <h1>Crear activación de licencia</h1>
@stop

@section('content')
    <p>Desde aquí podrás crear un activación de licencia.</p>

    <div class="card">
        <div class="card-body">
            {!! Form::open(['route' => 'admin.licenseActivations.store']) !!}

                @include('admin.licenseActivations.partials.form')

                {!! Form::submit('Crear activación de licencia', ['class' => 'btn btn-primary btn-sm']) !!}

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
