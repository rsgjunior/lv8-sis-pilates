<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAlunoRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use App\Models\Aluno;

class AlunoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pesquisa = request('pesquisa');
        $criterio = request('criterio');

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

        $qtdAlunos = Aluno::count();

        if($pesquisa && in_array($criterio, $criteriosValidos)) {
            $alunos = Aluno::where([
                [$criterio, 'LIKE', '%' . $pesquisa . '%']
            ])->paginate(9);
        }else{
            $pesquisa = NULL;
            $criterio = NULL;
            $alunos = Aluno::orderBy('nome')->paginate(9);
        }

        return view('alunos.index', [
            'alunos' => $alunos,
            'pesquisa' => $pesquisa,
            'criterio' => $criterio,
            'criteriosValidos' => $criteriosValidos,
            'qtdAlunos' => $qtdAlunos
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('alunos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Requests\StoreClientRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAlunoRequest $request)
    {
        $aluno = Aluno::create($request->validated());

        if($request->hasFile('foto')){
            $nome_original = $request->foto->getClientOriginalName();
            $extensao = $request->foto->getClientOriginalExtension();
            $data = date('d-m-y H:i');
            $nome_arquivo = md5($nome_original . $data) . '.' . $extensao;
            
            $request->foto->storeAs('public/fotos/alunos/' . $aluno->id, $nome_arquivo);

            $aluno->update([
                'foto' => $nome_arquivo
            ]);
        }

        return redirect()->route('alunos.show', ['aluno' => $aluno->id])->with('success', 'Aluno cadastrado com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $aluno = Aluno::findOrFail($id);
        $turmas = $aluno->turmas;
        $avaliacoes = $aluno->avaliacoes()->paginate(3);
        $observacoes = $aluno->observacoes()->orderBy('created_at', 'DESC')->get();

        return view('alunos.show', [
            'aluno' => $aluno,
            'turmas' => $turmas,
            'avaliacoes' => $avaliacoes,
            'observacoes' => $observacoes
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
        $aluno = Aluno::findOrFail($id);

        return view('alunos.edit', [
            'aluno' => $aluno
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreAlunoRequest $request, $id)
    {
        $aluno = Aluno::findOrFail($id);

        $aluno->update($request->validated());

        if($request->removerFoto != null) {
            $aluno->update([
                'foto' => null
            ]);
        }
        
        if($request->hasFile('foto')){
            $nome_original = $request->foto->getClientOriginalName();
            $extensao = $request->foto->getClientOriginalExtension();
            $data = date('d-m-y H:i');
            $nome_arquivo = md5($nome_original . $data) . '.' . $extensao;
            
            $request->foto->storeAs('public/fotos/' . $aluno->id, $nome_arquivo);

            $aluno->update([
                'foto' => $nome_arquivo
            ]);
        }

        return redirect()->route('alunos.show', ['aluno' => $aluno->id])->with('success', 'Cadastro atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Aluno::findOrFail($id)->delete();

        return redirect()->back()->with('msg', 'Usuário deletado');
    }
}
