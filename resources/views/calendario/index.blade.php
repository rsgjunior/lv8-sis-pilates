@extends('adminlte::page')

@section('title', 'Calendário')

@section('content_header')
  <h1>Calendário</h1>
@stop

@section('content')
  <div class="card card-primary">
    <div class="card-body p-0">
      {!! $calendario->calendar() !!}
    </div>
  </div>
  
@stop

@section('css')
<link href='{{ url('fullcalendar/main.css') }}' rel='stylesheet' />
@stop

@section('js')
<script src='{{ url('fullcalendar/main.js') }}'></script>
{!! $calendario->script() !!}
@stop