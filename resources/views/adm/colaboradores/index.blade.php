@extends('adm.layout.layout')

@section('title', 'Colaboradores - Oficina VW')
@section('page-title', 'Colaboradores')

@section('content')
    <div class="row m-4 text-center">
        <div class="col-md-12 ">
            <h2 class="mb-4">Gerenciar equipe de trabalho</h2>
        </div>
        <div>
            <a href="{{ route('colaboradores.create') }}" class="btn btn-warning">
                <i class="bi bi-plus-circle"></i> Novo Colaborador
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
                                <th>Perfil</th>
                                <th>Registrado</th>
                                <th>Ações</th>
                            </tr>
                        </thead>

                        <tbody>
                            @forelse($colaboradores as $colaborador)
                                <tr>
                                    <td class="ps-4 fw-semibold">
                                        {{ $colaborador->name }}
                                    </td>

                                    <td class="text-muted">
                                        {{ $colaborador->email }}
                                    </td>

                                    <td>
                                        @if($colaborador->role === 'admin')
                                            <span class="badge bg-danger">Admin</span>
                                        @elseif($colaborador->role === 'caixa')
                                            <span class="badge bg-warning text-dark">Caixa</span>
                                        @else
                                            <span class="badge bg-secondary">Mecânico</span>
                                        @endif
                                    </td>

                                    <td class="text-muted">
                                        {{ optional($colaborador->created_at)->format('d/m/Y') }}
                                    </td>

                                    <td class="text-muted">
                                        <a href="{{ route('colaboradores.edit', $colaborador->id) }}"
                                            class="btn btn-sm btn-outline-primary me-2">
                                            Editar
                                        </a>

                                        @if(auth()->id() !== $colaborador->id)
                                            <form action="{{ route('colaboradores.destroy', $colaborador->id) }}" method="POST"
                                                class="d-inline">
                                                @csrf
                                                @method('DELETE')

                                                <button type="submit" class="btn btn-sm btn-outline-danger"
                                                    onclick="return confirm('Deseja excluir este colaborador?')">
                                                    Excluir
                                                </button>
                                            </form>
                                        @else
                                            <button class="btn btn-sm btn-outline-secondary" disabled>
                                                Excluir
                                            </button>
                                        @endif
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