@extends('adm.layout.layoutR')

@section('content')

<div class="info-box">
    <strong>Total de clientes:</strong> {{ $dados->count() }}
</div>

<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Telefone</th>
            <th>Criado em</th>
        </tr>
    </thead>

    <tbody>
        @foreach($dados as $c)
        <tr>
            <td>{{ $c->id }}</td>
            <td>{{ $c->nome }}</td>
            <td>{{ $c->telefone }}</td>
            <td>{{ $c->created_at->format('d/m/Y') }}</td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection