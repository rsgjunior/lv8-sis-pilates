@extends('adminlte::page')

@section('title', 'Visualizando turma')

@section('content_header')
      <h1>
        {{ $turma->nome }}
        <button type="button" class="btn btn-sm btn-warning dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
          <i class="fas fa-lg fa-tools"></i>
        </button>
        <ul class="dropdown-menu" x-placement="bottom-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(-10px, 38px, 0px);">
          <li>
            <a href="{{ route('turmas.edit', $turma) }}" class="dropdown-item">
              <i class="fa fa-fw fa-edit" aria-hidden="true"></i>
                Editar        
            </a>
          </li>
          <li>
            <form action="{{ route('turmas.destroy', $turma) }}" method="post">
              @csrf
              @method('DELETE')
                <button type="submit" class="dropdown-item">
                  <i class="fa fa-fw fa-trash" aria-hidden="true"></i> 
                  Excluir        
                </button>
            </form>
          </li>
        </ul>
      </h1>
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
            @php($qtdAlunos = count($turma->alunos))
            @if($qtdAlunos > 0)
              <p>Atualmente há {{ $qtdAlunos }} aluno(s) nessa turma:</p>
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
            <table class="table table-striped" {{ $qtdAlunos ? '' : 'hidden' }}>
              <thead>
              <tr>
                <th>Foto</th>
                <th>Nome</th>
                <th>Data da Inscrição</th>
                <th>Ações</th>
              </tr>
              </thead>
              <tbody>
                @forelse ($turma->alunos as $aluno)

                  <tr>
                    <td>
                      <img 
                        class="table-img"
                        @if($aluno->foto)
                          src="{{ url('/storage/fotos/'. $aluno->id . '/' . $aluno->foto) }}" 
                        @else
                          src="{{ url('/img/default.jpg') }}" 
                        @endif
                      >
                    </td>
                    <td><a href="{{ route('alunos.show', ['aluno'=>$aluno->id]) }}">{{ $aluno->nome }}</a></td>
                    <td>{{ date('d/m/Y', strtotime($aluno->pivot->created_at)) }}</td>
                    <td>
                      <a class="btn btn-info btn-sm" href="{{ route('alunos.show', ['aluno'=>$aluno->id]) }}">
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
                    <p>Não tem ninguém matriculado nesta turma</p>
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
            <p class="lead">Professor</p>

            @if($turma->professor)
              <div class="card card-widget widget-user-2">
                <div class="widget-user-header bg-olive">
                  <div class="widget-user-image">
                    <img class="img-circle elevation-2" src="{{ $turma->professor->fotoUrl }}" alt="User Avatar">
                  </div>
                  <a href="{{ route('professores.show', $turma->professor) }}">
                    <h3 class="widget-user-username">{{ $turma->professor->nome }}</h3>
                  </a>
                  <h5 class="widget-user-desc">{{ $turma->professor->formacao }}</h5>
                </div>
                <div class="card-footer p-0">
                  <ul class="nav flex-column">
                    <li class="nav-item">
                      <form id="desalocarProf" action="{{ route('professores.desalocar', ['turma_id'=>$turma->id]) }}" method="POST">
                        @csrf
                        <a class="nav-link">
                          Alocado em: {{ date('d/m/Y, H:i', strtotime($turma->data_alocacao)) }}
                          <button type="submit" class="float-right btn btn-danger btn-xs">
                            <i class="fas fa-times-circle"></i> Desalocar
                          </button>
                        </a>
                      </form>
                    </li>
                  </ul>
                </div>
              </div>
            @else
            <p class="text-muted well well-sm shadow-none">
              Nenhum professor foi alocado para esta turma
            </p>
            <button class="btn btn-outline-success mb-4" data-toggle="modal" data-target="#alocarProfessor">
              <i class="fas fa-plus-circle"></i> Alocar um Professor
            </button>
            @endif

            <p class="lead">Informações sobre a turma</p>

            <p class="text-muted well well-sm shadow-none">
              {{ $turma->descricao }}
            </p>

            <p class="text-muted well well-sm shadow-none">
                Criada em: {{ date('d/m/Y, H:i', strtotime($turma->created_at)) }}
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
                @forelse ($horarios as $horario)
                    <tr>
                        <th style="width:50%">{{ $horario->dia_da_semana_str }}</th>
                        <td>{{ date('H:i', strtotime($horario->horario_inicio)) }} - {{ date('H:i', strtotime($horario->horario_fim)) }}</td>
                        <td>
                          <form action="{{ route('horarios.destroy', ['horario_id'=> $horario->id]) }}" method="post">
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

            <p class="lead">
              Cor no Calendário: 
              <span style="color: {{ $turma->cor_calendario }}">
                <i class="fas fa-square"></i>
              </span>
              {{ $turma->cor_calendario }}
            </p>
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->

        
      </div>
      <!-- /.invoice -->
    </div><!-- /.col -->
  </div>

  @include('turmas.matricular-modal')
  @include('turmas.horarios.create-modal')
  @include('turmas.alocar-modal')

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