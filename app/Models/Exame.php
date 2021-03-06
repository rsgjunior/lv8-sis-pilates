<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exame extends Model
{
    use HasFactory;

    protected $table = 'exames';

    protected $fillable = ['avaliacao_id', 'nome_arquivo', 'comentario'];

    // Relacionamentos
    public function avaliacao() {
        return $this->belongsTo(Avaliacao::class, 'avaliacao_id');
    }
}
