<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Cliente extends Model
{
    use HasFactory;

    protected $table = 'clientes';

    protected $fillable = [
        'nome', 'email', 'data_nascimento', 'profissao', 'sexo', 'telefone','telefone2', 
        'cep', 'endereco_rua', 'endereco_numero', 'endereco_complemento',
        'endereco_estado', 'endereco_cidade', 'endereco_bairro', 'rg', 'cpf', 'foto'
    ];

    // Relacionamentos
    public function avaliacoes() {
        return $this->hasMany(Avaliacao::class, 'cliente_id');
    }

    public function turmas() {
        return $this->belongsToMany(Turma::class, 'clientes_turmas', 'cliente_id', 'turma_id');
    }

    // Métodos
    public function getIdade(){
        return Carbon::parse($this->data_nascimento)->age;
    }
}
