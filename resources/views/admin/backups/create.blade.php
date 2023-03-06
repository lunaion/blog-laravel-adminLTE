@extends('adminlte::page')

@section('title', 'HelpDesk')

@section('content_header')
    <h1>Crear backup</h1>
@stop

@section('content')
    <p>Desde aquí podrás crear un backup.</p>

    <div class="card">
        <div class="card-body">
            {!! Form::open(['route' => 'admin.backups.store']) !!}

                @include('admin.backups.partials.form')

                {!! Form::submit('Crear backup', ['class' => 'btn btn-primary btn-sm']) !!}

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
