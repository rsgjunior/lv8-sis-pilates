@extends('adminlte::page')

@section('title', 'Avaliação')

@section('content_header')
      <h1>Página da Avaliação</h1>
@stop

@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card card-widget widget-user-2">
            <div class="widget-user-header bg-default">
              <div class="widget-user-image">
                <img 
                class="img-circle elevation-2" 
                @if($avaliation->client->foto)
                    src="{{ url('/storage/fotos/'. $avaliation->client->id . '/' . $avaliation->client->foto) }}" 
                @else
                    src="{{ url('/img/default.jpg') }}" 
                @endif
                alt="User Avatar">
              </div>
              <h3 class="widget-user-username">{{ $avaliation->client->nome }}</h3>
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
                            <p class="text-muted">{{ $avaliation->client->nome }}</p>
                        </div>
                    </div>
                  
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputAltura">Idade</label>
                            <p class="text-muted">{{ $avaliation->client->getIdade() }} anos</p>
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
                            <p class="text-muted">{{ $avaliation->peso }} Kg</p>
                        </div>
                  
                    </div>
                  
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputAltura">Altura</label>
                            <p class="text-muted">{{ $avaliation->altura }} m</p>
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
                          <p class="text-muted">{{ $avaliation->atividade_fisica }}</p>
                      </div>

                      <div class="form-group">
                          <label for="exampleInputObjetivo">Objetivo</label>
                          <p class="text-muted">{{ $avaliation->objetivo }}</p>
                      </div>
                  <!-- /.form-group -->
                  
                  </div>
                  <!-- /.col -->
                  <div class="col-md-6">
                      <div class="form-group">
                          <label for="exampleInputConhece">Conhece ou já praticou Pilates</label>
                          <p class="text-muted">{{ $avaliation->conhece_ou_praticou }}</p>
                      </div>

                      <div class="form-group">
                          <label for="exampleInputMedicamentos">Medicamentos</label>
                          <p class="text-muted">{{ $avaliation->medicamentos }}</p>
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
                            <p class="text-muted">{{ $avaliation->queixa_principal }}</p>
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">História Médica Atual</label>
                            <p class="text-muted">{{ $avaliation->historia_medica_atual }}</p>
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Fatores que pioram</label>
                            <p class="text-muted">{{ $avaliation->fatores_que_pioram }}</p>
                        </div>
                  
                    </div>
                  
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputEmail1">História Médica Passada</label>
                            <p class="text-muted">{{ $avaliation->historia_medica_passada }}</p>
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Fatores que melhoram</label>
                            <p class="text-muted">{{ $avaliation->fatores_que_melhoram }}</p>
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Observações</label>
                            <p class="text-muted">{{ $avaliation->observacao }}</p>
                        </div>
                    </div>
                  
                </div>
            </div>
        </div>     
    </div>
</div>

<div class="row">
    @include('client.avaliation.exam.show')
</div>

@stop

@section('css')

@stop

@section('js')
    
@stop
