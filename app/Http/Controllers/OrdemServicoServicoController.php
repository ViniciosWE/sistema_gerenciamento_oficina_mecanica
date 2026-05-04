<?php

namespace App\Http\Controllers;

use App\Models\OrdemServicoServico;
use Illuminate\Http\Request;
use App\Models\Servico;
use App\Models\OrdemServico;

class OrdemServicoServicoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(OrdemServico $ordemServico)
    {
        $servicos = Servico::orderBy('nome')->get();
        return view('adm.os.servicos.create', compact('ordemServico', 'servicos'));
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, OrdemServico $ordemServico)
    {
        $request->validate([
            'servico_id' => 'required|exists:servicos,id'
        ]);

        $servico = Servico::findOrFail($request->servico_id);

        OrdemServicoServico::create([
            'ordem_servico_id' => $ordemServico->id,
            'servico_id' => $servico->id,
            'preco' => $servico->preco,
        ]);

        $ordemServico->valor_total += $servico->preco;
        $ordemServico->save();

        return redirect()->route('os.index')
            ->with('success', 'Serviço adicionado com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(OrdemServicoServico $ordemServicoServico)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(OrdemServicoServico $ordemServicoServico)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, OrdemServicoServico $ordemServicoServico)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(OrdemServicoServico $ordemServicoServico)
    {
        //
    }
}
