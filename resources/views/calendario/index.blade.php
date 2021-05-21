@extends('adminlte::page')

@section('title', 'Calendário')

@section('content_header')
  <h1>Calendário</h1>
@stop

@section('content')
<div class="row">
  <div class="col-md-3">
    <div class="sticky-top mb-3">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Intervalo de Tempo</h4>
        </div>
        <div class="card-body">
          <form action="{{ route('calendario.index') }}" method="get">
            <label for="data_inicio">Data Inicio:</label>
            <input type="date" name="data_inicio" id="data_inicio" class="form-control mb-3" value="{{ date('Y-m-d', strtotime($data_inicio)) }}">
            <label for="data_fim">Data Fim:</label>
            <input type="date" name="data_fim" id="data_fim" class="form-control mb-3" value="{{ date('Y-m-d', strtotime($data_fim)) }}">

            <input type="submit" class="btn btn-primary float-right" value="Atualizar">
          </form>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div>
  </div>
  <!-- /.col -->
  <div class="col-md-9">
    <div class="card card-primary">
      <div class="card-body p-0">
        <!-- THE CALENDAR -->
        {!! $calendario->calendar() !!}
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->
  </div>
  <!-- /.col -->
</div>  


@stop


@section('css')
<link href='{{ url('fullcalendar/main.css') }}' rel='stylesheet' />
@stop

@section('js')
<script src='{{ url('fullcalendar/main.js') }}'></script>
{!! $calendario->script() !!}
@stop