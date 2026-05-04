@extends('adm.layout.layout')

@section('title', 'Peças - Oficina VW')
@section('page-title', 'Peças')

@section('content')
    <div class="row m-4 text-center">
        <div class="col-md-12 ">
            <h2 class="mb-4">Gerenciar as peças da empresa</h2>
        </div>
        <div>
            <a href="{{ route('pecas.create') }}" class="btn btn-secondary">
                <i class="bi bi-plus-circle"></i> Nova Peça
            </a>
        </div>

        <div class="col-md-12 mt-4 tabela">

            <div class="card-body p-0">

                <div class="table-responsive">
                    <table class="table table-striped table-hover table-bordered align-middle mb-0">

                        <thead class="table-danger">
                            <tr>
                                <th class="ps-4">Nome</th>
                                <th>Descrição</th>
                                <th>Preço</th>
                                <th>Quantidade</th>
                                <th>Ações</th>
                            </tr>
                        </thead>

                        <tbody>
                            @forelse($pecas as $peca)
                                <tr>
                                    <td class="ps-4 fw-semibold">
                                        {{$peca->nome}}
                                    </td>

                                    <td class="text-muted">
                                        {{ $peca->descricao }}
                                    </td>
                                    <td>
                                        {{ $peca->preco }}
                                    </td>
                                    <td>
                                        {{ $peca->quantidade_estoque }}
                                    </td>

                                    <td class="text-muted">
                                        <a href="{{ route('pecas.edit', $peca->id) }}"
                                            class="btn btn-sm btn-outline-primary me-2">
                                            Editar
                                        </a>

                                        <form action="{{ route('pecas.destroy', $peca->id) }}" method="POST"
                                            class="d-inline">
                                            @csrf
                                            @method('DELETE')

                                            <button type="submit" class="btn btn-sm btn-outline-danger"
                                                onclick="return confirm('Deseja excluir esta peça?')">
                                                Excluir
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="text-center text-muted py-4">
                                        Nenhuma peça cadastrada ainda.
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