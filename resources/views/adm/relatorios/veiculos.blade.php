@extends('adm.layout.layoutR')

@section('content')

<div class="info-box">
    <strong>Total de veículos:</strong> {{ $dados->count() }}
</div>

<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Marca</th>
            <th>Modelo</th>
            <th>Placa</th>
            <th>Cliente</th>
            <th>Criado em</th>
        </tr>
    </thead>

    <tbody>
        @foreach($dados as $v)
        <tr>
            <td>{{ $v->id }}</td>
            <td>{{ $v->marca }}</td>
            <td>{{ $v->modelo }}</td>
            <td>{{ $v->placa }}</td>
            <td>{{ $v->cliente->nome ?? '-' }}</td>
            <td>{{ $v->created_at->format('d/m/Y') }}</td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection