@extends('adminlte::page')

@section('title', 'Lista de Alunos')

@section('content_header')
  @if($pesquisa)
  <h1>Pesquisando por: "{{ $pesquisa }}"</h1>
  @else
  <h1>Lista de Alunos</h1>
  @endif
  
  <a href="{{ route('alunos.create') }}" class="btn btn-primary">Cadastrar novo</a>
@stop

@section('content')
<div class="card card-solid">
  <div class="card-body pb-0">
    <div class="row d-flex align-items-stretch">
      @foreach ($alunos as $aluno)
        {{-- Bloco Aluno Inicio --}}
        <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch">
          <div class="card bg-light">
            <div class="card-header text-muted border-bottom-0">
              {{ $aluno->profissao }}
            </div>
            <div class="card-body pt-0">
              <div class="row">
                <div class="col-7">
                  <h2 class="lead"><b>{{ $aluno->nome }}</b></h2>
                  <ul class="ml-4 mb-0 fa-ul text-muted">
                    <li class="small mb-2">
                      <span class="fa-li"><i class="fas fa-lg fa-map-marker-alt"></i></span> 
                      {{ $aluno->endereco_rua }}, {{ $aluno->endereco_numero }} 
                      - {{ $aluno->endereco_cidade }}/{{ $aluno->endereco_estado }}
                    </li>
                    <li class="small mb-2">
                      <span class="fa-li"><i class="fas fa-lg fa-birthday-cake"></i></span> 
                      {{ date('d/m/Y', strtotime($aluno->data_nascimento))}} ({{ $aluno->idade }} anos)
                    </li>
                    <li class="small mb-2">
                      <span class="fa-li"><i class="fas fa-lg fa-envelope"></i></span> 
                      {{ $aluno->email }}
                    </li>
                    <li class="small mb-2">
                      <span class="fa-li"><i class="fas fa-lg fa-phone"></i></span> 
                      {{ $aluno->telefone }}
                    </li>
                  </ul>
                </div>
                <div class="col-5 text-center">
                  <img src="{{ $aluno->foto_url }}" alt="" class="img-circle img-fluid">
                </div>
              </div>
            </div>
            <div class="card-footer">
              <div class="text-right">
                <div class="btn-group">
                  <button type="button" class="btn btn-sm btn-info dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
                    <i class="fas fa-lg fa-user-cog"></i>
                  </button>
                  <ul class="dropdown-menu" x-placement="bottom-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(-10px, 38px, 0px);">
                    <li>
                      <a href="{{ route('alunos.edit', ['aluno' => $aluno->id]) }}" class="dropdown-item">
                        <i class="fa fa-edit" aria-hidden="true"></i>
                          Editar        
                      </a>
                    </li>
                    <li>
                      <form action="{{ route('alunos.destroy', ['aluno' => $aluno->id]) }}" method="post">
                        @csrf
                        @method('DELETE')
                          <button type="submit" class="dropdown-item">
                            <i class="fa fa-trash" aria-hidden="true"></i> 
                            Excluir        
                          </button>
                      </form>
                    </li>
                  </ul>
                </div>

                <a href="{{ route('alunos.show', $aluno) }}" class="btn btn-sm btn-primary">
                  <i class="fas fa-user"></i> Ver Perfil
                </a>
              </div>
            </div>
          </div>
        </div>
        {{-- Bloco Aluno Fim --}}
      @endforeach

    </div>
  </div>
  <!-- /.card-body -->
  <div class="card-footer">
    {{ $alunos->links() }}
  </div>
  <!-- /.card-footer -->
</div>
@stop

@section('css')
@stop

@section('js')
@stop
