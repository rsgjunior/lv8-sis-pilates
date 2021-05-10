@extends('adminlte::page')

@section('title', 'Criando Avaliação')

@section('content_header')
      <h1>Nova avaliação para {{ $client->nome }}</h1>

@stop

@section('content')

    <form action="{{ route('avaliation.store') }}" method="post" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="client_id" value="{{ $client->id }}">

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
                                <label for="inputExames">Exames</label>
                                <input type="file" name="exames[]" id="inputExames" multiple data-allow-reorder="true" data-max-file-size="3MB" data-max-files="3">
                            </div>
                        </div>
                    <!-- /.row -->
                    </div>
                </div>
    
                
            </div>

                <div class="col-md-12 mb-4">
                    <div class="card-footer">
                        <a class="btn btn-default" href="{{ route('client.show', ['client'=>$client->id]) }}">
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

<link href="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.css" rel="stylesheet">

@stop

@section('js')

<script src="https://unpkg.com/filepond-plugin-file-validate-type/dist/filepond-plugin-file-validate-type.js"></script>
<script src="https://unpkg.com/filepond-plugin-image-exif-orientation/dist/filepond-plugin-image-exif-orientation.js"></script>
<script src="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.js"></script>
<script src="https://unpkg.com/filepond-plugin-image-crop/dist/filepond-plugin-image-crop.js"></script>
<script src="https://unpkg.com/filepond-plugin-image-resize/dist/filepond-plugin-image-resize.js"></script>
<script src="https://unpkg.com/filepond-plugin-image-transform/dist/filepond-plugin-image-transform.js"></script>
<script src="https://unpkg.com/filepond-plugin-image-edit/dist/filepond-plugin-image-edit.js"></script>
<script src="https://unpkg.com/filepond-plugin-file-validate-size/dist/filepond-plugin-file-validate-size.js"></script>

<script>
    FilePond.registerPlugin(
      FilePondPluginImagePreview,
      FilePondPluginImageExifOrientation,
      FilePondPluginFileValidateSize,
      FilePondPluginImageEdit
    );

    const inputElement = document.querySelector('input[id="inputExames"]');

    FilePond.create(inputElement);

    FilePond.setOptions({
        server: {
            url: '/upload/exams',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            }
        } 
    });

</script>

@stop
