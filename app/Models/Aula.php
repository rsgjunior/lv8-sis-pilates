<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aula extends Model
{
    use HasFactory;

    protected $table = 'aulas';

    protected $guarded = [];

    // Relacionamentos
    public function turma() {
        return $this->belongsTo(Turma::class, 'turma_id');
    }

    public function alunos() {
        return $this->belongsToMany(Aluno::class, 'alunos_aulas', 'aula_id', 'aluno_id')
                        ->as('diario')
                        ->withPivot('presente', 'motivo_falta', 'origem')
                        ->withTimestamps();
    }
}
