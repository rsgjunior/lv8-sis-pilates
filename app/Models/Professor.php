<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Carbon;

class Professor extends Model
{
    use HasFactory;

    protected $table = 'professores';

    protected $fillable = [
        'nome', 'email', 'data_nascimento', 'profissao', 'sexo', 'telefone','telefone2', 
        'cep', 'endereco_rua', 'endereco_numero', 'endereco_complemento', 'registro_profissional',
        'endereco_estado', 'endereco_cidade', 'endereco_bairro', 'cpf', 'foto'
    ];

    // Relacionamentos
    public function turmas() {
        return $this->hasMany(Turma::class, 'professor_id');
    }

    // Métodos
    public function getIdadeAttribute() {
        return Carbon::parse($this->data_nascimento)->age;
    }

    public function getFormacaoAttribute() {
        switch($this->profissao){
            case 1:
                $profissaoStr = "Fisioterapia";
                break;
            case 2:
                $profissaoStr = "Terapia Ocupacional";
                break;
            case 3:
                $profissaoStr = "Educação Física";
                break;
            default:
                $profissaoStr = "Inválido";
        }

        return $profissaoStr;
    }

    public function getFotoUrlAttribute() {
        if($this->foto) return config('foto.foto.professor_path') . $this->id . '/' . $this->foto;

        return config('foto.foto.default_url');
    }
}
