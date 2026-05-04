<?php

namespace App\Http\Controllers;

use App\Models\Veiculo;
use App\Models\Cliente;
use Illuminate\Http\Request;

class VeiculoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $veiculos = Veiculo::orderBy('marca')->get();
        return view('adm.veiculos.index', compact('veiculos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $clientes = Cliente::orderBy('nome')->get();
        return view('adm.veiculos.create', compact('clientes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'cliente_id' => 'required|exists:clientes,id',
            'marca' => 'required|string|max:255',
            'modelo' => 'required|string|max:255',
            'placa' => 'required|string|max:255|unique:veiculos,placa',
            'ano' => 'nullable|integer|min:1949|max:' . (date('Y') + 1)
        ], [
            'ano.min' => 'O ano deve ser no mínimo 1950',
            'ano.max' => 'O ano deve ser no máximo ' . (date('Y') + 1)
        ]);

        Veiculo::create($validated);
        return redirect()->route('veiculos.index')->with('success', 'Veículo cadastrado com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Veiculo $veiculo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Veiculo $veiculo)
    {
        $clientes = Cliente::orderBy('nome')->get();
        return view('adm.veiculos.create', compact('veiculo', 'clientes'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Veiculo $veiculo)
    {
        $validated = $request->validate([
            'cliente_id' => 'required|exists:clientes,id',
            'marca' => 'required|string|max:255',
            'modelo' => 'required|string|max:255',
            'placa' => 'required|string|max:255|unique:veiculos,placa,' . $veiculo->id,
            'ano' => 'nullable|integer|min:1949|max:' . (date('Y') + 1)
        ], [
            'ano.min' => 'O ano deve ser no mínimo 1950',
            'ano.max' => 'O ano deve ser no máximo ' . (date('Y') + 1)
        ]);

        $veiculo->update($validated);
        return redirect()->route('veiculos.index')->with('success', 'Veículo atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Veiculo $veiculo)
    {
        if ($veiculo->cliente->ordensServico()->exists()) {
            return redirect()->route('veiculos.index')
                ->with('error', 'Não é possível excluir este veículo, pois ele possui ordens de serviço.');
        }

        $veiculo->delete();

        return redirect()->route('veiculos.index')
            ->with('success', 'Veículo excluído com sucesso!');
    }
}
