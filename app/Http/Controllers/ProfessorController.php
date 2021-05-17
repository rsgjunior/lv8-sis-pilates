<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProfessorRequest;
use App\Models\Professor;
use Illuminate\Http\Request;

class ProfessorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pesquisa = request('pesquisa');

        if($pesquisa) {
            $professores = Professor::where([
                'nome', 'LIKE', '%' . $pesquisa . '%'
            ])->paginate(15);
        }else {
            $professores = Professor::paginate(15);
        }

        return view('professores.index', [
            'professores' => $professores,
            'pesquisa' => $pesquisa
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('professores.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProfessorRequest $request)
    {
        $professor = Professor::create($request->validated());

        if($request->hasFile('foto')){
            $nome_original = $request->foto->getClientOriginalName();
            $extensao = $request->foto->getClientOriginalExtension();
            $data = date('d-m-y H:i');
            $nome_arquivo = md5($nome_original . $data) . '.' . $extensao;
            
            $request->foto->storeAs('public/fotos/professores/' . $professor->id, $nome_arquivo);

            $professor->update([
                'foto' => $nome_arquivo
            ]);
        }

        return redirect()->route('professores.show', ['professor' => $professor->id])
                         ->with('success', 'Professor cadastrado com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $professor = Professor::findOrFail($id);

        return view('professores.show', [
            'professor' => $professor
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
        $professor = Professor::findOrFail($id);

        return view('professores.edit', [
            'professor' => $professor
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreProfessorRequest $request, $id)
    {
        $professor = Professor::findOrFail($id);

        $professor->update($request->validated());

        if($request->hasFile('foto')){
            $nome_original = $request->foto->getClientOriginalName();
            $extensao = $request->foto->getClientOriginalExtension();
            $data = date('d-m-y H:i');
            $nome_arquivo = md5($nome_original . $data) . '.' . $extensao;
            
            $request->foto->storeAs('public/fotos/professores/' . $professor->id, $nome_arquivo);

            $professor->update([
                'foto' => $nome_arquivo
            ]);
        }

        return redirect()->route('professores.show', ['professor' => $professor->id])
                         ->with('success', 'Cadastrado atualizado com sucesso');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Professor::findOrFail($id)->delete();

        return redirect()->route('professores.index')->with('msg', 'Cadastro deletado com sucesso');
    }

    public function alocarNaTurma() {

    }
}
