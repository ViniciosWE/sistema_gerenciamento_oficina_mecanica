@extends('adm.layout.layout')

@section('title', isset($veiculo) ? 'Editar Veículo - Oficina VW' : 'Cadastrar Veículo - Oficina VW')
@section('page-title', isset($veiculo) ? 'Editar Veículo' : 'Cadastrar Veículo')


@section('content')
    <div class="col-md-6 mx-auto">
        <div class="p-4 card-body border border-3 border-danger rounded-4 glow">
            <h4 class="card-title mb-4 text-center">
                {{ isset($veiculo) ? 'Editar Veículo' : 'Cadastrar novo Veículo' }}
            </h4>

            @if($errors->any())
                <div class="alert alert-danger auto-close">
                    <ul class="mb-0">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST"
                action="{{ isset($veiculo) ? route('veiculos.update', $veiculo->id) : route('veiculos.store') }}">
                @csrf
                @if(isset($veiculo))
                    @method('PUT')
                @endif

                <div class="mb-3">
                    <label class="form-label">Cliente</label>
                    <select name="cliente_id" class="form-select" required>
                        <option value="">Selecione um cliente</option>
                        @foreach($clientes as $cliente)
                            <option value="{{ $cliente->id }}" {{ old('cliente_id', $veiculo->cliente_id ?? '') == $cliente->id ? 'selected' : '' }}>
                                {{ $cliente->nome }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Marca</label>
                    <input type="text" name="marca" class="form-control" value="{{ old('marca', $veiculo->marca ?? '') }}"
                        required placeholder="Digite a marca do veículo">
                </div>

                <div class="mb-3">
                    <label class="form-label">Modelo</label>
                    <input type="text" name="modelo" class="form-control" value="{{ old('modelo', $veiculo->modelo ?? '') }}"
                        required placeholder="Digite o modelo do veículo">
                </div>

                <div class="mb-3">
                    <label class="form-label">Placa</label>
                    <input type="text" name="placa" class="form-control" value="{{ old('placa', $veiculo->placa ?? '') }}"
                        required placeholder="Digite a placa do veículo">
                </div>

                <div class="mb-3">
                    <label class="form-label">Ano</label>
                    <input type="number" name="ano" class="form-control" value="{{ old('ano', $veiculo->ano ?? '') }}"
                        placeholder="Digite o ano do veículo">
                </div>

                <div class="d-flex justify-content-between align-items-center">
                    <a href="{{ route('veiculos.index') }}" class="btn btn-secondary">Voltar</a>
                    <button type="submit" class="btn btn-primary">{{ isset($veiculo) ? 'Atualizar' : 'Cadastrar' }}</button>
            </form>
        </div>
    </div>
    <script src="{{ asset('js/script.js') }}"></script>
@endsection