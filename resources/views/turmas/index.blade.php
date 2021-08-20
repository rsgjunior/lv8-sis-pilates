@extends('adminlte::page')

@section('title', 'Turmas de Pilates')

@section('content_header')
    <div class="row mb-2">
        <div class="col-md-6">

            <h1>Turmas de Pilates ({{ $qtdTurmas }})</h1>
        </div>
        <div class="col-md-6">
            <div class="float-sm-right">
                {{ Breadcrumbs::render('turmas.index') }}
            </div>
        </div>
    </div>
@stop

@section('content')

    @include('parciais.validation-errors')

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#createPilatesClassModal">
                        <i class="fa fa-plus-circle" aria-hidden="true"></i>
                        Criar nova
                    </button>
                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive p-3">
                    <table class="table table-hover" id="tableTurmas">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nome</th>
                                <th>Alunos</th>
                                <th>Cor</th>
                                <th>Horário(s)</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($turmas as $turma)
                                <tr>
                                    <td>{{ $turma->id }}</td>
                                    <td><a
                                            href="{{ route('turmas.show', ['turma' => $turma->id]) }}">{{ $turma->nome }}</a>
                                    </td>
                                    <td>{{ count($turma->alunos) }}</td>
                                    <td>
                                        <span style="color: {{ $turma->cor_calendario }};font-size: 24px">
                                            <i class="fas fa-square"></i>
                                        </span>
                                    </td>
                                    <td>
                                        @forelse ($turma->horarios()->orderBy('dia_da_semana')->get() as $horario)
                                            {{ $horario->dia_da_semana_str }}:
                                            {{ date('H:i', strtotime($horario->horario_inicio)) }} -
                                            {{ date('H:i', strtotime($horario->horario_fim)) }}
                                            <br>
                                        @empty
                                            Nenhum horário cadastrado
                                        @endforelse
                                    </td>
                                    <td>
                                        <a href="{{ route('turmas.show', ['turma' => $turma->id]) }}"
                                            class="btn btn-sm btn-primary">
                                            <i class="fa fa-eye"></i>
                                            Ver
                                        </a>
                                        <a href="{{ route('turmas.edit', ['turma' => $turma->id]) }}" class="btn btn-sm btn-info">
                                            <i class="fa fa-edit" aria-hidden="true"></i>
                                            Editar
                                        </a>
                                        <form style="display: inline-block"
                                            action="{{ route('turmas.destroy', ['turma' => $turma->id]) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger">
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
                <!-- /.card-body -->

            </div>
            <!-- /.card -->
        </div>
    </div>

    @include('turmas.create-modal')

@stop

@section('css')

@stop

@section('plugins.Datatables', true)

@section('js')
    <script>
        $(document).ready(function() {
            $('#tableTurmas').DataTable({
                language: {
                    url: '//cdn.datatables.net/plug-ins/1.10.25/i18n/Portuguese-Brasil.json'
                }
            });
        });
    </script>
@stop
