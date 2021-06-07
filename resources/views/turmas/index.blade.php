@extends('adminlte::page')

@section('title', 'Turmas de Pilates')

@section('content_header')
      @if($pesquisa)
        <h1>Pesquisando por: "{{ $pesquisa }}"</h1>
      @else
        <h1>Turmas de Pilates</h1>
      @endif
      

@stop

@section('content')

@include('parciais.validation-errors')

<div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <button class="btn btn-primary" data-toggle="modal" data-target="#createPilatesClassModal">
            <i class="fa fa-plus-circle" aria-hidden="true"></i>
            Criar nova
          </button>
          <div class="card-tools">
            <form action="{{ route('turmas.index') }}" method="get">
              <div class="input-group input-group-sm" style="width: 250px;">
                <input type="text" name="pesquisa" style="height: 50px" class="form-control float-right" placeholder="Pesquisar turma">
                <div class="input-group-append">
                  <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                </div>
              </div>
            </form>
          </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body table-responsive p-0">
          <table class="table table-hover" id="tabela">
            <thead>
              <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Alunos</th>
                <th>Cor</th>
                <th>Horário(s)</th>
                <th>Ações</th>
              </tr>
            </thead>
            <tbody>
            @foreach ($turmas as $turma)
            <tr>
                <td>{{ $turma->id }}</td>
                <td><a href="{{ route('turmas.show', ['turma' => $turma->id]) }}">{{ $turma->nome }}</a></td>
                <td>{{ count($turma->alunos) }}</td>
                <td>
                  <span style="color: {{ $turma->cor_calendario }};font-size: 24px">
                    <i class="fas fa-square"></i>
                  </span>
                </td>
                <td>
                  @forelse ($turma->horarios()->orderBy('dia_da_semana')->get() as $horario)
                      {{ $horario->dia_da_semana_str }}: {{ date('H:i', strtotime($horario->horario_inicio)) }} - {{ date('H:i', strtotime($horario->horario_fim)) }}
                      <br>
                  @empty
                      Nenhum horário cadastrado
                  @endforelse
                </td>
                <td>
                  <a href="{{ route('turmas.edit', ['turma'=>$turma->id]) }}" class="btn btn-info">
                    <i class="fa fa-paperclip" aria-hidden="true"></i>
                    Editar        
                  </a>
                  <form style="display: inline-block" action="{{ route('turmas.destroy', ['turma'=>$turma->id]) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">
                      <i class="fa fa-trash" aria-hidden="true"></i>
                      Excluir        
                    </button>
                  </form>

                    <a href="{{ route('turmas.show', ['turma' => $turma->id]) }}" class="btn btn-success">
                      <i class="fa fa-plus-circle"></i>
                      Matricular
                    </a>
                  
                </td>
            </tr>
            @endforeach
              
            </tbody>
          </table>
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
          {{ $turmas->links() }}
        </div>
        
      </div>
      <!-- /.card -->
    </div>
  </div>

  @include('turmas.create-modal')

@stop

@section('css')

@stop

@section('js')

@stop
