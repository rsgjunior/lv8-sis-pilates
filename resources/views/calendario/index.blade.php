@extends('adminlte::page')

@section('title', 'Calendário')

@section('content_header')
  <h1>Calendário</h1>
@stop

@section('content')
  <div class="card card-default">
    <div class="card-header">
      <h4 class="card-title">
        Intervalo de Tempo
      </h4>
    </div>
      <div class="card-body">
        <form action="{{ route('calendario.index') }}" method="get">
          <label for="data_inicio">Data Inicio:</label>
          <input type="date" name="data_inicio" id="data_inicio" class="form-control mb-3" value="{{ date('Y-m-d', strtotime($data_inicio)) }}">
          <label for="data_fim">Data Fim:</label>
          <input type="date" name="data_fim" id="data_fim" class="form-control mb-3" value="{{ date('Y-m-d', strtotime($data_fim)) }}">
      
      </div>
      <div class="card-footer">
        <input type="submit" class="btn btn-primary float-right" value="Atualizar">
        </form>
      </div>
  </div>


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