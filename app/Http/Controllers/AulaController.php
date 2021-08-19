<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdicionarPresencasRequest;
use App\Http\Requests\DefinirPresencasRequest;
use App\Http\Requests\StoreAulaRequest;
use App\Models\Aluno;
use App\Models\Aula;
use App\Models\Turma;
use App\Services\AlunoService;
use Illuminate\Http\Request;

class AulaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($turma_id)
    {
        $data = request('data');
        $horario_inicio = request('horario_inicio');
        $horario_fim = request('horario_fim');

        $turma = Turma::findOrFail($turma_id);

        return view('aulas.create', compact('data', 'horario_inicio', 'horario_fim', 'turma'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAulaRequest $request)
    {
        $aula = Aula::create($request->validated());

        foreach($aula->turma->alunos as $aluno) {
            $aluno->aulas()->attach($aula->id, ['origem' => 'matricula']);
        }

        return redirect(route('aulas.show', $aula))->with('success', 'Aula criada com sucesso');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $aula = Aula::findOrFail($id);
        $alunosEsperados = $aula->alunos()->orderBy('nome')->get();
        $alunos = Aluno::orderBy('nome')->get();

        return view('aulas.show', compact('aula', 'alunos', 'alunosEsperados'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $aula = Aula::findOrFail($id);

        $aula->delete();

        return redirect(route('turmas.show', $aula->turma));
    }

    public function definirPresencas(DefinirPresencasRequest $request, $aula_id) 
    {
        $aula = Aula::findOrFail($aula_id);

        foreach($request->alunos as $aluno) {
            $aula->alunos()->updateExistingPivot($aluno['id'], [
                'presente' => $aluno['presente'],
                'motivo_falta' => $aluno['presente'] == 2 ? ($aluno['motivo_falta'] ?: 'Não Informado') : ''
            ]);
        }

        return back()->with('success', 'Presenças definidas com sucesso!');
    }

    public function adicionarPresencas(AdicionarPresencasRequest $request, $aula_id)
    {
        $aula = Aula::findOrFail($aula_id);

        foreach($request->alunos_id as $aluno_id) {
            $aula->alunos()->attach($aluno_id, ['origem' => 'manual']);
        }

        return back()->with('success', 'Aluno(s) adicionado(s) a aula com sucesso!');
    }

    public function removerPresenca($aula_id, $aluno_id) 
    {
        $aula = Aula::findOrFail($aula_id);

        $aula->alunos()->detach($aluno_id);

        return back()->with('msg', 'Aluno removido da aula');
    }
}
