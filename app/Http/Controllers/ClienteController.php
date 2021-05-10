<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreClienteRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use App\Models\Cliente;

class ClienteController extends Controller
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
            $clientes = Cliente::where([
                ['nome', 'like', '%' . $pesquisa . '%']
            ])->paginate(15);
        } else {
            $clientes = Cliente::orderBy('nome')->paginate(15);
        }

        return view('clientes.index', [
            'clientes' => $clientes,
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
        return view('clientes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Requests\StoreClientRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreClienteRequest $request)
    {
        $cliente = Cliente::create($request->validated());

        if($request->hasFile('foto')){
            $nome_original = $request->foto->getClientOriginalName();
            $extensao = $request->foto->getClientOriginalExtension();
            $data = date('d-m-y H:i');
            $nome_arquivo = md5($nome_original . $data) . '.' . $extensao;
            
            $request->foto->storeAs('public/fotos/' . $cliente->id, $nome_arquivo);

            $cliente->update([
                'foto' => $nome_arquivo
            ]);
        }

        return redirect()->route('clientes.show', ['cliente' => $cliente->id])->with('success', 'Aluno cadastrado com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cliente = Cliente::findOrFail($id);

        return view('clientes.show', [
            'cliente' => $cliente
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
        $cliente = Cliente::findOrFail($id);

        return view('clientes.edit', [
            'cliente' => $cliente
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreClienteRequest $request, $id)
    {
        $cliente = Cliente::findOrFail($id);

        $cliente->update($request->validated());

        if($request->removerFoto != null) {
            $cliente->update([
                'foto' => null
            ]);
        }

        if($request->hasFile('foto')){
            $nome_original = $request->foto->getClientOriginalName();
            $extensao = $request->foto->getClientOriginalExtension();
            $data = date('d-m-y H:i');
            $nome_arquivo = md5($nome_original . $data) . '.' . $extensao;
            
            $request->foto->storeAs('public/fotos/' . $cliente->id, $nome_arquivo);

            $cliente->update([
                'foto' => $nome_arquivo
            ]);
        }

        return redirect()->route('clientes.show', ['cliente' => $cliente->id])->with('success', 'Cadastro atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Cliente::findOrFail($id)->delete();

        return redirect()->back()->with('msg', 'Usuário deletado');
    }
}
