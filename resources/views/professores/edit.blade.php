@extends('adminlte::page')

@section('title', 'Editar Professor')

@section('content_header')
    <div class="row mb-2">
        <div class="col-md-6">
            <h1><i class="fa fa-user-edit"></i> Editar cadastro do Professor: {{ $professor->nome }}</h1>
        </div>
        <div class="col-md-6">
            <div class="float-sm-right">
                {{ Breadcrumbs::render('professores.edit', $professor) }}
            </div>
        </div>
    </div>
@stop

@section('content')

@include('parciais.validation-errors')

<div class="row">
    <form class="row col-md-12" action="{{ route('professores.update', ['professor' => $professor->id]) }}" method="post" enctype="multipart/form-data">
    @method('PUT')
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
                            <label for="inputNome">Nome</label>
                            <input type="text" class="form-control" id="inputNome" name="nome" placeholder="Digite o nome" value="{{ $professor->nome }}" required autofocus>
                        </div>

                        <div class="form-group">
                            <label for="inputEmail">E-mail</label>
                            <input type="email" class="form-control" id="inputEmail" name="email" placeholder="fulano@gmail.com" value="{{ $professor->email }}">
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-6">
                                <label for="inputTelefone">Telefone</label>
                                <input type="tel" class="form-control" id="inputTelefone" name="telefone" placeholder="(xx) xxxxx-xxxx" value="{{ $professor->telefone }}" required>
                            </div>

                            <div class="col-sm-6">
                                <label for="inputTelefone2">Telefone 2 (Opcional)</label>
                                <input type="tel" class="form-control" id="inputTelefone2" name="telefone2" placeholder="(xx) xxxxx-xxxx" value="{{ $professor->telefone2 }}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-8">
                                <label for="inputDataNascimento">Data de Nascimento</label>
                                <input type="date" class="form-control" id="inputDataNascimento" name="data_nascimento" value="{{ date('Y-m-d', strtotime($professor->data_nascimento)) }}">
                            </div>

                            <div class="col-sm-4">
                                <label for="inputSexo">Sexo</label>
                                <select class="form-control" name="sexo" id="inputSexo">
                                    <option value="Feminino">Feminino</option>
                                    <option value="Masculino" {{ $professor->sexo == "Masculino" ? "selected = 'selected'" : '' }}>Masculino</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                          <label for="inputCpf">CPF</label>
                          <input type="number" class="form-control" id="inputCpf" name="cpf" placeholder="Digite o CPF" value="{{ $professor->cpf }}">
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
                            <input type="file" name="foto" id="inputFoto" accept="image/png, image/jpeg, image/gif" >
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
                            minlength="5" maxlength="8" value="{{ $professor->cep }}">
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-6">
                                <label for="inputRua">Rua</label>
                                <input type="text" class="form-control" id="inputRua" name="endereco_rua" placeholder="Nome da rua/avenida" value="{{ $professor->endereco_rua }}">
                            </div>

                            <div class="col-sm-2">
                                <label for="inputNumero">Número</label>
                                <input type="number" class="form-control" id="inputNumero" name="endereco_numero" placeholder="" value="{{ $professor->endereco_numero }}">
                            </div>

                            <div class="col-sm-4">
                                <label for="inputComplemento">Complemento (Opcional)</label>
                                <input type="text" class="form-control" id="inputComplemento" name="endereco_complemento" placeholder="Ex: Casa, Apartamento" value="{{ $professor->endereco_complemento }}">
                            </div>
                        </div>


                        <div class="form-group">
                            <label for="inputEstado">Estado</label>
                            <input type="text" class="form-control" id="inputEstado" name="endereco_estado" value="{{ $professor->endereco_estado }}">
                        </div>

                        <div class="form-group">
                            <label for="inputCidade">Cidade</label>
                            <input type="text" class="form-control" id="inputCidade" name="endereco_cidade" value="{{ $professor->endereco_cidade }}">
                        </div>

                        <div class="form-group">
                            <label for="inputBairro">Bairro</label>
                            <input type="text" class="form-control" id="inputBairro" name="endereco_bairro" value="{{ $professor->endereco_bairro }}">
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
                                <label for="inputProfissao">Formação</label>
                                <select id="profissao" name="profissao" id="inputProfissao" class="form-control">
                                    <option value="1" {{ $professor->profissao == 1 ? "selected" : ""}}>Fisioterapeuta</option>
                                    <option value="2" {{ $professor->profissao == 2 ? "selected" : ""}}>Terapeuta Ocupacional</option>
                                    <option value="3" {{ $professor->profissao == 3 ? "selected" : ""}}>Educador Físico</option>
                                </select>
                            </div>
                            <div class="col-md-8">
                                <label id="inputRegistroProfissional" for="inputRegistroProfissional">CREFITO</label>
                                <input type="text" class="form-control" name="registro_profissional" id="inputRegistroProfissional"
                                value="{{ $professor->registro_profissional }}">
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

@stop

@section('js')
<script>
    const selectProfissao = document.querySelector("#profissao");

    selectProfissao.addEventListener('change', (event) => {
        const labelRegistro = document.querySelector("#inputRegistroProfissional");
        console.log(selectProfissao.value);
        if(selectProfissao.value == 1 || selectProfissao.value == 2){
            labelRegistro.innerText = 'CREFITO';
        }else{
            labelRegistro.innerText = 'CREF';
        } 
    })
</script>

<script src="/js/viacep.js"></script>
@stop
