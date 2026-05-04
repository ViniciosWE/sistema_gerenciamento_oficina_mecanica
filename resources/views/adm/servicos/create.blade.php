@extends('adm.layout.layout')

@section('title', isset($servico) ? 'Editar Serviço - Oficina VW' : 'Cadastrar Serviço - Oficina VW')
@section('page-title', isset($servico) ? 'Editar Serviço' : 'Cadastrar Serviço')


@section('content')
    <div class="col-md-6 mx-auto">
        <div class="p-4 card-body border border-3 border-danger rounded-4 glow">
            <h4 class="card-title mb-4 text-center">
                {{ isset($servico) ? 'Editar Serviço' : 'Cadastrar novo Serviço' }}
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
                action="{{ isset($servico) ? route('servicos.update', $servico->id) : route('servicos.store') }}">
                @csrf
                @if(isset($servico))
                    @method('PUT')
                @endif

                <div class="mb-3">
                    <label class="form-label">Nome</label>
                    <input type="text" name="nome" class="form-control" value="{{ old('nome', $servico->nome ?? '') }}"
                        required placeholder="Digite o nome do serviço">
                </div>

                <div class="mb-3">
                    <label class="form-label">Descrição</label>
                    <input type="text" name="descricao" class="form-control" value="{{ old('descricao', $servico->descricao ?? '') }}"
                        placeholder="Digite a descrição do serviço">
                </div>

                <div class="mb-3">
                    <label class="form-label">Preço</label>
                    <input type="number" name="preco" class="form-control" step="0.01" value="{{ old('preco', $servico->preco ?? '') }}"
                        required placeholder="Digite o preço do serviço">
                </div>

                <div class="d-flex justify-content-between align-items-center">
                    <a href="{{ route('servicos.index') }}" class="btn btn-secondary">Voltar</a>
                    <button type="submit" class="btn btn-primary">{{ isset($servico) ? 'Atualizar' : 'Cadastrar' }}</button>
            </form>
        </div>
    </div>
    <script src="{{ asset('js/script.js') }}"></script>
@endsection