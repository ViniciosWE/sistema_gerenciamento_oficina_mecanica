<?php

namespace App\Http\Controllers;

use App\Models\OrdemServicoPeca;
use Illuminate\Http\Request;
use App\Models\Peca;
use App\Models\OrdemServico;

class OrdemServicoPecaController extends Controller
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
        $pecas = Peca::orderBy('nome')->get();
        return view('adm.os.pecas.create', compact('ordemServico', 'pecas'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, OrdemServico $ordemServico)
    {
        $request->validate([
            'peca_id' => 'required|exists:pecas,id',
            'quantidade' => 'required|integer|min:1'
        ]);

        $peca = Peca::findOrFail($request->peca_id);

        if ($peca->quantidade_estoque < $request->quantidade) {
            return back()->withErrors('Estoque insuficiente!');
        }

        $precoUnitario = $peca->preco;
        $quantidade = $request->quantidade;
        $total = $precoUnitario * $quantidade;

        OrdemServicoPeca::create([
            'ordem_servico_id' => $ordemServico->id,
            'peca_id' => $peca->id,
            'quantidade' => $quantidade,
            'preco_unitario' => $precoUnitario,
        ]);

        $ordemServico->valor_total += $total;
        $ordemServico->save();

        $peca->quantidade_estoque -= $quantidade;
        $peca->save();

        return redirect()->route('os.index')
            ->with('success', 'Peça adicionada com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(OrdemServicoPeca $ordemServicoPeca)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(OrdemServicoPeca $ordemServicoPeca)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, OrdemServicoPeca $ordemServicoPeca)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(OrdemServicoPeca $ordemServicoPeca)
    {
        //
    }
}
