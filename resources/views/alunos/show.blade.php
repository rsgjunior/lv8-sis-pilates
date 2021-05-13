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
              <img class="profile-user-img img-fluid img-circle" 
              @if($aluno->foto)
                src="{{ url('/storage/fotos/'. $aluno->id . '/' . $aluno->foto) }}" 
              @else
                src="{{ url('/img/default.jpg') }}" 
              @endif
              alt="User profile picture">
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
                  {{ $horario->dia_da_semana }}: {{ date('H:i', strtotime($horario->horario_inicio)) }} - {{ date('H:i', strtotime($horario->horario_fim)) }} 
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

        <!-- Tabela de avaliações -->
        @include('alunos.avaliacoes.list')

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
                  <td>{{ date('d/m/Y', strtotime($aluno->data_nascimento)) }} - ({{ $aluno->getIdade() }} anos)</td>
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
