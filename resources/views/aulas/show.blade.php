@extends('adminlte::page')

@section('title', 'Visualizando Aula')

@section('content_header')
    <div class="row mb-2">
        <div class="col-md-6">
            <h1>Aula</h1>
        </div>
        <div class="col-md-6">
            <div class="float-sm-right">
                Breadcrumb
            </div>
        </div>
    </div>
@stop

@section('content')

<div class="row">
  <div class="col-12">

    <div class="invoice p-3 mb-3">
      <div class="row">
        <div class="col-12">
          <h4>
            <i class="fas fa-group"></i> Alunos esperados para aula
            <small class="float-right">
              <a href="" 
                class="btn btn-outline-success" data-toggle="modal" data-target="#matricularModal">
              <i class="fas fa-plus-circle"></i> Matricular Aluno</a>
            </small>
          </h4>
        </div>
        <!-- /.col -->
      </div>

      <!-- Table row -->
      <div class="row">
        <div class="col-12 table-responsive mb-3">
          <table class="table table-striped">
            <thead>
            <tr>
              <th>Foto</th>
              <th>Nome</th>
              <th>Data da Inscrição</th>
              <th>Ações</th>
            </tr>
            </thead>
            <tbody>
              @forelse ($aula->turma->alunos as $aluno)

                <tr>
                  <td>
                    <img 
                      class="table-avatar"
                      @if($aluno->foto)
                        src="{{ url('/storage/fotos/'. $aluno->id . '/' . $aluno->foto) }}" 
                      @else
                        src="{{ url('/img/default.jpg') }}" 
                      @endif
                    >
                  </td>
                  <td><a href="{{ route('alunos.show', ['aluno'=>$aluno->id]) }}">{{ $aluno->nome }}</a></td>
                  <td>{{ date('d/m/Y', strtotime($aluno->pivot->created_at)) }}</td>
                  <td>
                    <a class="btn btn-info btn-sm" href="{{ route('alunos.show', ['aluno'=>$aluno->id]) }}">
                      <i class="fa fa-eye"></i>
                    </a>
                    <form class="d-inline" action="" method="post">
                      @csrf
                      @method('DELETE')

                      <button class="btn btn-danger btn-sm">
                        <i class="fa fa-times-circle"></i>
                      </button>
                    </form>
                  </td>
                </tr>
              @empty
                  <p>Não tem ninguém matriculado nesta turma</p>
              @endforelse
            
            </tbody>
          </table>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

      
    </div>
    <!-- /.invoice -->
  </div><!-- /.col -->
</div>

@stop

@section('css')
<style>
  .table-avatar {
    border-radius: 50%;
    width: 2.5rem;
  }
</style>
@stop

@section('js')

@stop
