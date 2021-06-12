@extends('adminlte::page')

@section('title', 'Aulas Experimentais')

@section('content_header')
    <h1>Experimentais</h1>
@stop

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <a href="{{ route('experimentais.create') }}" class="btn btn-primary btn-sm">
                    <i class="fas fa-plus-circle"></i> 
                    Cadastrar nova
                </a>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive p-0">
            <table class="table table-hover">
                <thead>
                <tr>
                    <th width="10px">ID</th>
                    <th>Aluno</th>
                    <th>Data/Horário</th>
                    <th>Status</th>
                    <th>Ações</th>
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

                        <!-- Data/Hora -->
                        <td>
                            {{ date('d/m/Y', strtotime($experimental->data)) }}, 
                            {{ date('H:i', strtotime($experimental->horario_inicio)) }} 
                            - 
                            {{ date('H:i', strtotime($experimental->horario_fim)) }}
                        </td>

                        <!-- Status -->
                        <td><span class="tag tag-success">{{ $experimental->status }}</span></td>

                        <!-- Ações -->
                        <td>
                            <a href="{{ route('experimentais.show', $experimental) }}" class="btn btn-primary btn-sm">
                                <i class="fas fa-eye"></i> 
                                Ver
                            </a>

                            <a href="{{ route('experimentais.edit', $experimental) }}" class="btn btn-info btn-sm">
                                <i class="fas fa-edit"></i> 
                                Editar
                            </a>

                            <form action="{{ route('experimentais.destroy', $experimental) }}" method="post" class="d-inline-block">
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

@section('css')

@stop

@section('js')

@stop
