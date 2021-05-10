<!-- The Modal -->
<div class="modal fade" id="createPilatesClassModal">
    <form action="{{ route('turmas.store') }}" method="post">
    @csrf
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Criar uma nova turma</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                
                <!-- Modal body -->
                <div class="modal-body">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="inputNome">Nome</label>
                            <input type="text" class="form-control" id="inputNome" name="nome" placeholder="Um nome para a turma" required>
                        </div>

                        <div class="form-group">
                            <label for="inputDescricao">Descrição</label>
                            <textarea class="form-control" id="inputDescricao" name="descricao" cols="30" rows="5"></textarea>
                        </div>
                    </div>
                </div>
                
                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">
                        <i class="fa fa-check"></i> Confirmar
                    </button>
                </div>
            </div>
        </div>
    </form>
</div>