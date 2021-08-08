<?php

namespace App\Services;

use App\Models\Aluno;
use Illuminate\Database\QueryException;

class AlunoService {
    public static function createFromExperimental($nome, $telefone) {
        try {
            $aluno = Aluno::create([
                'nome' => $nome,
                'telefone' => $telefone
            ]);

        }catch(QueryException $e) {
            return false;
        }

        return $aluno;
    }

    public static function cadastrarNoDiarioDaTurma($alunos, $turma_id) {
        foreach($alunos as $aluno) {
            $aluno->aulas()->attach($turma_id, ['origem' => 'matricula']);
        }
    }
}