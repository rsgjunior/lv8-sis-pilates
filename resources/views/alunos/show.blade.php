@extends('adminlte::page')

@section('title', 'Página do Aluno')

@section('content_header')
  <div class="row mb-2">
    <div class="col-md-6">
      <h1>Perfil de {{ $aluno->nome }}</h1>
    </div>
    <div class="col-md-6">
      <div class="float-sm-right">
        {{ Breadcrumbs::render('alunos.show', $aluno) }}
      </div>
    </div>
  </div>
@stop

@section('content')
    <div class="row">
      <div class="col-md-3">

        <!-- Profile Image -->
        <div class="card card-default card-outline">
          <div class="card-body box-profile">
            <div class="text-center">
              <img class="profile-user-img img-fluid img-circle" src="{{ $aluno->foto_url }}" alt="User profile picture">
            </div>

            <h3 class="profile-username text-center">{{ $aluno->nome }}</h3>

            <ul class="list-group list-group-unbordered mb-3">
              <li class="list-group-item">
                <b>Cadastrado em</b> <span class="float-right">{{ date('d/m/Y, H:i', strtotime($aluno->created_at)) }}</span>
              </li>
            </ul>

            <a href="{{ route('alunos.edit', ['aluno'=>$aluno->id]) }}" class="btn btn-info btn-block">
              <i class="fa fa-edit"></i> <b>Editar</b>
            </a>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->

        <div class="card card-default">
          <div class="card-header">
            <h3 class="card-title">Matriculado nas Turmas</h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            @forelse ($turmas as $turma)

              <a href="{{ route('turmas.show', ['turma'=>$turma->id]) }}">
                <strong><i class="fas fa-book mr-1"></i> {{ $turma->nome }}</strong>
              </a>

              <p class="text-muted">
                @forelse($turma->horarios as $horario)
                  {{ $horario->dia_da_semana_str }}: {{ date('H:i', strtotime($horario->horario_inicio)) }} - {{ date('H:i', strtotime($horario->horario_fim)) }} 
                  <br>
                @empty
                  Essa turma não tem nenhum horário cadastrado
                @endforelse
                
              </p>

              <hr>

            @empty

                <p class="text-muted">Não está cadastrado em nenhuma turma</p>

            @endforelse
            

          </div>
          <!-- /.card-body -->
        </div>
        
        
      </div>
      <!-- /.col -->
      <div class="col-md-9">
        <!-- Inicio Tabs -->
        <div class="card">
          <div class="card-header p-2">
            <ul class="nav nav-pills">
              <li class="nav-item"><a class="nav-link active" href="#dados_pessoais" data-toggle="tab">Dados Pessoais</a></li>
              <li class="nav-item"><a class="nav-link" href="#timeline" data-toggle="tab">Avaliações ({{ count($aluno->avaliacoes) }})</a></li>
              <li class="nav-item"><a class="nav-link" href="#observacoes" data-toggle="tab">Observações ({{ count($aluno->observacoes) }})</a></li>
            </ul>
          </div><!-- /.card-header -->
          <div class="card-body">
            <div class="tab-content">
              <div class="tab-pane active" id="dados_pessoais">
                <div class="card">
                  <div class="card-header">
                    <h3 class="card-title">Informações Pessoais</h3>
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body p-0">
                    <table class="table table-striped profile-table">             
                      <tbody>
                        <tr>
                          <td class="td-title"><strong>Nome</strong></td>
                          <td>{{ $aluno->nome }}</td>
                        </tr>
        
                        <tr>
                          <td><strong>E-mail</strong></td>
                          <td>{{ $aluno->email }}</td>
                        </tr>
                        
                        <tr>
                          <td><strong>Data de Nascimento</strong></td>
                          <td>{{ date('d/m/Y', strtotime($aluno->data_nascimento)) }} - ({{ $aluno->idade }} anos)</td>
                        </tr>
        
                        <tr>
                          <td><strong>Profissão</strong></td>
                          <td>{{ $aluno->profissao }}</td>
                        </tr>
        
                        <tr>
                          <td><strong>Sexo</strong></td>
                          <td>{{ $aluno->sexo }}</td>
                        </tr>
        
                        <tr>
                          <td><strong>Telefone</strong></td>
                          <td>{{ $aluno->telefone }}</td>
                        </tr>
        
                      </tbody>
                    </table>
                  </div>
                  <!-- /.card-body -->
                </div>
        
                <div class="card">
                  <div class="card-header">
                    <h3 class="card-title">Endereço</h3>
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body p-0">
                    <table class="table table-striped profile-table">             
                      <tbody>
                        <tr>
                          <td class="td-title"><strong>CEP</strong></td>
                          <td>{{ $aluno->cep }}</td>
                        </tr>
        
                        <tr>
                          <td><strong>Rua</strong></td>
                          <td>{{ $aluno->endereco_rua }}</td>
                        </tr>
                        
                        <tr>
                          <td><strong>Número</strong></td>
                          <td>{{ $aluno->endereco_numero }}</td>
                        </tr>
        
                        <tr>
                          <td><strong>Complemento</strong></td>
                          <td>{{ $aluno->endereco_complemento }}</td>
                        </tr>
        
                        <tr>
                          <td><strong>Estado</strong></td>
                          <td>{{ $aluno->endereco_estado }}</td>
                        </tr>
        
                        <tr>
                          <td><strong>Cidade</strong></td>
                          <td>{{ $aluno->endereco_cidade }}</td>
                        </tr>
        
                        <tr>
                          <td><strong>Bairro</strong></td>
                          <td>{{ $aluno->endereco_bairro }}</td>
                        </tr>
                        
                      </tbody>
                    </table>
                  </div>
                  <!-- /.card-body -->
                </div>
        
                <div class="card">
                  <div class="card-header">
                    <h3 class="card-title">Documentos</h3>
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body p-0">
                    <table class="table table-striped profile-table">             
                      <tbody>
                        <tr>
                          <td class="td-title"><strong>RG</strong></td>
                          <td class="td-content">{{ $aluno->rg }}</td>
                        </tr>
        
                        <tr>
                          <td><strong>CPF</strong></td>
                          <td>{{ $aluno->cpf }}</td>
                        </tr>
                        
                      </tbody>
                    </table>
                  </div>
                  <!-- /.card-body -->
                </div>
              </div>
              <!-- /.tab-pane -->
              
              <div class="tab-pane" id="timeline">
                <!-- Tabela de avaliações -->
                @include('alunos.avaliacoes.list')
              </div>
              <!-- /.tab-pane -->
              
              <div class="tab-pane" id="observacoes">
                @include('alunos.observacoes.lista')
              </div>
              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div><!-- /.card-body -->
        </div>

        <!-- Fim Tabs -->
        
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->

@stop

@section('css')
<style>
.profile-table td{
    border: none;
}

.profile-table tbody tr:nth-of-type(odd) {
    background-color: rgba(0,0,0,.02);
}

.profile-table .td-title {
    width:290px;
}
</style>
@stop

@section('js')

@stop
