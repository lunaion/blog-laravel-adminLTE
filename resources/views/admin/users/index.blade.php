@extends('adminlte::page')

@section('title', 'HelpDesk')

@section('content_header')
    <h1>Lista de usuarios</h1>
@stop

@section('content')
    <p>Desde aquí podrás ver la lista de usuarios.</p>

    @livewire('admin.users-index')
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop