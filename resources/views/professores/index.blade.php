@extends('adminlte::page')

@section('title', 'Lista de Professores')

@section('content_header')
  <div class="row mb-2">
    <div class="col-md-6">
      @if($pesquisa)
      <h1>Pesquisando por: "{{ $pesquisa }}" - Critério: {{ array_search($criterio, $criteriosValidos) }}</h1>
      @else
      <h1>Lista de Professores ({{ $qtdProfessores }})</h1>
      @endif
    </div>
    <div class="col-md-6">
        <div class="float-sm-right">
            {{ Breadcrumbs::render('professores.index') }}
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
        <h4 class="modal-title" id="pesquisarModalLabel">Pesquisar Professor</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>
      <form action="" method="get">
        <div class="modal-body">
          <div class="form-group">
            <label for="inputCriterio">Critério</label>
            <select name="criterio" id="inputCriterio" class="form-control">
              @while($criterioValue = current($criteriosValidos))
              <option value="{{ $criterioValue }}" {{ $criterioValue == $criterio ? 'selected' : ''}}>{{ key($criteriosValidos) }}</option>
              {{ next($criteriosValidos) }}
              @endwhile
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
          <a class="btn btn-primary btn-sm" href="{{ route('professores.create') }}">
            <i class="fa fa-plus-circle" aria-hidden="true"></i>
            Cadastrar novo
          </a>
          
          <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#pesquisarModal">
            <i class="fa fa-search" aria-hidden="true"></i>
            Pesquisar
          </button>

        </div>
        <!-- /.card-header -->
        <div class="card-body table-responsive p-0">
          <table class="table table-hover" id="tabela">
            <thead>
              <tr>
                <th>Foto</th>
                <th>Nome</th>
                <th>Turmas</th>
                <th>E-mail</th>
                <th>Idade</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
            @foreach ($professores as $professor)
            <tr>
                <td>
                  <img 
                    class="table-img"
                    @if($professor->foto)
                      src="{{ url('/storage/fotos/professores/'. $professor->id . '/' . $professor->foto) }}" 
                    @else
                      src="{{ url('/img/default.jpg') }}" 
                    @endif
                  >
                </td>
                <td><a href="{{ route('professores.show', ['professor' => $professor->id]) }}">{{ $professor->nome }}</a></td>
                <td>{{ count($professor->turmas) }}</td>
                <td>{{ $professor->email }}</td>
                <td>{{ $professor->idade }} anos</td>
                <td>
                  <a href="{{ route('professores.show', ['professor' => $professor->id]) }}" class="d-inline-block btn btn-primary btn-sm">
                    <i class="fa fa-eye" aria-hidden="true"></i>
                    Ver        
                  </a>
  
                  <a href="{{ route('professores.edit', ['professor' => $professor->id]) }}" class="d-inline-block btn btn-info btn-sm">
                    <i class="fa fa-edit" aria-hidden="true"></i>
                      Editar        
                  </a>
                  <form class="d-inline-block" action="{{ route('professores.destroy', ['professor' => $professor->id]) }}" method="post">
                  @csrf
                  @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm">
                      <i class="fa fa-trash" aria-hidden="true"></i>
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
        <div class="card-footer">
          {{ $professores->links() }}
        </div>
        
      </div>
      <!-- /.card -->
    </div>
  </div>

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

@section('js')
@stop
