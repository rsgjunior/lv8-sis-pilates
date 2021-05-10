<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTurmaRequest;
use App\Models\Cliente;
use App\Models\Turma;
use Illuminate\Http\Request;

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

        if($pesquisa){
            $turmas = Turma::where('nome', 'LIKE', $pesquisa);
        }else{
            $turmas = Turma::paginate(15);
        }

        return view('turmas.index', [
            'turmas' => $turmas,
            'pesquisa' => $pesquisa
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
        $clientes = Cliente::all();

        return view('turmas.show', [
            'turma' => $turma,
            'clientes' => $clientes
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function matricular(Request $request) {
        foreach($request->alunos_id as $id) {
            $aluno = Cliente::findOrFail($id);

            // Verifica se esse aluno já está matriculado na turma
            foreach($aluno->turmas as $turma) {
                if($turma->id == $request->turma_id) {
                    return redirect()
                            ->back()
                            ->with('error', 'Aluno já matriculado nesta turma');
                }
            }

            $aluno->turmas()->attach($request->turma_id);
        }

        return redirect()->back()->with('success', 'Matricula feita com sucesso');
    }

    public function desmatricular($turma_id, $cliente_id) {
        $cliente = Cliente::findOrFail($cliente_id);

        $cliente->turmas()->detach($turma_id);

        return redirect()->back()->with('msg', 'Aluno desmatriculado');
    }
}
