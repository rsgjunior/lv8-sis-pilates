<?php

namespace App\Http\Controllers;

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

        AlunoService::cadastrarNoDiarioDaTurma($aula->turma->alunos, $aula->turma->id);

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
                'motivo_falta' => $aluno['motivo_falta']
            ]);
        }

        return back()->with('success', 'Presenças definidas com sucesso!');
    }

    public function adicionarPresenca(Request $request, $aula_id)
    {
        
    }

    public function removerPresenca($aula_id, $aluno_id) 
    {
        $aula = Aula::findOrFail($aula_id);

        $aula->alunos()->detach($aluno_id);

        return back()->with('msg', 'Aluno removido da aula');
    }
}
