@extends('adminlte::page')

@section('title', 'Cadastrar Aluno')

@section('content_header')
    <div class="row mb-2">
        <div class="col-md-6">
            <h1><i class="fa fa-user-plus"></i> Cadastrar novo aluno</h1>
        </div>
        <div class="col-md-6">
            <div class="float-sm-right">
                {{ Breadcrumbs::render('alunos.create') }}
            </div>
        </div>
    </div>
@stop

@section('content')

    @include('parciais.validation-errors')

    <div class="row">
        <form class="row col-md-12" action="{{ route('alunos.store') }}" method="post" enctype="multipart/form-data">
            @csrf
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
                            <label for="inputNome" class="text-danger">Nome *</label>
                            <input type="text" class="form-control" id="inputNome" name="nome" placeholder="Digite o nome"
                                value="{{ old('nome') }}" required autofocus>
                        </div>

                        <div class="form-group">
                            <label for="inputEmail">E-mail</label>
                            <input type="email" class="form-control" id="inputEmail" name="email"
                                placeholder="fulano@gmail.com" value="{{ old('email') }}">
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-12">
                                <label for="inputTelefone" class="text-danger">Telefone *</label>
                                <input type="tel" class="form-control" id="inputTelefone" name="telefone"
                                    placeholder="(xx) xxxxx-xxxx" value="{{ old('telefone') }}" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-8">
                                <label for="inputDataNascimento">Data de Nascimento</label>
                                <input type="date" class="form-control" id="inputDataNascimento" name="data_nascimento"
                                    value="{{ old('data_nascimento') }}">
                            </div>

                            <div class="col-sm-4">
                                <label for="inputSexo">Sexo</label>
                                <select class="form-control" name="sexo" id="inputSexo">
                                    <option value="Feminino">Feminino</option>
                                    <option value="Masculino"
                                        {{ old('sexo') == 'Masculino' ? "selected = 'selected'" : '' }}>Masculino
                                    </option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="inputProfissao">Profissão</label>
                            <input type="text" class="form-control" id="inputProfissao" name="profissao"
                                placeholder="Digite a profissão" value="{{ old('profissao') }}">
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
                        <div class="form-group">
                            <label for="inputFoto">Foto</label>
                            <input type="file" name="foto" id="inputFoto" accept="image/png, image/jpeg, image/gif">
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
                                minlength="5" maxlength="8" value="{{ old('cep') }}"
								data-toggle="tooltip" data-placement="top" title="Digite o CEP para carregar as informações automaticamente" >
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-6">
                                <label for="inputRua">Rua</label>
                                <input type="text" class="form-control" id="inputRua" name="endereco_rua"
                                    placeholder="Insira o número do CEP" value="{{ old('endereco_rua') }}">
                            </div>

                            <div class="col-sm-2">
                                <label for="inputNumero">Número</label>
                                <input type="number" class="form-control" id="inputNumero" name="endereco_numero"
                                    placeholder="" value="{{ old('endereco_numero') }}">
                            </div>

                            <div class="col-sm-4">
                                <label for="inputComplemento">Complemento</label>
                                <input type="text" class="form-control" id="inputComplemento" name="endereco_complemento"
                                    value="{{ old('endereco_complemento') }}">
                            </div>
                        </div>


                        <div class="form-group">
                            <label for="inputEstado">Estado</label>
                            <input type="text" class="form-control" id="inputEstado" name="endereco_estado"
                                placeholder="Insira o número do CEP" value="{{ old('endereco_estado') }}">
                        </div>

                        <div class="form-group">
                            <label for="inputCidade">Cidade</label>
                            <input type="text" class="form-control" id="inputCidade" name="endereco_cidade"
                                placeholder="Insira o número do CEP" value="{{ old('endereco_cidade') }}">
                        </div>

                        <div class="form-group">
                            <label for="inputBairro">Bairro</label>
                            <input type="text" class="form-control" id="inputBairro" name="endereco_bairro"
                                placeholder="Insira o número do CEP" value="{{ old('endereco_bairro') }}">
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
                                value="{{ old('rg') }}">
                        </div>

                        <div class="form-group">
                            <label for="inputCpf">CPF</label>
                            <input type="number" class="form-control" id="inputCpf" name="cpf" placeholder="Digite o CPF"
                                value="{{ old('cpf') }}">
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

    <script src="/js/viacep.js"></script>

    <script>
        $(function() {
            $('[data-toggle="tooltip"]').tooltip()
        })
    </script>

@stop
