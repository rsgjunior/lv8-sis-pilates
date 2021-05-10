<div class="card">
  <div class="card-header">
    <h3 class="card-title">Fichas de Avaliação</h3>
    
    <div class="card-tools">
      
    </div>
  </div>
  <!-- /.card-header -->
  <div class="card-body p-0">
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
        @foreach ($avaliations as $avaliation)
          <tr>
            <td>{{ $avaliation->id }}</td>
            <td><a href="">{{ $avaliation->nome }}</a>Avaliação {{ $loop->index }}</td>
            <td>{{ date('d/m/Y, h:i', strtotime($avaliation->created_at)) }}</td>
            <td>
              <a class="d-inline-block btn btn-primary btn-sm" href="{{ route('avaliation.show', ['avaliation'=>$avaliation->id]) }}">
                <i class="fa fa-eye"></i> Ver
              </a>

              <a class="d-inline-block btn btn-info btn-sm" href="http://">
                <i class="fa fa-edit"></i> Editar
              </a>

              <form class="d-inline-block" action="{{ route('avaliation.destroy', ['avaliation'=>$avaliation->id]) }}" method="post">
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
    <a href="{{ route('avaliation.create', ['idClient'=>$client->id]) }}" class="btn btn-primary btn-sm">
      <i class="fa fa-plus-circle"></i> Nova Avaliação
    </a>

    <ul class="pagination pagination-sm float-right mb-0">
      {{ $avaliations->links() }}
    </ul>
  </div>
  <!-- /.card-body -->
</div>