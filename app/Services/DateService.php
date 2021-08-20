<?php

namespace App\Services;

class DateService
{

    /**
     * Função que retorna o nome do dia da semana em PT-BR
     * 
     * @param $data     Data que deseja saber o dia da semana
     * @param $raw      Caso esteja passando somente o dia da semana ao invés de uma data (0 até 6)
     * 
     * @return          Retorna uma string referente ao dia da semana
     */
    public static function getDiaDaSemanaStr($data, $raw = false)
    {
        $diasDaSemanaStr = ['Domingo', 'Segunda-Feira', 'Terça-Feira', 'Quarta-Feira', 'Quinta-Feira', 'Sexta-Feira', 'Sábado'];
        $diaDaSemana = $raw ? $data : date('w', strtotime($data));

        return $diasDaSemanaStr[$diaDaSemana];
    }
}
