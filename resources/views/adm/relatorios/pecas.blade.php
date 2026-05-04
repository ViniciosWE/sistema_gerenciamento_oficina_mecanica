@extends('adm.layout.layoutR')

@section('content')

<div class="info-box">
    <strong>Total de peças:</strong> {{ $dados->count() }}
</div>

<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Preço</th>
            <th>Estoque</th>
            <th>Criado em</th>
        </tr>
    </thead>

    <tbody>
        @foreach($dados as $p)
        <tr>
            <td>{{ $p->id }}</td>
            <td>{{ $p->nome }}</td>
            <td>R$ {{ number_format($p->preco, 2, ',', '.') }}</td>
            <td>{{ $p->quantidade_estoque }}</td>
            <td>{{ $p->created_at->format('d/m/Y') }}</td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection