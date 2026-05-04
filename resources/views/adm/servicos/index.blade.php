@extends('adm.layout.layout')

@section('title', 'Serviços - Oficina VW')
@section('page-title', 'Serviços')

@section('content')
    <div class="row m-4 text-center">
        <div class="col-md-12 ">
            <h2 class="mb-4">Gerenciar os serviços da empresa</h2>
        </div>
        <div>
            <a href="{{ route('servicos.create') }}" class="btn btn-info">
                <i class="bi bi-plus-circle"></i> Novo Serviço
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
                                <th>Ações</th>
                            </tr>
                        </thead>

                        <tbody>
                            @forelse($servicos as $servico)
                                <tr>
                                    <td class="ps-4 fw-semibold">
                                        {{$servico->nome}}
                                    </td>

                                    <td class="text-muted">
                                        {{ $servico->descricao }}
                                    </td>
                                    <td>
                                        {{ $servico->preco }}
                                    </td>

                                    <td class="text-muted">
                                        <a href="{{ route('servicos.edit', $servico->id) }}"
                                            class="btn btn-sm btn-outline-primary me-2">
                                            Editar
                                        </a>

                                        <form action="{{ route('servicos.destroy', $servico->id) }}" method="POST"
                                            class="d-inline">
                                            @csrf
                                            @method('DELETE')

                                            <button type="submit" class="btn btn-sm btn-outline-danger"
                                                onclick="return confirm('Deseja excluir este serviço?')">
                                                Excluir
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="text-center text-muted py-4">
                                        Nenhum Serviço cadastrado ainda.
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