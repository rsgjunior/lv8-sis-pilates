<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Observacao extends Model
{
    use HasFactory;

    protected $table = 'observacoes';

    protected $guarded = [];

    // Relacionamentos
    public function aluno() {
        return $this->belongsTo(Aluno::class, 'aluno_id');
    }

    // Métodos
    public function GetCategoriaHtmlClassAttribute() {
        switch($this->categoria){
            case 0:
                return "fas fa-comments bg-yellow";
                break;
            case 1:
                return "fas fa-envelope bg-blue";
                break;
            default:
                return "fas fa-question bg-gray";
                break;
        }
    }
}
