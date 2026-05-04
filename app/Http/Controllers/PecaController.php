<?php

namespace App\Http\Controllers;

use App\Models\Peca;
use GuzzleHttp\Promise\Create;
use Illuminate\Http\Request;

class PecaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pecas = Peca::orderBy('nome')->get();
        return view('adm.pecas.index', compact('pecas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('adm.pecas.create');
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Peca::create($request->all());
        return redirect()->route('pecas.index')->with('success', 'Peça cadastrada com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Peca $peca)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Peca $peca)
    {
        return view('adm.pecas.create', compact('peca'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Peca $peca)
    {
        $peca->update($request->all());
        return redirect()->route('pecas.index')->with('success', 'Peça atualizada com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Peca $peca)
    {
        if ($peca->ordensServico()->exists()) {
            return redirect()->route('pecas.index')
                ->with('error', 'Não é possível excluir esta peça, pois ela esta em ordens de serviço.');
        }

        $peca->delete();
        return redirect()->route('pecas.index')->with('success', 'Peça excluída com sucesso!');
    }
}
