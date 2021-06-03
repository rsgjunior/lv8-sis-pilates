<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreHorarioRequest;
use App\Models\Horario;
use Carbon\Carbon;

class HorarioController extends Controller
{
    public function store(StoreHorarioRequest $request) {
        /**
         * As comparações whereBetween das collections não são excludentes nos limites,
         * ou seja, se eu comparar se um tempo está entre 10:00 e 11:00 ele leva em consideração
         * o 10 e o 11. Aqui eu adiciono um segundo no tempo inicial e removo um do final para evitar
         * que retorne erro ao tentar adicionar um horário que está começando logo ao fim de outro ou
         * vice-versa.
         */
        $horario_inicio = date('H:i:s', strtotime(Carbon::parse($request->horario_inicio)->addSecond()));
        $horario_fim = date('H:i:s', strtotime(Carbon::parse($request->horario_fim)->subSecond()));

        foreach($request->dias_da_semana as $dia_da_semana) {
            
            $horarios = Horario::where('dia_da_semana', $dia_da_semana)->get();
            // Verifica se já existe algum horário cadastrado no mesmo intervalo de tempo
            $conflito_de_horario = $horarios->whereBetween('horario_inicio', [$horario_inicio, $horario_fim])->isNotEmpty() || $horarios->whereBetween('horario_fim', [$horario_inicio, $horario_fim])->isNotEmpty();

            if($conflito_de_horario){
                return back()
                    ->with('error', 'Já existe alguma turma cadastrada entre o intervalo de tempo ' . $request->horario_inicio . ' - ' . $request->horario_fim);
            }

            Horario::create([
                'turma_id' => $request->turma_id,
                'dia_da_semana' => $dia_da_semana,
                'horario_inicio' => $request->horario_inicio,
                'horario_fim' => $request->horario_fim
            ]);
        }

        return back()->with('success', 'Horário(s) cadastrado(s) com sucesso!');
    }

    public function destroy($horario_id) {
        Horario::findOrFail($horario_id)->delete();

        return back()->with('msg', 'Horário removido');
    }

}
