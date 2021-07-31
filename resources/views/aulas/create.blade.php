@extends('adminlte::page')

@section('title', 'Registrar nova aula')

@section('content_header')
    <div class="row mb-2">
        <div class="col-md-6">
            <h1>Registrar uma aula</h1>
        </div>
        <div class="col-md-6">
            <div class="float-sm-right">
                Breadcrumb
            </div>
        </div>
    </div>
@stop

@section('content')

@include('parciais.validation-errors')

<div class="row">
  <div class="col-md-6">
    <div class="card card-default">
      <div class="card-header">
        <h3 class="card-title">Preencha o formulário</h3>
      </div>
  
      <form action="{{ route('aulas.store') }}" method="post">
        @csrf

        <input type="hidden" name="turma_id" value="{{ $turma->id }}">

        <div class="card-body">
          <p class="lead">Informações da Turma</p>
          <div class="row">
            <div class="col-md-6">
              <p><strong>ID:</strong> {{ $turma->id }}</p>
            </div>
            <div class="col-md-6">
              <p><strong>Nome:</strong> {{ $turma->nome }}</p>
            </div>
          </div>
  
          <p class="lead">Horários Cadastrados</p>
          <table class="table">
            <thead>
              <tr>
                <th>#</th>
                <th>Dia da Semana</th>
                <th>Início</th>
                <th>Fim</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($turma->horarios as $horario)
                <tr>
                  <td>{{ $loop->index + 1 }}</td>
                  <td>{{ $horario->diaDaSemanaStr }}</td>
                  <td>{{ date('H:i', strtotime($horario->horario_inicio)) }}</td>
                  <td>{{ date('H:i', strtotime($horario->horario_fim)) }}</td>
                </tr>
              @endforeach
            </tbody>
          </table>

          <p class="lead mt-3">Informações da Aula</p>
          <div class="form-group">
            <label for="inputData">Data</label>
            <input type="date" class="form-control" name="data" value="{{ date('Y-m-d', strtotime($data)) }}">
          </div>
  
          <div class="form-group row">
            <div class="col-sm-6">
              <label for="inputHorarioInicio">Horário Início</label>
              <input type="time" class="form-control" name="horario_inicio" value="{{ $horario_inicio }}">
            </div>

            <div class="col-sm-6">
              <label for="inputHorarioFim">Horário Fim</label>
              <input type="time" class="form-control" name="horario_fim" value="{{ $horario_fim }}">
            </div>
          </div>
        </div>

        <div class="card-footer">
          <a href="{{ url()->previous() }}" class="btn btn-default">
            <i class="fa fa-arrow-left"></i> Voltar
          </a>

          <button type="submit" class="btn btn-primary float-right">
            <i class="fa fa-save"></i> Salvar
          </button>
        </div>
      </form>
    </div>
  </div>
</div>

@stop

@section('css')

@stop

@section('js')

@stop
