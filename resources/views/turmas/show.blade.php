@extends('adminlte::page')

@section('title', 'Visualizando turma')

@section('content_header')
    <div class="row mb-2">
        <div class="col-md-6">
            <h1>
                {{ $turma->nome }}
                <button type="button" class="btn btn-sm btn-default dropdown-toggle" data-toggle="dropdown"
                    aria-expanded="true">
                    <i class="fas fa-lg fa-tools"></i>
                </button>
                <ul class="dropdown-menu" x-placement="bottom-start"
                    style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(-10px, 38px, 0px);">
                    <li>
                        <a href="{{ route('turmas.edit', $turma) }}" class="dropdown-item">
                            <i class="fa fa-fw fa-edit" aria-hidden="true"></i>
                            Editar
                        </a>
                    </li>
                    <li>
                        <form action="{{ route('turmas.destroy', $turma) }}" method="post">
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
        </div>
        <div class="col-md-6">
            <div class="float-sm-right">
                {{ Breadcrumbs::render('turmas.show', $turma) }}
            </div>
        </div>
    </div>
@stop

@section('content')

    @include('parciais.validation-errors')

    <div class="row">
        <div class="col-12">

            <!-- Main content -->
            <div class="invoice p-3 mb-3">
                <!-- title row -->
                <div class="row">
                    <div class="col-12">
                        <h4>
                            <i class="fas fa-users"></i> Alunos na turma
                            <small class="float-right">
                                <a href="" class="btn btn-outline-success" data-toggle="modal"
                                    data-target="#matricularModal">
                                    <i class="fas fa-plus-circle"></i> Matricular Aluno</a></small>
                        </h4>
                        @php($qtdAlunos = count($turma->alunos))
                        @if ($qtdAlunos > 0)
                            <p>Atualmente há {{ $qtdAlunos }} aluno(s) nessa turma:</p>
                        @endif
                    </div>
                    <!-- /.col -->
                </div>

                <!-- Table row -->
                <div class="row">
                    <div class="col-12 table-responsive mb-3">
                        <table class="table table-striped" {{ $qtdAlunos ? '' : 'hidden' }}>
                            <thead>
                                <tr>
                                    <th>Foto</th>
                                    <th>Nome</th>
                                    <th>Data da Inscrição</th>
                                    <th>Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($turma->alunos as $aluno)

                                    <tr>
                                        <td>
                                            <img class="table-avatar" src="{{ $aluno->foto_url }}">
                                        </td>
                                        <td><a
                                                href="{{ route('alunos.show', ['aluno' => $aluno->id]) }}">{{ $aluno->nome }}</a>
                                        </td>
                                        <td>{{ date('d/m/Y', strtotime($aluno->pivot->created_at)) }}</td>
                                        <td>
                                            <a class="btn btn-info btn-sm"
                                                href="{{ route('alunos.show', ['aluno' => $aluno->id]) }}">
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

                <div class="row">
                    <!-- accepted payments column -->
                    <div class="col-6">
                        <p class="lead">Professor</p>

                        @if ($turma->professor)
                            <div class="card card-widget widget-user-2">
                                <div class="widget-user-header bg-olive">
                                    <div class="widget-user-image">
                                        <img class="img-circle elevation-2" src="{{ $turma->professor->fotoUrl }}"
                                            alt="User Avatar">
                                    </div>
                                    <a href="{{ route('professores.show', $turma->professor) }}">
                                        <h3 class="widget-user-username">{{ $turma->professor->nome }}</h3>
                                    </a>
                                    <h5 class="widget-user-desc">{{ $turma->professor->formacao }}</h5>
                                </div>
                                <div class="card-footer p-0">
                                    <ul class="nav flex-column">
                                        <li class="nav-item">
                                            <form id="desalocarProf"
                                                action="{{ route('professores.desalocar', ['turma_id' => $turma->id]) }}"
                                                method="POST">
                                                @csrf
                                                <span class="nav-link">
                                                    Alocado em:
                                                    {{ date('d/m/Y, H:i', strtotime($turma->data_alocacao)) }}
                                                    <button type="submit" class="float-right btn btn-danger btn-xs">
                                                        <i class="fas fa-times-circle"></i> Desalocar
                                                    </button>
                                                </span>
                                            </form>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        @else
                            <p class="text-muted well well-sm shadow-none">
                                Nenhum professor foi alocado para esta turma
                            </p>
                            <button class="btn btn-outline-success mb-4" data-toggle="modal" data-target="#alocarProfessor">
                                <i class="fas fa-plus-circle"></i> Alocar um Professor
                            </button>
                        @endif

                        <p class="lead">Informações sobre a turma</p>

                        <p class="text-muted well well-sm shadow-none">
                            {{ $turma->descricao }}
                        </p>

                        <p class="text-muted well well-sm shadow-none">
                            Criada em: {{ date('d/m/Y, H:i', strtotime($turma->created_at)) }}
                        </p>
                    </div>
                    <!-- /.col -->
                    <div class="col-6">
                        <p class="lead">Horários
                            <small class="float-right">
                                <button class="btn btn-outline-success" data-toggle="modal"
                                    data-target="#createTimeClassModal">
                                    <i class="fas fa-plus-circle"></i> Adicionar Horário
                                </button>
                            </small>
                        </p>

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    @forelse ($horarios as $horario)
                                        <tr>
                                            <th style="width:50%">{{ $horario->dia_da_semana_str }}</th>
                                            <td>{{ date('H:i', strtotime($horario->horario_inicio)) }} -
                                                {{ date('H:i', strtotime($horario->horario_fim)) }}</td>
                                            <td>
                                                <form
                                                    action="{{ route('horarios.destroy', ['horario_id' => $horario->id]) }}"
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
                                        <p>Nenhum horário cadastrado</p>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>

                        <p class="lead">
                            Cor no Calendário:
                            <span style="color: {{ $turma->cor_calendario }}">
                                <i class="fas fa-square"></i>
                            </span>
                            {{ $turma->cor_calendario }}
                        </p>
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->


            </div>
            <!-- /.invoice -->

            <!-- Aulas -->

            <div id="accordion">
                <div class="card">
                    <div class="card-header" id="headingAulas">
                            <button class="btn btn-link" data-toggle="collapse" data-target="#collapseAulas"
                                aria-expanded="true" aria-controls="collapseAulas">
                                Aulas registradas
                            </button>

							<div class="card-tools">
								<a href="" class="btn btn-primary">
									<i class="fas fa-plus-circle"></i> 
									Registrar nova
								</a>
							</div>
                    </div>

                    <div id="collapseAulas" class="collapse" aria-labelledby="headingAulas" data-parent="#accordion">
                        <div class="card-body">
                            <table id="tableAulas" class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Data</th>
                                        <th>Horário</th>
                                        <th>Alunos</th>
                                        <th>Diário</th>
										<th>Presentes</th>
										<th>Faltas</th>
                                        <th></th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @forelse ($aulas as $aula)
                                        <tr>
                                            <td>
                                                {{ $aula->id }}
                                            </td>
                                            <td>
                                                {{ date('d/m/Y', strtotime($aula->data)) }}
                                                ({{ $aula->dia_da_semana_str }})
                                            </td>
                                            <td>
                                                {{ date('H:i', strtotime($aula->horario_inicio)) }}
                                                -
                                                {{ date('H:i', strtotime($aula->horario_fim)) }}
                                            </td>
                                            <td>
                                                {{ count($aula->alunos) }}
                                            </td>
                                            <td>
                                                {!! $aula->diario_registrado_badge !!}
                                            </td>
											<td>
												@if ($aula->diario_registrado)
													{{ $aula->qtd_alunos_presentes }}
												@else
													-
												@endif
											</td>
											<td>
												@if ($aula->diario_registrado)
													{{ $aula->qtd_alunos_faltantes }}
												@else
													-
												@endif
											</td>
                                            <td>
                                                <a href="{{ route('aulas.show', $aula) }}"
                                                    class="btn btn-sm btn-primary">
                                                    <i class="fa fa-eye"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @empty
                                        Nenhuma aula cadastrada
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
            </div>

        </div><!-- /.col -->
    </div>

    @include('turmas.matricular-modal')
    @include('turmas.horarios.create-modal')
    @include('turmas.alocar-modal')

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
@section('plugins.Datatables', true)

@section('js')

    <script>
        $(function() {
            //Initialize Select2 Elements
            $('.select2').select2()
        })

        $(document).ready(function() {
            $('#tableAulas').DataTable({
                language: {
                    url: '//cdn.datatables.net/plug-ins/1.10.25/i18n/Portuguese-Brasil.json'
                }
            });
        });

        $(function() {
            $('[data-toggle="tooltip"]').tooltip()
        })
    </script>

@stop
