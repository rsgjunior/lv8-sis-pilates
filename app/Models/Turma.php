<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Turma extends Model
{
    use HasFactory;

    protected $table = 'turmas';

    protected $fillable = ['nome', 'descricao'];

    // Relacionamentos
    public function alunos() {
        return $this->belongsToMany(Aluno::class, 'alunos_turmas', 'turma_id', 'aluno_id');
    }

    public function horarios() {
        return $this->hasMany(Horario::class, 'turma_id');
    }
}
