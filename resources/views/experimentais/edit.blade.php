@extends('adminlte::page')

@section('title', 'Nova experimental')

@section('content_header')
    <h1>Editar experimental</h1>
@stop

@section('content')

@include('parciais.validation-errors')

<div class="row">
    <div class="col-md-8">
      <div class="card card-default">
        <div class="card-header">
          <h3 class="card-title">Experimental #{{ $experimental->id }}</h3>
        </div>

        <form role="form" action="{{ route('experimentais.update', $experimental) }}" method="post">
            @csrf
            @method('PUT')
            <div class="card-body">
                <div class="form-group row">
                    <label for="inputNome" class="col-sm-2 col-form-label">Nome Completo</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="inputNome" value="{{ $experimental->aluno->nome }}" name="nome" placeholder="Insira o nome" disabled>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="inputTelefone" class="col-sm-2 col-form-label">Telefone</label>
                    <div class="col-sm-10">
                        <input type="tel" class="form-control" id="inputTelefone" value="{{ $experimental->aluno->telefone }}" name="telefone" placeholder="Insira o telefone" disabled>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="inputData" class="col-sm-2 col-form-label">Data</label>
                    <div class="col-sm-10">
                        <input type="date" class="form-control" id="inputData" value="{{ $experimental->data }}" name="data" required>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="inputHorarioInicio" class="col-sm-2 col-form-label">Horário Início</label>
                    <div class="col-sm-4">
                        <input type="time" class="form-control" id="inputHorarioInicio" value="{{ date('H:i', strtotime($experimental->horario_inicio)) }}" name="horario_inicio" required>
                    </div>
                    <div class="col-sm-2">
                        <label for="inputHorarioFim" class="col-form-label float-right">Horário Fim</label>
                    </div>
                    <div class="col-sm-4">
                        <input type="time" class="form-control" id="inputHorarioFim" value="{{ date('H:i', strtotime($experimental->horario_fim)) }}" name="horario_fim" required>
                    </div>
                </div>

                <div class="form-group">
                    <label for="inputObservacao">Observação</label>
                    <textarea class="form-control" name="observacao" id="inputObservacao" cols="30" rows="5">{{ $experimental->observacao }}</textarea>
                </div>

                <p class="lead">Preenchimento posterior</p>

                <div class="form-group">
                    <label for="selectStatus">Status</label>
                    <select name="status" id="selectStatus" class="form-control">
                        <option value="0">Marcada</option>
                        <option value="1">Realizada</option>
                        <option value="2">Não compareceu</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="inputFeedback">Feedback</label>
                    <textarea class="form-control" name="feedback" id="inputFeedback" placeholder="Insira o feedback do aluno sobre a aula experimental" cols="30" rows="5">{{ $experimental->feedback }}</textarea>
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
