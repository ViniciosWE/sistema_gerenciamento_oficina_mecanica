<?php

namespace App\Http\Controllers;

use App\Models\OrdemServico;
use App\Models\Cliente;
use App\Models\Veiculo;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class OrdemServicoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $os = OrdemServico::with(['cliente', 'veiculo'])->orderByDesc('id')->get();
        return view('adm.os.index', compact('os'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $clientes = Cliente::orderBy('nome')->get();

        $veiculos = [];

        if ($request->cliente_id) {
            $veiculos = Veiculo::where('cliente_id', $request->cliente_id)->get();
        }

        return view('adm.os.create', compact('clientes', 'veiculos'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'cliente_id' => 'required|exists:clientes,id',
            'veiculo_id' => 'required|exists:veiculos,id',
            'observacoes' => 'nullable|string',
        ]);

        OrdemServico::create([
            'cliente_id' => $request->cliente_id,
            'veiculo_id' => $request->veiculo_id,
            'user_id' => auth()->id(),
            'observacoes' => $request->observacoes,

            'status' => 'aberto',
            'valor_total' => 0,
        ]);

        return redirect()->route('os.index')->with('success', 'Ordem criada com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(OrdemServico $ordemServico)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(OrdemServico $ordemServico)
    {
        $clientes = Cliente::orderBy('nome')->get();
        $veiculos = Veiculo::where('cliente_id', $ordemServico->cliente_id)->get();

        return view('adm.os.create', compact('clientes', 'veiculos', 'ordemServico'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, OrdemServico $ordemServico)
    {
        if (!in_array(auth()->user()->role, ['admin', 'mecanico'])) {
            abort(403, 'Sem permissão');
        }
        $request->validate([
            'status' => 'required|in:aberto,em_andamento,finalizado'
        ]);

        $ordemServico->update([
            'status' => $request->status
        ]);

        return redirect()->route('os.index')
            ->with('success', 'Status atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(OrdemServico $ordemServico)
    {
        if (!in_array(auth()->user()->role, ['admin', 'caixa'])) {
            abort(403, 'Sem permissão');
        }
        $ordemServico->delete();
        return redirect()->route('os.index')->with('success', 'Ordem de serviço excluído com sucesso!');
    }


    public function pdf(OrdemServico $ordemServico)
    {
        if (!in_array(auth()->user()->role, ['admin', 'caixa'])) {
            abort(403, 'Sem permissão');
        }
        $ordemServico->load(['cliente', 'veiculo', 'pecas', 'servicos']);

        $pdf = Pdf::loadView('adm.os.pdf', compact('ordemServico'));

        return $pdf->download("os_{$ordemServico->id}.pdf");
    }

    public function dashboard()
    {
        $osAbertas = OrdemServico::with(['cliente', 'veiculo'])
            ->where('status', 'aberto')
            ->orderByDesc('id')
            ->get();

        return view('adm.dashboard', compact('osAbertas'));
    }
}
