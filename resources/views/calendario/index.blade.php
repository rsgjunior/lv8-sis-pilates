@extends('adminlte::page')

@section('title', 'Calendário')

@section('content_header')
  <h1>
    Calendário
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#configCalendarioModal">
      <i class="fas fa-tools"></i>
    </button>
  </h1>
@stop

@section('content')
<div class="row">
  <!-- /.col -->
  <div class="col-md-12">
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

<!-- Modal -->
<div class="modal fade" id="configCalendarioModal" tabindex="-1" role="dialog" aria-labelledby="configCalendarioModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="configCalendarioModalLabel">Configurações</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="" method="get">
        <div class="modal-body">
          <p class="lead">Data</p>
          <div class="form-group row">
            <div class="col-md-6">
              <label for="data_inicio">Data Inicio:</label>
              <input type="date" name="data_inicio" id="data_inicio" class="form-control mb-3" value="{{ date('Y-m-d', strtotime($data_inicio)) }}">
            </div>
            <div class="col-md-6">
              <label for="data_fim">Data Fim:</label>
              <input type="date" name="data_fim" id="data_fim" class="form-control mb-3" value="{{ date('Y-m-d', strtotime($data_fim)) }}">
            </div>
          </div>

          <p class="lead">Exibição</p>
          <div class="form-group">
            <div class="form-check">
              <input type="checkbox" name="mostrarTurmas" id="inputMostrarTurmas" class="form-check-input" 
              {{ $mostrarTurmas = TRUE ? 'checked' : '' }}>
              <label for="inputMostrarTurmas" class="form-check-label">Mostrar turmas</label>
            </div>

            <div class="form-check">
              <input type="checkbox" name="mostrarExperimentais" id="inputMostrarExperimentais" class="form-check-input"
              {{ $mostrarExperimentais = TRUE ? 'checked' : '' }}>
              <label for="inputExperimentais" class="form-check-label">Mostrar experimentais</label>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
          <button type="submit" class="btn btn-primary">Atualizar</button>
        </div>
      </form>
    </div>
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