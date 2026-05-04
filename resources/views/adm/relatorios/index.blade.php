@extends('adm.layout.layout')

@section('title', 'Relatórios - Oficina VW')
@section('page-title', 'Relatórios')

@section('content')
    <div class="container d-flex justify-content-center align-items-center" style="min-height: 80vh;">

        <div class="col-md-6">

            <div class="p-4 card-body border border-3 border-danger rounded-4 glow">

                <div class="text-center">
                    <h2 class="mb-4">Gere Relatórios da empresa</h2>
                </div>

                <form action="{{ route('relatorios.gerar') }}" method="POST">
                    @csrf

                    <div class="mb-3">
                        <label class="form-label">Tipo de Relatório</label>
                        <select class="form-select" name="tipo" required>
                            <option value="">Selecione um tipo</option>
                            <option value="clientes">Clientes</option>
                            <option value="veiculos">Veículos</option>
                            <option value="servicos">Serviços</option>
                            <option value="pecas">Peças</option>
                            <option value="colaboradores">Colaboradores</option>
                            <option value="os">Ordens de serviço</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Data inicial</label>
                        <input type="date" class="form-control" name="data_inicio" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Data final</label>
                        <input type="date" class="form-control" name="data_fim" required>
                    </div>

                    <button type="submit" class="btn btn-primary w-100">
                        Gerar Relatório
                    </button>

                </form>

            </div>

        </div>
    </div>
@endsection