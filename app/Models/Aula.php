<?php

namespace App\Models;

use App\Services\DateService;
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

    // Métodos
    public function getQtdAlunosPresentesAttribute() {
        $count = 0;

        foreach($this->alunos as $aluno) {
            if($aluno->diario->presente == 1) $count++;
        }

        return $count;
    }

    public function getQtdAlunosFaltantesAttribute() {
        $count = 0;

        foreach($this->alunos as $aluno) {
            if($aluno->diario->presente == 2) $count++;
        }

        return $count;
    }

    public function getDiaDaSemanaStrAttribute() {
        return DateService::getDiaDaSemanaStr($this->data);
    }

    public function getDiarioRegistradoBadgeAttribute() {
        $badges = [
            "<span class='badge badge-danger'>Não Registrado</span>",
            "<span class='badge badge-success'>Registrado</span>",
        ];

        return $badges[$this->diario_registrado];
    }
}
