@extends('adminlte::page')

@section('title', 'HelpDesk')

@section('content_header')
    <h1>Editar área</h1>
@stop

@section('content')
    <p>Desde aquí podrás editar o actualizar las áreas.</p>

    @if (session('info'))
        <div class="alert alert-success">
            <strong>{{session('info')}}</strong>
        </div>
    @endif

    <div class="card">
        <div class="card-body">
            {!! Form::model($area, ['route' => ['admin.areas.update', $area], 'method' => 'put']) !!}

            @include('admin.areas.partials.form')

            {!! Form::submit('Actualizar área', ['class' => 'btn btn-primary btn-sm']) !!}

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
