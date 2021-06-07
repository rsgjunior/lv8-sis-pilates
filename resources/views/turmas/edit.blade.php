@extends('adminlte::page')

@section('title', 'Editar uma Turma')

@section('content_header')
    <h1>Turma: {{ $turma->nome }}</h1>
@stop

@section('content')
<div class="row">
    <!-- left column -->
    <div class="col-md-8">
      <!-- general form elements -->
      <div class="card card-default">
        <div class="card-header">
          <h3 class="card-title">Edite as informações</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form role="form" action="{{ route('turmas.update', ['turma' => $turma->id]) }}" method="post">
            @csrf
            @method('PUT')
            <div class="card-body">
                <div class="form-group row">
                  <div class="col-md-10">
                      <label for="inputNome">Nome</label>
                      <input type="text" class="form-control" id="inputNome" name="nome" value="{{ $turma->nome }}" required>
                  </div>

                  <div class="col-md-2">
                      <label for="inputCorCalendario">Cor</label>
                      <input type="color" value="{{ $turma->cor_calendario }}" class="form-control" id="inputCorCalendario" name="cor_calendario" required>
                  </div>
                </div>

                <div class="form-group">
                  <label for="inputDesc">Descrição</label>
                  <textarea class="form-control" name="descricao" id="inputDesc" cols="30" rows="5">{{ $turma->descricao }}</textarea>
              </div>
            </div>
          <!-- /.card-body -->

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
      <!-- /.card -->
    </div>
</div>
@stop

@section('css')

@stop

@section('js')
    
@stop
