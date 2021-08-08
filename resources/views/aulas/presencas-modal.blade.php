<div class="modal fade" id="presencasModal" tabindex="-1" role="dialog" aria-labelledby="presencasModalLabel"
  aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="presencasModalLabel">Definir presenças</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{ route('aulas.definirPresencas', ['aula_id' => $aula->id]) }}" method="post">
        @csrf
        <div class="modal-body">
          <table class="table">
            <thead>
              <th>Foto</th>
              <th>Aluno</th>
              <th>Origem</th>
              <th>Presente?</th>
              <th>Motivo Falta</th>
            </thead>

            <tbody>
              @foreach ($alunosEsperados as $aluno)
                <tr>
                  <td>
                    <img class="table-avatar" src="{{ $aluno->foto_url }}">
                  </td>
                  <td>
                    <input type="hidden" name="alunos[{{ $loop->index }}][id]" value="{{ $aluno->id }}">
                    {{ $aluno->nome }}
                  </td>
                  <td>
                    {{ $aluno->diario->origem }}
                  </td>
                  <td>
                    <select name="alunos[{{ $loop->index }}][presente]" class="form-control">
                      <option value="0">Indefinido</option>
                      <option value="1" {{ $aluno->diario->presente == 1 ? 'selected' : '' }}>Sim</option>
                      <option value="2" {{ $aluno->diario->presente == 2 ? 'selected' : '' }}>Não</option>
                    </select>
                  </td>
                  <td>
                    <textarea name="alunos[{{ $loop->index }}][motivo_falta]" class="form-control" cols="30" rows="2">{{ $aluno->diario->motivo_falta }}</textarea>
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save changes</button>
        </div>
      </form>
    </div>
  </div>
</div>