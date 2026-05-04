<?php

namespace App\Http\Controllers;

use App\Models\Servico;
use Illuminate\Http\Request;

class ServicoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $servicos = Servico::orderBy('nome')->get();
        return view('adm.servicos.index', compact('servicos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('adm.servicos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Servico::create($request->all());
        return redirect()->route('servicos.index')->with('success', 'Serviço cadastrado com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Servico $servico)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Servico $servico)
    {
        return view('adm.servicos.create', compact('servico'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Servico $servico)
    {
        $servico->update($request->all());
        return redirect()->route('servicos.index')->with('success', 'Serviço atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Servico $servico)
    {
        if ($servico->ordensServico()->exists()) {
            return redirect()->route('servicos.index')
                ->with('error', 'Não é possível excluir este serviço, pois ele esta em ordens de serviço.');
        }
        
        $servico->delete();
        return redirect()->route('servicos.index')->with('success', 'Serviço excluído com sucesso!');
    }
}
