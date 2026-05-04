@extends('adm.layout.layout')

@section('title', 'Ordens de Serviço - Oficina VW')
@section('page-title', 'Ordens de Serviço')

@section('content')
    <div class="row m-4 text-center">
        <div class="col-md-12 ">
            <h2 class="mb-4">Gerenciar as ordens de serviço da empresa</h2>
        </div>
        <div>
            @if(in_array(auth()->user()->role, ['admin', 'caixa']))
            <a href="{{ route('os.create') }}" class="btn btn-danger">
                <i class="bi bi-plus-circle"></i> Nova Ordem de Serviço
            </a>
            @endif
        </div>

        <div class="col-md-12 mt-4 tabela">

            <div class="card-body p-0">

                <div class="table-responsive">
                    <table class="table table-striped table-hover table-bordered align-middle mb-0">

                        <thead class="table-danger">
                            <tr>
                                <th class="ps-4">ID</th>
                                <th>Cliente</th>
                                <th>Veículo</th>
                                <th>Status</th>
                                <th>Observação</th>
                                <th>Valor total</th>
                                <th>Data</th>
                                <th>Ações</th>
                            </tr>
                        </thead>

                        <tbody>
                            @forelse($os as $ordem)
                                <tr>
                                    <td class="ps-4 fw-semibold">
                                        {{$ordem->id}}
                                    </td>

                                    <td class="text-muted">
                                        {{ $ordem->cliente->nome }}
                                    </td>
                                    <td>
                                        {{ $ordem->veiculo->marca }} {{ $ordem->veiculo->modelo }}
                                    </td>
                                    <td>
                                        {{ $ordem->status }}
                                    </td>
                                    <td>
                                        {{ $ordem->observacoes }}
                                    </td>
                                    <td>
                                        {{ number_format($ordem->valor_total, 2, ',', '.') }}
                                    </td>
                                    <td>
                                        {{ $ordem->created_at->format('d/m/Y') }}
                                    </td>

                                    <td class="text-muted">

                                        @if(in_array(auth()->user()->role, ['admin', 'caixa']))
                                            <a href="{{ route('os.pdf', $ordem) }}" class="btn btn-sm btn-outline-dark">
                                                Gerar PDF
                                            </a>


                                            <form action="{{ route('os.destroy', $ordem->id) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')

                                                <button type="submit" class="btn btn-sm btn-outline-danger"
                                                    onclick="return confirm('Deseja excluir este serviço?')">
                                                    Excluir
                                                </button>
                                            </form>
                                        @endif

                                        @if(in_array(auth()->user()->role, ['admin', 'mecanico']) )

                                            <a href="{{ route('os.edit', $ordem->id) }}"
                                                class="btn btn-sm btn-outline-primary me-2">
                                                Editar
                                            </a>
                                        @endif

                                        @if(in_array(auth()->user()->role, ['admin', 'mecanico']) && $ordem->status === 'em_andamento')
                                            <a href="{{ route('os.pecas.create', $ordem) }}"
                                                class="btn btn-sm btn-outline-secondary">
                                                Adicionar Peças
                                            </a>
                                            <a href="{{ route('os.servicos.create', $ordem) }}" class="btn btn-sm btn-outline-info">
                                                Adicionar Serviço
                                            </a>
                                        @endif

                                         

                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="8" class="text-center text-muted py-4">
                                        Nenhuma Ordem de Serviço cadastrada ainda.
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