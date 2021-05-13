<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Avaliacao extends Model
{
    use HasFactory;

    protected $table = 'avaliacoes';

    protected $fillable = [
        'aluno_id', 'peso', 'altura', 'atividade_fisica', 'objetivo', 'conhece_ou_praticou', 'medicamentos',
        'queixa_principal', 'historia_medica_atual', 'historia_medica_passada', 'fatores_que_melhoram',
        'fatores_que_pioram', 'observacao'
    ];

    // Relacionamentos
    public function aluno() {
        return $this->belongsTo(Aluno::class, 'aluno_id');
    }

    public function exames() {
        return $this->hasMany(Exame::class, 'avaliacao_id');
    }
}
