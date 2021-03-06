@extends('adminlte::page')

@section('title', 'Cadastrar Professor')

@section('content_header')
    <div class="row mb-2">
        <div class="col-md-6">
            <h1><i class="fa fa-user-plus"></i> Cadastrar novo professor</h1>
        </div>
        <div class="col-md-6">
            <div class="float-sm-right">
                {{ Breadcrumbs::render('professores.create') }}
            </div>
        </div>
    </div>
@stop

@section('content')

    @include('parciais.validation-errors')

    <div class="row">
        <form class="row col-md-12" action="{{ route('professores.store') }}" method="post" enctype="multipart/form-data">
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
                            <label for="inputEmail" class="text-danger">E-mail *</label>
                            <input type="email" class="form-control" id="inputEmail" name="email"
                                placeholder="fulano@gmail.com" value="{{ old('email') }}">
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-6">
                                <label for="inputTelefone" class="text-danger">Telefone *</label>
                                <input type="tel" class="form-control" id="inputTelefone" name="telefone"
                                    placeholder="(xx) xxxxx-xxxx" value="{{ old('telefone') }}" required>
                            </div>

                            <div class="col-sm-6">
                                <label for="inputTelefone2">Telefone 2 (Opcional)</label>
                                <input type="tel" class="form-control" id="inputTelefone2" name="telefone2"
                                    placeholder="(xx) xxxxx-xxxx" value="{{ old('telefone2') }}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-8">
                                <label for="inputDataNascimento" class="text-danger">Data de Nascimento *</label>
                                <input type="date" class="form-control" id="inputDataNascimento" name="data_nascimento"
                                    value="{{ old('data_nascimento') }}">
                            </div>

                            <div class="col-sm-4">
                                <label for="inputSexo" class="text-danger">Sexo *</label>
                                <select class="form-control" name="sexo" id="inputSexo">
                                    <option value="Feminino">Feminino</option>
                                    <option value="Masculino"
                                        {{ old('sexo') == 'Masculino' ? "selected = 'selected'" : '' }}>Masculino</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="inputCpf" class="text-danger">CPF *</label>
                            <input type="number" class="form-control" id="inputCpf" name="cpf" placeholder="Digite o CPF"
                                value="{{ old('cpf') }}">
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
                            <label for="inputCep" class="text-danger">CEP *</label>
                            <input type="number" class="form-control" id="inputCep" name="cep" placeholder="Digite o CEP"
                                minlength="5" maxlength="8" value="{{ old('cep') }}">
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-6">
                                <label for="inputRua" class="text-danger">Rua *</label>
                                <input type="text" class="form-control" id="inputRua" name="endereco_rua"
                                    placeholder="Insira o número do CEP" value="{{ old('endereco_rua') }}">
                            </div>

                            <div class="col-sm-2">
                                <label for="inputNumero" class="text-danger">Número *</label>
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
                            <label for="inputEstado" class="text-danger">Estado *</label>
                            <input type="text" class="form-control" id="inputEstado" name="endereco_estado"
                                placeholder="Insira o número do CEP" value="{{ old('endereco_estado') }}">
                        </div>

                        <div class="form-group">
                            <label for="inputCidade" class="text-danger">Cidade *</label>
                            <input type="text" class="form-control" id="inputCidade" name="endereco_cidade"
                                placeholder="Insira o número do CEP" value="{{ old('endereco_cidade') }}">
                        </div>

                        <div class="form-group">
                            <label for="inputBairro" class="text-danger">Bairro *</label>
                            <input type="text" class="form-control" id="inputBairro" name="endereco_bairro"
                                placeholder="Insira o número do CEP" value="{{ old('endereco_bairro') }}">
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->

                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Profissional</h3>
                    </div>
                    <div class="card-body">
                        <div class="form-group row">
                            <div class="col-md-4">
                                <label for="inputProfissao" class="text-danger">Formação *</label>
                                <select id="profissao" name="profissao" id="inputProfissao" class="form-control">
                                    <option value="1" {{ old('profissao') == 1 ? 'selected' : '' }}>Fisioterapeuta
                                    </option>
                                    <option value="2" {{ old('profissao') == 2 ? 'selected' : '' }}>Terapeuta
                                        Ocupacional</option>
                                    <option value="3" {{ old('profissao') == 3 ? 'selected' : '' }}>Educador Físico
                                    </option>
                                </select>
                            </div>
                            <div class="col-md-8">
                                <label id="inputRegistroProfissional" for="inputRegistroProfissional"
                                    class="text-danger">CREFITO</label> <span class="text-danger">*</span>
                                <input type="text" class="form-control" name="registro_profissional"
                                    id="inputRegistroProfissional" value="{{ old('registro_profissional') }}">
                            </div>
                        </div>


                    </div>
                </div>

            </div>
            <!-- /.right column -->

            <div class="col-md-12 mb-5">
                <div class="card-footer">
                    <a href="{{ route('professores.index') }}" class="btn btn-default">
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
    <style>
        #inputRua,
        #inputEstado,
        #inputCidade,
        #inputBairro {
            pointer-events: none;
        }

    </style>

@stop

@section('js')
    <script>
        const selectProfissao = document.querySelector("#profissao");

        selectProfissao.addEventListener('change', (event) => {
            const labelRegistro = document.querySelector("#inputRegistroProfissional");
            console.log(selectProfissao.value);
            if (selectProfissao.value == 1 || selectProfissao.value == 2) {
                labelRegistro.innerText = 'CREFITO';
            } else {
                labelRegistro.innerText = 'CREF';
            }
        })
    </script>

    <script src="/js/viacep.js"></script>

@stop
