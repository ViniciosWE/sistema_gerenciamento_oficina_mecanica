@extends('adm.layout.layoutR')

@section('content')

<div class="info-box">
    <strong>Total de serviços:</strong> {{ $dados->count() }}
</div>

<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Valor</th>
            <th>Criado em</th>
        </tr>
    </thead>

    <tbody>
        @foreach($dados as $s)
        <tr>
            <td>{{ $s->id }}</td>
            <td>{{ $s->nome }}</td>
            <td>R$ {{ number_format($s->valor, 2, ',', '.') }}</td>
            <td>{{ $s->created_at->format('d/m/Y') }}</td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection