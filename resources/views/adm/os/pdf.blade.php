@extends('adm.layout.layoutR')

@section('content')

<div class="titulo">Ordem de serviço</div>

<div class="card">
    <div class="info"><strong>Cliente:</strong> {{ $ordemServico->cliente->nome }}</div>
    <div class="info"><strong>Veículo:</strong> {{ $ordemServico->veiculo->marca }} - {{ $ordemServico->veiculo->modelo }}</div>
    <div class="info"><strong>Placa:</strong> {{ $ordemServico->veiculo->placa }}</div>
    <div class="info"><strong>Status:</strong> {{ ucfirst($ordemServico->status) }}</div>
    <div class="info"><strong>Observações:</strong> {{ $ordemServico->observacoes ?? 'Nenhuma' }}</div>
</div>

<div class="card">
    <table>
        <thead>
            <tr>
                <th>Peça</th>
                <th>Qtd</th>
                <th>Valor Unit.</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            @php $totalPecas = 0; @endphp

            @forelse($ordemServico->pecas as $peca)
                @php
                    $subtotal = $peca->pivot->quantidade * $peca->pivot->preco_unitario;
                    $totalPecas += $subtotal;
                @endphp

                <tr>
                    <td>{{ $peca->nome }}</td>
                    <td>{{ $peca->pivot->quantidade }}</td>
                    <td>R$ {{ number_format($peca->pivot->preco_unitario, 2, ',', '.') }}</td>
                    <td>R$ {{ number_format($subtotal, 2, ',', '.') }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" style="text-align:center;">Nenhuma peça utilizada</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

<div class="card">
    <table>
        <thead>
            <tr>
                <th>Serviço</th>
                <th>Valor</th>
            </tr>
        </thead>
        <tbody>
            @php $totalServicos = 0; @endphp

            @forelse($ordemServico->servicos as $servico)
                @php
                    $totalServicos += $servico->pivot->preco;
                @endphp

                <tr>
                    <td>{{ $servico->nome }}</td>
                    <td>R$ {{ number_format($servico->pivot->preco, 2, ',', '.') }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="2" style="text-align:center;">Nenhum serviço realizado</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

@php
    $total = $totalPecas + $totalServicos;
@endphp

<div class="card">
    <div class="total">
        TOTAL GERAL: R$ {{ number_format($total, 2, ',', '.') }}
    </div>
</div>

@endsection