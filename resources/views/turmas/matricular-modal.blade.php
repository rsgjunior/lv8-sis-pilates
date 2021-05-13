<!-- The Modal -->
<div class="modal fade" id="matricularModal">
    <form action="{{ route('turmas.matricular') }}" method="post">
    @csrf
    <input type="hidden" name="turma_id" value="{{ $turma->id }}">

        <div class="modal-dialog modal-lg">
            <div class="modal-content">
      
                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Selecione o Aluno</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
        
                 <!-- Modal body -->
                <div class="modal-body">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Procurar</label>
              
                            <select class="select2 select2-hidden-accessible" name="alunos_id[]" multiple="multiple" data-placeholder="Selecione os alunos" style="width: 100%;" data-select2-id="7" tabindex="-1" aria-hidden="true">
                                @foreach ($alunos as $aluno)
                                <option data-select2-id="{{ $aluno->id }}" value="{{ $aluno->id }}">{{ $aluno->nome }}</option>
                                @endforeach
                                
                                
                            </select>
              
                        </div>
                    </div>
                </div>
        
                <!-- Modal footer -->
                <div class="modal-footer">
                <button type="submit" class="btn btn-primary">
                    <i class="fa fa-check"></i> Matricular
                </button>
                </div>
            </div>
        </div>
    </form>
</div>