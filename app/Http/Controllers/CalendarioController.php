<?php

namespace App\Http\Controllers;

use Acaronlex\LaravelCalendar\Calendar;
use App\Models\Experimental;
use App\Models\HorarioTurma;
use Illuminate\Support\Carbon;

class CalendarioController extends Controller
{
    public function index() {
        /**
         * Define o intervalo de tempo que será carregado no calendário.
         * Por padrão carrega do mês anterior até o mês seguinte da data
         * atual. O usuário pode mudar via form GET na página.
         */
        $data_inicio = request('data_inicio') ?: Carbon::today()->subMonth();
        $data_fim = request('data_fim') ?: Carbon::today()->addMonth();

        // Define o que será exibido no calendário
        $esconderTurmas = request('esconderTurmas') ? TRUE : FALSE;
        $esconderExperimentais = request('esconderExperimentais') ? TRUE : FALSE;

        $eventos = [];

        // Carrega as turmas do banco e adiciona no calendário
        if(!($esconderTurmas)) {
            $horariosTurmas = HorarioTurma::all();
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
        }

        // Carrega as aulas experimentais do banco e adiciona no calendário
        if(!($esconderExperimentais)) {
            $experimentais = Experimental::all();
            foreach($experimentais as $experimental) {
    
                // Formatação das datas com horário de início e fim
                $dataHoraInicio = Carbon::createFromFormat('Y-m-d H:i:s', $experimental->data . $experimental->horario_inicio);
                $dataHoraFim = Carbon::createFromFormat('Y-m-d H:i:s', $experimental->data . $experimental->horario_fim);
                
                $eventos[] = Calendar::event(
                    'Experimental de ' . $experimental->aluno->nome, // Titulo
                    false, // O dia todo?
                    $dataHoraInicio, // Data/Hora Inicio
                    $dataHoraFim, // Data/Hora Fim
                    $experimental->id, // ID (Opcional)
                    [
                        'url' => route('experimentais.show', $experimental),
                        'backgroundColor' => $experimental->cor_calendario,
                        'borderColor' => $experimental->cor_calendario
                    ]
                );
            }
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
            'data_fim' => $data_fim,
            'esconderTurmas' => $esconderTurmas,
            'esconderExperimentais' => $esconderExperimentais
        ]);

    }
}
