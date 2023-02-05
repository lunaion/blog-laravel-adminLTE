@extends('adminlte::page')

@section('title', 'HelpDesk')

@section('content_header')
    <h1>Listado de posts</h1>
@stop

@section('content')
    <p>Desde aquí podrás ver el lista de posts.</p>
    @livewire('admin.posts-index')
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop