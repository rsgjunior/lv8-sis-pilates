<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAvaliacaoRequest;
use App\Http\Requests\UpdateAvaliacaoRequest;
use App\Models\Aluno;
use App\Models\Avaliacao;
use App\Models\Exame;

class AvaliacaoController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($aluno_id)
    {
        $aluno = Aluno::findOrFail($aluno_id);

        return view('alunos.avaliacoes.create', [
            'aluno' => $aluno
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAvaliacaoRequest $request)
    {
        $avaliacao = Avaliacao::create($request->validated());

        // Upload dos arquivos de exame
        if($request->hasFile('exames')) {
            foreach($request->exames as $key=>$exame) {
                $nome_original = $exame->getClientOriginalName();
                $extensao = $exame->getClientOriginalExtension();
                $data = date('d-m-y H:i');
                $nome_arquivo = md5($nome_original . $data) . '.' . $extensao;

                $exameNoBanco = Exame::create([
                    'avaliacao_id' => $avaliacao->id,
                    'nome_arquivo' => $nome_arquivo,
                    'comentario' => $request->comentarios[$key]
                ]);

                $exame->storeAs('public/exames/' . $exameNoBanco->id, $nome_arquivo);
            }
        }

        return redirect()->route('avaliacoes.show', ['avaliacao' => $avaliacao->id])
                         ->with('success', 'Avaliação criada com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($avaliacao)
    {
        $avaliacao = Avaliacao::findOrFail($avaliacao);

        return view('alunos.avaliacoes.show', [
            'avaliacao' => $avaliacao
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($avaliacao)
    {
        $avaliacao = Avaliacao::findOrFail($avaliacao);

        return view('alunos.avaliacoes.edit', [
            'avaliacao' => $avaliacao
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAvaliacaoRequest $request, $avaliacao)
    {
        $avaliacao = Avaliacao::findOrFail($avaliacao);

        $avaliacao->update($request->validated());

        return redirect()->route('avaliacoes.show', ['avaliacao' => $avaliacao->id])->with('success', 'Avaliação editada com sucesso');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($avaliacao)
    {
        Avaliacao::findOrFail($avaliacao)->delete();

        return back()->with('msg', 'Avaliação removida com sucesso');
    }
}
