<!-- The Modal -->
<div class="modal fade" id="createTimeClassModal">
    <form action="{{ route('horarios.store') }}" method="post">
        @csrf
        <input type="text" name="turma_id" value="{{ $turma->id }}" hidden>
        
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Cadastrar horário</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                
                <!-- Modal body -->
                <div class="modal-body">
                    <div class="col-md-12">
                            <div class="form-group">
                                <label for="inputDia">Dias da semana</label>

                                <select class="select2 select2-hidden-accessible" name="dias_da_semana[]" multiple="multiple" data-placeholder="Selecione os dias da semana" style="width: 100%">
                                    <option value="0">Domingo</option>
                                    <option value="1">Segunda-Feira</option>
                                    <option value="2">Terça-Feira</option>
                                    <option value="3">Quarta-Feira</option>
                                    <option value="4">Quinta-Feira</option>
                                    <option value="5">Sexta-Feira</option>
                                    <option value="6">Sábado</option>
                                </select>
                            </div>
                            
                            <div class="form-group row">
                                <div class="form-group col-md-6">
                                    <label for="inputHorarioInicio">Horário Início</label>
                                    <input type="time" class="form-control" id="inputHorarioInicio" name="horario_inicio" required>
                                </div>
                                
                                <div class="form-group col-md-6">
                                    <label for="inputHorarioFim">Horário Fim</label>
                                    <input type="time" class="form-control" id="inputHorarioFim" name="horario_fim" required>
                                </div>
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