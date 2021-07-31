<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Turma extends Model
{
    use HasFactory;

    protected $table = 'turmas';

    protected $fillable = ['nome', 'professor_id', 'descricao', 'data_alocacao', 'cor_calendario'];

    // Relacionamentos
    public function alunos() {
        return $this->belongsToMany(Aluno::class, 'alunos_turmas', 'turma_id', 'aluno_id')->withTimestamps();
    }

    public function horarios() {
        return $this->hasMany(HorarioTurma::class, 'turma_id');
    }

    public function professor() {
        return $this->belongsTo(Professor::class, 'professor_id');
    }

    public function aulas() {
        return $this->hasMany(Aula::class, 'turma_id');
    }
}
