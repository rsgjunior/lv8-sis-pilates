@extends('adminlte::page')

@section('title', 'Aulas Experimentais')

@section('content_header')
    <div class="row mb-2">
        <div class="col-md-6">
            <h1>Experimentais ({{ $qtdExperimentais }})</h1>
        </div>
        <div class="col-md-6">
            <div class="float-sm-right">
                {{ Breadcrumbs::render('experimentais.index') }}
            </div>
        </div>
    </div>
@stop

@section('content')

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body table-responsive p-3">
                    <table id="tableExperimentais" class="table table-hover">
                        <thead>
                            <tr>
                                <th width="10px">ID</th>
                                <th>Aluno</th>
                                <th>Data</th>
                                <th>Horário</th>
                                <th>Status</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($experimentais as $experimental)
                                <tr>
                                    <!-- ID -->
                                    <td>{{ $experimental->id }}</td>

                                    <!-- Aluno -->
                                    <td>
                                        <a href="{{ route('experimentais.show', $experimental) }}">
                                            {{ $experimental->aluno->nome }}
                                        </a>
                                    </td>

                                    <!-- Data -->
                                    <td>
                                        {{ date('d/m/Y', strtotime($experimental->data)) }}
                                    </td>

                                    <!-- Horário -->
                                    <td>
                                        {{ date('H:i', strtotime($experimental->horario_inicio)) }}
                                        -
                                        {{ date('H:i', strtotime($experimental->horario_fim)) }}
                                    </td>

                                    <!-- Status -->
                                    <td>
                                        {!! $experimental->status_badge !!}
                                    </td>

                                    <!-- Ações -->
                                    <td>
                                        <a href="{{ route('experimentais.show', $experimental) }}"
                                            class="btn btn-primary btn-sm">
                                            <i class="fas fa-eye"></i>
                                            Ver
                                        </a>

                                        <a href="{{ route('experimentais.atualizarStatus', $experimental) }}"
                                            class="btn btn-info btn-sm">
                                            <i class="fas fa-clipboard-check"></i>
                                            Atualizar
                                        </a>

                                        <a href="{{ route('experimentais.edit', $experimental) }}"
                                            class="btn btn-warning btn-sm">
                                            <i class="fas fa-edit"></i>
                                            Editar
                                        </a>

                                        <form action="{{ route('experimentais.destroy', $experimental) }}" method="post"
                                            class="d-inline-block">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">
                                                <i class="fas fa-trash-alt"></i>
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
@stop

@section('plugins.Datatables', true)

@section('css')

@stop

@section('js')
    <script>
        $(document).ready(function() {
            $('#tableExperimentais').DataTable({
                language: {
                    url: '//cdn.datatables.net/plug-ins/1.10.25/i18n/Portuguese-Brasil.json'
                }
            });
        });
    </script>
@stop
