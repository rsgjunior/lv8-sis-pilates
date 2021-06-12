@extends('adminlte::page')

@section('title', 'Nova experimental')

@section('content_header')
    <h1>Cadastrar experimental</h1>
@stop

@section('content')

@include('parciais.validation-errors')

<div class="row">
    <div class="col-md-8">
      <div class="card card-default">
        <div class="card-header">
          <h3 class="card-title">Preencha as informações</h3>
        </div>

        <form role="form" action="{{ route('experimentais.store') }}" method="post">
            @csrf
            <div class="card-body">
                <div class="form-group row">
                    <label for="inputNome" class="col-sm-2 col-form-label">Nome Completo</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="inputNome" value="{{ old('nome') }}" name="nome" placeholder="Insira o nome" required>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="inputTelefone" class="col-sm-2 col-form-label">Telefone</label>
                    <div class="col-sm-10">
                        <input type="tel" class="form-control" id="inputTelefone" value="{{ old('telefone') }}" name="telefone" placeholder="Insira o telefone" required>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="inputData" class="col-sm-2 col-form-label">Data</label>
                    <div class="col-sm-10">
                        <input type="date" class="form-control" id="inputData" value="{{ old('data') }}" name="data" required>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="inputHorarioInicio" class="col-sm-2 col-form-label">Horário Início</label>
                    <div class="col-sm-4">
                        <input type="time" class="form-control" id="inputHorarioInicio" value="{{ old('horario_inicio') }}" name="horario_inicio" required>
                    </div>
                    <div class="col-sm-2">
                        <label for="inputHorarioFim" class="col-form-label float-right">Horário Fim</label>
                    </div>
                    <div class="col-sm-4">
                        <input type="time" class="form-control" id="inputHorarioFim" value="{{ old('horario_fim') }}" name="horario_fim" required>
                    </div>
                </div>

                <div class="form-group">
                    <label for="inputObservacao">Observação</label>
                    <textarea class="form-control" name="observacao" id="inputObservacao" cols="30" rows="5">{{ old('observacao') }}</textarea>
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
