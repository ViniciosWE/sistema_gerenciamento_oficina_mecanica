@extends('adm.layout.layout')

@section('title', isset($peca) ? 'Editar Peça - Oficina VW' : 'Cadastrar Peça - Oficina VW')
@section('page-title', isset($peca) ? 'Editar Peça' : 'Cadastrar Peça')


@section('content')
    <div class="col-md-6 mx-auto">
        <div class="p-4 card-body border border-3 border-danger rounded-4 glow">
            <h4 class="card-title mb-4 text-center">
                {{ isset($peca) ? 'Editar Peça' : 'Cadastrar nova Peça' }}
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

            <form method="POST" action="{{ isset($peca) ? route('pecas.update', $peca->id) : route('pecas.store') }}">
                @csrf
                @if(isset($peca))
                    @method('PUT')
                @endif

                <div class="mb-3">
                    <label class="form-label">Nome</label>
                    <input type="text" name="nome" class="form-control" value="{{ old('nome', $peca->nome ?? '') }}"
                        required placeholder="Digite o nome da peça">
                </div>

                <div class="mb-3">
                    <label class="form-label">Descrição</label>
                    <input type="text" name="descricao" class="form-control"
                        value="{{ old('descricao', $peca->descricao ?? '') }}" placeholder="Digite a descrição da peça">
                </div>

                <div class="mb-3">
                    <label class="form-label">Preço</label>
                    <input type="number" name="preco" class="form-control" step="0.01" value="{{ old('preco', $peca->preco ?? '') }}"
                        required placeholder="Digite o preço da peça">
                </div>

                <div class="mb-3">
                    <label class="form-label">Quantidade</label>
                    <input type="number" name="quantidade_estoque" class="form-control"
                        value="{{ old('quantidade_estoque', $peca->quantidade_estoque ?? '') }}" required
                        placeholder="Digite a quantidade da peça">
                </div>

                <div class="d-flex justify-content-between align-items-center">
                    <a href="{{ route('pecas.index') }}" class="btn btn-secondary">Voltar</a>
                    <button type="submit" class="btn btn-primary">{{ isset($peca) ? 'Atualizar' : 'Cadastrar' }}</button>
            </form>
        </div>
    </div>
    <script src="{{ asset('js/script.js') }}"></script>
@endsection