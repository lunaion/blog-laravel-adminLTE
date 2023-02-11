@extends('adminlte::page')

@section('title', 'HelpDesk')

@section('content_header')

    <a class="btn btn-primary btn-sm float-right" href="{{route('admin.posts.create')}}">Crear post</a>

    <h1>Listado de posts</h1>
@stop

@section('content')
    <p>Desde aquí podrás ver el lista de posts.</p>

    @if (session('info'))
        <div class="alert alert-success">
            <strong>{{session('info')}}</strong>
        </div>
    @endif
    
    @livewire('admin.posts-index')
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop