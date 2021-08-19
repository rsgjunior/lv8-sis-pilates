@extends('adminlte::page')

@section('title', 'Aulas Experimentais')

@section('content_header')
    <div class="row mb-2">
        <div class="col-md-6">
            <h1>Experimentais ({{ $qtdExperimentais }})</h1>
        </div>
        <div class="col-md-6">
            <div class="float-sm-right">
                {{ Breadcrumbs::render('experimentais.index') }}
            </div>
        </div>
    </div>
@stop

@section('content')

<!-- Modal Pesquisa -->
<div class="modal fade" id="pesquisarModal" tabindex="-1" role="dialog" aria-labelledby="pesquisarModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" id="pesquisarModalLabel">Pesquisar Experimental</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        </div>
        <form action="" method="get">
          <div class="modal-body">
            <div class="form-group">
              <label for="inputCriterio">Critério</label>
              <select name="criterio" id="inputCriterio" class="form-control">
                <option value="cpf" {{ $criterio == 'cpf' ? 'selected' : ''}}>CPF</option>
                <option value="registro_profissional" {{ $criterio == 'registro_profissional' ? 'selected' : ''}}>Registro Profissional</option>
                <option value="nome" {{ $criterio == 'nome' ? 'selected' : ''}}>Nome</option>
                <option value="email" {{ $criterio == 'email' ? 'selected' : ''}}>E-mail</option>
              </select>
            </div>
    
            <div class="form-group">
              <label for="inputPesquisa">Pesquisa</label>
              <input type="text" id="inputPesquisa" name="pesquisa" class="form-control" placeholder="Digite o valor que deseja procurar" value="{{ $pesquisa }}">
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
            <button type="submit" class="btn btn-primary">Pesquisar</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  <!-- Fim Modal Pesquisa -->

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">

                <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#pesquisarModal">
                    <i class="fa fa-search" aria-hidden="true"></i>
                    Pesquisar
                </button>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive p-0">
            <table class="table table-hover">
                <thead>
                <tr>
                    <th width="10px">ID</th>
                    <th>Aluno</th>
                    <th>Data</th>
                    <th>Horário</th>
                    <th>Status</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach ($experimentais as $experimental)
                    <tr>
                        <!-- ID -->
                        <td>{{ $experimental->id }}</td>

                        <!-- Aluno -->
                        <td>
                            <a href="{{ route('experimentais.show', $experimental) }}">
                                {{ $experimental->aluno->nome }}
                            </a>
                        </td>

                        <!-- Data -->
                        <td>
                            {{ date('d/m/Y', strtotime($experimental->data)) }}
                        </td>

                        <!-- Horário -->
                        <td>
                            {{ date('H:i', strtotime($experimental->horario_inicio)) }} 
                            - 
                            {{ date('H:i', strtotime($experimental->horario_fim)) }}
                        </td>

                        <!-- Status -->
                        <td>
                            {!! $experimental->status_badge !!}
                        </td>

                        <!-- Ações -->
                        <td>
                            <a href="{{ route('experimentais.show', $experimental) }}" class="btn btn-primary btn-sm">
                                <i class="fas fa-eye"></i> 
                                Ver
                            </a>

                            <a href="{{ route('experimentais.atualizarStatus', $experimental) }}" class="btn btn-info btn-sm">
                                <i class="fas fa-clipboard-check"></i> 
                                Atualizar
                            </a>

                            <a href="{{ route('experimentais.edit', $experimental) }}" class="btn btn-warning btn-sm">
                                <i class="fas fa-edit"></i> 
                                Editar
                            </a>

                            <form action="{{ route('experimentais.destroy', $experimental) }}" method="post" class="d-inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">
                                    <i class="fas fa-trash-alt"></i> 
                                    Excluir
                                </button>
                            </form>
                        </td>
                    </tr> 
                @endforeach

                </tbody>
            </table>
            </div>
            <!-- /.card-body -->
            <div class="card-footer pb-0">
                {{ $experimentais->links() }}
            </div>
        </div>
        <!-- /.card -->
    </div>
</div>
@stop

@section('css')

@stop

@section('js')

@stop
