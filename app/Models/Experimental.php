<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Experimental extends Model
{
    use HasFactory;

    protected $table = 'experimentais';

    protected $guarded = [];

    // Relacionamentos
    public function aluno() {
        return $this->belongsTo(Aluno::class, 'aluno_id');
    }

    // Métodos
    public function getStatusBadgeAttribute() {
        switch($this->status) {
            case 0:
                return "<span class='badge badge-warning'>Marcada</span>";
                break;
            case 1:
                return "<span class='badge badge-info'>Realizou</span>";
                break;
            case 2:
                return "<span class='badge badge-success'>Matriculou</span>";
                break;
            case 3:
                return "<span class='badge badge-danger'>Não compareceu</span>";
                break;
        }
    }
}
