<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Aluno extends Model
{
    use HasFactory;

    protected $table = 'alunos';

    protected $fillable = [
        'nome', 'email', 'data_nascimento', 'profissao', 'sexo', 'telefone','telefone2', 
        'cep', 'endereco_rua', 'endereco_numero', 'endereco_complemento',
        'endereco_estado', 'endereco_cidade', 'endereco_bairro', 'rg', 'cpf', 'foto'
    ];

    // Relacionamentos
    public function avaliacoes() {
        return $this->hasMany(Avaliacao::class, 'aluno_id');
    }

    public function turmas() {
        return $this->belongsToMany(Turma::class, 'alunos_turmas', 'aluno_id', 'turma_id');
    }

    public function observacoes() {
        return $this->hasMany(Observacao::class, 'aluno_id');
    }

    // Métodos
    public function getIdadeAttribute(){
        return Carbon::parse($this->data_nascimento)->age;
    }

    public function getFotoUrlAttribute() {
        if($this->foto) return config('foto.foto.aluno_path') . $this->id . '/' . $this->foto;

        return config('foto.foto.default_url');
    }
}
