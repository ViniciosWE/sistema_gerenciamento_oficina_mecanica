<?php

namespace App\Http\Controllers;
use Carbon\Carbon;

use Illuminate\Http\Request;
use App\Models\OrdemServico;
use App\Models\Cliente;
use App\Models\Veiculo;
use App\Models\Peca;
use App\Models\Servico;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;

class RelatorioController extends Controller
{
    public function index()
    {
        return view('adm.relatorios.index');
    }

    public function gerar(Request $request)
    {
        $request->validate([
            'tipo' => 'required',
            'data_inicio' => 'required|date',
            'data_fim' => 'required|date|after_or_equal:data_inicio',
        ]);

        $tipo = $request->tipo;
        $inicio = Carbon::parse($request->data_inicio)->startOfDay();
        $fim = Carbon::parse($request->data_fim)->endOfDay();

        switch ($tipo) {

            case 'os':
                $dados = OrdemServico::with(['cliente', 'veiculo'])
                    ->whereBetween('created_at', [$inicio, $fim])
                    ->orderByDesc('id')
                    ->get();
                break;

            case 'clientes':
                $dados = Cliente::whereBetween('created_at', [$inicio, $fim])
                    ->orderByDesc('id')
                    ->get();
                break;

            case 'veiculos':
                $dados = Veiculo::with('cliente')
                    ->whereBetween('created_at', [$inicio, $fim])
                    ->orderByDesc('id')
                    ->get();
                break;

            case 'pecas':
                $dados = Peca::whereBetween('created_at', [$inicio, $fim])
                    ->orderByDesc('id')
                    ->get();
                break;

            case 'servicos':
                $dados = Servico::whereBetween('created_at', [$inicio, $fim])
                    ->orderByDesc('id')
                    ->get();
                break;

            case 'colaboradores':
                $dados = User::whereBetween('created_at', [$inicio, $fim])
                    ->orderByDesc('id')
                    ->get();
                break;
        }

        $pdf = Pdf::loadView("adm.relatorios.$tipo", [
            'dados' => $dados,
            'inicio' => $inicio,
            'fim' => $fim,
            'tipo' => $tipo,
        ]);

        return $pdf->download("relatorio_{$tipo}.pdf");
    }
}
