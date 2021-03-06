@extends('adminlte::page')

@section('title', 'Avaliação')

@section('content_header')
    <div class="row mb-2">
        <div class="col-md-6">
            <h1>
                Avaliação #{{ $avaliacao->id }}
                <button type="button" class="btn btn-sm btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
                    <i class="fas fa-lg fa-tools"></i>
                </button>
                <ul class="dropdown-menu" x-placement="bottom-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(-10px, 38px, 0px);">
                    <li>
                        <a href="{{ route('avaliacoes.edit', $avaliacao) }}" class="dropdown-item">
                            <i class="fa fa-fw fa-edit" aria-hidden="true"></i>
                            Editar        
                        </a>
                    </li>
                    <li>
                        <form action="{{ route('avaliacoes.destroy', $avaliacao) }}" method="post">
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
        </div>
        <div class="col-md-6">
            <div class="float-sm-right">
                {{ Breadcrumbs::render('avaliacoes.show', $avaliacao) }}
            </div>
        </div>
    </div>
@stop

@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card card-widget widget-user-2">
            <div class="widget-user-header bg-default">
                <div class="widget-user-image">
                    <img class="img-circle elevation-2" src="{{ $avaliacao->aluno->foto_url }}" alt="User Avatar">
                </div>
                <a href="{{ route('alunos.show', $avaliacao->aluno) }}">
                    <h3 class="widget-user-username">{{ $avaliacao->aluno->nome }}</h3>
                </a>
                <h5 class="widget-user-desc">Ficha de Avaliação</h5>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="card card-default">
            <div class="card-header">
                <h3 class="card-title">Dados do Paciente</h3>
            </div>
            
            <div class="card-body" style="display: block;">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputPeso">Nome</label>
                            <a href="{{ route('alunos.show', $avaliacao->aluno) }}">
                                <p class="text-muted">{{ $avaliacao->aluno->nome }}</p>
                            </a>
                        </div>
                    </div>
                  
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputAltura">Idade</label>
                            <p class="text-muted">{{ $avaliacao->aluno->idade }} anos</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="card card-default">
            <div class="card-header">
                <h3 class="card-title">Informações Físicas</h3>
            </div>
            
            <div class="card-body" style="display: block;">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputPeso">Peso</label>
                            <p class="text-muted">{{ $avaliacao->peso }} Kg</p>
                        </div>
                  
                    </div>
                  
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputAltura">Altura</label>
                            <p class="text-muted">{{ $avaliacao->altura }} m</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

  <div class="row">
      <div class="col-md-12">
          <div class="card card-default">
              <div class="card-header">
              <h3 class="card-title">Informações Pessoais</h3>
  
              </div>
              <!-- /.card-header -->
              <div class="card-body" style="display: block;">
              <div class="row">
                  <div class="col-md-6">
                      <div class="form-group">
                          <label for="exampleInputAtividade">Atividades Física</label>
                          <p class="text-muted">{{ $avaliacao->atividade_fisica }}</p>
                      </div>

                      <div class="form-group">
                          <label for="exampleInputObjetivo">Objetivo</label>
                          <p class="text-muted">{{ $avaliacao->objetivo }}</p>
                      </div>
                  <!-- /.form-group -->
                  
                  </div>
                  <!-- /.col -->
                  <div class="col-md-6">
                      <div class="form-group">
                          <label for="exampleInputConhece">Conhece ou já praticou Pilates</label>
                          <p class="text-muted">{{ $avaliacao->conhece_ou_praticou }}</p>
                      </div>

                      <div class="form-group">
                          <label for="exampleInputMedicamentos">Medicamentos</label>
                          <p class="text-muted">{{ $avaliacao->medicamentos }}</p>
                      </div>
                  </div>
                  <!-- /.col -->
                  </div>
              <!-- /.row -->
              </div>
          </div>

          
      </div>
  </div>
  

<div class="row">
    <div class="col-md-12">
        <div class="card card-default">
            <div class="card-header">
                <h3 class="card-title">Informações Médicas</h3>
            </div>
            
            <div class="card-body" style="display: block;">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Queixa Principal</label>
                            <p class="text-muted">{{ $avaliacao->queixa_principal }}</p>
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">História Médica Atual</label>
                            <p class="text-muted">{{ $avaliacao->historia_medica_atual }}</p>
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Fatores que pioram</label>
                            <p class="text-muted">{{ $avaliacao->fatores_que_pioram }}</p>
                        </div>
                  
                    </div>
                  
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputEmail1">História Médica Passada</label>
                            <p class="text-muted">{{ $avaliacao->historia_medica_passada }}</p>
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Fatores que melhoram</label>
                            <p class="text-muted">{{ $avaliacao->fatores_que_melhoram }}</p>
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Observações</label>
                            <p class="text-muted">{{ $avaliacao->observacao }}</p>
                        </div>
                    </div>
                  
                </div>
            </div>
        </div>     
    </div>
</div>

<div class="row">
    @include('alunos.avaliacoes.exames.show')
</div>

@stop

@section('css')

@stop

@section('js')
    
@stop
