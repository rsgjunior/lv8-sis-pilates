<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreObservacaoRequest;
use App\Models\Aluno;
use App\Models\Observacao;
use Illuminate\Http\Request;

class ObservacaoController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($aluno_id)
    {
        $aluno = Aluno::findOrFail($aluno_id);

        return view('alunos.observacoes.create', [
            'aluno' => $aluno
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreObservacaoRequest $request)
    {
        Observacao::create($request->validated());

        return redirect()->route('alunos.show', $request->aluno_id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
}
