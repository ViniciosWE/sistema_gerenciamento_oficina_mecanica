@extends('adm.layout.layout')

@section('title', 'Veículos - Oficina VW')
@section('page-title', 'Veículos')

@section('content')
    <div class="row m-4 text-center">
        <div class="col-md-12 ">
            <h2 class="mb-4">Gerenciar os veículos dos seus clientes</h2>
        </div>
        <div>
            <a href="{{ route('veiculos.create') }}" class="btn btn-success">
                <i class="bi bi-plus-circle"></i> Novo Veículo
            </a>
        </div>

        <div class="col-md-12 mt-4 tabela">

            <div class="card-body p-0">

                <div class="table-responsive">
                    <table class="table table-striped table-hover table-bordered align-middle mb-0">

                        <thead class="table-danger">
                            <tr>
                                <th class="ps-4">Cliente</th>
                                <th>Marca</th>
                                <th>Modelo</th>
                                <th>Placa</th>
                                <th>ano</th>
                                <th>Ações</th>
                            </tr>
                        </thead>

                        <tbody>
                            @forelse($veiculos as $veiculo)
                                <tr>
                                    <td class="ps-4 fw-semibold">
                                        {{$veiculo->cliente->nome}}
                                    </td>

                                    <td class="text-muted">
                                        {{ $veiculo->marca }}
                                    </td>
                                    <td>
                                        {{ $veiculo->modelo }}
                                    </td>
                                    <td>
                                        {{ $veiculo->placa }}
                                    </td>
                                    <td>
                                        {{ $veiculo->ano }}
                                    </td>

                                    <td class="text-muted">
                                        <a href="{{ route('veiculos.edit', $veiculo->id) }}"
                                            class="btn btn-sm btn-outline-primary me-2">
                                            Editar
                                        </a>

                                        <form action="{{ route('veiculos.destroy', $veiculo->id) }}" method="POST"
                                            class="d-inline">
                                            @csrf
                                            @method('DELETE')

                                            <button type="submit" class="btn btn-sm btn-outline-danger"
                                                onclick="return confirm('Deseja excluir este veículo?')">
                                                Excluir
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="text-center text-muted py-4">
                                        Nenhum Veiculo cadastrado ainda.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>

                    </table>
                </div>

            </div>
            <div>
            </div>
        </div>
@endsection