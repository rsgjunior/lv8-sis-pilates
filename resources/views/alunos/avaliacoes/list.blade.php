<div class="card">
  <div class="card-header">
    <h3 class="card-title">Fichas de Avaliação</h3>
    
    <div class="card-tools">
      
    </div>
  </div>
  <!-- /.card-header -->
  <div class="card-body">
    <table class="table">
      <thead>
        <tr>
          <th style="width: 10px">ID</th>
          <th>Nome</th>
          <th>Data</th>
          <th>Ações</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($avaliacoes as $avaliacao)
          <tr>
            <td>{{ $avaliacao->id }}</td>
            <td><a href="{{ route('avaliacoes.show', ['avaliacao'=>$avaliacao->id]) }}">Avaliação {{ $loop->index }}</a></td>
            <td>{{ date('d/m/Y, H:i', strtotime($avaliacao->created_at)) }}</td>
            <td>
              <a class="d-inline-block btn btn-primary btn-sm" href="{{ route('avaliacoes.show', ['avaliacao'=>$avaliacao->id]) }}">
                <i class="fa fa-eye"></i> Ver
              </a>

              <a class="d-inline-block btn btn-info btn-sm" href="{{ route('avaliacoes.edit', ['avaliacao'=>$avaliacao->id]) }}">
                <i class="fa fa-edit"></i> Editar
              </a>

              <form class="d-inline-block" action="{{ route('avaliacoes.destroy', ['avaliacao'=>$avaliacao->id]) }}" method="post">
              @csrf
              @method('DELETE')
                <button type="submit" class="btn btn-danger btn-sm">
                  <i class="fa fa-trash" aria-hidden="true"></i>
                  Excluir        
                </button>
              </form>
              
          </td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>
  <div class="card-footer">
    <a href="{{ route('avaliacoes.create', ['aluno_id'=> $aluno->id]) }}" class="btn btn-primary btn-sm">
      <i class="fa fa-plus-circle"></i> Nova Avaliação
    </a>

    <ul class="pagination pagination-sm float-right mb-0">
      {{ $avaliacoes->links() }}
    </ul>
  </div>
  <!-- /.card-body -->
</div>