@extends('adminlte::page')

@section('title', 'Página do Aluno')

@section('content_header')
      <h1>Perfil de {{ $cliente->nome }}</h1>

@stop

@section('content')
    <div class="row">
      <div class="col-md-3">

        <!-- Profile Image -->
        <div class="card card-default card-outline">
          <div class="card-body box-profile">
            <div class="text-center">
              <img class="profile-user-img img-fluid img-circle" 
              @if($cliente->foto)
                src="{{ url('/storage/fotos/'. $cliente->id . '/' . $cliente->foto) }}" 
              @else
                src="{{ url('/img/default.jpg') }}" 
              @endif
              alt="User profile picture">
            </div>

            <h3 class="profile-username text-center">{{ $cliente->nome }}</h3>

            <ul class="list-group list-group-unbordered mb-3">
              <li class="list-group-item">
                <b>Cadastrado em</b> <a class="float-right">{{ date('d/m/Y, H:i', strtotime($cliente->created_at)) }}</a>
              </li>
            </ul>

            <a href="{{ route('clientes.edit', ['cliente'=>$cliente->id]) }}" class="btn btn-info btn-block">
              <i class="fa fa-edit"></i> <b>Editar</b>
            </a>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->

         
        
        
      </div>
      <!-- /.col -->
      <div class="col-md-9">

        <!-- Tabela de avaliações -->
        

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
                  <td>{{ $cliente->nome }}</td>
                </tr>

                <tr>
                  <td><strong>E-mail</strong></td>
                  <td>{{ $cliente->email }}</td>
                </tr>
                
                <tr>
                  <td><strong>Data de Nascimento</strong></td>
                  <td>{{ date('d/m/Y', strtotime($cliente->data_nascimento)) }} - ({{ $cliente->getIdade() }} anos)</td>
                </tr>

                <tr>
                  <td><strong>Profissão</strong></td>
                  <td>{{ $cliente->profissao }}</td>
                </tr>

                <tr>
                  <td><strong>Sexo</strong></td>
                  <td>{{ $cliente->sexo }}</td>
                </tr>

                <tr>
                  <td><strong>Telefone</strong></td>
                  <td>{{ $cliente->telefone }}</td>
                </tr>

                <tr>
                  <td><strong>Telefone 2</strong></td>
                  <td>{{ $cliente->telefone2 }}</td>
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
                  <td>{{ $cliente->cep }}</td>
                </tr>

                <tr>
                  <td><strong>Rua</strong></td>
                  <td>{{ $cliente->endereco_rua }}</td>
                </tr>
                
                <tr>
                  <td><strong>Número</strong></td>
                  <td>{{ $cliente->endereco_numero }}</td>
                </tr>

                <tr>
                  <td><strong>Complemento</strong></td>
                  <td>{{ $cliente->endereco_complemento }}</td>
                </tr>

                <tr>
                  <td><strong>Estado</strong></td>
                  <td>{{ $cliente->endereco_estado }}</td>
                </tr>

                <tr>
                  <td><strong>Cidade</strong></td>
                  <td>{{ $cliente->endereco_cidade }}</td>
                </tr>

                <tr>
                  <td><strong>Bairro</strong></td>
                  <td>{{ $cliente->endereco_bairro }}</td>
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
                  <td class="td-content">{{ $cliente->rg }}</td>
                </tr>

                <tr>
                  <td><strong>CPF</strong></td>
                  <td>{{ $cliente->cpf }}</td>
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
