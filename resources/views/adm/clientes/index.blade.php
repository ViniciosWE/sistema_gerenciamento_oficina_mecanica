@extends('adm.layout.layout')

@section('title', 'Clientes - Oficina VW')
@section('page-title', 'Clientes')

@section('content')
    <div class="row m-4 text-center">
        <div class="col-md-12 ">
            <h2 class="mb-4">Gerenciar seus clientes</h2>
        </div>
        <div>
            <a href="{{ route('clientes.create') }}" class="btn btn-primary">
                <i class="bi bi-plus-circle"></i> Novo Cliente
            </a>
        </div>

        <div class="col-md-12 mt-4 tabela">

            <div class="card-body p-0">

                <div class="table-responsive">
                    <table class="table table-striped table-hover table-bordered align-middle mb-0">

                        <thead class="table-danger">
                            <tr>
                                <th class="ps-4">Nome</th>
                                <th>Email</th>
                                <th>Telefone</th>
                                <th>Endereço</th>
                                <th>Ações</th>
                            </tr>
                        </thead>

                        <tbody>
                            @forelse($clientes as $cliente)
                                <tr>
                                    <td class="ps-4 fw-semibold">
                                        {{ $cliente->nome }}
                                    </td>

                                    <td class="text-muted">
                                        {{ $cliente->email }}
                                    </td>
                                    <td>
                                        {{ $cliente->telefone }}
                                    <td>
                                        {{ $cliente->endereco }}
                                    </td>


                                    <td class="text-muted">
                                        <a href="{{ route('clientes.edit', $cliente->id) }}"
                                            class="btn btn-sm btn-outline-primary me-2">
                                            Editar
                                        </a>
                                        <form action="{{ route('clientes.destroy', $cliente->id) }}" method="POST"
                                            class="d-inline">
                                            @csrf
                                            @method('DELETE')

                                            <button type="submit" class="btn btn-sm btn-outline-danger"
                                                onclick="return confirm('Deseja excluir este cliente? Os veículos relacionados a ele também serão excluídos.')">
                                                Excluir
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center text-muted py-4">
                                        Nenhum colaborador cadastrado ainda.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>

                    </table>
                </div>

            </div>

        </div>
    </div>


@endsection