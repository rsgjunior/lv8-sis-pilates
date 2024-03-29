<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTurmaRequest;
use App\Http\Requests\MatricularAlunoRequest;
use App\Models\Aluno;
use App\Models\Professor;
use App\Models\Turma;

class TurmaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pesquisa = request('pesquisa');

        if ($pesquisa) {
            $turmas = Turma::where('nome', 'LIKE', '%' . $pesquisa . '%')->paginate(15);
        } else {
            $turmas = Turma::paginate(15);
        }

        $qtdTurmas = Turma::count();

        return view('turmas.index', [
            'turmas' => $turmas,
            'pesquisa' => $pesquisa,
            'qtdTurmas' => $qtdTurmas
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTurmaRequest $request)
    {
        $turma = Turma::create($request->validated());

        return redirect()->route('turmas.show', ['turma' => $turma->id])->with('success', 'Turma criada com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $turma = Turma::findOrFail($id);
        $alunos = Aluno::orderBy('nome')->get();
        $professores = Professor::orderBy('nome')->get();
        $horarios = $turma->horarios()->orderBy('dia_da_semana')->get();
        $ultimasAulas = $turma->aulas()->orderBy('data', 'desc')->limit(3)->get();

        return view('turmas.show', compact(
            'turma', 
            'alunos', 
            'professores', 
            'horarios', 
            'ultimasAulas'
        ));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $turma = Turma::findOrFail($id);

        return view('turmas.edit', [
            'turma' => $turma
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreTurmaRequest $request, $id)
    {
        $turma = Turma::findOrFail($id);

        $turma->update($request->validated());

        return redirect()->route('turmas.show', ['turma' => $turma->id])->with('success', 'Dados da turma atualizados');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $turma = Turma::findOrFail($id);

        $turma->delete();

        return redirect()
            ->route('turmas.index')
            ->with('msg', 'Turma "' . $turma->nome . '" foi excluída');
    }

    public function matricular(MatricularAlunoRequest $request)
    {
        foreach ($request->alunos_id as $id) {
            $aluno = Aluno::findOrFail($id);

            // Verifica se esse aluno já está matriculado na turma
            foreach ($aluno->turmas as $turma) {
                if ($turma->id == $request->turma_id) {
                    return redirect()
                        ->back()
                        ->with('error', 'Aluno já matriculado nesta turma');
                }
            }

            $aluno->turmas()->attach($request->turma_id);
        }

        return redirect()->back()->with('success', 'Matricula feita com sucesso');
    }

    public function desmatricular($turma_id, $aluno_id)
    {
        $aluno = Aluno::findOrFail($aluno_id);

        $aluno->turmas()->detach($turma_id);

        return redirect()->back()->with('msg', 'Aluno desmatriculado');
    }
}
