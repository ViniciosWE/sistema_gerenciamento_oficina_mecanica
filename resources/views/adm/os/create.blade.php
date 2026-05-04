@extends('adm.layout.layout')

@section('title', isset($ordemServico) ? 'Editar Ordem de Serviço - Oficina VW' : 'Cadastrar Ordem de Serviço - Oficina VW')
@section('page-title', isset($ordemServico) ? 'Editar Ordem de Serviço' : 'Cadastrar Ordem de Serviço')

@section('content')
    <div class="col-md-6 mx-auto">
        <div class="p-4 card-body border border-3 border-danger rounded-4 glow">

            <h4 class="text-center mb-4">
                {{ isset($ordemServico) ? 'Editar Ordem de Serviço' : 'Cadastrar nova Ordem de Serviço' }}
            </h4>

            @if($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $erro)
                            <li>{{ $erro }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @if(!isset($ordemServico))
                <form method="GET" action="{{ route('os.create') }}">
                    <div class="mb-3">
                        <label>Cliente</label>
                        <select name="cliente_id" class="form-control">
                            <option value="">Selecione</option>
                            @foreach($clientes as $cliente)
                                <option value="{{ $cliente->id }}" {{ request('cliente_id') == $cliente->id ? 'selected' : '' }}>
                                    {{ $cliente->nome }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <button class="btn btn-secondary mb-3">Buscar veículos</button>
                </form>
            @endif

            @if(request('cliente_id') || isset($ordemServico))
                <form method="POST"
                    action="{{ isset($ordemServico) ? route('os.update', $ordemServico) : route('os.store') }}">

                    @csrf
                    @if(isset($ordemServico))
                        @method('PUT')
                    @endif

                    <div class="mb-3">
                        <label>Cliente</label>

                        @if(isset($ordemServico))
                            <input type="text" class="form-control" value="{{ $ordemServico->cliente->nome }}" disabled>
                        @else
                            <input type="hidden" name="cliente_id" value="{{ request('cliente_id') }}">
                            <input type="text" class="form-control" value="{{ $clientes->find(request('cliente_id'))->nome ?? '' }}"
                                disabled>
                        @endif
                    </div>

                    <div class="mb-3">
                        <label>Veículo</label>

                        @if(isset($ordemServico))
                            <input type="text" class="form-control" value="{{ $ordemServico->veiculo->placa }}" disabled>
                        @else
                            <select name="veiculo_id" class="form-control" required>
                                <option value="">Selecione</option>
                                @foreach($veiculos as $veiculo)
                                    <option value="{{ $veiculo->id }}">
                                        {{ $veiculo->placa }}
                                    </option>
                                @endforeach
                            </select>
                        @endif
                    </div>

                    <div class="mb-3">
                        <label>Observação</label>

                        @if(isset($ordemServico))
                            <input type="text" class="form-control" value="{{ $ordemServico->observacoes }}" disabled>
                        @else
                            <input type="text" name="observacoes" class="form-control">
                        @endif
                    </div>

                    @if(isset($ordemServico))
                        <div class="mb-3">
                            <label>Status</label>
                            <select name="status" class="form-control">
                                <option value="aberto" {{ $ordemServico->status == 'aberto' ? 'selected' : '' }}>Aberto</option>
                                <option value="em_andamento" {{ $ordemServico->status == 'em_andamento' ? 'selected' : '' }}>Em
                                    andamento</option>
                                <option value="finalizado" {{ $ordemServico->status == 'finalizado' ? 'selected' : '' }}>Finalizado
                                </option>
                            </select>
                        </div>
                    @endif

                    <div class="d-flex justify-content-between">
                        <a href="{{ route('os.index') }}" class="btn btn-secondary">Voltar</a>
                        <button class="btn btn-primary">
                            {{ isset($ordemServico) ? 'Atualizar Status' : 'Cadastrar' }}
                        </button>
                    </div>

                </form>
            @endif

        </div>
    </div>
@endsection