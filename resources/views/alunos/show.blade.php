@extends('adminlte::page')

@section('title', 'Página do Aluno')

@section('content_header')
      <h1>Perfil de {{ $aluno->nome }}</h1>

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
                <b>Cadastrado em</b> <a class="float-right">{{ date('d/m/Y, H:i', strtotime($aluno->created_at)) }}</a>
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
                @foreach($turma->horarios as $horario)
                  {{ $horario->dia_da_semana_str }}: {{ date('H:i', strtotime($horario->horario_inicio)) }} - {{ date('H:i', strtotime($horario->horario_fim)) }} 
                  <br>
                @endforeach
                
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
              <li class="nav-item"><a class="nav-link" href="#timeline" data-toggle="tab">Avaliações</a></li>
              <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Comentários</a></li>
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
        
                        <tr>
                          <td><strong>Telefone 2</strong></td>
                          <td>{{ $aluno->telefone2 }}</td>
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
              
              <div class="tab-pane" id="settings">
                <!-- The timeline -->
                <div class="timeline timeline-inverse">
                  <!-- timeline time label -->
                  <div class="time-label">
                    <span class="bg-danger">
                      10 Feb. 2014
                    </span>
                  </div>
                  <!-- /.timeline-label -->
                  <!-- timeline item -->
                  <div>
                    <i class="fas fa-envelope bg-primary"></i>
  
                    <div class="timeline-item">
                      <span class="time"><i class="far fa-clock"></i> 12:05</span>
  
                      <h3 class="timeline-header"><a href="#">Support Team</a> sent you an email</h3>
  
                      <div class="timeline-body">
                        Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles,
                        weebly ning heekya handango imeem plugg dopplr jibjab, movity
                        jajah plickers sifteo edmodo ifttt zimbra. Babblely odeo kaboodle
                        quora plaxo ideeli hulu weebly balihoo...
                      </div>
                      <div class="timeline-footer">
                        <a href="#" class="btn btn-primary btn-sm">Read more</a>
                        <a href="#" class="btn btn-danger btn-sm">Delete</a>
                      </div>
                    </div>
                  </div>
                  <!-- END timeline item -->
                  <!-- timeline item -->
                  <div>
                    <i class="fas fa-user bg-info"></i>
  
                    <div class="timeline-item">
                      <span class="time"><i class="far fa-clock"></i> 5 mins ago</span>
  
                      <h3 class="timeline-header border-0"><a href="#">Sarah Young</a> accepted your friend request
                      </h3>
                    </div>
                  </div>
                  <!-- END timeline item -->
                  <!-- timeline item -->
                  <div>
                    <i class="fas fa-comments bg-warning"></i>
  
                    <div class="timeline-item">
                      <span class="time"><i class="far fa-clock"></i> 27 mins ago</span>
  
                      <h3 class="timeline-header"><a href="#">Jay White</a> commented on your post</h3>
  
                      <div class="timeline-body">
                        Take me to your leader!
                        Switzerland is small and neutral!
                        We are more like Germany, ambitious and misunderstood!
                      </div>
                      <div class="timeline-footer">
                        <a href="#" class="btn btn-warning btn-flat btn-sm">View comment</a>
                      </div>
                    </div>
                  </div>
                  <!-- END timeline item -->
                  <!-- timeline time label -->
                  <div class="time-label">
                    <span class="bg-success">
                      3 Jan. 2014
                    </span>
                  </div>
                  <!-- /.timeline-label -->
                  <!-- timeline item -->
                  <div>
                    <i class="fas fa-camera bg-purple"></i>
  
                    <div class="timeline-item">
                      <span class="time"><i class="far fa-clock"></i> 2 days ago</span>
  
                      <h3 class="timeline-header"><a href="#">Mina Lee</a> uploaded new photos</h3>
  
                      <div class="timeline-body">
                        <img src="http://placehold.it/150x100" alt="...">
                        <img src="http://placehold.it/150x100" alt="...">
                        <img src="http://placehold.it/150x100" alt="...">
                        <img src="http://placehold.it/150x100" alt="...">
                      </div>
                    </div>
                  </div>
                  <!-- END timeline item -->
                  <div>
                    <i class="far fa-clock bg-gray"></i>
                  </div>
                </div>
                
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
