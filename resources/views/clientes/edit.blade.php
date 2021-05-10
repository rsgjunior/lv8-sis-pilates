@extends('adminlte::page')

@section('title', 'Editar Aluno: ' . $cliente->nome)

@section('content_header')
    <h1><i class="fa fa-user-plus"></i> Editar aluno: {{ $cliente->nome }}</h1>
@stop

@section('content')

@include('parciais.validation-errors')

<div class="row">
    <form class="row col-md-12" action="{{ route('clientes.update', ['cliente' => $cliente->id]) }}" method="post" enctype="multipart/form-data">
    @csrf
    @method('PUT')
        <!-- left column -->
        <div class="col-md-6">
            <!-- general form elements -->
            <div class="card">
                <div class="card-header">
                <h3 class="card-title">Informações Pessoais</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                    <div class="card-body">
                        <div class="form-group">
                            <label for="inputNome">Nome</label>
                            <input type="text" class="form-control" id="inputNome" name="nome" placeholder="Digite o nome" value="{{ $cliente->nome }}" required autofocus>
                        </div>

                        <div class="form-group">
                            <label for="inputEmail">E-mail</label>
                            <input type="email" class="form-control" id="inputEmail" name="email" placeholder="fulano@gmail.com" value="{{ $cliente->email }}" >
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-6">
                                <label for="inputTelefone">Telefone</label>
                                <input type="tel" class="form-control" id="inputTelefone" name="telefone" placeholder="(xx) xxxxx-xxxx" value="{{ $cliente->telefone }}" >
                            </div>

                            <div class="col-sm-6">
                                <label for="inputTelefone2">Telefone 2 (Opcional)</label>
                                <input type="tel" class="form-control" id="inputTelefone2" name="telefone2" placeholder="(xx) xxxxx-xxxx" value="{{ $cliente->telefone2 }}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-8">
                                <label for="inputDataNascimento">Data de Nascimento</label>
                                <input type="date" class="form-control" id="inputDataNascimento" name="data_nascimento" value="{{ date('Y-m-d', strtotime($cliente->data_nascimento)) }}" >
                            </div>

                            <div class="col-sm-4">
                                <label for="inputSexo">Sexo</label>
                                <select class="form-control" name="sexo" id="inputSexo">
                                    <option value="Feminino">Feminino</option>
                                    <option value="Masculino" {{ $cliente->sexo == 'Masculino' ? "selected='selected'" : "" }}>Masculino</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="inputProfissao">Profissão</label>
                            <input type="text" class="form-control" id="inputProfissao" name="profissao" placeholder="Digite a profissão" value="{{ $cliente->profissao }}" >
                        </div>

                    </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->


            <div class="card">
                <div class="card-header">
                <h3 class="card-title">Foto do Perfil</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                    <div class="card-body">
                        <div class="form-group row">
                            <div class="form-group col-md-2">
                                <img class="profile-user-img img-fluid img-circle" 
                                @if($cliente->foto)
                                    src="{{ url('/storage/fotos/'. $cliente->id . '/' . $cliente->foto) }}" 
                                @else
                                    src="{{ url('/img/default.jpg') }}" 
                                @endif
                                alt="User profile picture">
                            </div>

                            <div class="form-group col-md-10">
                                <label for="">Selecione uma nova foto</label>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" name="foto" id="inputFoto">
                                    <label class="custom-file-label" for="inputFoto">Selecione a foto</label>
                                </div>

                                <input type="checkbox" class="mt-3" id="removerFoto" name="removerFoto">
                                <label class="form-check-label" for="removerFoto">Remover a foto atual do aluno</label>
                            </div>
                        </div>

                    </div>
                <!-- /.card-body -->
            </div>
        </div>
        <!-- /.left column -->


        <!-- right column -->
        <div class="col-md-6">
            <!-- general form elements -->
            <div class="card">
                <div class="card-header">
                <h3 class="card-title">Endereço</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                    <div class="card-body">
                        <div class="form-group">
                            <label for="inputCep">CEP</label>
                            <input type="number" class="form-control" id="inputCep" name="cep" placeholder="Digite o CEP" 
                            minlength="5" maxlength="8" value="{{ $cliente->cep }}">
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-6">
                                <label for="inputRua">Rua</label>
                                <input type="text" class="form-control" id="inputRua" name="endereco_rua" placeholder="Nome da rua/avenida" value="{{ $cliente->endereco_rua }}" >
                            </div>

                            <div class="col-sm-2">
                                <label for="inputNumero">Número</label>
                                <input type="number" class="form-control" id="inputNumero" name="endereco_numero" placeholder="" value="{{ $cliente->endereco_numero }}">
                            </div>

                            <div class="col-sm-4">
                                <label for="inputComplemento">Complemento (Opcional)</label>
                                <input type="text" class="form-control" id="inputComplemento" name="endereco_complemento" value="{{ $cliente->endereco_complemento }}" placeholder="Ex: Casa, Apartamento">
                            </div>
                        </div>


                        <div class="form-group">
                            <label for="inputEstado">Estado</label>
                            <input type="text" class="form-control" id="inputEstado" name="endereco_estado" value="{{ $cliente->endereco_estado }}" >
                        </div>

                        <div class="form-group">
                            <label for="inputCidade">Cidade</label>
                            <input type="text" class="form-control" id="inputCidade" name="endereco_cidade" value="{{ $cliente->endereco_cidade }}" >
                        </div>

                        <div class="form-group">
                            <label for="inputBairro">Bairro</label>
                            <input type="text" class="form-control" id="inputBairro" name="endereco_bairro" value="{{ $cliente->endereco_bairro }}" >
                        </div>
                    </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->

            <div class="card">
                <div class="card-header">
                <h3 class="card-title">Documentos</h3>
                </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="inputRg">RG</label>
                            <input type="number" class="form-control" id="inputRg" name="rg" placeholder="Digite o RG" 
                            minlength="8" maxlength="14" value="{{ $cliente->rg }}" >
                        </div>

                        <div class="form-group">
                            <label for="inputCpf">CPF</label>
                            <input type="number" class="form-control" id="inputCpf" name="cpf" placeholder="Digite o CPF" 
                            minlength="11" maxlength="11" value="{{ $cliente->cpf }}" >
                        </div>
                    </div>
            </div>

        </div>
        <!-- /.right column -->

        <div class="col-md-12 mb-5">
            <div class="card-footer">
                <a href="{{ url()->previous() }}" class="btn btn-default">
                    <i class="fa fa-arrow-left"></i> Voltar
                </a>
                <button type="submit" class="btn btn-primary float-right">
                    <i class="fa fa-save"></i> Salvar
                </button>
            </div>
        </div>
    </form>
</div>
@stop

@section('css')

@stop

@section('js')
    
@stop
