@extends('adm.layout.layoutR')

@section('content')

<div class="info-box">
    <strong>Total de ordens de serviço:</strong> {{ $dados->count() }}
</div>

<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Cliente</th>
            <th>Veículo</th>
            <th>Status</th>
            <th>Valor</th>
            <th>Criado em</th>
        </tr>
    </thead>

    <tbody>
        @foreach($dados as $os)
        <tr>
            <td>{{ $os->id }}</td>
            <td>{{ $os->cliente->nome ?? '-' }}</td>
            <td>{{ $os->veiculo->marca ?? '-' }} {{ $os->veiculo->modelo ?? '' }}</td>
            <td>{{ ucfirst($os->status) }}</td>
            <td>R$ {{ number_format($os->valor_total, 2, ',', '.') }}</td>
            <td>{{ $os->created_at->format('d/m/Y') }}</td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection