@extends('adminlte::page')

@section('title', 'HelpDesk')

@section('content_header')
    <h1>Crear área</h1>
@stop

@section('content')
    <p>Desde aquí podrás crear un área.</p>

    <div class="card">
        <div class="card-body">
            {!! Form::open(['route' => 'admin.areas.store']) !!}

                @include('admin.areas.partials.form')

                {!! Form::submit('Crear área', ['class' => 'btn btn-primary btn-sm']) !!}

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