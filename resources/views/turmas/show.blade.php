@extends('adminlte::page')

@section('title', 'Visualizando turma')

@section('content_header')
      <h1>{{ $turma->nome }}</h1>

@stop

@section('content')

@include('parciais.validation-errors')

<div class="row">
    <div class="col-12">

      <!-- Main content -->
      <div class="invoice p-3 mb-3">
        <!-- title row -->
        <div class="row">
          <div class="col-12">
            <h4>
              <i class="fas fa-group"></i> Alunos na turma
              <small class="float-right">
                <a href="" 
                  class="btn btn-outline-success" data-toggle="modal" data-target="#matricularModal">
                <i class="fas fa-plus-circle"></i> Matricular Aluno</a></small>
            </h4>
            @php($qtdAlunos = count($turma->clientes))
            @if($qtdAlunos > 0)
              <p>Atualmente há {{ $qtdAlunos }} alunos nessa turma:</p>
            @endif
          </div>
          <!-- /.col -->
        </div>
        <!-- info row -->
        <div class="row invoice-info">
          <div class="col-sm-4 invoice-col">
            
            
            
          </div>
        </div>
        <!-- /.row -->

        <!-- Table row -->
        <div class="row">
          <div class="col-12 table-responsive mb-3">
            <table class="table table-striped">
              <thead>
              <tr>
                <th>Foto</th>
                <th>Nome</th>
                <th>Data da Inscrição</th>
                <th>Ações</th>
              </tr>
              </thead>
              <tbody>
                @forelse ($turma->clientes as $cliente)

                  <tr>
                    <td>
                      <img 
                        class="table-img"
                        @if($cliente->foto)
                          src="{{ url('/storage/fotos/'. $cliente->id . '/' . $cliente->foto) }}" 
                        @else
                          src="{{ url('/img/default.jpg') }}" 
                        @endif
                      >
                    </td>
                    <td><a href="{{ route('clientes.show', ['cliente'=>$cliente->id]) }}">{{ $cliente->nome }}</a></td>
                    <td>{{ date('d/m/Y', strtotime($cliente->pivot->created_at)) }}</td>
                    <td>
                      <a class="btn btn-info btn-sm" href="{{ route('clientes.show', ['cliente'=>$cliente->id]) }}">
                        <i class="fa fa-eye"></i>
                      </a>
                      <form class="d-inline" action="" method="post">
                        @csrf
                        @method('DELETE')

                        <button class="btn btn-danger btn-sm">
                          <i class="fa fa-times-circle"></i>
                        </button>
                      </form>
                    </td>
                  </tr>
                @empty
                    <p>Não tem ninguém nesta turma</p>
                @endforelse
              
              </tbody>
            </table>
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->

        <div class="row">
          <!-- accepted payments column -->
          <div class="col-6">
            <p class="lead">Informações sobre a turma:</p>
            <p class="text-muted well well-sm shadow-none" style="margin-top: 10px;">
              {{ $turma->descricao }}
            </p>

            <p class="text-muted well well-sm shadow-none" style="margin-top: 10px;">
                Criada em: {{ date('d/m/Y', strtotime($turma->created_at)) }}
            </p>
          </div>
          <!-- /.col -->
          <div class="col-6">
            <p class="lead">Horários
              <small class="float-right">
                <button class="btn btn-outline-success" data-toggle="modal" data-target="#createTimeClassModal">
                  <i class="fas fa-plus-circle"></i> Adicionar Horário
                </button>
              </small>
            </p>

            <div class="table-responsive">
              <table class="table">
                <tbody>
                @forelse ($turma->horarios as $horario)
                    <tr>
                        <th style="width:50%">{{ $horario->dia_da_semana }}</th>
                        <td>{{ date('H:i', strtotime($horario->horario_inicio)) }} - {{ date('H:i', strtotime($horario->horario_fim)) }}</td>
                        <td>
                          <form action="" method="post">
                            @csrf
                            @method('DELETE')
                            
                            <button class="btn btn-danger btn-sm">
                              <i class="fa fa-times-circle"></i>
                            </button>
                          </form>
                        </td>
                    </tr>
                @empty
                    <p>Nenhum horário cadastrado</p>
                @endforelse
              </tbody>
            </table>
            </div>
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->

        
      </div>
      <!-- /.invoice -->
    </div><!-- /.col -->
  </div>

  @include('turmas.matricular-modal')
  

@stop

@section('css')
<style>
  .table-img {
    width: 2.5rem;
    height: 2.5rem;
    border-radius: 99999px;
  }
</style>
@stop

@section('plugins.Select2', true)

@section('js')
<script src="https://use.fontawesome.com/387f4426e1.js"></script>

<script>
$(function () {
  //Initialize Select2 Elements
  $('.select2').select2()
})
</script>

@stop