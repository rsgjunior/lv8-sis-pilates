@extends('adminlte::page')

@section('title', 'Lista de Alunos')

@section('content_header')
    <div class="row mb-2">
        <div class="col-md-6">
            @if ($pesquisa)
                <h1>Pesquisando por: "{{ $pesquisa }}" - Critério: {{ array_search($criterio, $criteriosValidos) }}
                </h1>
            @else
                <h1>Lista de Alunos ({{ $qtdAlunos }})</h1>
            @endif
        </div>
        <div class="col-md-6">
            <div class="float-sm-right">
                {{ Breadcrumbs::render('alunos.index') }}
            </div>
        </div>
    </div>

@stop

@section('content')

    <!-- Modal Pesquisa -->
    <div class="modal fade" id="modalPesquisar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">Pesquisar Aluno</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                </div>
                <form action="" method="get">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="inputCriterio">Critério</label>
                            <select name="criterio" id="inputCriterio" class="form-control">
                                @while ($criterioValue = current($criteriosValidos))
                                    <option value="{{ $criterioValue }}"
                                        {{ $criterioValue == $criterio ? 'selected' : '' }}>{{ key($criteriosValidos) }}
                                    </option>
                                    {{ next($criteriosValidos) }}
                                @endwhile
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="inputPesquisa">Pesquisa</label>
                            <input type="text" id="inputPesquisa" name="pesquisa" class="form-control"
                                placeholder="Digite o valor que deseja procurar" value="{{ $pesquisa }}">
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                        <button type="submit" class="btn btn-primary">Pesquisar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Fim Modal Pesquisa -->

    <div class="card card-solid">
        <div class="card-header">
            <a href="{{ route('alunos.create') }}" class="btn btn-sm btn-primary">
                <i class="fa fa-plus-circle" aria-hidden="true"></i> Cadastrar novo
            </a>

            <button type="button" class="btn btn-sm btn-info" data-toggle="modal" data-target="#modalPesquisar">
                <i class="fa fa-search" aria-hidden="true"></i> Pesquisar
            </button>

            @if ($pesquisa)
                <a href="{{ route('alunos.index') }}" class="btn btn-sm btn-danger">
                    <i class="fa fa-search-minus" aria-hidden="true"></i> Limpar Pesquisa
                </a>
            @endif

        </div>
        <div class="card-body pb-0">
            <div class="row d-flex align-items-stretch">
                @foreach ($alunos as $aluno)
                    {{-- Bloco Aluno Inicio --}}
                    <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch">
                        <div class="card bg-light">
                            <div class="card-header text-muted border-bottom-0">
                                @if (count($aluno->turmas))
                                    <span class="text-success">
                                        Matriculado em {{ count($aluno->turmas) }} turma(s)
                                    </span>
                                @else
                                    <span class="text-danger">Sem matrícula vigente</span>
                                @endif
                            </div>
                            <div class="card-body pt-0">
                                <div class="row">
                                    <div class="col-7">
                                        <a href="{{ route('alunos.show', $aluno) }}">
                                            <h2 class="lead"><b>{{ $aluno->nome }}</b></h2>
                                        </a>
                                        <ul class="ml-4 mb-0 fa-ul text-muted">
                                            <li class="small mb-2" data-toggle="tooltip" title="CPF" data-placement="left">
                                                <span class="fa-li"><i class="fas fa-lg fa-address-card"></i></span>
                                                @if ($aluno->cpf)
                                                    {{ $aluno->cpf }}
                                                @else
                                                    -
                                                @endif
                                            </li>

                                            <li class="small mb-2" data-toggle="tooltip" title="Endereço"
                                                data-placement="left">
                                                <span class="fa-li"><i class="fas fa-lg fa-map-marker-alt"></i></span>
                                                @if ($aluno->cep)
                                                    {{ $aluno->endereco_rua }}, {{ $aluno->endereco_numero }}
                                                    - {{ $aluno->endereco_cidade }}/{{ $aluno->endereco_estado }}
                                                @else
                                                    -
                                                @endif
                                            </li>


                                            <li class="small mb-2" data-toggle="tooltip" title="Idade"
                                                data-placement="left">
                                                <span class="fa-li"><i class="fas fa-lg fa-birthday-cake"></i></span>
                                                @if ($aluno->data_nascimento)
                                                    {{ date('d/m/Y', strtotime($aluno->data_nascimento)) }}
                                                    ({{ $aluno->idade }} anos)
                                                @else
                                                    -
                                                @endif
                                            </li>

                                            <li class="small mb-2" data-toggle="tooltip" title="E-mail"
                                                data-placement="left">
                                                <span class="fa-li"><i class="fas fa-lg fa-envelope"></i></span>
                                                @if ($aluno->email)
                                                    {{ $aluno->email }}
                                                @else
                                                    -
                                                @endif
                                            </li>

                                            <li class="small mb-2" data-toggle="tooltip" title="Telefone"
                                                data-placement="left">
                                                <span class="fa-li"><i class="fas fa-lg fa-phone"></i></span>
                                                @if ($aluno->telefone)
                                                    {{ $aluno->telefone }}
                                                @else
                                                    -
                                                @endif
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="col-5 text-center">
                                        <a href="{{ route('alunos.show', $aluno) }}">
                                            <img src="{{ $aluno->foto_url }}" alt="" class="img-circle img-fluid">
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <div class="text-right">
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-sm btn-default dropdown-toggle"
                                            data-toggle="dropdown" aria-expanded="true">
                                            <i class="fas fa-lg fa-user-cog"></i>
                                        </button>
                                        <ul class="dropdown-menu" x-placement="bottom-start"
                                            style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(-10px, 38px, 0px);">
                                            <li>
                                                <a href="{{ route('alunos.edit', ['aluno' => $aluno->id]) }}"
                                                    class="dropdown-item">
                                                    <i class="fa fa-fw fa-edit" aria-hidden="true"></i>
                                                    Editar
                                                </a>
                                            </li>
                                            <li>
                                                <form action="{{ route('alunos.destroy', ['aluno' => $aluno->id]) }}"
                                                    method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="dropdown-item">
                                                        <i class="fa fa-fw fa-trash" aria-hidden="true"></i>
                                                        Excluir
                                                    </button>
                                                </form>
                                            </li>
                                        </ul>
                                    </div>

                                    <a href="{{ route('alunos.show', $aluno) }}" class="btn btn-sm btn-primary">
                                        <i class="fas fa-user"></i> Ver Cadastro
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- Bloco Aluno Fim --}}
                @endforeach

            </div>
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
            {{ $alunos->links() }}
        </div>
        <!-- /.card-footer -->
    </div>
@stop

@section('css')
@stop

@section('js')
    <script>
        $(document).ready(function() {
            $('[data-toggle="tooltip"]').tooltip();
        });
    </script>
@stop
