<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Avaliacao extends Model
{
    use HasFactory;

    protected $table = 'avaliacoes';

    // Relacionamentos
    public function cliente() {
        return $this->belongsTo(Cliente::class, 'cliente_id');
    }

    public function exames() {
        return $this->hasMany(Exame::class, 'avaliacao_id');
    }
}
