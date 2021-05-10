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
    public function clientes() {
        return $this->belongsToMany(Cliente::class, 'clientes_turmas', 'turma_id', 'cliente_id');
    }

    public function horarios() {
        return $this->hasMany(Horario::class, 'turma_id');
    }
}
