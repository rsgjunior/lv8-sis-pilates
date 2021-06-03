@extends('adminlte::page')

@section('title', 'Nova Observação')

@section('content_header')
    <h1>Criar Observação para o Aluno {{ $aluno->nome }}</h1>
@stop

@section('content')
<div class="row">
    <!-- left column -->
    <div class="col-md-8">
      <!-- general form elements -->
      <div class="card card-default">
        <div class="card-header">
          <h3 class="card-title">Preencha as informações</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form action="{{ route('observacoes.store') }}" method="post">
            @csrf
            <input type="hidden" name="aluno_id" value="{{ $aluno->id }}">

            <div class="card-body">
                <div class="form-group">
                    <label for="selectCategoria">Categoria</label>
                    <select name="categoria" id="selectCategoria" class="form-control">
                        <option value="0">Comentário</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="inputTitulo">Título</label>
                    <input type="text" class="form-control" id="inputTitulo" name="titulo" placeholder="Insira o título">
                </div>

                <div class="form-group">
                  <label for="inputDesc">Descrição</label>
                  <textarea class="form-control" name="descricao" id="inputDesc" cols="30" rows="5" placeholder="Insira a descrição"></textarea>
              </div>
            </div>
          <!-- /.card-body -->

            <div class="card-footer">
                <a href="{{ url()->previous() }}" class="btn btn-default">
                  <i class="fa fa-arrow-left"></i> Voltar
                </a>

                <button type="submit" class="btn btn-primary float-right">
                  <i class="fa fa-save"></i> Concluir
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
