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
}
