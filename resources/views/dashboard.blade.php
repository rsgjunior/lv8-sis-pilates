@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <div class="row mb-2">
        <div class="col-md-6">
            <h1>Dashboard</h1>
        </div>
        <div class="col-md-6">
            <div class="float-sm-right">
                {{ Breadcrumbs::render('home') }}
            </div>
        </div>
    </div>
@stop

@section('content')
    
    <p>Bem-vindo a demo do SisPilates. Use o menu ao lado para navegar</p>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop