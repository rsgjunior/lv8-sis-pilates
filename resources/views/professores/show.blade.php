@extends('adminlte::page')

@section('title', 'Página do Professor')

@section('content_header')
      <h1>Perfil de {{ $professor->nome }}</h1>

@stop

@section('content')
    <div class="row">
      <div class="col-md-3">

        <!-- Profile Image -->
        <div class="card card-default card-outline">
          <div class="card-body box-profile">
            <div class="text-center">
              <img class="profile-user-img img-fluid img-circle" 
              @if($professor->foto)
                src="{{ url('/storage/fotos/professores/'. $professor->id . '/' . $professor->foto) }}" 
              @else
                src="{{ url('/img/default.jpg') }}" 
              @endif
              alt="User profile picture">
            </div>

            <h3 class="profile-username text-center">{{ $professor->nome }}</h3>

            <ul class="list-group list-group-unbordered mb-3">
              <li class="list-group-item">
                <b>Cadastrado em</b> <a class="float-right">{{ date('d/m/Y, H:i', strtotime($professor->created_at)) }}</a>
              </li>
            </ul>

            <a href="{{ route('professores.edit', ['professor'=>$professor->id]) }}" class="btn btn-info btn-block">
              <i class="fa fa-edit"></i> <b>Editar</b>
            </a>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->

        <div class="card card-default">
          <div class="card-header">
            <h3 class="card-title">Alocado(a) na(s) Turma(s)</h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            @forelse ($professor->turmas as $turma)

              <a href="{{ route('turmas.show', ['turma'=>$turma->id]) }}">
                <strong><i class="fas fa-book mr-1"></i> {{ $turma->nome }}</strong>
              </a>

              <p class="text-muted">
                @foreach($turma->horarios as $horario)
                  {{ $horario->dia_da_semana_str }}: {{ date('H:i', strtotime($horario->horario_inicio)) }} - {{ date('H:i', strtotime($horario->horario_fim)) }} 
                  <br>
                @endforeach
                <br>
                Data alocação: {{ date('d/m/Y, H:i', strtotime($turma->data_alocacao)) }}
              </p>

              <hr>

            @empty

                <p class="text-muted">Não é professor em nenhuma turma</p>

            @endforelse
            

          </div>
          <!-- /.card-body -->
        </div>
        
        
      </div>
      <!-- /.col -->
      <div class="col-md-9">

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
                  <td>{{ $professor->nome }}</td>
                </tr>

                <tr>
                  <td><strong>E-mail</strong></td>
                  <td>{{ $professor->email }}</td>
                </tr>
                
                <tr>
                  <td><strong>Data de Nascimento</strong></td>
                  <td>{{ date('d/m/Y', strtotime($professor->data_nascimento)) }} - ({{ $professor->idade }} anos)</td>
                </tr>

                <tr>
                  <td><strong>Formação</strong></td>
                  <td>{{ $professor->formacao }}</td>
                </tr>

                <tr>
                  <td><strong>Sexo</strong></td>
                  <td>{{ $professor->sexo }}</td>
                </tr>

                <tr>
                  <td><strong>Telefone</strong></td>
                  <td>{{ $professor->telefone }}</td>
                </tr>

                <tr>
                  <td><strong>Telefone 2</strong></td>
                  <td>{{ $professor->telefone2 }}</td>
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
                  <td>{{ $professor->cep }}</td>
                </tr>

                <tr>
                  <td><strong>Rua</strong></td>
                  <td>{{ $professor->endereco_rua }}</td>
                </tr>
                
                <tr>
                  <td><strong>Número</strong></td>
                  <td>{{ $professor->endereco_numero }}</td>
                </tr>

                <tr>
                  <td><strong>Complemento</strong></td>
                  <td>{{ $professor->endereco_complemento }}</td>
                </tr>

                <tr>
                  <td><strong>Estado</strong></td>
                  <td>{{ $professor->endereco_estado }}</td>
                </tr>

                <tr>
                  <td><strong>Cidade</strong></td>
                  <td>{{ $professor->endereco_cidade }}</td>
                </tr>

                <tr>
                  <td><strong>Bairro</strong></td>
                  <td>{{ $professor->endereco_bairro }}</td>
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
                  <td class="td-title"><strong>CPF</strong></td>
                  <td class="td-content">{{ $professor->cpf }}</td>
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
