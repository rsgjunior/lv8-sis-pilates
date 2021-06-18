<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreExperimentalRequest;
use App\Http\Requests\UpdateExperimentalRequest;
use App\Models\Experimental;
use App\Services\AlunoService;

class ExperimentalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $criterio = request('criterio');
        $pesquisa = request('pesquisa');

        /**
         * Critérios para a busca
         * Formato: "Nome da Option HTML" => "nome da coluna no banco"
         */
        $criteriosValidos = [
            "CPF" => "cpf",
            "RG" => "rg",
            "Nome" => "nome",
            "E-mail" => "email"
        ];

        if($pesquisa) {
            $experimentais = Experimental::where($criterio, 'LIKE', '%' . $pesquisa . '%')->paginate(10);
        }else {
            $experimentais = Experimental::orderBy('data', 'DESC')->paginate(10);
        }

        $qtdExperimentais = Experimental::count();

        return view('experimentais.index', compact('experimentais', 'qtdExperimentais', 'criterio', 'pesquisa'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('experimentais.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreExperimentalRequest $request)
    {
        if($aluno = AlunoService::createFromExperimental($request->nome, $request->telefone)){
            $experimental = Experimental::create([
                'aluno_id' => $aluno->id,
                'data' => $request->data,
                'horario_inicio' => $request->horario_inicio,
                'horario_fim' => $request->horario_fim,
                'observacao' => $request->observacao,
                'cor_calendario' => $request->cor_calendario,
                'status' => 0
            ]);

            return redirect()->route('experimentais.show', $experimental)->with('success', 'Experimental marcada com sucesso');
        }else{
            return back()->with('error', 'Telefone já cadastrado');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $experimental = Experimental::findOrFail($id);

        return view('experimentais.show', compact('experimental'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $experimental = Experimental::findOrFail($id);

        return view('experimentais.edit', compact('experimental'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateExperimentalRequest $request, $id)
    {
        $experimental = Experimental::findOrFail($id);

        $experimental->update($request->validated());

        return redirect()->route('experimentais.show', $experimental)->with('msg', 'Experimental atualizada com sucesso');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $experimental = Experimental::findOrFail($id);
        $experimental->delete();

        return redirect()->route('experimentais.index')->with('msg', 'A experimental ' . $experimental->id . ' foi excluída');
    }
}
