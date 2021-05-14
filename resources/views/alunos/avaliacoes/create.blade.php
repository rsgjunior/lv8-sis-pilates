@extends('adminlte::page')

@section('title', 'Criando Avaliação')

@section('content_header')
      <h1>Nova avaliação para {{ $aluno->nome }}</h1>

@stop

@section('content')
    @include('parciais.validation-errors')

    <form action="{{ route('avaliacoes.store') }}" method="post" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="aluno_id" value="{{ $aluno->id }}" hidden>

        <div class="row">
            <div class="col-md-12">
                <div class="card card-default">
                    <div class="card-header">
                    <h3 class="card-title">Informações Físicas</h3>
        
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body" style="display: block;">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputPeso">Peso</label>
                                <input type="number" class="form-control" id="exampleInputPeso" name="peso" placeholder="Entre com o peso">
                            </div>
                        <!-- /.form-group -->
                        
                        </div>
                        <!-- /.col -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputAltura">Altura</label>
                                <input type="number" class="form-control" id="exampleInputAltura" name="altura" placeholder="Entre com a altura">
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
                    <h3 class="card-title">Informações Pessoais</h3>
        
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body" style="display: block;">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputAtividade">Atividades Física</label>
                                <input type="text" class="form-control" id="exampleInputAtividade" name="atividade_fisica" placeholder="Enter email">
                            </div>
    
                            <div class="form-group">
                                <label for="exampleInputObjetivo">Objetivo</label>
                                <input type="text" class="form-control" id="exampleInputObjetivo" name="objetivo" placeholder="Enter email">
                            </div>
                        <!-- /.form-group -->
                        
                        </div>
                        <!-- /.col -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputConhece">Conhece ou já praticou Pilates</label>
                                <select class="form-control" name="conhece_ou_praticou" id="">
                                    <option value="1" default>Sim</option>
                                    <option value="0">Não</option>
                                </select>
                            </div>
    
                            <div class="form-group">
                                <label for="exampleInputMedicamentos">Medicamentos</label>
                                <input type="text" class="form-control" name="medicamentos" id="exampleInputMedicamentos" placeholder="Enter email">
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
                    <!-- /.card-header -->
                    <div class="card-body" style="display: block;">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Queixa Principal</label>
                                <textarea class="form-control" name="queixa_principal" id="" cols="30" rows="3"></textarea>
                            </div>
    
                            <div class="form-group">
                                <label for="exampleInputEmail1">História Médica Atual</label>
                                <textarea class="form-control" name="historia_medica_atual" id="" cols="30" rows="3"></textarea>
                            </div>
    
                            <div class="form-group">
                                <label for="exampleInputEmail1">Fatores que pioram</label>
                                <textarea class="form-control" name="fatores_que_pioram" id="" cols="30" rows="3"></textarea>
                            </div>
                        <!-- /.form-group -->
                        
                        </div>
                        <!-- /.col -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputEmail1">História Médica Passada</label>
                                <textarea class="form-control" name="historia_medica_passada" id="" cols="30" rows="3"></textarea>
                            </div>
    
                            <div class="form-group">
                                <label for="exampleInputEmail1">Fatores que melhoram</label>
                                <textarea class="form-control" name="fatores_que_melhoram" id="" cols="30" rows="3"></textarea>
                            </div>
    
                            <div class="form-group">
                                <label for="exampleInputEmail1">Observações</label>
                                <textarea class="form-control" name="observacao" id="" cols="30" rows="3"></textarea>
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
                        <h3 class="card-title">Exames Complementares</h3> 
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        
                        <div class="row">
                            <div class="form-group col-md-12">
                                <label for="inputExames">Selecionar os exames</label>
                                <div class="input-group mb-3">
                                    <input type="file" class="form-control-file" name="exames[]" id="inputExames" data-max-file-size="3MB" data-max-files="10" multiple>
                                </div>
                            </div>
                            <div id="appendExames" class="form-group col-md-12">
                                
                            </div>
                        </div>
                    <!-- /.row -->
                    </div>
                </div>
    
                
            </div>

                <div class="col-md-12 mb-4">
                    <div class="card-footer">
                        <a class="btn btn-default" href="{{ route('alunos.show', ['aluno'=>$aluno->id]) }}">
                            <i class="fa fa-arrow-left"></i> Voltar
                        </a>

                        <button class="btn btn-primary float-right">
                            <i class="fa fa-save"></i> Salvar
                        </button>
                    </div>
                </div>


        </div>
    
        
    </form>
@stop

@section('css')

@stop

@section('js')
    <script src="{{ url('js/exames.js') }}"></script>
@stop
