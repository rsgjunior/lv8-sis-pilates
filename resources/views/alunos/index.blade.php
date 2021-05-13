@extends('adminlte::page')

@section('title', 'Lista de Alunos')

@section('content_header')
  @if($pesquisa)
  <h1>Pesquisando por: "{{ $pesquisa }}"</h1>
  @else
  <h1>Lista de Alunos</h1>
  @endif

@stop

@section('content')

<div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <a class="btn btn-primary" href="{{ route('alunos.create') }}">
            <i class="fa fa-plus-circle" aria-hidden="true"></i>
            Criar novo
          </a>
          <div class="card-tools">
            <form action="{{ route('alunos.index') }}" method="GET">
              <div class="input-group input-group-sm" style="width: 250px;">
                <input type="text" name="pesquisa" style="height: 50px;" class="form-control float-right" placeholder="Procurar aluno">
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
                <th>Foto</th>
                <th>Nome</th>
                <th>E-mail</th>
                <th>Telefone</th>
                <th>Data de Nascimento</th>
                <th>Ações</th>
              </tr>
            </thead>
            <tbody>
            @foreach ($alunos as $aluno)
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
                <td><a href="{{ route('alunos.show', ['aluno' => $aluno->id]) }}">{{ $aluno->nome }}</a></td>
                <td>{{ $aluno->email }}</td>
                <td>{{ $aluno->telefone }}</td>
                <td>{{ date('d/m/Y', strtotime($aluno->data_nascimento)) }}</td>
                <td>
                  <a href="{{ route('alunos.show', ['aluno' => $aluno->id]) }}" class="d-inline-block btn btn-primary btn-sm">
                    <i class="fa fa-eye" aria-hidden="true"></i>
                    Ver        
                  </a>
  
                  <a href="{{ route('alunos.edit', ['aluno' => $aluno->id]) }}" class="d-inline-block btn btn-info btn-sm">
                    <i class="fa fa-edit" aria-hidden="true"></i>
                      Editar        
                  </a>
                  <form class="d-inline-block" action="{{ route('alunos.destroy', ['aluno' => $aluno->id]) }}" method="post">
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
          {{ $alunos->links() }}
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
