@extends('adm.layout.layoutR')

@section('content')

<div class="info-box">
    <strong>Total de colaboradores:</strong> {{ $dados->count() }}
</div>

<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Email</th>
            <th>Perfil</th>
            <th>Criado em</th>
        </tr>
    </thead>

    <tbody>
        @foreach($dados as $u)
            <tr>
                <td>{{ $u->id }}</td>
                <td>{{ $u->name }}</td>
                <td>{{ $u->email }}</td>
                <td>{{ ucfirst($u->role ?? 'N/A') }}</td>
                <td>{{ $u->created_at->format('d/m/Y') }}</td>
            </tr>
        @endforeach
    </tbody>
</table>

@endsection