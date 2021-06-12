<?php

namespace App\Http\Controllers;

use Acaronlex\LaravelCalendar\Calendar;
use App\Models\Experimental;
use App\Models\HorarioTurma;
use Illuminate\Support\Carbon;

class CalendarioController extends Controller
{
    public function index() {
        $data_inicio_pesquisa = request('data_inicio');
        $data_fim_pesquisa = request('data_fim');

        $data_inicio = $data_inicio_pesquisa ? $data_inicio_pesquisa : Carbon::today()->subMonth();
        $data_fim = $data_fim_pesquisa ? $data_fim_pesquisa : Carbon::today()->addMonth();

        $horariosTurmas = HorarioTurma::all();
        $experimentais = Experimental::all();

        $eventos = [];

        // Adiciona as turmas
        foreach($horariosTurmas as $horarioTurma) {
            $eventos[] = Calendar::event(
                $horarioTurma->turma->nome . ' (' . count($horarioTurma->turma->alunos) . ')', // Titulo
                false, // O dia todo?
                null, // Data/Hora Inicio
                null, // Data/Hora Fim
                $horarioTurma->id, // ID (Opcional)
                [
                    'daysOfWeek' => [$horarioTurma->dia_da_semana], // Dia da Semana
                    'startRecur' => $data_inicio,
                    'endRecur' => $data_fim,
                    'startTime' => $horarioTurma->horario_inicio,
                    'endTime' => $horarioTurma->horario_fim,
                    'url' => route('turmas.show', $horarioTurma->turma),
                    'backgroundColor' => $horarioTurma->turma->cor_calendario,
                    'borderColor' => $horarioTurma->turma->cor_calendario
                ]
            );
        }


        $calendar = new Calendar();

        $calendar->addEvents($eventos)
        ->setOptions([
            'timeZone' => 'local',
            'locale' => 'pt-br',
            'firstDay' => 0,
            'displayEventTime' => true,
            'selectable' => true,
            'initialView' => 'timeGridWeek',
            'nowIndicator' => true,
            'themeSystem' => 'bootstrap',
            'headerToolbar' => [
                'start' => 'prev,next today',
                'center' => 'title',
                'end' => 'dayGridMonth,timeGridWeek,timeGridDay',
            ]
        ]);

        $calendar->setId('1');
        $calendar->setCallbacks([
            'select' => 'function(selectionInfo){}',
            'eventClick' => 'function(event){}'
        ]);
        
        return view('calendario.index', [
            'calendario' => $calendar,
            'data_inicio' => $data_inicio,
            'data_fim' => $data_fim
        ]);

    }
}
