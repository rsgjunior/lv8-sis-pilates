<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aula extends Model
{
    use HasFactory;

    protected $table = 'aulas_turmas';

    protected $guarded = [];

    // Relacionamentos
    public function turma() {
        return $this->belongsTo(Turma::class, 'turma_id');
    }

    public function alunos() {
        return $this->belongsToMany(Aluno::class, 'alunos_aulas_turmas', 'aula_turma_id', 'aluno_id')
                        ->as('presencas')
                        ->withPivot('presente', 'motivo_falta')
                        ->withTimestamps();
    }
}
