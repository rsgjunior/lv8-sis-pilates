<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreHorarioRequest;
use App\Models\Horario;

class HorarioController extends Controller
{
    public function store(StoreHorarioRequest $request) {
        foreach($request->dias_da_semana as $dia_da_semana) {
            /*
            // Verifica se já existe algum horário cadastrado no mesmo intervalo de tempo
            $conflito_de_horario = Horario::where('dia_da_semana', $dia_da_semana)
                                ->whereBetween('horario_inicio', [$request->horario_inicio, $request->horario_fim])
                                ->WhereBetween('horario_fim', [$request->horario_inicio, $request->horario_fim])    
                                ->get()->isNotEmpty();

            if($conflito_de_horario){
                return back()->with('error', 'Já existe alguma turma cadastrada no mesmo intervalo de tempo');
            }
            */

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
