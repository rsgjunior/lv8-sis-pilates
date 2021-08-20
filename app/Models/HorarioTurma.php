<?php

namespace App\Models;

use App\Services\DateService;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HorarioTurma extends Model
{
    use HasFactory;

    protected $table = 'horarios_turmas';

    protected $fillable = ['turma_id', 'dia_da_semana', 'horario_inicio', 'horario_fim'];

    // Relacionamentos
    public function turma() {
        return $this->belongsTo(Turma::class, 'turma_id');
    }

    // Métodos
    public function getDiaDaSemanaStrAttribute() {
        return DateService::getDiaDaSemanaStr($this->dia_da_semana, true);
    }
}
