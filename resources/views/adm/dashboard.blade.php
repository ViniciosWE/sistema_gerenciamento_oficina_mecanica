@extends('adm.layout.layout')

@section('title', 'Dashboard - Oficina VW')
@section('page-title', 'Dashboard')

@section('content')
    <div class="row m-4 text-center">
        <div class="col-md-12 ">
            <h2 class="mb-4">Bem-vindo ao Sistema Administrativo da Mecânica VW</h2>
            <div class="row g-4 justify-content-center">

                @auth

                    @if(in_array(auth()->user()->role, ['admin']))

                        <div class="col-md-3">
                            <div class="card text-center h-100">
                                <div class="card-body">
                                    <i class="bi bi-person-badge display-4 text-warning mb-3"></i>
                                    <h5 class="card-title">Colaboradores</h5>
                                    <p class="card-text">Gerenciar equipe de trabalho</p>
                                    <a href="{{ route('colaboradores.index') }}" class="btn btn-warning">Acessar</a>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="card text-center h-100">
                                <div class="card-body">
                                    <i class="bi bi-file-earmark-pdf display-4 text-dark mb-3"></i>
                                    <h5 class="card-title">Relatórios</h5>
                                    <p class="card-text">Gerar relatórios em PDF do sistema</p>
                                    <a href="{{ route('relatorios.index') }}" class="btn btn-dark">Acessar</a>
                                </div>
                            </div>
                        </div>

                    @endif

                    @if(in_array(auth()->user()->role, ['admin', 'caixa']))

                        <div class="col-md-3">
                            <div class="card text-center h-100">
                                <div class="card-body">
                                    <i class="bi bi-people display-4 text-primary mb-3"></i>
                                    <h5 class="card-title">Clientes</h5>
                                    <p class="card-text">Gerenciar cadastro de clientes</p>
                                    <a href="{{ route('clientes.index') }}" class="btn btn-primary">Acessar</a>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="card text-center h-100">
                                <div class="card-body">
                                    <i class="bi bi-car-front display-4 text-success mb-3"></i>
                                    <h5 class="card-title">Veículos</h5>
                                    <p class="card-text">Controle da frota de veículos</p>
                                    <a href="{{ route('veiculos.index') }}" class="btn btn-success">Acessar</a>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="card text-center h-100">
                                <div class="card-body">
                                    <i class="bi bi-tools display-4 text-info mb-3"></i>
                                    <h5 class="card-title">Serviços</h5>
                                    <p class="card-text">Catálogo de serviços oferecidos</p>
                                    <a href="{{ route('servicos.index') }}" class="btn btn-info">Acessar</a>
                                </div>
                            </div>
                        </div>


                        <div class="col-md-3">
                            <div class="card text-center h-100">
                                <div class="card-body">
                                    <i class="bi bi-gear display-4 text-secondary mb-3"></i>
                                    <h5 class="card-title">Peças</h5>
                                    <p class="card-text">Estoque e controle de peças</p>
                                    <a href="{{ route('pecas.index') }}" class="btn btn-secondary">Acessar</a>
                                </div>
                            </div>
                        </div>

                    @endif

                    @if(in_array(auth()->user()->role, ['admin', 'mecanico', 'caixa']))

                        <div class="col-md-3">
                            <div class="card text-center h-100">
                                <div class="card-body">
                                    <i class="bi bi-clipboard-check display-4 text-danger mb-3"></i>
                                    <h5 class="card-title">Ordens de Serviço</h5>
                                    <p class="card-text">Gerenciar ordens de trabalho</p>
                                    <a href="{{ route('os.index') }}" class="btn btn-danger">Acessar</a>
                                </div>
                            </div>
                        </div>

                    @endif

                    @if(in_array(auth()->user()->role, ['admin', 'mecanico']))
                        <div class="row m-4">
                            <div class="col-md-12">

                                <div class="card shadow-sm">
                                    <div class="card-header bg-danger text-white">
                                        <h5 class="mb-0">Ordens de Serviço Abertas</h5>
                                    </div>

                                    <div class="card-body p-0">

                                        @if($osAbertas->count())

                                            <div class="table-responsive">
                                                <table class="table table-hover mb-0">
                                                    <thead class="table-light">
                                                        <tr>
                                                            <th>ID</th>
                                                            <th>Cliente</th>
                                                            <th>Veículo</th>
                                                            <th>Placa</th>
                                                            <th>Status</th>
                                                            <th>Data</th>
                                                            <th>Descrição</th>
                                                            <th>Ações</th>
                                                        </tr>
                                                    </thead>

                                                    <tbody>
                                                        @foreach($osAbertas as $os)
                                                            <tr>
                                                                <td>{{ $os->id }}</td>
                                                                <td>{{ $os->cliente->nome }}</td>
                                                                <td>{{ $os->veiculo->modelo }}</td>
                                                                <td>{{ $os->veiculo->placa }}</td>

                                                                <td>
                                                                    <span class="badge bg-warning text-dark">
                                                                        {{ $os->status }}
                                                                    </span>
                                                                </td>

                                                                <td>{{ $os->created_at->format('d/m/Y') }}</td>

                                                                <td>{{ $os->observacoes }}</td>

                                                                <td>
                                                                    <a href="{{ route('os.edit', $os->id) }}"
                                                                        class="btn btn-sm btn-primary">
                                                                        Abrir
                                                                    </a>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>

                                        @else
                                            <div class="p-3 text-center text-muted">
                                                Nenhuma ordem de serviço em aberto
                                            </div>
                                        @endif

                                    </div>
                                </div>

                            </div>
                        </div>


                    @endif

                @endauth

            </div>

        </div>

    </div>
@endsection