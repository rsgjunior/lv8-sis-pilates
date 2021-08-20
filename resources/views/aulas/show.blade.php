@extends('adminlte::page')

@section('title', 'Visualizando Aula')

@section('content_header')
    <div class="row mb-2">
        <div class="col-md-6">
            <h1>Aula #{{ $aula->id }}</h1>
        </div>
        <div class="col-md-6">
            <div class="float-sm-right">
                Breadcrumb
            </div>
        </div>
    </div>
@stop

@section('content')

    @include('parciais.validation-errors')
    @include('aulas.presencas-modal')
    @include('aulas.adicionar-presenca-modal')

    <div class="row">
        <div class="col-12">

            <div class="invoice p-3 mb-3">
                <div class="row">
                    <div class="col-12">
                        <h4 class="mb-3">
                            <i class="fas fa-users"></i> Alunos esperados para aula
							@if (!$aula->diario_registrado)	
								<small class="float-right">
									<button class="btn btn-outline-success" data-toggle="modal"
										data-target="#adicionarPresencaModal">
										<i class="fas fa-plus-circle"></i> Adicionar aluno
									</button>
									<button class="btn btn-outline-primary" data-toggle="modal" data-target="#presencasModal">
										<i class="fas fa-check-circle"></i> Definir presenças
									</button>
								</small>
							@endif
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
                                    <th>Origem</th>
                                    <th>Presença</th>
                                    <th>Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($alunosEsperados as $aluno)
                                    <tr>
                                        <td>
                                            <img class="table-avatar" src="{{ $aluno->foto_url }}">
                                        </td>
                                        <td><a href="{{ route('alunos.show', $aluno) }}">{{ $aluno->nome }}</a>
                                        </td>
                                        <td>
                                            <span data-toggle="tooltip" data-placement="top"
                                                title="Adicionado em: {{ date('d/m/Y, H:i', strtotime($aluno->diario->created_at)) }}">
                                                {{ $aluno->diario->origem }}
                                            </span>
                                        </td>
                                        <td>
                                            @if ($aluno->diario->presente == 0)
                                                <span class='badge badge-secondary'>Não Definido</span>
                                            @endif
                                            @if ($aluno->diario->presente == 1)
                                                <span class='badge badge-success'>Presente</span>
                                            @endif
                                            @if ($aluno->diario->presente == 2)
                                                <span class='badge badge-danger' data-toggle='tooltip' data-placement='top'
                                                    title='{{ $aluno->diario->motivo_falta }}'>
                                                    Falta
                                                </span>
                                            @endif
                                        </td>
                                        <td>
                                            <form class="d-inline"
                                                action="{{ route('aulas.removerPresenca', ['aula_id' => $aula->id, 'aluno_id' => $aluno->id]) }}"
                                                method="post">
                                                @csrf
                                                @method('DELETE')

                                                <button class="btn btn-danger btn-sm">
                                                    <i class="fa fa-times-circle"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <p>Nenhum aluno é esperado para esta aula</p>
                                @endforelse

                            </tbody>
                        </table>
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->

                <div class="row">
                    <div class="col-6">
                        <p class="lead">Diário</p>
                        <p>
                            <strong>Definido em:</strong>
                            @if ($aula->diario_registrado)
                                {{ date('d/m/Y, H:i', strtotime($aula->updated_at)) }}
                            @else
								Ainda não foi definido
                            @endif
                        </p>
                    </div>
                </div>

                <div class="row">
                    <div class="col-6">
                        <p class="lead">Informações da aula</p>
                        <p><strong>Data:</strong> {{ date('d/m/Y', strtotime($aula->data)) }}, {{ $aula->dia_da_semana_str }}</p>
                        <p><strong>Horário Início:</strong> {{ $aula->horario_inicio }}</p>
                        <p><strong>Horário Fim:</strong> {{ $aula->horario_fim }} </p>
                    </div>

                    <div class="col-6">
                        <p class="lead">Informações da Turma</p>
                        <p><strong>ID:</strong> {{ $aula->turma->id }}</p>
                        <p>
                            <strong>Nome:</strong>
                            <a href="{{ route('turmas.show', $aula->turma) }}">
                                {{ $aula->turma->nome }}
                            </a>
                        </p>
                        <p>
                            <strong>Professor:</strong>
                            <a href="{{ route('professores.show', $aula->turma->professor) }}">
                                {{ $aula->turma->professor->nome }}
                            </a>
                        </p>
                    </div>
                </div>

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

@section('plugins.Select2', true)

@section('js')

    <script>
        $(document).ready(function() {
            $('.select2').select2();
        });

        $(function() {
            $('[data-toggle="tooltip"]').tooltip()
        })
    </script>

@stop
