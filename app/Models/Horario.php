<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Horario extends Model
{
    use HasFactory;

    protected $table = 'horarios';

    protected $fillable = ['turma_id', 'dia_da_semana', 'horario_inicio', 'horario_fim'];

    // Relacionamentos
    public function turma() {
        return $this->belongsTo(Turma::class, 'turma_id');
    }

    // Métodos
    public function getDiaDaSemanaStrAttribute() {
        switch($this->dia_da_semana){
            case 0:
                $str_dia_da_semana = 'Domingo';
                break;
            case 1:
                $str_dia_da_semana = 'Segunda-Feira';
                break;
            case 2:
                $str_dia_da_semana = 'Terça-Feira';
                break;
            case 3:
                $str_dia_da_semana = 'Quarta-Feira';
                break;
            case 4:
                $str_dia_da_semana = 'Quinta-Feira';
                break;
            case 5:
                $str_dia_da_semana = 'Sexta-Feira';
                break;
            case 6:
                $str_dia_da_semana = 'Sábado';
                break;
            default:
                $str_dia_da_semana = 'Inválido';
                break;
        }

        return $str_dia_da_semana;
    }
}
