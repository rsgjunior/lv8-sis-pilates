@extends('adminlte::page')

@section('title', 'Nova experimental')

@section('content_header')
    <h1>
        Experimental #{{ $experimental->id }}
        <button type="button" class="btn btn-sm btn-warning dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
            <i class="fas fa-lg fa-tools"></i>
        </button>
        <ul class="dropdown-menu" x-placement="bottom-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(-10px, 38px, 0px);">
            <li>
                <a href="{{ route('experimentais.edit', $experimental) }}" class="dropdown-item">
                    <i class="fa fa-fw fa-edit" aria-hidden="true"></i>
                    Editar        
                </a>
            </li>
            <li>
              <form action="{{ route('experimentais.destroy', $experimental) }}" method="post">
                @csrf
                @method('DELETE')
                  <button type="submit" class="dropdown-item">
                    <i class="fa fa-fw fa-trash" aria-hidden="true"></i> 
                    Excluir        
                  </button>
              </form>
            </li>
        </ul>
    </h1>
@stop

@section('content')
<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
              <h3 class="card-title">Informações</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body p-0">
              <table class="table">
                <tbody>
                  <tr>
                    <td width="150px"><strong>Aluno<strong></td>
                    <td>
                      {{ $experimental->aluno->nome }}
                      <a href="{{ route('alunos.show', $experimental->aluno) }}">
                        (Ver Cadastro)
                      </a>
                    </td>
                  </tr>

                  <tr>
                    <td><strong>Telefone<strong></td>
                    <td>{{ $experimental->aluno->telefone }}</td>
                  </tr>

                  <tr>
                    <td><strong>Data<strong></td>
                    <td>{{ date('d/m/Y', strtotime($experimental->data)) }}</td>
                  </tr>

                  <tr>
                    <td><strong>Horário<strong></td>
                    <td>{{ date('H:i', strtotime($experimental->horario_inicio)) }} 
                        - {{ date('H:i', strtotime($experimental->horario_fim)) }}
                    </td>
                  </tr>

                  <tr>
                    <td><strong>Status<strong></td>
                    <td>{!! $experimental->status_badge !!}</td>
                  </tr>

                  <tr>
                    <td><strong>Cor calendário</strong></td>
                    <td>
                      <span style="color: {{ $experimental->cor_calendario }}">
                        <i class="fas fa-square"></i>
                      </span>
                      {{ $experimental->cor_calendario }}
                    </td>
                  </tr>

                  <tr>
                    <td><strong>Observação<strong></td>
                    <td>
                        @if($experimental->observacao)
                            {{ $experimental->observacao }}
                        @else
                            <i>Nenhuma observação</i>
                        @endif
                    </td>
                  </tr>

                  <tr>
                    <td><strong>Feedback<strong></td>
                    <td>
                        @if($experimental->feedback)
                            {{ $experimental->feedback }}
                        @else
                            <i>Nenhum feedback</i>
                        @endif
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
            <!-- /.card-body -->
        </div>
    </div>
</div>
@stop

@section('css')

@stop

@section('js')

@stop
